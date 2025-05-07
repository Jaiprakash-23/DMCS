@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')
    @include('layouts.admin-sidebar')

    <div class="page-wrapper">
  

<div class="min-h-screen bg-gray-50">
    <div class="p-6">
        <!-- Header Section -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Attendance Dashboard</h1>
            <p class="text-gray-600">Welcome back, {{ auth()->user()->name }}</p>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Timesheet Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden transition-all hover:shadow-md">
                <div class="bg-blue-600 px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Timesheet</h2>
                </div>
                <div class="p-6">
                    <div class="text-center mb-6">
                        <p class="text-gray-500 text-sm mb-1">Punch In at</p>
                        @if($todayAttendance)
                            @if($todayAttendance->attendance_status == 1)
                                <span id="status" hidden>{{ $todayAttendance->attendance_status }}</span>
                                <p id="punch_time" class="text-2xl font-bold text-blue-600"></p>
                            @endif
                        @else
                            <p class="text-2xl font-bold text-gray-700">{{ $formattedDate }}</p>
                        @endif
                    </div>

                    <div class="text-center mb-6">
                        @if($todayAttendance)
                            @if($todayAttendance->attendance_status == 1)
                                <span id="punch_in" hidden>{{ substr($todayAttendance->updated_at, 11, 8) }}</span>
                                <div class="flex flex-col items-center">
                                    <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-lg font-medium" id="remaining_time">00:00:00</span>
                                    <small class="text-gray-500 mt-1">Remaining Time</small>
                                </div>
                            @endif
                        @else
                            <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-800">12 hrs</span>
                        @endif
                    </div>

                    <div class="text-center mb-6">
                        @if($todayAttendance)
                            @if($todayAttendance->attendance_status == 1)
                                <button class="px-6 py-3 bg-green-500 text-white rounded-full font-medium hover:bg-green-600 transition-colors">
                                    <i class="fas fa-check-circle mr-2"></i> Duty On
                                </button>
                            @else
                                <button class="px-6 py-3 bg-red-500 text-white rounded-full font-medium hover:bg-red-600 transition-colors">
                                    <i class="fas fa-power-off mr-2"></i> Duty Off
                                </button>
                            @endif
                        @else
                            <button class="px-6 py-3 bg-red-500 text-white rounded-full font-medium hover:bg-red-600 transition-colors">
                                <i class="fas fa-power-off mr-2"></i> Duty Off
                            </button>
                        @endif
                    </div>

                    <div class="grid grid-cols-2 divide-x divide-gray-200 border-t border-b border-gray-200">
                        <div class="py-3 text-center">
                            <p class="text-gray-500 text-sm">Site Name</p>
                            @if ($todayAttendance)
                                <p class="font-semibold">{{ $todayAttendance->site_name }}</p>
                            @else
                                <p class="text-gray-400">Location</p>
                            @endif
                        </div>
                        <div class="py-3 text-center">
                            <p class="text-gray-500 text-sm">Overtime</p>
                            <p class="font-semibold" id="overtime-display">0 hrs</p>
                            <!-- <p id="duty_h">{{ $site_name->duty }}</p> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden transition-all hover:shadow-md">
                <div class="bg-cyan-500 px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Statistics</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-5">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600">Today</span>
                                <strong class="text-gray-800"><span id="today_time">{{ $today['worked_hours'] }}</span> hrs</strong>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div id="today_pre" class="bg-blue-500 h-2 rounded-full" style="width: {{ $today['completion_percentage'] }}%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600">This Week</span>
                                <strong class="text-gray-800">{{ $week['worked_hours'] }} hrs</strong>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $week['completion_percentage'] }}%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600">This Month</span>
                                <strong class="text-gray-800">{{ $month['worked_hours'] }} hrs</strong>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $month['completion_percentage'] }}%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600">Overtime</span>
                                <strong class="text-gray-800">{{ $month['overtime_hours'] }} hrs</strong>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-500 h-2 rounded-full" style="width: {{ $month['overtime_percentage'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Leave Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden transition-all hover:shadow-md">
                <div class="bg-purple-600 px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Your Leave</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="text-center p-4 rounded-lg bg-blue-50">
                            <h3 class="text-2xl font-bold text-blue-600">{{ $leave }}</h3>
                            <p class="text-gray-500">Leave Taken</p>
                        </div>
                        <div class="text-center p-4 rounded-lg bg-green-50">
                            <h3 class="text-2xl font-bold text-green-600">0</h3>
                            <p class="text-gray-500">Remaining</p>
                        </div>
                    </div>
                    <a href="{{ route('apply_leave') }}" class="block w-full px-4 py-2 border border-blue-500 text-blue-500 rounded-full text-center font-medium hover:bg-blue-50 transition-colors">
                        <i class="fas fa-plus-circle mr-2"></i> Apply Leave
                    </a>
                </div>
            </div>
        </div>

        <!-- Attendance History -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Attendance History</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punch In</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punch Out</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Production</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Overtime</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($attendence as $key => $att)
                        <tr class="@if($att->attendance_status === 1) bg-green-50 @endif hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $att->date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{$att->punch_in }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{$att->punch_out ? $att->punch_out : '0000-00-00 00:00:00' }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" id="duty_h">{{ $site_name->duty }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$att->overtime ? $att->overtime : '00:00'}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($att->attendance_status == 1 || $att->attendance_status == 2)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Present</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Absent</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $att->site_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Previous
                    </a>
                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Next
                    </a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">20</span> results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript remains the same as your original -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Configuration

        const STANDARD_DUTY_HOURS = document.querySelector('#duty_h')?.innerText; // Standard 8-hour work day
        //  alert(STANDARD_DUTY_HOURS)
        // Get punch-in time (must be in HH:MM:SS 24-hour format)
        var punchIn_at = document.querySelector('#punch_in')?.innerText; // Example: 11:00:48 AM
        var attendence_status = document.querySelector('#status')?.innerText;

        var status = attendence_status || "0"; // Active status

        // Debugging
        console.log("Initial Punch In Time:", punchIn_at);
        console.log("Status:", status);

        // Improved time parsing function
        function parseTimeToDate(timeStr) {
            // Ensure time has all components (HH:MM:SS)
            if (!timeStr.includes(':')) timeStr += ":00:00";
            const parts = timeStr.split(':');
            if (parts.length === 1) parts.push('00', '00');
            if (parts.length === 2) parts.push('00');

            const [hours, minutes, seconds] = parts.map(Number);
            const now = new Date();
            return new Date(
                now.getFullYear(),
                now.getMonth(),
                now.getDate(),
                hours,
                minutes,
                seconds
            );
        }

        // More accurate time difference calculation
        function getTimeDifference(punchInTime, currentTime) {
            const diffMs = currentTime - punchInTime;

            // Handle negative difference (edge case)
            if (diffMs < 0) {
                console.warn("Negative time difference detected - check punch in time");
                return {
                    formatted24: "00:00:00",
                    totalHours: 0,
                    hours: 0,
                    minutes: 0,
                    seconds: 0
                };
            }

            const diffSec = Math.floor(diffMs / 1000);
            const totalHours = diffSec / 3600;
            const hours = Math.floor(diffSec / 3600);
            const minutes = Math.floor((diffSec % 3600) / 60);
            const seconds = diffSec % 60;

            return {
                formatted24: `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`,
                totalHours: totalHours,
                hours: hours,
                minutes: minutes,
                seconds: seconds
            };
        }

        // Robust 12-hour format conversion
        function convertTo12Hour(time24) {
            // Handle incomplete time strings
            if (!time24) return "00:00:00 AM";

            const parts = time24.split(':');
            const hours = parseInt(parts[0]) || 0;
            const minutes = parts[1] ? String(parts[1]).padStart(2, '0') : "00";
            const seconds = parts[2] ? String(parts[2]).padStart(2, '0') : "00";

            const period = hours >= 12 ? 'PM' : 'AM';
            const hours12 = hours % 12 || 0; // Convert 0 to 12 for 12 AM

            return `${hours12}:${minutes}:${seconds} ${period}`;
        }

        // Accurate hours to time string conversion
        function formatHoursTo12(hoursDecimal) {
            // Ensure we have a valid number
            hoursDecimal = parseFloat(hoursDecimal) || 0;

            const totalSeconds = Math.round(hoursDecimal * 3600);
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;

            // Create 24-hour format first
            const time24 = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            return convertTo12Hour(time24);
        }

        // Main update function
        function updateClock() {
            const punchInTime = parseTimeToDate(punchIn_at);
            const currentTime = new Date();
            const timeData = getTimeDifference(punchInTime, currentTime);

            // Calculate percentage of standard duty completed
            const percentageCompleted = Math.min((timeData.totalHours / STANDARD_DUTY_HOURS) * 100, 100);
            const roundedPercentage = Math.round(percentageCompleted * 100) / 100;
            document.querySelector('#today_time').innerText = `${timeData.formatted24}`

            if (`${roundedPercentage}%` == 100) {
                document.querySelector('#today_time').innerText = `08:00:00`
                document.querySelector('#today_pre').style.width = `100%`
            } else {
                document.querySelector('#today_pre').style.width = `${roundedPercentage}%`
            }
            
            // Calculate duty and overtime (with proper rounding)
            let dutyHours = Math.min(timeData.totalHours, STANDARD_DUTY_HOURS);
            let overtimeHours = Math.max(0, timeData.totalHours - STANDARD_DUTY_HOURS);

            // Round to 4 decimal places to avoid floating point issues
            dutyHours = parseFloat(dutyHours.toFixed(4));
            overtimeHours = parseFloat(overtimeHours.toFixed(4));

            // Update displays
            if (document.querySelector('#punch_time')) {
                document.querySelector('#punch_time').innerText = `${convertTo12Hour(punchIn_at)}`;
            }
            if (document.querySelector('#overtime-display')) {
                document.querySelector('#overtime-display').innerText = `${formatHoursTo12(overtimeHours)}`;
            }

            if (timeData.totalHours < STANDARD_DUTY_HOURS) {
                const remaining = (STANDARD_DUTY_HOURS - timeData.totalHours).toFixed(4);
                if (document.querySelector('#remaining_time')) {
                    document.querySelector('#remaining_time').innerText = `${formatHoursTo12(remaining)}`;
                }
            } else {
                console.log(`Status: Completed standard duty hours. Overtime: ${formatHoursTo12(overtimeHours)}`);
            }

            const time24Hour = currentTime.getHours() + ":" +
                currentTime.getMinutes().toString().padStart(2, '0') + ":" +
                currentTime.getSeconds().toString().padStart(2, '0');
            console.log(time24Hour);
        }

        // Start the clock if status is active
        if (status == "1") {
            updateClock();
            setInterval(() => {
                updateClock();
            }, 1000);
        } else {
            console.log("Attendance not active");
        }
    });
</script>


    </div>

   

@endsection