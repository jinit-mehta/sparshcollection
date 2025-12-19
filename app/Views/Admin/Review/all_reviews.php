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
                        <h4 class="card-title">All Reviews</h4>
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
                                        <th>Review ID</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Images</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($reviews as $review):
                                        ?>
                                        <tr>
                                            <td><?= $review['review_id'] ?></td>
                                            <td><?= $review['customer_name'] ?></td>
                                            <td><?= $review['product_name'] ?></td>
                                            <td><?= $review['rating'] ?></td>
                                            <td><?= $review['comment'] ?></td>
                                            <td>
                                                <?php if ($review['images']): ?>
                                                    <img src="<?= base_url($review['images']) ?>" width="50" height="50">
                                                <?php else: ?>
                                                    No Image
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $review['created_at'] ?></td>
                                            <td>
                                                <!-- View Review -->
                                                <a href="<?= base_url('/admin/review/view_review/' . $review['review_id']) ?>"
                                                    class="btn btn-warning btn-rounded btn-icon">
                                                    <button type="button" class="btn btn-warning btn-rounded btn-icon">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                </a>
                                                <!-- Delete Review -->
                                                <a href="<?= base_url('/admin/review/delete_review/' . $review['review_id']) ?>">
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
<!-- Include Footer -->
<?= $this->include('Admin/common_layout/footer') ?>