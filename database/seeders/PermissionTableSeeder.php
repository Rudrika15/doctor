<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'hospital-list',
            'hospital-create',
            'hospital-edit',
            'hospital-delete',
            'hospital-viewdetails',
            'doctor-create',
            'doctor-edit',
            'doctor-delete',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',
            'facility-create',
            'facility-edit',
            'facility-delete',
            'sociallink-create',
            'sociallink-edit',
            'sociallink-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            'hospitaltype-list',
            'hospitaltype-create',
            'hospitaltype-edit',
            'hospitaltype-delete',
            'specialist-list',
            'specialist-create',
            'specialist-edit',
            'specialist-delete',
          
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
