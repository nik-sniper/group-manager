<?php


namespace App\Common\Services;


use App\Common\Traits\SocialGroupTrait;
use VK\Client\VKApiClient;

class SocialGroupService
{
    protected VKApiClient $vkApi;

    public function __construct(VKApiClient $VKApiClient)
    {
        $this->vkApi = $VKApiClient;
    }
}
