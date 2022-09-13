<?php

namespace App\Listeners;

use App\Events\OrderDone;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Laratrust\Traits\LaratrustUserTrait;

class SendEmailToAdmin
{
    use LaratrustUserTrait;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderDone  $event
     * @return void
     */
    public function handle(OrderDone $event)
    {

        $users = User::all();
        foreach ($users as $user)
        {
           if($user->hasRole('admin'))
           {
               Mail::send('emails.mailEvent', $user, function($message) use ($user) {
                   $message->to($user['email']);
                   $message->subject('Event Testing');
               });
           }
        }

    }
}
