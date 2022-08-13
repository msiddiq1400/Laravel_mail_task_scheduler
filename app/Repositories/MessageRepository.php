<?php

namespace App\Repositories;

use App\Models\Message;
use App\Models\MessageSent;
use App\Models\User;

class MessageRepository
{
    public function getSentMessages($userId) 
    {
        return Message::select(
            'messages.id',
            'messages.message',
            'messages_sent.user_id',
            'messages_sent.message_id'
        )
        ->leftjoin('messages_sent', function($join) use ($userId) {
            $join->on('messages_sent.message_id', '=', 'messages.id')
                ->where('messages_sent.user_id',$userId);
        })
        ->get()
        ->pluck('message_id','id')
        ->toArray();
    }

    public function saveSentMessage($messageId, $userId)
    {
        $newSentMessage = new MessageSent();
        $newSentMessage->message_id = $messageId;
        $newSentMessage->user_id = $userId;
        $newSentMessage->save();
        return $newSentMessage;
    }

    public function getMessageById($messageId)
    {
        return Message::find($messageId)->message;
    }
}