<?php


namespace Tests\Unit\Jobs;


use App\Jobs\FetchDataGroups;
use Tests\TestCase;
use Queue;

class FetchDataGroupsTest extends TestCase
{
    public function test_fetch_data()
    {
        Queue::fake();

        dispatch_now(new FetchDataGroups());
        $this->assertTrue(true);
    }
}
