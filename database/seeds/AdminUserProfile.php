<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Profile;

class AdminUserProfile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'customer',
            'description' => 'Customer Role',
        ]);
        $user = User::create([
            'email' => 'customer@app.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,

        ]);

        $profile = Profile::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Yusuf',
            'phone' => '+923212257340',
            'address' => 'Address Address Address Address Address Address Address Address ',
            'user_id' => $user->id,
            'slug' => 'muhammad-yusuf',
            'avatar' => 'uploads/users/avatars/customer.jpg',

        ]);

        $role = Role::create([
            'name' => 'admin',
            'description' => 'Admin Role',
        ]);
        $user = User::create([
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,

        ]);
        $profile = Profile::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Talhah',
            'phone' => '+923212257340',
            'address' => 'Address Address Address Address Address Address Address Address ',
            'user_id' => $user->id,
            'slug' => 'muhammad-talhah',
            'avatar' => 'uploads/users/avatars/admin.jpg',
        ]);

        $role = Role::create([
            'name' => 'superadmin',
            'description' => 'Super Admin Role',
        ]);
        $user = User::create([
            'email' => 'talhah.jan@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,

        ]);
        $profile = Profile::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Khalid',
            'phone' => '+923212257340',
            'address' => 'Address Address Address Address Address Address Address Address ',
            'user_id' => $user->id,
            'avatar' => 'uploads/users/avatars/superadmin.jpg',
            'slug' => 'muhammad-khalid',
            'provider' => '',
            'provider_id' => ''
        ]);
    }
}
