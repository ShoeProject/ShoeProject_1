-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 02:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

-- CREATE TABLE `employee` (
--   `id` binary(16) NOT NULL,
--   `name` varchar(100) DEFAULT NULL,
--   `address` varchar(200) DEFAULT NULL,
--   `phone_no` varchar(15) DEFAULT NULL,
--   `age` int(11) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
-- ALTER TABLE `employee`
--   ADD PRIMARY KEY (`id`);
-- COMMIT;

-- create database shoe_db;
--executed -->
create table product(
    id varchar(40) default (uuid_to_bin(uuid())) not null,
    name varchar(100),
    serial_no varchar(100),
    item_price decimal(28,2),
    item_color varchar(20),
    item_size INT,
    category_id binary(16),
    sub_category_id binary(16),
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Products PRIMARY KEY(id),
    CONSTRAINT FK_product_categories Add foreign key(category_id)
    references product_categories(id),
    CONSTRAINT FK_product_sub_categories Add foreign key(sub_category_id)
    references product_sub_categories(id)
);

create table product_categories(
    id varchar(40) default (uuid_to_bin(uuid())) not null,
    name varchar(100),
    description text,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_product_categories PRIMARY KEY(id)
);

create table product_sub_categories(
    id varchar(40) default (uuid_to_bin(uuid())) not null,
    name varchar(100),
    description text,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Goods_receive_note PRIMARY KEY(id)
);
--exucuted --<<
create table customer(
    id varchar(40) default (uuid_to_bin(uuid())) not null,
    name varchar(100),
    address varchar(200),
    phone_no varchar(15),
    age int,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Customer PRIMARY KEY(id),
    CONSTRAINT FK_feedback Add foreign key(feedback_id)
    references feedback(id),
    CONSTRAINT FK_inquiry Add foreign key(inquiry_id)
    references inquiry(id),
     CONSTRAINT FK_order Add foreign key(order_id)
    references order(id)
);

create table employee(
    id varchar(40) default (uuid_to_bin(uuid())) not null,
    name varchar(100),
    address varchar(200),
    phone_no varchar(15),
    age int,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Employee PRIMARY KEY(id)
);

create table employee_type(
  id varchar(40) default (uuid_to_bin(uuid())) not null,
  designation varchar(40),
  CONSTRAINT PK_employee_type PRIMARY KEY(id)

);

create table order(
   id varchar(40) default (uuid_to_bin(uuid())) not null,
   order_date datetime,
   order_time datetime, 
   CONSTRAINT PK_order PRIMARY KEY(id)
);

create table cart(
    id varchar(40) default (uuid_to_bin(uuid())) not null,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Cart PRIMARY KEY(id)
);

create table goods_receive_note(
    id varchar(40) default (uuid_to_bin(uuid())) not null,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Goods_receive_note PRIMARY KEY(id)
);



create table file(
    id binary(16) default (uuid_to_bin(uuid())) not null,
    name varchar(100),
    url varchar(100),
    reference varchar(100),
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Goods_receive_note PRIMARY KEY(id)
);

create table news_And_Notification(
  id binary(16) default (uuid_to_bin(uuid())) not null,
  newsHeading varchar(300),
  newsBody varchar(300),
  CONSTRAINT PK_news_And_Notification PRIMARY KEY(id)
);

create table inquiry(
  id varchar(20) default (uuid_to_bin(uuid())) not null,
  inquiry_subject varchar(200);
  inquiry varchar(200);
  CONSTRAINT PK_inquiry PRIMARY KEY(id)

);

create table feedback(
   id varchar(20) default (uuid_to_bin(uuid())) not null,
   feedback varchar(200),
   CONSTRAINT PK_feedback PRIMARY KEY(id)
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
