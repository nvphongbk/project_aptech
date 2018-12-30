<?php

use Illuminate\Database\Seeder;

class TheLoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('TheLoai')->insert([
        	['Ten' => 'Xã Hội'],
        	['Ten' => 'Thế Giới'],
        	['Ten' => 'Kinh Doanh'],
        	['Ten' => 'Văn Hoá'],
        	['Ten' => 'Thể Thao'],
        	['Ten' => 'Pháp Luật'],
        	['Ten' => 'Đời Sống'],
        	['Ten' => 'Khoa Học'],
        	['Ten' => 'Vi Tính']
    	]);

    }
}
