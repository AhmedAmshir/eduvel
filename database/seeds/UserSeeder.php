<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(\App\User::class)->create([
            'email' => 'mm@mm.mm',
            'password' => bcrypt(123123)
        ]);
        $admin->assignRole('Admin');

        $teacher = App\User::create([
            'uniqid' => '5b154bef024f0',
            'image' => 'user-image.png',
            'name' => 'Name Teacher',
            'email' => 'tt@tt.tt',
            'password' => bcrypt(123123), // secret
            'remember_token' => str_random(10),
            'confirmed' => 1,
        ]);
        $teacher->assignRole('Teacher');

        $student = App\User::create([
            'uniqid' => '5b154bef02400',
            'image' => 'user-image.png',
            'name' => 'Name Student',
            'email' => 'ss@ss.ss',
            'password' => bcrypt(123123), // secret
            'remember_token' => str_random(10),
            'confirmed' => 1,
        ]);
        $student->assignRole('Student');
    }
}
