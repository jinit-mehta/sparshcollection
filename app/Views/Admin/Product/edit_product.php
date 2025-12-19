<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>

<style>
    .price-breakup-input {
        width: 120px;
    }

    .price-breakup-section {
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

            <form class="form-sample" action="<?= base_url('/admin/product/check_edit_product') ?>" method="post"
                enctype="multipart/form-data">
                <input type="hidden" value="<?= esc($product->product_id) ?>" name="product_id">

                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Product</h4>

                            <!-- Product Information Fields -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?= $product->product_name ?>" name="product_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control"
                                                value="<?= $product->product_price ?>" name="product_price" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Style Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="style_number"
                                                value="<?= $product->style_number ?>" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Price Breakup Table -->
                            <div class="price-breakup-section mt-4">
                                <h4 class="fs-5" style="color: #273B79;">Price Breakdown</h4>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Dia PCS</th>
                                            <th>Dia Quality</th>
                                            <th>Dia CTS</th>
                                            <th>Silver Net WT</th>
                                            <th>Length Bracelet</th>
                                            <th>Pearl Piece</th>
                                            <th>Pearl WT</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="dia_pcs" value="<?= $product->dia_pcs ?>"></td>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="dia_quality" value="<?= $product->dia_quality ?>"></td>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="dia_cts" value="<?= $product->dia_cts ?>"></td>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="silver_net_wt" value="<?= $product->silver_net_wt ?>"></td>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="length_bracelet" value="<?= $product->length_bracelet ?>">
                                            </td>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="pearl_piece" value="<?= $product->pearl_piece ?>"></td>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="pearl_wt" value="<?= $product->pearl_wt ?>"></td>
                                            <td><input type="text" class="form-control price-breakup-input"
                                                    name="total_price" value="<?= $product->total_price ?>" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Product Image -->
                            <div class="form-group mt-4">
                                <label>Product Image</label>
                                <input type="file" name="product_image" id="fileInput" class="file-upload-default"
                                    onchange="updateFileName()">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" id="fileInfo"
                                        placeholder="<?= $product->product_image ?>" readonly>
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button"
                                            id="uploadButton">Upload</button>
                                    </span>
                                </div>
                                <img class="img-thumbnail mt-2"
                                    src="<?= base_url('/assets/images/upload/') . $product->product_image ?>" alt="">
                            </div>

                            <!-- Product Description -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Product Description</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4"
                                            name="product_desc"><?= $product->product_desc ?></textarea>
                                        <script>CKEDITOR.replace('product_desc');</script>
                                    </div>
                                </div>
                            </div>

                            <!-- Select Colors Section -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group" style="padding: 10px;">
                                        <label style="font-weight: bold; font-size: 16px; padding: 10px;">Select Colors</label>
                                        <div class="color-checkboxes">
                                            <?php
                                            $colors = json_decode($product->colors ?? '[]', true);
                                            $allColors = [
                                                'Rose Gold' => '#f3d4c8',
                                                'White Gold' => '#e5e4e2',
                                                'Yellow Gold' => '#efe3bb',
                                            ];
                                            foreach ($allColors as $color => $code) {
                                                $checked = in_array($color, $colors) ? 'checked' : '';
                                                echo "<label>
                                                    <input type='checkbox' name='colors[]' value='$color' $checked> 
                                                    <span style='background-color: $code; padding: 5px 10px; border-radius: 5px;'>$color</span>
                                                </label>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
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

<!-- Script for file upload and price calculation -->
<script>
    function updateFileName() {
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');

        if (fileInput.files.length > 0) {
            fileInfo.value = fileInput.files[0].name;
        }
    }

    document.getElementById('uploadButton').addEventListener('click', function () {
        document.getElementById('fileInput').click();
    });

    // Price Calculation Functionality
    function calculatePriceBreakup() {
        const gWt = parseFloat(document.getElementById('g_wt').value) || 0;
        const silverRate = parseFloat(document.getElementById('silver_rate').value) || 0;
        const labourRate = parseFloat(document.getElementById('labour_rate').value) || 0;
        const diaAmount = parseFloat(document.getElementById('dia_amount').value) || 0;

        const silverAmount = gWt * silverRate;
        const labour = gWt * labourRate;
        const totalPrice = silverAmount + labour + diaAmount;

        document.getElementById('silver_amount').value = silverAmount.toFixed(2);
        document.getElementById('labour').value = labour.toFixed(2);
        document.getElementById('total_price').value = totalPrice.toFixed(2);
    }

    document.querySelectorAll('#g_wt, #silver_rate, #labour_rate, #dia_amount').forEach(input => {
        input.addEventListener('input', calculatePriceBreakup);
    });
</script>