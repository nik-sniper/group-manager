<?php


namespace Tests\Unit\Group;


use App\Models\Groups\Group;
use App\Models\Groups\GroupVK;
use App\Models\Groups\Services\GroupVKService;
use VK\Client\VKApiClient;

class GroupVKServiceTest extends GroupServiceTest
{
    public function setUp(): void
    {
        parent::setUp();

        $this->service = app()->get(GroupVKService::class);
        $this->group = Group::factory()->create([
            'provider' => Group::PROVIDER_VK
        ]);
    }

    public function test_to_valid_format()
    {
        $response = $this->service->getGroups(['q' => 'game']);
        $validData = $this->service->toValidFormat($response[0]);

        $this->assertIsArray($validData);
    }
}
