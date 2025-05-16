<?php 
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale=1">
	<title>Dejavu Coffee House</title>
	<link rel="shortcut icon" href="img/logo1.png">
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
        <ul class="navigation">
            <li><a href="produk.php" class="btn">Produk</a></li>
        </ul>
    </div>
</header>




	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" class="produk">
				<input type="submit" name="cari" value="Cari Produk" class="produk">
			</form>
		</div>
	</div>

	<!-- category -->
	<div class="section">
		<div class="container">
			<h3>Ketegori</h3>
			<div class="box">
				<?php 
					$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
			 	?>	
			 		<a href="produk.php?kat=<?php echo $k['category_id'] ?>">
						<div class="col-5">
							<img src="img/book.gif" width="50px" style="margin-bottom: 5px;">
							<p><?php echo $k['category_name'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>		
	</div>

	<!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php 
					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				 ?>
				 				 <a href="d-produk.php?id=<?php echo $p['product_id'] ?>">
							<div class="col-4">
								<img src="produk/<?php echo $p['product_image'] ?>">	
								<p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
								<p> Panas </p> 
								<p class="harga">Rp. <?php echo number_format($p['product_price_p']) ?></p>
								<br/>
								<p> Dingin </p> 
								<p class="harga">Rp. <?php echo number_format($p['product_price_d']) ?></p>

							</div>
						</a>
				<?php }}else{ ?>
					<p>Produk tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p>Jl. H. Nudin No.70, RT.5/RW.3, Lb. Bulus, Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12440</p>

			<h4>Email</h4>
			<p>ilhamfaros@gmail.com</p>

			<h4>No. Hp</h4>
			<p>081387123180</p>
			<small>Copyright &copy; 2023 - Dejavu Coffee.</small>
		</div>
	 
	<div class="buttonToTop" onclick="scrollToTop()">
    <img src="img/imgtop.png" alt="Logo"width="50" height="50">
</div>

<script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        var buttonToTop = document.querySelector(".buttonToTop");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            buttonToTop.classList.add("show");
        } else {
            buttonToTop.classList.remove("show");
        }
    }

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
</script>

</body>
</html>