CREATE DATABASE db_kampus;

USE db_kampus;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nim VARCHAR(20),
    email VARCHAR(100),
    nohp VARCHAR(20),
    jurusan VARCHAR(100)
);

INSERT INTO mahasiswa (nama, nim, email, nohp, jurusan)
VALUES
('Budi', '12345', 'budi@gmail.com', '08123456789', 'Teknik Informatika'),
('Siti', '54321', 'siti@gmail.com', '08987654321', 'Sistem Informasi');
