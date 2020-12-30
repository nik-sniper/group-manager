<?php


namespace Tests\Unit\Group;


use App\Models\Groups\Group;
use App\Models\Groups\Services\GroupYoutubeService;

class GroupYoutubeServiceTest extends GroupServiceTest
{
    public function setUp(): void
    {
        parent::setUp();

        $this->service = app()->get(GroupYoutubeService::class);
        $this->group = Group::factory()->create([
            'provider' => Group::PROVIDER_YOUTUBE,
            'provider_id' => 'UCnSBSmC9LVK6Pj6Qdi3uCKg'
        ]);
    }
}
