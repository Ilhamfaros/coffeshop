<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale=1">
	<title>Dejavu Coffee || Admin</title>
	<link rel="stylesheet" type="text/css" href="css/set.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
    <header>
        <div class="header">
            <div class="logo">
                <img src="img/logo1.png" width="50px">
                <a href="index.php">Dejavu Coffee House Lebak Bulus, South Jakarta</a>
            </div>
        </div>
    <div class="search">
        <div class="container">
        <ul>
            <li><a href="dashboard.php" class="btn">Dashboard</a></li>
            <li><a href="profil.php" class="btn">Profil</a></li>
            <li><a href="data-kategori.php" class="btn">Data Kategori</a></li>
            <li><a href="data-produk.php" class="btn">Data Produk</a></li>
            <li><a href="keluar.php" class="btn">Keluar</a></li>
        </ul>
        </div>
    </div>
    </header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Edit Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
				<select class="input-control" name="kategori" required>
					<option value="">--Pilih--</option>
					<?php 
						$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
						while($r = mysqli_fetch_array($kategori)){
					?>
					<option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected':';' ?>><?php echo $r['category_name'] ?></option>
					<?php } ?>
				</select>

				<input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
				<input type="text" name="hargapanas" class="input-control" placeholder="Harga panas" value="<?php echo $p->product_price_p ?>" required>
				<input type="text" name="hargadingin" class="input-control" placeholder="Harga Dingin" value="<?php echo $p->product_price_d ?>" required>

				<img src="produk/<?php echo $p->product_image ?>"width = "100px">
				<input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
				<input type="file" name="gambar" class="input-control"><a style="color: red;">*max ukuran gambar 2mb dan file yang di izinkan jpg , jpeg , png , gif </a>
				<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description ?></textarea><br>
				<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1" <?php echo($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
						<option value="0" <?php echo($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){


						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$hargapanas 		= $_POST['hargapanas'];
						$hargadingin 		= $_POST['hargadingin'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];
						$foto		= $_POST['foto'];

						// data gambar yang baru
						$filename 	= $_FILES['gambar']['name'];
						$tmp_name 	= $_FILES['gambar']['tmp_name'];

						

						// jika admin ganti gambar 
						if($filename != ''){
							$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk'.time(). '.'.$type2;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
						if(!in_array($type2, $tipe_diizinkan)){
							// jka format file tidak ada di dalam tipe diizinkan 
							echo '<script>alert("Fortmat file tidak diizinkan")</script>';

						}else{
							unlink('./produk/'.$foto);
							move_uploaded_file($tmp_name, './produk/'.$newname);
							$namagambar = $newname;
						}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;

						}

						// query update data produk
						$update = mysqli_query($conn, "UPDATE tb_product SET 
												category_id = '".$kategori."',
												product_name = '".$nama."',
												product_price_p = '".$hargapanas."',
												product_price_d = '".$hargadingin."',
												product_description = '".$deskripsi."',
												product_image = '".$namagambar."',
												product_status = '".$status."'
												WHERE product_id = '".$p->product_id."' ");
						if($update){
								echo '<script>alert("Ubah data berhasil")</script>';
								echo '<script>window.location="data-produk.php"</script>';
							}else{
								echo 'gagal'.mysqli_error($conn);
							}
					}
				 ?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - Dejavu Coffee</small>
		</div>
	</footer>
	<script>
		CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>