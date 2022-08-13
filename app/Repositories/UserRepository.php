<?php

namespace App\Repositories;

use App\Models\Message;
use App\Models\MessageSent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;

class UserRepository
{
    public function register($data)
    {
        $user = new User();
        $user->email = $data['email'];
        $user->save();
        return $user;
    }

    public function getAllUsers()
    {
        return User::all()->toArray();
    }
}