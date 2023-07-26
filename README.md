#-->Aplikasi Biodata Mahasiswa<--
===

<h3>#Create Mysqli Table dan Database</h3>

#Membuat Database
```
MariaDB [(none)] > create database form;
```

#Menggunakan Database
```
MariaDB [(none)] > use form;
```

#Membuat Table
```
MariaDB [form] > create table bioMhs (
    -> nama varchar(50) primary key,
    -> jurusan varchar(50) not null,
    -> email char(100) not null,
    -> gambar char(225) not null);
```
