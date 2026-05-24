<?php
include '../koneksi.php';

$id = $_GET['id'];

$booking = mysqli_query($conn,
"SELECT * FROM booking WHERE id='$id'");

$b = mysqli_fetch_assoc($booking);

$dokter = mysqli_query($conn,
"SELECT * FROM dokter");

if(isset($_POST['submit'])){

$dokter_id = $_POST['dokter_id'];

mysqli_query($conn,
"UPDATE booking

SET dokter_id='$dokter_id',
status='Diproses'

WHERE id='$id'");

echo "<script>
alert('Dokter berhasil di-assign!');
window.location='../hewan/admin.php';
</script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Assign Dokter</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{

    background:
    linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
    url('https://images.unsplash.com/photo-1517849845537-4d257902454a');

    background-size:cover;
    background-position:center;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
}

.card{

    width:500px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    padding:35px;
    border-radius:25px;
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
}

h1{
    text-align:center;
    margin-bottom:25px;
    color:#7fd3ff;
    font-size:40px;
}

.info{
    margin-bottom:18px;
    font-size:20px;
}

.info b{
    color:#ffb36b;
}

select{

    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    margin-top:15px;
    font-size:16px;
}

button{

    width:100%;
    padding:14px;
    margin-top:25px;
    background:#ff914d;
    border:none;
    color:white;
    font-size:18px;
    border-radius:12px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    background:#ff7b22;
}

.back{

    display:block;
    text-align:center;
    margin-top:20px;
    color:white;
    text-decoration:none;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="card">

<h1>
🩺 Assign Dokter
</h1>

<div class="info">
<b>Customer:</b>
<?= $b['nama_customer'] ?>
</div>

<div class="info">
<b>Hewan:</b>
<?= $b['nama_hewan'] ?>
</div>

<div class="info">
<b>Keluhan:</b>
<?= $b['keluhan'] ?>
</div>

<form method="POST">

<select name="dokter_id">

<?php
while($d = mysqli_fetch_assoc($dokter)){
?>

<option value="<?= $d['id'] ?>">

<?= $d['nama_dokter'] ?>
-
<?= $d['spesialis'] ?>

</option>

<?php } ?>

</select>

<button type="submit" name="submit">
💾 Simpan Dokter
</button>

</form>

<a href="../hewan/admin.php" class="back">
⬅ Kembali
</a>

</div>

</body>
</html>