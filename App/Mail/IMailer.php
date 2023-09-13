<?php

namespace App\Mail;

interface IMailer
{
    public function send(Mail $m);
}