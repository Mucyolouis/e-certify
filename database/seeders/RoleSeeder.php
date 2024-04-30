<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'Super Admin']);
        $christian = Role::create(['name' => 'Christian']);
        $clergy = Role::create(['name' => 'Clergy']);

        $clergy->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'edit-baptism',
            'delete-baptism',
            'manage-baptism',
            'edit-marriage',
            'delete-marriage',
            'manage-marriage',
            'generate-report',
            'access-all-records',
            'view-data-report',
        ]);

        $christian->givePermissionTo([
            'create-baptism',
            'create-marriage',
            'can-download-pdf',
            
        ]);
        
    }
}
