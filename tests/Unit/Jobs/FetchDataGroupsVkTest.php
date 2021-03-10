<?php


namespace Tests\Unit\Jobs;



use App\Jobs\FetchDataGroupsVk;
use App\Models\Groups\Services\GroupVKService;
use Tests\TestCase;
use Queue;

class FetchDataGroupsVkTest extends TestCase
{
    public function test_call_job_should_success()
    {
        Queue::fake();

        $job = new FetchDataGroupsVk();
        $job->handle(app()->get(GroupVKService::class));
        $this->assertTrue(true);
    }
}
