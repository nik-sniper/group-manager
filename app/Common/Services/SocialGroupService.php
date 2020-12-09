<?php


namespace App\Common\Services;


use App\Common\Traits\SocialGroupTrait;
use League\Flysystem\Config;
use VK\Actions\Groups;
use VK\Client\VKApiClient;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class SocialGroupService
{
    protected VKApiClient $vkApi;

    public function __construct(VKApiClient $VKApiClient)
    {
        $this->vkApi = $VKApiClient;
    }

    public function search()
    {

        $response = $this->vkApi->groups()->search(config('services.vk.token'), [
                    'q' => 'All'
                ]);

        return $response;
    }

}


