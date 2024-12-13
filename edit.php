<?php 
 
require'function.php';  
// Mengambil data dari URL  
$id=$_GET["id"];  
// Query data berdasarkan ID  
$data=query("SELECT*FROM wisata_bali WHERE id=$id")[0];  
if(isset($_POST["submit"])){  
// Status perubahan data (berhasil/ tidak)  
if(edit($_POST)>0){  
echo "  
<script>  
alert('Data Berhasil Diedit');  
document.location.href='index.php';  
</script>  
";  
} else {  
echo"  
<script>  
alert('Data Gagal Diedit');  
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
<title>Edit Data Survei</title>  
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
<h1>Edit Data Survey</h1> 
 
<form action="" method="post" enctype="multipart/form-data">  
<input type="hidden" name="id" value="<?=$data["id"];?>">  
<input type="hidden" name="fotoLama"  
value="<?=$data["foto"];?>">  
<ul>  
<li>  
<label for="nama_unsur">Nama Tempat Wisata:</label>  
<!-- "required" digunakan untuk memastikan kolom terisi  
(tidak boleh kosong) -->  
<input type="text" name="nama_unsur" id="nama_unsur" required  
value="<?= $data["nama_unsur"];?>">  
</li> 
 
<li>  
<label for="orde1">Lokasi Wisata:</label>  
<input type="text" name="orde1" id="orde1"required  
value="<?= $data["orde1"];?>">  
</li>  
 
<li>  
<label for="orde2">Jam Operasional:</label>  
<input type="text" name="orde2" id="orde2"  
value="<?= $data["orde2"];?>">  
</li>  
<li>  
<label for="orde3">Jenis Kenampakan:</label>  
<input type="text" name="orde3" id="orde3"  
value="<?= $data["orde3"];?>">  
</li>  
<li>  
<label for="orde4">Transportasi:</label>  
<input type="text" name="orde4" id="orde4"  
value="<?= $data["orde4"];?>">  
</li>  
<li>  
<label for="orde5">Harga Tiket:</label>  
<input type="text" name="orde5" id="orde5"required  
value="<?= $data["orde5"];?>">  
</li>  
<li>  
<label for="foto">Foto:</label> <br>  
<img src="img/<?=$data['foto'];?>" width="200"> <br>  
<input type="file" name="foto" id="foto">  
</li>  
 
<li>  
<button type="submit" name="submit">Edit Data!</button>  
</li>  
</ul>  
</form>  
</body>  
</html>