<?php

use Illuminate\Database\Seeder;

class LoaiTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('LoaiTin')->insert([
        	['idTheLoai'=>'1','Ten' => 'Giáo Dục'],
        	['idTheLoai'=>'1','Ten' => 'Nhịp Điệu Trẻ'],
        	['idTheLoai'=>'1','Ten' => 'Du Lịch'],
        	['idTheLoai'=>'1','Ten' => 'Du Học'],
        	['idTheLoai'=>'2','Ten' => 'Cuộc Sống Đó Đây'],
        	['idTheLoai'=>'2','Ten' => 'Ảnh'],
        	['idTheLoai'=>'2','Ten' => 'Người Việt 5 Châu'],
        	['idTheLoai'=>'2','Ten' => 'Phân Tích'],
        	['idTheLoai'=>'3','Ten' => 'Chứng Khoán'],
        	['idTheLoai'=>'3','Ten' => 'Bất Động Sản'],
        	['idTheLoai'=>'3','Ten' => 'Doanh Nhân'],
        	['idTheLoai'=>'3','Ten' => 'Quốc Tế'],
        	['idTheLoai'=>'3','Ten' => 'Mua Sắm'],
        	['idTheLoai'=>'3','Ten' => 'Doanh Nghiệp Viết'],
        	['idTheLoai'=>'4','Ten' => 'Hoa Hậu'],
        	['idTheLoai'=>'4','Ten' => 'Nghệ Sỹ'],
        	['idTheLoai'=>'4','Ten' => 'Âm Nhạc'],
        	['idTheLoai'=>'4','Ten' => 'Thời Trang'],
        	['idTheLoai'=>'4','Ten' => 'Điện Ảnh'],
        	['idTheLoai'=>'4','Ten' => 'Mỹ Thuật'],
        	['idTheLoai'=>'5','Ten' => 'Bóng Đá'],
        	['idTheLoai'=>'5','Ten' => 'Tennis'],
        	['idTheLoai'=>'5','Ten' => 'Chân Dung'],
        	['idTheLoai'=>'5','Ten' => 'Ảnh'],
        	['idTheLoai'=>'6','Ten' => 'Hình Sự']
    	]);
    }
}


