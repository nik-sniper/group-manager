<?php


namespace App\Models\Groups\Services;


use App\Groups\Contracts\GroupServiceInterface;
use VK\Client\VKApiClient;

class GroupVKService implements GroupServiceInterface
{
    /** @var VKApiClient $vkApi */
    protected VKApiClient $vkApi;

    /** @var string $token */
    protected string $token;

    /**
     * GroupVKService constructor.
     * @param VKApiClient $VKApiClient
     * @param string $token
     */
    public function __construct(VKApiClient $VKApiClient, string $token)
    {
        $this->vkApi = $VKApiClient;
        $this->token = $token;
    }

    /**
     * @param string|null $search_text
     * @return array
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function getGroups(string $search_text = null) : array
    {
        $groups = $this->vkApi->groups()->search($this->token, [
            'q' => $search_text
        ]);

        return $groups;
    }

    /**
     * @param string $groupId
     * @return int
     * @throws \VK\Exceptions\Api\VKApiParamGroupIdException
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function getMembers(string $groupId): int
    {
        $members = $this->vkApi->groups()->getMembers($this->token, [
            'group_id' => $groupId
        ]);

        return $members['count'];
    }
}
