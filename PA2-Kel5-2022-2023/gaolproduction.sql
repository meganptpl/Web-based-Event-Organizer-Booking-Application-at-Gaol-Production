/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - gaolproduction
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gaolproduction` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `gaolproduction`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `galeri` */

insert  into `galeri`(`id`,`judul`,`tempat`,`tanggal`,`deskripsi`,`gambar`,`created_at`,`updated_at`) values 
(1,'Birthday Party Yang Meriah','Tarutung','2023-05-01','Pesta ini diadakan dengan meriah. Konsep pada pesta ulang tahun ini adalah bernuansa elegan','dekor1.png','2023-05-10 02:03:44','2023-05-10 02:03:44'),
(2,'Prom Night','Sipaholon','2023-05-13','Acara ini di desain bernuansa elegan. Acara ini dihadiri oleh siswa sekolahan','dekor2.png','2023-05-10 02:06:11','2023-05-10 02:06:11'),
(3,'Annivasary Party','Tarutung','2023-05-25','Pesta mewah ini diadakan oleh sepasang pengantin yang merayakan annivasary','cake-with-tinsel.jpg','2023-05-10 02:13:57','2023-05-10 02:34:17');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_03_23_071151_create_permission_tables',1),
(6,'2023_03_23_090014_create_galeris_table',1),
(7,'2023_03_23_091339_create_testimonis_table',1),
(8,'2023_03_23_091716_create_pembayarans_table',1),
(9,'2023_04_27_012132_create_table_produk',1),
(10,'2023_04_27_012333_create_pesanans_table',1),
(11,'2023_04_27_015723_create_table_pembelian',1),
(12,'2023_04_27_015816_create_pembelian_item_table',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',1),
(2,'App\\Models\\User',2),
(3,'App\\Models\\User',3),
(3,'App\\Models\\User',4);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pembayaran` */

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` double NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `no_telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembelian_user_id_foreign` (`user_id`),
  CONSTRAINT `pembelian_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id`,`user_id`,`username`,`alamat`,`total_harga`,`tanggal_pembelian`,`no_telpon`,`bukti_pembayaran`,`status`,`created_at`,`updated_at`) values 
(1,3,'Luana','Naga Timbul',25000,'2023-06-10 00:00:00','0834568900','1683683975.jpg','Selesai','2023-05-10 01:59:06','2023-05-10 08:04:05'),
(2,3,'Luana Breka','Naga Timbul',3000000,'2023-06-01 00:00:00','0834568900','1683688338.jpg','Selesai','2023-05-10 03:11:42','2023-05-10 03:13:15'),
(3,3,'Suga','Hinalang',25000,'2023-05-26 00:00:00','082276021161','1683705730.jpg','Pending','2023-05-10 08:01:00','2023-05-10 08:01:00'),
(4,3,'Lulu','Naga Timbul',25000,'2023-06-01 00:00:00','0834568900','1683705761.jpg','Pending','2023-05-10 08:02:04','2023-05-10 08:02:04'),
(5,3,'Mesya','Naga Timbul',4925000,'2023-05-25 00:00:00','0834568900','1683707046.jpg','Pending','2023-05-10 08:23:27','2023-05-10 08:23:27'),
(6,3,'mlm;mm','ml;kl;kl;',125000,'1212-02-12 00:00:00','21212121','1683793642.jpg','Pending','2023-05-11 08:26:05','2023-05-11 08:26:05'),
(7,3,'lalla','Naga Timbul',25000,'2023-05-27 00:00:00','0834568900','1683793683.jpg','Pending','2023-05-11 08:27:43','2023-05-11 08:27:43'),
(8,3,'2121','2123121',75000,'1111-11-11 00:00:00','1111','1683794611.jpg','Pending','2023-05-11 08:42:04','2023-05-11 08:42:04'),
(9,3,'21212','131213',75000,'1111-11-21 00:00:00','212121','1683794826.jpg','Pending','2023-05-11 08:46:37','2023-05-11 08:46:37'),
(10,4,'mesya angeliqa','dragon muncul',2000000,'2023-05-24 00:00:00','0834568900','1683795617.jpg','Pending','2023-05-11 08:59:08','2023-05-11 08:59:08');

/*Table structure for table `pembelian_item` */

DROP TABLE IF EXISTS `pembelian_item`;

CREATE TABLE `pembelian_item` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `produk_id` bigint(20) unsigned NOT NULL,
  `pembelian_id` bigint(20) unsigned NOT NULL,
  `jumlah` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembelian_item_produk_id_foreign` (`produk_id`),
  KEY `pembelian_item_pembelian_id_foreign` (`pembelian_id`),
  CONSTRAINT `pembelian_item_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pembelian_item_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pembelian_item` */

