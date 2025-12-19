<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('Admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Products</h4>
                        <div class="table-responsive">
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td>
                                                <?= $product['product_name'] ?>
                                            </td>
                                            <td> &#8377;
                                                <?= $product['product_price'] ?>
                                            </td>
                                            <td>
                                                <?= $product['category_name'] ?>
                                            </td>
                                            <td>
                                                <?= $product['brand_name'] ?>
                                            </td>
                                            <td><label class="badge badge-danger">
                                                    <?= $product['status'] == 1 ? "Active" : "Inactive" ?>
                                                </label></td>
                                            <td>
                                                <!-- View Product -->
                                                <a href="<?= base_url('/admin/product/view_product/' . $product['product_id']) ?>"
                                                    class="btn btn-warning btn-rounded btn-icon"> <button type="button"
                                                        class="btn btn-warning btn-rounded btn-icon">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                </a>

                                                <!-- Edit Product -->
                                                <a
                                                    href="<?= base_url('/admin/product/edit_product/' . $product['product_id']) ?>">
                                                    <button type="button" class="btn btn-success btn-rounded btn-icon">
                                                        <i class="ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                <!-- Delete Product -->

                                                <a
                                                    href="<?= base_url('/admin/product/delete_product/' . $product['product_id']) ?>">
                                                    <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                                        <i class="ti-solid ti-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
<!-- Include Footer -->
<?= $this->include('Admin/common_layout/footer') ?>