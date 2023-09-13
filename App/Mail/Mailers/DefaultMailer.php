<?php

namespace App\Mail\Mailers;

use App\Mail\IMailer;
use App\Mail\Mail;

class DefaultMailer implements IMailer
{
    public function send(Mail $m)
    {
        return mail($m->to, $m->subject, $m->body);
    }
}