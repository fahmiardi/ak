-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 02, 2010 at 07:50 AM
-- Server version: 5.0.21
-- PHP Version: 5.1.4
-- 
-- Database: `db_angkakredit`
-- 
CREATE DATABASE `db_angkakredit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_angkakredit`;

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_blok_kategori`
-- 

CREATE TABLE `ak_blok_kategori` (
  `idBlok` int(11) NOT NULL auto_increment,
  `idSkenario` int(11) NOT NULL,
  `kdKategori` varchar(20) NOT NULL,
  PRIMARY KEY  (`idBlok`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ak_blok_kategori`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ak_group`
-- 

CREATE TABLE `ak_group` (
  `idGroup` int(11) NOT NULL,
  `namaGroup` text NOT NULL,
  PRIMARY KEY  (`idGroup`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `ak_group`
-- 

INSERT INTO `ak_group` VALUES (1, 'pendidikan');
INSERT INTO `ak_group` VALUES (2, 'dikjar');
INSERT INTO `ak_group` VALUES (3, 'penelitian');
INSERT INTO `ak_group` VALUES (4, 'pengabdian');
INSERT INTO `ak_group` VALUES (5, 'penunjang');

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_kategori`
-- 

CREATE TABLE `ak_kategori` (
  `idKategori` int(11) NOT NULL auto_increment,
  `kdKategori` varchar(20) NOT NULL,
  `namaKategori` text NOT NULL,
  `deskripsi` text NOT NULL,
  `parentId` varchar(20) NOT NULL,
  `count` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  PRIMARY KEY  (`idKategori`),
  UNIQUE KEY `kdKategori` (`kdKategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

-- 
-- Dumping data for table `ak_kategori`
-- 

INSERT INTO `ak_kategori` VALUES (1, '1', 'Unsur Utama Pendidikan', '', '0', 3, 1);
INSERT INTO `ak_kategori` VALUES (2, '1.1', 'Mengikuti Pendidikan Sekolah dan Memperoleh Gelar/Sebutan/Ijazah', '', '1', 3, 1);
INSERT INTO `ak_kategori` VALUES (3, '1.1.1', 'Doktor', '', '1.1', 0, 1);
INSERT INTO `ak_kategori` VALUES (4, '1.1.2', 'Magister', '', '1.1', 0, 1);
INSERT INTO `ak_kategori` VALUES (5, '1.1.3', 'Sarjana/Diploma IV', '', '1.1', 0, 1);
INSERT INTO `ak_kategori` VALUES (6, '1.2', 'Mengikuti Pendidikan Sekolah dan Memperoleh Gelar/Sebutan/Ijazah Tambahan yang Setingkat atau Lebih Tinggi di Luar Bidang Ilmunya', '', '1', 3, 1);
INSERT INTO `ak_kategori` VALUES (7, '1.2.1', 'Doktor/Spesialis II', '', '1.2', 0, 1);
INSERT INTO `ak_kategori` VALUES (8, '1.2.2', 'Magister/Spesialis I', '', '1.2', 0, 1);
INSERT INTO `ak_kategori` VALUES (9, '1.2.3', 'Sarjana/Diploma IV', '', '1.2', 0, 1);
INSERT INTO `ak_kategori` VALUES (10, '1.3', 'Mengikuti Pendidikan dan pelatihan Fungsional Dosen dan Memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP)', '', '1', 6, 1);
INSERT INTO `ak_kategori` VALUES (11, '1.3.1', 'Lamanya > 960 Jam', '', '1.3', 0, 1);
INSERT INTO `ak_kategori` VALUES (12, '1.3.2', 'Lamanya 641 - 960 Jam', '', '1.3', 0, 1);
INSERT INTO `ak_kategori` VALUES (13, '1.3.3', 'Lamanya 481 - 640 Jam', '', '1.3', 0, 1);
INSERT INTO `ak_kategori` VALUES (14, '1.3.4', 'Lamanya 161 - 480 Jam', '', '1.3', 0, 1);
INSERT INTO `ak_kategori` VALUES (15, '1.3.5', 'Lamanya 81 - 160 Jam', '', '1.3', 0, 1);
INSERT INTO `ak_kategori` VALUES (16, '1.3.6', 'Lamanya 30 - 80 Jam', '', '1.3', 0, 1);
INSERT INTO `ak_kategori` VALUES (17, '2', 'Unsur Utama Tridharma Perguruan Tinggi', '', '0', 4, 2);
INSERT INTO `ak_kategori` VALUES (18, '2.1', 'Melaksanakan Pendidikan dan Pengajaran', '', '2', 12, 2);
INSERT INTO `ak_kategori` VALUES (19, '2.1.1', 'Melaksanakan Perkuliahan/Tutorial dan Membimbing, Menguji, serta Menyelenggarakan Pendidikan di Laboratorium, Praktik Keguruan, Bengkel/Studio/Kebun Percobaan/Teknologi Pengajaran dan Praktik Lapangan ', '', '2.1', 4, 2);
INSERT INTO `ak_kategori` VALUES (20, '2.1.1.1', 'Asisten Ahli', '', '2.1.1', 1, 2);
INSERT INTO `ak_kategori` VALUES (21, '2.1.1.1.1', 'Mengajar', '', '2.1.1.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (22, '2.1.1.2', 'Lektor', '', '2.1.1', 1, 2);
INSERT INTO `ak_kategori` VALUES (23, '2.1.1.2.1', 'Mengajar', '', '2.1.1.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (24, '2.1.1.3', 'Lektor Kepala', '', '2.1.1', 1, 2);
INSERT INTO `ak_kategori` VALUES (25, '2.1.1.3.1', 'Mengajar', '', '2.1.1.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (26, '2.1.1.4', 'Guru Besar', '', '2.1.1', 1, 2);
INSERT INTO `ak_kategori` VALUES (27, '2.1.1.4.1', 'Mengajar', '', '2.1.1.4', 0, 2);
INSERT INTO `ak_kategori` VALUES (28, '2.1.2', 'Membimbing Seminar Mahasiswa', '', '2.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (29, '2.1.3', 'Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan', '', '2.1', 3, 2);
INSERT INTO `ak_kategori` VALUES (30, '2.1.3.1', 'Membimbing KKN', '', '2.1.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (31, '2.1.3.2', 'Membimbing Praktik Kerja Nyata', '', '2.1.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (32, '2.1.3.3', 'Membimbing Praktik Kerja Lapangan', '', '2.1.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (33, '2.1.4', 'Membimbing dan Ikut Membimbing Disertasi, Tesis, Skripsi, dan Laporan Akhir Studi', '', '2.1', 2, 2);
INSERT INTO `ak_kategori` VALUES (34, '2.1.4.1', 'Pembimbing Utama', '', '2.1.4', 4, 2);
INSERT INTO `ak_kategori` VALUES (35, '2.1.4.1.1', 'Disertasi', '', '2.1.4.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (36, '2.1.4.1.2', 'Tesis', '', '2.1.4.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (37, '2.1.4.1.3', 'Skripsi', '', '2.1.4.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (38, '2.1.4.1.4', 'Laporan Akhir Studi', '', '2.1.4.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (39, '2.1.4.2', 'Pembimbing Pendamping/Pembantu', '', '2.1.4', 4, 2);
INSERT INTO `ak_kategori` VALUES (40, '2.1.4.2.1', 'Disertasi', '', '2.1.4.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (41, '2.1.4.2.2', 'Tesis', '', '2.1.4.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (42, '2.1.4.2.3', 'Skripsi', '', '2.1.4.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (43, '2.1.4.2.4', 'Laporan Akhir Studi', '', '2.1.4.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (44, '2.1.5', 'Bertugas Sebagai Penguji pada Ujian Akhir', '', '2.1', 2, 2);
INSERT INTO `ak_kategori` VALUES (45, '2.1.5.1', 'Ketua Penguji', '', '2.1.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (46, '2.1.5.2', 'Anggota Penguji', '', '2.1.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (47, '2.1.6', 'Membina Kegiatan Mahasiswa di Bidang Akademik dan Kemahasiswaan', '', '2.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (48, '2.1.7', 'Mengembangkan Program Kuliah', '', '2.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (49, '2.1.8', 'Mengembangkan Bahan Pengajaran', '', '2.1', 2, 2);
INSERT INTO `ak_kategori` VALUES (50, '2.1.8.1', 'Buku Ajar', '', '2.1.8', 0, 2);
INSERT INTO `ak_kategori` VALUES (51, '2.1.8.2', 'Diktat, Modul, Petunjuk Praktikum, Model, Alat Bantu, Audio Visual, Naskah Tutorial', '', '2.1.8', 7, 2);
INSERT INTO `ak_kategori` VALUES (52, '2.1.8.2.1', 'Diktat', '', '2.1.8.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (53, '2.1.8.2.2', 'Modul', '', '2.1.8.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (54, '2.1.8.2.3', 'Petunjuk Praktikum', '', '2.1.8.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (55, '2.1.8.2.4', 'Model', '', '2.1.8.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (56, '2.1.8.2.5', 'Alat Bantu', '', '2.1.8.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (57, '2.1.8.2.6', 'Audio Visual', '', '2.1.8.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (58, '2.1.8.2.7', 'Naskah Tutorial', '', '2.1.8.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (59, '2.1.9', 'Menyampaikan Orasi Ilmiah', '', '2.1', 0, 2);
INSERT INTO `ak_kategori` VALUES (60, '2.1.10', 'Menduduki Jabatan Pimpinan Perguruan Tinggi', '', '2.1', 5, 2);
INSERT INTO `ak_kategori` VALUES (61, '2.1.10.1', 'Rektor', '', '2.1.10', 0, 2);
INSERT INTO `ak_kategori` VALUES (62, '2.1.10.2', 'Pembantu Rektor, Ketua Lembaga, Dekan Fakultas, Direktur Pascasarjana', '', '2.1.10', 4, 2);
INSERT INTO `ak_kategori` VALUES (63, '2.1.10.2.1', 'Pembantu Rektor', '', '2.1.10.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (64, '2.1.10.2.2', 'Ketua Lembaga', '', '2.1.10.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (65, '2.1.10.2.3', 'Dekan Fakultas', '', '2.1.10.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (66, '2.1.10.2.4', 'Direktur Pascasarjana', '', '2.1.10.2', 0, 2);
INSERT INTO `ak_kategori` VALUES (67, '2.1.10.3', 'Pembantu Dekan, Ketua Sekolah Tinggi, Asdir PPs, Direktur Politeknik, Kapus Penelitian pada Univ./Inst., Ketua Senat Fakultas, Sekretaris Senat Fakultas', '', '2.1.10', 7, 2);
INSERT INTO `ak_kategori` VALUES (68, '2.1.10.3.1', 'Pembantu Dekan', '', '2.1.10.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (69, '2.1.10.3.2', 'Ketua Sekolah Tinggi', '', '2.1.10.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (70, '2.1.10.3.3', 'Asdir PPs', '', '2.1.10.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (71, '2.1.10.3.4', 'Direktur Politeknik', '', '2.1.10.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (72, '2.1.10.3.5', 'Kapus Penelitian pada Univ./Inst.', '', '2.1.10.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (73, '2.1.10.3.6', 'Ketua Senat Fakultas', '', '2.1.10.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (74, '2.1.10.3.7', 'Sekretaris Senat Fakultas', '', '2.1.10.3', 0, 2);
INSERT INTO `ak_kategori` VALUES (75, '2.1.10.4', 'Direktur Akademi, Pembantu Ketua Sekolah Tinggi, Kapus Penelitian dan Pengabdian pada Masyarakat di Lingkungan Sekolah Tinggi, Pembantu Direktur Politeknik', '', '2.1.10', 4, 2);
INSERT INTO `ak_kategori` VALUES (76, '2.1.10.4.1', 'Direktur Akademi', '', '2.1.10.4', 0, 2);
INSERT INTO `ak_kategori` VALUES (77, '2.1.10.4.2', 'Pembantu Ketua Sekolah Tinggi', '', '2.1.10.4', 0, 2);
INSERT INTO `ak_kategori` VALUES (78, '2.1.10.4.3', 'Kapus Penelitian dan Pengabdian Masyarakat di Lingkungan Sekolah Tinggi', '', '2.1.10.4', 0, 2);
INSERT INTO `ak_kategori` VALUES (79, '2.1.10.4.4', 'Pembantu Direktur Politeknik', '', '2.1.10.4', 0, 2);
INSERT INTO `ak_kategori` VALUES (80, '2.1.10.5', 'Pembantu Direktur Akademi, Ketua Jurusan/Bidang, Ketua/Sekretaris Program Studi, Ketua Unit Penelitian dan Pengabdian kepada Masyarakat', '', '2.1.10', 6, 2);
INSERT INTO `ak_kategori` VALUES (81, '2.1.10.5.1', 'Pembantu Direktur Akademi', '', '2.1.10.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (82, '2.1.10.5.2', 'Ketua Jurusan', '', '2.1.10.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (83, '2.1.10.5.3', 'Ketua Bagian', '', '2.1.10.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (84, '2.1.10.5.4', 'Ketua Program Studi', '', '2.1.10.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (85, '2.1.10.5.5', 'Sekretaris Program Studi', '', '2.1.10.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (86, '2.1.10.5.6', 'Ketua Unit Penelitian dan Pengabdian kepada Masyarakat', '', '2.1.10.5', 0, 2);
INSERT INTO `ak_kategori` VALUES (87, '2.1.11', 'Membimbing Dosen yang Lebih Rendah Jabatan Fungsionalnya', '', '2.1', 2, 2);
INSERT INTO `ak_kategori` VALUES (88, '2.1.11.1', 'Pembimbing Pencangkokan', '', '2.1.11', 0, 2);
INSERT INTO `ak_kategori` VALUES (89, '2.1.11.2', 'Reguler', '', '2.1.11', 0, 2);
INSERT INTO `ak_kategori` VALUES (90, '2.1.12', 'Melaksanakan Kegiatan Datasering dan Pencangkokan', '', '2.1', 2, 2);
INSERT INTO `ak_kategori` VALUES (91, '2.1.12.1', 'Datasering', '', '2.1.12', 0, 2);
INSERT INTO `ak_kategori` VALUES (92, '2.1.12.2', 'Pencangkokan', '', '2.1.12', 0, 2);
INSERT INTO `ak_kategori` VALUES (93, '2.2', 'Melaksanakan Penelitian', '', '2', 6, 3);
INSERT INTO `ak_kategori` VALUES (94, '2.2.1', 'Menghasilkan Karya Ilmiah', '', '2.2', 6, 3);
INSERT INTO `ak_kategori` VALUES (95, '2.2.1.1', 'Hasil Penelitian atau Hasil Pemikiran yang Dipublikasikan dalam Bentuk', '', '2.2.1', 2, 3);
INSERT INTO `ak_kategori` VALUES (96, '2.2.1.1.1', 'Monograf', '', '2.2.1.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (97, '2.2.1.1.2', 'Buku Referensi', '', '2.2.1.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (98, '2.2.1.2', 'Hasil Penelitian atau Hasil Pemikiran yang Dipublikasikan dalam Majalah Ilmiah', '', '2.2.1', 3, 3);
INSERT INTO `ak_kategori` VALUES (99, '2.2.1.2.1', 'Internasional', '', '2.2.1.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (100, '2.2.1.2.2', 'Nasional Terakreditasi', '', '2.2.1.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (101, '2.2.1.2.3', 'Nasional Tidak Terakreditasi', '', '2.2.1.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (102, '2.2.1.3', 'Hasil Penelitian atau Hasil Pemikiran yang Dipublikasikan melalui Seminar', '', '2.2.1', 2, 3);
INSERT INTO `ak_kategori` VALUES (103, '2.2.1.3.1', 'Disajikan', '', '2.2.1.3', 2, 3);
INSERT INTO `ak_kategori` VALUES (104, '2.2.1.3.1.1', 'Internasional', '', '2.2.1.3.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (105, '2.2.1.3.1.2', 'Nasional', '', '2.2.1.3.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (106, '2.2.1.3.2', 'Poster', '', '2.2.1.3', 2, 3);
INSERT INTO `ak_kategori` VALUES (107, '2.2.1.3.2.1', 'Internasional', '', '2.2.1.3.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (108, '2.2.1.3.2.2', 'Nasional', '', '2.2.1.3.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (109, '2.2.1.4', 'Hasil Penelitian yang Dipublikasikan dalam Koran/Majalah Umum sebagai Suatu Tulisan Ilmiah Populer', '', '2.2.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (110, '2.2.1.5', 'Hasil Penelitian atau Hasil Pemikiran yang Tidak Dipublikasikan (Tersimpan di Perpustakaan Perguruan Tinggi)', '', '2.2.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (111, '2.2.2', 'Menerjemahkan/Menyadur Buku Ilmiah yang Diterbitkan dan Diedarkan secara Nasional', '', '2.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (112, '2.2.3', 'Mengedit/Menyunting Karya Ilmiah yang Diterbitkan dan Diedarkan secara Nasional', '', '2.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (113, '2.2.4', 'Membuat Rancangan dan Karya Teknologi yang Dipatenkan', '', '2.2', 2, 3);
INSERT INTO `ak_kategori` VALUES (114, '2.2.4.1', 'Tingkat Internasional', '', '2.2.4', 0, 3);
INSERT INTO `ak_kategori` VALUES (115, '2.2.4.2', 'Tingkat Nasional', '', '2.2.4', 0, 3);
INSERT INTO `ak_kategori` VALUES (116, '2.2.5', 'Membuat Rancangan dan Karya Teknologi yang Tidak Dipatenkan', '', '2.2', 3, 3);
INSERT INTO `ak_kategori` VALUES (117, '2.2.5.1', 'Tingkat Internasional', '', '2.2.5', 0, 3);
INSERT INTO `ak_kategori` VALUES (118, '2.2.5.2', 'Tingkat Nasional', '', '2.2.5', 0, 3);
INSERT INTO `ak_kategori` VALUES (119, '2.2.5.3', 'Tingkat Lokal', '', '2.2.5', 0, 3);
INSERT INTO `ak_kategori` VALUES (120, '2.2.6', 'Membuat Rancangan dan Karya Seni Monumental/Seni Pertunjukan', '', '2.2', 5, 3);
INSERT INTO `ak_kategori` VALUES (121, '2.2.6.1', 'Rancangan dan Karya Seni Monumental', '', '2.2.6', 3, 3);
INSERT INTO `ak_kategori` VALUES (122, '2.2.6.1.1', 'Tingkat Internasional', '', '2.2.6.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (123, '2.2.6.1.2', 'Tingkat Nasional', '', '2.2.6.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (124, '2.2.6.1.3', 'Tingkat Lokal', '', '2.2.6.1', 0, 3);
INSERT INTO `ak_kategori` VALUES (125, '2.2.6.2', 'Rancangan dan Karya Seni Rupa', '', '2.2.6', 3, 3);
INSERT INTO `ak_kategori` VALUES (126, '2.2.6.2.1', 'Tingkat Internasional', '', '2.2.6.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (127, '2.2.6.2.2', 'Tingkat Nasional', '', '2.2.6.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (128, '2.2.6.2.3', 'Tingkat Lokal', '', '2.2.6.2', 0, 3);
INSERT INTO `ak_kategori` VALUES (129, '2.2.6.3', 'Rancangan dan Karya Seni Kriya', '', '2.2.6', 3, 3);
INSERT INTO `ak_kategori` VALUES (130, '2.2.6.3.1', 'Tingkat Internasional', '', '2.2.6.3', 0, 3);
INSERT INTO `ak_kategori` VALUES (131, '2.2.6.3.2', 'Tingkat Nasional', '', '2.2.6.3', 0, 3);
INSERT INTO `ak_kategori` VALUES (132, '2.2.6.3.3', 'Tingkat Lokal', '', '2.2.6.3', 0, 3);
INSERT INTO `ak_kategori` VALUES (133, '2.2.6.4', 'Rancangan dan Karya Seni Pertunjukan', '', '2.2.6', 3, 3);
INSERT INTO `ak_kategori` VALUES (134, '2.2.6.4.1', 'Tingkat Internasional', '', '2.2.6.4', 0, 3);
INSERT INTO `ak_kategori` VALUES (135, '2.2.6.4.2', 'Tingkat Nasional', '', '2.2.6.4', 0, 3);
INSERT INTO `ak_kategori` VALUES (136, '2.2.6.4.3', 'Tingkat Lokal', '', '2.2.6.4', 0, 3);
INSERT INTO `ak_kategori` VALUES (137, '2.2.6.5', 'Karya Desain', '', '2.2.6', 3, 3);
INSERT INTO `ak_kategori` VALUES (138, '2.2.6.5.1', 'Tingkat Internasional', '', '2.2.6.5', 0, 3);
INSERT INTO `ak_kategori` VALUES (139, '2.2.6.5.2', 'Tingkat Nasional', '', '2.2.6.5', 0, 3);
INSERT INTO `ak_kategori` VALUES (140, '2.2.6.5.3', 'Tingkat Lokal', '', '2.2.6.5', 0, 3);
INSERT INTO `ak_kategori` VALUES (141, '2.2.7', 'Karya Sastra', '', '2.2', 3, 3);
INSERT INTO `ak_kategori` VALUES (142, '2.2.7.1', 'Tingkat Internasional', '', '2.2.7', 0, 3);
INSERT INTO `ak_kategori` VALUES (143, '2.2.7.2', 'Tingkat Nasional', '', '2.2.7', 0, 3);
INSERT INTO `ak_kategori` VALUES (144, '2.2.7.3', 'Tingkat Lokal', '', '2.2.7', 0, 3);
INSERT INTO `ak_kategori` VALUES (145, '2.3', 'Melaksanakan Pengabdian kepada Masyarakat', '', '2', 5, 4);
INSERT INTO `ak_kategori` VALUES (146, '2.3.1', 'Menduduki Jabatan Pimpinan pada Lembaga Pemerintahan', '', '2.3', 0, 4);
INSERT INTO `ak_kategori` VALUES (147, '2.3.2', 'Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian yang Dimanfaatkan oleh Masyarakat', '', '2.3', 0, 4);
INSERT INTO `ak_kategori` VALUES (148, '2.3.3', 'Memberi Latihan, Penyuluhan/Penataran/Ceramah kepada Masyarakat, baik Sesuai dengan Bidang Ilmunya maupun di Luar Bidang Ilmunya, baik kepada Masyarakat Umum maupun Masyarakat Kampus (Dosen, Mahasiswa, dan Tenaga Non-Dosen)', '', '2.3', 2, 4);
INSERT INTO `ak_kategori` VALUES (149, '2.3.3.1', 'Terjadwal/Terprogram', '', '2.3.3', 2, 4);
INSERT INTO `ak_kategori` VALUES (150, '2.3.3.1.1', 'Lebih dari Satu Semester', '', '2.3.3.1', 3, 4);
INSERT INTO `ak_kategori` VALUES (151, '2.3.3.1.1.1', 'Tingkat Internasional', '', '2.3.3.1.1', 0, 4);
INSERT INTO `ak_kategori` VALUES (152, '2.3.3.1.1.2', 'Tingkat Nasional', '', '2.3.3.1.1', 0, 4);
INSERT INTO `ak_kategori` VALUES (153, '2.3.3.1.1.3', 'Tingkat Lokal', '', '2.3.3.1.1', 0, 4);
INSERT INTO `ak_kategori` VALUES (154, '2.3.3.1.2', 'Kurang dari Satu Semester', '', '2.3.3.1', 3, 4);
INSERT INTO `ak_kategori` VALUES (155, '2.3.3.1.2.1', 'Tingkat Internasional', '', '2.3.3.1.2', 0, 4);
INSERT INTO `ak_kategori` VALUES (156, '2.3.3.1.2.2', 'Tingkat Nasional', '', '2.3.3.1.2', 0, 4);
INSERT INTO `ak_kategori` VALUES (157, '2.3.3.1.2.3', 'Tingkat Lokal', '', '2.3.3.1.2', 0, 4);
INSERT INTO `ak_kategori` VALUES (158, '2.3.3.2', 'Insidentil', '', '2.3.3', 0, 4);
INSERT INTO `ak_kategori` VALUES (159, '2.3.4', 'Memberi Pelayanan kepada Masyarakat atau Kegiatan Kegiatan Lain yang Menunjang Pelaksanaan Tugas Umum Pemerintahan dan Pembangunan', '', '2.3', 3, 4);
INSERT INTO `ak_kategori` VALUES (160, '2.3.4.1', 'Berdasarkan Bidang Keahliannya', '', '2.3.4', 0, 4);
INSERT INTO `ak_kategori` VALUES (161, '2.3.4.2', 'Berdasarkan Penugasan Lembaga Perguruan Tinggi', '', '2.3.4', 0, 4);
INSERT INTO `ak_kategori` VALUES (162, '2.3.4.3', 'Berdasarkan Fungsi/Jabatan', '', '2.3.4', 0, 4);
INSERT INTO `ak_kategori` VALUES (163, '2.3.5', 'Membuat/Menulis Karya Pengabdian pada Masyarakat', '', '2.3', 0, 4);
INSERT INTO `ak_kategori` VALUES (164, '3', 'Unsur Penunjang', '', '0', 9, 5);
INSERT INTO `ak_kategori` VALUES (165, '3.1', 'Menjadi Anggota dalam Suatu Panitia/Badan pada Perguruan Tinggi', '', '3', 3, 5);
INSERT INTO `ak_kategori` VALUES (166, '3.1.1', 'Ketua', '', '3.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (167, '3.1.2', 'Wakil', '', '3.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (168, '3.1.3', 'Anggota', '', '3.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (169, '3.2', 'Menjadi Anggota Panitia/Badan pada Lembaga Pemerintahan', '', '3', 2, 5);
INSERT INTO `ak_kategori` VALUES (170, '3.2.1', 'Panitia Pusat', '', '3.2', 3, 5);
INSERT INTO `ak_kategori` VALUES (171, '3.2.1.1', 'Ketua', '', '3.2.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (172, '3.2.1.2', 'Wakil', '', '3.2.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (173, '3.2.1.3', 'Anggota', '', '3.2.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (174, '3.2.2', 'Panitia Daerah', '', '3.2', 3, 5);
INSERT INTO `ak_kategori` VALUES (175, '3.2.2.1', 'Ketua', '', '3.2.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (176, '3.2.2.2', 'Wakil', '', '3.2.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (177, '3.2.2.3', 'Anggota', '', '3.2.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (178, '3.3', 'Menjadi Anggota Profesi', '', '3', 2, 5);
INSERT INTO `ak_kategori` VALUES (179, '3.3.1', 'Tingkat Internasional', '', '3.3', 3, 5);
INSERT INTO `ak_kategori` VALUES (180, '3.3.1.1', 'Pengurus', '', '3.3.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (181, '3.3.1.2', 'Anggota atas Permintaan', '', '3.3.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (182, '3.3.1.3', 'Anggota', '', '3.3.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (183, '3.3.2', 'Tingkat Nasional', '', '3.3', 3, 5);
INSERT INTO `ak_kategori` VALUES (184, '3.3.2.1', 'Pengurus', '', '3.3.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (185, '3.3.2.2', 'Anggota atas Permintaan', '', '3.3.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (186, '3.3.2.3', 'Anggota', '', '3.3.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (187, '3.4', 'Mewakili Perguruan Tinggi/Lembaga Pemerintah Duduk dalam Panitia Antar Lembaga', '', '3', 0, 5);
INSERT INTO `ak_kategori` VALUES (188, '3.5', 'Menjadi Anggota Delegasi Nasional ke Pertemuan Internasional', '', '3', 2, 5);
INSERT INTO `ak_kategori` VALUES (189, '3.5.1', 'Ketua Delegasi', '', '3.5', 0, 5);
INSERT INTO `ak_kategori` VALUES (190, '3.5.2', 'Anggota', '', '3.5', 0, 5);
INSERT INTO `ak_kategori` VALUES (191, '3.6', 'Berperan Aktif dalam Pertemuan Ilmiah', '', '3', 4, 5);
INSERT INTO `ak_kategori` VALUES (192, '3.6.1', 'Tingkat Internasional', '', '3.6', 2, 5);
INSERT INTO `ak_kategori` VALUES (193, '3.6.1.1', 'Ketua', '', '3.6.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (194, '3.6.1.2', 'Anggota', '', '3.6.1', 0, 5);
INSERT INTO `ak_kategori` VALUES (195, '3.6.2', 'Tingkat Nasional', '', '3.6', 2, 5);
INSERT INTO `ak_kategori` VALUES (196, '3.6.2.1', 'Ketua', '', '3.6.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (197, '3.6.2.2', 'Anggota', '', '3.6.2', 0, 5);
INSERT INTO `ak_kategori` VALUES (198, '3.6.3', 'Tingkat Regional', '', '3.6', 2, 5);
INSERT INTO `ak_kategori` VALUES (199, '3.6.3.1', 'Ketua', '', '3.6.3', 0, 5);
INSERT INTO `ak_kategori` VALUES (200, '3.6.3.2', 'Anggota', '', '3.6.3', 0, 5);
INSERT INTO `ak_kategori` VALUES (201, '3.6.4', 'Di Lingkungan Perguruan Tinggi', '', '3.6', 2, 5);
INSERT INTO `ak_kategori` VALUES (202, '3.6.4.1', 'Ketua', '', '3.6.4', 0, 5);
INSERT INTO `ak_kategori` VALUES (203, '3.6.4.2', 'Anggota', '', '3.6.4', 0, 5);
INSERT INTO `ak_kategori` VALUES (204, '3.7', 'Mendapat Tanda Jasa/Penghargaan Antara Lain seperti Satya Lencana Karyasatya, Bintang Jasa, Bintang Mahaputra, Hadiah Pendidikan, Hadiah Ilmu Pengetahuan, Hadiah Pengabdian', '', '3', 3, 5);
INSERT INTO `ak_kategori` VALUES (205, '3.7.1', 'Tingkat Internasional', '', '3.7', 0, 5);
INSERT INTO `ak_kategori` VALUES (206, '3.7.2', 'Tingkat Nasional', '', '3.7', 0, 5);
INSERT INTO `ak_kategori` VALUES (207, '3.7.3', 'Tingkat Daerah/Lokal', '', '3.7', 0, 5);
INSERT INTO `ak_kategori` VALUES (208, '3.8', 'Menulis Buku Pelajaran SLTA ke Bawah yang Diterbitkan dan Diedarkan secara Nasional', '', '3', 3, 5);
INSERT INTO `ak_kategori` VALUES (209, '3.8.1', 'Buku SMTA atau Setingkat', '', '3.8', 0, 5);
INSERT INTO `ak_kategori` VALUES (210, '3.8.2', 'Buku SMTP atau setingkat', '', '3.8', 0, 5);
INSERT INTO `ak_kategori` VALUES (211, '3.8.3', 'Buku SD atau Setingkat', '', '3.8', 0, 5);
INSERT INTO `ak_kategori` VALUES (212, '3.9', 'Mempunyai Prestasi di Bidang Olahraga/Humaniora', '', '3', 3, 5);
INSERT INTO `ak_kategori` VALUES (213, '3.9.1', 'Tingkat Internasional', '', '3.9', 0, 5);
INSERT INTO `ak_kategori` VALUES (214, '3.9.2', 'Tingkat Nasional', '', '3.9', 0, 5);
INSERT INTO `ak_kategori` VALUES (215, '3.9.3', 'Tingkat Daerah/Lokal', '', '3.9', 0, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_ngajar_detail`
-- 

CREATE TABLE `ak_ngajar_detail` (
  `idNgajarDetail` int(11) NOT NULL auto_increment,
  `idNgajar` int(11) NOT NULL,
  `namaMatkul` text NOT NULL,
  `sksMatkul` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `thnAkademikFrom` year(4) NOT NULL,
  `thnAkademikTo` year(4) NOT NULL,
  `tglNgajDet` date NOT NULL,
  `statusNgajDet` text NOT NULL,
  PRIMARY KEY  (`idNgajarDetail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ak_ngajar_detail`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ak_perolehan`
-- 

CREATE TABLE `ak_perolehan` (
  `idPerolehan` int(11) NOT NULL auto_increment,
  `nip` varchar(18) NOT NULL,
  `currentGol` int(11) NOT NULL,
  `toGol` int(11) NOT NULL,
  `idSkenario` int(11) NOT NULL,
  `statusPerolehan` int(11) NOT NULL,
  `tglPerolehan` date NOT NULL,
  PRIMARY KEY  (`idPerolehan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `ak_perolehan`
-- 

INSERT INTO `ak_perolehan` VALUES (1, '19', 7, 5, 2, 1, '2010-08-30');
INSERT INTO `ak_perolehan` VALUES (2, '15', 6, 5, 2, 1, '2010-08-31');
INSERT INTO `ak_perolehan` VALUES (3, '20', 8, 5, 3, 1, '2010-08-31');
INSERT INTO `ak_perolehan` VALUES (4, '12', 5, 4, 2, 1, '2010-08-31');

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_perolehan_detail`
-- 

CREATE TABLE `ak_perolehan_detail` (
  `idDetail` int(11) NOT NULL auto_increment,
  `idPerolehan` int(11) NOT NULL,
  `idRelasiKat` int(11) NOT NULL,
  `valueKd` varchar(20) NOT NULL,
  `valueKUM` float NOT NULL,
  `valueBukti` text NOT NULL,
  `tglDetail` date NOT NULL,
  `statusDetail` text NOT NULL,
  `infoLain` text NOT NULL,
  PRIMARY KEY  (`idDetail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

-- 
-- Dumping data for table `ak_perolehan_detail`
-- 

INSERT INTO `ak_perolehan_detail` VALUES (1, 1, 127, '2', 0, 'k', '2010-08-30', '1', 'k');
INSERT INTO `ak_perolehan_detail` VALUES (2, 1, 130, '5', 1, '', '2010-08-30', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (3, 1, 727, '2', 0, '', '2010-08-30', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (4, 1, 730, '5', 1, '', '2010-08-30', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (5, 2, 382, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (6, 2, 385, '5', 80, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (7, 2, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (8, 2, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (9, 2, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (10, 2, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (11, 2, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (12, 2, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (13, 2, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (14, 2, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (15, 2, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (16, 2, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (17, 2, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (18, 2, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (19, 2, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (20, 2, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (21, 2, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (22, 2, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (23, 2, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (24, 2, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (25, 2, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (26, 2, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (27, 2, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (28, 2, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (29, 2, 562, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (30, 2, 565, '5', 2, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (31, 4, 317, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (32, 4, 320, '5', 20, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (33, 4, 382, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (34, 4, 385, '5', 80, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (35, 4, 72, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (36, 4, 75, '5', 1, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (37, 4, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (38, 4, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (39, 4, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (40, 4, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (41, 4, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (42, 4, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (43, 4, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (44, 4, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (45, 4, 497, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (46, 4, 500, '5', 5.5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (47, 4, 562, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (48, 4, 565, '5', 2, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (49, 4, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (50, 4, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (51, 4, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (52, 4, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (53, 4, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (54, 4, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (55, 4, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (56, 4, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (57, 4, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (58, 4, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (59, 4, 687, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (60, 4, 690, '5', 5, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (61, 4, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (62, 4, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (63, 4, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (64, 4, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (65, 4, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (66, 4, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (67, 4, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (68, 4, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (69, 4, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (70, 4, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (71, 4, 87, '2', 0, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (72, 4, 90, '5', 8, '', '2010-08-31', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (73, 3, 87, '2', 0, '', '2010-09-01', '1', '');
INSERT INTO `ak_perolehan_detail` VALUES (74, 3, 90, '5', 8, '', '2010-09-01', '1', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_perolehan_generate`
-- 

CREATE TABLE `ak_perolehan_generate` (
  `idGenerate` int(11) NOT NULL auto_increment,
  `idPerolehan` int(11) NOT NULL,
  `idPresentasi` int(11) NOT NULL,
  `ketentuanAngka` float NOT NULL,
  `kelayakan` float NOT NULL,
  `kelebihan` float NOT NULL,
  `saving` float NOT NULL,
  PRIMARY KEY  (`idGenerate`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `ak_perolehan_generate`
-- 

INSERT INTO `ak_perolehan_generate` VALUES (1, 1, 2, 60, 1, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (2, 1, 3, 50, 0, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (3, 1, 4, 30, 0, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (4, 1, 5, 40, 1, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (5, 2, 2, 30, 30, 2, 0);
INSERT INTO `ak_perolehan_generate` VALUES (6, 2, 3, 25, 25, 55, 0);
INSERT INTO `ak_perolehan_generate` VALUES (7, 2, 4, 15, 15, 1.5, 0);
INSERT INTO `ak_perolehan_generate` VALUES (8, 2, 5, 20, 20, 2, 0);
INSERT INTO `ak_perolehan_generate` VALUES (9, 3, 6, 100, 8, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (10, 3, 7, 62.5, 0, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (11, 3, 8, 37.5, 0, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (12, 3, 9, 50, 0, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (13, 4, 2, 45, 45, 4, 4);
INSERT INTO `ak_perolehan_generate` VALUES (14, 4, 3, 37.5, 37.5, 62.5, 62.5);
INSERT INTO `ak_perolehan_generate` VALUES (15, 4, 4, 22.5, 22.5, 5, 0);
INSERT INTO `ak_perolehan_generate` VALUES (16, 4, 5, 30, 30, 2, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_perolehan_ngajar`
-- 

CREATE TABLE `ak_perolehan_ngajar` (
  `idNgajar` int(11) NOT NULL auto_increment,
  `idDetail` int(11) NOT NULL,
  `idRelasiNgajar` int(11) NOT NULL,
  `currentValueOfStringNgaj` text NOT NULL,
  `currentValueOfFloatNgaj` float NOT NULL,
  PRIMARY KEY  (`idNgajar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ak_perolehan_ngajar`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ak_presentasi_kategori`
-- 

CREATE TABLE `ak_presentasi_kategori` (
  `idPresentasi` int(11) NOT NULL auto_increment,
  `nilaiType` int(11) NOT NULL,
  `type` text NOT NULL,
  `idGroup` int(11) NOT NULL,
  `idSkenario` int(11) NOT NULL,
  PRIMARY KEY  (`idPresentasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `ak_presentasi_kategori`
-- 

INSERT INTO `ak_presentasi_kategori` VALUES (2, 30, 'min', 2, 2);
INSERT INTO `ak_presentasi_kategori` VALUES (3, 25, 'min', 3, 2);
INSERT INTO `ak_presentasi_kategori` VALUES (4, 15, 'max', 4, 2);
INSERT INTO `ak_presentasi_kategori` VALUES (5, 20, 'max', 5, 2);
INSERT INTO `ak_presentasi_kategori` VALUES (6, 40, 'min', 2, 3);
INSERT INTO `ak_presentasi_kategori` VALUES (7, 25, 'min', 3, 3);
INSERT INTO `ak_presentasi_kategori` VALUES (8, 15, 'max', 4, 3);
INSERT INTO `ak_presentasi_kategori` VALUES (9, 20, 'max', 5, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_relasi_kategori`
-- 

CREATE TABLE `ak_relasi_kategori` (
  `idRelasiKat` int(11) NOT NULL auto_increment,
  `kdKategori` varchar(20) NOT NULL,
  `kdRule` varchar(20) NOT NULL,
  `valueAK` float NOT NULL,
  `valueKd` varchar(20) NOT NULL,
  `valuePatut` int(11) NOT NULL,
  `tipeAK` int(11) NOT NULL,
  PRIMARY KEY  (`idRelasiKat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=731 ;

-- 
-- Dumping data for table `ak_relasi_kategori`
-- 

INSERT INTO `ak_relasi_kategori` VALUES (1, '1.1.1', '1', 0, '1.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (2, '1.1.1', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (3, '1.1.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (4, '1.1.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (5, '1.1.1', '5', 200, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (6, '1.1.2', '1', 0, '1.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (7, '1.1.2', '2', 0, '2.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (8, '1.1.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (9, '1.1.2', '4', 0, '4.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (10, '1.1.2', '5', 150, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (11, '1.1.3', '1', 0, '1.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (12, '1.1.3', '2', 0, '2.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (13, '1.1.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (14, '1.1.3', '4', 0, '4.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (15, '1.1.3', '5', 100, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (16, '1.2.1', '1', 0, '1.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (17, '1.2.1', '2', 0, '2.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (18, '1.2.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (19, '1.2.1', '4', 0, '4.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (20, '1.2.1', '5', 15, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (21, '1.2.2', '1', 0, '1.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (22, '1.2.2', '2', 0, '2.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (23, '1.2.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (24, '1.2.2', '4', 0, '4.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (25, '1.2.2', '5', 10, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (26, '1.2.3', '1', 0, '1.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (27, '1.2.3', '2', 0, '2.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (28, '1.2.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (29, '1.2.3', '4', 0, '4.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (30, '1.2.3', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (31, '2.1.12.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (32, '2.1.12.1', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (33, '2.1.12.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (34, '2.1.12.1', '4', 0, '4.11', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (35, '2.1.12.1', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (36, '1.3.1', '1', 0, '1.1', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (37, '1.3.1', '2', 0, '2.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (38, '1.3.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (39, '1.3.1', '4', 0, '4.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (40, '1.3.1', '5', 15, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (41, '1.3.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (42, '1.3.2', '2', 0, '2.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (43, '1.3.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (44, '1.3.2', '4', 0, '4.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (45, '1.3.2', '5', 9, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (46, '1.3.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (47, '1.3.3', '2', 0, '2.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (48, '1.3.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (49, '1.3.3', '4', 0, '4.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (50, '1.3.3', '5', 6, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (51, '1.3.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (52, '1.3.4', '2', 0, '2.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (53, '1.3.4', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (54, '1.3.4', '4', 0, '4.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (55, '1.3.4', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (56, '1.3.5', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (57, '1.3.5', '2', 0, '2.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (58, '1.3.5', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (59, '1.3.5', '4', 0, '4.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (60, '1.3.5', '5', 2, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (61, '1.3.6', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (62, '1.3.6', '2', 0, '2.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (63, '1.3.6', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (64, '1.3.6', '4', 0, '4.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (65, '1.3.6', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (66, '2.1.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (67, '2.1.2', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (68, '2.1.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (69, '2.1.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (70, '2.1.2', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (71, '2.1.3.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (72, '2.1.3.1', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (73, '2.1.3.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (74, '2.1.3.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (75, '2.1.3.1', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (76, '2.1.3.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (77, '2.1.3.2', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (78, '2.1.3.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (79, '2.1.3.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (80, '2.1.3.2', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (81, '2.1.3.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (82, '2.1.3.3', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (83, '2.1.3.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (84, '2.1.3.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (85, '2.1.3.3', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (86, '2.1.4.1.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (87, '2.1.4.1.1', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (88, '2.1.4.1.1', '3', 0, '', 4, 0);
INSERT INTO `ak_relasi_kategori` VALUES (89, '2.1.4.1.1', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (90, '2.1.4.1.1', '5', 8, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (91, '2.1.4.1.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (92, '2.1.4.1.2', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (93, '2.1.4.1.2', '3', 0, '', 6, 0);
INSERT INTO `ak_relasi_kategori` VALUES (94, '2.1.4.1.2', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (95, '2.1.4.1.2', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (96, '2.1.4.1.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (97, '2.1.4.1.3', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (98, '2.1.4.1.3', '3', 0, '', 8, 0);
INSERT INTO `ak_relasi_kategori` VALUES (99, '2.1.4.1.3', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (100, '2.1.4.1.3', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (101, '2.1.4.1.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (102, '2.1.4.1.4', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (103, '2.1.4.1.4', '3', 0, '', 10, 0);
INSERT INTO `ak_relasi_kategori` VALUES (104, '2.1.4.1.4', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (105, '2.1.4.1.4', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (106, '2.1.4.2.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (107, '2.1.4.2.1', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (108, '2.1.4.2.1', '3', 0, '', 4, 0);
INSERT INTO `ak_relasi_kategori` VALUES (109, '2.1.4.2.1', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (110, '2.1.4.2.1', '5', 6, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (111, '2.1.4.2.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (112, '2.1.4.2.2', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (113, '2.1.4.2.2', '3', 0, '', 6, 0);
INSERT INTO `ak_relasi_kategori` VALUES (114, '2.1.4.2.2', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (115, '2.1.4.2.2', '5', 2, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (116, '2.1.4.2.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (117, '2.1.4.2.3', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (118, '2.1.4.2.3', '3', 0, '', 8, 0);
INSERT INTO `ak_relasi_kategori` VALUES (119, '2.1.4.2.3', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (120, '2.1.4.2.3', '5', 0.5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (121, '2.1.4.2.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (122, '2.1.4.2.4', '2', 0, '2.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (123, '2.1.4.2.4', '3', 0, '', 10, 0);
INSERT INTO `ak_relasi_kategori` VALUES (124, '2.1.4.2.4', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (125, '2.1.4.2.4', '5', 0.5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (126, '2.1.5.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (127, '2.1.5.1', '2', 0, '2.5', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (128, '2.1.5.1', '3', 0, '', 4, 0);
INSERT INTO `ak_relasi_kategori` VALUES (129, '2.1.5.1', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (130, '2.1.5.1', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (131, '2.1.5.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (132, '2.1.5.2', '2', 0, '2.5', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (133, '2.1.5.2', '3', 0, '', 8, 0);
INSERT INTO `ak_relasi_kategori` VALUES (134, '2.1.5.2', '4', 0, '4.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (135, '2.1.5.2', '5', 0.5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (136, '2.1.6', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (137, '2.1.6', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (138, '2.1.6', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (139, '2.1.6', '4', 0, '0', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (140, '2.1.6', '5', 2, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (141, '2.1.7', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (142, '2.1.7', '2', 0, '2.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (143, '2.1.7', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (144, '2.1.7', '4', 0, '4.5', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (145, '2.1.7', '5', 2, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (146, '2.1.8.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (147, '2.1.8.1', '2', 0, '2.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (148, '2.1.8.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (149, '2.1.8.1', '4', 0, '4.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (150, '2.1.8.1', '5', 20, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (151, '2.1.8.2.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (152, '2.1.8.2.1', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (153, '2.1.8.2.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (154, '2.1.8.2.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (155, '2.1.8.2.1', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (156, '2.1.8.2.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (157, '2.1.8.2.2', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (158, '2.1.8.2.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (159, '2.1.8.2.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (160, '2.1.8.2.2', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (161, '2.1.8.2.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (162, '2.1.8.2.3', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (163, '2.1.8.2.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (164, '2.1.8.2.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (165, '2.1.8.2.3', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (166, '2.1.8.2.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (167, '2.1.8.2.4', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (168, '2.1.8.2.4', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (169, '2.1.8.2.4', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (170, '2.1.8.2.4', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (171, '2.1.8.2.5', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (172, '2.1.8.2.5', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (173, '2.1.8.2.5', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (174, '2.1.8.2.5', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (175, '2.1.8.2.5', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (176, '2.1.8.2.6', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (177, '2.1.8.2.6', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (178, '2.1.8.2.6', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (179, '2.1.8.2.6', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (180, '2.1.8.2.6', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (181, '2.1.8.2.7', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (182, '2.1.8.2.7', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (183, '2.1.8.2.7', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (184, '2.1.8.2.7', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (185, '2.1.8.2.7', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (186, '2.1.9', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (187, '2.1.9', '2', 0, '2.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (188, '2.1.9', '3', 0, '', 2, 0);
INSERT INTO `ak_relasi_kategori` VALUES (189, '2.1.9', '4', 0, '4.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (190, '2.1.9', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (191, '2.1.10.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (192, '2.1.10.1', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (193, '2.1.10.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (194, '2.1.10.1', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (195, '2.1.10.1', '5', 6, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (196, '2.1.10.2.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (197, '2.1.10.2.1', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (198, '2.1.10.2.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (199, '2.1.10.2.1', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (200, '2.1.10.2.1', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (201, '2.1.10.2.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (202, '2.1.10.2.2', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (203, '2.1.10.2.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (204, '2.1.10.2.2', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (205, '2.1.10.2.2', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (206, '2.1.10.2.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (207, '2.1.10.2.3', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (208, '2.1.10.2.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (209, '2.1.10.2.3', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (210, '2.1.10.2.3', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (211, '2.1.10.2.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (212, '2.1.10.2.4', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (213, '2.1.10.2.4', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (214, '2.1.10.2.4', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (215, '2.1.10.2.4', '5', 5, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (216, '2.1.10.3.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (217, '2.1.10.3.1', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (218, '2.1.10.3.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (219, '2.1.10.3.1', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (220, '2.1.10.3.1', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (221, '2.1.10.3.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (222, '2.1.10.3.2', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (223, '2.1.10.3.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (224, '2.1.10.3.2', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (225, '2.1.10.3.2', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (226, '2.1.10.3.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (227, '2.1.10.3.3', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (228, '2.1.10.3.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (229, '2.1.10.3.3', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (230, '2.1.10.3.3', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (231, '2.1.10.3.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (232, '2.1.10.3.4', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (233, '2.1.10.3.4', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (234, '2.1.10.3.4', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (235, '2.1.10.3.4', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (236, '2.1.10.3.5', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (237, '2.1.10.3.5', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (238, '2.1.10.3.5', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (239, '2.1.10.3.5', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (240, '2.1.10.3.5', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (241, '2.1.10.3.6', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (242, '2.1.10.3.6', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (243, '2.1.10.3.6', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (244, '2.1.10.3.6', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (245, '2.1.10.3.6', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (246, '2.1.10.3.7', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (247, '2.1.10.3.7', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (248, '2.1.10.3.7', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (249, '2.1.10.3.7', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (250, '2.1.10.3.7', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (251, '2.1.10.4.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (252, '2.1.10.4.1', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (253, '2.1.10.4.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (254, '2.1.10.4.1', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (255, '2.1.10.4.1', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (256, '2.1.10.4.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (257, '2.1.10.4.2', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (258, '2.1.10.4.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (259, '2.1.10.4.2', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (260, '2.1.10.4.2', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (261, '2.1.10.4.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (262, '2.1.10.4.3', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (263, '2.1.10.4.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (264, '2.1.10.4.3', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (265, '2.1.10.4.3', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (266, '2.1.10.4.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (267, '2.1.10.4.4', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (268, '2.1.10.4.4', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (269, '2.1.10.4.4', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (270, '2.1.10.4.4', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (271, '2.1.10.5.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (272, '2.1.10.5.1', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (273, '2.1.10.5.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (274, '2.1.10.5.1', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (275, '2.1.10.5.1', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (276, '2.1.10.5.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (277, '2.1.10.5.2', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (278, '2.1.10.5.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (279, '2.1.10.5.2', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (280, '2.1.10.5.2', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (281, '2.1.10.5.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (282, '2.1.10.5.3', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (283, '2.1.10.5.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (284, '2.1.10.5.3', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (285, '2.1.10.5.3', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (286, '2.1.10.5.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (287, '2.1.10.5.4', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (288, '2.1.10.5.4', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (289, '2.1.10.5.4', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (290, '2.1.10.5.4', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (291, '2.1.10.5.5', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (292, '2.1.10.5.5', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (293, '2.1.10.5.5', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (294, '2.1.10.5.5', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (295, '2.1.10.5.5', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (296, '2.1.10.5.6', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (297, '2.1.10.5.6', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (298, '2.1.10.5.6', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (299, '2.1.10.5.6', '4', 0, '4.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (300, '2.1.10.5.6', '5', 3, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (301, '2.1.11.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (302, '2.1.11.1', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (303, '2.1.11.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (304, '2.1.11.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (305, '2.1.11.1', '5', 2, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (306, '2.1.11.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (307, '2.1.11.2', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (308, '2.1.11.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (309, '2.1.11.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (310, '2.1.11.2', '5', 1, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (311, '2.1.12.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (312, '2.1.12.2', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (313, '2.1.12.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (314, '2.1.12.2', '4', 0, '4.11', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (315, '2.1.12.2', '5', 4, '', 0, 1);
INSERT INTO `ak_relasi_kategori` VALUES (316, '2.2.1.1.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (317, '2.2.1.1.1', '2', 0, '2.12', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (318, '2.2.1.1.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (319, '2.2.1.1.1', '4', 0, '4.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (320, '2.2.1.1.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (321, '2.2.1.1.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (322, '2.2.1.1.2', '2', 0, '2.13', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (323, '2.2.1.1.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (324, '2.2.1.1.2', '4', 0, '4.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (325, '2.2.1.1.2', '5', 40, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (326, '2.2.1.2.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (327, '2.2.1.2.1', '2', 0, '2.14', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (328, '2.2.1.2.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (329, '2.2.1.2.1', '4', 0, '4.12', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (330, '2.2.1.2.1', '5', 40, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (331, '2.2.1.2.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (332, '2.2.1.2.2', '2', 0, '2.14', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (333, '2.2.1.2.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (334, '2.2.1.2.2', '4', 0, '4.12', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (335, '2.2.1.2.2', '5', 25, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (336, '2.2.1.2.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (337, '2.2.1.2.3', '2', 0, '2.14', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (338, '2.2.1.2.3', '3', 0, '', 2, 0);
INSERT INTO `ak_relasi_kategori` VALUES (339, '2.2.1.2.3', '4', 0, '4.12', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (340, '2.2.1.2.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (341, '2.2.1.3.1.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (342, '2.2.1.3.1.1', '2', 0, '2.11', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (343, '2.2.1.3.1.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (344, '2.2.1.3.1.1', '4', 0, '4.13', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (345, '2.2.1.3.1.1', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (346, '2.2.1.3.1.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (347, '2.2.1.3.1.2', '2', 0, '2.11', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (348, '2.2.1.3.1.2', '3', 0, '', 2, 0);
INSERT INTO `ak_relasi_kategori` VALUES (349, '2.2.1.3.1.2', '4', 0, '4.13', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (350, '2.2.1.3.1.2', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (351, '2.2.1.3.2.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (352, '2.2.1.3.2.1', '2', 0, '2.21', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (353, '2.2.1.3.2.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (354, '2.2.1.3.2.1', '4', 0, '4.14', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (355, '2.2.1.3.2.1', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (356, '2.2.1.3.2.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (357, '2.2.1.3.2.2', '2', 0, '2.21', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (358, '2.2.1.3.2.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (359, '2.2.1.3.2.2', '4', 0, '4.14', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (360, '2.2.1.3.2.2', '5', 5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (361, '2.2.1.4', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (362, '2.2.1.4', '2', 0, '2.15', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (363, '2.2.1.4', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (364, '2.2.1.4', '4', 0, '4.12', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (365, '2.2.1.4', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (366, '2.2.1.5', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (367, '2.2.1.5', '2', 0, '2.16', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (368, '2.2.1.5', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (369, '2.2.1.5', '4', 0, '4.13', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (370, '2.2.1.5', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (371, '2.2.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (372, '2.2.2', '2', 0, '2.17', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (373, '2.2.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (374, '2.2.2', '4', 0, '4.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (375, '2.2.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (376, '2.2.3', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (377, '2.2.3', '2', 0, '2.18', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (378, '2.2.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (379, '2.2.3', '4', 0, '4.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (380, '2.2.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (381, '2.2.4.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (382, '2.2.4.1', '2', 0, '2.19', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (383, '2.2.4.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (384, '2.2.4.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (385, '2.2.4.1', '5', 80, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (386, '2.2.4.2', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (387, '2.2.4.2', '2', 0, '2.19', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (388, '2.2.4.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (389, '2.2.4.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (390, '2.2.4.2', '5', 40, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (391, '2.2.5.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (392, '2.2.5.1', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (393, '2.2.5.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (394, '2.2.5.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (395, '2.2.5.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (396, '2.2.5.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (397, '2.2.5.2', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (398, '2.2.5.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (399, '2.2.5.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (400, '2.2.5.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (401, '2.2.5.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (402, '2.2.5.3', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (403, '2.2.5.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (404, '2.2.5.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (405, '2.2.5.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (406, '2.2.6.1.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (407, '2.2.6.1.1', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (408, '2.2.6.1.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (409, '2.2.6.1.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (410, '2.2.6.1.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (411, '2.2.6.1.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (412, '2.2.6.1.2', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (413, '2.2.6.1.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (414, '2.2.6.1.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (415, '2.2.6.1.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (416, '2.2.6.1.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (417, '2.2.6.1.3', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (418, '2.2.6.1.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (419, '2.2.6.1.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (420, '2.2.6.1.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (421, '2.2.6.2.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (422, '2.2.6.2.1', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (423, '2.2.6.2.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (424, '2.2.6.2.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (425, '2.2.6.2.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (426, '2.2.6.2.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (427, '2.2.6.2.2', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (428, '2.2.6.2.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (429, '2.2.6.2.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (430, '2.2.6.2.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (431, '2.2.6.2.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (432, '2.2.6.2.3', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (433, '2.2.6.2.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (434, '2.2.6.2.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (435, '2.2.6.2.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (436, '2.2.6.3.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (437, '2.2.6.3.1', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (438, '2.2.6.3.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (439, '2.2.6.3.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (440, '2.2.6.3.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (441, '2.2.6.3.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (442, '2.2.6.3.2', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (443, '2.2.6.3.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (444, '2.2.6.3.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (445, '2.2.6.3.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (446, '2.2.6.3.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (447, '2.2.6.3.3', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (448, '2.2.6.3.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (449, '2.2.6.3.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (450, '2.2.6.3.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (451, '2.2.6.4.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (452, '2.2.6.4.1', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (453, '2.2.6.4.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (454, '2.2.6.4.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (455, '2.2.6.4.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (456, '2.2.6.4.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (457, '2.2.6.4.2', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (458, '2.2.6.4.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (459, '2.2.6.4.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (460, '2.2.6.4.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (461, '2.2.6.4.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (462, '2.2.6.4.3', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (463, '2.2.6.4.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (464, '2.2.6.4.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (465, '2.2.6.4.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (466, '2.2.6.5.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (467, '2.2.6.5.1', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (468, '2.2.6.5.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (469, '2.2.6.5.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (470, '2.2.6.5.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (471, '2.2.6.5.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (472, '2.2.6.5.2', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (473, '2.2.6.5.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (474, '2.2.6.5.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (475, '2.2.6.5.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (476, '2.2.6.5.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (477, '2.2.6.5.3', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (478, '2.2.6.5.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (479, '2.2.6.5.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (480, '2.2.6.5.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (481, '2.2.7.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (482, '2.2.7.1', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (483, '2.2.7.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (484, '2.2.7.1', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (485, '2.2.7.1', '5', 20, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (486, '2.2.7.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (487, '2.2.7.2', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (488, '2.2.7.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (489, '2.2.7.2', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (490, '2.2.7.2', '5', 15, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (491, '2.2.7.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (492, '2.2.7.3', '2', 0, '2.20', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (493, '2.2.7.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (494, '2.2.7.3', '4', 0, '4.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (495, '2.2.7.3', '5', 10, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (496, '2.3.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (497, '2.3.1', '2', 0, '2.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (498, '2.3.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (499, '2.3.1', '4', 0, '4.15', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (500, '2.3.1', '5', 5.5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (501, '2.3.2', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (502, '2.3.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (503, '2.3.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (504, '2.3.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (505, '2.3.2', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (506, '2.3.3.1.1.1', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (507, '2.3.3.1.1.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (508, '2.3.3.1.1.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (509, '2.3.3.1.1.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (510, '2.3.3.1.1.1', '5', 4, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (511, '2.3.3.1.1.2', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (512, '2.3.3.1.1.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (513, '2.3.3.1.1.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (514, '2.3.3.1.1.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (515, '2.3.3.1.1.2', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (516, '2.3.3.1.1.3', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (517, '2.3.3.1.1.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (518, '2.3.3.1.1.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (519, '2.3.3.1.1.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (520, '2.3.3.1.1.3', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (521, '2.3.3.1.2.1', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (522, '2.3.3.1.2.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (523, '2.3.3.1.2.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (524, '2.3.3.1.2.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (525, '2.3.3.1.2.1', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (526, '2.3.3.1.2.2', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (527, '2.3.3.1.2.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (528, '2.3.3.1.2.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (529, '2.3.3.1.2.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (530, '2.3.3.1.2.2', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (531, '2.3.3.1.2.3', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (532, '2.3.3.1.2.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (533, '2.3.3.1.2.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (534, '2.3.3.1.2.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (535, '2.3.3.1.2.3', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (536, '2.3.3.2', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (537, '2.3.3.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (538, '2.3.3.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (539, '2.3.3.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (540, '2.3.3.2', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (541, '2.3.4.1', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (542, '2.3.4.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (543, '2.3.4.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (544, '2.3.4.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (545, '2.3.4.1', '5', 1.5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (546, '2.3.4.2', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (547, '2.3.4.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (548, '2.3.4.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (549, '2.3.4.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (550, '2.3.4.2', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (551, '2.3.4.3', '1', 0, '1.4', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (552, '2.3.4.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (553, '2.3.4.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (554, '2.3.4.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (555, '2.3.4.3', '5', 0.5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (556, '2.3.5', '1', 0, '1.5', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (557, '2.3.5', '2', 0, '2.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (558, '2.3.5', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (559, '2.3.5', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (560, '2.3.5', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (561, '3.1.1', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (562, '3.1.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (563, '3.1.1', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (564, '3.1.1', '4', 0, '4.16', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (565, '3.1.1', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (566, '3.1.2', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (567, '3.1.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (568, '3.1.2', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (569, '3.1.2', '4', 0, '4.16', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (570, '3.1.2', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (571, '3.1.3', '1', 0, '1.2', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (572, '3.1.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (573, '3.1.3', '3', 0, '', 1, 0);
INSERT INTO `ak_relasi_kategori` VALUES (574, '3.1.3', '4', 0, '4.16', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (575, '3.1.3', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (576, '3.2.1.1', '1', 0, '1.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (577, '3.2.1.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (578, '3.2.1.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (579, '3.2.1.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (580, '3.2.1.1', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (581, '3.2.1.2', '1', 0, '1.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (582, '3.2.1.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (583, '3.2.1.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (584, '3.2.1.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (585, '3.2.1.2', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (586, '3.2.1.3', '1', 0, '1.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (587, '3.2.1.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (588, '3.2.1.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (589, '3.2.1.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (590, '3.2.1.3', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (591, '3.2.2.1', '1', 0, '1.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (592, '3.2.2.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (593, '3.2.2.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (594, '3.2.2.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (595, '3.2.2.1', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (596, '3.2.2.3', '1', 0, '1.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (597, '3.2.2.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (598, '3.2.2.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (599, '3.2.2.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (600, '3.2.2.3', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (601, '3.3.1.1', '1', 0, '1.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (602, '3.3.1.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (603, '3.3.1.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (604, '3.3.1.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (605, '3.3.1.1', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (606, '3.3.1.2', '1', 0, '1.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (607, '3.3.1.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (608, '3.3.1.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (609, '3.3.1.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (610, '3.3.1.2', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (611, '3.3.1.3', '1', 0, '1.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (612, '3.3.1.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (613, '3.3.1.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (614, '3.3.1.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (615, '3.3.1.3', '5', 0.5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (616, '3.3.2.1', '1', 0, '1.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (617, '3.3.2.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (618, '3.3.2.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (619, '3.3.2.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (620, '3.3.2.1', '5', 1.5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (621, '3.3.2.2', '1', 0, '1.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (622, '3.3.2.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (623, '3.3.2.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (624, '3.3.2.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (625, '3.3.2.2', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (626, '3.3.2.3', '1', 0, '1.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (627, '3.3.2.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (628, '3.3.2.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (629, '3.3.2.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (630, '3.3.2.3', '5', 0.5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (631, '3.4', '1', 0, '1.6', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (632, '3.4', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (633, '3.4', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (634, '3.4', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (635, '3.4', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (636, '3.5.1', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (637, '3.5.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (638, '3.5.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (639, '3.5.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (640, '3.5.1', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (641, '3.5.2', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (642, '3.5.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (643, '3.5.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (644, '3.5.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (645, '3.5.2', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (646, '3.6.1.1', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (647, '3.6.1.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (648, '3.6.1.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (649, '3.6.1.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (650, '3.6.1.1', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (651, '3.6.1.2', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (652, '3.6.1.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (653, '3.6.1.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (654, '3.6.1.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (655, '3.6.1.2', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (656, '3.6.2.1', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (657, '3.6.2.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (658, '3.6.2.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (659, '3.6.2.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (660, '3.6.2.1', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (661, '3.6.2.2', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (662, '3.6.2.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (663, '3.6.2.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (664, '3.6.2.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (665, '3.6.2.2', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (666, '3.6.3.1', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (667, '3.6.3.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (668, '3.6.3.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (669, '3.6.3.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (670, '3.6.3.1', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (671, '3.6.3.2', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (672, '3.6.3.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (673, '3.6.3.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (674, '3.6.3.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (675, '3.6.3.2', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (676, '3.6.4.1', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (677, '3.6.4.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (678, '3.6.4.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (679, '3.6.4.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (680, '3.6.4.1', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (681, '3.6.4.2', '1', 0, '1.8', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (682, '3.6.4.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (683, '3.6.4.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (684, '3.6.4.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (685, '3.6.4.2', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (686, '3.7.1', '1', 0, '1.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (687, '3.7.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (688, '3.7.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (689, '3.7.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (690, '3.7.1', '5', 5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (691, '3.7.2', '1', 0, '1.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (692, '3.7.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (693, '3.7.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (694, '3.7.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (695, '3.7.2', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (696, '3.7.3', '1', 0, '1.9', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (697, '3.7.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (698, '3.7.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (699, '3.7.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (700, '3.7.3', '5', 1, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (701, '3.8.1', '1', 0, '1.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (702, '3.8.1', '2', 0, '2.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (703, '3.8.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (704, '3.8.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (705, '3.8.1', '5', 5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (706, '3.8.2', '1', 0, '1.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (707, '3.8.2', '2', 0, '2.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (708, '3.8.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (709, '3.8.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (710, '3.8.2', '5', 5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (711, '3.8.3', '1', 0, '1.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (712, '3.8.3', '2', 0, '2.7', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (713, '3.8.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (714, '3.8.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (715, '3.8.3', '5', 5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (716, '3.9.1', '1', 0, '1.11', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (717, '3.9.1', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (718, '3.9.1', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (719, '3.9.1', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (720, '3.9.1', '5', 3, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (721, '3.9.2', '1', 0, '1.11', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (722, '3.9.2', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (723, '3.9.2', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (724, '3.9.2', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (725, '3.9.2', '5', 2, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (726, '3.9.3', '1', 0, '1.11', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (727, '3.9.3', '2', 0, '2.22', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (728, '3.9.3', '3', 0, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (729, '3.9.3', '4', 0, '4.10', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (730, '3.9.3', '5', 1, '', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_relasi_ngajar`
-- 

CREATE TABLE `ak_relasi_ngajar` (
  `idRelasiNgajar` int(11) NOT NULL,
  `idRelasiKat` int(11) NOT NULL,
  `valueOfString` text NOT NULL,
  `valueOfFloat` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `ak_relasi_ngajar`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ak_rule`
-- 

CREATE TABLE `ak_rule` (
  `idRule` int(11) NOT NULL auto_increment,
  `kdRule` varchar(20) NOT NULL,
  `namaRule` text NOT NULL,
  `parentId` varchar(20) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY  (`idRule`),
  UNIQUE KEY `kdRule` (`kdRule`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

-- 
-- Dumping data for table `ak_rule`
-- 

INSERT INTO `ak_rule` VALUES (1, '1', 'Periodik', '0', 11);
INSERT INTO `ak_rule` VALUES (2, '2', 'Bukti', '0', 22);
INSERT INTO `ak_rule` VALUES (3, '3', 'Jumlah Kepatutan', '0', 0);
INSERT INTO `ak_rule` VALUES (4, '4', 'Tipe Kepatutan', '0', 17);
INSERT INTO `ak_rule` VALUES (5, '5', 'Angka Kredit', '0', 0);
INSERT INTO `ak_rule` VALUES (6, '1.1', 'Per Periode Penilaian', '1', 0);
INSERT INTO `ak_rule` VALUES (7, '1.2', 'Per Tahun', '1', 0);
INSERT INTO `ak_rule` VALUES (8, '1.3', 'Per Semester', '1', 0);
INSERT INTO `ak_rule` VALUES (9, '2.1', 'Fotocopy Ijazah', '2', 0);
INSERT INTO `ak_rule` VALUES (10, '4.1', 'Ijazah', '4', 0);
INSERT INTO `ak_rule` VALUES (11, '4.2', 'Sertifikat', '4', 0);
INSERT INTO `ak_rule` VALUES (13, '2.2', 'Fotocopy STTPP/Sertifikat', '2', 0);
INSERT INTO `ak_rule` VALUES (14, '2.3', 'Fotocopy SK Penugasan', '2', 0);
INSERT INTO `ak_rule` VALUES (15, '2.4', 'Fotocopy Lembar Pengesahan', '2', 0);
INSERT INTO `ak_rule` VALUES (16, '2.5', 'Fotocopy Surat Penugasan atau Undangan Ujian', '2', 0);
INSERT INTO `ak_rule` VALUES (17, '2.6', 'Makalah/Tulisan [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (18, '2.7', 'Buku Ajar/Buku Teks [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (19, '2.8', 'Makalah atau Buku Bahan Orasi Ilmiah', '2', 0);
INSERT INTO `ak_rule` VALUES (20, '2.9', 'Fotocopy SK Jabatan Pimpinan', '2', 0);
INSERT INTO `ak_rule` VALUES (21, '4.3', 'SKS', '4', 0);
INSERT INTO `ak_rule` VALUES (22, '4.4', 'Lulusan', '4', 0);
INSERT INTO `ak_rule` VALUES (23, '4.5', 'Mata Kuliah', '4', 0);
INSERT INTO `ak_rule` VALUES (24, '4.6', 'Buku', '4', 0);
INSERT INTO `ak_rule` VALUES (25, '4.7', 'Karya', '4', 0);
INSERT INTO `ak_rule` VALUES (26, '4.8', 'Perguruan Tinggi', '4', 0);
INSERT INTO `ak_rule` VALUES (27, '4.9', 'Jabatan Tertinggi Nilai Angka Kreditnya', '4', 0);
INSERT INTO `ak_rule` VALUES (28, '2.10', 'Karya [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (29, '4.10', 'Tidak Dibatasi Jumlahnya', '4', 0);
INSERT INTO `ak_rule` VALUES (37, '4.11', 'Kegiatan', '4', 0);
INSERT INTO `ak_rule` VALUES (32, '2.12', 'Monograf [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (33, '2.13', 'Buku Referensi [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (34, '2.14', 'Majalah Ilmiah [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (35, '2.15', 'Koran/Majalah Umum/Populer yang Memuat Artikel', '2', 0);
INSERT INTO `ak_rule` VALUES (36, '2.11', 'Prosiding Lengkap [Asli]/Fotocopy Artikel [Makalah] dengan Cover dan Daftar Isi dan Sertifikat/Bukti Penyajian Makalah dari Panitia Seminar, Buku yang Memuat Artikel/Reprint Artikel yang Dicetak oleh Penerbit [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (38, '2.16', 'Buku/Makalah yang Telah Dibubuhi atau Dilampiri Bukti Pendokumentasian dari Perpustakaan Perguruan Tinggi atau Departemen', '2', 0);
INSERT INTO `ak_rule` VALUES (39, '2.17', 'Buku Terjemahan/Saduran [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (40, '2.18', 'Buku Hasil Editan/Suntingan [Asli]', '2', 0);
INSERT INTO `ak_rule` VALUES (41, '2.19', 'Fotocopy Sertifikat/Surat Keterangan Paten yang Dilegalisir oleh Pimpinan Perguruan Tinggi', '2', 0);
INSERT INTO `ak_rule` VALUES (42, '2.20', 'Surat Keterangan Keberadaan Rancangan dan Karya dari Pihak yang Berkompeten dan Disahkan oleh Pimpinan Perguruan Tinggi, Fotocopy Surat Hasil Penilian Sejawat yang Mempunyai Otoritas yang Dilegalisir oleh Pimpinan Perguruan Tinggi', '2', 0);
INSERT INTO `ak_rule` VALUES (43, '4.12', 'Artikel', '4', 0);
INSERT INTO `ak_rule` VALUES (44, '4.13', 'Makalah', '4', 0);
INSERT INTO `ak_rule` VALUES (45, '2.21', 'Prosiding Lengkap [Asli]/Fotocopy Poster yang Dimuat dalam Prosiding berikut Cover dan Daftar Isi, Poster dan Sertifikat Keikutsertaan dari Panitia Seminar', '2', 0);
INSERT INTO `ak_rule` VALUES (46, '4.14', 'Poster', '4', 0);
INSERT INTO `ak_rule` VALUES (47, '4.15', 'Jabatan', '4', 0);
INSERT INTO `ak_rule` VALUES (48, '1.4', 'Per Program', '1', 0);
INSERT INTO `ak_rule` VALUES (49, '2.22', 'Surat Keterangan Program/Kegiatan/Kepanitiaan/Kepengurusan/Tanda Jasa (Penghargaan)/Prestasi (Piagam, Medali)', '2', 0);
INSERT INTO `ak_rule` VALUES (50, '1.5', 'Per Karya', '1', 0);
INSERT INTO `ak_rule` VALUES (51, '1.6', 'Per Kepanitiaan', '1', 0);
INSERT INTO `ak_rule` VALUES (52, '1.7', 'Per Periode Jabatan', '1', 0);
INSERT INTO `ak_rule` VALUES (53, '1.8', 'Per Kegiatan', '1', 0);
INSERT INTO `ak_rule` VALUES (54, '1.9', 'Per Tanda Jasa', '1', 0);
INSERT INTO `ak_rule` VALUES (55, '1.10', 'Per Buku', '1', 0);
INSERT INTO `ak_rule` VALUES (56, '1.11', 'Per Piagam/Medali', '1', 0);
INSERT INTO `ak_rule` VALUES (57, '4.16', 'Kepanitiaan', '4', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_skenario`
-- 

CREATE TABLE `ak_skenario` (
  `idSkenario` int(11) NOT NULL auto_increment,
  `namaSkenario` text NOT NULL,
  `idKenaikan` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idSkenario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `ak_skenario`
-- 

INSERT INTO `ak_skenario` VALUES (1, 'Pertama1', 1, 1);
INSERT INTO `ak_skenario` VALUES (2, 'Reguler1', 2, 1);
INSERT INTO `ak_skenario` VALUES (3, 'Lompat1', 3, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_status_pengajuan`
-- 

CREATE TABLE `ak_status_pengajuan` (
  `idStatusPengajuan` int(11) NOT NULL,
  `namaStatusPengajuan` text NOT NULL,
  `tabs` varchar(100) NOT NULL,
  PRIMARY KEY  (`idStatusPengajuan`),
  UNIQUE KEY `tabs` (`tabs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `ak_status_pengajuan`
-- 

INSERT INTO `ak_status_pengajuan` VALUES (1, 'Terbaru', 'terbaru');
INSERT INTO `ak_status_pengajuan` VALUES (2, 'Diajukan', 'diajukan');
INSERT INTO `ak_status_pengajuan` VALUES (3, 'Disetujui', 'disetujui');

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_tipe_kenaikan`
-- 

CREATE TABLE `ak_tipe_kenaikan` (
  `idKenaikan` int(11) NOT NULL,
  `namaKenaikan` text NOT NULL,
  PRIMARY KEY  (`idKenaikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `ak_tipe_kenaikan`
-- 

INSERT INTO `ak_tipe_kenaikan` VALUES (1, 'Pertama Kali');
INSERT INTO `ak_tipe_kenaikan` VALUES (2, 'Reguler');
INSERT INTO `ak_tipe_kenaikan` VALUES (3, 'Lompat Jabatan');

-- --------------------------------------------------------

-- 
-- Table structure for table `pang_golangka`
-- 

CREATE TABLE `pang_golangka` (
  `idGolAngka` int(11) NOT NULL,
  `namaGolAngka` text NOT NULL,
  PRIMARY KEY  (`idGolAngka`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pang_golangka`
-- 

INSERT INTO `pang_golangka` VALUES (1, 'III');
INSERT INTO `pang_golangka` VALUES (2, 'IV');

-- --------------------------------------------------------

-- 
-- Table structure for table `pang_golhuruf`
-- 

CREATE TABLE `pang_golhuruf` (
  `idGolHuruf` int(11) NOT NULL,
  `namaGolHuruf` text NOT NULL,
  PRIMARY KEY  (`idGolHuruf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pang_golhuruf`
-- 

INSERT INTO `pang_golhuruf` VALUES (1, 'A');
INSERT INTO `pang_golhuruf` VALUES (2, 'B');
INSERT INTO `pang_golhuruf` VALUES (3, 'C');
INSERT INTO `pang_golhuruf` VALUES (4, 'D');
INSERT INTO `pang_golhuruf` VALUES (5, 'E');

-- --------------------------------------------------------

-- 
-- Table structure for table `pang_golongan`
-- 

CREATE TABLE `pang_golongan` (
  `idGolongan` int(11) NOT NULL,
  `syaratKUM` float NOT NULL,
  `rankingGolongan` int(11) NOT NULL,
  `idGolAngka` int(11) NOT NULL,
  `idGolHuruf` int(11) NOT NULL,
  `idPangkat` int(11) NOT NULL,
  PRIMARY KEY  (`idGolongan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pang_golongan`
-- 

INSERT INTO `pang_golongan` VALUES (1, 1050, 1, 2, 5, 1);
INSERT INTO `pang_golongan` VALUES (2, 850, 2, 2, 4, 1);
INSERT INTO `pang_golongan` VALUES (3, 700, 3, 2, 3, 2);
INSERT INTO `pang_golongan` VALUES (4, 550, 4, 2, 2, 2);
INSERT INTO `pang_golongan` VALUES (5, 400, 5, 2, 1, 2);
INSERT INTO `pang_golongan` VALUES (6, 300, 6, 1, 4, 3);
INSERT INTO `pang_golongan` VALUES (7, 200, 7, 1, 3, 3);
INSERT INTO `pang_golongan` VALUES (8, 150, 8, 1, 2, 4);
INSERT INTO `pang_golongan` VALUES (9, 0, 9, 0, 0, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `pang_pangkat`
-- 

CREATE TABLE `pang_pangkat` (
  `idPangkat` int(11) NOT NULL auto_increment,
  `namaPangkat` text NOT NULL,
  `rankingPangkat` int(11) NOT NULL,
  `saving` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idPangkat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `pang_pangkat`
-- 

INSERT INTO `pang_pangkat` VALUES (1, 'guru besar', 1, 1);
INSERT INTO `pang_pangkat` VALUES (2, 'lektor kepala', 2, 1);
INSERT INTO `pang_pangkat` VALUES (3, 'lektor', 3, 0);
INSERT INTO `pang_pangkat` VALUES (4, 'asisten ahli', 4, 0);
INSERT INTO `pang_pangkat` VALUES (5, 'tenaga pengajar', 5, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `peg_belajar`
-- 

CREATE TABLE `peg_belajar` (
  `idBelajar` int(11) NOT NULL auto_increment,
  `nip` varchar(18) NOT NULL,
  `idPendidikan` int(11) NOT NULL,
  PRIMARY KEY  (`idBelajar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `peg_belajar`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `peg_jabatan`
-- 

CREATE TABLE `peg_jabatan` (
  `idJabatan` int(11) NOT NULL auto_increment,
  `kdJabatan` varchar(10) NOT NULL,
  `namaJabatan` text NOT NULL,
  PRIMARY KEY  (`idJabatan`),
  UNIQUE KEY `kdJabatan` (`kdJabatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `peg_jabatan`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `peg_kepangkatan`
-- 

CREATE TABLE `peg_kepangkatan` (
  `idKepangkatan` int(11) NOT NULL auto_increment,
  `idGolongan` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `kdUnitKerja` varchar(10) NOT NULL,
  `TMTKepangkatan` date NOT NULL,
  `perolehanKUM` float NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY  (`idKepangkatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `peg_kepangkatan`
-- 

INSERT INTO `peg_kepangkatan` VALUES (1, 8, '20', '1.1', '0000-00-00', 150, 1);
INSERT INTO `peg_kepangkatan` VALUES (2, 9, '21', '1.1', '0000-00-00', 0, 1);
INSERT INTO `peg_kepangkatan` VALUES (3, 7, '19', '1.1', '0000-00-00', 200, 1);
INSERT INTO `peg_kepangkatan` VALUES (4, 6, '15', '1.1', '2009-04-01', 300, 1);
INSERT INTO `peg_kepangkatan` VALUES (5, 5, '12', '1.1', '2009-01-01', 400, 1);
INSERT INTO `peg_kepangkatan` VALUES (6, 4, '14', '1.1', '2009-10-01', 550, 1);
INSERT INTO `peg_kepangkatan` VALUES (7, 3, '44', '1.5', '2007-10-01', 700, 1);
INSERT INTO `peg_kepangkatan` VALUES (8, 2, '2', '1.1', '2003-04-01', 850, 1);
INSERT INTO `peg_kepangkatan` VALUES (9, 1, '1.3.2', '1.3', '2002-05-01', 1050, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `peg_level`
-- 

CREATE TABLE `peg_level` (
  `idLevel` int(11) NOT NULL,
  `namaLevel` text NOT NULL,
  PRIMARY KEY  (`idLevel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `peg_level`
-- 

INSERT INTO `peg_level` VALUES (1, 'Super Admin');
INSERT INTO `peg_level` VALUES (2, 'Admin Fakultas');
INSERT INTO `peg_level` VALUES (3, 'Admin Kepegawaian Fakultas');
INSERT INTO `peg_level` VALUES (4, 'Dosen');

-- --------------------------------------------------------

-- 
-- Table structure for table `peg_menjabat`
-- 

CREATE TABLE `peg_menjabat` (
  `idMenjabat` int(11) NOT NULL auto_increment,
  `kdJabatan` varchar(10) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `TMTJabatan` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idMenjabat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `peg_menjabat`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `peg_pegawai`
-- 

CREATE TABLE `peg_pegawai` (
  `idPegawai` bigint(20) NOT NULL auto_increment,
  `noSeriKarpeg` varchar(8) default NULL,
  `nip` varchar(18) NOT NULL,
  `namaPeg` text NOT NULL,
  `alamatPeg` text NOT NULL,
  `jkPeg` tinyint(1) NOT NULL,
  `tmptLahir` text NOT NULL,
  `tglLahir` date NOT NULL,
  `keahlian` text NOT NULL,
  `TMTMasuk` date NOT NULL,
  `totalKUM` float NOT NULL,
  `kdUnitKerja` varchar(10) NOT NULL,
  PRIMARY KEY  (`idPegawai`),
  UNIQUE KEY `nip` (`nip`),
  UNIQUE KEY `noSeriKarpeg` (`noSeriKarpeg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `peg_pegawai`
-- 

INSERT INTO `peg_pegawai` VALUES (1, '20', '20', 'Arip Purkon, MA', '', 0, '', '0000-00-00', '', '0000-00-00', 150, '1.1');
INSERT INTO `peg_pegawai` VALUES (2, '21', '21', 'Atiyah Tahta Nisyatina', '', 1, '', '0000-00-00', '', '0000-00-00', 0, '1.1');
INSERT INTO `peg_pegawai` VALUES (3, '19', '19', 'Afwan Faizin, MA', '', 0, '', '0000-00-00', '', '0000-00-00', 200, '1.1');
INSERT INTO `peg_pegawai` VALUES (4, '15', '15', 'Dr. Hj. Mesraini, M.Ag.', '', 1, '', '0000-00-00', '', '0000-00-00', 300, '1.1');
INSERT INTO `peg_pegawai` VALUES (5, '12', '12', 'Dr. H. Yayan Sofyan, M.Ag.', '', 0, '', '0000-00-00', '', '0000-00-00', 400, '1.1');
INSERT INTO `peg_pegawai` VALUES (6, '14', '14', 'Dr. Ahmad Tholabi', '', 0, '', '0000-00-00', '', '0000-00-00', 550, '1.1');
INSERT INTO `peg_pegawai` VALUES (7, '44', '44', 'Drs. H. A. Basiq Djalil, SH, MA.', '', 0, '', '0000-00-00', '', '0000-00-00', 700, '1.5');
INSERT INTO `peg_pegawai` VALUES (8, '2', '2', 'Prof. Dr. H. Ahmad Sutarmadi', '', 0, '', '0000-00-00', '', '0000-00-00', 850, '1.1');
INSERT INTO `peg_pegawai` VALUES (9, '1.3.2', '1.3.2', 'Prof. Dr. Hj. Huzaemah Tahido, MA', '', 1, '', '0000-00-00', '', '0000-00-00', 1050, '1.3');

-- --------------------------------------------------------

-- 
-- Table structure for table `peg_pendidikan`
-- 

CREATE TABLE `peg_pendidikan` (
  `idPendidikan` int(11) NOT NULL auto_increment,
  `namaPendidikan` text NOT NULL,
  PRIMARY KEY  (`idPendidikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `peg_pendidikan`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `peg_unitkerja`
-- 

CREATE TABLE `peg_unitkerja` (
  `idUnitKerja` int(11) NOT NULL auto_increment,
  `kdUnitKerja` varchar(10) NOT NULL,
  `namaUnitKerja` text NOT NULL,
  `parentId` varchar(10) NOT NULL,
  `count` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idUnitKerja`),
  UNIQUE KEY `kdUnitKerja` (`kdUnitKerja`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `peg_unitkerja`
-- 

INSERT INTO `peg_unitkerja` VALUES (1, '1', 'Fakultas Syariah dan Hukum', '0', 5, 1);
INSERT INTO `peg_unitkerja` VALUES (2, '1.1', 'Ahwal Syakhshiyyah', '1', 0, 1);
INSERT INTO `peg_unitkerja` VALUES (3, '1.2', 'Jinayah dan Siyasah', '1', 0, 1);
INSERT INTO `peg_unitkerja` VALUES (4, '1.3', 'Perbandingan Madzhab dan Hukum', '1', 0, 1);
INSERT INTO `peg_unitkerja` VALUES (5, '1.4', 'Muamalat (Ekonomi Islam)', '1', 0, 1);
INSERT INTO `peg_unitkerja` VALUES (6, '1.5', 'Ilmu Hukum', '1', 0, 1);
INSERT INTO `peg_unitkerja` VALUES (7, '2', 'Fakultas Sains dan Teknologi', '0', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `peg_user`
-- 

CREATE TABLE `peg_user` (
  `idUser` int(11) NOT NULL auto_increment,
  `userName` varchar(18) NOT NULL,
  `namaAdmin` text NOT NULL,
  `pwdHash` varchar(13) NOT NULL,
  `token` varchar(6) NOT NULL,
  `idLevel` int(11) NOT NULL,
  PRIMARY KEY  (`idUser`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `peg_user`
-- 

INSERT INTO `peg_user` VALUES (1, 'superadmin', '', '822sYeYeLXqnQ', 'utaDmv', 1);
INSERT INTO `peg_user` VALUES (2, 'adminfak', '', '822sYeYeLXqnQ', 'EqiCru', 2);
INSERT INTO `peg_user` VALUES (3, 'adminkepeg', '', '822sYeYeLXqnQ', 'dzbmfg', 3);
INSERT INTO `peg_user` VALUES (8, '20', '', '981vcKYH/tECU', 'Duvmtj', 4);
INSERT INTO `peg_user` VALUES (9, '21', '', '3cIk/WdULGZ7s', 'pGdCxa', 4);
INSERT INTO `peg_user` VALUES (10, '19', '', '1f7I/dmsB3Nos', 'vAuEfd', 4);
INSERT INTO `peg_user` VALUES (11, '15', '', '9bcWjs.AB2hqI', 'aejHvf', 4);
INSERT INTO `peg_user` VALUES (12, '12', '', 'c2hOs4uTKr5hk', 'uhsGCo', 4);
INSERT INTO `peg_user` VALUES (13, '14', '', 'aaORN6ZJO.GBY', 'EHrdzh', 4);
INSERT INTO `peg_user` VALUES (14, '44', '', 'f73Fvd.iVtV0I', 'qxtFki', 4);
INSERT INTO `peg_user` VALUES (15, '2', '', 'c83MDZfPUmEUA', 'HvzEto', 4);
INSERT INTO `peg_user` VALUES (16, '1.3.2', '', '38Zb3phGHkrxY', 'rhBuiw', 4);
