<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermissionAndRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'seller']);
        $siparisler = Permission::firstOrCreate(['name' => 'siparisler']);
        $role->givePermissionTo($siparisler);
        $profileEdit = Permission::firstOrCreate(['name' => 'profile.edit']);
        $role->givePermissionTo($profileEdit);
        $profileUpdate = Permission::firstOrCreate(['name' => 'profile.update']);
        $role->givePermissionTo($profileUpdate);
        $profileDestroy = Permission::firstOrCreate(['name' => 'profile.destroy']);
        $role->givePermissionTo($profileDestroy);
        $urunler = Permission::firstOrCreate(['name' => 'urunler']);
        $role->givePermissionTo($urunler);
        $urunekle = Permission::firstOrCreate(['name' => 'urunekle']);
        $role->givePermissionTo($urunekle);
        $productsIndex = Permission::firstOrCreate(['name' => 'products.index']);
        $role->givePermissionTo($productsIndex);
        $ProductCreate = Permission::firstOrCreate(['name' => 'Product.create']);
        $role->givePermissionTo($ProductCreate);
        $productsDelete = Permission::firstOrCreate(['name' => 'products.delete']);
        $role->givePermissionTo($productsDelete);
        $dashboard = Permission::firstOrCreate(['name' => 'dashboard']);
        $role->givePermissionTo($dashboard);
        $users=Permission::firstOrCreate(['name' => 'users']);

        $role = Role::firstOrCreate(['name' => 'writter']);
        $urunler = Permission::firstOrCreate(['name' => 'urunler']);
        $role->givePermissionTo($urunler);
        $urunekle = Permission::firstOrCreate(['name' => 'urunekle']);
        $role->givePermissionTo($urunekle);
        $productsIndex = Permission::firstOrCreate(['name' => 'products.index']);
        $role->givePermissionTo($productsIndex);
        $ProductCreate = Permission::firstOrCreate(['name' => 'Product.create']);
        $role->givePermissionTo($ProductCreate);
        $productsDelete = Permission::firstOrCreate(['name' => 'products.delete']);
        $siparisler = Permission::firstOrCreate(['name' => 'siparisler']);
        $role->givePermissionTo($siparisler);
        $profileEdit = Permission::firstOrCreate(['name' => 'profile.edit']);
        $role->givePermissionTo($profileEdit);
        $profileUpdate = Permission::firstOrCreate(['name' => 'profile.update']);
        $role->givePermissionTo($profileUpdate);
        $profileDestroy = Permission::firstOrCreate(['name' => 'profile.destroy']);


        $notifications = Permission::firstOrCreate(['name' => 'notifications']);
        $notifications = Permission::firstOrCreate(['name' => 'notifications.delete']);
        $notificationsCreate = Permission::firstOrCreate(['name' => 'notificationsCreate']);
        $role = Role::firstOrCreate(['name' => 'super admin']);
        $role->givePermissionTo(Permission::all());

       /// $permission->assignRole($role);
    }
}
