CREATE DATABASE IF NOT EXISTS db_ruang_sidang;
USE db_ruang_sidang;

CREATE TABLE IF NOT EXISTS master_ruang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_ruang VARCHAR(100) NOT NULL,
    gedung VARCHAR(100) NOT NULL
);

INSERT INTO master_ruang (nama_ruang, gedung) VALUES
('Ruang Sidang 1', 'Gedung D'),
('Ruang Sidang 2', 'Gedung D');
