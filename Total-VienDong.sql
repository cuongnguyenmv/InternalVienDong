create database InternalVienDong;
use InternalVienDong
create table NHANSU_MaNhanVien(
manv nvarchar(20) primary key,
idcard nvarchar(20) null ,
hoten nvarchar(100) not null,
ngaythuviec date  null, /* nếu thử việc thành công ngayvaolam = thuviec -> update Ngày chính thức*/
ngaychinhthuc date null, 
ngayvaolam date not null,
ngayketthuc date null,
trangthai int not null default(1), /* 0:nghỉ làm , 1:Thử việc , 2:Chính thức(Thành viên) , 3:Hạt nhân , 4:CTV */
bophan nvarchar(100) null,
congty nvarchar(100) null,
created_at date not null,
updated_at date not null
)
create table Users_PhanQuyen(
id int identity(1,1) not null,
manv nvarchar(20) foreign key references users(manv),
auth nvarchar(20) not null,
created_at date not null,
updated_at date not null
)

create table NHANSU_DonVi(
id int identity(1,1) not null,
madv nvarchar(20) primary key ,
tendv nvarchar(100) not null,
truongdv nvarchar(100) not null,
congty nvarchar(100) not null,
created_at date not null,
updated_at date not null
)

create table NHANSU_Nhanvien(
id int identity(1,1) not null,
manv nvarchar(20) primary key foreign key references NHANSU_MaNhanVien(manv), 
/* thông tin công ty */
chucvu nvarchar(100) not null,
/* Thông tin việc làm */
chuyenmon nvarchar(100) null,
/* thông tin lương - bảo hiểm - thuế */
sobaohiem nvarchar(100) null,
ngaycongchuan float null,
sotaikhoan nvarchar(20) null,
cmnd nvarchar(20) null,
/* thông tin nhân viên */
hinh nvarchar(100)  null,
ngaysinh date null,
diachi nvarchar(100) null,
quequan nvarchar(100) null,
noisinh nvarchar(100) null,
sdt nvarchar(20) null,
email nvarchar(100) null,
bangcap nvarchar(100) null,
xeploai nvarchar(20) null,
truongtotnghiep nvarchar(100) null,
/* Thêm */
created_at date not null,
updated_at date not null,
)

create table HATNHAN_HocKiHatNhan(
id int identity(1,1) not null,
mahk nvarchar(100) primary key,
ki nvarchar(100) not null,
batdau date not null,
ketthuc date not null,
created_at date not null,
updated_at date not null
)

create table NHANSU_DangKyHatNhan(
id int identity(1,1) primary key,
manv nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
maphieudk nvarchar(20) not null,
hocki nvarchar(100) not null,
ngaydk date not null,
ketthucdk date  null,
created_at date not null,
updated_at date not null
)

create table NHANSU_ThongKeCongHien(
manv nvarchar(20) primary key foreign key references NHANSU_MaNhanVien(manv),
vanhoa float not null default(0),
trainghiem float not null default(0),
daotao float not null default(0),
tanggiam float not null default(0),
tongdiem as (vanhoa + trainghiem + daotao +tanggiam),
created_at date not null,
updated_at date not null /* ngày cập nhật */
)

create table NHANSU_CONGHIEN_ThamNien(
id int identity(1,1) not null,
manv nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
ngaycapnhat date not null,
trainghiem float not null default(0),
vanhoa float not null default(0),
created_at date not null,
updated_at date not null
)
/*						Giờ Đào Tạo		*/

create table NHANSU_DAOTAO_KhaiBao(
id int identity(1,1) not null,
madaotao nvarchar(30) primary key ,
tenhoatdong nvarchar(100) not null,
ngayhieuluc date not null,
TL float not null default(0),
KT float not null default(0),
KN float not null default(0),
CM float not null default(0),
NT float not null default(0),
CD float not null default(0),
TC float not null default(0),
Tong as ( TL + KT + KN + CM + NT + CD + TC) ,
nguoidexuat nvarchar(100) null,
ngaydexuat date null,
created_at date not null,
updated_at date not null
)
create table NHANSU_CONGHIEN_DaoTao (
id int identity(1,1) not null,
manv nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
ngaythamgia date not null,
madaotao nvarchar(30) foreign key references NHANSU_DAOTAO_KhaiBao(madaotao),
TL float not null default(0),
KT float not null default(0),
KN float not null default(0),
CM float not null default(0),
NT float not null default(0),
CD float not null default(0),
TC float not null default(0),
Tong as ( TL + KT + KN + CM + NT + CD + TC) ,
created_at date not null,
updated_at date not null
)

