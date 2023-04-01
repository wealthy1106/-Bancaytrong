create database myweb;
drop database myweb;
use myweb;
create table spnb(
	idspb char(4) primary key,
	hinh1 varchar(255),
    hinh2 varchar(255),
    hinh3 varchar(255)
);
INSERT INTO `myweb`.`spnb` (`idspb`, `hinh1`, `hinh2`, `hinh3`) VALUES ('1', 'hinhanh/caykieng/hoa/huong duong.jpg', 'hinhanh/cây ăn trái/mitnghetuquy.PNG', 'hinhanh/caykieng/caytrongnha/vanloc.PNG');
select * from soluonggh;
drop table spnb;
select * from spnb;

drop table thongtinlienhe;
create table thongtinlienhe(
	malh char(10),
    diachi varchar(255),
    email varchar(255),
    SDT int,
    primary key (malh)
);
select * from thongtinlienhe;
INSERT INTO `myweb`.`thongtinlienhe` (`malh`, `diachi`, `email`, `SDT`) VALUES ('lh1', ' 31/8 Mậu Thân,An Hòa, Ninh Kiều, Cần Thơ', 'caytrongnhanong@gmail.com', '0293819022');

select * from taikhoan;

create table thongtingioithieu(
	maGT char(10),
    chu varchar(2550),
    duongdan varchar(2550),
    primary key (maGT)
);


select * from thongtingioithieu;

-- drop table loaisp;
create table LoaiSP (
	Maloai char(6),
    Tenloai varchar(255),
    thongtinloai varchar(2550),
    primary key (Maloai)
);
select * from loaisp;
INSERT INTO `myweb`.`loaisp` (`Maloai`, `Tenloai`, `thongtinloai`) VALUES ('cay01', 'Cây Ăn Trái', 'cây ăn quả là nguồn dinh dưỡng quý cho con người về chất khoáng, đặc biệt nhiều vitamin, nhất là các vitamin A và vitamin C rất cần cho cơ thể con người.\n');
INSERT INTO `myweb`.`loaisp` (`Maloai`, `Tenloai`, `thongtinloai`) VALUES ('R01','Rau' , 'Rau là thực phẩm rất hấp dẫn thực khách, chúng không thể thiếu trong bửa ăn hàng ngày của những người vốn ưa thích rau. Dù rằng có những thời điểm hay những tác động khách quan làm giá cả của rau không ổn định, thế nhưng, nhìn chung, phần nhiều các loại rau là có giá trị kinh tế cao nên rất thu hút người đầu tư sản xuất.\n');
INSERT INTO `myweb`.`loaisp` (`Maloai`, `Tenloai`, `thongtinloai`) VALUES ('cay02', 'Cây Làm Cảnh', 'Cây cảnh (hoặc cây kiểng) là một số loại thực vật được chăm sóc, gieo trồng và tạo dáng công phu, thường dùng làm vật trang trí hay một chi tiết trong thuật phong thủy. Cây cảnh được bài trí có khi nhằm thể hiện một ý tưởng của người trồng qua cách xếp đặt mà vẫn giữ được vẻ tự nhiên của lá.\n');



-- drop table loaicuthe;
create table loaicuthe(
	idloai char(10),
    tenLoai varchar(255),
    Maloai char(6),
    CONSTRAINT FOREIGN KEY (Maloai) REFERENCES LoaiSP(Maloai),
    primary key(idloai)
);
select * from loaicuthe;
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('tree01', 'Cây Ăn Trái ', 'cay01');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('tree02', 'Cây Trồng Trong Nhà', 'cay02');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('tree03', 'Hoa', 'cay02');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('tree04', 'Sen Đá', 'cay02');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('rau001', 'Rau Ăn Hoa', 'R01');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('rau002', 'Rau Ăn Củ', 'R01');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('rau003', 'Rau Ăn Lá', 'R01');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('rau004', 'Rau Ăn Quả', 'R01');
INSERT INTO `myweb`.`loaicuthe` (`idloai`, `tenLoai`, `Maloai`) VALUES ('rau005', 'Rau Gia Vị', 'R01');


