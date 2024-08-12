<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostCreated
{
    use Dispatchable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        Log::notice('PostCreated is worked');
        
        $this->post = $post;
    }
}