/*										Điểm Tăng Giảm	*/
create table NHANSU_TANGGIAM_KhaiBao(
id int identity(1,1) not null,
matg nvarchar(30) primary key ,
tentg nvarchar(100) not null,
diemtg float not null default(0),
noidungtg nvarchar(100) not null default(N'Tăng theo hoạt đông được đề xuất'),
ngayhieuluc date not null,
created_at date not null,
updated_at date not null
)

create table NHANSU_CONGHIEN_TangGiam(
id int identity(1,1) not null,
manv nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
matg nvarchar(30) foreign key references NHANSU_TANGGIAM_KhaiBao(matg),
ngayhieuluc date not null,
diem float not null default(0),
created_at date not null,
updated_at date not null
)

create table NHANSU_QuaTrinhCongHien(	
id int identity(1,1) primary key ,
manv nvarchar(20) not null foreign key references NHANSU_MaNhanVien(manv),
ngaycapnhat date not null, /* Ngày cập nhật đầu tiên sẽ bắt đầu từ ngày vào làm chính thức */
openningbalance float not null default(0),
trainghiem float not null default(0),
vanhoa float not null default(0),
daotao float not null default(0),
tanggiam float not null default(0),
closingbalance as (trainghiem + vanhoa + daotao + tanggiam) ,
created_at date not null,
updated_at date not null
)
create table NHANSU_NHANVIEN_BANGLUONG_Thang(
id int identity(1,1) primary key ,
manv nvarchar(20) foreign key references NHANSU_MaNhanVien(manv), 
banga int not null default(0),
bangb int not null default(0),
bangc int not null default(0),
bangd int not null default(0),
bange int not null default(0),
bangf int not null default(0),
bangg int not null default(0),
luongct as (banga + bangb + bangc + bangd + bange + bangf+ bangg),
luongthuclanh int not null default(0),
luongbandau int not null default(0),
thang int not null ,
batdau date not null,
denngay date not null,
congchuan int null,
created_at date not null,
updated_at date not null
)
create table NHANSU_NHANVIEN_BANGLUONG_KhaiBao(
id int identity(1,1) not null,
madieukhoan nvarchar(20) primary key ,
dieukhoan nvarchar(100) not null,
tien int not null default(0),
loai nvarchar(10) not null,
created_at date not null,
updated_at date not null
)
select * FROM NHANSU_NHANVIEN_LUONG_TuoiVaoLam
drop view NHANSU_NHANVIEN_LUONG_TuoiVaoLam
create view NHANSU_NHANVIEN_LUONG_TuoiVaoLam
as
select a.manv,a.ngaychinhthuc,b.ngaysinh, (YEAR(a.ngaychinhthuc) - YEAR(b.ngaysinh)) as 'tuoivaolam' , (YEAR(a.ngaychinhthuc) - YEAR(b.ngaysinh)) *1.5*100000 as 'tien'   FROM NHANSU_MaNhanVien a , NHANSU_Nhanvien b
where a.manv = b.manv

create table NHANSU_NHANVIEN_BANGLUONG_CoDinh(
id int identity(1,1) primary key,
manv nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
madieukhoan nvarchar(20) foreign key references NHANSU_NHANVIEN_BANGLUONG_KhaiBao(madieukhoan),
created_at date not null,
updated_at date not null,
)
create table NHANSU_NHANVIEN_BANGLUONG_BienDong(
id int identity(1,1) primary key,
manv nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
madieukhoan nvarchar(20) foreign key references NHANSU_NHANVIEN_BANGLUONG_KhaiBao(madieukhoan),
trangthai int not null default(1),
batdau date not null,
ketthuc date null,
created_at date not null,
updated_at date not null,
)
/*												Ví tiền hạt								*/


