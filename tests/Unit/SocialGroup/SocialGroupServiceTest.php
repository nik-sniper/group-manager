<?php


namespace Tests\Unit\SocialGroup;


use App\Common\Services\SocialGroupService;
use Tests\TestCase;
use VK\Client\VKApiClient;

class SocialGroupServiceTest extends TestCase
{
    protected SocialGroupService $socialGroupService;

    public function setUp(): void
    {
        parent::setUp();

        $this->socialGroupService = new SocialGroupService(new VKApiClient());
    }

    public function test_vk_get_groups_should_succeed()
    {
        $response = $this->socialGroupService->getGroups('all');

        $this->assertTrue(true);
    }

    public function test_vk_get_members_should_succeed()
    {
        $groups = $this->socialGroupService->getGroups('all');
        $response = $this->socialGroupService->getMembers($groups['items'][0]['id']);

        $this->assertIsInt($response);
    }
}
