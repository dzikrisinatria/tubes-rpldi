ALTER TABLE `pegawai` DROP FOREIGN KEY `pegawai_fk0`;

ALTER TABLE `mobil` DROP FOREIGN KEY `mobil_fk0`;

ALTER TABLE `mobil` DROP FOREIGN KEY `mobil_fk1`;

ALTER TABLE `transaksi` DROP FOREIGN KEY `transaksi_fk0`;

ALTER TABLE `transaksi` DROP FOREIGN KEY `transaksi_fk1`;

ALTER TABLE `transaksi` DROP FOREIGN KEY `transaksi_fk2`;

ALTER TABLE `detail_transaksi` DROP FOREIGN KEY `detail_transaksi_fk0`;

ALTER TABLE `detail_transaksi` DROP FOREIGN KEY `detail_transaksi_fk1`;

ALTER TABLE `foto_mobil` DROP FOREIGN KEY `foto_mobil_fk0`;

ALTER TABLE `seri` DROP FOREIGN KEY `seri_fk0`;

DROP TABLE IF EXISTS `pegawai`;

DROP TABLE IF EXISTS `mobil`;

DROP TABLE IF EXISTS `customer`;

DROP TABLE IF EXISTS `transaksi`;

DROP TABLE IF EXISTS `merk`;

DROP TABLE IF EXISTS `jenis_mobil`;

DROP TABLE IF EXISTS `detail_transaksi`;

DROP TABLE IF EXISTS `role`;

DROP TABLE IF EXISTS `metode_bayar`;

DROP TABLE IF EXISTS `foto_mobil`;

DROP TABLE IF EXISTS `seri`;