create table USERS_VITIEN_MaQuyDoi(
maqd nvarchar(20) primary key,
noidung nvarchar(100) not null,
sohat float not null,
mucconghien float not null,
tylethem float not null,
created_at date not null,	
updated_at date not null
)
create table USERS_VITIEN_GiaoDich(
id int identity(1,1) primary key,
phiengd nvarchar(100) not null,
manv nvarchar(20) foreign key references users(manv),
noidung nvarchar(100) null,
sohat float not null default(0),
trangthai int not null default(0), /* 0: nạp tiền , 1: mua đồ , 2:bán đồ ,3: Quy đổi ch , 4:Quy đổi tiền thật */
nguoichuyen nvarchar(20) null ,
nguoinhan nvarchar(20),
created_at date not null,
updated_at date not null
)

create table CSVC_TAISAN_ThanhLy(
id int identity(1,1) not null,
matl nvarchar(20) primary key,
seri nvarchar(100) null,
tents nvarchar(max) not null,
hinh1 nvarchar(100) not null,
hinh2 nvarchar(100) null,
hinh3 nvarchar(100) null,
mota nvarchar(max) null,
trangthai int not null default(3) , /* 0:đã bán ,1:đang bán,2:hết hạn,3:đợi định giá xác nhận, 
										4:Không chấp nhận */
nguongoc nvarchar(20) not null, /* của 1 nhân viên hay của công ty */
nguoimua nvarchar(20) null, /* người mua được cập nhật sau khi đấu giá thành công */
ngaydaugia date  null,
ngayketthuc date null,
giatri int not null,
dinhgia float null,
madaugia nvarchar(20) null,
created_at date not null,
updated_at date not null
)
create table CSVC_TAISAN_DauGiaThanhLy(
id int identity(1,1),
madaugia nvarchar(20) not null,
matl nvarchar(20) foreign key references CSVC_TAISAN_ThanhLy(matl) not null,
manv nvarchar(20) foreign key references users(manv) not null,
trangthai int not null default(0), /* 0:dang doi ket qua, 1 : da ban , 2: fail , 3:Đợi duyệt */
sohat float not null,
created_at date not null,
updated_at date not null
)


/*												Mua hàng								*/


/*												Quản Lý Tài Sản								*/



/*												Bảo Trì Bảo Dưỡng								*/

/*												Quyết Toán - Kế Toán								*/



/*												Mua hàng								*/


/*												Suất Ăn								*/


/*												Other Bỏ phiếu bình chọn								*/

create table NHANSU_KiBoPhieu(
maki int identity(1,1) primary key,
kibophieu nvarchar(100) not null,
ngaybophieu date not null,
ngayketthuc date not null,
thang as MONTH(ngaybophieu),
publickey nvarchar(max)  null,
created_at date not null,
updated_at date not null
)
select * FROM NHANSU_KiBoPhieu
create table NHANSU_NHANVIEN_BoPhieuTinhNhiem(
id int identity(1,1) primary key,
maki int not null foreign key references NHANSU_KiBoPhieu(maki),
nguoibophieu nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
bophieucho nvarchar(20) foreign key references NHANSU_MaNhanVien(manv),
thutubinhchon int not null,
diemch float not null,
sodiem float not null,
created_at date not null,
updated_at date not null
)

/*												News										*/

select * FROM NHANSU_TRUYENTHONG_News
create table NHANSU_TRUYENTHONG_News(
id int identity(1,1) primary key,
tieude nvarchar(200) not null,
gioithieu nvarchar(100) not null,
noidung nvarchar(max) not null,
ngaydang date not null,
hinh nvarchar(100) not null,
created_at date not null,
updated_at date not null
)
/*										Chạy bộ											*/

