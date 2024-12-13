<?php 
// koneksi ke database (baca : https://www.w3schools.com/php/php_arrays.asp) 
$conn=mysqli_connect("localhost", "root", "", 
"Wisata Bali"); 
// Melalukan query data 
// Ambil data ("fetch") dari objek result baca : https://www.w3schools.com/php/func_mysqli_fetch_array.asp 
function query($query){ 
global $conn; 
$result=mysqli_query($conn, $query); 
$rows = []; 
while($row=mysqli_fetch_assoc($result)){ 
$rows[]=$row; 
} 
return $rows; 
} 
// Fungsi menambahkan data (CREATE) 
function tambah($data){ 
    global $conn; 
    // Ambil data dari form 
    // "htmlspecialchars" digunakan untuk menghindari memunculkan element "script" pada form  
    $nama_unsur=htmlspecialchars($data["nama_unsur"]); 
    $orde1=htmlspecialchars($data["orde1"]); 
    $orde2=htmlspecialchars($data["orde2"]); 
    $orde3=htmlspecialchars($data["orde3"]); 
    $orde4=htmlspecialchars($data["orde4"]); 
    $orde5=htmlspecialchars($data["orde5"]); 
    // Fungsi Upload gambar 
    // return false untuk memastikan gambar harus terupload 
    $foto=upload(); 
    if(!$foto){ 
    return false; 
    } 
    $query="INSERT INTO wisata_bali 
VALUES 
('','$nama_unsur', '$orde1', '$orde2', '$orde3', '$orde4', 
'$orde5', '$foto') 
"; 
mysqli_query($conn, $query); 
return mysqli_affected_rows($conn); 
} 
function upload(){ 
$namaFile=$_FILES['foto']['name']; 
$ukuranFile=$_FILES['foto']['size']; 
$error=$_FILES['foto']['error']; 
$tmpName=$_FILES['foto']['tmp_name']; 
// Fungsi cek ada/tidak gambar yang diupload 
if($error===4){ 
echo"<script> 
alert('Foto harus diupload..'); 
</script>"; 
return false; 
} 
// Apakah yang diupload berupa file gambar/bukan 
// "explode" adalah fungsi untuk memecah string di dalam Array, dalam kasus ini digunakan untuk membaca ekstensi file (.jpg/.jpeg/.png) 
// "strtolower" digunakan agar nama file dalam huruf kecil 
$ekstensiFotoValid=['jpg','jpeg','png']; 
$ekstensiFoto=explode('.',$namaFile); 
$ekstensiFoto=strtolower(end($ekstensiFoto)); 
if(!in_array($ekstensiFoto, $ekstensiFotoValid)){ 
echo"<script> 
alert('Cek kembali ekstensi file Anda !..'); 
</script>"; 
return false; 
} 
// Membatasi ukuran foto yang diupload, satyan dalam byte (maksimal 2mb) 
if($ukuranFile>20000000000){ 
echo"<script> 
alert('Ukuran foto terlalu besar!..'); 
</script>"; 
return false; 
} 
// Nama file baru 
$namaFileBaru=uniqid(); 
$namaFileBaru.='.'; 
$namaFileBaru.=$ekstensiFoto; 
// Upload gambar jika sesuai kriteria 
move_uploaded_file($tmpName, 'foto/'.$namaFileBaru); 
return $namaFileBaru; 
} 
// Fungsi delete (DELETE) 
function delete($id){ 
global $conn; 
mysqli_query($conn, "DELETE FROM wisata_bali WHERE 
id=$id"); 
return mysqli_affected_rows($conn); 
} 
// Fungsi edit (EDIT) 
function edit($data){ 
global $conn; 
$id=$data["id"]; 
$nama_unsur=htmlspecialchars($data["nama_unsur"]); 
$orde1=htmlspecialchars($data["orde1"]); 
$orde2=htmlspecialchars($data["orde2"]); 
$orde3=htmlspecialchars($data["orde3"]); 
$orde4=htmlspecialchars($data["orde4"]); 
$orde5=htmlspecialchars($data["orde5"]); 
// Pada foto, Jika berisi foto lama 
$fotoLama=htmlspecialchars($data["fotoLama"]); 
// Pada foto, apakah user upload gambar baru/tidak 
if($_FILES['foto']['error']===4){ 
$foto=$fotoLama; 
} else{ 
$foto=upload(); 
} 
// Fungsi untuk "overwrite" berdasarkan data yang baru 
$query="UPDATE wisata_bali SET 
nama_unsur='$nama_unsur', 
orde1='$orde1', 
orde2='$orde2', 
orde3='$orde3', 
orde4='$orde4', 
orde5='$orde5', 
foto='$foto' 
WHERE id=$id 
"; 
mysqli_query($conn, $query); 
return mysqli_affected_rows($conn); 
} 
// Fungsi pencarian (cari) 
// Wildcard (%) digunakan untuk dapat menangkap element di awal dan akhir kata kunci 
function cari($keyword){ 
$query="SELECT*FROM wisata_bali 
WHERE 
orde1 LIKE '%$keyword%' OR 
orde2 LIKE '%$keyword%' OR 
orde3 LIKE '%$keyword%' OR 
orde4 LIKE '%$keyword%' OR 
orde5 LIKE '%$keyword%' 
"; 
return query($query); 
} 
?>