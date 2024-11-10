<?php
require_once 'core/init.php';
session_start();
if (isset($_SESSION['login_error'])) {
    echo "<script type='text/javascript'>alert('" . addslashes($_SESSION['login_error']) . "');</script>";
    unset($_SESSION['login_error']); // Hapus pesan kesalahan setelah ditampilkan
}

?>

<style>
body {
    background-image: url('img/home/1.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.bg-gradient {
    background: rgba(0, 0, 0, 0.5);
}

/* Menambahkan border ke card */
.card {
    border: 3px solid #ffffff;
    /* Ganti warna sesuai keinginan */
    /* Atur ketebalan border di sini */
    border-radius: 1rem;
    /* Radius border card */
}
</style>


<body>
    <section class="bg-gradient">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white border border-2 " style="background-color: rgba(0, 123, 255, 0.5);">
                        <div class=" card-body p-5 text-center">
                            <form action="backend/login_proses.php" method="POST">
                                <div class="mb-md-5 mt-md-4">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5"></p>

                                    <?php if (isset($error)): ?>
                                    <div class="alert alert-danger" role="tamu">
                                        <?php echo $error; ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="username" name="username"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="username">Username:</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="password">Password:</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </div>

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="register.php"
                                            class="text-white-50 fw-bold">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>