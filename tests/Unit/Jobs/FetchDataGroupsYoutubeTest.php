<?php


namespace Tests\Unit\Jobs;


use App\Jobs\FetchDataGroupsYoutube;
use App\Models\Groups\Services\GroupYoutubeService;
use Tests\TestCase;
use Queue;

class FetchDataGroupsYoutubeTest extends TestCase
{
    public function test_call_job_should_success()
    {
        Queue::fake();

        $job = new FetchDataGroupsYoutube();
        $job->handle(app()->get(GroupYoutubeService::class));
        $this->assertTrue(true);
    }
}
