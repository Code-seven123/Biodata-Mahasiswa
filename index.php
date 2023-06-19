<?php 
include "conn.php";

if ( !isset($_GET["sort"]) ){
    $comm = "select*from bioSort where blank='1' order by nama asc;";
} else {
    $comm = "select*from bioSort where blank='1' order by nama ".$_GET['sort'].";";
}


if ( isset($_POST["submit"]) ){
    $delet = $_POST['delete'];
    
    $slc = "select gambar from bioSort where nama='".$delet."';";
    
    $query = mysqli_query($conn, $slc);
    
    while($data = mysqli_fetch_array($query)){
        $files    =glob("image/".$data['gambar']);
        foreach ($files as $file) {        
            if (is_file($file))
            unlink($file);
        }            
                
    }
    
    

    $qry = "delete from bioSort where nama='".$delet."';";

    $query = mysqli_query($conn, $qry);

    if(!$query){
        echo "<script>alert('Gagal Menghapus')</script>";
    } else {
        echo "<script>alert('Berhasil Menghapus Data Dengan Nama ".$delet."')</script>";
    }
};
?>

<!DOCTYPE html>
<html lang="in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Siswa</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Diphylleia&display=swap" rel="stylesheet">

<style>
*{
    margin: 0;
    padding: 0;
}
.clear{clear: both;}

.dit, .del{
    position: fixed;
    background-color: #DBDFAA;
    width: 100%;
    padding: 3vw;
    top: 14vh;
}
.dit h1, .del h1{
    font-size: 4vh;
}
.dit form, .del form{
}
.dit form input, .del form input{
    background-color: white;
    font-size:2vh;
}
.dit form label, .del form label{
    font-size: 1.2vh;
}
.dit form button, .del form button{
    margin-top: 7vw;
    font-size: 1.7vh;
}


.header{
    text-align: center;
    position: fixed;
    top: 1px;
    background-color: white;
    width: 100%;
    height: 14vh;
}
.header h1{
    font-family: 'Comfortaa', cursive;
    font-size: 5vh;
}
.header button a{
    text-decoration: none;
    color: black;
}
.add{
    padding: 1vw;
    background-color: #03C988;
    border: 1px solid black;
    width: 25vw;
    font-size: 1.5vh;
}
.delete{
    padding: 1vw;
    background-color: #CD1818;
    border: 1px solid black;
    width: 25vw;    
    font-size: 1.5vh;
}
.edit{
    padding: 1vw;
    background-color: #F7D060;
    border: 1px solid black;
    width: 25vw;    
    font-size: 1.5vh;
}


.data{
    background-color: #F29727;
    font-family: 'Architects Daughter', cursive;
    padding: 7vh;
}
.cle{
    background-color: #F29727;
    margin: 0;
    padding: 0;
}
ul{
    display: flex;
    background-color: #F29727;
    padding: 3vw;
    border: 2px solid black;
    box-shadow: 3px 3px 5px grey;
    overflow: scroll;
}
ul li img{
    margin-right: 8vw;
    border: 2px solid black;
    border-radius: 30%;
    
    
}
li{
    font-size: 2vh;
}
ul div:nth-child(1) li{
    list-style: none;
}


body{
    background-color: #8696FE;
}



.formClose{
    background-color: #F45050;
    padding: 1vh;
    border-radius: 20%;
    border: 1px solid black;
    box-shadow: 2px 2px 3px grey;
    font-size: 1.7vh;
}
.sub{
    background-color: #DDFFBB;
    padding: 1vh;
    border-radius: 20%;
    border: 1px solid black;
    box-shadow: 2px 2px 3px grey;
}
button{
    font-family: 'Diphylleia', serif;
}
label{
    font-family: 'Comfortaa', cursive;
}
select{
    margin-top: 1vh;
    padding: .3vh;
    font-size: 1.3vh;
}
.header form button{
    padding: .3vh;
    font-size: 1.3vh;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>
    <div class="header">
        <h1>Daftar Siswa</h1>
        <button class="add"><a href="add.php">Tambah Data</a></button>
        <button class="delete">Hapus Data</button>
        <button class="edit">Edit</button>
        <form action="" method="get">
            <select name="sort">
                <option value="asc">A-Z</option>
                <option value="desc">Z-A</option>
            </select>
            <button type="submit">ubah</button>
        </form>
   </div>
    
    
    <div class="del">
        <h1>Hapus Data</h1>
        <form action="" method="post">
            <div>
                <label>Nama</label>
                <br>
                <input type="text" name="delete">
            </div>
            <button type="submit" class="sub" name="submit">Hapus</button>
        </form>
        <button class="formClose">Keluar</button>
    </div>
    
    
    <div class="dit">
        <h1>Edit Data</h1>
        <form action="edit.php" method="post">
            <div>
                <label>Nama</label>
                <br>
                <input type="text" name="edit">
            </div>
            <button type="submit" class="sub">Edit</button>
        </form>
        <button class="formClose">Keluar</button>
    </div>
    
    
   
    
    <?php 
        $qry = mysqli_query($conn, $comm);
        while($data = mysqli_fetch_array($qry)) {     
    ?>
            <div class="cle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FEFF86" fill-opacity="1" d="M0,224L18.5,208C36.9,192,74,160,111,170.7C147.7,181,185,235,222,224C258.5,213,295,139,332,144C369.2,149,406,235,443,245.3C480,256,517,192,554,149.3C590.8,107,628,85,665,85.3C701.5,85,738,107,775,112C812.3,117,849,107,886,96C923.1,85,960,75,997,69.3C1033.8,64,1071,64,1108,96C1144.6,128,1182,192,1218,181.3C1255.4,171,1292,85,1329,58.7C1366.2,32,1403,64,1422,80L1440,96L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path></svg>
            </div>
            <div class="data">
                <ul>
                    <div>
                        <li><img src="image/<?= $data['gambar']?>" alt="" width="80vw"></li>
                    </div>
                    <div>
                        <li>nama : <?= $data["nama"] ?></li>
                        <li>jurusan : <?= $data["jurusan"] ?></li>
                        <li>email : <?= $data["email"] ?></li>
                        <li><a href="#all-info.php">Info lebih lanjut</a></li>
                    </div>
                </ul>
            </div>
            <div class="cle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#feff86" fill-opacity="1" d="M0,96L21.8,106.7C43.6,117,87,139,131,144C174.5,149,218,139,262,133.3C305.5,128,349,128,393,112C436.4,96,480,64,524,58.7C567.3,53,611,75,655,96C698.2,117,742,139,785,154.7C829.1,171,873,181,916,160C960,139,1004,85,1047,90.7C1090.9,96,1135,160,1178,202.7C1221.8,245,1265,267,1309,256C1352.7,245,1396,203,1418,181.3L1440,160L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
            </div>
    <?php } ?>
    
<script>
$(".del").hide();
$(".dit").hide();


$(".delete").click(()=>{
    $('.del').show(1000);
});
$(".formClose").click(()=>{
    $('.del').hide(1000);
});

$(".edit").click(()=>{
    $('.dit').show(1000);
});
$(".formClose").click(()=>{
    $('.dit').hide(1000);
});


</script>
</body>
</html>
