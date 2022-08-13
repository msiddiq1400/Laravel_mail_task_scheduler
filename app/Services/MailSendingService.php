<?php

namespace App\Services;

use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class MailSendingService
{
    protected $userRepo;
    protected $messageRepo;

    public function __construct(
        UserRepository $userRepo,
        MessageRepository $messageRepo
    ) {
        $this->userRepo = $userRepo;
        $this->messageRepo = $messageRepo;
    }

    public function sendEmails() 
    {
        //should use chunking incase of alot of users
        $users = $this->userRepo->getAllUsers();
        foreach($users as $user) {
            $sentMessages = $this->messageRepo->getSentMessages($user['id']);
            $toBeSend = $this->filterArray($sentMessages);
            if (sizeof($toBeSend)) {
                $randomItem = Arr::random($toBeSend, 1);
                $this->sendNewMessage($randomItem[0],$user['id'],$user['email']);
            }
        }
    }

    public function filterArray($data)
    {
        return array_keys(array_filter($data, fn($value) => is_null($value)));
    }

    public function sendNewMessage($messageId, $userId, $email)
    {
        $this->messageRepo->saveSentMessage($messageId, $userId);
        $mailString = $this->messageRepo->getMessageById($messageId);
        $this->basic_email($email,$mailString);
    }

    public function basic_email($email, $mailString) {
        $data = array('name'=>$mailString);
        Mail::send('mail', $data, function($message) use($email) {
           $message->to($email, 'User')->subject('Inspiring messages');
        });
    }
}