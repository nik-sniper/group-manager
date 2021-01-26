<?php

namespace App\Jobs;

use App\Models\Groups\Group;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\FetchDataGroupsVk;
use App\Jobs\FetchDataGroupsYoutube;

class FetchDataGroups implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $baseClassJob = get_class($this);
        $groups = Group::SUPPORTED_GROUPS;
        foreach ($groups as $group) {
            $jobClass = $baseClassJob . $group;
            $job = new $jobClass();
            dispatch($job);
        }
    }
}
