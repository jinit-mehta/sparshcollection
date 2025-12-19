<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('Admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Check if there are any validation errors -->
            <form class="form-sample" action="<?= base_url('admin/product/add') ?>" method="post"
                enctype="multipart/form-data">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View Product</h4>

                            <p class="card-description">
                                Product Detail
                            </p>

                            <!-- Product Name -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->product_name ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->product_price ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Style Number</label>
                                    <div class="col-sm-9">
                                        <p><?= $product->style_number ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Quantity and Category -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->quantity ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->category_name ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Brand and Status -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Brand</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->brand_name ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->status == 1 ? 'Active' : 'Inactive' ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Feature Product -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Feature Product</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->feature_product == 1 ? 'Yes' : 'No' ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product Added At</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->product_added_at ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dia PCS and Dia Quality -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Dia PCS</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->dia_pcs ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Dia Quality</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->dia_quality ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dia CTS and Silver Net WT -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Dia CTS</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->dia_cts ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Silver Net WT</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->silver_net_wt ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Length Bracelet and Pearl Piece -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Length Bracelet</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->length_bracelet ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pearl Piece</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->pearl_piece ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pearl WT and Total Price -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pearl WT</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->pearl_wt ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Total Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->total_price ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Description -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Product Description</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4"
                                            readonly><?= $product->product_desc ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Image -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <img src="<?= base_url('assets/images/upload/') . $product->product_image ?>"
                                            alt="Product Image" class="img-thumbnail" style="width: 150px;">
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Button -->
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?= base_url('/admin/product/delete_product/' . $product->product_id) ?>"
                                        class="btn btn-primary">Edit This Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->

<!-- Include Footer -->
<?= $this->include('Admin/common_layout/footer') ?>