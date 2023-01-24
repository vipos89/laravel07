<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where(['name' => 'admin'])->first();

        $user =  \App\Models\User::first([
             'name' => 'Test User',
             'email' => 'admi@admin.com',
//             'password' => Hash::make('ololo')
         ]);
        $user->assignRole($role);

        $data = ['add product', 'upload image', 'blog publish'];
        foreach ($data as $item){
            $permission = Permission::create(['name' => $item]);
            $role->givePermissionTo($permission);
            $user = User::query()->inRandomOrder()->first();
            $user->givePermissionTo($permission);
        }



    }
}
