<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>

<style>
    .order-details-input {
        width: 100%;
    }

    .order-details-section {
        overflow-x: auto;
        white-space: nowrap;
    }
</style>

<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('Admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Validation Errors -->
            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Success Message -->
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <?= esc(session('success')) ?>
                </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= esc(session('error')) ?>
                </div>
            <?php endif; ?>

            <form class="form-sample" action="<?= base_url('/admin/orders/check_edit_order') ?>" method="post">
                <input type="hidden" value="<?= esc($order['order_id']) ?>" name="order_id">

                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Order</h4>

                            <!-- Order Information Fields -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Customer Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['customer_name']) ?>" name="customer_name"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['product_name']) ?>" name="product_name"
                                                required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Total Amount</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control"
                                                value="<?= esc($order['total_amount']) ?>" name="total_amount"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status" required>
                                                <option value="Pending" <?= $order['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="Shipped" <?= $order['status'] === 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                                                <option value="Delivered" <?= $order['status'] === 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                                                <option value="Cancelled" <?= $order['status'] === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Payment Method</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['payment_method']) ?>" name="payment_method"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Invoice Path</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['invoice_path']) ?>" name="invoice_path"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Fields -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Color</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['color']) ?>" name="color" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Style Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['style_number']) ?>" name="style_number" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address Line 1</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['address_line_1']) ?>" name="address_line_1" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address Line 2</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['address_line_2']) ?>" name="address_line_2" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['city']) ?>" name="city" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['state']) ?>" name="state" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Postal Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['postal_code']) ?>" name="postal_code" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= esc($order['country']) ?>" name="country" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

<!-- Include Footer -->
<?= $this->include('Admin/common_layout/footer') ?>