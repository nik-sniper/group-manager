<?php


namespace App\Models\Groups\Services;


use App\Groups\Contracts\GroupServiceInterface;
use App\Models\Groups\Group;
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
     * @param array $options
     * @return array
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function getGroups(array $options) : array
    {
        $groups = $this->vkApi->groups()->search($this->token, $options);

        return $groups['items'];
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

    /**
     * @param $data
     * @return array
     */
    public function toValidFormat($data): array
    {
        return [
            'name' => $data['name'],
            'provider' => Group::PROVIDER_VK,
            'provider_id' => $data['id'],
            'slug' => $data['screen_name']
        ];
    }

    /**
     * @param array|object $dataGroup
     * @return Group
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function writeGroup($dataGroup): Group
    {
        $data = $this->toValidFormat($dataGroup);

        $group = Group::firstOrCreate([
            'provider' => $data['provider'],
            'provider_id' => $data['provider_id']
        ], $data);

        if (! $group->hasMedia()) {
            $group->addMediaFromUrl($dataGroup['photo_200'])->toMediaCollection();
        }

        return $group;
    }
}
