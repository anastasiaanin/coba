<?php  
  
require'function.php';  
  
if(isset($_POST["submit"])){  
    // Status penambahan data (berhasil/ tidak)  
    if(tambah($_POST)>0){  
        echo "  
        <script>  
        alert('Data Berhasil Ditambahkan');  
        document.location.href='index.php';  
        </script>  
        ";  
    } else {  
        echo"  
        <script>  
        alert('Data Gagal Ditambahkan');  
        document.location.href='index.php';  
        </script>  
        ";  
    }  
}  
  
?>  
  
<!DOCTYPE html>  
<html lang="en">  
<head>  
<meta charset="UTF-8">  
<meta http-equiv="X-UA-Compatible" content="IE=edge">  
<meta name="viewport" content="width=device-width, initial 
scale=1.0">  
<title>Tambah Data Lokasi Wisata</title>  
<!-- CSS body-->  
<style>  
body{  
font-family: arial, sans-serif;  
margin: 70px;  
}  
input {  
width: 100%;  
}  
</style>  
</head>  
<body>  
<h1>Tambah Data Tempat Wisata</h1>  
<!-- "enctype" digunakan untuk membuat 2 jalur : penyimpanan  
text ($_POST) dan file ($_FILE)-->  
<form action="" method="post" enctype="multipart/form-data">  
<ul>  
<li>  
<label for="nama_unsur">Nama Tempat Wisata:</label>  
<!-- "required" digunakan untuk memastikan kolom terisi  
(tidak boleh kosong) -->  
<!-- "autocomplete="off" agar tidak muncul suggestion ketika  
input-->  
<input type="text" name="nama_unsur" id="nama_unsur" required  
autocomplete="off"> 
 
</li>  
<li>  
<label for="orde4">Transportasi:</label>  
<li>  
<label for="orde1">Lokasi Wisata:</label>  
<input type="text" name="orde1" id="orde1"required  
autocomplete="off">  
</li>  
<li>  
<label for="orde2">Jam Operasional:</label>  
<input type="text" name="orde2" id="orde2"  
autocomplete="off">  
</li>  
<li>  
<label for="orde3">Jenis Kenampakan:</label>  
<input type="text" name="orde3" id="orde3"  
autocomplete="off">  
</li>  
 
<li>  
<label for="orde4">Transportasi:</label>  
<input type="text" name="orde4" id="orde4"  
autocomplete="off">  
</li> 
 
<li>  
<label for="orde5">Harga Tiket:</label>  
<input type="text" name="orde5" id="orde5"required  
autocomplete="off">  
</li>  
  
<li>  
<label for="foto">Foto:</label>  
<input type="file" name="foto" id="foto" autocomplete="off">  
</li>  
<li>  
<button type="submit" name="submit">Tambah Data!</button>  
</li>  
</ul>  
 
</form> 
 
</body> 
</html>