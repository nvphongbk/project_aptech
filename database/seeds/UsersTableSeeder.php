<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert(
            [
                'name' => 'Phong',
                'email' => 'nvphongbk@gmail.com',
                'password' => bcrypt('123123'),
                'quyen'=> 1,
                'created_at' => new DateTime(),
            ]
        );
    }
}
