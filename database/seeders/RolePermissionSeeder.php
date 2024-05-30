<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-staff']);
        Permission::create(['name' => 'edit-staff']);
        Permission::create(['name' => 'hapus-staff']);
        Permission::create(['name' => 'lihat-staff']);

        Permission::create(['name' => 'tambah-buah']);
        Permission::create(['name' => 'edit-buah']);
        Permission::create(['name' => 'hapus-buah']);
        Permission::create(['name' => 'lihat-buah']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'pembeli']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-staff');
        $roleAdmin->givePermissionTo('edit-staff');
        $roleAdmin->givePermissionTo('hapus-staff');
        $roleAdmin->givePermissionTo('lihat-staff');

        $roleStaff = Role::findByName('staff');
        $roleStaff->givePermissionTo('tambah-buah');
        $roleStaff->givePermissionTo('edit-buah');
        $roleStaff->givePermissionTo('hapus-buah');
        $roleStaff->givePermissionTo('lihat-buah');
    }
}
