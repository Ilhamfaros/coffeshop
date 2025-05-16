<?php 
	session_start();
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale=1">
	<title>Dejavu Coffee House || Admin</title>
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
			<h3>Dashboard</h3>
			<div class="box">
				<h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?>
				"Aplikasi ini dibuat untuk mempermudah para konsumen untuk melihat Menu Dejavu Coffe House Lebak Bulus. Dalam aplikasi ini kami menggunakan website berbasis online, yang mana dalam pembentukannya menggunakan program php dan css"</h4>
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