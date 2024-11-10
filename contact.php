<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
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
        <h2 class="fw-bold h-font text-center">contact</h2>
        <hr>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias temporibus ipsam
            sint nam? Incidunt sunt <br>
            culpa eos officiis magnam officia deserunt error quos quo suscipit sit, similique repellat et voluptatibus!
        </p>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4">

                <iframe class="w-100 rounded mb-4" height="320px"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.443035545271!2d107.2787603!3d-6.336614300000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69772dce2ddda5%3A0x77080e8a6895ae8c!2sHotel%20Grand%20Kenari!5e0!3m2!1sid!2sid!4v1729866409908!5m2!1sid!2sid"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <h5>Alamat</h5>
                <a href="https://maps.app.goo.gl/cZdJf5CJF2j6DaT9A" target="_blank"
                    class="d-inline-block text-decoration-none text-dark ,b-2">
                    <i class="bi bi-geo-alt-fill"></i>JL. BHARATA KAV. B46, PERUMNAS BUMI, Telukjambe Timur, Karawang,
                    Jawa Barat 41371
                </a>
                <h5 class="mt-4">Contact </h5>
                <a href="" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone"></i>+625219930189
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 px-4">

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