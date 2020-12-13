<?php


namespace App\Common\Services;


use VK\Client\VKApiClient;

class SocialGroupService
{
    protected VKApiClient $vkApi;

    public function __construct(VKApiClient $VKApiClient)
    {
        $this->vkApi = $VKApiClient;
    }

    public function getGroups(string $search_text) : array
    {
        $groups = $this->vkApi->groups()->search(config('services.vk.token'), [
                    'q' => $search_text
                ]);

        return $groups;
    }

    public function getMembers(int $groupId) : int
    {
        $members = $this->vkApi->groups()->getMembers(config('services.vk.token'), [
            'group_id' => $groupId
        ]);

        return $members['count'];
    }


}


