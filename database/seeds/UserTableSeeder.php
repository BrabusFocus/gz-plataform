<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // User::create ([
      //   'name' => 'Stefhani',
      //   'username' => 'lola',
      //   'email' =>'fanygomez013@gmail.com',
      //   'password' => bcrypt('12345679'),
      //   'phone' => '123123213',
      //   'celphone' => '78000131',
      //   'nit' => '123123213',
      //   'address' => 'Pasaquina',
      //   'rol' => '0',
      //   'admin' => true,
      //   'state' => true,
      //   'gender' => true,
      //   'dui' => '123123213',
      //   'nrm' => ' ',
      //   'specialty' => '123123213',
      // ]);
      $users = factory(User::class,5)->create();

    }
}
