<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/maps/vertical-layout-light/style.css.map') ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet"
        href="<?= base_url('assets/admin/css/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/select2/select2.min.css') ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/admin/css/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vertical-layout-light/style.css') ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <link href="<?= base_url('assets/front/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/global.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/index.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/cart.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/front/assets/js/bootstrap.bundle.min.js') ?>">
    </script>

    <style>
        .brand-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            /* Add some spacing below the logo */
        }

        .brand-logo img {
            max-width: 120px;
            /* Adjust the logo size */
            height: auto;
        }

        .form-notification {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <!-- Start Header  -->
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <!-- Center the logo -->
                            <div class="brand-logo text-center">
                                <img src="<?= base_url('assets/images/upload/logo.webp') ?>" alt="logo"
                                    style="max-width: 140px;">
                            </div>
                            <!-- Success and Error Messages -->
                            <?php if (session()->has('success')): ?>
                                <div class="alert alert-success">
                                    <?= session('success') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->has('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session('error') ?>
                                </div>
                            <?php endif; ?>

                            <!-- Login Form -->
                            <form class="pt-3" action="<?= base_url('/customer/login') ?>" method="post">
                                <!-- Email Field -->
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="customer_email" required>
                                    <small class="form-notification">
                                        Please enter a valid email address.
                                    </small>
                                </div>
                                <!-- Password Field -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="customer_password"
                                        required>
                                    <small class="form-notification">
                                        Password must be at least 8 characters long, contain one uppercase letter, one
                                        number, and one special character.
                                    </small>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        style="background-color:white; color:#273b79;">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light" style="color: white;">
                                    Don't have an account? <a href="<?= base_url('/customer/register') ?>"
                                        class="text-primary" style="color: white;"><u
                                            style="color: white;">Create</u></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</body>

</html>