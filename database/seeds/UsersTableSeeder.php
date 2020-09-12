<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['a','u'];
       foreach ($roles as $role) {
         $save_user = new User;
         if ($role == 'a') {
           $save_user->name = 'Super Admin';
           $save_user->email ='root@root.com';
           $save_user->password =  bcrypt('rootroot');
        }elseif($role == 'u') {
           $save_user->name = 'User';
           $save_user->email ='User@ekselin.com';
           $save_user->password =  bcrypt('123456');
        }
         $save_user->role = $role;
         $save_user->save();
    }
    }
}
