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
                        <h4 class="card-title">All Category</h4>
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
                                        <th>Sr no.</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($categories as $category):
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>
                                            </td>
                                            <td>
                                                <?= $category['category_name'] ?>
                                            </td>
                                            <td>
                                                <?= $category['category_desc'] ?>
                                            </td>

                                            <td><label class="badge badge-danger">
                                                    <?= $category['status'] == 1 ? "Active" : "In active" ?>
                                                </label></td>
                                            <td>
                                                <!-- View Product -->
                                                <a href="<?= base_url('/admin/category/view_category/' . $category['category_id']) ?>"
                                                    class="btn btn-warning btn-rounded btn-icon"> <button type="button"
                                                        class="btn btn-warning btn-rounded btn-icon">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                </a>

                                                <!-- Edit Product -->
                                                <a
                                                    href="<?= base_url('/admin/category/edit_category/' . $category['category_id']) ?>">
                                                    <button type="button" class="btn btn-success btn-rounded btn-icon">
                                                        <i class="ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                <!-- Delete Product -->
                                                <a
                                                    href="<?= base_url('/admin/category/delete_category/' . $category['category_id']) ?>">
                                                    <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                                        <i class="ti-solid ti-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php  $i++;  endforeach;
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