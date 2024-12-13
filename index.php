<!-- Index.php akan digunakan sebagai halaman utama seorang 
Administrator (CRUD) --> 
<!-- Menyiapkan data yang akan ditampilkan --> 
<!-- Menggunakan file function.php (terpisah), menggunakan 
fitur require --> 
<?php 
require'function.php'; 
$data=query("SELECT * FROM wisata_bali"); 
// Logic function jika tombol pencarian ditekan 
if (isset($_POST["cari"])){ 
$data=cari($_POST["keyword"]); 
} 
?> 
<!-- Tampilan utama --> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, 
initial-scale=1.0"> 
<title>Destinasi Wisata Bali</title> 
<!-- CSS body--> 
<style> 
body{ 
font-family: arial, sans-serif; 
} 
</style> 
<!-- CSS table --> 
<style> 
table { 
border-collapse: collapse; 
width: 100%; 
} 
td, th { 
border: 1px solid #dddddd; 
text-align: left; 
padding: 8px; 
} 
tr:nth-child(even) { 
background-color: #EBF5FB; 
} 
</style> 
</head> 
<body> 
<h1>Destinasi Wisata Bali</h1> 
<a href="tambah.php">Tambah Data Tempat Wisata</a> 
<br></br> 
<!-- Memunculkan tombol pencarian --> 
<form action="" method="post"> 
<input type="text" name="keyword" size="30" autofocus 
placeholder="Masukkan kata kunci..." 
autocomplete="off"> 
<button type="submmit" name="cari">Cari</button> 
</form> 
<br> 
<table tableborder="1" cellpadding="10" cellspacing="1"> 
<tr> 
<th>No</th> 
<th>Aksi</th> 
<th>Nama Tempat Wisata</th> 
<th>Lokasi Wisata</th> 
<th>Jam Operasional</th> 
<th>Jenis Kenampakan</th> 
<th>Transportasi</th> 
<th>Harga Tiket</th> 
<th>Foto</th> 
</tr> 
<?php $i=1;?> 
<!-- Looping Array menggunakan "forearch" --> 
<?php foreach($data as $row):?> 
<tr> 
<td><?=$row["id"];?></td> 
<td> 
<a href="edit.php?id=<?=$row["id"];?>">edit</a> 
<a href="delete.php?id=<?=$row["id"];?>"onclick="return 
confirm('Apakah Anda Ingin Menghapus Data ?');">delete</a> 
</td> 
<td><?=$row["nama_unsur"];?></td> 
<td><?=$row["orde1"];?></td> 
<td><?=$row["orde2"];?></td> 
<td><?=$row["orde3"];?></td> 
<td><?=$row["orde4"];?></td> 
<td><?=$row["orde5"];?></td> 
<td><img src="foto/<?=$row["foto"];?>" width="200"></td> 
</tr> 
<?php $i++;?> 
<?php endforeach;?> 
</body> 
</html>