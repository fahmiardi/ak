-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 23, 2010 at 12:49 PM
-- Server version: 5.0.21
-- PHP Version: 5.1.4
-- 
-- Database: `db_angkakredit`
-- 
CREATE DATABASE `db_angkakredit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_angkakredit`;

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_rules`
-- 

CREATE TABLE `ak_rules` (
  `rule_id` int(11) NOT NULL auto_increment,
  `rule_name` text NOT NULL,
  `rule_group` varchar(50) NOT NULL,
  PRIMARY KEY  (`rule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ak_rules`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ak_term_taxonomy`
-- 

CREATE TABLE `ak_term_taxonomy` (
  `term_taxonomy_id` bigint(20) NOT NULL auto_increment,
  `taxonomy` varchar(20) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `term_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `value` float NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY  (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

-- 
-- Dumping data for table `ak_term_taxonomy`
-- 

INSERT INTO `ak_term_taxonomy` VALUES (1, 'angkakredit', 0, 1, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (2, 'angkakredit', 0, 2, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (3, 'angkakredit', 0, 3, 0, 0, 9);
INSERT INTO `ak_term_taxonomy` VALUES (5, 'angkakredit', 1, 5, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (6, 'angkakredit', 1, 6, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (7, 'angkakredit', 1, 7, 0, 0, 5);
INSERT INTO `ak_term_taxonomy` VALUES (8, 'angkakredit', 5, 8, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (9, 'angkakredit', 5, 9, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (10, 'angkakredit', 5, 10, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (11, 'angkakredit', 6, 11, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (12, 'angkakredit', 6, 12, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (13, 'angkakredit', 6, 13, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (14, 'angkakredit', 7, 14, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (15, 'angkakredit', 7, 15, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (16, 'angkakredit', 7, 16, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (17, 'angkakredit', 7, 17, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (18, 'angkakredit', 7, 18, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (19, 'angkakredit', 7, 19, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (20, 'angkakredit', 2, 20, 0, 0, 12);
INSERT INTO `ak_term_taxonomy` VALUES (21, 'angkakredit', 2, 21, 0, 0, 7);
INSERT INTO `ak_term_taxonomy` VALUES (22, 'angkakredit', 2, 22, 0, 0, 5);
INSERT INTO `ak_term_taxonomy` VALUES (23, 'angkakredit', 20, 23, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (24, 'angkakredit', 20, 24, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (25, 'angkakredit', 20, 25, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (26, 'angkakredit', 20, 26, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (27, 'angkakredit', 20, 27, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (28, 'angkakredit', 20, 28, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (29, 'angkakredit', 20, 29, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (30, 'angkakredit', 20, 30, 0, 0, 9);
INSERT INTO `ak_term_taxonomy` VALUES (31, 'angkakredit', 20, 31, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (32, 'angkakredit', 20, 32, 0, 0, 5);
INSERT INTO `ak_term_taxonomy` VALUES (33, 'angkakredit', 20, 33, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (34, 'angkakredit', 20, 34, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (35, 'angkakredit', 21, 35, 0, 0, 5);
INSERT INTO `ak_term_taxonomy` VALUES (36, 'angkakredit', 21, 36, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (37, 'angkakredit', 21, 37, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (38, 'angkakredit', 21, 38, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (39, 'angkakredit', 21, 39, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (40, 'angkakredit', 22, 40, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (41, 'angkakredit', 22, 41, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (42, 'angkakredit', 22, 42, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (43, 'angkakredit', 22, 43, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (44, 'angkakredit', 22, 44, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (45, 'angkakredit', 3, 45, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (46, 'angkakredit', 3, 46, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (47, 'angkakredit', 3, 47, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (48, 'angkakredit', 3, 48, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (49, 'angkakredit', 3, 49, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (50, 'angkakredit', 3, 50, 0, 0, 4);
INSERT INTO `ak_term_taxonomy` VALUES (51, 'angkakredit', 3, 51, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (52, 'angkakredit', 3, 52, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (53, 'angkakredit', 3, 53, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (54, 'angkakredit', 23, 54, 0, 0, 1);
INSERT INTO `ak_term_taxonomy` VALUES (56, 'angkakredit', 26, 56, 0, 0, 4);
INSERT INTO `ak_term_taxonomy` VALUES (57, 'angkakredit', 26, 57, 0, 0, 5);
INSERT INTO `ak_term_taxonomy` VALUES (58, 'angkakredit', 27, 58, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (59, 'angkakredit', 27, 59, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (60, 'angkakredit', 30, 60, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (61, 'angkakredit', 68, 61, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (62, 'angkakredit', 68, 62, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (63, 'angkakredit', 68, 63, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (64, 'angkakredit', 68, 64, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (65, 'angkakredit', 68, 65, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (66, 'angkakredit', 68, 66, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (67, 'angkakredit', 68, 67, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (68, 'angkakredit', 30, 68, 0, 0, 7);
INSERT INTO `ak_term_taxonomy` VALUES (69, 'angkakredit', 25, 69, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (70, 'angkakredit', 25, 70, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (71, 'angkakredit', 25, 71, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (72, 'angkakredit', 32, 72, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (73, 'angkakredit', 32, 73, 0, 0, 4);
INSERT INTO `ak_term_taxonomy` VALUES (74, 'angkakredit', 32, 74, 0, 0, 7);
INSERT INTO `ak_term_taxonomy` VALUES (75, 'angkakredit', 32, 75, 0, 0, 4);
INSERT INTO `ak_term_taxonomy` VALUES (76, 'angkakredit', 32, 76, 0, 0, 6);
INSERT INTO `ak_term_taxonomy` VALUES (77, 'angkakredit', 33, 77, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (78, 'angkakredit', 33, 78, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (79, 'angkakredit', 34, 79, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (80, 'angkakredit', 34, 80, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (81, 'angkakredit', 54, 81, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (82, 'angkakredit', 23, 82, 0, 0, 1);
INSERT INTO `ak_term_taxonomy` VALUES (83, 'angkakredit', 23, 83, 0, 0, 1);
INSERT INTO `ak_term_taxonomy` VALUES (84, 'angkakredit', 23, 84, 0, 0, 1);
INSERT INTO `ak_term_taxonomy` VALUES (85, 'angkakredit', 82, 85, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (88, 'angkakredit', 56, 88, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (86, 'angkakredit', 83, 86, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (87, 'angkakredit', 84, 87, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (89, 'angkakredit', 56, 89, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (90, 'angkakredit', 56, 90, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (91, 'angkakredit', 56, 91, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (92, 'angkakredit', 57, 92, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (97, 'angkakredit', 73, 97, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (94, 'angkakredit', 57, 94, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (95, 'angkakredit', 57, 95, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (96, 'angkakredit', 57, 96, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (98, 'angkakredit', 73, 98, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (99, 'angkakredit', 73, 99, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (100, 'angkakredit', 73, 100, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (101, 'angkakredit', 74, 101, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (102, 'angkakredit', 74, 102, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (103, 'angkakredit', 74, 103, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (104, 'angkakredit', 74, 104, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (105, 'angkakredit', 74, 105, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (106, 'angkakredit', 74, 106, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (107, 'angkakredit', 74, 107, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (108, 'angkakredit', 75, 108, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (109, 'angkakredit', 75, 109, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (110, 'angkakredit', 75, 110, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (111, 'angkakredit', 75, 111, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (112, 'angkakredit', 76, 112, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (113, 'angkakredit', 76, 113, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (114, 'angkakredit', 76, 114, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (115, 'angkakredit', 76, 115, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (116, 'angkakredit', 76, 116, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (117, 'angkakredit', 76, 117, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (118, 'angkakredit', 35, 118, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (119, 'angkakredit', 35, 119, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (120, 'angkakredit', 35, 120, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (121, 'angkakredit', 119, 121, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (124, 'angkakredit', 118, 124, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (122, 'angkakredit', 119, 122, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (123, 'angkakredit', 119, 123, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (125, 'angkakredit', 118, 125, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (126, 'angkakredit', 120, 126, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (127, 'angkakredit', 126, 127, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (128, 'angkakredit', 126, 128, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (129, 'angkakredit', 120, 129, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (130, 'angkakredit', 129, 130, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (131, 'angkakredit', 129, 131, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (132, 'angkakredit', 35, 132, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (133, 'angkakredit', 35, 133, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (134, 'angkakredit', 38, 134, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (135, 'angkakredit', 38, 135, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (136, 'angkakredit', 39, 136, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (137, 'angkakredit', 39, 137, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (138, 'angkakredit', 21, 138, 0, 0, 5);
INSERT INTO `ak_term_taxonomy` VALUES (139, 'angkakredit', 138, 139, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (140, 'angkakredit', 139, 140, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (141, 'angkakredit', 139, 141, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (142, 'angkakredit', 139, 142, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (143, 'angkakredit', 39, 143, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (144, 'angkakredit', 138, 144, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (145, 'angkakredit', 144, 145, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (146, 'angkakredit', 144, 146, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (147, 'angkakredit', 144, 147, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (148, 'angkakredit', 138, 148, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (149, 'angkakredit', 148, 149, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (150, 'angkakredit', 148, 150, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (151, 'angkakredit', 148, 151, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (152, 'angkakredit', 138, 152, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (153, 'angkakredit', 152, 153, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (154, 'angkakredit', 152, 154, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (155, 'angkakredit', 152, 155, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (156, 'angkakredit', 138, 156, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (157, 'angkakredit', 156, 157, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (158, 'angkakredit', 156, 158, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (159, 'angkakredit', 156, 159, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (160, 'angkakredit', 21, 160, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (161, 'angkakredit', 160, 161, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (162, 'angkakredit', 160, 162, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (163, 'angkakredit', 160, 163, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (164, 'angkakredit', 42, 164, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (165, 'angkakredit', 42, 165, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (166, 'angkakredit', 164, 166, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (167, 'angkakredit', 164, 167, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (168, 'angkakredit', 166, 168, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (169, 'angkakredit', 166, 169, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (170, 'angkakredit', 166, 170, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (171, 'angkakredit', 167, 171, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (172, 'angkakredit', 167, 172, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (173, 'angkakredit', 167, 173, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (174, 'angkakredit', 43, 174, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (175, 'angkakredit', 43, 175, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (176, 'angkakredit', 43, 176, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (177, 'angkakredit', 45, 177, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (178, 'angkakredit', 45, 178, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (179, 'angkakredit', 45, 179, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (180, 'angkakredit', 183, 180, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (181, 'angkakredit', 183, 181, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (182, 'angkakredit', 183, 182, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (183, 'angkakredit', 46, 183, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (184, 'angkakredit', 46, 184, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (185, 'angkakredit', 184, 185, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (186, 'angkakredit', 184, 186, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (187, 'angkakredit', 184, 187, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (188, 'angkakredit', 47, 188, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (189, 'angkakredit', 47, 189, 0, 0, 3);
INSERT INTO `ak_term_taxonomy` VALUES (190, 'angkakredit', 188, 190, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (191, 'angkakredit', 188, 191, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (192, 'angkakredit', 188, 192, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (193, 'angkakredit', 189, 193, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (194, 'angkakredit', 189, 194, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (195, 'angkakredit', 189, 195, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (196, 'angkakredit', 49, 196, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (197, 'angkakredit', 49, 197, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (198, 'angkakredit', 50, 198, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (199, 'angkakredit', 50, 199, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (200, 'angkakredit', 50, 200, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (201, 'angkakredit', 50, 201, 0, 0, 2);
INSERT INTO `ak_term_taxonomy` VALUES (202, 'angkakredit', 198, 202, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (203, 'angkakredit', 198, 203, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (204, 'angkakredit', 199, 204, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (205, 'angkakredit', 199, 205, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (206, 'angkakredit', 200, 206, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (207, 'angkakredit', 200, 207, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (208, 'angkakredit', 201, 208, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (209, 'angkakredit', 201, 209, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (210, 'angkakredit', 51, 210, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (211, 'angkakredit', 51, 211, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (212, 'angkakredit', 51, 212, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (213, 'angkakredit', 52, 213, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (214, 'angkakredit', 52, 214, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (215, 'angkakredit', 52, 215, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (216, 'angkakredit', 53, 216, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (217, 'angkakredit', 53, 217, 0, 0, 0);
INSERT INTO `ak_term_taxonomy` VALUES (218, 'angkakredit', 53, 218, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_terms`
-- 

CREATE TABLE `ak_terms` (
  `term_id` int(11) NOT NULL auto_increment,
  `term_name` text NOT NULL,
  `term_group` varchar(50) NOT NULL,
  PRIMARY KEY  (`term_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

-- 
-- Dumping data for table `ak_terms`
-- 

INSERT INTO `ak_terms` VALUES (1, 'Unsur Utama Pendidikan', 'kategori');
INSERT INTO `ak_terms` VALUES (2, 'Unsur Utama Tridharma Perguruan Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (3, 'Unsur Penunjang', 'kategori');
INSERT INTO `ak_terms` VALUES (5, 'Mengikuti Pendidikan Sekolah dan Memperoleh Gelar/Sebutan/Ijazah', 'kategori');
INSERT INTO `ak_terms` VALUES (6, 'Mengikuti Pendidikan Sekolah dan Memperoleh Gelar/Sebutan/Ijazah Tambahan yang Setingkat atau Lebih Tinggi di Luar Bidang Ilmunya', 'kategori');
INSERT INTO `ak_terms` VALUES (7, 'Mengikuti Pendidikan dan Pelatihan Fungsional Dosen dan Memperoleh Surat Tnda Tamat Pendidikan dan Pelatihan (STTPP)', 'kategori');
INSERT INTO `ak_terms` VALUES (8, 'Doktor', 'kategori');
INSERT INTO `ak_terms` VALUES (9, 'Magister', 'kategori');
INSERT INTO `ak_terms` VALUES (10, 'Sarjana/Diploma IV', 'kategori');
INSERT INTO `ak_terms` VALUES (11, 'Doktor/Spesialis II', 'kategori');
INSERT INTO `ak_terms` VALUES (12, 'Magister/Spesialis II', 'kategori');
INSERT INTO `ak_terms` VALUES (13, 'Sarjana/Diploma IV', 'kategori');
INSERT INTO `ak_terms` VALUES (14, 'Lamanya > 900 Jam', 'kategori');
INSERT INTO `ak_terms` VALUES (15, 'Lamanya 641 - 960 Jam', 'kategori');
INSERT INTO `ak_terms` VALUES (16, 'Lamanya 481 - 640 Jam', 'kategori');
INSERT INTO `ak_terms` VALUES (17, 'Lamanya 161 - 480 Jam', 'kategori');
INSERT INTO `ak_terms` VALUES (18, 'Lamanya 81 - 160 Jam', 'kategori');
INSERT INTO `ak_terms` VALUES (19, 'Lamanya 30 - 80 Jam', 'kategori');
INSERT INTO `ak_terms` VALUES (20, 'Melaksanakan Pendidikan dan Pengajaran', 'kategori');
INSERT INTO `ak_terms` VALUES (21, 'Melaksanakan Penelitian', 'kategori');
INSERT INTO `ak_terms` VALUES (22, 'Melaksanakan Pengabdian kepada Masyarakat', 'kategori');
INSERT INTO `ak_terms` VALUES (23, 'Melaksanakan Perkuliahan/Tutorial dan Membimbing, Menguji serta Menyelenggarakan Pendidikan di Laboratorium, Praktik Keguruan, Bengkel/Studio/Kebun Percobaan/Teknologi Pengajaran dan Praktik Lapangan', 'kategori');
INSERT INTO `ak_terms` VALUES (24, 'Membimbing Seminar Mahasiswa', 'kategori');
INSERT INTO `ak_terms` VALUES (25, 'Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan', 'kategori');
INSERT INTO `ak_terms` VALUES (26, 'Membimbing dan Ikut Membimbing Disertasi, Tesis, Skripsi, dan Laporan Akhir Studi', 'kategori');
INSERT INTO `ak_terms` VALUES (27, 'Bertugas sebagai Penguji pada Ujian Akhir', 'kategori');
INSERT INTO `ak_terms` VALUES (28, 'Membina Kegiatan Mahasiswa di Bidang Akademik dan Kemahasiswaan', 'kategori');
INSERT INTO `ak_terms` VALUES (29, 'Mengembangkan Program Studi', 'kategori');
INSERT INTO `ak_terms` VALUES (30, 'Mengembangkan Bahan Pengajaran', 'kategori');
INSERT INTO `ak_terms` VALUES (31, 'Menyampaikan Orasi Ilmiah', 'kategori');
INSERT INTO `ak_terms` VALUES (32, 'Menduduki Jabatan Pimpinan Perguruan Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (33, 'Membimbing Dosen yang Lebih Rendah Jabatan Fungsionalnya', 'kategori');
INSERT INTO `ak_terms` VALUES (34, 'Melaksanakan Kegiatan Datasering dan Pencangkokan', 'kategori');
INSERT INTO `ak_terms` VALUES (35, 'Menghasilkan Karya Ilmiah', 'kategori');
INSERT INTO `ak_terms` VALUES (36, 'Menerjemahkan/Menyadur Buku Ilmiah', 'kategori');
INSERT INTO `ak_terms` VALUES (37, 'Mengedit/Menyunting Karya Ilmiah', 'kategori');
INSERT INTO `ak_terms` VALUES (38, 'Membuat Rancangan dan Karya Teknologi yang Dipatenkan', 'kategori');
INSERT INTO `ak_terms` VALUES (39, 'Membuat Rancangan dan Karya Teknologi yang Tidak Dipatenkan', 'kategori');
INSERT INTO `ak_terms` VALUES (138, 'Membuat Rancangan dan Karya Seni Monumental/Seni Pertunjukan', 'kategori');
INSERT INTO `ak_terms` VALUES (40, 'Menduduki Jabatan Pimpinan pada Lembaga Pemerintahan', 'kategori');
INSERT INTO `ak_terms` VALUES (41, 'Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian yang Dimanfaatkan oleh Masyarakat', 'kategori');
INSERT INTO `ak_terms` VALUES (42, 'Memberi Latihan, Penyuluhan/Penataran/Ceramah kepada Masyarakat, baik Sesuai dengan Bidang Ilmunya maupun di Luar Bidang Ilmunya, baik kepada Masyarakat Umum maupun Masyarakat Kampus (Dosen, Mahasiswa, dan Tenaga Non-Dosen)', 'kategori');
INSERT INTO `ak_terms` VALUES (43, 'Memberi Pelayanan kepada Masyarakat atau Kegiatan Lain yang Menunjang Pelaksanaan Tugas Umum Pemerintahan dan Pembangunan', 'kategori');
INSERT INTO `ak_terms` VALUES (44, 'Membuat/Menulis Karya Pengabdian pada Masyarakat', 'kategori');
INSERT INTO `ak_terms` VALUES (45, 'Menjadi Anggota dalam Suatu Panitia/Badan pada Perguruan Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (46, 'Menjadi Anggota Panitia/Badan pada Lembaga Pemerintah', 'kategori');
INSERT INTO `ak_terms` VALUES (47, 'Menjadi Anggota Profesi', 'kategori');
INSERT INTO `ak_terms` VALUES (48, 'Mewakili Perguruan Tinggi/Lembaga Pemerintah Duduk dalam Panitia Antar Lembaga', 'kategori');
INSERT INTO `ak_terms` VALUES (49, 'Menjadi Anggota Delegasi Nasional ke Pertemuan Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (50, 'Berperan Aktif dalam Pertemuan Ilmiah', 'kategori');
INSERT INTO `ak_terms` VALUES (51, 'Mendapat Tanda Jasa/Penghargaan seperti Satya Lencana Karyasatya, Bintang Jasa, Bintang Mahaputra, Hadiah Pendidikan, Hadiah Ilmu Pengetahuan, Hadiah Pengabdian', 'kategori');
INSERT INTO `ak_terms` VALUES (52, 'Menulis Buku Pelajaran SLTA ke Bawah yang Diterbitkan dan Diedarkan secara Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (53, 'Mempunyai Prestasi di Bidang Olahraga/Humaniora', 'kategori');
INSERT INTO `ak_terms` VALUES (54, 'Asisten Ahli', 'kategori');
INSERT INTO `ak_terms` VALUES (88, 'Disertasi', 'kategori');
INSERT INTO `ak_terms` VALUES (56, 'Pembimbing Utama', 'kategori');
INSERT INTO `ak_terms` VALUES (57, 'Pembimbing Pendamping/Pembantu', 'kategori');
INSERT INTO `ak_terms` VALUES (58, 'Ketua Penguji', 'kategori');
INSERT INTO `ak_terms` VALUES (59, 'Anggota Penguji', 'kategori');
INSERT INTO `ak_terms` VALUES (60, 'Buku Ajar', 'kategori');
INSERT INTO `ak_terms` VALUES (61, 'Diktat', 'kategori');
INSERT INTO `ak_terms` VALUES (62, 'Modul', 'kategori');
INSERT INTO `ak_terms` VALUES (63, 'Petunjuk Praktikum', 'kategori');
INSERT INTO `ak_terms` VALUES (64, 'Model', 'kategori');
INSERT INTO `ak_terms` VALUES (65, 'Alat Bantu', 'kategori');
INSERT INTO `ak_terms` VALUES (66, 'Audio Visual', 'kategori');
INSERT INTO `ak_terms` VALUES (67, 'Naskah Tutorial', 'kategori');
INSERT INTO `ak_terms` VALUES (68, 'Diktat, Modul, Petunjuk Praktikum, Model, Alat Bantu, Audio Visual, Naskah Tutorial', 'kategori');
INSERT INTO `ak_terms` VALUES (69, 'Membimbing KKN', 'kategori');
INSERT INTO `ak_terms` VALUES (70, 'Membimbing Praktik Kerja Nyata', 'kategori');
INSERT INTO `ak_terms` VALUES (71, 'Membimbing Praktik Kerja Lapangan', 'kategori');
INSERT INTO `ak_terms` VALUES (72, 'Rektor', 'kategori');
INSERT INTO `ak_terms` VALUES (73, 'Pembantu Rektor, Ketua Lembaga, Dekan Fakultas, Direktur Pascasarjana', 'kategori');
INSERT INTO `ak_terms` VALUES (74, 'Pembantu Dekan, Ketua Sekolah Tinggi, Asdir PPs, Direktur Politeknik, Kapus Penelitian pada Univ./Inst., Ketua Senat Fakultas, Sekretaris Senat Fakultas', 'kategori');
INSERT INTO `ak_terms` VALUES (75, 'Direktur Akademi, Pembantu Ketua Sekolah Tinggi, Kapus Penelitian dan Pengabdian pada Masyarakat di Lingkungan Sekolah Tinggi, Pembantu Direktur Politeknik', 'kategori');
INSERT INTO `ak_terms` VALUES (76, 'Pembantu Direktur Akademi, Ketua Jurusan/Bagian, Ketua/Sekretaris Program Studi, Ketua Unit Penelitian dan Pengabdian kepada Masyarakat', 'kategori');
INSERT INTO `ak_terms` VALUES (77, 'Pembimbing Pencangkokan', 'kategori');
INSERT INTO `ak_terms` VALUES (78, 'Reguler', 'kategori');
INSERT INTO `ak_terms` VALUES (79, 'Datasering', 'kategori');
INSERT INTO `ak_terms` VALUES (80, 'Pencangkokan', 'kategori');
INSERT INTO `ak_terms` VALUES (81, 'Mengajar', 'kategori');
INSERT INTO `ak_terms` VALUES (82, 'Lektor', 'kategori');
INSERT INTO `ak_terms` VALUES (83, 'Lektor Kepala', 'kategori');
INSERT INTO `ak_terms` VALUES (84, 'Guru Besar', 'kategori');
INSERT INTO `ak_terms` VALUES (85, 'Mengajar', 'kategori');
INSERT INTO `ak_terms` VALUES (86, 'Mengajar', 'kategori');
INSERT INTO `ak_terms` VALUES (87, 'Mengajar', 'kategori');
INSERT INTO `ak_terms` VALUES (89, 'Tesis', 'kategori');
INSERT INTO `ak_terms` VALUES (90, 'Skripsi', 'kategori');
INSERT INTO `ak_terms` VALUES (91, 'Laporan Akhir Studi', 'kategori');
INSERT INTO `ak_terms` VALUES (92, 'Disertasi', 'kategori');
INSERT INTO `ak_terms` VALUES (97, 'Pembantu Rektor ', 'kategori');
INSERT INTO `ak_terms` VALUES (94, 'Tesis', 'kategori');
INSERT INTO `ak_terms` VALUES (95, 'Skripsi', 'kategori');
INSERT INTO `ak_terms` VALUES (96, 'Laporan Akhir Studi', 'kategori');
INSERT INTO `ak_terms` VALUES (98, 'Ketua Lembaga', 'kategori');
INSERT INTO `ak_terms` VALUES (99, 'Dekan Fakultas', 'kategori');
INSERT INTO `ak_terms` VALUES (100, 'Direktur Pascasarjana', 'kategori');
INSERT INTO `ak_terms` VALUES (101, 'Pembantu Dekan', 'kategori');
INSERT INTO `ak_terms` VALUES (102, 'Ketua Sekolah Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (103, 'Asdir PPs', 'kategori');
INSERT INTO `ak_terms` VALUES (104, 'Direktur Politeknik', 'kategori');
INSERT INTO `ak_terms` VALUES (105, 'Kapus Penelitian pada Univ./Inst.', 'kategori');
INSERT INTO `ak_terms` VALUES (106, 'Ketua Senat Fakultas', 'kategori');
INSERT INTO `ak_terms` VALUES (107, 'Sekretaris Senat Fakultas', 'kategori');
INSERT INTO `ak_terms` VALUES (108, 'Direktur Akademi', 'kategori');
INSERT INTO `ak_terms` VALUES (109, 'Pembantu Ketua Sekolah Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (110, 'Kapus Penelitian dan Pengabdian pada Masyarakat di Lingkungan Sekolah Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (111, 'Pembantu Direktur Politeknik', 'kategori');
INSERT INTO `ak_terms` VALUES (112, 'Pembantu Direktur Akademi', 'kategori');
INSERT INTO `ak_terms` VALUES (113, 'Ketua Jurusan', 'kategori');
INSERT INTO `ak_terms` VALUES (114, 'Ketua Bagian', 'kategori');
INSERT INTO `ak_terms` VALUES (115, 'Ketua Program Studi', 'kategori');
INSERT INTO `ak_terms` VALUES (116, 'Sekretaris Program Studi', 'kategori');
INSERT INTO `ak_terms` VALUES (117, 'Ketua Unit Penelitian dan Pengabdian kepada Masyarakat', 'kategori');
INSERT INTO `ak_terms` VALUES (118, 'Hasil Penelitian atau Hasil Pemikiran yang Dipublikasikan dalam Bentuk', 'kategori');
INSERT INTO `ak_terms` VALUES (119, 'Hasil Penelitian atau Hasil Pemikiran yang Dipublikasikan dalam Majalah Ilmiah', 'kategori');
INSERT INTO `ak_terms` VALUES (120, 'Hasil Penelitian atau Hasil Pemikiran yang Dipublikasikan melalui Seminar', 'kategori');
INSERT INTO `ak_terms` VALUES (121, 'Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (122, 'Nasional Terakreditasi', 'kategori');
INSERT INTO `ak_terms` VALUES (123, 'Nasional Tidak Terakreditasi', 'kategori');
INSERT INTO `ak_terms` VALUES (124, 'Monograf', 'kategori');
INSERT INTO `ak_terms` VALUES (125, 'Buku Referensi', 'kategori');
INSERT INTO `ak_terms` VALUES (126, 'Disajikan', 'kategori');
INSERT INTO `ak_terms` VALUES (127, 'Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (128, 'Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (129, 'Poster', 'kategori');
INSERT INTO `ak_terms` VALUES (130, 'Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (131, 'Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (132, 'Hasil Penelitian yang Dipublikasikan dalam Koran/Majalah Umum sebagai Suatu Tulisan Ilmiah Populer', 'kategori');
INSERT INTO `ak_terms` VALUES (133, 'Hasil Penelitian atau Hasil Pemikiran yang Tidak Dipublikasikan (Tersimpan di Perpustakaan Perguruan Tinggi)', 'kategori');
INSERT INTO `ak_terms` VALUES (134, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (135, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (136, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (137, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (139, 'Rancangan dan Karya Seni Monumental', 'kategori');
INSERT INTO `ak_terms` VALUES (140, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (141, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (142, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (143, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (144, 'Rancangan dan Karya Seni Rupa', 'kategori');
INSERT INTO `ak_terms` VALUES (145, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (146, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (147, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (148, 'Rancangan dan Karya Seni Kriya', 'kategori');
INSERT INTO `ak_terms` VALUES (149, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (150, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (151, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (152, 'Rancangan dan Karya Seni Pertunjukan', 'kategori');
INSERT INTO `ak_terms` VALUES (153, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (154, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (155, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (156, 'Karya Desain', 'kategori');
INSERT INTO `ak_terms` VALUES (157, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (158, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (159, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (160, 'Karya Sastra', 'kategori');
INSERT INTO `ak_terms` VALUES (161, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (162, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (163, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (164, 'Terjadwal/Terprogram', 'kategori');
INSERT INTO `ak_terms` VALUES (165, 'Insidentil', 'kategori');
INSERT INTO `ak_terms` VALUES (166, 'Lebih dari Satu Semester', 'kategori');
INSERT INTO `ak_terms` VALUES (167, 'Kurang dari Satu Semester', 'kategori');
INSERT INTO `ak_terms` VALUES (168, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (169, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (170, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (171, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (172, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (173, 'Tingkat Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (174, 'Berdasarkan Bidang Keahliannya', 'kategori');
INSERT INTO `ak_terms` VALUES (175, 'Berdasarkan Penugasan Lembaga Perguruan Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (176, 'Berdasarkan Fungsi/Jabatan', 'kategori');
INSERT INTO `ak_terms` VALUES (177, 'Ketua', 'kategori');
INSERT INTO `ak_terms` VALUES (178, 'Wakil', 'kategori');
INSERT INTO `ak_terms` VALUES (179, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (180, 'Ketua', 'kategori');
INSERT INTO `ak_terms` VALUES (181, 'Wakil', 'kategori');
INSERT INTO `ak_terms` VALUES (182, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (183, 'Panitia Pusat', 'kategori');
INSERT INTO `ak_terms` VALUES (184, 'Panitia Daerah', 'kategori');
INSERT INTO `ak_terms` VALUES (185, 'Ketua', 'kategori');
INSERT INTO `ak_terms` VALUES (186, 'Wakil', 'kategori');
INSERT INTO `ak_terms` VALUES (187, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (188, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (189, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (190, 'Pengurus', 'kategori');
INSERT INTO `ak_terms` VALUES (191, 'Anggota atas Permintaan', 'kategori');
INSERT INTO `ak_terms` VALUES (192, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (193, 'Pengurus', 'kategori');
INSERT INTO `ak_terms` VALUES (194, 'Anggota atas Permintaan', 'kategori');
INSERT INTO `ak_terms` VALUES (195, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (196, 'Ketua Delegasi', 'kategori');
INSERT INTO `ak_terms` VALUES (197, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (198, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (199, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (200, 'Tingkat Regional', 'kategori');
INSERT INTO `ak_terms` VALUES (201, 'Di Lingkungan Perguruan Tinggi', 'kategori');
INSERT INTO `ak_terms` VALUES (202, 'Ketua', 'kategori');
INSERT INTO `ak_terms` VALUES (203, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (204, 'Ketua', 'kategori');
INSERT INTO `ak_terms` VALUES (205, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (206, 'Ketua', 'kategori');
INSERT INTO `ak_terms` VALUES (207, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (208, 'Ketua', 'kategori');
INSERT INTO `ak_terms` VALUES (209, 'Anggota', 'kategori');
INSERT INTO `ak_terms` VALUES (210, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (211, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (212, 'Tingkat Daerah/Lokal', 'kategori');
INSERT INTO `ak_terms` VALUES (213, 'Buku SMTA atau Setingkat', 'kategori');
INSERT INTO `ak_terms` VALUES (214, 'Buku SMTP atau Setingkat', 'kategori');
INSERT INTO `ak_terms` VALUES (215, 'Buku SD atau Setingkat', 'kategori');
INSERT INTO `ak_terms` VALUES (216, 'Tingkat Internasional', 'kategori');
INSERT INTO `ak_terms` VALUES (217, 'Tingkat Nasional', 'kategori');
INSERT INTO `ak_terms` VALUES (218, 'Tingkat Daerah/Lokal', 'kategori');

-- --------------------------------------------------------

-- 
-- Table structure for table `ak_tipe_kenaikan`
-- 

CREATE TABLE `ak_tipe_kenaikan` (
  `idKenaikan` int(11) NOT NULL auto_increment,
  `namaKenaikan` text NOT NULL,
  PRIMARY KEY  (`idKenaikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `ak_tipe_kenaikan`
-- 

INSERT INTO `ak_tipe_kenaikan` VALUES (1, 'Pertama Kali');
INSERT INTO `ak_tipe_kenaikan` VALUES (2, 'Reguler');
INSERT INTO `ak_tipe_kenaikan` VALUES (3, 'Lompat Jabatan');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_angkakredit`
-- 

CREATE TABLE `tbl_angkakredit` (
  `idAngkaKredit` int(11) NOT NULL auto_increment,
  `nip` varchar(13) NOT NULL,
  `kdLevel1` varchar(15) NOT NULL,
  `kdLevel2` varchar(15) NOT NULL,
  `kdLevel3` varchar(15) NOT NULL,
  `kdLevel4` varchar(15) NOT NULL,
  `currentKUM` float NOT NULL,
  `pangkatSekarang` int(11) NOT NULL,
  `idStatusValid` int(11) NOT NULL,
  PRIMARY KEY  (`idAngkaKredit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tbl_angkakredit`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_fakultas`
-- 

CREATE TABLE `tbl_fakultas` (
  `idFakultas` int(11) NOT NULL auto_increment,
  `namaFakultas` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idFakultas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `tbl_fakultas`
-- 

INSERT INTO `tbl_fakultas` VALUES (1, 'Fakultas Syari''ah dan Hukum', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_golangka`
-- 

CREATE TABLE `tbl_golangka` (
  `idGolAngka` int(11) NOT NULL auto_increment,
  `namaGolAngka` text NOT NULL,
  PRIMARY KEY  (`idGolAngka`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_golangka`
-- 

INSERT INTO `tbl_golangka` VALUES (1, 'III');
INSERT INTO `tbl_golangka` VALUES (2, 'IV');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_golhuruf`
-- 

CREATE TABLE `tbl_golhuruf` (
  `idGolHuruf` int(11) NOT NULL auto_increment,
  `namaGolHuruf` text NOT NULL,
  PRIMARY KEY  (`idGolHuruf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `tbl_golhuruf`
-- 

INSERT INTO `tbl_golhuruf` VALUES (1, 'A');
INSERT INTO `tbl_golhuruf` VALUES (2, 'B');
INSERT INTO `tbl_golhuruf` VALUES (3, 'C');
INSERT INTO `tbl_golhuruf` VALUES (4, 'D');
INSERT INTO `tbl_golhuruf` VALUES (5, 'E');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_golongan`
-- 

CREATE TABLE `tbl_golongan` (
  `idGolongan` int(11) NOT NULL auto_increment,
  `syaratKUM` float NOT NULL,
  `ranking` int(11) NOT NULL,
  `idGolAngka` int(11) NOT NULL,
  `idGolHuruf` int(11) NOT NULL,
  `idPangkat` int(11) NOT NULL,
  PRIMARY KEY  (`idGolongan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `tbl_golongan`
-- 

INSERT INTO `tbl_golongan` VALUES (1, 1050, 1, 2, 5, 1);
INSERT INTO `tbl_golongan` VALUES (2, 850, 2, 2, 4, 1);
INSERT INTO `tbl_golongan` VALUES (3, 700, 3, 2, 3, 2);
INSERT INTO `tbl_golongan` VALUES (4, 550, 4, 2, 2, 2);
INSERT INTO `tbl_golongan` VALUES (5, 400, 5, 2, 1, 2);
INSERT INTO `tbl_golongan` VALUES (6, 300, 6, 1, 4, 3);
INSERT INTO `tbl_golongan` VALUES (7, 200, 7, 1, 3, 3);
INSERT INTO `tbl_golongan` VALUES (8, 150, 8, 1, 2, 4);
INSERT INTO `tbl_golongan` VALUES (9, 0, 9, 0, 0, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_jabatan`
-- 

CREATE TABLE `tbl_jabatan` (
  `idJabatan` int(11) NOT NULL auto_increment,
  `namaJabatan` text NOT NULL,
  PRIMARY KEY  (`idJabatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_jabatan`
-- 

INSERT INTO `tbl_jabatan` VALUES (1, 'dekan');
INSERT INTO `tbl_jabatan` VALUES (2, 'pudek I');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_jurusan`
-- 

CREATE TABLE `tbl_jurusan` (
  `idJurusan` int(11) NOT NULL auto_increment,
  `namaJurusan` text NOT NULL,
  `idFakultas` int(11) NOT NULL,
  PRIMARY KEY  (`idJurusan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tbl_jurusan`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_level`
-- 

CREATE TABLE `tbl_level` (
  `idLevel` int(11) NOT NULL auto_increment,
  `namaLevel` text NOT NULL,
  PRIMARY KEY  (`idLevel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tbl_level`
-- 

INSERT INTO `tbl_level` VALUES (1, 'super admin');
INSERT INTO `tbl_level` VALUES (2, 'admin kepegawaian');
INSERT INTO `tbl_level` VALUES (3, 'dosen');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_pangkat`
-- 

CREATE TABLE `tbl_pangkat` (
  `idPangkat` int(11) NOT NULL auto_increment,
  `namaPangkat` text NOT NULL,
  `ranking` int(11) NOT NULL,
  PRIMARY KEY  (`idPangkat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `tbl_pangkat`
-- 

INSERT INTO `tbl_pangkat` VALUES (1, 'guru besar', 1);
INSERT INTO `tbl_pangkat` VALUES (2, 'lektor kepala', 2);
INSERT INTO `tbl_pangkat` VALUES (3, 'lektor', 3);
INSERT INTO `tbl_pangkat` VALUES (4, 'asisten ahli', 4);
INSERT INTO `tbl_pangkat` VALUES (5, 'tenaga pengajar', 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_paramlevel1`
-- 

CREATE TABLE `tbl_paramlevel1` (
  `idLevel1` int(11) NOT NULL auto_increment,
  `kdLevel1` int(11) NOT NULL,
  `namaLevel1` text NOT NULL,
  `kdUnsur` int(11) NOT NULL,
  PRIMARY KEY  (`idLevel1`),
  UNIQUE KEY `kdLevel1` (`kdLevel1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `tbl_paramlevel1`
-- 

INSERT INTO `tbl_paramlevel1` VALUES (1, 1, 'Mengikuti Pendidikan Sekolah dan Memperoleh Gelar/Sebutan/Ijazah', 1);
INSERT INTO `tbl_paramlevel1` VALUES (2, 2, 'Mengikuti Pendidikan Sekolah dan Memperoleh Gelar/Sebutan/Ijazah Tambahan yang Setingkat atau Lebih Tinggi di Luar Bidang Ilmunya', 1);
INSERT INTO `tbl_paramlevel1` VALUES (3, 3, 'Mengikuti Pendidikan dan Pelatihan Fungsional Dosen dan Memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP)', 1);
INSERT INTO `tbl_paramlevel1` VALUES (4, 4, 'Melaksanakan Pendidikan dan Pengajaran', 2);
INSERT INTO `tbl_paramlevel1` VALUES (5, 5, 'Melaksanakan Penelitian', 2);
INSERT INTO `tbl_paramlevel1` VALUES (6, 6, 'Melaksanakan Pengabdian kepada Masyarakat', 2);
INSERT INTO `tbl_paramlevel1` VALUES (7, 7, 'Menjadi Anggota dalam Suatu Panitia/Badan pada Perguruan Tinggi', 3);
INSERT INTO `tbl_paramlevel1` VALUES (8, 8, 'Menjadi Anggota Panitia/Badan pada Lembaga Pemerintah', 3);
INSERT INTO `tbl_paramlevel1` VALUES (9, 9, 'Menjadi Anggota Profesi', 3);
INSERT INTO `tbl_paramlevel1` VALUES (10, 10, 'Mewakili Perguruan Tinggi/Lembaga Pemerintah Duduk dalam Panitia Antar Lembaga', 3);
INSERT INTO `tbl_paramlevel1` VALUES (11, 11, 'Menjadi Anggota Delegasi Nasional ke Pertemuan Internasional', 3);
INSERT INTO `tbl_paramlevel1` VALUES (12, 12, 'Berperan Aktif dalam Pertemuan Ilmiah', 3);
INSERT INTO `tbl_paramlevel1` VALUES (13, 13, 'Mendapat Tanda Jasa/Penghargaan Antara Lain seperti Satya Lencana Karyasatya, Bintang Jasa, Bintang Mahaputra, Hadiah Pendidikan, Hadiah Ilmu Pengetahuan, Hadiah Pengabdian', 3);
INSERT INTO `tbl_paramlevel1` VALUES (14, 14, 'Menulis Buku Pelajaran SLTA ke Bawah yang Diterbitkan dan Diedarkan secara Nasional', 3);
INSERT INTO `tbl_paramlevel1` VALUES (15, 15, 'Mempunyai Profesi di Bidang Olahraga/Humaniora', 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_paramlevel2`
-- 

CREATE TABLE `tbl_paramlevel2` (
  `idLevel2` int(11) NOT NULL auto_increment,
  `kdLevel2` int(11) NOT NULL,
  `namaLevel2` text NOT NULL,
  `nilaiKUM` float NOT NULL,
  `kdLevel1` int(11) NOT NULL,
  PRIMARY KEY  (`idLevel2`),
  UNIQUE KEY `kdLevel2` (`kdLevel2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

-- 
-- Dumping data for table `tbl_paramlevel2`
-- 

INSERT INTO `tbl_paramlevel2` VALUES (1, 1, 'Doktor', 200, 1);
INSERT INTO `tbl_paramlevel2` VALUES (2, 2, 'Magister', 150, 1);
INSERT INTO `tbl_paramlevel2` VALUES (3, 3, 'Sarjana/DIV', 100, 1);
INSERT INTO `tbl_paramlevel2` VALUES (4, 4, 'Doktor/Sp. II', 15, 2);
INSERT INTO `tbl_paramlevel2` VALUES (5, 5, 'Magister/Sp. II', 10, 2);
INSERT INTO `tbl_paramlevel2` VALUES (6, 6, 'Sarjana/DIV', 5, 2);
INSERT INTO `tbl_paramlevel2` VALUES (7, 7, 'Lamanya > 900 Jam', 15, 3);
INSERT INTO `tbl_paramlevel2` VALUES (8, 8, 'Lamanya 641-900 Jam', 9, 3);
INSERT INTO `tbl_paramlevel2` VALUES (9, 9, 'Lamanya 481-640 Jam', 6, 3);
INSERT INTO `tbl_paramlevel2` VALUES (10, 10, 'Lamanya 161-480 Jam', 3, 3);
INSERT INTO `tbl_paramlevel2` VALUES (11, 11, 'Lamanya 81-160 Jam', 2, 3);
INSERT INTO `tbl_paramlevel2` VALUES (12, 12, 'Lamanya 30-80 Jam', 1, 3);
INSERT INTO `tbl_paramlevel2` VALUES (13, 13, 'Melaksanakan Perkuliahan/Tutorial dan Membimbing, Menguji serta Menyelenggarakan Pendidikan di Laboratorium, Praktik Keguruan, Bengkel/Studio/Kebun Percobaan/Teknologi Pengajaran dan Praktik Lapangan', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (14, 14, 'Membimbing Seminar Mahasiswa', 1, 4);
INSERT INTO `tbl_paramlevel2` VALUES (15, 15, 'Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (16, 16, 'Membimbing dan Ikut Membimbing Disertasi, Tesis, Skripsi, dan Laporan Akhir Studi', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (17, 17, 'Bertugas sebagai Penguji pada Ujian Akhir', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (18, 18, 'Membina Kegiatan Mahasiswa di Bidang Akademik dan Kemahasiswaan', 2, 4);
INSERT INTO `tbl_paramlevel2` VALUES (19, 19, 'Mengembangkan Program Kuliah', 2, 4);
INSERT INTO `tbl_paramlevel2` VALUES (20, 20, 'Mengembangkan Bahan Pengajaran', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (21, 21, 'Menyampaikan Orasi Ilmiah', 5, 4);
INSERT INTO `tbl_paramlevel2` VALUES (22, 22, 'Menduduki Jabatan Pimpinan Perguruan Tinggi', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (23, 23, 'Membimbing Dosen yang Lebih Rendah Jabatan Fungsionalnya', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (24, 24, 'Melaksanakan Kegiatan Datasering dan Pencangkokan', 0, 4);
INSERT INTO `tbl_paramlevel2` VALUES (25, 25, 'Menghasilkan Karya Ilmiah', 0, 5);
INSERT INTO `tbl_paramlevel2` VALUES (26, 26, 'Menerjemahkan/Menyadur Buku Ilmiah', 15, 5);
INSERT INTO `tbl_paramlevel2` VALUES (27, 27, 'Mengedit/Menyunting Karya Ilmiah', 10, 5);
INSERT INTO `tbl_paramlevel2` VALUES (28, 28, 'Membuat Rancangan dan Karya Teknologi yang Dipatenkan', 0, 5);
INSERT INTO `tbl_paramlevel2` VALUES (29, 29, 'Membuat Rancangan dan Karya Teknologi yang Tidak Dipatenkan; Rancangan dan Karya Seni Monumental/Seni Pertunjukan; Karya Sastra', 0, 5);
INSERT INTO `tbl_paramlevel2` VALUES (30, 30, 'Menduduki Jabatan Pimpinan pada Lembaga Pemerintah', 5.5, 6);
INSERT INTO `tbl_paramlevel2` VALUES (31, 31, 'Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian yang Dimanfaatkan oleh Masyarakat', 3, 6);
INSERT INTO `tbl_paramlevel2` VALUES (32, 32, 'Memberi Latihan, Penyuluhan/Penataran/Ceramah kepada Masyarakat, baik sesuai dengan Bidang Ilmunya maupun di luar Bidang Ilmunya, baik kepada Masyarakat Umum maupun Masyarakat Kampus (Dosen, Mahasiswa dan Tenaga Non-Dosen)', 0, 6);
INSERT INTO `tbl_paramlevel2` VALUES (33, 33, 'Memberi Pelayanan kepada Masyarakat atau Kegiatan Lain yang Menunjang Pelaksanaan Tugas Umum Pemerintah dan Pembangunan', 0, 6);
INSERT INTO `tbl_paramlevel2` VALUES (34, 34, 'Membuat/Menulis Karya Pengabdian kepada Masyarakat', 3, 6);
INSERT INTO `tbl_paramlevel2` VALUES (35, 35, 'Ketua/Wakil/Wakil Ketua', 2, 7);
INSERT INTO `tbl_paramlevel2` VALUES (36, 36, 'Anggota', 1, 7);
INSERT INTO `tbl_paramlevel2` VALUES (37, 37, 'Panitia Pusat', 0, 8);
INSERT INTO `tbl_paramlevel2` VALUES (38, 38, 'Panitia Daerah', 0, 8);
INSERT INTO `tbl_paramlevel2` VALUES (39, 39, 'Tingkat Internasional', 0, 9);
INSERT INTO `tbl_paramlevel2` VALUES (40, 40, 'Tingkat Nasional', 0, 9);
INSERT INTO `tbl_paramlevel2` VALUES (41, 41, 'Ketua Delegasi', 3, 11);
INSERT INTO `tbl_paramlevel2` VALUES (42, 42, 'Anggota', 2, 11);
INSERT INTO `tbl_paramlevel2` VALUES (43, 43, 'Tingkat Internasional/Nasional/Regional', 0, 12);
INSERT INTO `tbl_paramlevel2` VALUES (44, 44, 'Di Lingkungan Perguruan Tinggi', 0, 12);
INSERT INTO `tbl_paramlevel2` VALUES (45, 45, 'Tingkat Internasional', 5, 13);
INSERT INTO `tbl_paramlevel2` VALUES (46, 46, 'Tingkat Nasional', 3, 13);
INSERT INTO `tbl_paramlevel2` VALUES (47, 47, 'Tingkat Daerah/Lokal', 1, 13);
INSERT INTO `tbl_paramlevel2` VALUES (48, 48, 'Buku SMTA atau Setingkat', 5, 14);
INSERT INTO `tbl_paramlevel2` VALUES (49, 49, 'Buku SMTP atau Setingkat', 5, 14);
INSERT INTO `tbl_paramlevel2` VALUES (50, 50, 'Buku SD atau Setingkat', 5, 14);
INSERT INTO `tbl_paramlevel2` VALUES (51, 51, 'Tingkat Internasional', 3, 15);
INSERT INTO `tbl_paramlevel2` VALUES (52, 52, 'Tingkat Nasional', 2, 15);
INSERT INTO `tbl_paramlevel2` VALUES (53, 53, 'Tingkat Daerah/Lokal', 1, 15);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_paramlevel3`
-- 

CREATE TABLE `tbl_paramlevel3` (
  `idLevel3` int(11) NOT NULL auto_increment,
  `kdLevel3` int(11) NOT NULL,
  `namaLevel3` text NOT NULL,
  `nilaiKUM` float NOT NULL,
  `kdLevel2` int(11) NOT NULL,
  PRIMARY KEY  (`idLevel3`),
  UNIQUE KEY `kdLevel3` (`kdLevel3`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- 
-- Dumping data for table `tbl_paramlevel3`
-- 

INSERT INTO `tbl_paramlevel3` VALUES (1, 1, 'Asisten Ahli', 0, 13);
INSERT INTO `tbl_paramlevel3` VALUES (2, 2, 'Lektor/Lektor Kepala/Guru Besar', 0, 13);
INSERT INTO `tbl_paramlevel3` VALUES (3, 3, 'Kuliah Kerja Nyata', 1, 15);
INSERT INTO `tbl_paramlevel3` VALUES (4, 4, 'Praktik Kerja Nyata', 1, 15);
INSERT INTO `tbl_paramlevel3` VALUES (5, 5, 'Praktik Kerja Lapangan', 1, 15);
INSERT INTO `tbl_paramlevel3` VALUES (6, 6, 'Pembimbing Utama', 0, 16);
INSERT INTO `tbl_paramlevel3` VALUES (7, 7, 'Pembimbing Pendamping/Pembantu', 0, 16);
INSERT INTO `tbl_paramlevel3` VALUES (8, 8, 'Ketua Penguji', 1, 17);
INSERT INTO `tbl_paramlevel3` VALUES (9, 9, 'Anggota Penguji', 0.5, 17);
INSERT INTO `tbl_paramlevel3` VALUES (10, 10, 'Buku Ajar', 20, 20);
INSERT INTO `tbl_paramlevel3` VALUES (11, 11, 'Diktat, Modul, Petunjuk Praktikum, Model, Alat Bantu, Audio Visual, Naskah Tutorial', 0, 20);
INSERT INTO `tbl_paramlevel3` VALUES (12, 12, 'Rektor', 6, 22);
INSERT INTO `tbl_paramlevel3` VALUES (13, 13, 'Pembantu Rektor, Ketua Lembaga, Dekan Fakultas, Direktur Pascasarjana', 0, 22);
INSERT INTO `tbl_paramlevel3` VALUES (14, 14, 'Pembantu Dekan, Ketua Sekolah Tinggi, Asdir PPs, Direktur Politeknik, Kapus Penelitian pada Univ./Inst., Ketua Senat Fakultas, Sekretaris Senat Fakultas', 0, 22);
INSERT INTO `tbl_paramlevel3` VALUES (15, 15, 'Direktur Akademi, Pembantu Ketua Sekolah Tinggi, Kapus Penelitian dan Pengabdian pada Masyarakat ST, Pembantu Direktur', 0, 22);
INSERT INTO `tbl_paramlevel3` VALUES (16, 16, 'Pembantu Direktur Akademi, Ketua Jurusan/Bagian, Ketua/Sekretaris Program Studi, Ketua Unit Penelitian dan Pengabdian kepada Masyarakat', 0, 22);
INSERT INTO `tbl_paramlevel3` VALUES (17, 17, 'Pembimbing Pencangkokan', 2, 23);
INSERT INTO `tbl_paramlevel3` VALUES (18, 18, 'Reguler', 1, 23);
INSERT INTO `tbl_paramlevel3` VALUES (19, 19, 'Datasering', 5, 24);
INSERT INTO `tbl_paramlevel3` VALUES (20, 20, 'Pencangkokan', 4, 24);
INSERT INTO `tbl_paramlevel3` VALUES (21, 21, 'Monograf', 20, 25);
INSERT INTO `tbl_paramlevel3` VALUES (22, 22, 'Buku Referensi', 40, 25);
INSERT INTO `tbl_paramlevel3` VALUES (23, 23, 'Majalah Ilmiah', 0, 25);
INSERT INTO `tbl_paramlevel3` VALUES (24, 24, 'Seminar', 0, 25);
INSERT INTO `tbl_paramlevel3` VALUES (25, 25, 'Koran/Majalah Popular/Umum', 1, 25);
INSERT INTO `tbl_paramlevel3` VALUES (26, 26, 'Hasil Penelitian atau Hasil Pemikiran yang Tidak Dipublikasikan (Tersimpan di Perpustakaan Perguruan Tinggi)', 3, 25);
INSERT INTO `tbl_paramlevel3` VALUES (27, 27, 'Internasional', 80, 28);
INSERT INTO `tbl_paramlevel3` VALUES (28, 28, 'Nasional', 40, 28);
INSERT INTO `tbl_paramlevel3` VALUES (29, 29, 'Tingkat Internasional', 20, 29);
INSERT INTO `tbl_paramlevel3` VALUES (30, 30, 'Tingkat Nasional', 15, 29);
INSERT INTO `tbl_paramlevel3` VALUES (31, 31, 'Tingkat Lokal', 10, 29);
INSERT INTO `tbl_paramlevel3` VALUES (32, 32, 'Terjadwal/Terprogram', 0, 32);
INSERT INTO `tbl_paramlevel3` VALUES (33, 33, 'Insidentil', 1, 32);
INSERT INTO `tbl_paramlevel3` VALUES (34, 34, 'Berdasarkan Bidang Keahliannya', 1.5, 33);
INSERT INTO `tbl_paramlevel3` VALUES (35, 35, 'Berdasarkan Penugasan Lembaga Perguruan Tinggi', 1, 33);
INSERT INTO `tbl_paramlevel3` VALUES (36, 36, 'Berdasarkan Fungsi/Jabatan', 0.5, 33);
INSERT INTO `tbl_paramlevel3` VALUES (37, 37, 'Ketua/Wakil Ketua', 3, 37);
INSERT INTO `tbl_paramlevel3` VALUES (38, 38, 'Anggota', 2, 37);
INSERT INTO `tbl_paramlevel3` VALUES (39, 39, 'Ketua/Wakil Ketua', 2, 38);
INSERT INTO `tbl_paramlevel3` VALUES (40, 40, 'Anggota', 1, 38);
INSERT INTO `tbl_paramlevel3` VALUES (41, 41, 'Pengurus', 2, 39);
INSERT INTO `tbl_paramlevel3` VALUES (42, 42, 'Anggota Atas Permintaan', 1, 39);
INSERT INTO `tbl_paramlevel3` VALUES (43, 43, 'Anggota', 0.5, 39);
INSERT INTO `tbl_paramlevel3` VALUES (44, 44, 'Pengurus', 1.5, 40);
INSERT INTO `tbl_paramlevel3` VALUES (45, 45, 'Anggota Atas Permintaan', 1, 40);
INSERT INTO `tbl_paramlevel3` VALUES (46, 46, 'Anggota', 0.5, 40);
INSERT INTO `tbl_paramlevel3` VALUES (47, 47, 'Ketua', 3, 43);
INSERT INTO `tbl_paramlevel3` VALUES (48, 48, 'Anggota', 2, 43);
INSERT INTO `tbl_paramlevel3` VALUES (49, 49, 'Ketua', 2, 44);
INSERT INTO `tbl_paramlevel3` VALUES (50, 50, 'Anggota', 1, 44);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_paramlevel4`
-- 

CREATE TABLE `tbl_paramlevel4` (
  `idLevel4` int(11) NOT NULL auto_increment,
  `kdLevel4` int(11) NOT NULL,
  `namaLevel4` text NOT NULL,
  `nilaiKUM` float NOT NULL,
  `kdLevel3` int(11) NOT NULL,
  PRIMARY KEY  (`idLevel4`),
  UNIQUE KEY `kdLevel4` (`kdLevel4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

-- 
-- Dumping data for table `tbl_paramlevel4`
-- 

INSERT INTO `tbl_paramlevel4` VALUES (1, 1, 'Diktat', 1, 11);
INSERT INTO `tbl_paramlevel4` VALUES (2, 2, 'Modul', 1, 11);
INSERT INTO `tbl_paramlevel4` VALUES (3, 3, 'Petunjuk Praktikum', 1, 11);
INSERT INTO `tbl_paramlevel4` VALUES (4, 4, 'Model', 1, 11);
INSERT INTO `tbl_paramlevel4` VALUES (5, 5, 'Alat Bantu', 1, 11);
INSERT INTO `tbl_paramlevel4` VALUES (6, 6, 'Audio Visual', 1, 11);
INSERT INTO `tbl_paramlevel4` VALUES (7, 7, 'Naskah Tutorial', 1, 11);
INSERT INTO `tbl_paramlevel4` VALUES (8, 8, 'Pembantu Rektor', 5, 13);
INSERT INTO `tbl_paramlevel4` VALUES (9, 9, 'Ketua Lembaga', 5, 13);
INSERT INTO `tbl_paramlevel4` VALUES (10, 10, 'Dekan Fakultas', 5, 13);
INSERT INTO `tbl_paramlevel4` VALUES (11, 11, 'Direktur Pascasarjana', 5, 13);
INSERT INTO `tbl_paramlevel4` VALUES (12, 12, 'Pembantu Dekan', 4, 14);
INSERT INTO `tbl_paramlevel4` VALUES (13, 13, 'Ketua Sekolah Tinggi', 4, 14);
INSERT INTO `tbl_paramlevel4` VALUES (14, 14, 'Asdir PPs', 4, 14);
INSERT INTO `tbl_paramlevel4` VALUES (15, 15, 'Direktur Politeknik', 4, 14);
INSERT INTO `tbl_paramlevel4` VALUES (16, 16, 'Kapus Penelitian pada Univ./Inst.', 4, 14);
INSERT INTO `tbl_paramlevel4` VALUES (17, 17, 'Ketua Senat Fakultas', 4, 14);
INSERT INTO `tbl_paramlevel4` VALUES (18, 18, 'Sekretaris Senat Fakultas', 4, 14);
INSERT INTO `tbl_paramlevel4` VALUES (19, 19, 'Direktur Akademi', 4, 15);
INSERT INTO `tbl_paramlevel4` VALUES (20, 20, 'Pembantu Ketua Sekolah Tinggi', 4, 15);
INSERT INTO `tbl_paramlevel4` VALUES (21, 21, 'Kapus Penelitian dan Pengabdian kepada Masyarakat ST', 4, 15);
INSERT INTO `tbl_paramlevel4` VALUES (22, 22, 'Pembantu Direktur', 4, 15);
INSERT INTO `tbl_paramlevel4` VALUES (23, 23, 'Pembantu Direktur Akademi', 3, 16);
INSERT INTO `tbl_paramlevel4` VALUES (24, 24, 'Ketua Jurusan/Bagian', 3, 16);
INSERT INTO `tbl_paramlevel4` VALUES (25, 25, 'Ketua/Sekretaris Program Studi', 3, 16);
INSERT INTO `tbl_paramlevel4` VALUES (26, 26, 'Ketua Unit Penelitian dan Pengabdian kepada Masyarakat', 3, 16);
INSERT INTO `tbl_paramlevel4` VALUES (27, 27, '10 Sks pertama', 0.5, 1);
INSERT INTO `tbl_paramlevel4` VALUES (28, 28, '2 Sks berikutnya', 0.25, 1);
INSERT INTO `tbl_paramlevel4` VALUES (29, 29, '10 Sks pertama', 1, 2);
INSERT INTO `tbl_paramlevel4` VALUES (30, 30, '2 Sks berikutnya', 0.5, 2);
INSERT INTO `tbl_paramlevel4` VALUES (31, 31, 'Disertasi', 8, 6);
INSERT INTO `tbl_paramlevel4` VALUES (32, 32, 'Tesis', 3, 6);
INSERT INTO `tbl_paramlevel4` VALUES (33, 33, 'Skripsi', 1, 6);
INSERT INTO `tbl_paramlevel4` VALUES (34, 34, 'Laporan Akhir Studi', 1, 6);
INSERT INTO `tbl_paramlevel4` VALUES (35, 35, 'Disertasi', 6, 7);
INSERT INTO `tbl_paramlevel4` VALUES (36, 36, 'Tesis', 2, 7);
INSERT INTO `tbl_paramlevel4` VALUES (37, 37, 'Skripsi', 0.5, 7);
INSERT INTO `tbl_paramlevel4` VALUES (38, 38, 'Laporan Akhir Studi', 0.5, 7);
INSERT INTO `tbl_paramlevel4` VALUES (39, 39, 'Internasional', 40, 23);
INSERT INTO `tbl_paramlevel4` VALUES (40, 40, 'Nasional Terakreditasi', 25, 23);
INSERT INTO `tbl_paramlevel4` VALUES (41, 41, 'Nasional Tidak Terakreditasi', 10, 23);
INSERT INTO `tbl_paramlevel4` VALUES (42, 42, 'Disajikan pada Internasional', 15, 24);
INSERT INTO `tbl_paramlevel4` VALUES (43, 43, 'Disajikan pada Nasional', 10, 24);
INSERT INTO `tbl_paramlevel4` VALUES (44, 44, 'Poster Internasional', 10, 24);
INSERT INTO `tbl_paramlevel4` VALUES (45, 45, 'Poster Nasional', 5, 24);
INSERT INTO `tbl_paramlevel4` VALUES (46, 46, 'Dalam Satu Semester atau Lebih pada Tingkat Internasional', 4, 32);
INSERT INTO `tbl_paramlevel4` VALUES (47, 47, 'Dalam Satu Semester atau Lebih pada Tingkat Nasional', 3, 32);
INSERT INTO `tbl_paramlevel4` VALUES (48, 48, 'Dalam Satu Semester atau Lebih pada Tingkat Lokal', 2, 32);
INSERT INTO `tbl_paramlevel4` VALUES (49, 49, 'Kurang dari Satu Semester dan Minimal Tingkat Internasional', 3, 32);
INSERT INTO `tbl_paramlevel4` VALUES (50, 50, 'Kurang dari Satu Semester dan Minimal Tingkat Nasional', 2, 32);
INSERT INTO `tbl_paramlevel4` VALUES (51, 51, 'Kurang dari Satu Semester dan Minimal Tingkat Lokal', 1, 32);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_paramunsur`
-- 

CREATE TABLE `tbl_paramunsur` (
  `idUnsur` int(11) NOT NULL auto_increment,
  `kdUnsur` int(11) NOT NULL,
  `namaUnsur` text NOT NULL,
  PRIMARY KEY  (`idUnsur`),
  UNIQUE KEY `kdUnsur` (`kdUnsur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tbl_paramunsur`
-- 

INSERT INTO `tbl_paramunsur` VALUES (1, 1, 'unsur utama pendidikan');
INSERT INTO `tbl_paramunsur` VALUES (2, 2, 'unsur utama tridharma perguruan tinggi');
INSERT INTO `tbl_paramunsur` VALUES (3, 3, 'unsur penunjang');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_pegawai`
-- 

CREATE TABLE `tbl_pegawai` (
  `noSeriKarpeg` varchar(8) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `namaPeg` text NOT NULL,
  `alamatPeg` text NOT NULL,
  `jkPeg` tinyint(1) NOT NULL,
  `tmptLahir` text NOT NULL,
  `tglLahir` date NOT NULL,
  `keahlian` text NOT NULL,
  `TMTPangkat` date NOT NULL,
  `TMTJabatan` date NOT NULL,
  `oldKUM` float NOT NULL,
  `newKUM` float NOT NULL,
  `idGolongan` int(11) NOT NULL,
  `idJabatan` int(11) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `idPendidikan` int(11) NOT NULL,
  PRIMARY KEY  (`noSeriKarpeg`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tbl_pegawai`
-- 

INSERT INTO `tbl_pegawai` VALUES ('234', '123', 'bana', 'hhh', 0, 'maluku', '1961-02-03', 'tafsir qur''an', '2006-06-12', '2008-07-14', 150, 0, 8, 2, 1, 1);
INSERT INTO `tbl_pegawai` VALUES ('112', '666', 'Atiyah Tahta', 'vv', 1, 'Cirebon', '1965-03-17', 'Makan', '2008-09-17', '2008-10-17', 0, 0, 9, 1, 1, 1);
INSERT INTO `tbl_pegawai` VALUES ('67', '777', 'Fa', 'uy', 0, 'bb', '1965-01-18', 'gg', '2003-03-17', '2007-09-29', 210, 0, 7, 1, 1, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_pendidikan`
-- 

CREATE TABLE `tbl_pendidikan` (
  `idPendidikan` int(11) NOT NULL auto_increment,
  `namaPendidikan` text NOT NULL,
  PRIMARY KEY  (`idPendidikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tbl_pendidikan`
-- 

INSERT INTO `tbl_pendidikan` VALUES (1, 'S1');
INSERT INTO `tbl_pendidikan` VALUES (2, 'S2');
INSERT INTO `tbl_pendidikan` VALUES (3, 'S3');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_prodi`
-- 

CREATE TABLE `tbl_prodi` (
  `idProdi` int(11) NOT NULL auto_increment,
  `namaProdi` text NOT NULL,
  `idJurusan` int(11) NOT NULL,
  PRIMARY KEY  (`idProdi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tbl_prodi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_user`
-- 

CREATE TABLE `tbl_user` (
  `idUser` int(11) NOT NULL auto_increment,
  `userName` varchar(18) NOT NULL,
  `pwdHash` varchar(13) NOT NULL,
  `token` varchar(6) NOT NULL,
  `idLevel` int(11) NOT NULL,
  PRIMARY KEY  (`idUser`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `tbl_user`
-- 

INSERT INTO `tbl_user` VALUES (1, 'admin', '822sYeYeLXqnQ', 'jopAEm', 1);
INSERT INTO `tbl_user` VALUES (2, 'kepeg', '822sYeYeLXqnQ', 'sqoFdm', 2);
INSERT INTO `tbl_user` VALUES (7, '123', '822sYeYeLXqnQ', 'GuqAwC', 3);
INSERT INTO `tbl_user` VALUES (6, '666', 'fa2ZKiqN44Vek', 'CqkGou', 3);
INSERT INTO `tbl_user` VALUES (8, '777', 'f1591ejDnr622', 'idrsgz', 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_validasi`
-- 

CREATE TABLE `tbl_validasi` (
  `idStatusValid` int(11) NOT NULL auto_increment,
  `namaStatusValid` text NOT NULL,
  PRIMARY KEY  (`idStatusValid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_validasi`
-- 

INSERT INTO `tbl_validasi` VALUES (1, 'Diajukan');
INSERT INTO `tbl_validasi` VALUES (2, 'Disetujui');
