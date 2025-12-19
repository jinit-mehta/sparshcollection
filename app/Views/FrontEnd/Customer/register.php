<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sparsh | Register</title>
    <!-- Include CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
    <style>
        .brand-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .brand-logo img {
            max-width: 140px;
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
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                            <!-- Centered Logo -->
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/images/upload/logo.webp') ?>" alt="Logo"
                                    style="max-width: 140px; margin: 0 auto;">
                            </div>

                            <!-- Error Alert -->
                            <?php if (session()->has('error')): ?>
                                <div class="alert alert-danger mt-3">
                                    <?= session('error') ?>
                                </div>
                            <?php endif; ?>

                            <h6 style="color: white;" class="font-weight-light">Sign up to continue.</h6>

                            <!-- Register Form -->
                            <form class="pt-3" method="post" action="<?= base_url('customer/register_check'); ?>">
                                <!-- Full Name Field -->
                                <div class="form-group">
                                    <input type="text" name="customer_name" class="form-control form-control-lg"
                                        id="exampleInputName1" placeholder="Full Name" required>
                                    <small class="form-notification">
                                        Please enter your full name.
                                    </small>
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <input type="email" name="customer_email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Enter Email" required>
                                    <small class="form-notification">
                                        Please enter a valid email address.
                                    </small>
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <input type="password" name="customer_password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" required>
                                    <small class="form-notification">
                                        Password must be at least 8 characters long, contain one uppercase letter, one
                                        number, and one special character.
                                    </small>
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control form-control-lg"
                                        id="exampleInputPassword2" placeholder="Confirm Password" required>
                                    <small class="form-notification">
                                        Please re-enter your password to confirm.
                                    </small>
                                </div>

                                <!-- Address Field -->
                                <div class="form-group">
                                    <input type="text" name="customer_address" class="form-control form-control-lg"
                                        id="exampleInputAddress1" placeholder="Address" required>
                                    <small class="form-notification">
                                        Please enter your full address.
                                    </small>
                                </div>

                                <!-- Phone Number Field -->
                                <div class="form-group">
                                    <input type="tel" name="customer_phone_no" class="form-control form-control-lg"
                                        id="exampleInputNumber1" placeholder="Phone Number" required>
                                    <small class="form-notification">
                                        Please enter a valid 10-digit phone number.
                                    </small>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        style="background-color: white; color: #273b79;">SIGN UP</button>
                                </div>

                                <!-- Login Link -->
                                <div class="text-center mt-4 font-weight-light" style="color: white;">
                                    Already have an account? <a href="<?= base_url('customer/login'); ?>"
                                        class="text-primary" style="color: white;"><u
                                            style="color: white;">Login</u></a>
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
</body>

</html>