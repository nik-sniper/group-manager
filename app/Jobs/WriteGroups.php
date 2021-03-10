<?php

namespace App\Jobs;

use App\Groups\Contracts\GroupServiceInterface;
use App\Models\Groups\Group;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WriteGroups implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $groups;
    protected GroupServiceInterface $service;

    /**
     * Create a new job instance.
     *
     * @param array $groups
     * @param GroupServiceInterface $service
     * @return void
     */
    public function __construct(array $groups, GroupServiceInterface $service)
    {
        $this->groups = $groups;
        $this->service = $service;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->groups as $group) {
            $this->service->writeGroup($group);
        }
    }
}
