<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertsSeeder extends Seeder
{
    public function run()
    {
        DB::table('alerts')->insert([
            'name' => 'Mayra Argumé',
            'email' => 'mayraaq@gmail.com',
            'enabled' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}