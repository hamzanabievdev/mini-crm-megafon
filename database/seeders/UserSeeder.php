<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //         'full_name' => 'Хамза Набиев',
        //         'login' => 'admin001',
        //         'email' => 'hamzanabiev.dev@gmail.com',
        //         'password' => Hash::make('12345'),
        //         'role' => 'admin'
        //     ]);

         User::updateOrCreate(
            [
                'login' => 'admin001', // основной уникальный идентификатор
            ],
            [
                'full_name' => 'Хамза Набиев',
                'email' => 'hamzanabiev.dev@gmail.com',
                'password' => Hash::make('54321'),
                'role' => 'admin'
            ]
        );

        $this->command->info('Тестовый пользователь успешно создан/обновлён');
    }
}
