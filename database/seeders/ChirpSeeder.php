<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Chirp;

class ChirpSeeder extends Seeder
{
    public function run(): void
    {
        $names = ['Sheko', 'Fawzy', 'Sekiro'];
        $messages = ['first', 'second', 'third'];

        foreach (array_map(null, $names, $messages) as [$name, $message]) {
            $user = User::factory()->create([
                'name' => $name,
                'email' => strtolower($name) . '@gmail.com',
            ]);

            Chirp::factory()->create([
                'user_id' => $user->id,
                'message' => "This is the {$message} chirp",
            ]);
        }
    }
}
