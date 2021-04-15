Halaman Utama/Login
- Index.php 
- cek_login.php

Profile
- info.php 

Bagian Admin
- Halaman_admin.php 
- view.php
- edit.php
- update.php
- tambah.php
- tambah_aksi.php
- hapus.php

Bagian Guru
- Halaman_guru.php 
- edit1.php
- update1.php

Bagian Murid
- Halaman_murid.php

Bagian Serbaguna
Universal == Koneksi.php - logout.php

Database
- uschool.sql

Cara Kerja

Ada halaman universal yang berfungsi sebagai script, yakni
- koneksi.php untuk menyambung ke database
- logout.php untuk terminate session
- cek_login.php untuk memulai session

Juga ada halaman utama yakni index.php, sebagai halaman login dan akses ke info pembuat web (info.php).

3 Bagian utama yakni admin, guru, dan murid
Murid
-	Memiliki 1 halaman, halaman_murid.php yang dapat menampilkan nilai, serta otomatis mengrading murid tersebut.
Guru
-	Memiliki 1 halaman utama yakni halaman_guru.php yang dapat menampilkan nilai semua murid, selain itu guru juga memiliki privilege untuk mengubah nilai murid (edit1.php).
-	Untuk mengupdate database, menggunakan update1.php
Admin
-	Memiliki 1 halaman utama yakni halaman_admin.php yang dapat menampilkan data user, dari sana dapat melihat detail user (view.php), menghapus user (delete.php), mengupdate data (edit.php), dan menambah user(tambah.php).
-	Juga terdapat php sebagai script untuk mengubah isi database, yakni update.php untuk mengubah data user, tambah_aksi.php untuk menambah user ke database 
