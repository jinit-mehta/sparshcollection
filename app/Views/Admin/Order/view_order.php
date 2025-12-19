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
                        <h4 class="card-title">Order Details</h4>

                        <!-- Order Information Fields -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Customer Name</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $order['customer_name'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $order['product_name'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Amount</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static">₹<?= number_format($order['total_amount'], 2) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $order['status'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Payment Method</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $order['payment_method'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Invoice Path</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $order['invoice_path'] ?></p>
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