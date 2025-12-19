<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('Admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Brands</h4>
                        <div class="table-responsive">
                            <?php if (session()->has('success')) : ?>
                                <div class="alert alert-success">
                                    <?= session('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->has('error')) : ?>
                                <div class="alert alert-danger">
                                    <?= session('error') ?>
                                </div>
                            <?php endif; ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Brand Name</th>
                                        <th>Brand Description</th>
                                        <!-- <th>Status</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($brands as $brand) :
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>
                                            </td>
                                            <td>
                                                <?= $brand['brand_name'] ?>
                                            </td>
                                            <td>
                                                <?= $brand['brand_desc'] ?>
                                            </td>

                                            <!-- <td><label class="badge badge-danger">
                                                    </?= $brand['status'] == 1 ? "Active" : "In active" ?>
                                                </label></td> -->
                                            <td>
                                                <!-- View Product -->
                                                <a href="<?= base_url('/admin/brands/view_brands/' . $brand['brand_id']) ?>" class="btn btn-warning btn-rounded btn-icon"> <button type="button" class="btn btn-warning btn-rounded btn-icon">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                </a>

                                                <!-- Edit Product -->
                                                <a href="<?= base_url('/admin/brands/edit_brands/' . $brand['brand_id']) ?>">
                                                    <button type="button" class="btn btn-success btn-rounded btn-icon">
                                                        <i class="ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                <!-- Delete Product -->
                                                <a href="<?= base_url('/admin/brands/delete_brands/' . $brand['brand_id']) ?>">
                                                    <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                                        <i class="ti-solid ti-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach;
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- Include Header -->
<?= $this->include('Admin/common_layout/footer') ?>