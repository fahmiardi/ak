-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 27, 2011 at 03:21 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

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
INSERT INTO `ak_kategori` VALUES (20, '2.1.1.1', 'Asisten Ahli', '', '2.1.1', 2, 2);
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
  `idDetail` int(11) NOT NULL,
  `namaMatkul` text NOT NULL,
  `sksMatkul` int(11) NOT NULL,
  `jmlhKelas` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `thnAkademikFrom` year(4) NOT NULL,
  `thnAkademikTo` year(4) NOT NULL,
  `tglNgajDet` date NOT NULL,
  `statusNgajDet` text NOT NULL,
  PRIMARY KEY  (`idNgajarDetail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `ak_ngajar_detail`
-- 

INSERT INTO `ak_ngajar_detail` VALUES (5, 64, 'B. arab', 2, 4, 0, 2009, 2010, '2011-01-23', '1');
INSERT INTO `ak_ngajar_detail` VALUES (6, 94, 'B. Inggris', 2, 4, 0, 2009, 2010, '2011-01-24', '1');

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
  `approve` int(1) NOT NULL,
  `tglPerolehan` date NOT NULL,
  `totalDisetujui` float NOT NULL,
  `totalKekurangan` float NOT NULL,
  PRIMARY KEY  (`idPerolehan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `ak_perolehan`
-- 

INSERT INTO `ak_perolehan` VALUES (3, '8828', 8, 7, 2, 4, 1, '2011-01-23', 50, 0);
INSERT INTO `ak_perolehan` VALUES (5, '828', 8, 7, 2, 2, 1, '2011-01-24', 50, 0);
INSERT INTO `ak_perolehan` VALUES (6, '121363', 8, 7, 2, 1, 0, '2011-01-24', 50, 0);

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
  `approval` int(1) NOT NULL,
  `infoLain` text NOT NULL,
  PRIMARY KEY  (`idDetail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

-- 
-- Dumping data for table `ak_perolehan_detail`
-- 

INSERT INTO `ak_perolehan_detail` VALUES (64, 3, 735, '5', 4, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (63, 3, 732, '2', 0, 'sk', '2011-01-23', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (65, 3, 562, '2', 0, 're', '2011-01-23', '1', 0, 're');
INSERT INTO `ak_perolehan_detail` VALUES (66, 3, 565, '5', 2, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (67, 3, 82, '2', 0, 'rt', '2011-01-23', '1', 0, 'rt');
INSERT INTO `ak_perolehan_detail` VALUES (68, 3, 85, '5', 1, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (69, 3, 82, '2', 0, 'we', '2011-01-23', '1', 0, 'we');
INSERT INTO `ak_perolehan_detail` VALUES (70, 3, 85, '5', 1, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (71, 3, 217, '2', 0, 'er', '2011-01-23', '1', 0, 'er');
INSERT INTO `ak_perolehan_detail` VALUES (72, 3, 220, '5', 4, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (73, 3, 497, '2', 0, 'w', '2011-01-23', '1', 0, 'w');
INSERT INTO `ak_perolehan_detail` VALUES (74, 3, 500, '5', 5.5, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (87, 5, 152, '2', 0, '', '2011-01-24', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (85, 3, 87, '2', 0, 'e', '2011-01-23', '1', 0, 'e');
INSERT INTO `ak_perolehan_detail` VALUES (77, 3, 317, '2', 0, 'w', '2011-01-23', '1', 0, 'w');
INSERT INTO `ak_perolehan_detail` VALUES (78, 3, 320, '5', 20, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (79, 3, 497, '2', 0, 'a', '2011-01-23', '1', 0, 'a');
INSERT INTO `ak_perolehan_detail` VALUES (80, 3, 500, '5', 5.5, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (81, 3, 577, '2', 0, 'r', '2011-01-23', '1', 0, 'r');
INSERT INTO `ak_perolehan_detail` VALUES (82, 3, 580, '5', 3, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (86, 3, 90, '5', 8, '', '2011-01-23', '2', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (88, 5, 155, '5', 5, '', '2011-01-24', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (89, 5, 577, '2', 0, 'y', '2011-01-24', '1', 0, 't');
INSERT INTO `ak_perolehan_detail` VALUES (90, 5, 580, '5', 3, '', '2011-01-24', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (91, 5, 497, '2', 0, 'r', '2011-01-24', '1', 0, 'r');
INSERT INTO `ak_perolehan_detail` VALUES (92, 5, 500, '5', 5.5, '', '2011-01-24', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (93, 6, 732, '2', 0, 'er', '2011-01-24', '1', 0, 'er');
INSERT INTO `ak_perolehan_detail` VALUES (94, 6, 735, '5', 4, '', '2011-01-24', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (95, 6, 317, '2', 0, 'rt', '2011-01-24', '1', 0, 'rt');
INSERT INTO `ak_perolehan_detail` VALUES (96, 6, 320, '5', 20, '', '2011-01-24', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (97, 6, 707, '2', 0, 'wr', '2011-01-24', '1', 0, 'wr');
INSERT INTO `ak_perolehan_detail` VALUES (98, 6, 710, '5', 5, '', '2011-01-24', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (99, 6, 507, '2', 0, 'r', '2011-01-24', '1', 0, 't');
INSERT INTO `ak_perolehan_detail` VALUES (100, 6, 510, '5', 4, '', '2011-01-24', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (101, 6, 87, '2', 0, 'ew', '2011-01-24', '1', 0, 'ew');
INSERT INTO `ak_perolehan_detail` VALUES (102, 6, 90, '5', 8, '', '2011-01-24', '1', 1, '');
INSERT INTO `ak_perolehan_detail` VALUES (103, 6, 92, '2', 0, 'qw', '2011-01-24', '1', 0, 'qw');
INSERT INTO `ak_perolehan_detail` VALUES (104, 6, 95, '5', 3, '', '2011-01-24', '1', 1, '');
INSERT INTO `ak_perolehan_detail` VALUES (105, 6, 502, '2', 0, 'a', '2011-01-24', '1', 0, 's');
INSERT INTO `ak_perolehan_detail` VALUES (106, 6, 505, '5', 3, '', '2011-01-24', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (107, 6, 637, '2', 0, 'xs', '2011-01-24', '1', 0, 'xs');
INSERT INTO `ak_perolehan_detail` VALUES (108, 6, 640, '5', 3, '', '2011-01-24', '1', 0, '');
INSERT INTO `ak_perolehan_detail` VALUES (109, 5, 87, '2', 0, 'tr', '2011-01-26', '1', 0, 'tr');
INSERT INTO `ak_perolehan_detail` VALUES (110, 5, 90, '5', 8, '', '2011-01-26', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (111, 5, 152, '2', 0, 'w', '2011-01-26', '1', 0, 'q');
INSERT INTO `ak_perolehan_detail` VALUES (112, 5, 155, '5', 5, '', '2011-01-26', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (113, 5, 397, '2', 0, 'v', '2011-01-26', '1', 0, 'q');
INSERT INTO `ak_perolehan_detail` VALUES (114, 5, 400, '5', 15, '', '2011-01-26', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (115, 5, 507, '2', 0, 'rt', '2011-01-27', '1', 0, 'rt');
INSERT INTO `ak_perolehan_detail` VALUES (116, 5, 510, '5', 4, '', '2011-01-27', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (117, 5, 687, '2', 0, 'tr', '2011-01-27', '1', 0, 'tr');
INSERT INTO `ak_perolehan_detail` VALUES (118, 5, 690, '5', 5, '', '2011-01-27', '1', 2, '');
INSERT INTO `ak_perolehan_detail` VALUES (119, 5, 562, '2', 0, 'aq', '2011-01-27', '1', 0, 'aq');
INSERT INTO `ak_perolehan_detail` VALUES (120, 5, 565, '5', 2, '', '2011-01-27', '1', 2, '');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `ak_perolehan_generate`
-- 

INSERT INTO `ak_perolehan_generate` VALUES (12, 3, 5, 10, 5, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (11, 3, 4, 7.5, 7.5, 3.5, 0);
INSERT INTO `ak_perolehan_generate` VALUES (10, 3, 3, 12.5, 12.5, 7.5, 0);
INSERT INTO `ak_perolehan_generate` VALUES (9, 3, 2, 15, 15, 3, 0);
INSERT INTO `ak_perolehan_generate` VALUES (20, 5, 5, 10, 10, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (19, 5, 4, 7.5, 7.5, 2, 0);
INSERT INTO `ak_perolehan_generate` VALUES (18, 5, 3, 12.5, 12.5, 2.5, 0);
INSERT INTO `ak_perolehan_generate` VALUES (17, 5, 2, 15, 15, 3, 0);
INSERT INTO `ak_perolehan_generate` VALUES (21, 6, 2, 15, 15, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (22, 6, 3, 12.5, 12.5, 7.5, 0);
INSERT INTO `ak_perolehan_generate` VALUES (23, 6, 4, 7.5, 7, 0, 0);
INSERT INTO `ak_perolehan_generate` VALUES (24, 6, 5, 10, 8, 0, 0);

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
INSERT INTO `ak_presentasi_kategori` VALUES (6, 30, 'min', 2, 3);
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=751 ;

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
INSERT INTO `ak_relasi_kategori` VALUES (731, '2.1.1.1.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (732, '2.1.1.1.1', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (733, '2.1.1.1.1', '3', 0, '', 12, 0);
INSERT INTO `ak_relasi_kategori` VALUES (734, '2.1.1.1.1', '4', 0, '4.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (735, '2.1.1.1.1', '5', 5.5, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (736, '2.1.1.2.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (737, '2.1.1.2.1', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (738, '2.1.1.2.1', '3', 0, '', 12, 0);
INSERT INTO `ak_relasi_kategori` VALUES (739, '2.1.1.2.1', '4', 0, '4.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (740, '2.1.1.2.1', '5', 11, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (741, '2.1.1.3.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (742, '2.1.1.3.1', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (743, '2.1.1.3.1', '3', 0, '', 12, 0);
INSERT INTO `ak_relasi_kategori` VALUES (744, '2.1.1.3.1', '4', 0, '4.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (745, '2.1.1.3.1', '5', 11, '', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (746, '2.1.1.4.1', '1', 0, '1.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (747, '2.1.1.4.1', '2', 0, '2.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (748, '2.1.1.4.1', '3', 0, '', 12, 0);
INSERT INTO `ak_relasi_kategori` VALUES (749, '2.1.1.4.1', '4', 0, '4.3', 0, 0);
INSERT INTO `ak_relasi_kategori` VALUES (750, '2.1.1.4.1', '5', 11, '', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_relasi_ngajar`
-- 

CREATE TABLE `ak_relasi_ngajar` (
  `idRelasiNgajar` int(11) NOT NULL auto_increment,
  `kdKategori` varchar(20) NOT NULL,
  `valueSKS` int(11) NOT NULL,
  `valueKUM` float NOT NULL,
  `idPangkat` int(11) NOT NULL,
  PRIMARY KEY  (`idRelasiNgajar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `ak_relasi_ngajar`
-- 

INSERT INTO `ak_relasi_ngajar` VALUES (1, '2.1.1.1.1', 10, 0.5, 4);
INSERT INTO `ak_relasi_ngajar` VALUES (2, '2.1.1.1.1', 2, 0.25, 4);
INSERT INTO `ak_relasi_ngajar` VALUES (3, '2.1.1.2.1', 10, 1, 3);
INSERT INTO `ak_relasi_ngajar` VALUES (4, '2.1.1.2.1', 2, 0.5, 3);
INSERT INTO `ak_relasi_ngajar` VALUES (5, '2.1.1.3.1', 10, 1, 2);
INSERT INTO `ak_relasi_ngajar` VALUES (6, '2.1.1.3.1', 2, 0.5, 2);
INSERT INTO `ak_relasi_ngajar` VALUES (7, '2.1.1.4.1', 10, 1, 1);
INSERT INTO `ak_relasi_ngajar` VALUES (8, '2.1.1.4.1', 2, 0.5, 1);

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
INSERT INTO `ak_status_pengajuan` VALUES (3, 'Tervalidasi', 'tervalidasi');
INSERT INTO `ak_status_pengajuan` VALUES (4, 'Disetujui', 'disetujui');

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
  `thnIjazah` year(4) NOT NULL,
  `tempatStudi` text NOT NULL,
  PRIMARY KEY  (`idBelajar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

-- 
-- Dumping data for table `peg_belajar`
-- 

INSERT INTO `peg_belajar` VALUES (1, '8828', 2, 2009, '');
INSERT INTO `peg_belajar` VALUES (2, '828', 2, 2010, '');
INSERT INTO `peg_belajar` VALUES (3, '195505051982031012', 1, 1989, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (4, '194512301967122001', 1, 1984, 'Univ. Al-Azhar Kairo Mesir');
INSERT INTO `peg_belajar` VALUES (5, '150077526', 1, 1990, 'University of California Los Angeles USA');
INSERT INTO `peg_belajar` VALUES (6, '194008051962021001', 1, 1992, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (7, '194507181964011001', 1, 1994, 'IAIN');
INSERT INTO `peg_belajar` VALUES (8, '195812221989031001', 1, 1995, 'Univ. Hamburg');
INSERT INTO `peg_belajar` VALUES (9, '196312221994032002', 1, 2000, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (10, '150185438', 1, 1998, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (11, '196011071985051001', 1, 1994, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (12, '194209161962101001', 1, 1991, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (13, '150077575', 1, 2003, 'IAIN Bandung');
INSERT INTO `peg_belajar` VALUES (14, '197605312000031001', 2, 2002, 'IAIN Syahid Jakarta');
INSERT INTO `peg_belajar` VALUES (15, '150223823', 1, 1996, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (16, '195003061976031001', 2, 2003, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (17, '195609061982031004', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (18, '194510101964101001', 2, 1999, 'UMJ Jakarta');
INSERT INTO `peg_belajar` VALUES (19, '194609041965101002', 2, 2001, 'Univ. Muhammadiyah Jakarta');
INSERT INTO `peg_belajar` VALUES (20, '197006051998031005', 1, 2003, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (21, '197608072003121001', 1, 2009, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (22, '195008171989031001', 2, 2002, 'IIQ Jakarta');
INSERT INTO `peg_belajar` VALUES (23, '197009011996031003', 1, 2006, 'Univ. Melbourne Australia');
INSERT INTO `peg_belajar` VALUES (24, '195710271985032001', 0, 0000, '');
INSERT INTO `peg_belajar` VALUES (25, '195811101988031001', 1, 1998, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (26, '197210101997031008', 1, 2009, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (27, '197407252001121001', 2, 2000, 'PPs IAIN Syahid');
INSERT INTO `peg_belajar` VALUES (28, '197202241998031003', 2, 2002, 'UMJ');
INSERT INTO `peg_belajar` VALUES (29, '196810141996031002', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (30, '19630409198022001', 2, 1993, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (31, '197210161998031004', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (32, '196511191993031002', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (33, '197003232000031001', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (34, '197112121995031001', 2, 1999, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (35, '196903041997031012', 1, 2006, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (36, '195607121981031003', 2, 2003, 'Univ. Negeri Jakarta');
INSERT INTO `peg_belajar` VALUES (37, '196103041955031001', 2, 1998, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (38, '19730504200031002', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (39, '195510151979031002', 2, 2005, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (40, '196509081995031001', 2, 2001, 'UII Jakarta');
INSERT INTO `peg_belajar` VALUES (41, '19470308197171001', 3, 1980, 'Univ. Islam Jakarta');
INSERT INTO `peg_belajar` VALUES (42, '195507061992031001', 1, 2007, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (43, '196706081994031005', 2, 1999, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (44, '196807031994032002', 2, 2002, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (45, '197602132003122001', 2, 2001, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (46, '197106301997032002', 2, 2005, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (47, '195703121985031002', 1, 2006, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (48, '196303051991031002', 2, 1995, 'Flinders University');
INSERT INTO `peg_belajar` VALUES (49, '196804081997032002', 2, 1998, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (50, '195811281994031001', 2, 1993, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (51, '196304141993031002', 2, 2004, 'UMJ');
INSERT INTO `peg_belajar` VALUES (52, '196912161996031001', 1, 2005, 'Universitat Leipzig Germany');
INSERT INTO `peg_belajar` VALUES (53, '195502151983031002', 2, 1999, 'UMJ');
INSERT INTO `peg_belajar` VALUES (54, '197107011998032002', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (55, '150282979', 2, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (56, '197512012005011005', 2, 2003, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (57, '197807152003121007', 2, 2006, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (58, '197007041996032002', 2, 1999, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (59, '196111011993031002', 2, 1997, 'UII Jakarta');
INSERT INTO `peg_belajar` VALUES (60, '196809041994011001', 2, 1998, 'IAIN Darussalam Banda Aceh');
INSERT INTO `peg_belajar` VALUES (61, '197102151997032002', 2, 2001, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (62, '196906102003122001', 2, 2003, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (63, '197210262003121001', 2, 2002, 'IIQ Jakarta');
INSERT INTO `peg_belajar` VALUES (64, '195308012001121001', 1, 1998, 'Univ. Al-Quro');
INSERT INTO `peg_belajar` VALUES (65, '196912011999031003', 1, 2001, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (66, '010178068', 1, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (67, '196404121994031004', 2, 1995, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (68, '197208172001122001', 2, 2001, 'Univ. Leiden');
INSERT INTO `peg_belajar` VALUES (69, '196803202000031001', 2, 1999, 'Institute Bahasa Arab Inter Al-Khartoum Sudan');
INSERT INTO `peg_belajar` VALUES (70, '197812302001122002', 2, 2005, 'UI');
INSERT INTO `peg_belajar` VALUES (71, '196208191991031001', 3, 1988, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (72, '197308022003121001', 2, 2001, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (73, '197010132005011003', 2, 2004, 'UI');
INSERT INTO `peg_belajar` VALUES (74, '197421132003121002', 2, 2002, 'Univ. Indonesia Jakarta');
INSERT INTO `peg_belajar` VALUES (75, '196106241985121001', 1, 2001, 'Univ of England');
INSERT INTO `peg_belajar` VALUES (76, '196908252000031001', 2, 1999, 'PPs IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (77, '196606161997031002', 2, 2006, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (78, '197312152005011002', 2, 2004, 'Univ. Muhammadiyah Jakarta');
INSERT INTO `peg_belajar` VALUES (79, '195903191979121001', 2, 2003, 'Semarang');
INSERT INTO `peg_belajar` VALUES (80, '150295489', 1, 2005, 'Uni. Hamburg Jerman');
INSERT INTO `peg_belajar` VALUES (81, '196911211994031001', 2, 2006, 'UMJ');
INSERT INTO `peg_belajar` VALUES (82, '197302151999031002', 2, 2005, 'UMJ');
INSERT INTO `peg_belajar` VALUES (83, '197904272003121002', 2, 2008, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (84, '150277548', 2, 1994, 'Al-Azhar Kairo');
INSERT INTO `peg_belajar` VALUES (85, '197608232000031002', 3, 2003, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (86, '197703172005011010', 2, 2004, 'UI');
INSERT INTO `peg_belajar` VALUES (87, '196906292008011016', 2, 2005, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (88, '195811191986031001', 2, 1991, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (89, '150258880', 2, 2002, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (90, '197110131999032001', 2, 2008, 'UNJ');
INSERT INTO `peg_belajar` VALUES (91, '198110132008011006', 2, 2006, 'UI');
INSERT INTO `peg_belajar` VALUES (92, '197705302007011008', 2, 2006, 'UI');
INSERT INTO `peg_belajar` VALUES (93, '197509032007011016', 2, 2006, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (94, '150411184', 2, 2004, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (95, '197606262009011013', 2, 2005, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (96, '196612231999031002', 2, 2006, 'Univ. Diponegoro Semarang');
INSERT INTO `peg_belajar` VALUES (97, '197111202006042005', 2, 2001, 'Univ. Diponegoro Semarang');
INSERT INTO `peg_belajar` VALUES (98, '197202032007011034', 2, 2001, 'UMJ');
INSERT INTO `peg_belajar` VALUES (99, '196105201999031002', 2, 1998, 'Institut International Khartoum Sudan');
INSERT INTO `peg_belajar` VALUES (100, '197402162008012013', 2, 2007, 'Univ. Al-Azhar kairo');
INSERT INTO `peg_belajar` VALUES (101, '197501022003121001', 2, 2002, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (102, '150411276', 2, 2003, 'UMJ');
INSERT INTO `peg_belajar` VALUES (103, '196003181991031001', 3, 1987, 'IAIN Jakarta');
INSERT INTO `peg_belajar` VALUES (104, '197312081997031001', 2, 2000, 'Northem Territory University Australia');
INSERT INTO `peg_belajar` VALUES (105, '197210312007011014', 2, 2004, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (106, '197110032007011015', 2, 2001, 'Universitas Saddam Baghdad');
INSERT INTO `peg_belajar` VALUES (107, '150411145', 2, 2009, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (110, '', 1, 0000, '');
INSERT INTO `peg_belajar` VALUES (111, '121315', 2, 1998, 'UIN Jakarta');
INSERT INTO `peg_belajar` VALUES (112, '121363', 2, 2008, 'uin jakarta');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `peg_jabatan`
-- 

INSERT INTO `peg_jabatan` VALUES (1, '1', 'Dekan');
INSERT INTO `peg_jabatan` VALUES (2, '2', 'Ketua Program Studi');

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
  `TMTBerikutnya` date NOT NULL,
  `pangkat` text NOT NULL,
  `TMTPangkat` date NOT NULL,
  `golRuang` text NOT NULL,
  `perolehanKUM` float NOT NULL,
  `active` tinyint(4) NOT NULL,
  `noSK` text NOT NULL,
  PRIMARY KEY  (`idKepangkatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

-- 
-- Dumping data for table `peg_kepangkatan`
-- 

INSERT INTO `peg_kepangkatan` VALUES (1, 1, '195505051982031012', '1.4', '2002-05-01', '0000-00-00', 'Pembina Utama', '2005-04-01', 'IV/e', 1067.72, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (2, 2, '150077526', '1.1', '2001-01-01', '0000-00-00', 'Pembina Utama', '2001-10-01', 'IV/e', 1030, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (3, 2, '194008051962021001', '1.1', '2003-04-01', '0000-00-00', 'Pembina Utama Madya', '1997-10-01', 'IV/d', 887, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (4, 4, '195609061982031004', '1.1', '2002-09-01', '0000-00-00', 'Pembina TK. I', '2003-04-01', 'IV/b', 632.75, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (5, 6, '195507061992031001', '1.1', '2001-01-01', '0000-00-00', 'Penata Tk. I', '2001-04-01', 'III/d', 300, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (6, 4, '194510101964101001', '1.1', '2001-01-01', '0000-00-00', 'Pembina Utama Muda', '1997-10-01', 'IV/c', 565, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (7, 5, '197202241998031003', '1.1', '2009-12-01', '0000-00-00', 'Pembina', '2009-10-01', 'IV/a', 507.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (8, 6, '196706081994031005', '1.1', '2008-09-01', '0000-00-00', 'Pembina', '2009-04-01', 'IV/a', 300, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (9, 4, '194609041965101002', '1.1', '2001-10-01', '0000-00-00', 'Pembina', '2001-10-01', 'IV/a', 670, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (10, 4, '197006051998031005', '1.1', '2007-05-01', '0000-00-00', 'Pembina TK. I', '2009-04-01', 'III/d', 559.88, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (11, 6, '196807031994032002', '1.1', '2007-04-01', '0000-00-00', 'Penata Tk. I', '2007-04-01', 'III/d', 300, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (12, 7, '196809041994011001', '1.1', '1999-09-01', '0000-00-00', 'Penata', '2000-04-01', 'III/c', 201.37, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (13, 5, '196810141996031002', '1.1', '2009-01-01', '0000-00-00', 'Pembina', '2009-10-01', 'IV/a', 520, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (14, 7, '197102151997032002', '1.1', '2005-12-01', '0000-00-00', 'Penata', '2006-04-01', 'III/c', 200, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (15, 4, '197608072003121001', '1.1', '2008-10-01', '0000-00-00', 'Penata Tk. I', '2009-04-01', 'III/d', 601.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (16, 6, '197602132003122001', '1.1', '2009-04-01', '0000-00-00', 'Penata', '2007-04-01', 'III/c', 380, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (17, 6, '197106301997032002', '1.1', '2010-04-01', '0000-00-00', 'Penata', '0000-00-00', 'III/c', 348, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (18, 7, '196906102003122001', '1.1', '2008-04-01', '0000-00-00', 'Penata Tk. I', '2010-04-01', 'III/d', 217.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (19, 5, '19630409198022001', '1.1', '2005-10-01', '0000-00-00', 'Pembina', '2005-10-01', 'IV/a', 520, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (20, 7, '197210262003121001', '1.1', '2007-04-01', '0000-00-00', 'Penata', '2007-04-01', 'III/c', 200, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (21, 8, '197904272003121002', '1.1', '2009-07-01', '0000-00-00', 'Penata Muda Tk. I', '2009-10-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (22, 2, '194507181964011001', '1.3', '2001-01-01', '0000-00-00', 'Pembina Utama Madya', '2006-04-01', 'IV d', 928, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (23, 1, '194512301967122001', '1.3', '2002-05-01', '0000-00-00', 'Pembina Utama', '2007-04-01', 'IV/e', 1050, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (24, 7, '195308012001121001', '1.3', '2005-08-01', '0000-00-00', 'Penata', '2001-12-01', 'III/c', 243.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (25, 6, '195703121985031002', '1.3', '2005-04-01', '0000-00-00', 'Penata Tk. I', '2005-04-01', 'III/d', 374.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (26, 7, '196912011999031003', '1.3', '2003-07-01', '0000-00-00', 'Penata', '2003-04-01', 'III/c', 200, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (27, 4, '195008171989031001', '1.3', '2005-03-01', '0000-00-00', 'Pembina TK. I', '2009-10-01', 'IV/b', 670, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (28, 6, '196303051991031002', '1.3', '2010-05-07', '0000-00-00', 'Pembina', '2010-04-01', 'IV/a', 300, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (29, 5, '197210161998031004', '1.3', '2007-07-01', '0000-00-00', 'Pembina', '2008-04-01', 'IV/a', 518, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (30, 5, '196511191993031002', '1.3', '2004-10-01', '0000-00-00', 'Penata', '2005-04-01', 'III/c', 400, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (31, 7, '010178068', '1.3', '2001-01-01', '0000-00-00', 'Pembina', '2004-10-01', 'IV/a', 267, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (32, 5, '197003232000031001', '1.3', '2009-12-01', '0000-00-00', 'Pembina', '2010-04-01', 'IV/a', 509, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (33, 6, '196804081997032002', '1.3', '2007-06-01', '0000-00-00', 'Penata Tk. I', '2007-10-01', 'III/d', 334, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (34, 6, '195811281994031001', '1.3', '2001-01-01', '0000-00-00', 'Penata Tk. I', '2003-10-01', 'III/d', 300, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (35, 7, '196404121994031004', '1.3', '2007-06-01', '0000-00-00', 'Penata', '2007-10-01', 'III/c', 200, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (36, 7, '197208172001122001', '1.3', '2007-04-01', '0000-00-00', 'Penata', '2007-04-01', 'III/c', 222, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (37, 7, '196803202000031001', '1.3', '2007-07-01', '0000-00-00', 'Penata', '2007-10-01', 'III/c', 225, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (38, 8, '150277548', '1.3', '1999-04-01', '0000-00-00', 'Penata Muda', '1996-03-01', 'III/a', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (39, 3, '197605312000031001', '1.3', '2008-08-01', '0000-00-00', 'Penata', '2008-10-01', 'III/c', 700, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (40, 8, '196105201999031002', '1.3', '2007-10-01', '0000-00-00', 'Penata Muda Tk. I', '2001-04-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (41, 8, '197402162008012013', '1.3', '2008-01-01', '0000-00-00', 'Pembina', '2008-01-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (42, 8, '197608232000031002', '1.3', '2009-09-01', '0000-00-00', 'Penata Muda Tk. I', '2009-10-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (43, 2, '195812221989031001', '1.2', '2002-09-01', '0000-00-00', 'Pembina Utama Madya', '2009-10-01', 'IV/d', 873, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (44, 2, '196312221994032002', '1.2', '2006-12-01', '0000-00-00', 'Pembina TK. I', '2010-04-01', 'IV/b', 850, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (45, 5, '197112121995031001', '1.2', '2009-05-01', '0000-00-00', 'Pembina', '2009-10-01', 'IV/a', 400, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (46, 4, '197009011996031003', '1.2', '2008-11-01', '0000-00-00', 'Pembina', '2009-04-01', 'IV/a', 641.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (47, 6, '196304141993031002', '1.2', '2005-08-01', '0000-00-00', 'Penata Tk. I', '2005-10-01', 'III/d', 330.9, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (48, 7, '197812302001122002', '1.2', '2009-12-01', '0000-00-00', 'Penata Muda Tk. I', '2006-04-01', 'III/b', 207, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (49, 7, '197501022003121001', '1.2', '2009-12-01', '0000-00-00', 'Penata Tk. I', '2010-04-01', 'III/d', 200.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (50, 5, '196903041997031012', '1.2', '2008-01-01', '0000-00-00', 'Penata Tk. I', '2008-00-01', 'III/d', 513.75, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (51, 4, '195710271985032001', '1.2', '2002-11-01', '0000-00-00', '', '0000-00-00', '', 550.3, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (52, 4, '195811101988031001', '1.2', '2001-01-01', '0000-00-00', 'Pembina TK. I', '2004-10-01', 'IV/b', 670, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (53, 4, '197210101997031008', '1.2', '2007-12-01', '0000-00-00', 'Pembina TK. I', '2010-04-01', 'IV/b', 586, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (54, 7, '196208191991031001', '1.2', '2001-01-01', '0000-00-00', 'Penata', '1999-04-01', 'III/c', 202.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (55, 6, '196912161996031001', '1.2', '2006-07-01', '0000-00-00', 'Penata Tk. I', '2008-10-01', 'III/d', 301, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (56, 7, '197308022003121001', '1.2', '2007-06-01', '0000-00-00', 'Penata', '2007-10-01', 'III/c', 222.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (57, 7, '197010132005011003', '1.2', '2008-05-01', '0000-00-00', 'Penata', '2008-10-01', 'III/c', 279, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (58, 8, '197703172005011010', '1.2', '2007-09-01', '0000-00-00', 'Penata Muda Tk. I', '2005-01-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (59, 7, '197421132003121002', '1.2', '2006-09-01', '0000-00-00', 'Penata', '2007-10-01', 'III/c', 210.05, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (60, 8, '196906292008011016', '1.2', '2010-01-01', '0000-00-00', 'Penata Muda Tk. I', '2008-01-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (61, 2, '150223823', '1.2', '2005-03-01', '0000-00-00', 'Pembina Utama Muda', '2006-04-01', 'IV/c', 850, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (62, 2, '150185438', '1.2', '2001-01-01', '0000-00-00', 'Pembina Utama', '2006-04-01', 'IV/e', 888.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (63, 2, '196011071985051001', '1.4', '2000-05-01', '0000-00-00', 'Pembina TK. I', '2000-10-01', 'IV/b', 850, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (64, 7, '196106241985121001', '1.4', '2005-11-01', '0000-00-00', 'Pembina', '2002-04-01', 'IV/a', 258, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (65, 6, '195502151983031002', '1.4', '2002-06-01', '0000-00-00', 'Pembina', '1990-04-01', 'IV/a', 300, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (66, 8, '195811191986031001', '1.4', '2001-01-01', '0000-00-00', 'Penata Muda Tk. I', '1994-04-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (67, 5, '195607121981031003', '1.4', '2004-10-01', '0000-00-00', 'Pembina', '1999-04-01', 'IV/a', 400, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (68, 4, '197407252001121001', '1.4', '2009-06-01', '0000-00-00', 'Pembina', '2009-10-01', 'IV/a', 550, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (69, 5, '196103041955031001', '1.4', '2004-06-01', '0000-00-00', 'Penata Tk. I', '2009-04-01', 'III/d', 400, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (70, 6, '197107011998032002', '1.4', '2004-10-01', '0000-00-00', 'Penata Tk. I', '2007-04-01', 'III/d', 376.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (71, 5, '19730504200031002', '1.4', '2007-07-01', '0000-00-00', 'Pembina', '2008-04-01', 'IV/a', 506.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (72, 8, '150258880', '1.4', '2001-01-01', '0000-00-00', 'Penata Muda', '1994-12-01', 'III/a', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (73, 7, '196908252000031001', '1.4', '2005-04-01', '0000-00-00', 'Penata', '2005-04-01', 'III/c', 200, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (74, 6, '150282979', '1.4', '2009-04-01', '0000-00-00', 'Penata', '2009-04-01', 'III/c', 301.14, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (75, 8, '197110131999032001', '1.4', '2008-04-01', '0000-00-00', 'Penata Muda Tk. I', '2003-04-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (76, 7, '196606161997031002', '1.4', '2009-04-01', '0000-00-00', 'Penata', '2009-04-01', 'III/c', 261, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (77, 6, '197512012005011005', '1.4', '2009-04-01', '0000-00-00', 'Penata', '2009-04-01', 'III/c', 336, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (78, 7, '197312152005011002', '1.4', '2010-04-01', '0000-00-00', 'Penata', '2010-04-01', 'III/c', 255.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (79, 6, '197807152003121007', '1.4', '2008-10-01', '0000-00-00', 'Penata', '2009-10-01', 'III/c', 303, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (80, 7, '195903191979121001', '1.4', '2006-10-01', '0000-00-00', 'Penata Tk. I', '2006-10-01', 'III/d', 200, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (81, 8, '198110132008011006', '1.4', '2009-12-01', '0000-00-00', 'Penata Muda Tk. I', '2009-09-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (82, 8, '197509032007011016', '1.4', '2009-09-01', '0000-00-00', 'Penata Muda Tk. I', '2009-09-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (83, 8, '197705302007011008', '1.4', '2009-09-01', '0000-00-00', 'Penata Muda Tk. I', '2007-01-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (84, 8, '150411184', '1.4', '2007-10-01', '0000-00-00', 'Penata Muda Tk. I', '2007-10-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (85, 8, '197606262009011013', '1.4', '2009-01-01', '0000-00-00', 'Penata Muda Tk. I', '2009-01-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (86, 2, '194209161962101001', '1.5', '2007-10-01', '0000-00-00', 'Pembina Utama Madya', '2005-10-01', 'IV/d', 850, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (87, 2, '150077575', '1.5', '2004-04-01', '0000-00-00', 'Pembina Utama', '2006-10-01', 'IV/e', 850, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (88, 6, '197007041996032002', '1.5', '2008-07-01', '2009-07-01', 'Penata', '2008-10-01', 'III/c', 334, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (89, 3, '195003061976031001', '1.5', '2001-01-01', '2002-01-01', 'Pembina Utama Muda', '2008-04-01', 'IV/c', 748.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (90, 7, '150295489', '1.5', '2010-05-07', '0000-00-00', 'Penata Muda Tk. I', '2008-10-01', 'III/b', 200, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (91, 7, '196911211994031001', '1.5', '2002-10-01', '0000-00-00', 'Penata', '2002-10-01', 'III/c', 223.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (92, 5, '195510151979031002', '1.5', '2009-06-01', '0000-00-00', 'Pembina', '2009-10-01', 'IV/a', 520, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (93, 7, '197302151999031002', '1.5', '2010-04-01', '0000-00-00', 'Penata', '2010-04-01', 'III/c', 276.2, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (94, 8, '196612231999031002', '1.5', '2007-10-01', '0000-00-00', 'Penata Muda Tk. I', '2003-10-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (96, 5, '196509081995031001', '1.5', '2008-11-01', '0000-00-00', 'Pembina', '2009-04-01', 'IV/a', 436.4, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (97, 5, '19470308197171001', '1.5', '2003-05-01', '0000-00-00', 'Pembina TK. I', '2000-10-01', 'IV/b', 403.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (98, 6, '196111011993031002', '1.5', '2005-04-01', '0000-00-00', 'Penata Tk. I', '2005-04-01', 'III/d', 374.5, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (99, 8, '197111202006042005', '1.5', '2008-10-01', '0000-00-00', 'Penata Muda Tk. I', '2008-04-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (100, 8, '197202032007011034', '1.5', '2009-10-01', '0000-00-00', 'Penata Muda Tk. I', '2009-07-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (101, 8, '150411276', '1.5', '2007-10-01', '0000-00-00', 'Penata Muda Tk. I', '2007-10-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (107, 8, '8828', '1.3', '2009-02-01', '2010-02-01', 'Madya Muda', '2009-01-01', 'III/b', 150, 0, 'Un.01');
INSERT INTO `peg_kepangkatan` VALUES (108, 8, '828', '1.2', '2009-02-01', '2010-02-01', 'Madya', '2009-01-01', 'III b', 150, 1, 'Un.01');
INSERT INTO `peg_kepangkatan` VALUES (109, 9, '196003181991031001', '1.3', '2004-01-01', '0000-00-00', 'Penata Muda Tk. I', '1998-04-01', 'III/b', 0, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (110, 8, '197312081997031001', '1.3', '2002-04-01', '0000-00-00', 'Penata Muda Tk. I', '2001-04-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (111, 8, '197210312007011014', '1.3', '2009-10-01', '0000-00-00', 'Penata Muda Tk. I', '2009-07-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (112, 8, '197110032007011015', '1.3', '2009-12-01', '0000-00-00', 'Penata Muda Tk. I', '2009-07-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (113, 9, '150411145', '1.4', '2007-01-01', '0000-00-00', 'Penata Muda', '2007-10-01', 'III/a', 0, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (117, 0, '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (118, 5, '121315', '1.1', '2009-02-01', '2010-02-01', 'Madya', '2009-02-01', 'III/b', 400, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (119, 8, '121363', '1.1', '2010-02-01', '2011-02-01', 'madya', '2010-01-01', 'III/b', 150, 1, '');
INSERT INTO `peg_kepangkatan` VALUES (121, 7, '8828', '1.3', '2011-01-01', '2012-01-01', 'Madya Muda', '2009-01-01', 'III/b', 50, 1, '');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `peg_menjabat`
-- 

INSERT INTO `peg_menjabat` VALUES (1, '1', '195505051982031012', '0000-00-00', 1);
INSERT INTO `peg_menjabat` VALUES (2, '2', '196706081994031005', '0000-00-00', 1);
INSERT INTO `peg_menjabat` VALUES (4, '2', '195008171989031001', '0000-00-00', 1);
INSERT INTO `peg_menjabat` VALUES (5, '2', '196312221994032002', '0000-00-00', 1);
INSERT INTO `peg_menjabat` VALUES (6, '2', '197807152003121007', '0000-00-00', 1);
INSERT INTO `peg_menjabat` VALUES (7, '2', '195003061976031001', '0000-00-00', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `peg_pegawai`
-- 

CREATE TABLE `peg_pegawai` (
  `idPegawai` bigint(20) NOT NULL auto_increment,
  `noSeriKarpeg` varchar(8) default NULL,
  `nip` varchar(18) NOT NULL,
  `titleDepan` text NOT NULL,
  `namaPeg` text NOT NULL,
  `titleBelakang` text NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

-- 
-- Dumping data for table `peg_pegawai`
-- 

INSERT INTO `peg_pegawai` VALUES (1, '19550505', '195505051982031012', 'Prof. Dr. H.', 'Muhammad Amin Suma', 'S.H.,M.A.,M.M.', '', 0, 'Serang', '1955-05-05', 'Ilmu Agama Islam', '1982-03-01', 1067.72, '1.4');
INSERT INTO `peg_pegawai` VALUES (2, '15007752', '150077526', 'Prof. Dr. H.', 'M. Atho Mudzhar', 'MA.', '', 0, 'Serang', '1948-10-20', 'Sosiologi Hukum Islam', '0000-00-00', 1030, '1.1');
INSERT INTO `peg_pegawai` VALUES (3, '19400805', '194008051962021001', 'Prof. Dr. H.', 'Achmad Sutarmadi', '', '', 0, 'Demak', '1940-08-05', 'Ilmu Hadist', '1962-02-01', 887, '1.1');
INSERT INTO `peg_pegawai` VALUES (4, '19560906', '195609061982031004', 'Dr. H.', 'Afifi Fauzi Abbas', 'M.A.', '', 0, 'Padang Japang', '1956-09-06', 'Fiqh', '1992-03-01', 632.75, '1.1');
INSERT INTO `peg_pegawai` VALUES (5, '19550706', '195507061992031001', 'Dr. H.', 'A. Juaini Syukri', 'Lc.,M.Ag.', '', 0, 'Pandeglang', '1955-07-06', 'Fiqh', '1992-03-01', 300, '1.1');
INSERT INTO `peg_pegawai` VALUES (6, '19451010', '194510101964101001', 'Drs.', 'Husni Thoyyar', 'M.Ag.', '', 0, 'Kuningan', '1945-10-10', 'Fiqh', '1964-10-01', 565, '1.1');
INSERT INTO `peg_pegawai` VALUES (7, '19720224', '197202241998031003', '', 'Kamarusdiana', 'S.Ag.,MH.', '', 0, 'Tangerang', '1972-02-24', 'Hukum Acara Peradilan Agama', '1998-03-01', 507.5, '1.1');
INSERT INTO `peg_pegawai` VALUES (8, '19670608', '196706081994031005', 'Dr.', 'Abdul Halim', 'M.Ag.', '', 0, 'Pem Sei Baru', '1967-06-08', 'Peradilan Agama', '1994-03-01', 300, '1.1');
INSERT INTO `peg_pegawai` VALUES (9, '19460904', '194609041965101002', 'Drs. H.', 'Odjo Kusnara N', 'M.Ag.', '', 0, 'Kuningan', '1946-09-04', 'Pengantar Ilmu Hadist', '1965-10-01', 670, '1.1');
INSERT INTO `peg_pegawai` VALUES (10, '19700605', '197006051998031005', 'Dr.', 'Mamat Salamet Burhanuddin', 'M.Ag.', '', 0, 'Kuningan', '1970-06-05', 'Met Pen.Tafsir & Filologi', '1998-03-01', 559.88, '1.1');
INSERT INTO `peg_pegawai` VALUES (11, '19680703', '196807031994032002', 'Dra.', 'Maskufa', 'MAg.', '', 1, 'Cirebon', '1968-07-03', 'Ilmu Falak', '1994-03-01', 300, '1.1');
INSERT INTO `peg_pegawai` VALUES (12, '19680904', '196809041994011001', 'Dr. H.', 'Umar Al Haddad', 'MAg.', '', 0, 'Jambi', '1968-09-04', 'Perbandingan  Madzhab & Hukum', '1994-01-01', 201.37, '1.1');
INSERT INTO `peg_pegawai` VALUES (13, '19681014', '196810141996031002', 'Dr. H.', 'Yayan Sofyan', 'M.Ag.', '', 0, 'Cianjur', '1968-10-14', 'Hukum Perkawinan', '1996-03-01', 520, '1.1');
INSERT INTO `peg_pegawai` VALUES (14, '19710215', '197102151997032002', '', 'Sri Hidayati', 'MAg.', '', 1, 'Jakarta', '1971-02-15', 'Fiqh Mawaris', '1997-03-01', 200, '1.1');
INSERT INTO `peg_pegawai` VALUES (15, '19760807', '197608072003121001', 'Dr.', 'Ahmad Tholabi', 'M.A.', '', 0, 'Serang', '1976-08-07', 'Ilmu Fiqh', '2003-12-01', 601.5, '1.1');
INSERT INTO `peg_pegawai` VALUES (16, '19760213', '197602132003122001', 'Dr. Hj.', 'Mesraini', 'MAg.', '', 1, 'Bukittinggi', '1976-02-13', 'Ilmu Fiqh ', '2003-12-01', 380, '1.1');
INSERT INTO `peg_pegawai` VALUES (17, '19710630', '197106301997032002', '', 'Hotnidah Nasution', 'SAg.,MA.', '', 1, 'Gunung Tua', '1971-01-31', 'Ilmu Peradilan', '1997-03-01', 348, '1.1');
INSERT INTO `peg_pegawai` VALUES (18, '19690610', '196906102003122001', '', 'Rosdiana', 'MA.', '', 1, 'Bogor', '1969-06-10', 'Ilmu Fiqh Munakahat', '2003-12-01', 217.5, '1.1');
INSERT INTO `peg_pegawai` VALUES (19, '19630409', '19630409198022001', 'Dr.', 'Azizah', 'M.A.', '', 1, 'Medan', '1963-04-09', 'Ilmu Fiqh', '1980-02-01', 520, '1.1');
INSERT INTO `peg_pegawai` VALUES (20, '19721026', '197210262003121001', '', 'Afwan Faizin', 'M.A.', '', 0, 'Madiun', '1972-10-26', 'Ilmu Hadits', '2003-12-01', 200, '1.1');
INSERT INTO `peg_pegawai` VALUES (21, '19790427', '197904272003121002', '', 'Arif Furqon', 'M.A.', '', 0, 'Ciamis', '1979-04-27', 'Ushul Fiqh', '2003-12-01', 150, '1.1');
INSERT INTO `peg_pegawai` VALUES (22, '19450718', '194507181964011001', 'Prof. Dr. H.', 'Hasanuddin AF', 'M.A.', '', 0, 'Majalengka', '1945-07-18', 'Ushul Fiqh', '1964-01-01', 928, '1.3');
INSERT INTO `peg_pegawai` VALUES (23, '19451230', '194512301967122001', 'Prof. Dr. Hj.', 'Huzaemah Tahido', 'M.A.', '', 1, 'Palu', '1945-12-30', 'Fiqh Perbandingan', '1967-12-01', 1050, '1.3');
INSERT INTO `peg_pegawai` VALUES (24, '19530801', '195308012001121001', 'Dr. H.', 'Muhammad Masyhuri Naim', 'MA.', '', 0, 'Jember', '1953-08-01', 'Ushul Fiqh', '2001-12-01', 243.5, '1.3');
INSERT INTO `peg_pegawai` VALUES (25, '19570312', '195703121985031002', 'Dr. H.', 'Ahmad Mukri Aji', 'M.A.', '', 0, 'Bogor', '1957-03-21', 'Ilmu Fiqh', '1985-03-01', 374.5, '1.3');
INSERT INTO `peg_pegawai` VALUES (26, '19691201', '196912011999031003', 'Dr.', 'A. Sudirman Abbas', 'M.A.', '', 0, 'Lamongan', '1969-12-01', 'Masail Fiqh', '1999-03-01', 200, '1.3');
INSERT INTO `peg_pegawai` VALUES (27, '19500817', '195008171989031001', '', 'Abdul Wahab Abd. Muhaimin', 'Lc.,MA.', '', 0, 'Ampawa Poso', '1950-08-17', 'Ushul Fiqih', '1989-03-01', 670, '1.3');
INSERT INTO `peg_pegawai` VALUES (28, '19630305', '196303051991031002', 'Drs.', 'Noryamin Aini', 'MA.', '', 0, 'Hulu Sungai Utara', '1963-03-05', 'Ilmu Sosiologi', '1991-03-01', 300, '1.3');
INSERT INTO `peg_pegawai` VALUES (29, '19721016', '197210161998031004', 'Dr.', 'Jaenal Aripin', 'M.Ag.', '', 0, 'Cirebon', '1972-10-16', 'Filsafat Hukum Islam', '1998-03-01', 518, '1.3');
INSERT INTO `peg_pegawai` VALUES (30, '19651119', '196511191993031002', 'Dr. H.', 'Muhammad Taufiki', 'M.Ag.', '', 0, 'Cirebon', '1965-11-19', 'Ilmu Tafsir', '1993-03-01', 400, '1.3');
INSERT INTO `peg_pegawai` VALUES (31, '01017806', '010178068', 'Dr. H.', 'A. Muhaimin Zen', 'M.Ag.', '', 0, 'Jombang', '1949-10-12', 'Tafsir Ahkam', '0000-00-00', 267, '1.3');
INSERT INTO `peg_pegawai` VALUES (32, '19700323', '197003232000031001', 'Dr. H.', 'Fuad Thohari', 'M.Ag.', '', 0, 'Ngawi', '1970-03-23', 'Ilmu Hadits', '2000-03-01', 509, '1.3');
INSERT INTO `peg_pegawai` VALUES (33, '19680408', '196804081997032002', 'Dra.', 'Afidah Wahyuni', 'M.Ag.', '', 1, 'Gresik', '1968-04-08', 'Ilmu Fiqh', '1997-03-01', 334, '1.3');
INSERT INTO `peg_pegawai` VALUES (34, '19581128', '195811281994031001', 'Dr. H.', 'Supriyadi Ahmad', 'MA.', '', 0, 'Ponorogo', '1958-11-28', 'Dirasah Islamiyah', '1994-03-01', 300, '1.3');
INSERT INTO `peg_pegawai` VALUES (35, '19640412', '196404121994031004', 'Drs. H.', 'Ahmad Yani', 'M.Ag.', '', 0, 'Jakarta', '1964-04-12', 'Ilmu Kalam', '1994-03-01', 200, '1.3');
INSERT INTO `peg_pegawai` VALUES (36, '19720817', '197208172001122001', '', 'Dewi Sukarti', 'M.A.', '', 1, 'Sangkuang', '1972-08-17', 'Sosiologi Hukum', '2001-12-01', 222, '1.3');
INSERT INTO `peg_pegawai` VALUES (37, '19680320', '196803202000031001', '', 'A. Bisri Abd Somad', 'M.Ag.', '', 0, 'Jakarta', '1968-03-20', 'Ilmu Hadits', '2000-03-01', 225, '1.3');
INSERT INTO `peg_pegawai` VALUES (38, '15027754', '150277548', '', 'Ummu Hanah Yusuf  Saumin', 'M.A.', '', 1, 'Jakarta', '1961-08-20', 'Fiqh', '0000-00-00', 150, '1.3');
INSERT INTO `peg_pegawai` VALUES (39, '19760531', '197605312000031001', 'H.', 'M. Asrorun Niam', 'S.Ag., M.A.', '', 0, 'Nganjuk', '1976-05-31', 'Ilmu Fiqh', '2000-03-01', 700, '1.3');
INSERT INTO `peg_pegawai` VALUES (40, '19610520', '196105201999031002', 'H.', 'M. Riza Afwi', 'M.A.', '', 0, 'Jakarta', '1961-05-20', 'Bahasa Arab', '1999-03-01', 150, '1.3');
INSERT INTO `peg_pegawai` VALUES (41, '19740216', '197402162008012013', '', 'Siti Hana', 'M.A.', '', 1, 'Bogor', '1974-02-16', '', '2008-01-01', 150, '1.3');
INSERT INTO `peg_pegawai` VALUES (42, '19760823', '197608232000031002', '', 'Zuhri', 'S.IP.', '', 0, 'Gunung Kidul', '1976-08-23', '', '2000-03-01', 150, '1.3');
INSERT INTO `peg_pegawai` VALUES (43, '19581222', '195812221989031001', 'Prof. Dr. H.', 'Masykuri', '', '', 0, 'Weleri', '1958-12-22', 'Fiqh Siyasah', '1989-03-01', 873, '1.2');
INSERT INTO `peg_pegawai` VALUES (44, '19631222', '196312221994032002', 'Prof. Dr. Hj.', 'Amany B. Umar Lubis', 'Lc.,M.A.', '', 0, 'Kairo Mesir', '1963-12-22', 'Sej.Politik Islam', '1994-03-01', 850, '1.2');
INSERT INTO `peg_pegawai` VALUES (45, '19711212', '197112121995031001', 'Dr. H.', 'Mujar', 'M.Ag.', '', 0, 'Tangerang', '1971-12-12', 'Fiqh Siyasah', '1995-03-01', 400, '1.2');
INSERT INTO `peg_pegawai` VALUES (46, '19700901', '197009011996031003', '', 'M. Arskal Salim GP', 'M.Ag.,Ph.D.', '', 0, 'Ujung Pandang', '1970-09-01', 'Hk. Acara Peradilan Agama', '1996-03-01', 641.5, '1.2');
INSERT INTO `peg_pegawai` VALUES (47, '19630414', '196304141993031002', 'Drs.', 'Heldi', 'MPd.', '', 0, 'Pulau Punjung', '1963-04-14', 'Ilmu Sosial Dasar', '1993-03-01', 330.9, '1.2');
INSERT INTO `peg_pegawai` VALUES (48, '19781230', '197812302001122002', '', 'Masyrofah', 'M.Si.', '', 1, 'Jakarta', '1978-12-30', 'Fiqh Siyasah', '2001-12-01', 207, '1.2');
INSERT INTO `peg_pegawai` VALUES (49, '19750102', '197501022003121001', '', 'Khamami, M.A', '', '', 0, 'Pemalang', '1975-01-02', 'Fiqh Siyasah', '2003-12-01', 200.5, '1.2');
INSERT INTO `peg_pegawai` VALUES (50, '19690304', '196903041997031012', 'Dr.', 'Rumadi', 'M.Ag.', '', 0, 'Jepara', '1969-03-04', 'Hukum Islam di Indonesia', '1997-03-01', 513.75, '1.2');
INSERT INTO `peg_pegawai` VALUES (51, '19571027', '195710271985032001', 'Dr.', 'Isnawati Rais', 'MA.', '', 1, 'Sungai Tanang, ', '1957-10-27', 'Fiqh & Ushul Fiqh', '0000-00-00', 550.3, '1.2');
INSERT INTO `peg_pegawai` VALUES (52, '19581110', '195811101988031001', 'Dr.', 'Abdurrahman', 'MA.', '', 0, 'Perbaungan', '1958-11-10', 'Ilmu Fiqh & Ushul Fiqh ', '1988-03-01', 670, '1.2');
INSERT INTO `peg_pegawai` VALUES (53, '19721010', '197210101997031008', 'Dr.', 'Asmawi', 'M.Ag.', '', 0, 'Jakarta', '1972-10-10', 'Ushul Fiqh', '1997-03-01', 586, '1.2');
INSERT INTO `peg_pegawai` VALUES (54, '19620819', '196208191991031001', 'Drs.', 'Muharrom', '', '', 0, 'Malang', '1962-08-19', 'Filsafat Umum', '1991-03-01', 202.5, '1.2');
INSERT INTO `peg_pegawai` VALUES (55, '19691216', '196912161996031001', 'Dr.', 'Asep Saepudin Jahar', 'M.A.', '', 0, 'Pandeglang,', '1969-12-16', 'Met. Penelitian Hukum', '1996-03-01', 301, '1.2');
INSERT INTO `peg_pegawai` VALUES (56, '19730802', '197308022003121001', 'Dr. H.', 'Muhammad Nurul Irfan', 'M.Ag.', '', 0, 'Magelang', '1973-08-02', 'Fikih Jinayah', '2003-12-01', 222.5, '1.2');
INSERT INTO `peg_pegawai` VALUES (57, '19701013', '197010132005011003', '', 'Iding Rosyidin', 'S.Ag.,M.Si.', '', 0, 'Kuningan', '1970-10-13', 'Ilmu Politik', '2005-01-01', 279, '1.2');
INSERT INTO `peg_pegawai` VALUES (58, '19770317', '197703172005011010', '', 'Atep Abdurofiq', 'M.Si.', '', 0, 'Sumedang', '1977-03-17', 'Ilmu Politik &  Hub.Internasional', '2005-01-01', 150, '1.2');
INSERT INTO `peg_pegawai` VALUES (59, '19742113', '197421132003121002', '', 'Fahmi M. Ahmadi', 'S.Ag.,M.Si.', '', 0, 'Tanjung Karang', '1974-12-13', 'Ilmu Sosiologi Hukum', '2003-12-01', 210.05, '1.2');
INSERT INTO `peg_pegawai` VALUES (60, '10', '196906292008011016', '', 'Qosyim Arsadani', 'M.A.', '', 0, 'Jombang', '1969-06-29', 'Fiqh', '2008-01-01', 150, '1.2');
INSERT INTO `peg_pegawai` VALUES (61, '11', '150223823', 'Prof. Dr. H.', 'Yunasril Ali', 'M.A.', '', 0, 'Kerinci', '1955-12-30', 'Ilmu Tasawuf', '0000-00-00', 850, '1.2');
INSERT INTO `peg_pegawai` VALUES (62, '12', '150185438', 'Prof. Dr.', 'Zaitun Subhan', 'MA.', '', 1, 'Gresik', '1949-10-10', 'Ilmu Hadits', '0000-00-00', 888.5, '1.2');
INSERT INTO `peg_pegawai` VALUES (63, '19601107', '196011071985051001', 'Prof. Dr. H.', 'Fathurrahman Jamil', 'M.A.', '', 0, 'Sukabumi', '1960-11-07', 'Ilmu Fiqh', '1985-05-01', 850, '1.4');
INSERT INTO `peg_pegawai` VALUES (64, '19610624', '196106241985121001', 'Ir.', 'M. Nadratuzzaman Hosen', 'M.S.,M.Sc.,Ph.D.', '', 0, 'Jakarta', '1961-06-24', 'Ekonomi Islam', '1985-12-01', 258, '1.4');
INSERT INTO `peg_pegawai` VALUES (65, '19550215', '195502151983031002', 'Dr. H.', 'Anwar Abbas', 'M.Ag.,M.M.', '', 0, 'Balaimansiro', '0000-00-00', 'Ekonomi Islam', '1983-03-01', 300, '1.4');
INSERT INTO `peg_pegawai` VALUES (66, '19581119', '195811191986031001', 'Drs. H.', 'Hamid Farihi', 'M.A.', '', 0, 'Tegal', '1958-11-19', 'Hadits', '1986-03-01', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (67, '19560712', '195607121981031003', 'Drs. H.', 'Zainul Arifin Yusuf', 'MPd.', '', 0, 'Padang', '1956-07-12', 'Ilmu Ekonomi', '1981-03-01', 400, '1.4');
INSERT INTO `peg_pegawai` VALUES (68, '19740725', '197407252001121001', 'H.', 'Ah. Azharuddin Lathif', 'M.Ag.,M.H.', '', 0, 'Jombang', '1974-07-25', 'Ilmu Fiqh', '2001-12-01', 550, '1.4');
INSERT INTO `peg_pegawai` VALUES (69, '19610304', '196103041955031001', 'Dr.', 'Hasanudin', 'M.Ag.', '', 0, 'Cirebon', '1961-03-04', 'Perband.Madzhab', '1995-03-01', 400, '1.4');
INSERT INTO `peg_pegawai` VALUES (70, '19710701', '197107011998032002', 'Dr.', 'Euis Amalia', 'M.Ag.', '', 1, 'Kuningan', '1971-07-01', 'Ekonomi Islam', '1998-03-01', 376.5, '1.4');
INSERT INTO `peg_pegawai` VALUES (71, '19730504', '19730504200031002', 'Dr.', 'Syahrul Adam', 'M.Ag.', '', 0, 'Gresik', '1973-05-04', 'Ilmu Tasawuf', '2000-03-01', 506.5, '1.4');
INSERT INTO `peg_pegawai` VALUES (72, '13', '150258880', 'Drs.', 'Mahmud Zaki Fuad', 'M.A.', '', 0, 'Palembang', '1965-08-26', 'Ilmu Fiqh', '0000-00-00', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (73, '19690825', '196908252000031001', 'Dr.', 'Alimin', 'M.Ag.', '', 0, 'Bone', '1969-08-25', 'Hadits', '2000-03-01', 200, '1.4');
INSERT INTO `peg_pegawai` VALUES (74, '14', '150282979', '', 'Mukmin Roup', 'S.Ag.,M.A .', '', 0, 'Bogor', '1970-04-16', 'Ilmu Tafsir', '0000-00-00', 301.14, '1.4');
INSERT INTO `peg_pegawai` VALUES (75, '19711013', '197110131999032001', '', 'Nurul Handayani', 'S.Pd.,M.Pd.', '', 1, 'Tangerang', '1971-01-13', 'Bahasa Inggris', '1999-03-01', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (76, '19660616', '196606161997031002', '', 'Wiwi Mashum', 'S.Ag.,M.A.', '', 1, 'Cirebon', '1966-06-16', 'Hadits Ahkam', '1997-03-01', 261, '1.4');
INSERT INTO `peg_pegawai` VALUES (77, '19751201', '197512012005011005', '', 'AM. Hasan Ali', 'M.A.', '', 0, 'Jombang', '1975-12-01', 'Ilmu Ekonomi Islam', '2005-01-01', 336, '1.4');
INSERT INTO `peg_pegawai` VALUES (78, '19731215', '197312152005011002', '', 'Abdurrauf', 'M.A.', '', 0, 'Lombok', '1973-12-15', 'Ekonomi Islam', '2005-01-01', 255.5, '1.4');
INSERT INTO `peg_pegawai` VALUES (79, '19780715', '197807152003121007', '', 'Muhammad Maksum', 'SAg.,MA.', '', 0, 'Temanggung', '1978-07-15', 'Masail Fiqhiyyah', '2003-12-01', 303, '1.4');
INSERT INTO `peg_pegawai` VALUES (80, '19590319', '195903191979121001', '', 'Burhanuddin', 'S.H.,M.Hum.', '', 0, 'Semarang', '1959-03-19', 'Ilmu Hukum', '1979-12-01', 200, '1.4');
INSERT INTO `peg_pegawai` VALUES (81, '15', '198110132008011006', '', 'Muhammad Nur Rianto Al Arif', 'M.Si.', '', 0, 'Pekanbaru', '1981-10-13', 'Ilmu Ekonomi Islam', '2008-01-01', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (82, '19750903', '197509032007011016', '', 'Yuke Rahmawati', 'M.A.', '', 1, 'Sukabumi', '1975-09-03', '', '2007-01-01', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (83, '19770530', '197705302007011008', '', 'Djaka Badranaya', 'S.Ag.,M.E.', '', 0, 'Bandung', '1977-05-30', '', '2007-01-01', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (84, '15041118', '150411184', '', 'Achmad Chairul Hadi', 'M.A.', '', 0, 'Tangerang', '1972-05-31', '', '0000-00-00', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (85, '19760626', '197606262009011013', '', 'Moch. Buchari Muslim', 'M.A.', '', 0, 'Kediri', '1976-06-26', '', '2009-01-01', 150, '1.4');
INSERT INTO `peg_pegawai` VALUES (86, '19420916', '194209161962101001', 'Prof. Dr. H.', 'Ahmad Sukardja', 'S.H.,M.A.', '', 0, 'Kuningan', '1942-09-16', '', '1962-10-01', 850, '1.5');
INSERT INTO `peg_pegawai` VALUES (87, '15007757', '150077575', 'Prof. Dr. H.', 'Abd. Gani Abdullah', 'M.A.', '', 0, 'Bima', '1946-08-17', '', '0000-00-00', 850, '1.5');
INSERT INTO `peg_pegawai` VALUES (88, '19700704', '197007041996032002', '', 'Euis Nurlaelawati', 'M.A.,Ph.D.', '', 1, 'Karawang', '1970-07-04', 'Fikih', '1996-03-01', 334, '1.5');
INSERT INTO `peg_pegawai` VALUES (89, '19500306', '195003061976031001', 'Drs. H.', 'A. Basiq Djalil', 'SH.,MA.', '', 0, 'Aceh', '1950-03-06', 'Peradilan Islam', '1976-03-01', 748.5, '1.5');
INSERT INTO `peg_pegawai` VALUES (90, '15029548', '150295489', 'Dr.', 'JM Muslimin', 'M.A.', '', 0, 'Bojonegoro', '1968-08-12', 'Sosiologi Hukum Islam', '0000-00-00', 200, '1.5');
INSERT INTO `peg_pegawai` VALUES (91, '19691121', '196911211994031001', 'Drs. H.', 'Asep Syarifuddin Hidayat', 'S.H.,M.H.', '', 0, 'Kuningan', '1969-11-21', 'Hk.Islam di Indonesia', '1994-03-01', 223.5, '1.5');
INSERT INTO `peg_pegawai` VALUES (92, '19551015', '195510151979031002', 'Drs.', 'Djawahir Hejazziey', 'S.H.,M.A.', '', 0, 'Banten', '1955-10-15', 'Perbandingan Hukum', '1979-03-01', 520, '1.5');
INSERT INTO `peg_pegawai` VALUES (93, '19730215', '197302151999031002', '', 'Nahrowi', 'S.H.,M.H.', '', 0, 'Jakarta ', '1973-02-15', 'Hukum Perdata', '1999-03-01', 276.2, '1.5');
INSERT INTO `peg_pegawai` VALUES (94, '19661223', '196612231999031002', '', 'Bambang Catur SP', 'S.H.,M.H.', '', 0, 'Pati', '1966-12-23', 'Hukum Acara Perdata', '1999-03-01', 150, '1.5');
INSERT INTO `peg_pegawai` VALUES (96, '19650908', '196509081995031001', 'Drs.', 'Abu Tamrin', 'MHum.', '', 0, 'Kebumen', '1965-09-08', 'Hukum Tata Negara', '1995-03-01', 436.4, '1.5');
INSERT INTO `peg_pegawai` VALUES (97, '19470308', '19470308197171001', 'H.', 'Damanhuri Mustafa', 'SH.', '', 0, 'Lima Puluh Kota', '1947-03-08', 'Peradilan Agama', '1971-07-01', 403.5, '1.5');
INSERT INTO `peg_pegawai` VALUES (98, '19611101', '196111011993031002', '', 'Dedy Nursyamsi', 'S.H.,M.H.', '', 0, 'Jakarta', '1961-11-01', 'Hukum Pidana', '1993-03-01', 374.5, '1.5');
INSERT INTO `peg_pegawai` VALUES (99, '19711120', '197111202006042005', '', 'Ria Safitri', 'M.Hum.', '', 1, 'Bekasi', '1971-11-20', 'Ilmu Hk.Perdata dan  Hk.Bisnis', '2006-04-01', 150, '1.5');
INSERT INTO `peg_pegawai` VALUES (100, '19720203', '197202032007011034', '', 'AlFitra', 'M.Hum.', '', 0, 'Air Bangis', '1972-02-03', 'Ilmu Hukum Pidana', '2007-01-01', 150, '1.5');
INSERT INTO `peg_pegawai` VALUES (101, '15041127', '150411276', '', 'Ismail Hasani, MH', '', '', 0, '', '0000-00-00', '', '0000-00-00', 150, '1.5');
INSERT INTO `peg_pegawai` VALUES (102, '6281', '8828', '', 'Tester2', '', 'Ciputat', 0, 'Cirebon', '1986-12-01', 'Programmer', '2007-01-01', 200, '1.3');
INSERT INTO `peg_pegawai` VALUES (103, '8228', '828', '', 'Tester1', '', 'Ciputat', 0, 'Cirebon', '1986-12-01', 'Programmer', '0000-00-00', 150, '1.2');
INSERT INTO `peg_pegawai` VALUES (104, '19600318', '196003181991031001', 'Drs.', 'Simil Wafa', '', '', 0, 'Kudus', '1960-03-18', '', '0000-00-00', 0, '1.3');
INSERT INTO `peg_pegawai` VALUES (105, '19731208', '197312081997031001', '', 'Nadirsyah', 'S.Ag.,LLM.', '', 0, 'Jakarta', '1973-12-08', '', '0000-00-00', 150, '1.3');
INSERT INTO `peg_pegawai` VALUES (106, '19721031', '197210312007011014', '', 'Muhammad Harfin Zuhdi', 'M.A.', '', 0, 'Cakranegara', '1972-10-31', '', '0000-00-00', 150, '1.3');
INSERT INTO `peg_pegawai` VALUES (107, '19711003', '197110032007011015', '', 'Shofiyullah', 'M.A.', '', 0, 'Demak', '1971-10-03', '', '0000-00-00', 150, '1.3');
INSERT INTO `peg_pegawai` VALUES (108, '15041114', '150411145', '', 'Mohammad Mujibur Rohman', 'M.A.', '', 0, 'Nganjuk', '1976-04-08', '', '0000-00-00', 0, '1.4');
INSERT INTO `peg_pegawai` VALUES (113, '121363', '121363', '', 'Uji coba', '', 'dd', 0, 'cirebon', '1986-12-01', 'programmer', '2008-01-01', 150, '1.1');
INSERT INTO `peg_pegawai` VALUES (111, '', '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', 0, '');
INSERT INTO `peg_pegawai` VALUES (112, '121315', '121315', 'Dra.', 'Atiyah Tahta Nisyatina', 'M.Kom.', 'Ciputat', 1, 'Tegal', '1988-05-10', 'Networking', '2008-02-01', 400, '1.1');

-- --------------------------------------------------------

-- 
-- Table structure for table `peg_pendidikan`
-- 

CREATE TABLE `peg_pendidikan` (
  `idPendidikan` int(11) NOT NULL auto_increment,
  `namaPendidikan` text NOT NULL,
  `rankingPendidikan` int(11) NOT NULL,
  PRIMARY KEY  (`idPendidikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `peg_pendidikan`
-- 

INSERT INTO `peg_pendidikan` VALUES (1, 'S3', 1);
INSERT INTO `peg_pendidikan` VALUES (2, 'S2', 2);
INSERT INTO `peg_pendidikan` VALUES (3, 'S1', 3);

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

INSERT INTO `peg_unitkerja` VALUES (1, '1', 'Fakultas Syari''ah dan Hukum', '0', 5, 1);
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
  `token` varchar(255) NOT NULL,
  `idLevel` int(11) NOT NULL,
  PRIMARY KEY  (`idUser`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

-- 
-- Dumping data for table `peg_user`
-- 

INSERT INTO `peg_user` VALUES (1, 'superadmin', 'Nisyatina', '822sYeYeLXqnQ', 'utaDmv', 1);
INSERT INTO `peg_user` VALUES (2, 'adminfak', 'Atiyah', '822sYeYeLXqnQ', '4f3IMEo4vJfGs', 2);
INSERT INTO `peg_user` VALUES (3, 'adminkepeg', 'Tahta', '822sYeYeLXqnQ', '98yC7DDmVdrWs', 3);
INSERT INTO `peg_user` VALUES (21, '195507061992031001', '', 'dfETEnDEUgdIk', '49kmhS7gfIOqw', 4);
INSERT INTO `peg_user` VALUES (20, '195609061982031004', '', '5fvaFUEEfvF0w', '0ewuCIm.VfNII', 4);
INSERT INTO `peg_user` VALUES (19, '194008051962021001', '', 'a3g7jSRewBmcM', '49xO4oZnFGe4I', 4);
INSERT INTO `peg_user` VALUES (18, '150077526', '', '95F0.vAVmbxRQ', '3biF928OYNdT6', 4);
INSERT INTO `peg_user` VALUES (17, '195505051982031012', '', 'ebKqW.GxsIRmo', '89vnbZYcDfBtk', 4);
INSERT INTO `peg_user` VALUES (22, '194510101964101001', '', '88XbaW8mXtw96', 'f4XWYBfNSqMwc', 4);
INSERT INTO `peg_user` VALUES (23, '197202241998031003', '', '86H/Blaytdvzw', 'ccj9ROeNao6vA', 4);
INSERT INTO `peg_user` VALUES (24, '196706081994031005', '', 'ff/QKN9imWGag', 'c2f.DZYoEPWL.', 4);
INSERT INTO `peg_user` VALUES (25, '194609041965101002', '', '32G/sUHZruWqg', 'a8MnVPinP47SU', 4);
INSERT INTO `peg_user` VALUES (26, '197006051998031005', '', 'b6U7eUUrfr7z2', 'ebf7cjdI/NXKk', 4);
INSERT INTO `peg_user` VALUES (27, '196807031994032002', '', 'c1LKedE20c6FI', '263IhbaFxE.bk', 4);
INSERT INTO `peg_user` VALUES (28, '196809041994011001', '', '73t8d.TaE9iaQ', '65uXHCjmQxk1g', 4);
INSERT INTO `peg_user` VALUES (29, '196810141996031002', '', '35G0eaunoZNBM', '25tBgEgBIOBLQ', 4);
INSERT INTO `peg_user` VALUES (30, '197102151997032002', '', '872WseABC6CDw', '13jenHe7UBbqM', 4);
INSERT INTO `peg_user` VALUES (31, '197608072003121001', '', '45iIYiBDIblGE', '3a9Y2w.L84jgI', 4);
INSERT INTO `peg_user` VALUES (32, '197602132003122001', '', '1a1aIaczJhNwI', 'fcjBBu6aBPNwM', 4);
INSERT INTO `peg_user` VALUES (33, '197106301997032002', '', '26inuO5Rn4dgM', '5dYkiey4AwCGQ', 4);
INSERT INTO `peg_user` VALUES (34, '196906102003122001', '', '10WfwD3zZOzmY', 'e8euKKQkD29xA', 4);
INSERT INTO `peg_user` VALUES (35, '19630409198022001', '', 'ddPu3XR9u/MR.', 'd8k8c3SvndZ8I', 4);
INSERT INTO `peg_user` VALUES (36, '197210262003121001', '', 'fagMqT1WCctOQ', '8ee8jkHI6DsYA', 4);
INSERT INTO `peg_user` VALUES (37, '197904272003121002', '', '2fSlqPo0Iz9j.', '19t94yygYF.jI', 4);
INSERT INTO `peg_user` VALUES (38, '194507181964011001', '', '7amUi9t8TDYFg', '69Q24RR1r3iNI', 4);
INSERT INTO `peg_user` VALUES (39, '194512301967122001', '', '25Ye0AXkqUd2.', 'cfPkfN0iZ6sQ6', 4);
INSERT INTO `peg_user` VALUES (40, '195308012001121001', '', 'a7wpD0a40Cx0w', '89BuEDioUIxVo', 4);
INSERT INTO `peg_user` VALUES (41, '195703121985031002', '', 'a1H6wlJMeqMGE', '97T/VZ6Cb2Wqg', 4);
INSERT INTO `peg_user` VALUES (42, '196912011999031003', '', '79/KH8A43VDF2', 'a3R4H11vzrHlc', 4);
INSERT INTO `peg_user` VALUES (43, '195008171989031001', '', 'f3cy5.aMbwEHA', 'a6o58M3gGe7KQ', 4);
INSERT INTO `peg_user` VALUES (44, '196303051991031002', '', '45k0AfwgUKUjY', 'eb3FqMqoU7iMQ', 4);
INSERT INTO `peg_user` VALUES (45, '197210161998031004', '', 'b2fDGQaID6ASc', '05X3FFYb9pYEk', 4);
INSERT INTO `peg_user` VALUES (46, '196511191993031002', '', '49J/cq4kQoans', '55puKV27pYlIM', 4);
INSERT INTO `peg_user` VALUES (47, '010178068', '', '83xLflCqVy51o', '02KAPsWLGjAmM', 4);
INSERT INTO `peg_user` VALUES (48, '197003232000031001', '', '4dmnxPCmR1pD6', '15nmu4299jeS6', 4);
INSERT INTO `peg_user` VALUES (49, '196804081997032002', '', '79lTnEBKDmojk', '06DMGBKgcvY/o', 4);
INSERT INTO `peg_user` VALUES (50, '195811281994031001', '', '84WK29zanbDbY', 'b3KukdlFrdD0E', 4);
INSERT INTO `peg_user` VALUES (51, '196404121994031004', '', 'd6d5pFPcC/xT2', 'dbmcRdeLYVYvM', 4);
INSERT INTO `peg_user` VALUES (52, '197208172001122001', '', 'f76SCjbMPv3GY', '1cnFUYYM0ec4M', 4);
INSERT INTO `peg_user` VALUES (53, '196803202000031001', '', '53QuQ9UHSuuCE', '91gSicZZHzUO.', 4);
INSERT INTO `peg_user` VALUES (54, '150277548', '', 'cau4l9O3D78Io', 'e2Bz9Mw5UadTA', 4);
INSERT INTO `peg_user` VALUES (55, '197605312000031001', '', '09NXh4AnIADGk', 'c67dWUGlFsM4.', 4);
INSERT INTO `peg_user` VALUES (56, '196105201999031002', '', 'db2B1t18hniqs', '44wjks9YEsEL2', 4);
INSERT INTO `peg_user` VALUES (57, '197402162008012013', '', 'daQf.gr4ifwWw', '87Uhk0QXekYIk', 4);
INSERT INTO `peg_user` VALUES (58, '197608232000031002', '', 'b0i2y9lxQv7pE', '395Dt23IlJmKc', 4);
INSERT INTO `peg_user` VALUES (59, '195812221989031001', '', 'b4WF/stHkycuU', '31JWtxBTIwiyc', 4);
INSERT INTO `peg_user` VALUES (60, '196312221994032002', '', '4dsMYU1GnkgXw', '36hpDDPDlnBeU', 4);
INSERT INTO `peg_user` VALUES (61, '197112121995031001', '', 'c8PiyvFQxhKNA', 'f4uY6I8cBU/xE', 4);
INSERT INTO `peg_user` VALUES (62, '197009011996031003', '', 'b7r9CaNO6v7ms', 'e50DyYdHO4uSQ', 4);
INSERT INTO `peg_user` VALUES (63, '196304141993031002', '', 'b22KC4UmfohWE', '8dsVH14QoTwqc', 4);
INSERT INTO `peg_user` VALUES (64, '197812302001122002', '', 'dc9Cvea1WWZXY', 'f1h153SMfmLwY', 4);
INSERT INTO `peg_user` VALUES (65, '197501022003121001', '', '22SLTdP/SVlNQ', '9ehAicQ5kEUhg', 4);
INSERT INTO `peg_user` VALUES (66, '196903041997031012', '', 'abGVguI1Z7gB6', '79/go4bwfthYM', 4);
INSERT INTO `peg_user` VALUES (67, '195710271985032001', '', '392wMwmYsC8fg', 'gwbohf', 4);
INSERT INTO `peg_user` VALUES (68, '195811101988031001', '', '67WojFAGlV6vU', 'c28H48zWRUSFw', 4);
INSERT INTO `peg_user` VALUES (69, '197210101997031008', '', '7fhxmrsylcyxs', '18yv8hnpOPCNo', 4);
INSERT INTO `peg_user` VALUES (70, '196208191991031001', '', 'b8q0tTs4DQQzU', '13rI7qBgydETE', 4);
INSERT INTO `peg_user` VALUES (71, '196912161996031001', '', 'd7WQrDH1qMc1M', '0ctcNCx1Vu05o', 4);
INSERT INTO `peg_user` VALUES (72, '197308022003121001', '', 'b1TKo7RZrpgKU', 'e3juAp1AbOvwY', 4);
INSERT INTO `peg_user` VALUES (73, '197010132005011003', '', 'eeOHEKjQwLZYI', 'e01SvMA1b5KCY', 4);
INSERT INTO `peg_user` VALUES (74, '197703172005011010', '', '5frMS2fUIgJHQ', 'edzrQhIuJ0TFk', 4);
INSERT INTO `peg_user` VALUES (75, '197421132003121002', '', '0d2enNLx54Zm2', '61hdx1OBUpZS.', 4);
INSERT INTO `peg_user` VALUES (76, '196906292008011016', '', '14l65jSLDhoYU', '0fgctBCvWidd.', 4);
INSERT INTO `peg_user` VALUES (77, '150223823', '', 'ac8eAd2loBn1s', '69OjxX1t2k5f6', 4);
INSERT INTO `peg_user` VALUES (78, '150185438', '', 'fcRo9182qlKsg', 'd24n7CVn.EIJQ', 4);
INSERT INTO `peg_user` VALUES (79, '196011071985051001', '', '1f3xsoUaVmuvI', '3fHHFjFCDY7Yw', 4);
INSERT INTO `peg_user` VALUES (80, '196106241985121001', '', '65GKJt.A8mHwg', '099.ANGOfSLOI', 4);
INSERT INTO `peg_user` VALUES (81, '195502151983031002', '', '04GwVpMO00A0E', 'dbXvQ31hLwVu6', 4);
INSERT INTO `peg_user` VALUES (82, '195811191986031001', '', 'e5q9hdMrSaB.Q', 'bcjbEYLtZrIr.', 4);
INSERT INTO `peg_user` VALUES (83, '195607121981031003', '', '88Pa6CfZvDCSw', 'f26QE9k/3g1FA', 4);
INSERT INTO `peg_user` VALUES (84, '197407252001121001', '', '78Zfeiezznd9w', 'cb5fQUIaHv5qI', 4);
INSERT INTO `peg_user` VALUES (85, '196103041955031001', '', '4f9xy2rEKLl2M', '3bI16Ui1wWdCU', 4);
INSERT INTO `peg_user` VALUES (86, '197107011998032002', '', '12tFYv4hiCx.Y', 'bccDcusFbAS6E', 4);
INSERT INTO `peg_user` VALUES (87, '19730504200031002', '', '94WU0kmdO6W62', '4aH/64pr5ulfQ', 4);
INSERT INTO `peg_user` VALUES (88, '150258880', '', '5dJDZ0cUU19qw', '718PEJCJnCd6c', 4);
INSERT INTO `peg_user` VALUES (89, '196908252000031001', '', '527S6qlUWEqaU', '26PNPSXgeYUtA', 4);
INSERT INTO `peg_user` VALUES (90, '150282979', '', '1coH86haatHYc', '00GM5by2jvS5o', 4);
INSERT INTO `peg_user` VALUES (91, '197110131999032001', '', '79kmTh0PMLGW6', '86CQMVoW.aZMw', 4);
INSERT INTO `peg_user` VALUES (92, '196606161997031002', '', '103FGaF10RDgY', '59P3JaJc3SLIk', 4);
INSERT INTO `peg_user` VALUES (93, '197512012005011005', '', 'd83Z25GklZU/k', '75iwbYU91dct2', 4);
INSERT INTO `peg_user` VALUES (94, '197312152005011002', '', '69P322PwuY2dM', '0bjM/D8KPAeJo', 4);
INSERT INTO `peg_user` VALUES (95, '197807152003121007', '', '2fhD4dJC7IWyk', 'f6TjCjGAUgjlI', 4);
INSERT INTO `peg_user` VALUES (96, '195903191979121001', '', 'c8r8YG8S0/c1w', '22m7ewr7JE.l2', 4);
INSERT INTO `peg_user` VALUES (97, '198110132008011006', '', 'c6lKBEuSuYPjw', 'a32P8giq8quMA', 4);
INSERT INTO `peg_user` VALUES (98, '197509032007011016', '', '42qcpG0MGgGMA', '98RB1QUaBEEfU', 4);
INSERT INTO `peg_user` VALUES (99, '197705302007011008', '', '68p.UejwCJL1U', '7b71UsYBuFUJw', 4);
INSERT INTO `peg_user` VALUES (100, '150411184', '', 'e9Pd3dGvkRu3A', '96B2JAIk441mc', 4);
INSERT INTO `peg_user` VALUES (101, '197606262009011013', '', '70iRzemLjZKOs', '69Jagvk3mijN2', 4);
INSERT INTO `peg_user` VALUES (102, '194209161962101001', '', 'd9q2eeSjIWJxc', '40k7h7QAeai4Y', 4);
INSERT INTO `peg_user` VALUES (103, '150077575', '', 'e4fOlYdESu/2k', '8e5.favjCt/ag', 4);
INSERT INTO `peg_user` VALUES (104, '197007041996032002', '', '63kb11smFX1ss', 'e42c7HkKvVSNY', 4);
INSERT INTO `peg_user` VALUES (105, '195003061976031001', '', '195.MGZWRQ7U6', '16YNra3pcKN1w', 4);
INSERT INTO `peg_user` VALUES (106, '150295489', '', '5dquQZ9/gPWu2', '79.xkc9.NDgow', 4);
INSERT INTO `peg_user` VALUES (107, '196911211994031001', '', '65u9z3h6g/Als', '20Di2MZ.1nWq6', 4);
INSERT INTO `peg_user` VALUES (108, '195510151979031002', '', '9cnis27ywGfUs', '593jVvOzafrQc', 4);
INSERT INTO `peg_user` VALUES (109, '197302151999031002', '', 'b3IiRCuQ6u91s', '00eale.uOxNb.', 4);
INSERT INTO `peg_user` VALUES (110, '196612231999031002', '', '331CGtvJqAigo', '20nqexMKhQAug', 4);
INSERT INTO `peg_user` VALUES (112, '196509081995031001', '', '65sSNu9Vo9.Lc', 'e7xmH7AE1ZclA', 4);
INSERT INTO `peg_user` VALUES (113, '19470308197171001', '', 'f6daFlS6/ae3k', 'bfgushso/RL2Q', 4);
INSERT INTO `peg_user` VALUES (114, '196111011993031002', '', '88nQHyp6qNgsw', '4b1lh9dSAlh8k', 4);
INSERT INTO `peg_user` VALUES (115, '197111202006042005', '', 'edth81/Y2d4YE', '66qCY04oVs5jI', 4);
INSERT INTO `peg_user` VALUES (116, '197202032007011034', '', 'b0MSpw1rj8dKA', 'ffpop87TOSABc', 4);
INSERT INTO `peg_user` VALUES (117, '150411276', '', '02jbFj5YajWSo', 'b8Ns9vi6iiC0s', 4);
INSERT INTO `peg_user` VALUES (118, '8828', '', '0c/JSTge54fVo', 'c2fWfYWko1htY', 4);
INSERT INTO `peg_user` VALUES (119, '828', '', 'c2KTPPdKnpJWI', '28oelt7F0LMH2', 4);
INSERT INTO `peg_user` VALUES (120, '196003181991031001', '', '45Jq36BR.d7Pc', '41Ve/1gyl7Z2E', 4);
INSERT INTO `peg_user` VALUES (121, '197312081997031001', '', '08aripJt3WGqY', '76fm3oKC2IQoY', 4);
INSERT INTO `peg_user` VALUES (122, '197210312007011014', '', '56YZgx0QibZsw', '4euZ9CLDjU5pM', 4);
INSERT INTO `peg_user` VALUES (123, '197110032007011015', '', 'casl/ud/DCe4E', 'f9q8GsqMU4ytQ', 4);
INSERT INTO `peg_user` VALUES (124, '150411145', '', '57zYxY2i2zXAI', '6d5VQLrvMoFbw', 4);
INSERT INTO `peg_user` VALUES (127, '', '', 'd4rBwtAKocqwA', '6899p0yjzyEs2', 4);
INSERT INTO `peg_user` VALUES (128, '121315', '', 'c5JkhGlywoaEw', '02X8OwaNgl7I6', 4);
INSERT INTO `peg_user` VALUES (129, '121363', '', '27iAk0roHTY9A', 'dc2sk5M.h2RlA', 4);
