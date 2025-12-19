<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/upload/favicon.ico') ?>">
    <title>Sparsh</title>
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
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/images/upload/logo.webp') ?>" alt="Logo"
                                    style="height: 90px; margin-right: 10px;">
                                <!-- <h3 class="text-center"> <strong>Ecom Hex</strong></h3> -->
                            </div>
                            <?php if (session()->has('error')): ?>
                                <div class="alert alert-success">
                                    <?= session('error') ?>
                                </div>
                            <?php endif; ?>
                            <form class="pt-3" method="post" action="<?= base_url('admin/register_check'); ?>">
                                <div class="form-group">
                                    <input type="name" name="admin_name" class="form-control form-control-lg"
                                        id="exampleInputName1" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="admin_email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="admin_password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control form-control-lg"
                                        id="exampleInputPassword2" placeholder="Confirm Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">CREATE
                                        NEW ACCOUNT</button>
                                </div>
                                <!--<div class="my-2 d-flex justify-content-between align-items-center">-->
                                <!--    <div class="form-check">-->
                                <!--        <label class="form-check-label text-muted">-->
                                <!--            <input type="checkbox" class="form-check-input">-->
                                <!--            Keep me signed in-->
                                <!--        </label>-->
                                <!--    </div>-->
                                <!--    <a href="#" class="auth-link text-black">Forgot password?</a>-->
                                <!--</div>-->
                                <!-- <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="ti-facebook mr-2"></i>Connect using facebook
                                    </button>
                                </div> -->
                                <div class="text-center mt-4 font-weight-light"  style="color:white;">
                                    Already have an account? <a href="<?= base_url('admin/login'); ?>"
                                        class="text-primary"  style="color:white;">Login</a>
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