<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class text extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:text';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

    $currentDateTime = now()->setTimezone('Asia/Kolkata');

    $all_data=Post::where('status','pending')->get();
    foreach($all_data as $ad){
        $id=$ad->id;
        $scedule_data=$ad->scheduledate;
        $scedule_time=$ad->scheduletime;
        $date_time=$scedule_data." ".$scedule_time;

        if ($currentDateTime >= $date_time) {

            Post::where('id',$id)->update(['status' => 'approved']);

            return response()->json(['success' => true, 'message' => 'Query executed!']);
        }

    }


}
}
