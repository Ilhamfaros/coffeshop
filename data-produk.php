<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Cari Produk" class="produk">           
				<input type="submit" name="cari" value="Cari Produk" class="produk">
			</form>
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
            <h3>Data Produk</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga Panas</th>
                        <th>Harga Dingin</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th width="150px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $itemsPerSlide = 8;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $itemsPerSlide;
                    
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $query = "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) WHERE product_name LIKE '%$search%' ORDER BY product_id DESC LIMIT $offset, $itemsPerSlide";
                        $countQuery = "SELECT COUNT(*) as total FROM tb_product LEFT JOIN tb_category USING (category_id) WHERE product_name LIKE '%$search%'";
                    } else {
                        $query = "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC LIMIT $offset, $itemsPerSlide";
                        $countQuery = "SELECT COUNT(*) as total FROM tb_product LEFT JOIN tb_category USING (category_id)";
                    }

                    $result = mysqli_query($conn, $query);
                    $counter = ($currentPage - 1) * $itemsPerSlide + 1;

                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $counter ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price_p']) ?></td>
                            <td>Rp. <?php echo number_format($row['product_price_d']) ?></td>
                            <td><a href="produk/<?php echo $row ['product_image'] ?>" target="_blank"> <img
                                            src="produk/<?php echo $row ['product_image'] ?>" width="50px"> </a></td>
                            <td><?php echo ($row['product_status'] == 0) ? 'Tidak Aktif' : 'Aktif' ?></td>
                            <td>
                                <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> ||
                                <a href="proses-hapus.php.?idp=<?php echo $row['product_id'] ?>"
                                   onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>

                <?php
                // Query untuk mendapatkan jumlah total data
                $countResult = mysqli_query($conn, $countQuery);
                $countRow = mysqli_fetch_assoc($countResult);
                $totalData = $countRow['total'];

                // Menghitung jumlah total halaman
                $totalPages = ceil($totalData / $itemsPerSlide);
                ?>

                <div class="pagination">
                    <?php if ($currentPage > 1) { ?>
                        <a href="?page=<?php echo $currentPage - 1; ?>">Prev</a>
                    <?php } ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                        <a href="?page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                    <?php } ?>

                    <?php if ($currentPage < $totalPages) { ?>
                        <a href="?page=<?php echo $currentPage + 1; ?>">Next</a>
                    <?php } ?>
                </div>

                <p><a href="tambah-produk.php">Tambah Data</a></p>
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
