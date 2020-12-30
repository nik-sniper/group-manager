<?php


namespace App\Models\Groups\Services;

use App\Groups\Contracts\GroupServiceInterface;
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
     * @param string|null $search_text
     * @return array
     */
    public function getGroups(string $search_text = null): array
    {
        $response = $this->youtubeClient->search->listSearch('snippet', [
            'q' => $search_text,
            'type' => 'channel'
        ]);

        return $response->getItems();
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
}
