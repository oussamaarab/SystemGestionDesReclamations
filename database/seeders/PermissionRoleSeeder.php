<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'view_dashboard',
            'manage_divisions',
            'manage_services',
            'manage_users',
            'view_reclamations',
            'create_reclamations',
            'assign_reclamations',
            'transfer_reclamations',
            'respond_reclamations',
            'view_own_service',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'ADMIN']);
        $bureauOrdre = Role::firstOrCreate(['name' => 'BUREAU_ORDRE']);
        $agentService = Role::firstOrCreate(['name' => 'AGENT_SERVICE']);
        $lecteur = Role::firstOrCreate(['name' => 'LECTEUR']);

        $admin->syncPermissions($permissions);

        $bureauOrdre->syncPermissions([
            'view_dashboard',
            'view_reclamations',
            'create_reclamations',
            'assign_reclamations',
        ]);

        $agentService->syncPermissions([
            'view_dashboard',
            'view_reclamations',
            'transfer_reclamations',
            'respond_reclamations',
            'view_own_service',
        ]);

        $lecteur->syncPermissions([
            'view_dashboard',
            'view_reclamations',
        ]);
    }
}