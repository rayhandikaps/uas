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
                    <a class="nav-link" href="search.php?keyword=TV Series">TV Shows</a>
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

    <?php
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {

    ?>
        <!-- Banner -->
        <div class="bg-blur" style="background-image: url('<?php echo $data['image_url']; ?>');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <img src="<?php echo $data['image_url']; ?>" class="poster detail-poster" alt="" srcset="">
                </div>
                <div class="col-lg-10">
                    <h1><?php echo $data['title']; ?></h1>
                    <span class="badge badge-pill badge-light mx-3"><?php echo $data['age']; ?></span><b><span class="mx-3"><?php echo $data['genre']; ?></span></b>
                    <br>
                    <a href="watch.php?id=<?php echo $data['film_id']; ?>" class="btn btn-danger btn-watch my-3">Watch Now</a>
                    <p><?php echo $data['summary']; ?>

                    </p>

                    <b>Negara :</b><span><?php echo $data['country']; ?></span><br>
                    <b>Pemain :</b><span>
                        <div id="cast"></div>
                    </span>
<script>
    const cast = <?php echo $data['cast']; ?>;
        let c = cast.toString();
        document.getElementById("cast").innerHTML = c;
</script>
                    <?php
$genre = $data['genre'];
$film = "SELECT * FROM `film` WHERE genre LIKE '%$genre%';";
$hasil = mysqli_query($koneksi, $film);


?>


                    <h1 class="mt-5">Related Movies</h1>
                    <div class="row my-3">
                    <?php
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {

                ?>
                        <div class="col-2 mt-2">
                            <a href="detail.php?id=<?php echo $data['film_id']; ?>">
                            <img src="<?php echo $data['image_url']; ?>" class="poster" alt="" srcset="">
                        </a>
                            
                        </div>
                        <?php } ?>
                       
                    </div>
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

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 30,
            slidesPerGroup: 5,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

    </script>
</body>

</html>