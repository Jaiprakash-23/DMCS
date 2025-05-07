<?php

namespace App\Models;

use Auth;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance";
    protected $guarded = [];
    public static function formatSecondsToTime(int $seconds): string
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = $seconds % 60;

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }

    public static function getTimeAnalysis($userId)
    {
        $now = now();

        return [
            'today' => self::getDailyAnalysis($userId, $now),
            'week' => self::getWeeklyAnalysis($userId, $now),
            'month' => self::getMonthlyAnalysis($userId, $now)
        ];
    }

    // Daily Analysis (Today)
    protected static function getDailyAnalysis($userId, $date)
    {   
        $emp = Auth::user();
        $site = location_site::where('id', $emp->site)->first();
        
        $dayStart = $date->copy()->startOfDay();
        $dayEnd = $date->copy()->endOfDay();

        $attendance = self::where('emp_id', $userId)
            ->whereBetween('punch_in', [$dayStart, $dayEnd])
            ->whereNotNull('punch_out')
            ->first();

        if (!$attendance) {
            return self::calculateTimeMetrics(0, $site->duty * 3600, $date->format('D, M j'));
        }

        $punchIn = new DateTime($attendance->punch_in);
        $punchOut = new DateTime($attendance->punch_out);
        $secondsWorked = $punchOut->getTimestamp() - $punchIn->getTimestamp();

        return self::calculateTimeMetrics($secondsWorked, $site->duty * 3600, $date->format('D, M j'));
    }

    // Weekly Analysis (Current Week)
    protected static function getWeeklyAnalysis($userId, $date)
    {    
        $emp = Auth::user();
        $site = location_site::where('id', $emp->site)->first();
        $weekStart = $date->copy()->startOfWeek();
        $weekEnd = $date->copy()->endOfWeek();

        $attendances = self::where('emp_id', $userId)
            ->whereBetween('punch_in', [$weekStart, $weekEnd])
            ->whereNotNull('punch_out')
            ->get();

        $totalSeconds = 0;
        $workingDays = 0;

        foreach ($attendances as $attendance) {
            if ($attendance->attendance_status == 2) {
                $punchIn = new DateTime($attendance->punch_in);
                $punchOut = new DateTime($attendance->punch_out);
                $totalSeconds += ($punchOut->getTimestamp() - $punchIn->getTimestamp());
                $workingDays++;
            }

        }

        $standardSeconds = $workingDays * $site->duty * 3600;

        return self::calculateTimeMetrics(
            $totalSeconds,
            $standardSeconds,
            'Week ' . $weekStart->format('M j') . ' - ' . $weekEnd->format('M j')
        );
    }

    // Monthly Analysis (Current Month)
    protected static function getMonthlyAnalysis($userId, $date)
    {   
        $emp = Auth::user();
        $site = location_site::where('id', $emp->site)->first();
        $monthStart = $date->copy()->startOfMonth();
        $monthEnd = $date->copy()->endOfMonth();
        $attendances = self::where('emp_id', $userId)
            ->whereBetween('punch_in', [$monthStart, $monthEnd])
            ->whereNotNull('punch_out')
            ->get();
        // dd($attendances);   
        $totalSeconds = 0;
        $workingDays = 0;

        foreach ($attendances as $attendance) {
            if ($attendance->attendance_status == 2) {
                $punchIn = new DateTime($attendance->punch_in);
                $punchOut = new DateTime($attendance->punch_out);
                $totalSeconds += ($punchOut->getTimestamp() - $punchIn->getTimestamp());
                $workingDays++;
            }
        }

        $standardSeconds = $workingDays * $site->duty * 3600;

        return self::calculateTimeMetrics($totalSeconds, $standardSeconds, $date->format('F Y'));
    }

    // Common calculation method
    protected static function calculateTimeMetrics($workedSeconds, $standardSeconds, $periodName)
    {    
        $emp = Auth::user();
        $site = location_site::where('id', $emp->site)->first();
        $rawOvertime = max(0, $workedSeconds - $standardSeconds);
        $overtimeSeconds = max(0, $rawOvertime - 3600); // Subtract 1-hour buffer
        $remainingSeconds = max(0, $standardSeconds - $workedSeconds);

        $completionPercentage = ($standardSeconds > 0)
            ? min(100, round(($workedSeconds / $standardSeconds) * 100, 1))
            : 0;

        $overtimePercentage = ($standardSeconds > 0)
            ? min(100, round(($overtimeSeconds / $standardSeconds) * 100, 1))
            : 0;

        $status = match (true) {
            $overtimeSeconds > 0 => 'overtime',
            $remainingSeconds > 0 => 'remaining',
            default => 'exact',
        };

        return [
            'period' => $periodName,
            'worked_hours' => self::formatSecondsToTime($workedSeconds),
            'standard_hours' => self::formatSecondsToTime($standardSeconds),
            'overtime_hours' => self::formatSecondsToTime($overtimeSeconds),
            'remaining_hours' => self::formatSecondsToTime($remainingSeconds),
            'completion_percentage' => $completionPercentage,
            'overtime_percentage' => $overtimePercentage,
            'status' => $status,
            'working_days' => $standardSeconds / ($site->duty * 3600),
        ];
    }


}
