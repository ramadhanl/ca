-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Mei 2015 pada 00.44
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ca`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `csr`
--

CREATE TABLE IF NOT EXISTS `csr` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `privkey` longtext NOT NULL,
  `pubkey` longtext NOT NULL,
  `certificate` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `csr`
--

INSERT INTO `csr` (`id`, `username`, `country`, `organization`, `name`, `unit`, `status`, `privkey`, `pubkey`, `certificate`) VALUES
(5, 'ramadhanrperdana@gmail.com', 'Indonesia', 'Deni-Hafi-Iqbal-Didit', 'Ramadhan Rosihadi P', 'KIJ - Pak Bas', 'signed', '-----BEGIN RSA PRIVATE KEY-----\r\nMIICXAIBAAKBgQCre2ClQuGzJ7sxNXbGAvfsmg+Xj04C0RXZ/HBqgKDF7S0mg3d+\r\n/n4R0t+y7PnQC6FHbzxqoaMZ4f1TOJaipLeRobnf2D100SjN24/HVH+V9aUsyIoW\r\n0DVK/9nr2yD2iAtreU+/6+o/dqmzu576jcXf9iTGlH7LJl4+IJ+p/Z4I2wIDAQAB\r\nAoGBAIsfc89gLaCeEV7hE1Wevun0K8Y4e4AJhgLurX2akdVCkSj37BDaBAoN3XNa\r\nk2pYpSZBdvDD5oFvOYk1FfEqVcq6GL7ZYGx2Yi3qnadoYeuWvbp9opmfaj11Mkqh\r\n29RiJEKCY1KANYT6dhk0B60PbZwdFX0i2FZIZ2kdu2T9yzShAkEA457aPQfdidRr\r\nqgjjsq8EU0Zw0iAEQRp+YCzrTKO2MMyfoIIxCJplUhPB0AupuQd3XYaavcmjFBou\r\nCLq/fOAa6QJBAMDctHU+Zxa5+53GKhm753VuuQ65OwC2zW9xYI/YRKK8xph/f0pY\r\n7VC43PdAdVc60uSMXYGJjvMCkLziKJQYoyMCQDI8XO4bTkmdGCXu0FIfTlUSttOp\r\nPUchEcMoJsZDW3JpttE16px7duEmex/vcwXjH/UEQCKi3dsR7BcBIEHvNAECQDj6\r\ne44P66D5PW81doa3zwAQwDerXdUuLK96DY8x08VIhFvVfyPV9fbdRtr9fi1RQbEo\r\nDxAQNd1xqpVDM73dMYUCQCY+7wAFZJgfxdMeurHqC1HZCV4xBe87kjcz3g1ou93Y\r\n5W+vERDZRmImtmP29xlyazlUwI/aojraQg7rEtoGxcA=\r\n-----END RSA PRIVATE KEY-----', '-----BEGIN PUBLIC KEY-----\r\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCre2ClQuGzJ7sxNXbGAvfsmg+X\r\nj04C0RXZ/HBqgKDF7S0mg3d+/n4R0t+y7PnQC6FHbzxqoaMZ4f1TOJaipLeRobnf\r\n2D100SjN24/HVH+V9aUsyIoW0DVK/9nr2yD2iAtreU+/6+o/dqmzu576jcXf9iTG\r\nlH7LJl4+IJ+p/Z4I2wIDAQAB\r\n-----END PUBLIC KEY-----', '-----BEGIN CERTIFICATE-----\r\nMIIChzCCAfKgAwIBAgIBADALBgkqhkiG9w0BAQUwbDESMBAGA1UEBgwJSW5kb25l\r\nc2lhMR4wHAYDVQQKDBVEZW5pLUhhZmktSXFiYWwtRGlkaXQxFjAUBgNVBAsMDUtJ\r\nSiAtIFBhayBCYXMxHjAcBgNVBAMMFURlbmktSGFmaS1JcWJhbC1EaWRpdDAeFw0x\r\nNTA1MDYyMjI0NTVaFw0xNjA1MDYyMjI0NTVaMGwxEjAQBgNVBAYMCUluZG9uZXNp\r\nYTEeMBwGA1UECgwVRGVuaS1IYWZpLUlxYmFsLURpZGl0MRYwFAYDVQQLDA1LSUog\r\nLSBQYWsgQmFzMR4wHAYDVQQDDBVEZW5pLUhhZmktSXFiYWwtRGlkaXQwgZ0wCwYJ\r\nKoZIhvcNAQEBA4GNADCBiQKBgQCre2ClQuGzJ7sxNXbGAvfsmg+Xj04C0RXZ/HBq\r\ngKDF7S0mg3d+/n4R0t+y7PnQC6FHbzxqoaMZ4f1TOJaipLeRobnf2D100SjN24/H\r\nVH+V9aUsyIoW0DVK/9nr2yD2iAtreU+/6+o/dqmzu576jcXf9iTGlH7LJl4+IJ+p\r\n/Z4I2wIDAQABoz8wPTALBgNVHQ8EBAMCAQYwDwYDVR0TAQH/BAUwAwEB/zAdBgNV\r\nHQ4EFgQUhLmL6G/K3189Wi6eh9aJ/417slYwCwYJKoZIhvcNAQEFA4GBAGwjTnJf\r\nKM9/MBW+N5nPeAhb/PIPryiiFOStt1TrpVg72soVPgJdo1I8b94rbJWx0Di3LRDh\r\nMAfXoIzoAtUt1tzrP+EJRQT0wKCNC1MV4GUa5E2KdiN7PqXuhVaeVv+f98Fl1OiK\r\nd+N4mVOuWzkY3rNMlQt+NpfH/1pq6B+6dG2M\r\n-----END CERTIFICATE-----'),
(6, 'qonitaluthfia@gmail.com', 'Canada', 'Something cool', 'Qonita Luthfia S', 'Something cooler', 'signed', '-----BEGIN RSA PRIVATE KEY-----\r\nMIICXAIBAAKBgQCre2ClQuGzJ7sxNXbGAvfsmg+Xj04C0RXZ/HBqgKDF7S0mg3d+\r\n/n4R0t+y7PnQC6FHbzxqoaMZ4f1TOJaipLeRobnf2D100SjN24/HVH+V9aUsyIoW\r\n0DVK/9nr2yD2iAtreU+/6+o/dqmzu576jcXf9iTGlH7LJl4+IJ+p/Z4I2wIDAQAB\r\nAoGBAIsfc89gLaCeEV7hE1Wevun0K8Y4e4AJhgLurX2akdVCkSj37BDaBAoN3XNa\r\nk2pYpSZBdvDD5oFvOYk1FfEqVcq6GL7ZYGx2Yi3qnadoYeuWvbp9opmfaj11Mkqh\r\n29RiJEKCY1KANYT6dhk0B60PbZwdFX0i2FZIZ2kdu2T9yzShAkEA457aPQfdidRr\r\nqgjjsq8EU0Zw0iAEQRp+YCzrTKO2MMyfoIIxCJplUhPB0AupuQd3XYaavcmjFBou\r\nCLq/fOAa6QJBAMDctHU+Zxa5+53GKhm753VuuQ65OwC2zW9xYI/YRKK8xph/f0pY\r\n7VC43PdAdVc60uSMXYGJjvMCkLziKJQYoyMCQDI8XO4bTkmdGCXu0FIfTlUSttOp\r\nPUchEcMoJsZDW3JpttE16px7duEmex/vcwXjH/UEQCKi3dsR7BcBIEHvNAECQDj6\r\ne44P66D5PW81doa3zwAQwDerXdUuLK96DY8x08VIhFvVfyPV9fbdRtr9fi1RQbEo\r\nDxAQNd1xqpVDM73dMYUCQCY+7wAFZJgfxdMeurHqC1HZCV4xBe87kjcz3g1ou93Y\r\n5W+vERDZRmImtmP29xlyazlUwI/aojraQg7rEtoGxcA=\r\n-----END RSA PRIVATE KEY-----', '-----BEGIN PUBLIC KEY-----\r\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCre2ClQuGzJ7sxNXbGAvfsmg+X\r\nj04C0RXZ/HBqgKDF7S0mg3d+/n4R0t+y7PnQC6FHbzxqoaMZ4f1TOJaipLeRobnf\r\n2D100SjN24/HVH+V9aUsyIoW0DVK/9nr2yD2iAtreU+/6+o/dqmzu576jcXf9iTG\r\nlH7LJl4+IJ+p/Z4I2wIDAQAB\r\n-----END PUBLIC KEY-----', '-----BEGIN CERTIFICATE-----\r\nMIIChzCCAfKgAwIBAgIBADALBgkqhkiG9w0BAQUwbDESMBAGA1UEBgwJSW5kb25l\r\nc2lhMR4wHAYDVQQKDBVEZW5pLUhhZmktSXFiYWwtRGlkaXQxFjAUBgNVBAsMDUtJ\r\nSiAtIFBhayBCYXMxHjAcBgNVBAMMFURlbmktSGFmaS1JcWJhbC1EaWRpdDAeFw0x\r\nNTA1MDYyMjI0NTVaFw0xNjA1MDYyMjI0NTVaMGwxEjAQBgNVBAYMCUluZG9uZXNp\r\nYTEeMBwGA1UECgwVRGVuaS1IYWZpLUlxYmFsLURpZGl0MRYwFAYDVQQLDA1LSUog\r\nLSBQYWsgQmFzMR4wHAYDVQQDDBVEZW5pLUhhZmktSXFiYWwtRGlkaXQwgZ0wCwYJ\r\nKoZIhvcNAQEBA4GNADCBiQKBgQCre2ClQuGzJ7sxNXbGAvfsmg+Xj04C0RXZ/HBq\r\ngKDF7S0mg3d+/n4R0t+y7PnQC6FHbzxqoaMZ4f1TOJaipLeRobnf2D100SjN24/H\r\nVH+V9aUsyIoW0DVK/9nr2yD2iAtreU+/6+o/dqmzu576jcXf9iTGlH7LJl4+IJ+p\r\n/Z4I2wIDAQABoz8wPTALBgNVHQ8EBAMCAQYwDwYDVR0TAQH/BAUwAwEB/zAdBgNV\r\nHQ4EFgQUhLmL6G/K3189Wi6eh9aJ/417slYwCwYJKoZIhvcNAQEFA4GBAGwjTnJf\r\nKM9/MBW+N5nPeAhb/PIPryiiFOStt1TrpVg72soVPgJdo1I8b94rbJWx0Di3LRDh\r\nMAfXoIzoAtUt1tzrP+EJRQT0wKCNC1MV4GUa5E2KdiN7PqXuhVaeVv+f98Fl1OiK\r\nd+N4mVOuWzkY3rNMlQt+NpfH/1pq6B+6dG2M\r\n-----END CERTIFICATE-----');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `nama`, `password`) VALUES
('admin@super.com', 'Monkey D Luffy', 'a'),
('luffy@gmail.com', 'Monkey D Luffy', 'a'),
('qonitaluthfia@gmail.com', 'Monkey D Luffy', 'a'),
('ramadhanrperdana@gmail.com', 'Monkey D Luffy', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csr`
--
ALTER TABLE `csr`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_csr` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csr`
--
ALTER TABLE `csr`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `csr`
--
ALTER TABLE `csr`
ADD CONSTRAINT `fk_csr` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