insert  into `pembelian_item`(`id`,`produk_id`,`pembelian_id`,`jumlah`,`created_at`,`updated_at`) values 
(1,2,1,1,'2023-05-10 01:59:06','2023-05-10 01:59:06'),
(2,18,2,1,'2023-05-10 03:11:42','2023-05-10 03:11:42'),
(3,2,3,1,'2023-05-10 08:01:00','2023-05-10 08:01:00'),
(4,2,4,1,'2023-05-10 08:02:04','2023-05-10 08:02:04'),
(5,3,5,5,'2023-05-10 08:23:27','2023-05-10 08:23:27'),
(6,8,5,2,'2023-05-10 08:23:27','2023-05-10 08:23:27'),
(7,13,5,1,'2023-05-10 08:23:27','2023-05-10 08:23:27'),
(8,2,6,5,'2023-05-11 08:26:05','2023-05-11 08:26:05'),
(9,2,7,1,'2023-05-11 08:27:43','2023-05-11 08:27:43'),
(10,1,8,3,'2023-05-11 08:42:04','2023-05-11 08:42:04'),
(11,1,9,3,'2023-05-11 08:46:37','2023-05-11 08:46:37'),
(12,8,10,1,'2023-05-11 08:59:08','2023-05-11 08:59:08');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pesanan_user_id_foreign` (`user_id`),
  KEY `pesanan_product_id_foreign` (`product_id`),
  CONSTRAINT `pesanan_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pesanan` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `produk` */

insert  into `produk`(`id`,`name`,`jenis`,`gambar`,`harga`,`deskripsi`,`created_at`,`updated_at`) values 
(1,'Nasi Ayam Goreng','Paket Makanan','ayam goreng.jpg',25000,'Lauk terdiri dari nasi, sambal, sayur dan ayam',NULL,NULL),
(2,'Paket Ayam Gulai','Paket Makanan','Ayam gulai.jpg',25000,'Lauk terdiri dari nasi, sayur, ayam, nasi',NULL,NULL),
(3,'Paket Ayam Penyet','Paket Makanan','Ayam penyet.jpg',25000,'Lauk terdiri dari ayam, nasi, sayur',NULL,NULL),
(4,'Paket Tongseng Ayam','Paket Makanan','Tongseng ayam.jpg',20000,'Lauk terdiri dari nasi, ayam, sayur, sambal',NULL,NULL),
(5,'Paket Tuna Asam Manis','Paket Makanan','Tuna asam manis.jpg',30000,'Lauk terdiri dari nasi, sambal, sayur, ikan',NULL,NULL),
(6,'SIMPLEBAY','Paket Musik','SIMPLEBAY.jpg',1000000,'Digunakan untuk talkshow, seminar, dan simple music performance.',NULL,NULL),
(7,'SUPERBAY PACKAGE','Paket Musik','SUPERBAY.jpg',1500000,'Dinggunakan untuk acara-acara musik akustik, pertunjukan musik, dll',NULL,NULL),
(8,'MEGABAY','Paket Musik','MEGABAY.jpg',2000000,'Digunakan untuk acara  Band Music Performance, Wedding, Gathering, dll',NULL,NULL),
(9,'BROADCAST','Paket Musik','BROADCAST.jpg',500000,'Digunakan untuk mendukung kegiatan  live streaming, wedding, webinar, dll',NULL,NULL),
(10,'LIGHT PACKAGE','Paket Musik','LIGHT.jpg',1000000,'Cocok untuk segala jenis event baik indoor maupun outdoor.',NULL,NULL),
(11,'Dekorasi Pernikahan A','Paket Dekorasi','la2 (1).jpg',1500000,'Bernuansa floral yang dipenuhi dengan bungan putih',NULL,NULL),
(12,'Dekorasi Pernikahan B','Paket Dekorasi','la3 (1).png',2000000,'Bernuansa camping yang cocok untuk di outdoor',NULL,NULL),
(13,'Dekorasi Ulang Tahun A','Paket Dekorasi','la4 (1).jpg',800000,'Bernuansa ceria yang dipenuhi dengan warna soft',NULL,NULL),
(14,'Dekorasi Lamaran A','Paket Dekorasi','la5 (1).jpeg',1200000,'Bernuansa floral dipenuhi dengan bungan putih',NULL,NULL),
(15,'Dekorasi Ulang Tahun B','Paket Dekorasi','la6 (1).jpg',900000,'Bernuansa ceria dengan hiasan beruang',NULL,NULL),
(16,'Paket Birthday Party A','Paket Acara','dek1 (2).png',2500000,'Paket terdiri dari dekorasi, snack yang dihidangkan dll',NULL,NULL),
(17,'Paket Birthday Party B','Paket Acara','dekor3 (1).png',1000000,'Paket terdiri dari dekorasi, makan siang, dan snack',NULL,NULL),
(18,'Paket Lamaran Full A','Paket Acara','la2 (1).jpg',3000000,'Paket terdiri dari dekorasi, kursi, makanan 500',NULL,NULL),
(19,'Paket Lamaran Full B','Paket Acara','la5 (1).jpeg',2800000,'Paket terdiri dari dekorasi sederhana, makanan 300, dan minuman',NULL,NULL),
(20,'Paket Konser A','Paket Acara','lu5.jpg',5000000,'Paket terdiri dari lighting, panggung, musik',NULL,NULL);

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'admin','web','2023-05-10 01:02:15','2023-05-10 01:02:15'),
(2,'kasir','web','2023-05-10 01:02:15','2023-05-10 01:02:15'),
(3,'user','web','2023-05-10 01:02:15','2023-05-10 01:02:15');

/*Table structure for table `testimoni` */

DROP TABLE IF EXISTS `testimoni`;

CREATE TABLE `testimoni` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimoni_user_id_foreign` (`user_id`),
  CONSTRAINT `testimoni_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimoni` */