drop table sanpham;
create table SanPham(
	MaSP char(10) primary key,
    tenSP varchar(255),
    XuatXu varchar(255),
    giaSp int,
    dacdiemSP varchar(2550),
    tacdung  varchar(2550),
    hinh varchar(2550),
    idloai char(10),
    constraint foreign key (idloai) references loaicuthe(idloai)
);
select * from sanpham;
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp01', 'Bưởi Da Xanh', 'Bến Tre - Việt Nam', '30000', 'Quả bưởi da xanh được ưa chuộng bởi có vị ngọt thanh, không chua và có mùi thơm đặc trưng. Không chỉ chứa nhiều vitamin và khoáng chất, quả bưởi da xanh còn chứa một số hoạt chất đặc biệt giúp phòng ngừa bệnh nguy hiểm như phổi, tim, gan vô cùng hiệu quả.  Bưởi da xanh không chỉ là trái cây dinh dưỡng mà còn dùng làm quà biếu vào những dịp lễ, Tết vô cùng giá trị và ý nghĩa.', 'Ăn tươi, làm gỏi, tinh dầu bưởi,...', 'hinhanh/cây ăn trái/cay buoi.jpg', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp02', 'Ổi Nữ Hoàng', 'Tiền Giang - Vĩnh Long - Việt Nam', '25000', 'Trái ổi Nữ Hoàng tươi nguyên trái được mệnh danh là giống ổi ngon nhất hiện nay. Đặc trưng nổi bậc của Ổi Nữ Hoàng là trái to, tròn, da mịn và rất ít hạt hơn hẳn các giống ổi khác.Đây là giống cây rất dễ trồng, nhanh ra hoa, đậu trái cho năng suất vượt trội hơn các giống ổi khác, đặc biệt là ăn rất ngon.', 'Ă tươi, làm nước ép,..', 'hinhanh/cây ăn trái/cay oi.jpg', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp03', 'Mãng Cầu Xiêm', 'Tiền Giang - Việt Nam', '35000', 'Cây có nhiều cành nhánh tàn lá sum suê. + Hoa màu xanh, thường mọc ở thân, cụm hoa to, hoa có nhiều cánh xếp theo lớp, hoa cứng lâu rụng và có mùi đặc trưng. Quả mãng cầu xiêm to và có gai mềm. Thịt quả ngọt và hơi chua, hạt có màu nâu sậm.', 'Ăn tươi, làm nước ép,..', 'hinhanh/cây ăn trái/cay-mang-cau-xiem-.jpg', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp04', 'Xoài Thanh Ca', 'Châu Đốc - An Giang - Việt Nam', '40000', 'Giống xoài thanh ca Châu Đốc này rất dễ trồng, không tốn quá nhiều công để chăm sóc và cũng như chi phí sản xuất, do vậy rất được người dân ưa chuộng. Đặc biệt, giống xoài này có năng suất cao, cây càng già càng cho nhiều trái.', 'Ăn tươi,làm nước ép,...', 'hinhanh/cây ăn trái/xoaithanhca.PNG', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp05', 'Đu Đủ', 'Việt Nam', '7000 ', 'Đu đủ là loại cây ăn quả ngắn ngày, dễ trồng, nhanh cho thu hoạch, đạt năng suất cao, chu kỳ kinh tế ngắn, thích hợp với nhiều loại đất trồng, đặc biệt có thể trồng xen hoặc trồng gối với các loại cây trồng khác.', 'Ăn tươi,làm gỏi,...', 'hinhanh/cây ăn trái/dudu.PNG', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp06', 'Dừa Xiêm Lùn', 'Bến Tre - Việt Nam', '20000', 'Quả có màu xanh nhạt hơn xiêm xanh và hơi giống màu xanh lục. Dừa xiêm lùn có 2 mo nang, vỏ trái rất mỏng nên cho rất nhiều nước. Đặc biệt giống dừa này cho trái nhiều hơn dừa xiêm xanh, trung bình mỗi buồng có hơn một chục dừa (mỗi chục là 12 trái)', 'Uống nước,lấy cơm dừa,...', 'hinhanh/cây ăn trái/duaxiem.PNG', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp07', 'Mít Nghệ tứ quý', 'Việt Nam', '60000', 'Mít Tứ Quý ra hoa quanh năm mà không cần phải xử lý thuốc kích thích ra hoa. Trái có nhiều thịt, múi màu vàng tươm mật, đẹp mắt, dày cùi, ăn giòn và ngọt, thơm, hương vị đậm đà, sản lượng cao, chăm sóc dễ, thời vụ thu hoạch rộng, chế biến dễ dàng, có thể xuất khẩu.', 'Ăn tươi, sấy khô', 'hinhanh/cây ăn trái/mitnghetuquy.PNG', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp08', 'Nhãn Xuồng Cơm Vàng', ' Bà Rịa Vũng Tàu - Việt Nam', '45000 ', 'Chất lượng Quả Nhãn Xuồng Cơm Vàng to hơn so với những loại Nhãn khác, cơm dày vàng ươm, hương vị đặc trưng thanh ngọt và giòn.  Nhãn Xuồng Cơm Vàng dùng ăn trực tiếp hoặc làm thức ăn đóng hộp đều được nên rất được ưa chuộng.', 'Ăn tươi,...', 'hinhanh/cây ăn trái/nhan.PNG', 'tree01');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp09', 'Quýt Đường', ' Có nguồn gốc từ Ấn Độ và Trung Quốc', '45000 ', 'Cây Quýt Đường cho thu nhập cao, thích nghi rộng, dễ chăm sóc, đầu tư thấp, vì vậy bà con nông dân có ít đất sản xuất nên quan tâm đến mô hình này. Đây là giống cây cho năng suất cao, chất lượng ngon, ngọt đậm, hiệu quả kinh tế cao.', 'Ăn tươi, làm nước ép', 'hinhanh/cây ăn trái/quyt.PNG', 'tree01');
INSERT INTO `myweb`.`SanPham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp10', 'Sầu Riêng Ri 6', 'Long Hồ - Vĩnh Long - Việt Nam', '175000', 'Cơm sầu khô ráo, dày và tỷ lệ hạt lép lên tới 40%. Thịt sầu Ri6 sẽ có màu vàng tươi bắt mắt, có vị ngọt và béo, với hương thơm vừa phải. Sầu Ri6 thường rất dễ ăn nên được đa số khách hàng lựa chọn.', 'Ăn tươi, làm bánh,...', 'hinhanh/cây ăn trái/sau rieng.jpg', 'tree01');
INSERT INTO `myweb`.`SanPham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp11', 'Xương Rồng', 'Mexico', '70000', 'Bề ngoài của loài xương rồng này nhìn như những ngón tay.Sản phẩm bao gồm 1 cây xương rồng thạch trụ thiên đỏ.', 'Chỉ ngấm nhìn, dùng để trang trí,...', 'hinhanh/caykieng/caytrongnha/xuongrongthachtru.PNG', 'tree04');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp12', 'Cây Vạn Lộc', 'Thái Lan, Indonesia', '275000', 'Cây Vạn Lộc được chú ý không chỉ bởi cái tên toát lên sự thịnh vượng mà còn bởi màu sắc bắt mắt của đốm hồng độc đáo trên lá. Ngoài ra, loại cây này còn có tác dụng thanh lọc không khí, hấp thụ những chất độc hại, thích hợp đặt ở bàn làm việc hoặc để trong phòng.', 'Chỉnh ngấm nhìn, trang trí', 'hinhanh/caykieng/caytrongnha/vanloc.PNG', 'tree02');
INSERT INTO `myweb`.`sanpham` (`MaSP`, `tenSP`, `XuatXu`, `giaSp`, `dacdiemSP`, `tacdung`, `hinh`, `idloai`) VALUES ('sp13', 'Cây Ngũ Gia Bì ', 'Hà Giang - Việt Nam', '300000', 'Cây Ngũ Gia Bì có mùi thơm thoang thoảng của thảo mộc khi ở cự ly gần và có khả năng đuổi muỗi, côn trùng rất thích hợp để đặt ở bàn học và bàn làm việc. Loại cây này còn có khả năng chống ô nhiễm, điều hòa khí hậu, loại bỏ được khí độc Formaldehyd. Đây còn là loại dược liệu quý trong đông y, vị thuốc quan trọng trong trị bệnh xương khớp, an thần, chống suy nhược cơ thể, nâng cao hệ miễn dịch.', 'Trang trí,đuổi côn trùng,...', 'hinhanh/caykieng/caytrongnha/ngugiabi.PNG', 'tree02');

