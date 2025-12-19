<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>
<link rel="stylesheet" href="<?= base_url('assets/admin/css/addProduct.css') ?>">
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('Admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Check if there are any validation errors -->
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
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>

<form class="form-sample" action="<?= base_url('admin/product/check_add_product') ?>" method="post" enctype="multipart/form-data">
                <!-- CSRF Token -->
                  <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Product</h4>

                                <!-- Product Information Fields -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Product Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="product_name" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Price</label>
                                            <div class="col-sm-9">
                                                <input type="number" step="0.01" class="form-control" name="product_price" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Quantity</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="quantity" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Style Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="style_number" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control" required>
                                                <option value="">Select Category</option>
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <select name="brand_id" class="form-control" required>
                                                <option value="">Select Brand</option>
                                                <?php foreach ($brands as $brand): ?>
                                                    <option value="<?= $brand['brand_id'] ?>"><?= $brand['brand_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="status" required>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Feature Product</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="feature_product" required>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               <!-- Price Breakup Table -->
<div class="price-breakup-section mt-4">
    <h4 class="card-title">Product Description</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Diamond PCS</th>
                <th>Diamond Quality</th>
                <th>Diamond Color</th>
                <th>Diamond CTS</th>
                <th>Silver Net WT</th>
                <th>Length Bracelet</th>
                <th>Pearl Piece</th>
                <th>Pearl WT</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" class="form-control" name="dia_pcs"></td>
                <td><input type="text" class="form-control" name="dia_quality"></td>
                <td><input type="text" class="form-control" name="dia_color"></td>
                <td><input type="text" class="form-control" name="dia_cts"></td>
                <td><input type="text" class="form-control" name="silver_net_wt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                <td><input type="text" class="form-control" name="length_bracelet" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                <td><input type="text" class="form-control" name="pearl_piece"></td>
                <td><input type="text" class="form-control" name="pearl_wt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                <td><input type="text" class="form-control" name="total_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
            </tr>
        </tbody>
    </table>
</div>
                               <div class="form-group" style="padding:10px;">
    <label class="mb-2" style="font-weight:bold; font-size:16px; padding: 10px;">Product Images</label>
    <input type="file" name="product_image[]" id="fileInput" class="form-control mb-2" multiple accept="image/*" onchange="previewImages()">
    <!-- Preview Container -->
    <div id="previewContainer" class="image-preview-container mt-3"></div>
</div>

                                <!-- Product Description -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" style="padding: 10px;">
                                            <label for="exampleTextarea1" style="padding: 10px;">Product Description</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="product_desc"></textarea>
                                            <script>CKEDITOR.replace('product_desc');</script>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
        <div class="col-md-12 text-center" style="padding: 30px;">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Footer -->
<?= $this->include('Admin/common_layout/footer') ?>

<!-- JavaScript for File Upload Preview -->
<script>
    // Set the Start Date and Estimated Delivery Date
    function setDeliveryDates() {
        const startDateElement = document.getElementById('startDate');
        const deliveryDateElement = document.getElementById('deliveryDate');

        const today = new Date();
        startDateElement.textContent = today.toLocaleDateString();

        const estimatedDeliveryDate = new Date(today);
        estimatedDeliveryDate.setDate(today.getDate() + 7); // Example: 7 days for delivery
        deliveryDateElement.textContent = estimatedDeliveryDate.toLocaleDateString();
    }

    // Call setDeliveryDates on page load
    window.onload = setDeliveryDates;

    // Preview Image Functionality
    // Replace your existing previewImages function and add these functions

// Global array to store all selected files
let selectedFiles = [];

function previewImages() {
    const fileInput = document.getElementById('fileInput');
    const newFiles = Array.from(fileInput.files);
    
    // Add new files to the selectedFiles array
    selectedFiles = [...selectedFiles, ...newFiles];
    
    // Clear the file input to allow selecting the same files again if needed
    fileInput.value = '';
    
    // Update the preview display
    updatePreview();
}

function updatePreview() {
    const previewContainer = document.getElementById('previewContainer');
    previewContainer.innerHTML = ''; // Clear previous previews
    
    // Create the controls for file management
    const controlsDiv = document.createElement('div');
    controlsDiv.className = 'file-controls mb-3';
    controlsDiv.innerHTML = `
        <button type="button" class="btn btn-sm btn-danger" onclick="clearAllFiles()">Clear All</button>
    `;
    previewContainer.appendChild(controlsDiv);

    // Create a container for the file previews
    const filesDiv = document.createElement('div');
    filesDiv.className = 'file-previews d-flex flex-wrap';
    previewContainer.appendChild(filesDiv);
    
    // Display each file with controls for reordering
    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const fileDiv = document.createElement('div');
            fileDiv.className = 'file-item position-relative m-2';
            fileDiv.dataset.index = index;
            
            // File preview
            fileDiv.innerHTML = `
                <div class="image-container" style="width: 120px; position: relative;">
                    <img src="${e.target.result}" alt="${file.name}" style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; padding: 3px;">
                    <div class="file-name text-center" style="font-size: 10px; margin-top: 3px; max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        ${file.name}
                    </div>
                    <div class="file-controls d-flex justify-content-between mt-1">
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="moveFile(${index}, -1)" ${index === 0 ? 'disabled' : ''}>↑</button>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile(${index})">×</button>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="moveFile(${index}, 1)" ${index === selectedFiles.length - 1 ? 'disabled' : ''}>↓</button>
                    </div>
                </div>
            `;
            
            filesDiv.appendChild(fileDiv);
            
            // Ensure we maintain the correct order in the DOM
            reorderDOMElements();
        };
        reader.readAsDataURL(file);
    });
    
    // Update the hidden file input with the current files
    updateFormData();
}

function moveFile(index, direction) {
    if ((direction < 0 && index > 0) || (direction > 0 && index < selectedFiles.length - 1)) {
        // Swap the files in the array
        const newIndex = index + direction;
        [selectedFiles[index], selectedFiles[newIndex]] = [selectedFiles[newIndex], selectedFiles[index]];
        
        // Update the preview
        updatePreview();
    }
}

function removeFile(index) {
    // Remove the file from the array
    selectedFiles.splice(index, 1);
    
    // Update the preview
    updatePreview();
}

function clearAllFiles() {
    selectedFiles = [];
    updatePreview();
}

function reorderDOMElements() {
    const filesDiv = document.querySelector('.file-previews');
    if (!filesDiv) return;
    
    const items = Array.from(filesDiv.querySelectorAll('.file-item'));
    
    // Sort the elements by their data-index attribute
    items.sort((a, b) => parseInt(a.dataset.index) - parseInt(b.dataset.index));
    
    // Reappend them in the correct order
    items.forEach(item => {
        filesDiv.appendChild(item);
    });
}

function updateFormData() {
    // Create a new DataTransfer object
    const dataTransfer = new DataTransfer();
    
    // Add all files to the DataTransfer object
    selectedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });
    
    // Set the file input's files property to the DataTransfer's files
    document.getElementById('fileInput').files = dataTransfer.files;
}

// Add this to your existing HTML structure
document.addEventListener('DOMContentLoaded', function() {
    // Add some CSS for better display
    const style = document.createElement('style');
    style.textContent = `
        .file-preview {
            display: inline-block;
            margin: 5px;
            position: relative;
        }
        .file-controls {
            text-align: center;
        }
        .file-controls button {
            padding: 0 5px;
            font-size: 10px;
        }
    `;
    document.head.appendChild(style);
});
</script>