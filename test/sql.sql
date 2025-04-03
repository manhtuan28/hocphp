CREATE DATABASE quan_ly_thu_vien;

use quan_ly_thu_vien;

CREATE TABLE dau_sach(
	mads varchar(10) PRIMARY KEY not null,
    tends varchar(10) not null,
    sdt varchar(20) not null,
    diachi varchar(255) not null,
    email varchar(100) not null
);

CREATE TABLE sach(
	masach varchar(10) PRIMARY KEY not null,
    tensach varchar(100) not null,
    tacgia varchar(100) not null,
    namxuatban int not null,
    theloai varchar(100) not null,
    mads varchar(10),
    FOREIGN KEY (mads) REFERENCES dau_sach(mads)
);

INSERT INTO dau_sach (mads, tends, sdt, diachi, email) VALUES
('DS001', 'Kim Đồng', '0123456789', 'Hà Nội', 'kimdong@example.com'),
('DS002', 'Nhà Xuất Bản Trẻ', '0987654321', 'TP. HCM', 'nxbtre@example.com'),
('DS003', 'NXB Giáo Dục', '0345678912', 'Đà Nẵng', 'giaoduc@example.com'),
('DS004', 'NXB Văn Học', '0765432189', 'Hải Phòng', 'vanhoc@example.com'),
('DS005', 'NXB Chính Trị', '0923456781', 'Cần Thơ', 'chinhtri@example.com'),
('DS006', 'NXB Khoa Học', '0678912345', 'Hà Nội', 'khoahoc@example.com'),
('DS007', 'NXB Công Nghệ', '0543217896', 'TP. HCM', 'congnghe@example.com'),
('DS008', 'NXB Thể Thao', '0812345678', 'Đà Nẵng', 'thethao@example.com'),
('DS009', 'NXB Âm Nhạc', '0945678123', 'Hải Phòng', 'amnhac@example.com'),
('DS010', 'NXB Mỹ Thuật', '0734567891', 'Cần Thơ', 'mythuat@example.com'),
('DS011', 'NXB Văn Nghệ', '0891234567', 'Hà Nội', 'vannghe@example.com'),
('DS012', 'NXB Kinh Tế', '0912345678', 'TP. HCM', 'kinhte@example.com'),
('DS013', 'NXB Du Lịch', '0789123456', 'Đà Nẵng', 'dulich@example.com'),
('DS014', 'NXB Kỹ Thuật', '0612347895', 'Hải Phòng', 'kythuat@example.com'),
('DS015', 'NXB Nông Nghiệp', '0856789123', 'Cần Thơ', 'nongnghiep@example.com'),
('DS016', 'NXB Pháp Luật', '0934567812', 'Hà Nội', 'phapluat@example.com'),
('DS017', 'NXB Y Học', '0971234568', 'TP. HCM', 'yhoc@example.com'),
('DS018', 'NXB Giáo Trình', '0823456789', 'Đà Nẵng', 'giaotrinh@example.com'),
('DS019', 'NXB Thiếu Nhi', '0745678921', 'Hải Phòng', 'thieunhi@example.com'),
('DS020', 'NXB Quốc Phòng', '0998765432', 'Cần Thơ', 'quocphong@example.com');
INSERT INTO sach (masach, tensach, tacgia, namxuatban, theloai, mads) VALUES
('S001', 'Dế Mèn Phiêu Lưu Ký', 'Tô Hoài', 2020, 'Văn học', 'DS001'),
('S002', 'Tuổi Thơ Dữ Dội', 'Phùng Quán', 2018, 'Văn học', 'DS002'),
('S003', 'Lập Trình C++', 'Bjarne Stroustrup', 2022, 'Công nghệ', 'DS007'),
('S004', 'Cấu Trúc Dữ Liệu', 'Nguyễn Văn A', 2021, 'Công nghệ', 'DS007'),
('S005', 'Giáo Trình Vật Lý', 'Lê Xuân B', 2019, 'Khoa học', 'DS006'),
('S006', 'Tài Chính Doanh Nghiệp', 'Nguyễn Thành C', 2020, 'Kinh tế', 'DS012'),
('S007', 'Chiến Tranh Và Hòa Bình', 'Lev Tolstoy', 2017, 'Văn học', 'DS004'),
('S008', 'Những Người Khốn Khổ', 'Victor Hugo', 2016, 'Văn học', 'DS004'),
('S009', 'Giáo Trình Kế Toán', 'Trần Minh D', 2021, 'Kinh tế', 'DS012'),
('S010', 'Hóa Học Hữu Cơ', 'Lý Thị E', 2018, 'Khoa học', 'DS006'),
('S011', 'Bí Mật Tư Duy Triệu Phú', 'Harv Eker', 2019, 'Kinh tế', 'DS012'),
('S012', 'Nghệ Thuật Giao Tiếp', 'Dale Carnegie', 2021, 'Kỹ năng', 'DS014'),
('S013', 'Cẩm Nang Du Lịch', 'Nguyễn Văn F', 2022, 'Du lịch', 'DS013'),
('S014', 'Hướng Dẫn Sử Dụng Photoshop', 'Trần Hữu G', 2020, 'Thiết kế', 'DS010'),
('S015', 'Kỹ Thuật Lập Trình Python', 'Guido van Rossum', 2023, 'Công nghệ', 'DS007'),
('S016', 'Bí Ẩn Vũ Trụ', 'Stephen Hawking', 2018, 'Khoa học', 'DS006'),
('S017', 'Văn Hóa Việt Nam', 'Nguyễn Văn H', 2019, 'Văn hóa', 'DS011'),
('S018', 'Hướng Dẫn Lập Trình Java', 'James Gosling', 2021, 'Công nghệ', 'DS007'),
('S019', 'Địa Lý Việt Nam', 'Phạm Văn K', 2022, 'Giáo trình', 'DS018'),
('S020', 'Pháp Luật Đại Cương', 'Nguyễn Văn L', 2020, 'Pháp luật', 'DS016');
