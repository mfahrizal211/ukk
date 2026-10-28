-- OPTION A: One Book = One Category (Simple Design)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS ukk_latihan;
USE ukk_latihan;

-- ======================
-- TABLE: user
-- ======================
CREATE TABLE user (
  id_user INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  nama_lengkap VARCHAR(255) NOT NULL,
  alamat TEXT NOT NULL,
  level ENUM('Admin','User')
) ENGINE=InnoDB;

-- ======================
-- TABLE: kategori_buku
-- ======================
CREATE TABLE kategori_buku (
  id_kategori INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- ======================
-- TABLE: buku
-- ======================
CREATE TABLE buku (
  id_buku INT AUTO_INCREMENT PRIMARY KEY,
  id_kategori INT NOT NULL,
  judul VARCHAR(255),
  penulis VARCHAR(255),
  penerbit VARCHAR(255),
  tahun_terbit INT,
  deskripsi TEXT,
  CONSTRAINT fk_buku_kategori
    FOREIGN KEY (id_kategori)
    REFERENCES kategori_buku(id_kategori)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;



-- ======================
-- TABLE: peminjaman
-- ======================
CREATE TABLE peminjaman (
  id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
  id_user INT NOT NULL,
  id_buku INT NOT NULL,
  tgl_peminjaman DATE NOT NULL,
  tgl_pengembalian DATE,
  status_peminjaman ENUM('dipinjam','proses','dikembalikan'),
  CONSTRAINT fk_peminjaman_user
    FOREIGN KEY (id_user)
    REFERENCES user(id_user)
    ON DELETE CASCADE,
  CONSTRAINT fk_peminjaman_buku
    FOREIGN KEY (id_buku)
    REFERENCES buku(id_buku)
    ON DELETE CASCADE
) ENGINE=InnoDB;

-- ======================
-- TABLE: ulasan_buku
-- ======================
CREATE TABLE ulasan_buku (
  id_ulasan INT AUTO_INCREMENT PRIMARY KEY,
  id_user INT NOT NULL,
  id_buku INT NOT NULL,
  ulasan TEXT NOT NULL,
  rating INT NOT NULL,
  CONSTRAINT fk_ulasan_user
    FOREIGN KEY (id_user)
    REFERENCES user(id_user)
    ON DELETE CASCADE,
  CONSTRAINT fk_ulasan_buku
    FOREIGN KEY (id_buku)
    REFERENCES buku(id_buku)
    ON DELETE CASCADE,
  CONSTRAINT unique_ulasan UNIQUE (id_user, id_buku)
) ENGINE=InnoDB;

COMMIT;
