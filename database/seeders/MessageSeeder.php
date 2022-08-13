<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'id' => 1,
            'message' => '1 - Life is available only in the present moment.',
        ]);

        Message::create([
            'id' => 2,
            'message' => '2 - The biggest battle is the war against ignorance.',
        ]);

        Message::create([
            'id' => 3,
            'message' => '3 - When there is no desire, all things are at peace.',
        ]);

        Message::create([
            'id' => 4,
            'message' => '4 - Breathing in, I calm body and mind. Breathing out, I smile.',
        ]);

        Message::create([
            'id' => 5,
            'message' => '5 - People find pleasure in different ways. I find it in keeping my mind clear.',
        ]);

        Message::create([
            'id' => 6,
            'message' => '6 - Because you are alive, everything is possible.',
        ]);

        Message::create([
            'id' => 7,
            'message' => '7 - Let all your things have their places; let each part of your business have its time.',
        ]);

        Message::create([
            'id' => 8,
            'message' => '8 - The best way to take care of the future is to take care of the present moment.',
        ]);

        Message::create([
            'id' => 9,
            'message' => '9 - Nothing worth having comes easy.',
        ]);

        Message::create([
            'id' => 10,
            'message' => '10 - Always remember that you are absolutely unique. Just like everyone else.',
        ]);
    }
}