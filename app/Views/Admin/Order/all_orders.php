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
                        <h4 class="card-title">All Orders</h4>
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
                                        <th>Order ID</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Total Amount</th>
                                        <th>Payment ID</th>
                                        <th>Payer ID</th>
                                        <th>Status</th>
                                        <th>Payment Method</th>
                                        <th>Invoice Path</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Color</th>
                                        <th>Address Line 1</th>
                                        <th>Address Line 2</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Postal Code</th>
                                        <th>Country</th>
                                        <th>Style Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($orders as $order):
                                        ?>
                                        <tr>
                                            <td><?= $order['order_id'] ?></td>
                                            <td><?= $order['customer_id'] ?></td>
                                            <td><?= $order['customer_name'] ?></td>
                                            <td><?= $order['product_id'] ?></td>
                                            <td><?= $order['product_name'] ?></td>
                                            <td><?= $order['total_amount'] ?></td>
                                            <td><?= $order['payment_id'] ?></td>
                                            <td><?= $order['payer_id'] ?></td>
                                            <td><?= $order['status'] ?></td>
                                            <td><?= $order['payment_method'] ?></td>
                                            <td><?= $order['invoice_path'] ?></td>
                                            <td><?= $order['created_at'] ?></td>
                                            <td><?= $order['updated_at'] ?></td>
                                            <td><?= $order['color'] ?></td>
                                            <td><?= $order['address_line_1'] ?></td>
                                            <td><?= $order['address_line_2'] ?></td>
                                            <td><?= $order['city'] ?></td>
                                            <td><?= $order['state'] ?></td>
                                            <td><?= $order['postal_code'] ?></td>
                                            <td><?= $order['country'] ?></td>
                                            <td><?= $order['style_number'] ?></td>
                                            <td>
                                                <!-- View Order -->
                                                <a href="<?= base_url('/admin/orders/view_order/' . $order['order_id']) ?>"
                                                    class="btn btn-warning btn-rounded btn-icon"> 
                                                    <button type="button" class="btn btn-warning btn-rounded btn-icon">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                </a>
                                                <!-- Edit Order -->
                                                <a href="<?= base_url('/admin/orders/edit_order/' . $order['order_id']) ?>">
                                                    <button type="button" class="btn btn-success btn-rounded btn-icon">
                                                        <i class="ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                <!-- Delete Order -->
                                                <a href="<?= base_url('/admin/orders/delete_orders/' . $order['order_id']) ?>">
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