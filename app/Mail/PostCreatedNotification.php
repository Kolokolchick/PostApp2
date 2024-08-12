<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostCreatedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build()
    {
        return $this->subject('New Post Created')
                    ->text('emails.posts.created')
                    ->with(['post' => $this->post]);
    }
}