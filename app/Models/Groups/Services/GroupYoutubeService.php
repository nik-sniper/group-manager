<?php


namespace App\Models\Groups\Services;

use App\Groups\Contracts\GroupServiceInterface;
use App\Models\Groups\Group;
use App\Models\Groups\GroupYoutube;
use Google_Client;
use Google_Service_YouTube;

class GroupYoutubeService implements GroupServiceInterface
{
    /** @var Google_Service_YouTube $youtubeClient */
    protected Google_Service_YouTube $youtubeClient;

    /**
     * GroupYoutubeService constructor.
     * @param Google_Client $google_Client
     * @param string $token
     */
    public function __construct(Google_Client $google_Client, string $token)
    {
        $google_Client->setDeveloperKey($token);
        $this->youtubeClient = new Google_Service_YouTube($google_Client);
    }

    /**
     * @param array $options
     * @return array
     */
    public function getGroups(array $options): array
    {
        $options = array_merge($options, ['type' => 'channel']);
        $response = $this->youtubeClient->search->listSearch('snippet', $options);

        $result = $response->getItems();
        $result['nextPageToken'] = $response->nextPageToken;

        return $result;
    }

    /**
     * @param string $groupId
     * @return int
     */
    public function getMembers(string $groupId): int
    {
        $response = $this->youtubeClient->channels->listChannels('snippet, statistics', [
            'id' => $groupId
        ]);

        return $response->getItems()[0]->getStatistics()->subscriberCount;
    }

    /**
     * @param $data
     * @return array
     */
    public function toValidFormat($data): array
    {
        return [
            'name' => $data->channelTitle,
            'provider' => Group::PROVIDER_YOUTUBE,
            'provider_id' => $data->channelId,
            'slug' => $data->channelId,
        ];
    }

    /**
     * @param array|\Google_Service_YouTube_SearchResult $dataGroup
     * @return Group
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function writeGroup($dataGroup): Group
    {
        $data = $this->toValidFormat($dataGroup->getSnippet());

        $group = Group::firstOrCreate([
            'provider' => $data['provider'],
            'provider_id' => $data['provider_id']
        ], $data);

        if (! $group->hasMedia()) {
            $group->addMediaFromUrl($dataGroup->getSnippet()->thumbnails->high->url)->toMediaCollection();
        }

        return $group;
    }
}
