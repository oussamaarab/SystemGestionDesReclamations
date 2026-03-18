<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  

public function run(): void
{
    Role::firstOrCreate(['name' => 'ADMIN']);
    Role::firstOrCreate(['name' => 'BUREAU_ORDRE']);
    Role::firstOrCreate(['name' => 'AGENT_SERVICE']);
    Role::firstOrCreate(['name' => 'LECTEUR']);
}
}
