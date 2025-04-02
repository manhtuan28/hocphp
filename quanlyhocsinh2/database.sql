CREATE DATABASE quanlyhocsinh;
use quanlyhocsinh;


CREATE TABLE lop(
	malop varchar(100) NOT null PRIMARY KEY,
    tenlop varchar(255) NOT null,
    giaovienCN varchar(255) NOT null,
    siso int NOT NULL,
    phonghoc varchar(100) NOT null
);

CREATE TABLE hocsinh(
	mahocsinh varchar(100) NOT null PRIMARY KEY,
    hoten varchar(255) not null,
    ngaysinh date not null,
    gioitinh ENUM('Nam', 'Nữ', 'LGBT') NOT null,
    noisinh varchar(255) not null,
	malop varchar(100) NOT null,
    FOREIGN key (malop) REFERENCES lop(malop)
);


INSERT INTO lop (malop, tenlop, giaovienCN, siso, phonghoc)
VALUES
('L01', '10A1', 'Nguyễn Văn A', 45, 'P101'),
('L02', '10A2', 'Trần Thị B', 43, 'P102'),
('L03', '11A1', 'Lê Văn C', 40, 'P201'),
('L04', '11A2', 'Phạm Thị D', 42, 'P202'),
('L05', '12A1', 'Hoàng Văn E', 38, 'P301'),
('L06', '12A2', 'Đỗ Thị F', 39, 'P302'),
('L07', '10A3', 'Đinh Văn G', 41, 'P103'),
('L08', '11A3', 'Nguyễn Thị H', 44, 'P203'),
('L09', '12A3', 'Trần Văn I', 37, 'P303'),
('L10', '10A4', 'Lê Thị J', 35, 'P104');

INSERT INTO hocsinh (mahocsinh, hoten, ngaysinh, gioitinh, noisinh, malop)
VALUES
('HS001', 'Nguyễn An', '2008-01-15', 'Nam', 'Hà Nội', 'L01'),
('HS002', 'Trần Bình', '2008-02-20', 'Nam', 'Đà Nẵng', 'L01'),
('HS003', 'Lê Cẩm', '2008-03-25', 'Nữ', 'TP. HCM', 'L02'),
('HS004', 'Phạm Dương', '2008-04-30', 'Nam', 'Hải Phòng', 'L02'),
('HS005', 'Hoàng Đan', '2008-05-12', 'LGBT', 'Cần Thơ', 'L03'),
('HS006', 'Đỗ Duy', '2008-06-18', 'Nam', 'Bắc Ninh', 'L03'),
('HS007', 'Đinh Gia', '2008-07-22', 'Nam', 'Huế', 'L04'),
('HS008', 'Nguyễn Hà', '2008-08-14', 'Nữ', 'Đà Nẵng', 'L04'),
('HS009', 'Trần Hiếu', '2008-09-19', 'Nam', 'Hà Nội', 'L05'),
('HS010', 'Lê Hồng', '2008-10-05', 'LGBT', 'TP. HCM', 'L05'),
('HS011', 'Phạm Khánh', '2008-11-11', 'Nữ', 'Cần Thơ', 'L06'),
('HS012', 'Hoàng Khang', '2008-12-25', 'Nam', 'Đà Nẵng', 'L06'),
('HS013', 'Đỗ Linh', '2008-01-17', 'Nữ', 'Hải Phòng', 'L07'),
('HS014', 'Đinh Minh', '2008-02-21', 'Nam', 'Hà Nội', 'L07'),
('HS015', 'Nguyễn Nam', '2008-03-27', 'Nam', 'TP. HCM', 'L08'),
('HS016', 'Trần Ngọc', '2008-04-30', 'Nữ', 'Đà Nẵng', 'L08'),
('HS017', 'Lê Phát', '2008-05-18', 'LGBT', 'Huế', 'L09'),
('HS018', 'Phạm Quân', '2008-06-22', 'Nam', 'Hà Nội', 'L09'),
('HS019', 'Hoàng Quyên', '2008-07-14', 'Nữ', 'Cần Thơ', 'L10'),
('HS020', 'Đỗ Sang', '2008-08-19', 'Nam', 'Đà Nẵng', 'L10'),
('HS021', 'Đinh Thanh', '2008-09-22', 'Nữ', 'Huế', 'L01'),
('HS022', 'Nguyễn Thắng', '2008-10-30', 'Nam', 'Hải Phòng', 'L01'),
('HS023', 'Trần Tuyết', '2008-11-11', 'Nữ', 'Hà Nội', 'L02'),
('HS024', 'Lê Vỹ', '2008-12-25', 'Nam', 'TP. HCM', 'L02'),
('HS025', 'Phạm Vinh', '2008-01-17', 'LGBT', 'Đà Nẵng', 'L03'),
('HS026', 'Hoàng Vy', '2008-02-21', 'Nữ', 'Cần Thơ', 'L03'),
('HS027', 'Đỗ Xuân', '2008-03-27', 'Nam', 'Hà Nội', 'L04'),
('HS028', 'Đinh Yến', '2008-04-30', 'Nữ', 'Đà Nẵng', 'L04'),
('HS029', 'Nguyễn Ánh', '2008-05-18', 'Nữ', 'Huế', 'L05'),
('HS030', 'Trần Bình', '2008-06-22', 'Nam', 'Hà Nội', 'L05'),
('HS031', 'Lê Cẩm', '2008-07-14', 'LGBT', 'TP. HCM', 'L06'),
('HS032', 'Phạm Đan', '2008-08-19', 'Nữ', 'Cần Thơ', 'L06'),
('HS033', 'Hoàng Đạt', '2008-09-22', 'Nam', 'Đà Nẵng', 'L07'),
('HS034', 'Đỗ Gia', '2008-10-30', 'Nam', 'Hà Nội', 'L07'),
('HS035', 'Đinh Hà', '2008-11-11', 'Nữ', 'Huế', 'L08');