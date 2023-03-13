### e-TARA

e-TARA (Elektronik Akta Cerai) is a digital backup for divorce certificates. It enables efficient tracing and report generation for administrators and allows users to check their certificate status using their case number.

---

---
Security
1. untuk keamanan password, password diamankan (hashed) dengan menggunakan php password_hash() function 
2. checks if the username is already taken before inserting it into the database.
3. This code uses prepared statements to protect against SQL injection, filters the input to protect against cross-site scripting (XSS), 

Fungsi Aplikasi
-Fitur Admin
1. Mempermudah dalam pencatatan data untuk dokumen yang sudah terambil yang berisi tanggal pengambilan, nomor perkara, nama penggugat, nama terguga, No akta cerai, kartu identitas (sim,ktp), nomor identitas dan Alamat
2. Terdapat fitur search dalam menu List Data untuk mempermudah mencari data dengan menggunakan Nomor Perkara
3. Submit status digunakan admin apabila akta cerai sudah siap diambil dan penggugat dapat melakukan cek dengan mengunjungi alamat web tanpa login didepan dengan menggunakan nomor perkara 
4. Terdapat fitur 'Delete' Untuk kesalahan dalam memasukan data dalam List Data ataupun Daftar Status 
5. Terdapat menu register untuk admin baru jika di inginkan
6. Semua data tersimpan dalam database website

-Fitur pengunjung
1. pengunjung dapat mengetahui status akta cerai sudah siap untuk diambil apa masih dalam proses

#### SQL prompt for database
---
CREATE TABLE NAMADATABASE.users (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	salt VARCHAR(32) NOT NULL
);


CREATE TABLE NAMADATABASE.my_table (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	date_input DATE,
	no_perkara VARCHAR(30) NOT NULL,
	nama_penggugat VARCHAR(50) NOT NULL,
	nama_tergugat VARCHAR(50) NOT NULL,
	no_akta_cerai VARCHAR(20) NOT NULL,
	kartu_identitas VARCHAR(50) NOT NULL,
	nomor_identitas VARCHAR(30) NOT NULL,
	alamat VARCHAR(255) NOT NULL
);


CREATE TABLE NAMADATABASE.statusperkara (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	statusperkara VARCHAR(255) NOT NULL
)
