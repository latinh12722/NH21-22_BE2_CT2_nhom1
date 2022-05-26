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
            ['manu_name' => 'Apple'],
            ['manu_name' => 'Samsung'],
            ['manu_name' => 'Dell'],
            ['manu_name' => 'Acer'],
            ['manu_name' => 'Logitech'],
            ['manu_name' => 'Akko'],
            ['manu_name' => 'Xiaomi'],
            ['manu_name' => 'Razer'],
        ]);
        DB::table('protypes')->insert([
            ['type_name' => 'Phone'],
            ['type_name' => 'Laptop'],
            ['type_name' => 'Keyboard'],
            ['type_name' => 'Mouse'],
            ['type_name' => 'Headphone'],
        ]);
        // User::factory(10)->create();
        DB::table('products')->insert([
            [
                'product_name' => 'Acer Nitro 5 Gaming AN515 57 54AF',
                'product_price' => 27990000,
                'manu_id' => '4',
                'type_id' => '2',
                'product_image' => 'acer-nitro-5-an515-57-54af-i5-11400h-16gb-512gb-600x600.jpg',
                'product_description' => 'Máy tính xách tay Acer Nitro 5 được trang bị bộ vi xử lý Intel Core i5 với 6 nhân 12 luồng mang đến tốc độ cơ bản 2.70 GHz và đạt tối đa lên đến 4.5 GHz nhờ Turbo Boost, mang đến hiệu suất công việc đáng kinh ngạc, cho bạn thoải mái xử lý các tác vụ văn phòng cùng bộ ứng dụng nhà Microsoft Office, đồng thời cho bạn tận hưởng các trận chiến game một cách mượt mà và thỏa mãn nhất.',
                'product_sale' => 20,
                'product_feature' => 0
            ],
            [
                'product_name' => 'Dell XPS 13 9310 i7 1165G7 (JGNH62)',
                'product_price' => 59490000,
                'manu_id' => '3',
                'type_id' => '2',
                'product_image' => 'dell-xps-13-9310-i7-jgnh62-600x600.jpg',
                'product_description' => 'Laptop Dell XPS 13 9310 i7 1165G7 (JGNH62), sự kết hợp hoàn mỹ giữa hiệu năng, khả năng phản hồi cùng hình ảnh ảnh sắc nét cho một dòng máy tính xách tay thời trang đầy sang trọng.',
                'product_sale' => 5,
                'product_feature' => 1
            ], [
                'product_name' => 'iPhone 12 64GB',
                'product_price' => 500000,
                'manu_id' => '1',
                'type_id' => '1',
                'product_image' => 'iphone-12-xanh-duong-new-2-600x600.jpg',
                'product_description' => 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.',
                'product_sale' => 10,
                'product_feature' => 1
            ],
            [
                'product_name' => 'Samsung Galaxy Z Fold3 5G 512GB',
                'product_price' => 500000,
                'manu_id' => '2',
                'type_id' => '1',
                'product_image' => 'samsung-galaxy-z-fold-3-green-1-600x600.jpg',
                'product_description' => 'Galaxy Z Fold3 5G đánh dấu bước tiến mới của Samsung trong phân khúc điện thoại gập cao cấp khi được cải tiến về độ bền cùng những nâng cấp đáng giá về cấu hình hiệu năng, hứa hẹn sẽ mang đến trải nghiệm sử dụng đột phá cho người dùng.',
                'product_sale' => 9,
                'product_feature' => 1
            ], [
                'product_name' => 'Samsung Galaxy S20 FE (8GB/256GB)',
                'product_price' => 12900000,
                'manu_id' => '2',
                'type_id' => '1',
                'product_image' => 'samsung-galaxy-s20-fan-edition-090320-040338-600x600.jpg',
                'product_description' => 'Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn',
                'product_sale' => 30,
                'product_feature' => 0
            ], [
                'product_name' => 'Bàn phím Apple Magic Keyboard 2',
                'product_price' => 2850000,
                'manu_id' => '1',
                'type_id' => '3',
                'product_image' => 'keyboard-macbook-gen-2.jpg',
                'product_description' => 'Bàn phím Apple Magic Keyboard 2 – Thiết kế nhỏ gọn, cảm giác gõ êm ái
                Nếu bạn là một người hay soạn thảo bằng trên iPad và gặp vấn đề khó khăn khi gõ chữ thì bàn phím bluetooth Apple Magic Keyboard 2 chính là sản phẩm không thể thiếu. Phụ kiện Apple Magic Keyboard 2 sở hữu một thiết kế nhỏ gọn, tinh tế với phím bấm êm ái, hứa hẹn sẽ đáp ứng tốt nhu cầu của mọi người dùng.',
                'product_sale' => 14,
                'product_feature' => 0
            ], [
                'product_name' => 'Bàn phím Smart Keyboard iPad Pro 11 2020',
                'product_price' => 4850000,
                'manu_id' => '1',
                'type_id' => '3',
                'product_image' => 'mu8g2ll_2.jpg',
                'product_description' => 'Bàn phím Smart Keyboard iPad Pro 11 2020 – Hỗ trợ công việc văn phòng chuyên nghiệp
                Chắc hẳn bạn cũng đã biết, chiếc iPad Pro 11 2020 mới vừa được ra mắt cũng sở hữu khả năng biến thành một chiếc laptop nhờ vào hỗ trợ bàn phím rời. Do đó, để công việc của bạn được hoàn thành nhanh chóng hãy sở hữu ngay bàn phím không dây bluetooth Smart Keyboard iPad Pro 11 2020.
                
                Chất lượng cao cấp: độ nảy cao, hành trình phím vừa đủ, tích hợp nhiều phím tắt
                Mặc dù bàn phím Smart Keyboard iPad Pro 11 2020 mang vẻ ngoài khá mỏng và gọn nhưng nó vẫn được tích hợp đầy đủ phím và những phím tắt quan trọng. Bao gồm: khả năng chuyển đổi nhanh giữa các ứng dụng, sao chép nhanh cả một văn bản,…',
                'product_sale' => 30,
                'product_feature' => 1
            ], [
                'product_name' => 'Apple Magic Keyboard 2',
                'product_price' => 2850000,
                'manu_id' => '1',
                'type_id' => '3',
                'product_image' => 'keyboard-macbook-gen-2.jpg',
                'product_description' => 'Bàn phím Apple Magic Keyboard 2 – Thiết kế nhỏ gọn, cảm giác gõ êm ái
                Nếu bạn là một người hay soạn thảo bằng trên iPad và gặp vấn đề khó khăn khi gõ chữ thì bàn phím bluetooth Apple Magic Keyboard 2 chính là sản phẩm không thể thiếu. Phụ kiện Apple Magic Keyboard 2 sở hữu một thiết kế nhỏ gọn, tinh tế với phím bấm êm ái, hứa hẹn sẽ đáp ứng tốt nhu cầu của mọi người dùng.',
                'product_sale' => 20,
                'product_feature' => 1
            ], [
                'product_name' => 'AKKO 3108 Silent (Akko Switch v2)',
                'product_price' => 4850000,
                'manu_id' => '6',
                'type_id' => '3',
                'product_image' => '3108-Silent-768x768.png',
                'product_description' => 'Thiết kế bắt mắt ưa nhìn Với nhiều kiểu dáng đẹp mắt cùng bộ keycaps cực “thời trang”. Mẫu bàn phím Akko 3108 Silent mang đến một tông màu nhẹ nhàng nhưng có phần thu hút nổi bật.',
                'product_sale' => 40,
                'product_feature' => 1
            ], [
                'product_name' => 'Smart phone Xiaomi Mi 11 5G',
                'product_price' => 1600000,
                'manu_id' => '7',
                'type_id' => '1',
                'product_image' => 'xiaomi-mi-11-xanhduong-1-org.jpg',
                'product_description' => 'Xiaomi Mi 11 một siêu phẩm đến từ Xiaomi, máy cho trải nghiệm hiệu năng hàng đầu với vi xử lý Qualcomm Snapdragon 888, cùng loạt công nghệ đỉnh cao, khiến bất kỳ ai cũng sẽ choáng ngợp về smartphone này.',
                'product_sale' => 30,
                'product_feature' => 0
            ], [
                'product_name' => 'Keyboard Logitech G913 TKL WIRELESS RGB',
                'product_price' => 4850000,
                'manu_id' => '5',
                'type_id' => '3',
                'product_image' => 'g913-tkl-wireless_d797df2d3e01485ab3baad39a1040cd3.png',
                'product_description' => 'Kích thước 368 x 150 x 22 ( mm ) ( Dài x Rộng x Cao ) Trọng lượng 810g Chiều dài dây cáp 1.8 Loại Switch GL Switch Pin 40 giờ đồng hồ liên tục ( 100% độ sáng cao nhất ) Kết nối Bluetooth/ LightSpeed/ Có dây Đèn LED hiển thị Lightsync RGB 16.7 triệu màu Cụm phím media Có
                Thiết kế đột phá ,hiện đại
                Được chế tạo tỉ mỉ từ các vật liệu cao cấp, G913 TKL có thiết kế tinh xảo với vẻ đẹp, sức mạnh và hiệu suất vô song. G913 TKL có các công nghệ tiên tiến tương tự như G915 ,nhưng nhỏ gọn hơn, phù hợp với những người có bàn làm việc nhỏ ,phải di chuyển nhiều hay đơn giản là chỉ thích sự nhỏ gọn.Thiết kế cực kỳ mỏng nhưng có độ bền cao cùng với sự thoải mái ,G913 TKL luôn sẵn sàng cho những màn chơi game cường độ cao, G913 TKL thực sự là thế hệ bàn phím cơ chơi game của tương lai.',
                'product_sale' => 10,
                'product_feature' => 1
            ], [
                'product_name' => 'Keyboard  AKKO 3087 World Tour – Tokyo Akko Switch',
                'product_price' => 1600000,
                'manu_id' => '6',
                'type_id' => '3',
                'product_image' => '3108-Silent-768x768.png',
                'product_description' => 'Thiết kế bắt mắt ưa nhìn
                Với nhiều kiểu dáng đẹp mắt cùng bộ keycaps cực “thời trang”. Mẫu bàn phím Akko 3108 Silent mang đến một tông màu nhẹ nhàng nhưng có phần thu hút nổi bật.',
                'product_sale' => 15,
                'product_feature' => 0
            ], [
                'product_name' => 'Mouse Gaming Logitech G502 Hero KDA ',
                'product_price' => 1900000,
                'manu_id' => '5',
                'type_id' => '4',
                'product_image' => 'image_1024.jpg',
                'product_description' => 'G502 HERO K/DA - Vẻ đẹp cùng sự vượt trội trong dòng chuột gaming
                G502 HERO K/DA là một trong những dòng chuột gaming mới nhất đến từ Logitech. Được trang bị đến 11 nút có thể tùy chỉnh giúp bạn dễ dàng chỉ định các lệnh cá nhân, cùng cảm biến quang học tiên tiến cho độ chính xác theo dõi tối đa, tính năng chiếu sáng RGB có thể tùy chỉnh, cảm biến trò chơi từ 200 cho tới 25.600 DPI.',
                'product_sale' => 20,
                'product_feature' => 1
            ], [
                'product_name' => 'Headphone Logitech G431',
                'product_price' => 1390000,
                'manu_id' => '5',
                'type_id' => '5',
                'product_image' => 'tai-nghe-logitech-g431-1_93d140ec10f7491b9e814d3329159945.jpg',
                'product_description' => 'Âm thanh to rõ ràng
                Mic lớn được tăng cường 6 mm đảm bảo đồng đội có thể nghe thấy bạn. Cần mic có thể gấp gọn lại để tắt tiếng khi bạn không muốn giọng mình được nghe thấy.
                Công nghệ DTS HEADPHONE:X 2.0
                Âm thanh vòm DTS Headphone:X 2.0 thế hệ mới, sử dụng phần mềm G HUB của Logitech, cho phép bạn nghe thấy kẻ thù đang ẩn nấp phía sau, các tín hiệu khả năng đặc biệt và môi trường đắm chìm - tất cả xung quanh bạn. Trải nghiệm âm thanh 3D vượt xa các kênh 7.1 để khiến bạn cảm thấy như đang thực hiện hành động.
                Khả năng kết nối đa dạng
                Tai nghe hoạt động với máy tính, PlayStation 4, hoặc Nintendo Switch gắn đế thông qua USB DAC. Bạn cũng có thể chơi trên máy chơi game hoặc thiết bị di động thông qua dây 3,5 mm.
                Được thiết kế cho sự thoải mái và bền bỉ
                Mọi thứ liên quan đến chiếc tai nghe này đều tạo ra sự thoải mái. Chụp tai và quai đeo giả da có trọng lượng nhẹ cao cấp được thiết kế để giúp đôi tai bạn không bị áp lực. Chụp tai xoay ngược lên 90 độ tạo ra sự thuận tiện. Điều chỉnh âm lượng trên mọi nền tảng với nút xoay âm lượng gắn trên chụp tai.',
                'product_sale' => 15,
                'product_feature' => 0
            ],
            [
                'product_name' => 'Headphone Logitech G733 LIGHTSPEED Wireless Black',
                'product_price' => 2990000,
                'manu_id' => '5',
                'type_id' => '5',
                'product_image' => 'gearvn-tai-nghe-logitech-g733-lightspeed-wireless-black-666_2eb1a71d562e4a6d853a0f086723cbe3.png',
                'product_description' => 'Đánh giá chi tiết tai nghe gaming không dây Logitech G733 LIGHTSPEED Wireless Black
                Tai nghe không dây gaming Logitech G733 LIGHTSPEED Wireless Black được thiết kế mang đến sự thoải mái cho game thủ. Đây là mẫu tai nghe không dây được trang bị âm thanh lập thể, các bộ lọc âm thanh và tính năng chiếu sáng tiên tiến bạn cần để nhìn, nói và chơi phong cách hơn bao giờ hết.
                Thiết kế bắt mắt, trọng lượng siêu nhẹ
                Được thiết kế với hình dáng một chiếc tai nghe Over-ear với trọng lượng chỉ 278 gram, nặng hơn nửa pound (250g) một chút. Nó rất nhẹ và dây co dãn được thiết kế để làm giảm và phân phối trọng lượng.
                Logitech G733 LIGHTSPEED Wireless Black với bộ đệm tai được làm từ cao su non hai lớp nhẹ nhàng ôm lấy đầu bạn và lượn vòng quanh khuôn mặt bạn. Nó làm giảm các điểm áp lực và đem lại sự thoải mái dài lâu. Dây đeo quanh đầu co dãn mềm mại và có thể điều chỉnh khiến cho vừa vặn nhất với bạn.
                Trang bị công nghệ Lightspeed
                Công nghệ LIGHTSPEED không dây đem đến cho bạn thời gian sử dụng pin trên 29 giờ và sự tự do không dây đáng tin cậy lên tới 20 mét. Chơi mà không bị rối dây. Mở ra khả năng và đắm chìm vào trò chơi, âm nhạc, phim ảnh.
                Ngoài ra Logitech G733 LIGHTSPEED Wireless Black còn có bộ phụ kiện dây băng đô, vỏ bọc mic,... nhiều màu sắc để bạn có thể thay đổi ngoại hình chiếc tai nghe của mình. Lưu ý là trong hộp sản phẩm mới chỉ có sẵn 1 bộ phụ kiện mặc định nhé.
                Hỗ trợ đèn LED RGB 16,8 triệu màu
                Tai nghe Logitech G733 LIGHTSPEED Wireless Black được trang bị hai vùng LED để tùy chỉnh ánh sáng để biến thành của riêng bạn. Cá nhân hóa màu sắc, hình ảnh hóa âm thanh, đưa bạn vào thế giới trò chơi với các hình động tùy chỉnh và thiết lập trước thông qua hệ sinh thái Logitech G Hub của hãng.
                Âm thanh sống động với màng loa PRO-G
                Đắm chìm vào trò chơi hơn bao giờ hết với âm thanh vòm DTS Headphone X 2.0 thế hệ mới. Ngoài ra Logitech G733 LIGHTSPEED Wireless Black còn được trang bị các tính năng nâng cao như: DTS Headphone:X 2.0, Blue VO!CE, LIGHTSYNC RGB,...
                Âm thanh vòm thế hệ mới đem thế giới trò chơi của bạn đến thế giới thật xung quanh bạn. Tận hưởng tất cả các tín hiệu âm thanh tuyệt vời từ môi trường xung quanh mà các trò chơi yêu thích của bạn đem lại - từ mọi hướng. Công nghệ DTS Headphone:X 2.0 mới nhất là âm thanh vòm vượt qua 7.1 kênh.',
                'product_sale' => 20,
                'product_feature' => 1
            ],
            [
                'product_name' => 'Tai nghe Bluetooth True Wireless Galaxy Buds Pro Bạc',
                'product_price' => 4990000,
                'manu_id' => '2',
                'type_id' => '5',
                'product_image' => 'tainghesamsung1.jpeg',
                'product_description' => 'Nâng tầm trải nghiệm âm và chất lượng cuộc gọi với chống ồn chủ động (ANC).
                Kết nối không dây Bluetooth 5.0 dễ dàng với các thiết bị ngoài, đường truyền ổn định.
                Chuẩn âm thanh studio với loa 2 chiều AKG mạnh mẽ.
                Tận hưởng âm thanh vòm lôi cuốn, chuẩn điện ảnh từ 360 Audio.
                Đàm thoại rõ ràng với hệ thống 3 mic và bộ phận thu nhận giọng nói (Voice Pickup Unit).
                Loa 2 chiều (loa trầm 11mm, loa bổng 6.5mm).
                Khả năng kháng nước hiệu quả cùng xếp hạng kháng nước IPX7.
                Thời gian sử dụng 5 giờ và 13 giờ cùng hộp sạc (bật chống ồn), sử dụng 8 giờ và 20 giờ cùng hộp sạc (tắt chống ồn).',
                'product_sale' => 12,
                'product_feature' => 0
            ], [
                'product_name' => 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 R177N',
                'product_price' => 2990000,
                'manu_id' => '2',
                'type_id' => '5',
                'product_image' => 'tainghesamsung2.jpg',
                'product_description' => 'Thiết kế thời thượng, cá tính.
                Chất âm chuẩn studio với loa 2 chiều.
                Hiệu quả chống ồn lên đến 98%.
                Đàm thoại dễ dàng với 3 micro và bộ cảm biến nhận diện giọng nói.
                Đồng bộ với các thiết bị Samsung Galaxy.
                Thời gian nghe nhạc: Khoảng 5 giờ (bật chống ồn), khoảng 7.5 giờ (tắt chống ồn).
                Thời gian đàm thoại: Khoảng 3.5 giờ (bật chống ồn), khoảng 3.5 giờ (tắt chống ồn).
                5 phút sạc cho 1 giờ chơi nhạc.
                Đạt tiêu chuẩn chống nước IPX2.
                Điều khiển cảm ứng dừng/phát, trả lời cuộc gọi, chuyển bài.',
                'product_sale' => 0,
                'product_feature' => 1
            ], [
                'product_name' => 'Tai nghe nhét tai Samsung EG920',
                'product_price' => 280000,
                'manu_id' => '2',
                'type_id' => '5',
                'product_image' => 'tainghesamsung3.jpg',
                'product_description' => 'Thiết kế gọn đẹp, có 2 màu đen và đỏ.
                Dây dài 1.2 m, đệm tai có móc giúp đeo chắc chắn.
                Âm thanh trong trẻo, trung thực.
                Có mic thoại, nút chỉnh nhận cuộc gọi, chuyển bài hát, dừng/chơi nhạc, tăng/giảm âm lượng.',
                'product_sale' => 5,
                'product_feature' => 0
            ],
            [
                'product_name' => 'Laptop Dell Inspiron 15 5515 R7 5700U/8GB/512GB/Office H&S/Win11 (N5R75700U104W1)',
                'product_price' => 24290000,
                'manu_id' => '3',
                'type_id' => '2',
                'product_image' => 'laptopdell1.jpg',
                'product_description' => 'Dell Inspiron 15 5515 R7 (N5R75700U104W1) sẽ là một ứng cử viên sáng giá trong phân khúc laptop học tập - văn phòng bởi lối thiết kế tao nhã, tối giản cùng những thông số kỹ thuật ấn tượng, đáp ứng tốt mọi nhu cầu cơ bản hằng ngày phục vụ cho mọi đối tượng người dùng đặc biệt là học sinh, sinh viên và dân văn phòng.',
                'product_sale' => 22,
                'product_feature' => 0
            ], [
                'product_name' => 'Laptop Dell XPS 13 9310 i5 1135G7/8GB/512GB/Cáp/Office H&S/Win11 (70273578)',
                'product_price' => 37790000,
                'manu_id' => '3',
                'type_id' => '2',
                'product_image' => 'laptopdell3.jpg',
                'product_description' => 'Laptop Dell XPS 13 9310 i5 1135G7 (70273578) sở hữu thiết kế hiện đại với màu bạc thời thượng cùng hiệu năng mạnh mẽ, xứng danh bạn đồng hành đắc lực trên mọi mặt trận.',
                'product_sale' => 10,
                'product_feature' => 1
            ], [
                'product_name' => 'Laptop Dell Gaming Alienware m15 R6 i7 11800H/32GB/1TB SSD/8GB RTX3070/240Hz/OfficeHS/Win11 (70272633)',
                'product_price' => 68000000,
                'manu_id' => '3',
                'type_id' => '2',
                'product_image' => 'laptopdell2.jpg',
                'product_description' => 'Với phong cách thiết kế độc đáo cùng cấu hình vượt trội, laptop Dell Gaming Alienware m15 R6 i7 11800H (70272633) sẵn sàng đáp ứng hoàn hảo mọi tác vụ của một chiếc laptop đồ họa - kỹ thuật như thiết kế hay chiến game.',
                'product_sale' => 5,
                'product_feature' => 0
            ]
        ]);
    }
}
