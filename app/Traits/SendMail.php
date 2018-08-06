<?php

namespace App\Traits;

use App\User;
use Illuminate\Support\Facades\Mail;
use stdClass;

trait SendMail
{
    public function testMailTemplate(User $user){

        $data = new stdClass();
        $data->username = $user->name;
        $data->message = __('passwords.reset');

        Mail::send('emails.template', ['data' => $data], function($message) {
            $message->to('admin@admin.com');
        });

    }
}