insert  into `testimoni`(`id`,`user_id`,`deskripsi`,`created_at`,`updated_at`) values 
(1,3,'Luana cantik','2023-05-10 01:02:20','2023-05-10 01:02:20'),
(2,3,'hai aku luna','2023-05-10 01:03:35','2023-05-10 01:03:35');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_nohp_unique` (`nohp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`nohp`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Administrator','admin@gmail.com','12345678901234',NULL,'$2y$10$bejc7ITpOTwhU9qTg.zdd.EMfJdCjg0LIb3b/lVF1arGiV5Hbw/wC',NULL,'2023-05-10 01:02:15','2023-05-10 01:02:15',NULL),
(2,'Kasir','kasir@gmail.com','12341234',NULL,'$2y$10$qMub3tY/EXPFCCNztCn5P.N7LC65Ky4oGYnQIWimG6F7U/wi3RDxK',NULL,'2023-05-10 01:02:16','2023-05-10 01:02:16',NULL),
(3,'User','user@gmail.com','1234512345',NULL,'$2y$10$zBU7fzpB4DXjmznvzBIEQOli/dmzI83fWB/5OqWrHkgBSgkUUKnsG',NULL,'2023-05-10 01:02:16','2023-05-10 01:02:16',NULL),
(4,'mesya angeliqa','mesyahutagalung300@gmail.com','082167157367',NULL,'$2y$10$vffZIOCsKfdWjj/pyE5VEuKBsQTs9DaeW95HN6sO2JU5mVVbe6rym',NULL,'2023-05-11 08:52:25','2023-05-11 08:52:25',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
