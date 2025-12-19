<!-- Include Header -->
<?= $this->include('Admin/common_layout/topbar') ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- Include Sidebar -->
  <?= $this->include('Admin/common_layout/sidebar.php') ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Welcome Section -->
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome <?= session()->get('admin_name') ?></h3>
              <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
            </div>
            <div class="col-12 col-xl-4">
              <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="mdi mdi-calendar"></i> Today (<?= date('d M Y') ?>)
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="#">Last 7 Days</a>
                    <a class="dropdown-item" href="#">Last 30 Days</a>
                    <a class="dropdown-item" href="#">Last 90 Days</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Key Metrics Section -->
      <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card bg-primary text-white">
            <div class="card-body">
              <p class="card-title">Total Orders</p>
              <p class="fs-30 mb-2"><?= $totalOrders ?></p>
              <p><?= $orderPercentage ?>% (Last 30 Days)</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card bg-success text-white">
            <div class="card-body">
              <p class="card-title">Total Revenue</p>
              <p class="fs-30 mb-2">₹<?= number_format($totalRevenue, 2) ?></p>
              <p><?= $revenuePercentage ?>% (Last 30 Days)</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card bg-info text-white">
            <div class="card-body">
              <p class="card-title">Total Products</p>
              <p class="fs-30 mb-2"><?= $totalProducts ?></p>
              <p><?= $productPercentage ?>% (Last 30 Days)</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card bg-warning text-white">
            <div class="card-body">
              <p class="card-title">Total Customers</p>
              <p class="fs-30 mb-2"><?= $totalCustomers ?></p>
              <p><?= $customerPercentage ?>% (Last 30 Days)</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Sales and Revenue Charts -->
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Sales Overview</p>
              <canvas id="salesChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Revenue Overview</p>
              <canvas id="revenueChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Order Status Distribution -->
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Order Status Distribution</p>
              <canvas id="orderStatusChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Customer Demographics</p>
              <canvas id="customerDemographicsChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Orders and Top Products -->
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Recent Orders</p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer</th>
                      <th>Total Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($recentOrders as $order): ?>
                      <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['customer_name'] ?></td>
                        <td>₹<?= number_format($order['total_amount'], 2) ?></td>
                        <td>
                          <div class="badge badge-<?= $order['status'] === 'completed' ? 'success' : 'warning' ?>">
                            <?= ucfirst($order['status']) ?>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Top Selling Products</p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Sales</th>
                      <th>Revenue</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($topProducts as $product): ?>
                      <tr>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['total_sales'] ?></td>
                        <td>₹<?= number_format($product['total_revenue'], 2) ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Inventory Alerts -->
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Inventory Alerts</p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Stock Level</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($inventoryAlerts as $product): ?>
                      <tr>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['quantity'] ?></td>
                        <td>
                          <div class="badge badge-<?= $product['quantity'] < 10 ? 'danger' : 'success' ?>">
                            <?= $product['quantity'] < 10 ? 'Low Stock' : 'In Stock' ?>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Reviews -->
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Recent Reviews</p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Customer</th>
                      <th>Rating</th>
                      <th>Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($recentReviews as $review): ?>
                      <tr>
                        <td><?= $review['product_name'] ?></td>
                        <td><?= $review['customer_name'] ?></td>
                        <td><?= $review['rating'] ?></td>
                        <td><?= $review['comment'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- Include Footer -->
    <?= $this->include('Admin/common_layout/footer') ?>
  </div>
  <!-- main-panel ends -->
</div>

<!-- Chart.js Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Sales Chart
  const salesCtx = document.getElementById('salesChart').getContext('2d');
  const salesChart = new Chart(salesCtx, {
    type: 'line',
    data: {
      labels: <?= json_encode($salesLabels) ?>,
      datasets: [{
        label: 'Sales',
        data: <?= json_encode($salesData) ?>,
        borderColor: 'rgba(75, 192, 192, 1)',
        fill: false,
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Revenue Chart
  const revenueCtx = document.getElementById('revenueChart').getContext('2d');
  const revenueChart = new Chart(revenueCtx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($revenueLabels) ?>,
      datasets: [{
        label: 'Revenue',
        data: <?= json_encode($revenueData) ?>,
        backgroundColor: 'rgba(153, 102, 255, 0.2)',
        borderColor: 'rgba(153, 102, 255, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Order Status Chart
  const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
  const orderStatusChart = new Chart(orderStatusCtx, {
    type: 'pie',
    data: {
      labels: <?= json_encode($orderStatusLabels) ?>,
      datasets: [{
        label: 'Orders',
        data: <?= json_encode($orderStatusData) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
    }
  });

  // Customer Demographics Chart
  const customerDemographicsCtx = document.getElementById('customerDemographicsChart').getContext('2d');
  const customerDemographicsChart = new Chart(customerDemographicsCtx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($customerDemographicsLabels) ?>,
      datasets: [{
        label: 'Customers',
        data: <?= json_encode($customerDemographicsData) ?>,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>