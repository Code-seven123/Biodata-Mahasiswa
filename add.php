<?php 
include "conn.php";

if( isset($_POST["submit"]) ){
$dirImg = "image/";

$nama = $_POST['nama'];
$jrs = $_POST['jrs'];
$email = $_POST['email'];
$path = $_FILES["berkas"] ["tmp_name"];
$file = $_FILES["berkas"] ["name"];

$acak = mt_rand();
$up = move_uploaded_file($path, $dirImg.$acak.".jpg");


if(!$up){
    echo "<script>alert('Gagal upload Gambar, silahkan ulangi atau melapor ke admin')</script>";
    exit();
} else {
    echo "<script>alert('Berhasil upload gambar')</script>";
}

$query = "insert into bioSort (nama, jurusan, email, gambar, blank) values ("."'".$nama."'" . "," . "'".$jrs."'" . "," . "'".$email."'" . "," . "'".$acak.".jpg'".", 1);";

$exQuery = mysqli_query($conn, $query);

if(!$exQuery){
    echo "<script>alert('Data Gagal Terkirim')</script>";
} else {
    echo "<script>alert('Data Terkirim')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tsukimi+Rounded:wght@700&display=swap" rel="stylesheet">
<style>
*{
    margin: 0;
    padding: 0;
}
.header{
    text-align: center;
    background-color: #1F6E8C;
    padding: 2vh;
}
.header h1{
    font-family: 'Tsukimi Rounded', sans-serif;
    font-size: 4vh;
}
.header a{
    text-decoration: none;
    color: black;
    background-color: #D8C4B6;
    padding: .5vh;
    border-radius: 30%;
    font-size: 2vh;
}

.up{
    background-color: #8696FE;
    padding: 4vh;
    margin: 6vh;
    line-height: 4vh;
}
.up div{
    background-color: #D7C0AE;
    padding: 1vh;
    overflow: auto;
    margin: 0.4vh;
}
.up input{
    background-color: white;
    padding: 0.6vh;
    font-size: 1.6vh;
}
.up label{
    font-size: 1.5vh;
}
.up div:nth-child(5){
    text-align: center;
    background-color: rgba(0,0,0,0);
    margin-top: 1vh;
}
.up button{
    padding: 1vh;
    border-radius: 40%;
    border: .4vh solid black;
    background-color: #98EECC;
    font-size: 2vh;
}
</style>
</head>
<body style="background-color: #213555;">
    <div class="header">
        <h1>Tambah Data</h1>
        <a href="index.php">Kembali</a>
    </div>
    <div class="up">
        <form action="" enctype="multipart/form-data" method="post">
        <div>
            <label>Nama</label>
            <input type="text" name="nama">
        </div>
        <div>
            <label>Jurusan</label>
            <input type="text" name="jrs">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Gambar Profil</label>
            <input type="file" name="berkas">
        </div>
        <div>
            <button type="submit" class="sub" name="submit">Tambah</button>
        </div>
    </form>
    </div>
</body>
</html>
