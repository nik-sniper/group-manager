<?php

namespace App\Jobs;

use App\Models\Groups\Group;
use App\Models\Groups\Services\GroupYoutubeService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchDataGroupsYoutube implements ShouldQueue
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
     * @param GroupYoutubeService $service
     */
    public function handle(GroupYoutubeService $service)
    {
        $search_text = config('search.' . Group::PROVIDER_YOUTUBE);

        foreach ($search_text as $text) {
            $token = '';
            for ($i = 0; $i < $this->limit; $i++) {
                $groups = $service->getGroups([
                    'q' => $text,
                    'pageToken' => $token
                ]);

                $token = $groups['nextPageToken'];
                dispatch(new WriteGroups($groups, $service))->onQueue(Group::PROVIDER_YOUTUBE);
            }
        }
    }
}
