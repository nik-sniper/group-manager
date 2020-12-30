<?php


namespace Tests\Unit\Group;

use App\Groups\Contracts\GroupServiceInterface;
use App\Models\Groups\Group;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

abstract class GroupServiceTest extends TestCase
{
    use DatabaseTransactions;

    protected GroupServiceInterface $service;
    protected Group $group;

    public function test_get_groups_should_succeed()
    {
        $response = $this->service->getGroups('game');

        $this->assertIsArray($response);
    }

    public function test_get_members_should_succeed()
    {
        $response = $this->service->getMembers($this->group->provider_id);

        $this->assertIsInt($response);
    }
}
