<?php 
include 'conn.php';

if( isset($_POST["edit"]) ){
    $edit = $_POST["edit"];

$qry = mysqli_query($conn, "select*from bioSort where nama='".$edit."';");
}

if ( isset($_POST["submit"]) ){
    $name = $_POST['name'];
    $nama = $_POST['nama'];
    $jrs = $_POST['jrs'];
    $email = $_POST['email'];

    $str = [
        "update bioSort set email='".$email."' where nama='".$name."';",
        "update bioSort set jurusan='".$jrs."' where nama='".$name."';",
        "update bioSort set nama='".$nama."' where nama='".$name."';"
    ];

    $query = [
        mysqli_query($conn, $str[0]),
        mysqli_query($conn, $str[1]),
        mysqli_query($conn, $str[2])
    ];



    if(!($query[0] || $query[1] || $query[2])){
        echo "<script>alert('Data Gagal Di ditdate')</script>";
    } else {
        echo "<script>alert('Data Telah Berubah')</script>";
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tsukimi+Rounded:wght@700&display=swap" rel="stylesheet">
<style>
h1{
    font-family: 'Tsukimi Rounded', sans-serif;
}
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
    font-size: 1.8vh;
}

.dit{
    background-color: #8696FE;
    padding: 4vh;
    margin: 6vh;
    line-height: 4vh;
}
.dit div{
    background-color: #D7C0AE;
    padding: 1vh;
    overflow: auto;
    margin: 0.4vh;
}
.dit input{
    background-color: white;
    padding: 0.6vh;
    font-size: 1.5vh;
}
.dit label{
    font-size: 1.4vh;
}
.dit div:nth-child(5){
    text-align: center;
    background-color: rgba(0,0,0,0);
    margin-top: 1vh;
}
.dit button{
    padding: 1vh;
    border-radius: 40%;
    border: .4vh solid black;
    background-color: #98EECC;
    font-size: 2vh;
}
.nameBox{
    text-align: center;
}
.name{
    background-color: black;
    border: 0;
    text-align: center;
    font-size: 2vh;
}
</style>
</head>
<body>
    <div class="header">
        <h1>Update Data</h1>
        <a href="index.php">Kembali</a>
    </div>
    <div class="dit">
    <form method="post" action="">
        <div class="nameBox">
            <input type="text" value="<?= $edit ?>"  name="name" readonly class="name">
        </div>
        <?php 
        while ($data = mysqli_fetch_row($qry)){
        ?>
        <div>
            <label>Nama</label>
            <br>
            <input type="text" name="nama" value="<?= $data[0] ?>">
        </div>
        <div>
            <label>Jurusan</label>
            <br>
            <input type="text" name="jrs" value="<?= $data[1] ?>">
        </div>
        <div>
            <label>Email</label>
            <br>
            <input type="email" name="email" value="<?= $data[2]; ?>">
        </div>
        <?php } ?>
        <div>
            <button type="submit" name="submit">Edit</button>
        </div>
    </form>
    </div>
</body>
</html>
