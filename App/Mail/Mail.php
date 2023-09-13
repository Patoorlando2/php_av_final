<?php

namespace App\Mail;

class Mail
{
    public $form;
    public $to;
    public $subject;
    public $body;

    public function __construct(
        $to = '',
        $subject = '',
        $body = '',
        $from = ''
    )  
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
        $this->from = $from;
    }
}