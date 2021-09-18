<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

class PostService
{
    public function save_posts_from_api()
    {
        try {
            $posts = Http::get(config('app.json_api_url') . '/posts')->collect();

            foreach($posts as $post){
                Post::updateOrCreate(
                    ['id' => $post['id']],
                    [
                        'title' => $post['title'],
                        'body' => $post['body'],
                        'user_id' => $post['userId']
                    ]
                );
            }
        } catch (\Exception $exception)
        {
            info($exception->getMessage());
        }
    }
}
