<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostCreatedNotification;
use App\Events\PostCreated;
use App\Models\User;

class SendPostCreatedNotification implements ShouldQueue
{
    public function handle(PostCreated $event): void
    {
        $users = User::where('id', '!=', $event->post->author_id)->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new PostCreatedNotification($event->post));
        }
    }
}