/*										Chạy giải			
	Mô tả cấu trúc: 
		- tbl.GiaiChayBo : Khởi tạo giảy chạy bộ bao gồm ( số km , số vòng , ngày chạy ) 
		- tbl.DangKyChay : Người chạy đăng ký giải chạy -> đợi check in 
		- tbl.SoLieuChayBo : Kiểm tra checkin -> ghi nhận số vòng chạy mỗi khi quẹt 
		 Thống kê dữ liệu bằng cách (Kiểm tra idcard - Ngày chạy - Count(records) )
*/
create table HOATDONG_CHAYBO_GiaiChayBo(
machaybo nvarchar(20) primary key , 
giaichay nvarchar(100) not null,
sokm float not null,
sovong float not null,
ngaytochuc date not null,
batdau datetime not null,
ketthuc datetime null,
trangthai int not null default(0) , /* 0:Đợi check in , 1: Đang chạy , 2:Đã chạy */
created_at date not null,
updated_at date not null
)
create table HOATDONG_CHAYBO_DangKyChayGiai(
id int identity(1,1) primary key,
idcard nvarchar(100) not null,
madk nvarchar(20) not null,
magiai nvarchar(20) foreign key references HOATDONG_CHAYBO_GiaiChayBo(machaybo) not null,
hoten nvarchar(100) not null,
checkin datetime null,
trangthai int not null default(0), /* 0 : đợi check in , 1:Đang chạy , 2: Đã xong */
pace nvarchar(20) null,
ttg nvarchar(20) null,
created_at date not null,
updated_at date not null
)
create table HOATDONG_CHAYBO_SoLieuChayGiai(
id int identity(1,1) primary key,
idcard nvarchar(100) not null,
ngaychay date not null default(GETDATE()),
batdau time not null default(GETDATE()),
created_at datetime not null,
updated_at datetime not null
)

insert into NHANSU_DonVi values ('CSVC',N'Phòng Quản lý Cơ sở Vật chất','130603187T',getdate(),getdate())	
insert into NHANSU_DonVi values ('TMVD',N'Phòng Thương Mại','100518183V',getdate(),getdate())
insert into NHANSU_DonVi values ('KTVD',N'Phòng Kế Toán','100422176T',getdate(),getdate())
insert into NHANSU_DonVi values ('PTDACD',N'Phòng Phát Triển Dự Án Cộng Đồng','180402179V',getdate(),getdate())	
insert into NHANSU_DonVi values ('HCNS',N'Phòng Nhân Sự Hành Chính','180402281H',getdate(),getdate())
insert into NHANSU_DonVi values ('BGD',N'Ban Giám Đốc','130218186M',getdate(),getdate())
insert into NHANSU_DonVi values ('RD',N'R&D','160704188T',getdate(),getdate(),N'Viễn Đông')

select * FROM NHANSU_MaNhanVien
select * FROM NHANSU_NHANVIEN_BANGLUONG_Thang

select a.manv,a.hoten,b.banga,b.bangb,b.bangc,b.bangd,b.bange,b.bangf,b.bangg,b.luongct,b.luongthuclanh,b.thang
from NHANSU_MaNhanVien a ,  NHANSU_NHANVIEN_BANGLUONG_Thang b
where a.manv = b.manv and b.thang =''


select a.manv,sum(b.tien) as 'tien'
 FROM NHANSU_NHANVIEN_BANGLUONG_BienDong a, NHANSU_NHANVIEN_BANGLUONG_KhaiBao b 
 where a.trangthai = 1 and a.madieukhoan = b.madieukhoan and a.manv = '' 
 group by a.manv

 select a.manv,a.madieukhoan,b.dieukhoan,b.loai,b.tien FROM NHANSU_NHANVIEN_BANGLUONG_BienDong a, NHANSU_NHANVIEN_BANGLUONG_KhaiBao b
 where a.madieukhoan = b.madieukhoan
 select * FROM NHANSU_NHANVIEN_BANGLUONG_KhaiBao

 insert into NHANSU_NHANVIEN_BANGLUONG_BienDong values ('170605195A','D2',1,'2019-07-01',null,getdate(),getdate())
 insert into NHANSU_NHANVIEN_BANGLUONG_BienDong values ('170605195A','D1',1,'2019-07-01',null,getdate(),getdate())
 insert into NHANSU_NHANVIEN_BANGLUONG_BienDong values ('170605195A','D3',1,'2019-07-01',null,getdate(),getdate())
 
