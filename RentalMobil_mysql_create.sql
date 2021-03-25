CREATE TABLE `pegawai` (
	`id_pegawai` varchar(5) NOT NULL UNIQUE,
	`id_role` int NOT NULL,
	`foto_profil` varchar(255) NOT NULL,
	`nama` varchar(128) NOT NULL,
	`jenis_kelamin` int(1) NOT NULL,
	`tgl_lahir` DATE NOT NULL,
	`alamat` TEXT NOT NULL,
	`email` varchar(128) NOT NULL UNIQUE,
	`password` varchar(256) NOT NULL,
	`status` int(1) NOT NULL,
	PRIMARY KEY (`id_pegawai`)
);

CREATE TABLE `mobil` (
	`id_mobil` varchar(5) NOT NULL UNIQUE,
	`id_merk` int NOT NULL,
	`id_jenis` int NOT NULL,
	`warna` varchar(10) NOT NULL,
	`tahun` varchar(10) NOT NULL,
	`plat_nomor` varchar(10) NOT NULL UNIQUE,
	`nomor_rangka` varchar(17) NOT NULL UNIQUE,
	`nomor_mesin` varchar(17) NOT NULL UNIQUE,
	`harga` int NOT NULL,
	`status_pinjaman` int(1) NOT NULL,
	PRIMARY KEY (`id_mobil`)
);

CREATE TABLE `customer` (
	`id_customer` varchar(5) NOT NULL,
	`email` varchar(128) NOT NULL UNIQUE,
	`password` varchar(256) NOT NULL,
	`nama` varchar(128) NOT NULL,
	`jenis_kelamin` int(1) NOT NULL,
	`alamat` TEXT NOT NULL,
	`nik` int(16) NOT NULL UNIQUE,
	`no_sim` int(12) NOT NULL UNIQUE,
	`no_hp` int(12) NOT NULL UNIQUE,
	`foto_kk` varchar(225) NOT NULL,
	`foto_ktp` varchar(225) NOT NULL,
	`foto_selfie_ktp` varchar(225) NOT NULL,
	`foto_sim` varchar(225) NOT NULL,
	PRIMARY KEY (`id_customer`)
);

CREATE TABLE `transaksi` (
	`id_transaksi` varchar(10) NOT NULL,
	`id_pegawai` varchar(10) NOT NULL,
	`id_customer` varchar(5) NOT NULL,
	`id_metode_bayar` int NOT NULL,
	`tgl_peminjaman` DATE NOT NULL,
	`dp` int NOT NULL,
	`status_dp` int(1) NOT NULL,
	`biaya` int NOT NULL,
	`status_pembayaran` int(1) NOT NULL,
	PRIMARY KEY (`id_transaksi`)
);

CREATE TABLE `merk` (
	`id_merk` int NOT NULL AUTO_INCREMENT,
	`nama_merk` varchar(20) NOT NULL,
	PRIMARY KEY (`id_merk`)
);

CREATE TABLE `jenis_mobil` (
	`id_jenis` int NOT NULL AUTO_INCREMENT,
	`nama_jenis` varchar(20) NOT NULL,
	PRIMARY KEY (`id_jenis`)
);

CREATE TABLE `detail_transaksi` (
	`id_detail` int NOT NULL AUTO_INCREMENT,
	`id_transaksi` varchar(10) NOT NULL,
	`id_mobil` varchar(5) NOT NULL,
	`durasi` int(2) NOT NULL,
	`tgl_kembali` DATE NOT NULL,
	`tgl_dikembalikan` DATE NOT NULL,
	`subtotal` int NOT NULL,
	`denda` int NOT NULL,
	`status_denda` int(1) NOT NULL,
	PRIMARY KEY (`id_detail`)
);

CREATE TABLE `role` (
	`id_role` int NOT NULL AUTO_INCREMENT,
	`nama_role` varchar(20) NOT NULL,
	PRIMARY KEY (`id_role`)
);

CREATE TABLE `metode_bayar` (
	`id_metode_bayar` int NOT NULL AUTO_INCREMENT,
	`metode_pembayaran` varchar(10) NOT NULL,
	PRIMARY KEY (`id_metode_bayar`)
);

CREATE TABLE `foto_mobil` (
	`id_foto_mobil` int NOT NULL AUTO_INCREMENT,
	`id_mobil` varchar(5) NOT NULL,
	`foto` varchar(225) NOT NULL,
	PRIMARY KEY (`id_foto_mobil`)
);

CREATE TABLE `seri` (
	`id_seri` int NOT NULL AUTO_INCREMENT,
	`id_merk` int NOT NULL,
	`nama_Seri` varchar(20) NOT NULL,
	PRIMARY KEY (`id_seri`)
);

ALTER TABLE `pegawai` ADD CONSTRAINT `pegawai_fk0` FOREIGN KEY (`id_role`) REFERENCES `role`(`id_role`);

ALTER TABLE `mobil` ADD CONSTRAINT `mobil_fk0` FOREIGN KEY (`id_merk`) REFERENCES `merk`(`id_merk`);

ALTER TABLE `mobil` ADD CONSTRAINT `mobil_fk1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_mobil`(`id_jenis`);

ALTER TABLE `transaksi` ADD CONSTRAINT `transaksi_fk0` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai`(`id_pegawai`);

ALTER TABLE `transaksi` ADD CONSTRAINT `transaksi_fk1` FOREIGN KEY (`id_customer`) REFERENCES `customer`(`id_customer`);

ALTER TABLE `transaksi` ADD CONSTRAINT `transaksi_fk2` FOREIGN KEY (`id_metode_bayar`) REFERENCES `metode_bayar`(`id_metode_bayar`);

ALTER TABLE `detail_transaksi` ADD CONSTRAINT `detail_transaksi_fk0` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi`(`id_transaksi`);

ALTER TABLE `detail_transaksi` ADD CONSTRAINT `detail_transaksi_fk1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil`(`id_mobil`);

ALTER TABLE `foto_mobil` ADD CONSTRAINT `foto_mobil_fk0` FOREIGN KEY (`id_mobil`) REFERENCES `mobil`(`id_mobil`);

ALTER TABLE `seri` ADD CONSTRAINT `seri_fk0` FOREIGN KEY (`id_merk`) REFERENCES `merk`(`id_merk`);

