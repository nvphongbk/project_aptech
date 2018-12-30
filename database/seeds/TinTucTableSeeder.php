<?php

use Illuminate\Database\Seeder;

class TinTucTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NoiDung = "
    	The Laravel framework has a few system requirements. Of course, all of these requirements are satisfied by the Laravel Homestead virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.
    	";
        DB::table('TinTuc')->insert([
        	['idLoaiTin'=>'1','TieuDe' => 'Lần đầu ĐH FPT cấp học bổng tiến sĩ ','TomTat' => 'Bên cạnh 400 suất học bổng Nguyễn Văn Đạo, ĐH FPT lần đầu tiên chọn ra 30 học sinh xuất sắc nhất để cấp học bổng toàn phần đào tạo từ cử nhân lên thẳng tiến sĩ, với tổng giá trị quỹ lên tới 5 triệu USD.','NoiDung' => $NoiDung,'Hinh' => '','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => '300 tỷ đồng phát triển giáo dục mầm non ','TomTat' => 'Bộ Giáo dục và Đào tạo đang xây dựng chương trình, mục tiêu quốc gia về giáo dục giai đoạn 2011-2015, trong đó dự kiến chi 300 tỷ đồng để phát triển giáo dục mầm non năm 2011. ','NoiDung' => $NoiDung,'Hinh' => '','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Nợ giáo viên tiền tỷ chi phí phổ cập giáo dục ','TomTat' => 'Ba năm qua, nhiều giáo viên ở Khánh Hòa bỏ công sức, kể cả tiền bạc để thực hiện phổ cập giáo dục cho học sinh trên địa bàn tỉnh, song đến nay vẫn chưa nhận được tiền chính quyền chi trả. ','NoiDung' => $NoiDung,'Hinh' => 'pho-cap-giao-duc-nho-2.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Đón và chăm sóc trẻ sau giờ tan trường qua dịch vụ ','TomTat' => 'Các bé sẽ được chăm sóc bữa ăn, tắm rửa sạch sẽ, vui chơi và học tập cùng cô giáo theo các nội dung trong sổ báo bài, mở rộng hoặc đào sâu kiến thức theo yêu cầu của phụ huynh. ','NoiDung' => $NoiDung,'Hinh' => 'be-2.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => '7 học sinh rơi từ tầng hai xuống đất vì gãy lan can ','TomTat' => 'Đang giờ ra chơi, bất ngờ toàn bộ lan can tầng hai của Trường THCS thị trấn Chợ Rã (Bắc Kạn) gãy đổ ra ngoài, kéo theo 7 học sinh lớp 6A rơi xuống đất. ','NoiDung' => $NoiDung,'Hinh' => 'tai_nan_set_top.gif','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Giáo viên TP HCM được thưởng tết tối thiểu 700.000 đồng ','TomTat' => 'Sở GD&ĐT TP HCM vừa có thông báo về việc UBND thành phố chấp thuận đề nghị hỗ trợ mức quà tết cho cán bộ công chức trong ngành tối thiểu là 700.000 đồng. Mức thưởng này cao hơn năm ngoái 100.000 đồng. ','NoiDung' => $NoiDung,'Hinh' => 'thuong-tet-3.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Mức sinh hoạt phí tối đa cho lưu học sinh là 1.200 USD ','TomTat' => 'Đối với lưu học sinh tại Ba Lan, Bungary, Nga..., mức sinh hoạt phí sẽ tăng từ 400 USD lên 480 USD; tại Australia, New Zealand tăng từ 860 USD lên 1.032 USD và tại Mỹ, Canada, Anh, Nhật Bản tăng từ 1.000 lên 1.200 USD một người một tháng... ','NoiDung' => $NoiDung,'Hinh' => 'du_hoc_sinh_set_sub.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Học sinh Hà Nội được nghỉ 11 ngày Tết ','TomTat' => 'UBND thành phố Hà Nội vừa đồng ý với đề xuất của Sở Giáo dục và Đào tạo về việc cho học sinh nghỉ tết Tết Nguyên đán Tân Mão 11 ngày. ','NoiDung' => $NoiDung,'Hinh' => 't2.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Hàng trăm nghìn học sinh nghỉ học vì giá rét ','TomTat' => 'Sớm nay, các trường tiểu học ở Hà Nội đều trưng biển thông báo nghỉ học do nhiệt độ ở mức 8 độ C. Một vài phụ huynh không theo dõi dự báo thời tiết vẫn đưa con đến trường và ngậm ngùi quay xe ra về. ','NoiDung' => $NoiDung,'Hinh' => 'phu_huynh_xem_lich_nghi_hoc_set_sub.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Phương pháp Mathnasium giúp trẻ yêu thích môn toán ','TomTat' => 'Phương pháp dạy toán Mathnasium với 5 kỹ thuật giảng dạy bổ sung nhau, giúp trẻ em tiếp thu kiến thức toán hiệu quả, không cảm thấy áp lực và nhàm chán. ','NoiDung' => $NoiDung,'Hinh' => 'hinh_250x195[1]_JPG_thumb210x0_ns.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'2','TieuDe' => 'Những nụ hôn ngọt ngào trong đêm tình nhân ','TomTat' => 'Tối 13/2, hàng nghìn bạn trẻ có mặt tại cầu Ánh Sao (quận 7, TP HCM) chứng kiến những lời tỏ tình cùng những nụ hôn ngọt ngào của 100 cặp tình nhân trong "Đêm Valentine thế kỷ". ','NoiDung' => $NoiDung,'Hinh' => '250h_jpg_thumb210x0_ns.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'2','TieuDe' => 'Hot girl tâm sự về ngày Valentine ','TomTat' => 'Một bông hồng trắng bằng khăn giấy, chiếc xe đạp gắn đầy hoa, hay bài thơ của chàng "thi sĩ" vô danh gửi tặng… là những món quà đầy ấn tượng mà hot girl Midu từng nhận được trong các mùa Valentine. ','NoiDung' => $NoiDung,'Hinh' => 'hot-girl-valentine-2.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'2','TieuDe' => 'Nên duyên chồng vợ từ mạng mai mối ','TomTat' => 'Quen nhau qua trang web kết bạn, để chiếm được tình cảm của cô nàng cao tới 1,71 m, chàng trai cao 1,58 m kiên trì tỏ tình tới 10 lần và hạnh phúc đã mỉm cười với họ. ','NoiDung' => $NoiDung,'Hinh' => 'cap_doi_hoan_hao_set_sub.jpg','NoiBat' => 1]
            ]);
        }
    }
