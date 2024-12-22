# NELPHI S. HUTASOIT (121140107)

## 1. Client Side Programming

1.1 telah dibuat sebuah form dengan 4 element input, yaitu Name dan Email dengan input element, Job dengan select option element, dan Gender dengan radio element. Dibawah form terdapat tabel yang akan menampilkan dari isian 4 input diatas.

1.2 Pada form terdapat 3 event yaitu: click, keyup, dan change yang mana event event itu digunakan untuk mentrigger handler validasi dari masing masing inputan pada client side.

## 2. Server Side Programming

2.1 Dengan menggunakan method POST pada form yang telah ada, terdapat validasi ulang dari sisi server untuk mengecek validitas inputan. Lalu pada method dari class DataModel digunakan global param $\_SERVER['REMOTE_ADDR'] untuk mendapatkan IP client dan $\_SERVER['HTTP_USER_AGENT'] untuk mendapatkan jenis browser dari client.

2.2 Pada file DataModel terdapat interface dan juga class yang implement interface tersebut. terdapat beberapa method yg ada seperte GetAll() untuk mendapatkan semua data dari Database, lalu ada Create($data) untuk menyimpan record ke database.

## 3. Database Management

3.1 pada file uas_web.sql terdapat DDL umtuk membuat table dataBio.

3.2 pada file DB.sql terdapat singleton untuk pembuatan koneksi database dengan driver mysqli

3.3 seperti yang diterangkan pada point 2.2, terdapat query untuk menambahkan row pada tabel dataBio.

## 4. State Management

4.1 session digunakan untuk menyimpan old/prev value dari client, sehingga jika terjadi error user tidak perlu mengetik dari awal lagi.

4.2 Browser Storage atau juga LocalStorage digunakan untuk menyimpan jumlah client melakukan submit data

## Bonus. Hosting Web App

a. saya menggunakan server yang menggunakan Cpanel sebagai control panel hostingan, sehingga saya hanya perlu menambahkan subdomain baru dan mengupload kode ke layanan FTP nya.

b. Saya menggunakan [nyanhosting.id](https://nyanhosting.id/member/index.php/store/hosting-server-singapore) yang mana harganya start-from IDR 10k saja. (PS. saya pun ini meminjam hostingan abang-abangan 🙏)

c. nyanhosting.id telah menyediakan SSL Let's Encrypt gratis untuk subdomainnya

d. server yang digunakan adalah shared hosting dengan Cpanel.
