CREATE DATABASE web;
USE web;

CREATE TABLE IF NOT EXISTS user_types (
    type_id INT PRIMARY KEY AUTO_INCREMENT,
    type_name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    type_id INT,
    FOREIGN KEY (type_id) REFERENCES user_types(type_id)
);
CREATE TABLE IF NOT EXISTS categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL,
    sold_quantity INT NOT NULL,
    category_id INT,
    imgLink VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    discount_percentage DECIMAL(5, 2),
    discount_start_date DATE,
    discount_end_date DATE,
    status_product BOOLEAN,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);


-- vouncher discont
CREATE TABLE IF NOT EXISTS coupons (
    coupon_id INT PRIMARY KEY AUTO_INCREMENT,
    coupon_code VARCHAR(255) NOT NULL,
    discount_percentage DECIMAL(5, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

USE web;

-- BẢNG LIÊN HỆ CỦA BIN, ĐỪNG ĐỤNG DÔ T CHẶT TAY
CREATE TABLE IF NOT EXISTS `contacts` (
    contact_id INT AUTO_INCREMENT PRIMARY KEY,
    contact_name VARCHAR(255) NOT NULL,
    contact_phone VARCHAR(20) NOT NULL,
    contact_email VARCHAR(255) NOT NULL,
    question TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Checkout
-- Tạo bảng order_statuses
-- Tạo bảng order_statuses
CREATE TABLE IF NOT EXISTS order_statuses (
    -- 1: wait; 2: confirm; 3: cancel
    status_id INT PRIMARY KEY AUTO_INCREMENT,
    status_name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS payment_methods (
    -- 1: cod; 2: momo; 3: bank
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    payment_name VARCHAR(50) NOT NULL
);

-- Tạo bảng orders
CREATE TABLE IF NOT EXISTS orders (
    order_id VARCHAR(25) NOT NULL PRIMARY KEY,
    user_id INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    address_order TEXT NOT NULL,
    status_id INT NOT NULL DEFAULT 1,
    payment_id INT NOT NULL,
    -- Mặc định là 1 (wait)
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (status_id) REFERENCES order_statuses(status_id)
);

-- Tạo bảng order_items để lưu chi tiết sản phẩm trong mỗi đơn hàng
CREATE TABLE IF NOT EXISTS order_items (
    order_id VARCHAR(25) NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);


INSERT INTO
    user_types (type_name)
VALUES
    ('admin'),
    ('user');

-- INSERT INTO users (username, password, full_name, tel, email, type_id) VALUES
-- ('admin', 'admin', 'Thy Anh Tran', '123-456-7890', 'tathy@gm.com', 1), -- 'admin' type
-- ('daniis', 'password', 'Daniis Axelor', '987-654-3210', 'da@gm.com', 2); -- 'user' type
-- SELECT u.id, u.username, u.full_name, u.tel, u.email, ut.type_name
-- FROM users u
-- JOIN user_types ut ON u.type_id = ut.type_id;
INSERT INTO
    categories (category_name)
VALUES
    ('Chăm sóc da'),
    ('Chăm sóc tóc'),
    ('Tắm và dưỡng thể'),
    ('Dưỡng môi'),
    ('Combo sản phẩm');

INSERT INTO
    products (
        product_name,
        description,
        price,
        stock_quantity,
        sold_quantity,
        category_id,
        imgLink,
        created_at,
        updated_at,
        discount_percentage,
        discount_start_date,
        discount_end_date
    )
VALUES
    (
        'Kem ủ tóc bưởi Cocoon giúp giảm gãy rụng và làm mềm tóc 200ml',
        'Kem ủ tóc với tinh dầu bưởi truyền thống Việt Nam, Vitamin B5 và Xylishine™ giúp giảm gãy rụng, cung cấp độ ẩm, mang lại sự mềm mại và chắc khoẻ cho sợi tóc.

Công dụng:

• Giải pháp giảm gãy rụng tóc
• Làm mềm sợi tóc, giúp tóc suôn mượt vào nếp
• Tăng cường sự chắc khỏe lâu dài của mái tóc

Thành phần chính:
• Tinh dầu vỏ bưởi nguyên chất: Chứa hàm lượng limonene rất cao giúp giảm tình trạng rụng tóc, giúp hạn chế tình trạng gàu.
• Vitamin B5 (Panthenol): Cung cấp độ ẩm cho tóc, ngăn ngừa hư tổn, làm dày tóc và cải thiện độ bóng khỏe của mái tóc.
• Xylishine: Được chiết xuất từ các loại đường tự nhiên từ gỗ và từ tảo nâu Pelvetia Canaliculata giúp cấp ẩm, phục hồi và tăng cường độ bóng của tóc. 

Lý tưởng cho:
• Tóc dễ gãy rụng
• Tóc chậm phát triển
• Tóc yếu

Cách sử dụng:
Sau khi gội, lấy một lượng sản phẩm vừa đủ và mát-xa đều lên thân tóc, ủ trên tóc từ 5-10 phút, sau đó xả sạch lại với nước. Sử dụng ít nhất 2 lần/tuần để có kết quả tốt nhất.

Lượng dùng:
Một lượng vừa đủ để thoa lên toàn bộ tóc.

Kết cấu:
Kết cấu dạng kem đặc.

Mùi hương:
Mùi tinh dầu bưởi thanh mát.

Lưu ý:

Chỉ sử dụng ngoài da, đậy kín sau khi sử dụng.

Ưu điểm:
Không Sulfate
Không Paraben
Không chứa cồn
Không dầu khoáng

Thành phần chi tiết:
Aqua/Water, Cetyl Alcohol, Glyceryl Stearate, Cetearyl Alcohol, Synthetic Beeswax, Behentrimonium Chloride, Ceteareth-20, Ceteareth-12, Glycerin, Cyclopentasiloxane, Caprylic/Capric Triglyceride, Citrus Grandis Peel Oil, Butyrospermum Parkii Butter, Panthenol, Cocos Nucifera Oil, Epilobium Angustifolium Flower/Leaf/Stem Extract, Triticum Vulgare Seed Extract, Thymus Vulgaris Extract, Pelvetia Canaliculata Extract, Glycereth-26, Sodium Pca, Sodium Lactate, Arginine, Aspartic Acid, Pca, Glycine, Alanine, Serine, Valine, Proline, Threonine, Isoleucine, Histidine, Phenylalanine, Xylitylglucoside, Anhydroxylitol, Maltitol, Xylitol, Calcium Pantothenate, Pyridoxine Hcl, Dimethicone, Dimethiconol, Bis-(Isostearoyl/Oleoyl Isopropyl) Dimonium Methosulfate, Citrus Aurantium Dulcis Peel Oil, Tocopherol, Mentha Piperita Oil, Cetyl Palmitate, Polyquaternium-10, Dipropylene Glycol, Propylene Glycol, Hydroxyethylcellulose, Guar Hydroxypropyltrimonium Chloride, Amodimethicone, Laureth-23, Laureth-4, Polyglyceryl-3 Caprate, Silicone Quaternium-22, Cocamidopropyl Betaine, Caramel, Parfum, Cetylpyridinium Chloride, Trisodium Ethylenediamine Disuccinate, Ethylhexylglycerin, Phenoxyethanol, Sodium Hydroxide
',
        215.00,
        100,
        -- Initial stock quantity
        3900,
        -- Initial sold quantity
        1,
        -- Assuming category_id 1 for "Chăm sóc tóc"
        'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lf9m1pifttg75e',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        0,
        -- Initial discount percentage
        '2023-01-01',
        -- Replace with your desired start date
        '2023-12-31' -- Replace with your desired end date
    ),
    (
    '[COMBO 1/12-31/12]Sữa chống nắng bí đao Cocoon 50ml TẶNG Nước tẩy trang bí đao 140ml + Trial size tinh chất nghệ c22 5ml',
    '"MÔ TẢ SẢN PHẨM

Kết hợp các màng lọc thế hệ mới, chiết xuất bí đao, Synoxyl AZ và Melanin, sữa chống nắng bí đao giúp bảo vệ da trước tia UVA, UVB và ánh sáng năng lượng cao nhìn thấy được.

Với kết cấu không trọng lượng, lướt nhẹ và thấm nhanh vào da mà không để lại vệt trắng, sữa chống nắng bí đao mang lại lớp nền trong trẻo, khoẻ khoắn và cảm giác thoải mái khi sử dụng. Sản phẩm phù hợp cho mọi loại da, kể cả da dầu và da nhạy cảm.




Thành phần chính

Các màng lọc UV thế hệ mới, chiết xuất bí đao, Synoxyl AZ và Melanin.

- Synozyl AZ : chất ngừa oxi hóa rất bền quang được chiết xuất từ củ gừng với khả năng trung hòa linh hoạt nhiều dạng gốc tự do khác nhau giúp bảo vệ DNA và duy trì sự toàn vẹn của ma trận ngoại bào.

- Melanin: bảo vệ da khỏi ánh sáng năng lượng cao nhìn thấy được (tia HEV), ngừa tình trạng tăng sắc tố và lão hóa tế bào.

- Chiết xuất bí đao: đây là nguyên liệu lành tính, thanh mát giúp giảm mụn. Dịch chiết từ quả bí đao giúp cải thiện lượng dầu trên da




Màng lọc tiên tiến chống bức xạ UVA, UVB hiệu quả cao:

- Tinosorb M (Methylene Bis-Benzotriazolyl Tetramethylbutylphenol): là màng lọc ngăn tia UV có công nghệ hạt hữu cơ siêu mịn, rất ổn định, phân tán trong nước. Đây là màng lọc phổ rộng từ UVB – UVA2 – UVA1. Nó hoạt động bằng cách vừa hấp thụ vừa tán xạ tia UV (thành phần chống nắng lai vật lý và hóa học), đỉnh hấp thụ 385nm.

- Neo Heliopan AP (Disodium Phenyl Dibenzimidazole Tetrasulfonate): là màng lọc hấp thụ tia UVA2 hiệu quả và ổn định, thành phần này có tác dụng hiệp đồng với các màng lọc UVB tan trong dầu khác trong công thức. Đỉnh hấp thụ 340nm.

- Uvinul A Plus (Diethylamino Hydroxybenzoyl Hexyl Benzoate): là màng lọc thế hệ mới chống UVA2/UVA1 với đỉnh bảo vệ lên đến 354nm, cùng khả năng bảo vệ tuyệt vời ngăn lại các gốc tự do.

- Tinosorb A2B (Tris-Biphenyl Triazine): là màng lọc thế hệ mới bảo vệ hiệu quả trong quãng UVB/UVA2 với đỉnh hấp thụ là 310nm, đồng thời giúp tăng cường cho quãng UVA1.

- Eclipsogen EHT (Ethylhexyl Triazone): được xem là màng lọc ngăn UVB và ổn định với khả năng hấp thụ tối đa bước sóng 314-330 nm.

- Eclipsogen Sorb S (Bis- Ethyhexyloxyphenol Methoxyphenyl Triazine): là màng lọc tia UV quang phổ rộng, cực kì bền quang, có khả năng hấp thụ rộng và bao phủ cả UVA và UVB.

- Parsol 1789 (Avobenzone - Butyl Methoxydibenzoylmethane): là màng lọc được thông qua trên toàn cầu với quãng hấp thụ rộng và đỉnh hấp thụ rất cao 357 nm




Công dụng

Quang phổ rộng, bảo vệ rất cao, SPF 50+, PA ++++, UVA-PF 62.6

Finish ráo mịn tự nhiên, không bóng, không bị vón, không tạo rãnh trắng mất thẩm mỹ.

Kháng nước 80 phút, không cay mắt.

Bảo vệ da trước ánh sáng năng lượng cao nhìn thấy được HEV (bao gồm cả ánh sáng xanh).

Phù hợp với da dầu mụn, nhạy cảm.

Được chứng nhận EcoSun Pass của BASF - thân thiện với môi trường.

Không chứa Oxybenzone và Octinoxate - thân thiện với rạn san hô.




Cách sử dụng

Lắc đều sản phẩm trước khi dùng. Thoa một lượng nhiều, đảm bảo che phủ toàn mặt và cổ. Sử dụng vào buổi sáng, trước khi trang điểm và trước khi ra nắng 15 phút. Thoa lại khi cần để duy trì lớp bảo vệ, đặc biệt là sau khi đổ mồ hôi, bơi lội hoặc dùng khăn lau.




Kết cấu

Dạng sữa lỏng.




Lưu ý

Sử dụng kem chống nắng là một cách để giảm thiểu những nguy hiểm do tiếp xúc với ánh nắng mặt trời. Không ở quá lâu dưới ánh nắng, ngay cả khi đang sử dụng sản phẩm chống nắng. Tránh ánh nắng giữa trưa. Chỉ sử dụng ngoài da. Tránh tiếp xúc với mắt.




Thành phần đầy đủ:

AQUA/WATER, TRIETHYL CITRATE, CYCLOPENTASILOXANE, DIBUTYL ADIPATE, ISODODECANE, BUTYLOCTYL SALICYLATE, ETHYLHEXYL METHOXYCRYLENE, DIETHYLAMINO HYDROXYBENZOYL HEXYL BENZOATE, SILICA, METHYLENE BIS-BENZOTRIAZOLYL TETRAMETHYLBUTYLPHENOL, DISODIUM PHENYL DIBENZIMIDAZOLE TETRASULFONATE, BIS-ETHYLHEXYLOXYPHENOL METHOXYPHENYL TRIAZINE, BUTYL METHOXYDIBENZOYLMETHANE, METHYL METHACRYLATE CROSSPOLYMER, DIMETHICONE, TRIS-BIPHENYL TRIAZINE, SODIUM POTASSIUM ALUMINUM SILICATE, TRIMETHYLSILOXYSILICATE, ETHYLHEXYL TRIAZONE, 1,2-HEXANEDIOL, PROPANEDIOL, ACETYL ZINGERONE, MELANIN, BENINCASA CERIFERA FRUIT EXTRACT, HDI/TRIMETHYLOL HEXYLLACTONE CROSSPOLYMER, POLYPROPYLSILSESQUIOXANE, BUTYLENE GLYCOL, PROPYLENE GLYCOL, TOCOPHERYL ACETATE, CAPRYLIC/CAPRIC TRIGLYCERIDE, HYDROXYMETHOXYPHENYL DECANONE, XANTHAN GUM, TITANIUM DIOXIDE, DEXTRIN PALMITATE, POLYHYDROXYSTEARIC ACID, C13-15 ALKANE, DISTEARDIMONIUM HECTORITE, POLYGLYCERYL-3 POLYRICINOLEATE, DIMETHICONE/PEG-10 /15 CROSSPOLYMER, DECYL GLUCOSIDE, DISODIUM PHOSPHATE, CETYL ALCOHOL, HYDROXYACETOPHENONE, TRISODIUM ETHYLENEDIAMINE DISUCCINATE, TROMETHAMINE, CITRIC ACID




Dung tích: 50ml

Xuất xứ: Việt Nam

HSD: 3 năm kể từ NSX"
',
    395000.00,
    100,
    58,
    1,
    'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lp7ikxzf1isbc8',
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    0,
    '2023-01-01',
    '2023-12-31'
),
(
    'Bigsize - Dầu gội bưởi Cocoon giúp giảm gãy rụng và làm mềm tóc 500ml',
    '"MÔ TẢ SẢN PHẨM

Từ tinh dầu vỏ bưởi Việt Nam truyền thống kết hợp với vitamin B5, hoạt chất dưỡng ẩm Xylishine™ cùng công thức dịu nhẹ không chứa sulfate, dầu gội bưởi giúp làm sạch tóc và giảm gãy rụng, mang lại mái tóc đen dày, chắc khoẻ và mượt mà




Công dụng

• Làm sạch tóc với công thức dịu nhẹ không sulfate, không làm tổn thương da đầu

• Giải pháp giảm gãy rụng và làm mềm mái tóc

• Hỗ trợ sự phát triển của tóc, mang lại mái tóc đen dày và mềm mại

 

Thành phần chính

Tinh dầu vỏ bưởi: Do có tính kh.áng khu.ẩn và ch.ống oxy hóa cao, tinh dầu vỏ bưởi giúp ngăn ngừa nhiễ.m trù.ng, mang lại cho bạn da đầu và tóc khỏe mạnh, cải thiện rõ rệt tình trạng gãy rụng tóc.

Xylishine™: được chiết xuất từ tảo nâu, Pelvetia canaliculata và các loại đường tự nhiên có trong gỗ. Xylishine ™ là chất dưỡng ẩm và phục hồi tóc, giúp tăng cường độ bóng của tóc

Vitamin B5 (D-panthenol): Chức năng như một tác nhân dưỡng tóc để cung cấp độ ẩm lâu dài cho tóc, ngăn ngừa hư tổn, làm dày tóc và cải thiện độ bóng khỏe của mái tóc.

Axít amin: có tác dụng dưỡng ẩm, củng cố cấu trúc, bảo vệ màu sắc và sửa chữa các hư hỏng bề mặt của tóc.




Lý tưởng cho

• Tóc mỏng dễ gãy rụng.

• Tóc cần được nuôi dưỡng để mọc dày và chắc khỏe trở lại.




Hướng dẫn sử dụng

Thoa sản phẩm lên tóc ướt và tạo bọt, mát-xa nhẹ nhàng từ gốc đến ngọn, sau đó gội sạch. Sử dụng hằng ngày để có kết quả tốt nhất. Tránh tiếp xúc với mắt.




Lượng dùng

Từ 1-2 lần nhấn.




Kết cấu

Dạng gel trong mờ màu trắng ngà.




Mùi hương

Mùi tinh dầu bưởi thơm mát




Cam kết

• Không chứa cồn (Alcohol free)

• Không Sulfate 

• Không Paraben (Paraben free)

• Không dầu khoáng

• 100% thuần chay

• Không thử nghiệm trên động vật




Thành phần đầy đủ

Aqua/Water, Sodium Cocoyl Isethionate, Sodium Laurylglucosides Hydroxypropylsulfonate, Glycerin, Disodium Laureth Sulfosuccinate, Cocamidopropyl Betaine, PEG-12 Dimethicone, PEG-7 Glyceryl Cocoate, Dimethicone, Citrus Grandis Peel Oil, Panthenol, Amodimethicone, Epilobium Angustifolium Flower/Leaf/Stem Extract, Thymus Vulgaris (Thyme) Extract, Triticum Vulgare (Wheat) Seed Extract, Cocoyl Methyl Glucamide, Calcium Pantothenate, Pyridoxine Hcl, Sodium PCA, Sodium Lactate, Arginine, Aspartic Acid, PCA, Glycine, Alanine, Serine, Valine, Proline, Threonine, Isoleucine, Histidine, Phenylalanine, Xylitylglucoside, Anhydroxylitol, Maltitol, Xylitol, Pelvetia Canaliculata Extract, Propanediol, Bis-(Isostearoyl/Oleoyl Isopropyl) Dimonium Methosulfate, Trisodium Ethylenediamine Disuccinate, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Cocamide MEA, Parfum, Polysorbate-20, Xanthan Gum, PEG-120 Methyl Glucose Dioleate, PEG-45M, Laureth-23, Polyquaternium-10, Laureth-4, Trideceth-10, Sodium Hydroxide, Phenoxyethanol, Ethylhexylglycerin.




Xuất xứ: Việt Nam

Dung tích: 500ml

Hạn sử dụng: 3 năm kể từ NSX"
',
    375000.00,
    100,
    8500,
    2,
    'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgbf5syrknia5',
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    0,
    '2023-01-01',
    '2023-12-31'
),(
    'Bigsize - Gel bí đao rửa mặt Cocoon giảm dầu & mụn 310ml',
    '"MÔ TẢ SẢN PHẨM

Bigsize - Gel bí đao rửa mặt Cocoon 310ml

Với các thành phần gồm bí đao, rau má, tràm trà, bổ sung thêm Vitamin B3, B5 và Betaine. Gel bí đao có pH 5.5 giúp làm sạch  dầu thừa, làm giảm việc hình thành mụn mà vẫn giữ được độ ẩm mịn tự nhiên và không gây khô da sau khi sử dụng.




Công dụng 

• Làm thông thoáng lỗ chân lông 

• Giảm lượng dầu thừa tiết ra trên da

• Giảm nhanh tình trạng mụn

• Cấp ẩm cho da, giúp làm da luôn rạng rỡ, căng bóng và mịn màng.







Thành phần chính 

• Bí đao: bí đao có đặc tính làm mát

• Rau má: Các hợp chất có trong rau má là những chất chính giúp tă.ng si.nh collagen cho làn da.

• Tinh dầu tràm trà: Loại tinh dầu có mùi thơm ấm áp, giúp ngừa mụn trứng cá.

• Vitamin B3 (Niacinamide): Giúp hỗ trợ trị mụn hiệu quả, kiể.m so.át lượng dầu thừa và làm giảm sự xuất hiện của lỗ chân lông to.

• Vitamin B5 (D-panthenol): Ngoài những công dụng tốt cho tóc, Vitamin B5 là một chất cung cấp độ ẩm thẩm thấu sâu cho da.

• Betaine: Là một sản phẩm tự nhiên tách ra như từ mật rỉ củ cải đường giúp dưỡng ầm cho da, bảo vệ da bằng cách bảo vệ các t.ế b.ào khỏi mất nước và ngăn chặn protein của da khỏi bị bi.ến t.ính.




Lý tưởng cho

• Da tiết nhiều dầu thừa cần được làm sạch.

• Da có mụn cần 1 loại sữa rửa mặt phù hợp.




Hướng dẫn sử dụng

Lấy một lượng vừa đủ mát-xa nhẹ nhàng trên da ướt. Rửa sạch lại với nước. Dùng buổi sáng và tối.




Lượng dùng

Một lượng vừa đủ bằng đồng xu.




Kết cấu

Gel trong mờ màu nâu vàng.




Mùi hương

Mùi tràm trà thoang thoảng.




Xuất xứ: Việt Nam

Hạn sử dụng: 3 năm kể từ NSX

Trọng lượng: 310ml"
',
    295000.00,
    100,
    17600,
    1,
    'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgahvx5x1srb4',
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    0,
    '2023-01-01',
    '2023-12-31'
),(
    'Bigsize - Nước bí đao cân bằng da (toner) Cocoon giảm dầu và mụn 310ml',
    '"MÔ TẢ SẢN PHẨM

Kết hợp các màng lọc thế hệ mới, chiết xuất bí đao, Synoxyl AZ và Melanin, sữa chống nắng bí đao giúp bảo vệ da trước tia UVA, UVB và ánh sáng năng lượng cao nhìn thấy được.

Với kết cấu không trọng lượng, lướt nhẹ và thấm nhanh vào da mà không để lại vệt trắng, sữa chống nắng bí đao mang lại lớp nền trong trẻo, khoẻ khoắn và cảm giác thoải mái khi sử dụng. Sản phẩm phù hợp cho mọi loại da, kể cả da dầu và da nhạy cảm.




Thành phần chính

Các màng lọc UV thế hệ mới, chiết xuất bí đao, Synoxyl AZ và Melanin.

- Synozyl AZ : chất ngừa oxi hóa rất bền quang được chiết xuất từ củ gừng với khả năng trung hòa linh hoạt nhiều dạng gốc tự do khác nhau giúp bảo vệ DNA và duy trì sự toàn vẹn của ma trận ngoại bào.

- Melanin: bảo vệ da khỏi ánh sáng năng lượng cao nhìn thấy được (tia HEV), ngừa tình trạng tăng sắc tố và lão hóa tế bào.

- Chiết xuất bí đao: đây là nguyên liệu lành tính, thanh mát giúp giảm mụn. Dịch chiết từ quả bí đao giúp cải thiện lượng dầu trên da




Màng lọc tiên tiến chống bức xạ UVA, UVB hiệu quả cao:

- Tinosorb M (Methylene Bis-Benzotriazolyl Tetramethylbutylphenol): là màng lọc ngăn tia UV có công nghệ hạt hữu cơ siêu mịn, rất ổn định, phân tán trong nước. Đây là màng lọc phổ rộng từ UVB – UVA2 – UVA1. Nó hoạt động bằng cách vừa hấp thụ vừa tán xạ tia UV (thành phần chống nắng lai vật lý và hóa học), đỉnh hấp thụ 385nm.

- Neo Heliopan AP (Disodium Phenyl Dibenzimidazole Tetrasulfonate): là màng lọc hấp thụ tia UVA2 hiệu quả và ổn định, thành phần này có tác dụng hiệp đồng với các màng lọc UVB tan trong dầu khác trong công thức. Đỉnh hấp thụ 340nm.

- Uvinul A Plus (Diethylamino Hydroxybenzoyl Hexyl Benzoate): là màng lọc thế hệ mới chống UVA2/UVA1 với đỉnh bảo vệ lên đến 354nm, cùng khả năng bảo vệ tuyệt vời ngăn lại các gốc tự do.

- Tinosorb A2B (Tris-Biphenyl Triazine): là màng lọc thế hệ mới bảo vệ hiệu quả trong quãng UVB/UVA2 với đỉnh hấp thụ là 310nm, đồng thời giúp tăng cường cho quãng UVA1.

- Eclipsogen EHT (Ethylhexyl Triazone): được xem là màng lọc ngăn UVB và ổn định với khả năng hấp thụ tối đa bước sóng 314-330 nm.

- Eclipsogen Sorb S (Bis- Ethyhexyloxyphenol Methoxyphenyl Triazine): là màng lọc tia UV quang phổ rộng, cực kì bền quang, có khả năng hấp thụ rộng và bao phủ cả UVA và UVB.

- Parsol 1789 (Avobenzone - Butyl Methoxydibenzoylmethane): là màng lọc được thông qua trên toàn cầu với quãng hấp thụ rộng và đỉnh hấp thụ rất cao 357 nm




Công dụng

Quang phổ rộng, bảo vệ rất cao, SPF 50+, PA ++++, UVA-PF 62.6

Finish ráo mịn tự nhiên, không bóng, không bị vón, không tạo rãnh trắng mất thẩm mỹ.

Kháng nước 80 phút, không cay mắt.

Bảo vệ da trước ánh sáng năng lượng cao nhìn thấy được HEV (bao gồm cả ánh sáng xanh).

Phù hợp với da dầu mụn, nhạy cảm.

Được chứng nhận EcoSun Pass của BASF - thân thiện với môi trường.

Không chứa Oxybenzone và Octinoxate - thân thiện với rạn san hô.




Cách sử dụng

Lắc đều sản phẩm trước khi dùng. Thoa một lượng nhiều, đảm bảo che phủ toàn mặt và cổ. Sử dụng vào buổi sáng, trước khi trang điểm và trước khi ra nắng 15 phút. Thoa lại khi cần để duy trì lớp bảo vệ, đặc biệt là sau khi đổ mồ hôi, bơi lội hoặc dùng khăn lau.




Kết cấu

Dạng sữa lỏng.




Lưu ý

Sử dụng kem chống nắng là một cách để giảm thiểu những nguy hiểm do tiếp xúc với ánh nắng mặt trời. Không ở quá lâu dưới ánh nắng, ngay cả khi đang sử dụng sản phẩm chống nắng. Tránh ánh nắng giữa trưa. Chỉ sử dụng ngoài da. Tránh tiếp xúc với mắt.




Thành phần đầy đủ:

AQUA/WATER, TRIETHYL CITRATE, CYCLOPENTASILOXANE, DIBUTYL ADIPATE, ISODODECANE, BUTYLOCTYL SALICYLATE, ETHYLHEXYL METHOXYCRYLENE, DIETHYLAMINO HYDROXYBENZOYL HEXYL BENZOATE, SILICA, METHYLENE BIS-BENZOTRIAZOLYL TETRAMETHYLBUTYLPHENOL, DISODIUM PHENYL DIBENZIMIDAZOLE TETRASULFONATE, BIS-ETHYLHEXYLOXYPHENOL METHOXYPHENYL TRIAZINE, BUTYL METHOXYDIBENZOYLMETHANE, METHYL METHACRYLATE CROSSPOLYMER, DIMETHICONE, TRIS-BIPHENYL TRIAZINE, SODIUM POTASSIUM ALUMINUM SILICATE, TRIMETHYLSILOXYSILICATE, ETHYLHEXYL TRIAZONE, 1,2-HEXANEDIOL, PROPANEDIOL, ACETYL ZINGERONE, MELANIN, BENINCASA CERIFERA FRUIT EXTRACT, HDI/TRIMETHYLOL HEXYLLACTONE CROSSPOLYMER, POLYPROPYLSILSESQUIOXANE, BUTYLENE GLYCOL, PROPYLENE GLYCOL, TOCOPHERYL ACETATE, CAPRYLIC/CAPRIC TRIGLYCERIDE, HYDROXYMETHOXYPHENYL DECANONE, XANTHAN GUM, TITANIUM DIOXIDE, DEXTRIN PALMITATE, POLYHYDROXYSTEARIC ACID, C13-15 ALKANE, DISTEARDIMONIUM HECTORITE, POLYGLYCERYL-3 POLYRICINOLEATE, DIMETHICONE/PEG-10 /15 CROSSPOLYMER, DECYL GLUCOSIDE, DISODIUM PHOSPHATE, CETYL ALCOHOL, HYDROXYACETOPHENONE, TRISODIUM ETHYLENEDIAMINE DISUCCINATE, TROMETHAMINE, CITRIC ACID




Dung tích: 50ml

Xuất xứ: Việt Nam

HSD: 3 năm kể từ NSX"
',
    295000.00,
    100,
    9600,
    1,
    'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgarjbvg6l7e1',
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    0,
    '2023-01-01',
    '2023-12-31'
),
(
    'Bigsize - Nước dưỡng tóc tinh dầu bưởi Cocoon giúp ngăn ngừa gãy rụng & làm mềm tóc 310ml',
    '"MÔ TẢ SẢN PHẨM

Nước dưỡng tóc tinh dầu bưởi phiên bản nâng cấp là sản phẩm dành cho tóc, phù hợp với tình trạng tóc rụng, tóc yếu, tóc thưa mỏng. Bên cạnh các thành phần chủ đạo của phiên bản hiện tại (tinh dầu bưởi Việt Nam truyền thống, Xylishine, vitamin B5), phiên bản nâng cấp được bổ sung thêm 2 hoạt chất là Baicapil và Bisobolol, hỗ trợ giảm mạnh mẽ tình trạng rụng tóc và tăng cường độ chắc khoẻ cho mái tóc.




Công dụng

• Giảm gãy rụng tóc.

• Nuôi dưỡng da đầu và cung cấp độ ẩm cẩn thiết cho mái tóc.

• Tăng cường độ bóng và chắc khỏe của tóc.

• Cung cấp dưỡng chất giúp tóc suôn mượt và mềm mại




Thành phần chính

• Tinh dầu vỏ bưởi nguyên chất: Chứa hàm lượng limonene rất cao giúp giảm tình trạng rụng tóc, giúp hạn chế tình trạng gàu.

• Vitamin B5 (Panthenol): Cung cấp độ ẩm cho tóc, ngăn ngừa hư tổn, làm dày tóc và cải thiện độ bóng khỏe của mái tóc.

• Xylishine: Được chiết xuất từ các loại đường tự nhiên từ gỗ và từ tảo nâu Pelvetia Canaliculata giúp cấp ẩm, phục hồi và tăng cường độ bóng của tóc.

• Baicapil: Là tổ hợp các chất được chiết xuất từ cây hoàng cầm, mầm đậu nành và mầm lúa mạch. giúp giảm rụng tóc rõ rệt, gia tăng mật độ của tóc và làm cho sợi tóc dày, chắc khoẻ hơn chỉ trong vòng 3 tháng.

• Bisobolol: Chiết xuất từ tinh dầu hoa cúc, phù hợp với da đầu rất nhạy cảm. Ngoài ra bisabolol còn có tác dụng giữ ẩm và ngăn ngừa bã nhờn trên da đầu.




Lý tưởng cho

• Tóc mỏng yếu

• Tóc dễ gãy rụng

• Tóc mọc chậm




Cách sử dụng

Lắc đều chai trước khi vặn đầu vòi để mở. Sau đó, cầm dốc ngược sản phẩm sao cho đầu vòi tiếp xúc với da đầu, di chuyển chuyển vòi và cảm nhận nước dưỡng tóc phủ đều trên da đầu. Dùng ngón tay mát-xa để sản phẩm thẩm thấu. Dùng trên tóc khô và sạch, 2 lần mỗi ngày vào sáng và tối để mang lại hiệu quả tốt nhất.




Kết cấu

Gồm 2 lớp dầu và dung dịch nước dưỡng




Mùi hương

Mùi tinh dầu bưởi và tinh dầu bạc hà thanh mát




Ưu điểm

Không Sulfate

Không Paraben

Không chứa cồn

Không dầu khoáng




Thành phần chi tiết

Water, Isododecane, C15-19 Alkane, Glycerin, Citrus Grandis Peel Oil, Xylitylglucoside, Anhydroxylitol, Maltitol, Xylitol, Pelvetia Canaliculata Extract, Propanediol, Arginine, Lactic Acid, Glycine Soja Germ Extract, Triticum Vulgare Germ Extract, Scutellaria Baicalensis Root Extract, Bisabolol, Gluconolactone, Calcium Gluconate, Panthenol, Betaine, Citrus Aurantium Dulcis Peel Oil, Mentha Piperita Oil, Sodium Polyacrylate Starch, Glycereth-26, Phenyl Trimethicone, Caprylyl Methicone, Trisodium Ethylenediamine Disuccinate, Ethyhexylglycerin, Bht, Phenoxyethanol, Sodium Benzoate.




Dung tích: 310ml

Xuất xứ: Việt Nam

HSD: 3 năm kể từ NSX"
',
    325000.00,
    100,
    10100,
    1,
    'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgb73wyzdcr58',
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    0,
    '2023-01-01',
    '2023-12-31'
),(
        'Bigsize - Nước tẩy trang bí đao Cocoon tẩy sạch makeup & giảm dầu 500ml',
        'Nước tẩy trang bí đao Cocoon tẩy sạch makeup & giảm dầu 500ml',
        295000.00,
        100,
        66700,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgahvx5zuxnb2',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        0,
        '2023-01-01',
        '2023-12-31'
    ),
    (
        'Bigsize - Sữa rửa mặt nghệ Hưng Yên Cocoon giúp da sạch mịn và rạng rỡ 310ml',
        'Sữa rửa mặt nghệ Hưng Yên Cocoon giúp da sạch mịn và rạng rỡ 310ml',
        295000.00,
        100,
        7900,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgaxkczun2m3f',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        0,
        '2023-01-01',
        '2023-12-31'
    ),
    -- Repeat this pattern for the remaining products
    (
        'Combo 2 thỏi Son dưỡng dầu dừa Bến Tre Cocoon 5g/thỏi',
        'Combo 2 thỏi Son dưỡng dầu dừa Bến Tre Cocoon 5g/thỏi',
        64000.00,
        100,
        7100,
        3,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lf9m1pifttaif4',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        0,
        '2023-01-01',
        '2023-12-31'
    ),
    (
        'Combo Cà phê Đắk Lắk làm sạch da chết môi Cocoon 5g + Son dưỡng dầu dừa Bến Tre Cocoon 5g',
        'Combo Cà phê Đắk Lắk làm sạch da chết môi Cocoon 5g + Son dưỡng dầu dừa Bến Tre Cocoon 5g',
        107000.00,
        100,
        8500,
        5,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lf9m1pifwmfeb8',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        0,
        '2023-01-01',
        '2023-12-31'
    ),
    (
        'Combo phục hồi tóc hư tổn từ dầu sa-chi',
        'Combo phục hồi tóc hư tổn từ dầu sa-chi',
        294000.00,
        100,
        893,
        5,
        '',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Combo tóc dài bóng mượt Cocoon: 1 Nước dưỡng tóc tinh dầu bưởi Cocoon 140ml + 1 Sa-chi Serum phục hồi tóc Cocoon 70ml',
        'Combo tóc dài bóng mượt Cocoon: 1 Nước dưỡng tóc tinh dầu bưởi Cocoon 140ml + 1 Sa-chi Serum phục hồi tóc Cocoon 70ml',
        313000.00,
        100,
        9800,
        5,
        'https://down-vn.img.susercontent.com/file/vn-11134201-23020-xiry69vm6jnv6a',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Dầu gội bưởi Cocoon giúp giảm gãy rụng và làm mềm tóc 310ml',
        'Dầu gội bưởi Cocoon giúp giảm gãy rụng và làm mềm tóc 310ml',
        245000.00,
        100,
        21500,
        2,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgb73wz4zmj8b',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Dầu tẩy trang hoa hồng Cocoon tẩy sạch makeup chuyên nghiệp & dưỡng ẩm 140ml',
        'Dầu tẩy trang hoa hồng Cocoon tẩy sạch makeup chuyên nghiệp & dưỡng ẩm 140ml',
        180000.00,
        100,
        9100,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgahvx5u8nv22',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Dầu xả bưởi Cocoon giúp cung cấp dưỡng chất và bổ sung độ ẩm cho tóc 310ml',
        'Dầu xả bưởi Cocoon giúp cung cấp dưỡng chất và bổ sung độ ẩm cho tóc 310ml',
        185000.00,
        100,
        9600,
        3,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgb73wz7srf96',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Dung dịch chấm mụn bí đao Cocoon sạch mụn & ngăn ngừa mụn 5ml',
        'Dung dịch chấm mụn bí đao Cocoon sạch mụn & ngăn ngừa mụn 5ml',
        125000.00,
        100,
        13600,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgarjbvolzvaa',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'Gel bí đao rửa mặt Cocoon giảm dầu & mụn 140ml',
        'Gel bí đao rửa mặt Cocoon giảm dầu & mụn 140ml',
        195000.00,
        100,
        31700,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgahvx5ygd7a1',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'Gel tắm khuynh diệp & bạc hà Cocoon làm sạch và thư giãn 500ml',
        'Gel tắm khuynh diệp & bạc hà Cocoon làm sạch và thư giãn 500ml',
        215000.00,
        100,
        12200,
        3,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgb73wzalwbfa',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'HÀNG TẶNG KHÔNG BÁN - Nước dưỡng tóc Sa-chi Cocoon giúp cấp ẩm và phục hồi hư tổn 140ml',
        'HÀNG TẶNG KHÔNG BÁN - Nước dưỡng tóc Sa-chi Cocoon giúp cấp ẩm và phục hồi hư tổn 140ml',
        145000.00,
        100,
        13000,
        2,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lo2gn0xu1rayda',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'HÀNG TẶNG KHÔNG BÁN - PHIÊN BẢN NÂNG CẤP - Nước dưỡng tóc tinh dầu bưởi Cocoon giúp giảm gãy rụng & làm mềm tóc 140ml',
        'Nước dưỡng tóc tinh dầu bưởi Cocoon giúp giảm gãy rụng & làm mềm tóc 140ml',
        165000.00,
        25.3,
        20000,
        2,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lf7u2t4y3uru25',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'HÀNG TẶNG KHÔNG BÁN - Son dưỡng dầu dừa Bến Tre Cocoon dưỡng ẩm môi 5g',
        'Son dưỡng dầu dừa Bến Tre Cocoon dưỡng ẩm môi 5g',
        32000.00,
        3,
        3000,
        1,
        'https://down-vn.img.susercontent.com/file/86dee6d95b3ab605f8dea9bc0833d9c4',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'HÀNG TẶNG KHÔNG BÁN - Sữa chống nắng bí đao - Ráo mịn tự nhiên SPF 50+, UVA-PF 62.6 Cocoon 5ml',
        'Sữa chống nắng bí đao - Ráo mịn tự nhiên SPF 50+, UVA-PF 62.6 Cocoon 5ml',
        60000.00,
        1.5,
        1500,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lnkxiwt161kq60',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'HÀNG TẶNG KHÔNG BÁN - Tẩy da chết mặt cà phê Đắk Lắk Cocoon cho làn da mềm mại & rạng rỡ 150ml',
        'Tẩy da chết mặt cà phê Đắk Lắk Cocoon cho làn da mềm mại & rạng rỡ 150ml',
        165000.00,
        6.8,
        6800,
        3,
        'https://down-vn.img.susercontent.com/file/5477023f264a3923f005ce41f755a99a',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'Kem chống nắng bí đao quang phổ rộng, bảo vệ rất cao SPF 50 +, PA ++++ Cocoon 50ml',
        'Kem chống nắng bí đao quang phổ rộng, bảo vệ rất cao SPF 50 +, PA ++++ Cocoon 50ml',
        395000.00,
        18,
        18000,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgarjbvddgbe4',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Kem ủ tóc bưởi Cocoon giúp giảm gãy rụng và làm mềm tóc 200ml',
        'Kem ủ tóc bưởi Cocoon giúp giảm gãy rụng và làm mềm tóc 200ml',
        215000.00,
        3.9,
        3900,
        2,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgb73wz0rx7c4',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Mặt nạ bí đao Cocoon giảm dầu & mụn 30ml',
        'Mặt nạ bí đao Cocoon giảm dầu & mụn 30ml',
        145000.00,
        26,
        26000,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgarjbvkeajde',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'MINI SIZE-Sữa chống nắng bí đao - Ráo mịn tự nhiên SPF 50+, UVA-PF 62.6 Cocooon 15ml',
        'MINI SIZE-Sữa chống nắng bí đao - Ráo mịn tự nhiên SPF 50+, UVA-PF 62.6 Cocooon 15ml',
        155000.00,
        1.3,
        1300,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgarjbvhl5ne5',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    ),
    (
        'Nước bí đao cân bằng da (toner) Cocoon giảm dầu & mụn 140ml',
        'Nước bí đao cân bằng da (toner) Cocoon giảm dầu & mụn 140ml',
        195000.00,
        20.7,
        20700,
        3,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgarjbves0r0f',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'Nước dưỡng tóc Sa-chi Cocoon giúp cấp ẩm và phục hồi hư tổn 140ml',
        'Nước dưỡng tóc Sa-chi Cocoon giúp cấp ẩm và phục hồi hư tổn 140ml',
        145000.00,
        4,
        4000,
        2,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgb73wzc0gre9',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        5.0,
        '',
        ''
    ),
    (
        'Nước tẩy trang bí đao Cocoon tẩy sạch makeup & giảm dầu 140ml',
        'Nước tẩy trang bí đao Cocoon tẩy sạch makeup & giảm dầu 140ml',
        145000.00,
        9.7,
        9700,
        1,
        'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpgaxkczp0sue4',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP,
        4.9,
        '',
        ''
    );




-- Inserting a sample coupon
INSERT INTO
    coupons (
        coupon_code,
        discount_percentage,
        start_date,
        end_date
    )
VALUES
    (
        'SAMPLECODE123',
        10.00,
        -- 10% discount
        '2023-01-01',
        -- Replace with your desired start date
        '2023-12-31' -- Replace with your desired end date
    );

-- Inserting another sample coupon
INSERT INTO
    coupons (
        coupon_code,
        discount_percentage,
        start_date,
        end_date
    )
VALUES
    (
        'DISCOUNT50',
        50.00,
        -- 50% discount
        '2023-06-01',
        -- Replace with your desired start date
        '2023-06-30' -- Replace with your desired end date
    );