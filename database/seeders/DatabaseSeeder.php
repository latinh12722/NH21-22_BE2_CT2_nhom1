<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufactures')->insert([
            ['manu_Name' => 'Apple'],
            ['manu_Name' => 'Samsung'],
            ['manu_Name' => 'Dell'],
            ['manu_Name' => 'Acer'],
            ['manu_Name' => 'Logitech'],
            ['manu_Name' => 'Akko'],
            ['manu_Name' => 'Xiaomi'],
            ['manu_Name' => 'Razer'],
        ]);
        DB::table('protypes')->insert([
            ['type_Name' => 'Phone'],
            ['type_Name' => 'Laptop'],
            ['type_Name' => 'Keyboard'],
            ['type_Name' => 'Mouse'],
            ['type_Name' => 'Headphone'],
        ]);
        // User::factory(10)->create();
        DB::table('products')->insert([
            [
                'product_Name' => 'Acer Nitro 5 Gaming AN515 57 54AF',
                'product_Price' => 27990000,
                'manu_Id' => '4',
                'type_Id' => '2',
                'product_image' => 'acer-nitro-5-an515-57-54af-i5-11400h-16gb-512gb-600x600.jpg',
                'product_description' => 'Máy tính xách tay Acer Nitro 5 được trang bị bộ vi xử lý Intel Core i5 với 6 nhân 12 luồng mang đến tốc độ cơ bản 2.70 GHz và đạt tối đa lên đến 4.5 GHz nhờ Turbo Boost, mang đến hiệu suất công việc đáng kinh ngạc, cho bạn thoải mái xử lý các tác vụ văn phòng cùng bộ ứng dụng nhà Microsoft Office, đồng thời cho bạn tận hưởng các trận chiến game một cách mượt mà và thỏa mãn nhất.',
                'product_sale' => 20,
                'product_feature' => 0
            ],
            [
                'product_Name' => 'Dell XPS 13 9310 i7 1165G7 (JGNH62)',
                'product_Price' => 59490000,
                'manu_Id' => '3',
                'type_Id' => '2',
                'product_image' => 'dell-xps-13-9310-i7-jgnh62-600x600.jpg',
                'product_description' => 'Laptop Dell XPS 13 9310 i7 1165G7 (JGNH62), sự kết hợp hoàn mỹ giữa hiệu năng, khả năng phản hồi cùng hình ảnh ảnh sắc nét cho một dòng máy tính xách tay thời trang đầy sang trọng.',
                'product_sale' => 5,
                'product_feature' => 1
            ],[
                'product_Name' => 'iPhone 12 64GB',
                'product_Price' => 500000,
                'manu_Id' => '1',
                'type_Id' => '1',
                'product_image' => 'iphone-12-xanh-duong-new-2-600x600.jpg',
                'product_description' => 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.',
                'product_sale' => 10,
                'product_feature' => 1
            ],
            [
                'product_Name' => 'Samsung Galaxy Z Fold3 5G 512GB',
                'product_Price' => 500000,
                'manu_Id' => '2',
                'type_Id' => '1',
                'product_image' => 'samsung-galaxy-z-fold-3-green-1-600x600.jpg',
                'product_description' => 'Galaxy Z Fold3 5G đánh dấu bước tiến mới của Samsung trong phân khúc điện thoại gập cao cấp khi được cải tiến về độ bền cùng những nâng cấp đáng giá về cấu hình hiệu năng, hứa hẹn sẽ mang đến trải nghiệm sử dụng đột phá cho người dùng.',
                'product_sale' => 9,
                'product_feature' => 1
            ],[
                'product_Name' => 'Samsung Galaxy S20 FE (8GB/256GB)',
                'product_Price' => 12900000,
                'manu_Id' => '2',
                'type_Id' => '1',
                'product_image' => 'samsung-galaxy-s20-fan-edition-090320-040338-600x600.jpg',
                'product_description' => 'Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn',
                'product_sale' => 30,
                'product_feature' => 0
            ],[
                'product_Name' => 'Bàn phím Apple Magic Keyboard 2',
                'product_Price' => 2850000,
                'manu_Id' => '1',
                'type_Id' => '3',
                'product_image' => 'keyboard-macbook-gen-2.jpg',
                'product_description' => 'Bàn phím Apple Magic Keyboard 2 – Thiết kế nhỏ gọn, cảm giác gõ êm ái
                Nếu bạn là một người hay soạn thảo bằng trên iPad và gặp vấn đề khó khăn khi gõ chữ thì bàn phím bluetooth Apple Magic Keyboard 2 chính là sản phẩm không thể thiếu. Phụ kiện Apple Magic Keyboard 2 sở hữu một thiết kế nhỏ gọn, tinh tế với phím bấm êm ái, hứa hẹn sẽ đáp ứng tốt nhu cầu của mọi người dùng.',
                'product_sale' => 14,
                'product_feature' => 0
            ],[
                'product_Name' => 'Bàn phím Smart Keyboard iPad Pro 11 2020',
                'product_Price' => 4850000,
                'manu_Id' => '1',
                'type_Id' => '3',
                'product_image' => 'mu8g2ll_2.jpg',
                'product_description' => 'Bàn phím Smart Keyboard iPad Pro 11 2020 – Hỗ trợ công việc văn phòng chuyên nghiệp
                Chắc hẳn bạn cũng đã biết, chiếc iPad Pro 11 2020 mới vừa được ra mắt cũng sở hữu khả năng biến thành một chiếc laptop nhờ vào hỗ trợ bàn phím rời. Do đó, để công việc của bạn được hoàn thành nhanh chóng hãy sở hữu ngay bàn phím không dây bluetooth Smart Keyboard iPad Pro 11 2020.
                
                Chất lượng cao cấp: độ nảy cao, hành trình phím vừa đủ, tích hợp nhiều phím tắt
                Mặc dù bàn phím Smart Keyboard iPad Pro 11 2020 mang vẻ ngoài khá mỏng và gọn nhưng nó vẫn được tích hợp đầy đủ phím và những phím tắt quan trọng. Bao gồm: khả năng chuyển đổi nhanh giữa các ứng dụng, sao chép nhanh cả một văn bản,…',
                'product_sale' => 30,
                'product_feature' => 1
            ],[
                'product_Name' => 'Apple Magic Keyboard 2',
                'product_Price' => 2850000,
                'manu_Id' => '1',
                'type_Id' => '3',
                'product_image' => 'keyboard-macbook-gen-2.jpg',
                'product_description' => 'Bàn phím Apple Magic Keyboard 2 – Thiết kế nhỏ gọn, cảm giác gõ êm ái
                Nếu bạn là một người hay soạn thảo bằng trên iPad và gặp vấn đề khó khăn khi gõ chữ thì bàn phím bluetooth Apple Magic Keyboard 2 chính là sản phẩm không thể thiếu. Phụ kiện Apple Magic Keyboard 2 sở hữu một thiết kế nhỏ gọn, tinh tế với phím bấm êm ái, hứa hẹn sẽ đáp ứng tốt nhu cầu của mọi người dùng.',
                'product_sale' => 20,
                'product_feature' => 1
            ],[
                'product_Name' => 'AKKO 3108 Silent (Akko Switch v2)',
                'product_Price' => 4850000,
                'manu_Id' => '1',
                'type_Id' => '3',
                'product_image' => '3108-Silent-768x768.png',
                'product_description' => 'Thiết kế bắt mắt ưa nhìn Với nhiều kiểu dáng đẹp mắt cùng bộ keycaps cực “thời trang”. Mẫu bàn phím Akko 3108 Silent mang đến một tông màu nhẹ nhàng nhưng có phần thu hút nổi bật.',
                'product_sale' => 40,
                'product_feature' => 1
            ],[
                'product_Name' => 'Smart phone Xiaomi Mi 11 5G',
                'product_Price' => 1600000,
                'manu_Id' => '1',
                'type_Id' => '1',
                'product_image' => 'xiaomi-mi-11-xanhduong-1-org.jpg',
                'product_description' => 'Xiaomi Mi 11 một siêu phẩm đến từ Xiaomi, máy cho trải nghiệm hiệu năng hàng đầu với vi xử lý Qualcomm Snapdragon 888, cùng loạt công nghệ đỉnh cao, khiến bất kỳ ai cũng sẽ choáng ngợp về smartphone này.',
                'product_sale' => 30,
                'product_feature' => 0
            ]
        ]);
    }
}
