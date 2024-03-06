<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for produk update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $produk = $_POST['nama_produk'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // update produk data
    $result = mysqli_query($conn, "UPDATE produk SET nama_produk='$produk',keterangan='$keterangan',harga='$harga',jumlah='$jumlah' WHERE id=$id");

    // Redirect to homepage to display updated produk in list
    header("Location: index.php");
}
?>
<?php
// Display selected produk data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech produk data based on id
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");

if ($produk_data = mysqli_fetch_array($result)) {
    $produk = $produk_data['nama_produk'];
    $keterangan = $produk_data['keterangan'];
    $harga = $produk_data['harga'];
    $jumlah = $produk_data['jumlah'];
} else {
    // Menangani kasus di mana tidak ada data yang ditemukan untuk ID yang diberikan
    echo "Tidak ada data ditemukan untuk ID yang diberikan.";
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Produk</title>
</head>

<body>
    <div class="container border">
        <div class="content">
            <a class="btn btn-primary" href="index.php">Go to Home</a>

            <h1 class="text-center">Edit Produk</h1>
            <form name="update_produk" method="post" action="edit.php">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" value=<?php echo $produk; ?>>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value=<?php echo $keterangan; ?>>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-control" name="harga" value=<?php echo $harga; ?>>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value=<?php echo $jumlah; ?>>
                </div>
                <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                <input class="btn btn-success mt-3" type="submit" name="update" value="Update"></input>
            </form>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>