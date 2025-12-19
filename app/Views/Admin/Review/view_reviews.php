<!-- Include Header -->
<?= view('Admin/common_layout/topbar') ?>

<style>
    .order-details-section {
        overflow-x: auto;
        white-space: nowrap;
    }
</style>

<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= view('Admin/common_layout/sidebar') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Review Details</h4>

                        <!-- Review Information Fields -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Customer Name</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $review['customer_name'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $review['product_name'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rating</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $review['rating'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Comment</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $review['comment'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Images</label>
                                    <div class="col-sm-9">
                                        <?php if ($review['images']): ?>
                                            <img src="<?= base_url($review['images']) ?>" width="100" height="100">
                                        <?php else: ?>
                                            <p class="form-control-static">No Image</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Created At</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $review['created_at'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

<!-- Include Footer -->
<?= view('Admin/common_layout/footer') ?>