<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final_project</title>
    <?php require('view/link.php');?>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>

    <!-- navbar -->
    <?php require('view/navbar.php');?>

    <!-- navbar end -->
    <!-- home -->
    <div id="home" class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container rounded">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="img/home/1.jpeg" class="d-block " />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="img/home/2.jpeg" class="d-block" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="img/home/3.jpeg" class="d-block" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="img/home/4.jpeg" class="d-block" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- home end -->
    <!-- Chek ketersediaan Kamar -->
    <div class="container availability-form">
        <div class="row justify-content-center">
            <div class="col-lg-10 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Cek Ketersediaan Kamar</h5>
                <form method="POST" action="proses-cek-ketersediaan.php">
                    <div class="row align-items-end">
                        <!-- Input untuk Check-in -->
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none" name="checkin" required>
                        </div>

                        <!-- Input untuk Check-out -->
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none" name="checkout" required>
                        </div>

                        <!-- Pilihan Tipe Kamar -->
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Tipe Kamar</label>
                            <select class="form-select shadow-none" name="tipe_kamar" required>
                                <option value="" disabled selected>Tipe Kamar</option>
                                <option value="Vvip">VVIP</option>
                                <option value="Vip">VIP</option>
                                <option value="Executive">Executive</option>
                                <option value="Suite">Suite</option>
                                <option value="Deluxe A">Deluxe A</option>
                                <option value="Deluxe B">Deluxe B</option>
                                <option value="Standar A">Standar A</option>
                                <option value="Standar B">Standar B</option>
                            </select>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-lg-3 mb-3">
                            <button type="submit" class="btn text-white shadow-none custom-bg w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- check end -->
    <!-- kamar -->
    <h2 class="mt-5 pt-4 mb-4 text-center fe-bold h-font">Kamar yang tersedia</h2>
    <div id="kamar" class="container my-5">
        <div class="row justify-content-center">
            <!-- Kamar 1 -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card h-100">
                    <img src="img/kamar/2.jpeg" class="card-img-top" alt="Standard Room">
                    <div class="card-body">
                        <h5 class="card-title">Vvip</h5>
                        <h6 class="text-muted mb-4">IDR 200,000 / malam</h6>
                        <div class="features mb-2">
                            <h6 class="mb-1">Deskripsi Kamar</h6>
                            <p class="small text-muted">
                                Kamar minimalis dengan harga terjangkau, cocok bagi Anda yang mencari akomodasi murah
                                dengan fasilitas standar.
                            </p>
                        </div>
                        <div class="fasilitas mb-2">
                            <h6 class="mb-1">Fasilitas Kamar</h6>
                            <ul class="list-unstyled mb-3">
                                <li class="small text-muted">1 Tempat Tidur</li>
                                <li class="small text-muted">1 Kamar Mandi</li>
                                <li class="small text-muted">TV</li>
                                <li class="small text-muted">AC</li>
                            </ul>
                        </div>
                        <div class="rating mb-2">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kamar 2 -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card h-100">
                    <img src="img/kamar/3.jpeg" class="card-img-top" alt="Superior Room">
                    <div class="card-body">
                        <h5 class="card-title">Superior Room</h5>
                        <h6 class="text-muted mb-4">IDR 300,000 / malam</h6>
                        <div class="features mb-2">
                            <h6 class="mb-1">Deskripsi Kamar</h6>
                            <p class="small text-muted">
                                Kamar superior sangat direkomendasikan untuk keluarga, cukup luas dengan suasana yang
                                aman dan nyaman.
                            </p>
                        </div>
                        <div class="fasilitas mb-2">
                            <h6 class="mb-1">Fasilitas Kamar</h6>
                            <ul class="list-unstyled mb-3">
                                <li class="small text-muted">2 Tempat Tidur Single</li>
                                <li class="small text-muted">1 Kamar Mandi</li>
                                <li class="small text-muted">TV</li>
                                <li class="small text-muted">AC</li>
                                <li class="small text-muted">Lemari</li>
                                <li class="small text-muted">Kursi</li>
                                <li class="small text-muted">Layanan Kamar 24 Jam</li>
                            </ul>
                        </div>
                        <div class="rating mb-2">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kamar 3 -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card h-100">
                    <img src="img/kamar/1.jpeg" class="card-img-top" alt="Suite Room">
                    <div class="card-body">
                        <h5 class="card-title">Suite Room</h5>
                        <h6 class="text-muted mb-4">IDR 425,000 / malam</h6>
                        <div class="features mb-2">
                            <h6 class="mb-1">Deskripsi Kamar</h6>
                            <p class="small text-muted">
                                Kamar luas dan nyaman, ideal untuk keluarga dengan fasilitas lengkap yang memberikan
                                kenyamanan maksimal.
                            </p>
                        </div>
                        <div class="fasilitas mb-2">
                            <h6 class="mb-1">Fasilitas Kamar</h6>
                            <ul class="list-unstyled mb-3">
                                <li class="small text-muted">2 Tempat Tidur (Single & Double)</li>
                                <li class="small text-muted">Kamar Mandi</li>
                                <li class="small text-muted">Teras atau Balkon</li>
                                <li class="small text-muted">Layanan Kamar 24 Jam</li>
                                <li class="small text-muted">Lemari</li>
                                <li class="small text-muted">Tirai Anti Tembus Pandang</li>
                                <li class="small text-muted">TV</li>
                                <li class="small text-muted">AC</li>
                            </ul>
                        </div>
                        <div class="rating mb-2">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol More Room -->
            <div class="col-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
            </div>
        </div>
    </div>

    <!-- kamar end -->
    <!-- Fasilitas -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Fasilitas Hotel</h2>
    <div id="fasilitas" class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/fasilitas/air-conditioner-svgrepo-com.svg" width="80px">
                <h5 class="mt-3">Ac</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/fasilitas/meeting-4-svgrepo-com.svg" width="80px">
                <h5 class="mt-3">Meeting room</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/fasilitas/wifi-svgrepo-com.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/fasilitas/air-conditioner-svgrepo-com.svg" width="80px">
                <h5 class="mt-3">Ac</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/fasilitas/air-conditioner-svgrepo-com.svg" width="80px">
                <h5 class="mt-3">Ac</h5>
            </div>
        </div>
    </div>
    <div class="col-12 text-center mt-5">
        <a href="fasilitas.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none h-font">More
            Fasilitas</a>
    </div>
    <!-- Fasilitas end -->
    <!-- review -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Review</h2>
    <div class="container">
        <div class="swiper swiper-review">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex text-align-center mb-4">
                        <img src="img/review/star-svgrepo-com (1).svg" width="30px">
                        <h6 class="m-0 ms-2">Random user</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti eius quia, placeat corrupti
                        qui quaerat beatae, molestias illum iusto est non debitis dolore libero facere ipsum dolor
                        laudantium assumenda sed.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex text-align-center mb-4">
                        <img src="img/review/star-svgrepo-com (1).svg" width="30px">
                        <h6 class="m-0 ms-2">Random user</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti eius quia, placeat corrupti
                        qui quaerat beatae, molestias illum iusto est non debitis dolore libero facere ipsum dolor
                        laudantium assumenda sed.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex text-align-center mb-4">
                        <img src="img/review/star-svgrepo-com (1).svg" width="30px">
                        <h6 class="m-0 ms-2">Random user</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti eius quia, placeat corrupti
                        qui quaerat beatae, molestias illum iusto est non debitis dolore libero facere ipsum dolor
                        laudantium assumenda sed.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- review end -->
    <!-- contact -->
    <!-- about -->


    <!-- about end -->
    <!-- Footer -->
    <?php require('view/footer.php');?>
    <!-- footer end -->

    <!-- js -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 2000,
            diableOnInteraction: false,
        }
    });
    var swiper = new Swiper(".swiper-review", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
    </script>
</body>

</html>