drop table Taikhoan;
create table TaiKhoan(
	SoTK int primary key auto_increment,
    HoTen varchar(255),
    email varchar(255),
    DiaChi varchar(255),
    SDT char(10),
    MatKhau varchar(255),
    VaiTro varchar(255) 
);

-- drop table giohang;
-- create table Giohang(
-- 	idCart int primary key auto_increment,
--     SoTK int(10),
--     trangthai char(10),
--     constraint foreign key (SoTK) references TaiKhoan(SoTK)
-- );
-- select * from giohang;

-- select * from taikhoan;
drop table donhang;
create table DonHang(
	idDH int primary key auto_increment,
    Ngay timestamp not null default current_timestamp,
    thanhtien int,
    SoTK int,
    constraint foreign key (SoTK) references TaiKhoan(SoTK),
    trangthai varchar(255)
); 
select * from TAIKHOAN;
INSERT INTO DONHANG(IDDH, SOTK) VALUES ('dh1', '1');
select * from donhang;

drop table soluonggh;
create table SoLuongGH(
	MaSP char(10),
    SoTK char(10),
    soLuong int,
    primary key(MaSP,SoTK)
);
drop table gia;
create table gia(
select *, soLuong * giaSp as gia
from soluongGH sl natural join sanpham
				  natural join taikhoan
	where SoTK = '1'	
);

