<?php
include('koneksi.php');

$keyword = $_GET['keyword'];
if ($_GET['keyword']=='kids') {
    $sql = "SELECT * FROM `film` WHERE `age` = 'UA'  ;";
}else{
    $sql = "SELECT * FROM `film` WHERE genre LIKE '%$keyword%' OR `age` = '$keyword' OR `film_type`= '$keyword' OR title LIKE '%$keyword%' OR `cast` LIKE '%$keyword%'   ;";
}

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
            <img class="logo_nonton" src="img/logo_nonton.png" alt="" width="150" srcset="">
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
                <li class="nav-item">
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


    <div class="container ">
        <br><br><br><br><br><br><br>
        <h3>Result : <span class="result1"><?=$_GET['keyword']?></span> <br>
        <?php
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {

            ?>
            <div class="row mt-3 movie">
                <div class="col-lg-2">
                    <img src="<?=$data['image_url'];?>" class="poster" alt="" srcset="">
                </div>
                <div class="col-lg-10">
                    <h1><?=$data['title'];?></h1>
                    <span class="rating"><?php echo $data['rating']; ?>⭐️</span><br>
                    <span class="genre1"><?php echo $data['genre']; ?></span>
                    </h6>
                </div>
            </div>
            <?php }?>
            
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</body>

</html>