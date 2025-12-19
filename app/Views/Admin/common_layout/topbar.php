<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sparsh Admin</title>
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
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/upload/favicon.ico') ?>">
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
  <style>
    /* Ensure the profile image container is square */
    .profile-image-container {
      width: 40px;
      /* Adjust size as needed */
      height: 40px;
      /* Must match width for a square */
      border-radius: 50%;
      /* Optional: Makes it circular */
      overflow: hidden;
      /* Ensures the image stays within the container */
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f3f4f8;
      /* Optional: Background color for the container */
    }

    /* Ensure the image fits perfectly inside the square container */
    .profile-image {
      width: 100%;
      /* Ensures the image fills the container */
      height: 100%;
      /* Ensures the image fills the container */
      object-fit: cover;
      /* Ensures the image maintains aspect ratio */
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <h4 class="mb-0">
          <a class="col_dark" href="<?= base_url() ?>">
            <i class="fa fa-shopping-cart col_oran fs-1 me-1 align-middle"></i> <br>
          </a>
        </h4>
        <a class="navbar-brand brand-logo mr-5"> <img src="<?= base_url('assets/images/upload/logo.webp') ?>" alt="Logo"
            class="mr-2"></a>
        <a class="navbar-brand brand-logo-mini"> <img src="<?= base_url('assets/images/upload/logo.webp') ?>" alt="Logo"
            class="mr-2"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <!-- Ensure the image is square and fixed size -->
              <div class="profile-image-container">
                <img src="<?= base_url('assets/images/upload/user.png') ?>" alt="Profile Image" class="profile-image">
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="<?= base_url('/admin/logout') ?>">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>