select sum(gia) as tong
from gia where SoTK = '1';


select giaSp 
from soluongGH natural join sanpham
						natural join taikhoan
			where sotk = '1';
select *
from soluongGH natural join sanpham
						natural join taikhoan
			where sotk = '1'
	group by SoTK;

-- drop table soluongdh;
create table SoluongDH(
	MaSP char(10),
    idDH char(10),
    soluong int,
    primary key(MaSP,idDH)
);
-- cac ban da them csdl




-- select * from taikhoan;



select * from loaisp;
-- select * from loaisp where Maloai = 'ss';

-- select * from loaicuthe; 
-- select * from sanpham where MaSP = 'sp01';

-- -- select * from giohang;
create table giohag(
select  sp.hinh,sp.tenSP,slgh.soLuong,sp.giaSp
from sanpham sp join giohang gh on sp.MaSP = gh.MaSP
				join taikhoan tk on gh.SoTK = tk.SoTK
                join soluonggh slgh on slgh.MaSP = gh.MaSP
);
-- select * from soluonggh;
-- select * from taikhoan;
-- select * from giohag;
-- select * from giohang;
select * from loaisp where Maloai = 'cay01';
select * from sanpham where idloai = 'tree02';
select * from donhang;

select dh.diachigiaohang, dh.NgayTT, tk.HoTen, tk.email, sp.hinh, sp.tenSP, sl.soluong, sp.giaSp 
from donhang dh join taikhoan tk  on dh.SoTK = tk.SoTK
				join soluongdh sl on sl.idDH = dh.idDH
                join sanpham sp on sp.MaSP = sl.MaSP
			where dh.idDH = 'dh1';
select * 
from donhang dh join taikhoan tk  on dh.SoTK = tk.SoTK;
select * from loaisp;	
select * from soluongdh;
select * from donhang;
select * from taikhoan;
select * from sanpham sp join loaicuthe l on sp.idloai=l.idloai
where Maloai = 'cay01';

select * from loaicuthe;
select * from spnb;
INSERT INTO `myweb`.`spnb` (`idspb`, `hinh1`, `hinh2`, `hinh3`) VALUES ('nb1', 'hinhanh/caykiểng/hoa/huong duong.jpg', 'hinhanh/caykiểng/hoa/hoa hong.jpg', 'hinhanh/caykiểng/hoa/cam tu cau.jpg');

select * from taikhoan;
select * from taikhoan k
where k.email = 'me@example.com'
		 and k.MatKhau= 'wwww';

--    -------------------------------------------------------
select * from taikhoan;
select *,soLuong * giaSp as gia
                      from soluongGH natural join sanpham
                                      natural join taikhoan
                      where sotk = '1';
select *,sum(soLuong * giaSp) as gia
                      from soluongGH natural join sanpham
                                      natural join taikhoan
                                      natural join donhang
                      where sotk = '1' and iddh="12";


select *,sum(thanhtien) as tong
from donhang where trangthai='Đã xử lí';

select * from taikhoan;


select * from donhang natural join taikhoan where sotk='1';
select * from soluonggh where sotk = '1';
select * from taikhoan natural join soluonggh where sotk='1';
--  ------------------------------------------------------

select * from soluonggh natural join sanpham;
select * from donhang;
select * from taikhoan;
select * from sanpham where tenSP like '%X%';

select * from donhang natural join taikhoan where SoTK ='1' ;
select * from soluonggh natural join sanpham 
						natural join donhang
where SoTK ='1' and iddh = '10';

select * from sanpham;
select * from loaicuthe;