insert into Users_PhanQuyen values('130603187T','csvc',getdate(),getdate())
 create trigger update_sohat on  USERS_VITIEN_GiaoDich FOR
 INSERT,UPDATE,DELETE
 AS BEGIN
  Declare @manv nvarchar(20)
  SET NOCOUNT ON;
  select @manv = (
  select manv from inserted union  
  select manv from deleted )
  update users set sohat = (SELECT CASE WHEN SUM(sohat) is not null then SUM(sohat) else 0 end from USERS_VITIEN_GiaoDich where manv = @manv) where manv = @manv
 END
  create trigger update_daotao on  NHANSU_CONGHIEN_DaoTao FOR
 INSERT,UPDATE,DELETE
 AS BEGIN
  Declare @manv nvarchar(20)
  SET NOCOUNT ON;
  select @manv = (
  select manv from inserted union  
  select manv from deleted )
  update NHANSU_ThongKeCongHien set daotao  = (SELECT SUM(Tong) from NHANSU_CONGHIEN_DaoTao where manv  = @manv)
 END
 
  create trigger update_tangiam on  NHANSU_CONGHIEN_TangGiam FOR
 INSERT,UPDATE,DELETE
 AS BEGIN
  Declare @manv nvarchar(20)
  SET NOCOUNT ON;
  select @manv = (
  select manv from inserted union  
  select manv from deleted )
  update NHANSU_ThongKeCongHien set tanggiam  = (SELECT SUM(diem) from NHANSU_CONGHIEN_TangGiam where manv  = @manv)
 END

 select * FROM USERS_VITIEN_GiaoDich
 select * FROM NHANSU_CONGHIEN_TangGiam
 select * FROM 
  select * FROM USERS_VITIEN_MaQuyDoi
 insert into USERS_VITIEN_GiaoDich values ('QD1','180604297C',N'Mức cống hiến 1400',1400,3,null,'180604297C',getdate(),getdate())
 select * FROM users where name like N'%Toàn'
 delete from USERS_VITIEN_GiaoDich
 select * From NHANSU_ThongKeCongHien
 select * FROM NHANSU_CONGHIEN_DaoTao
 select a.*,b.email,b.sdt,b.chucvu,b.hinh,b.ngaysinh,b.diachi FROM NHANSU_MaNhanVien a, NHANSU_Nhanvien b
 where a.manv = b.manv

 select manv, sum(TL) as 'TL' , sum(KT) as 'KT', sum(KN) as 'KN' , SUM(NT) as 'NT' , sum(CD) as 'CD' , SUM(TC) as 'TC',sum(Tong) as 'Tong'
 from NHANSU_CONGHIEN_DaoTao where manv = '170605195A'
 group by manv

 select * FROM NHANSU_ThongKeCongHien

 select * FROM NHANSU_CONGHIEN_TangGiam
 select * FROM USERS_VITIEN_GiaoDich
 select * FROM USERS_VITIEN_MaQuyDoi
 select * FROM CSVC_TAISAN_DauGiaThanhLy
 insert into USERS_VITIEN_GiaoDich values ('QD2','180604297C',N'Mức cống hiến 2600',260,3,N'Hệ thống chuyển đổi',null,getdate(),getdate())

 select name,sohat FROM users
 select * FROM users
 select * FROM CSVC_TAISAN_DauGiaThanhLy
 
 select DISTINCT madaugia,manv,max(sohat)
 from CSVC_TAISAN_DauGiaThanhLy where manv = '130218186M' and trangthai = 0
 group by madaugia,manv
 

 select * FROM NHANSU_NHANVIEN_BANGLUONG_CoDinh
 
 select * FROM NHANSU_NHANVIEN_BANGLUONG_BienDong
 select * FROM NHANSU_NHANVIEN_BANGLUONG_Thang

 select * FROM NHANSU_ThongKeCongHien

 