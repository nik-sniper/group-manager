<?php

namespace App\Jobs;

use App\Models\Groups\Group;
use App\Models\Groups\Services\GroupVKService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchDataGroupsVk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $limit = 10;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param GroupVKService $service
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function handle(GroupVKService $service)
    {
        $search_text = config('search.' . Group::PROVIDER_VK);

        foreach ($search_text as $text) {
            $offset = 0;
            for ($i = 0; $i < $this->limit; $i++) {
                $groups = $service->getGroups([
                    'q' => $text,
                    'offset' => $offset
                ]);

                $offset = $offset + count($groups);
                dispatch(new WriteGroups($groups, $service))->onQueue(Group::PROVIDER_VK);
            }
        }
    }
}
