<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale=1">
	<title>Dejavu Coffee || Admin</title>
	<link rel="stylesheet" type="text/css" href="css/set.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
			<h3>Data Kategori</h3>
			<div class="box">
				<table border="1" cellspacing="0" class="table" displey="block">
				</p>
				<br>
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							if(mysqli_num_rows($kategori) >0){
							while($row = mysqli_fetch_array($kategori)){
						 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td>
								<a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="proses-hapus.php.?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
								<tr>
									<td colspan="3">Tidak ada data</td>
								</tr>
							<?php } ?>
					</tbody>
				</table>
					<p><a href="tambah-kategori.php">Tambah Data</a></p>
				
			</div>
		</div>
	</div>					

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - Dejavu Coffee</small>
		</div>
	</footer>
</body>
</html>