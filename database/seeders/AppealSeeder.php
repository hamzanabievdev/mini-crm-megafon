<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appeal;

class AppealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appeal::create(
            [
                'full_name' => 'Test 1',
                'phone' => '111111111',
                'personal_account' => '0102345678',
                'subject' => 'Test',
                'message' => 'test'
            ]
        );

        $this->command->info('Тестовое обращение успешно создано');
    }
}
