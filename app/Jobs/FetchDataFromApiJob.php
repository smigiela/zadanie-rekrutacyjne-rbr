<?php

namespace App\Jobs;

use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchDataFromApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var PostService
     */
    private $postService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserService $userService, PostService $postService)
    {
        $this->userService = $userService;
        $this->postService = $postService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->userService->save_users_from_api();
        $this->postService->save_posts_from_api();
    }
}
