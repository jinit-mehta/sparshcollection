<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('Admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View Brand</h4>
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" placeholder="Enter Brand name here" aria-label="Username" value="<?= $brand['brand_name'] ?>" readonly>
                            </div>
                            <!-- Status -->
                            <!-- <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="form-check mt-0">
                                        <label class="col-form-label">
                                            <input style="margin-right: 10px;" type="radio" name="status" value="1"
                                                </?= $brand['status'] == 1 ? "checked" : "" ?> readonly>
                                            Active
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-check mt-0">
                                        <label class="col-form-label">
                                            <input style="margin-right: 10px;" type="radio" name="status" value="0"
                                                </?= $brand['status'] == 0 ? "checked" : "" ?> readonly>
                                            In Active
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title ">Add Brand</h4>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" value="</?= $brand['slug'] ?>" readonly>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                                <label>Brand Image</label>
                                <input type="file" name="brand_image" id="fileInput" class="file-upload-default"
                                    onchange="updateFileName()">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" id="fileInfo" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button"
                                            id="uploadButton">Upload</button>
                                    </span>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleTextarea1">Brand Description</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="brand_desc"><?= $brand['brand_desc'] ?></textarea>
                                    <script>
                                        CKEDITOR.replace('brand_desc');
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>


<!-- Include Header -->
<?= $this->include('Admin/common_layout/footer') ?>

<!-- Script for file upload  -->
<script>
    function updateFileName() {
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');

        if (fileInput.files.length > 0) {
            fileInfo.value = fileInput.files[0].name;
        }
    }

    document.getElementById('uploadButton').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });
</script>