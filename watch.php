<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = "SELECT * FROM `film` WHERE film_id = '$id' ;";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link class="logo_nonton" rel="shortcut icon" href="img/icon.ico" type="image/logo_nonton.png">
    <title>Nonton.com</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand" href="index.php">
            <img class="logo_nonton" src="img/logo.png" alt="" width="150" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Sports">Sports<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=TV Series">TV shows</a>
                </li>
                <li class="nav-item"
                    <a class="nav-link" href="search.php?keyword=Movie">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Animation">Kids</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="search.php?keyword=K-Drama">K-Drama</a>
                        <a class="dropdown-item" href="search.php?keyword=action">Action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=romance">Romance</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="button-search" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {

    ?>
    <div class="container ">
        <br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <div class="kotak"></div>
                <h1><?php echo $data['title']; ?></h1>
                <span><?php echo $data['start_year']; ?></span> <br><br>
                <a href="" class="btn btn-secondary"><?php echo $data['genre']; ?></a>
                <p class="mt-3"><?php echo $data['summary']; ?></p>
                <div class="komentar mt-5">
                <h4>Comment</h4>
                    <form action="proses.php" method="POST">
                        <input type="text" name="film_id" value="<?php echo $data['film_id']; ?>" class="d-none">
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" placeholder="your name" required>
                        </div>
                        <div class="form-group">
                            <label for="komentar">Comment</label>
                            <input type="text" class="form-control" name="komentar" placeholder="..." required>
                        </div>
                        <button type="submit" class="btn btn-danger my-3 ml-auto">Submit</button>
                    </form>
                    <div class="detail-komentar">
                    <?php
                    $id = $data['film_id'];
$komentar = "SELECT * FROM `komentar` WHERE  film_id = '$id' ;";
$hasil = mysqli_query($koneksi, $komentar);

while ($komen = mysqli_fetch_array($hasil)) {
?>
                        <div class="row mt-3">
                            <div class="col-2">
                                <div class="profile"></div>
                            </div>
                            <div class="col-10">
                                <h6><?=$komen['nama']?></h6>
                                <p><?=$komen['komentar']?></p>
                               <span class="badge badge-secondary"><?=$komen['tanggal']?></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <h3>Rekomendasi</h3>
                <?php
$genre = $data['genre'];
$film = "SELECT * FROM `film` WHERE genre LIKE '%$genre%' LIMIT 5;";
$hasil = mysqli_query($koneksi, $film);


?>    <?php
$no = 0;
while ($rekom = mysqli_fetch_array($hasil)) {

?>
<a href="detail.php?id=<?php echo $rekom['film_id']; ?>">
    <img src="<?php echo $rekom['image_url']; ?>" class="poster mt-3" alt="" srcset="">
</a>
            
<?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</body>

</html>