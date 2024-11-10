<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas</title>
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
<style>
.pop:hover {
    border-top-color: var(--warna1) !important;
    transform: scale(1.03);
    transition: all;
}
</style>

<body>

    <!-- navbar -->
    <?php require('view/navbar.php');?>
    <!-- navbar end -->

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Fasilitas Kami</h2>
        <hr>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias temporibus ipsam
            sint nam? Incidunt sunt <br>
            culpa eos officiis magnam officia deserunt error quos quo suscipit sit, similique repellat et voluptatibus!
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-item-center mb-2">
                        <img src="img/fasilitas/wifi-svgrepo-com.svg" width="40px">
                        <h5 class="m-0 ms-3">WIFI</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit recusandae iusto quas laborum
                        dolore magnam, reprehenderit amet modi, ducimus cupiditate sunt delectus laboriosam alias dicta
                        fuga minima animi. Expedita, earum!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-item-center mb-2">
                        <img src="img/fasilitas/wifi-svgrepo-com.svg" width="40px">
                        <h5 class="m-0 ms-3">WIFI</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit recusandae iusto quas laborum
                        dolore magnam, reprehenderit amet modi, ducimus cupiditate sunt delectus laboriosam alias dicta
                        fuga minima animi. Expedita, earum!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-item-center mb-2">
                        <img src="img/fasilitas/wifi-svgrepo-com.svg" width="40px">
                        <h5 class="m-0 ms-3">WIFI</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit recusandae iusto quas laborum
                        dolore magnam, reprehenderit amet modi, ducimus cupiditate sunt delectus laboriosam alias dicta
                        fuga minima animi. Expedita, earum!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-item-center mb-2">
                        <img src="img/fasilitas/wifi-svgrepo-com.svg" width="40px">
                        <h5 class="m-0 ms-3">WIFI</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit recusandae iusto quas laborum
                        dolore magnam, reprehenderit amet modi, ducimus cupiditate sunt delectus laboriosam alias dicta
                        fuga minima animi. Expedita, earum!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-item-center mb-2">
                        <img src="img/fasilitas/wifi-svgrepo-com.svg" width="40px">
                        <h5 class="m-0 ms-3">WIFI</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit recusandae iusto quas laborum
                        dolore magnam, reprehenderit amet modi, ducimus cupiditate sunt delectus laboriosam alias dicta
                        fuga minima animi. Expedita, earum!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-item-center mb-2">
                        <img src="img/fasilitas/wifi-svgrepo-com.svg" width="40px">
                        <h5 class="m-0 ms-3">WIFI</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit recusandae iusto quas laborum
                        dolore magnam, reprehenderit amet modi, ducimus cupiditate sunt delectus laboriosam alias dicta
                        fuga minima animi. Expedita, earum!</p>
                </div>
            </div>
        </div>
    </div>

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