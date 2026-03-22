<?php
include 'db_connect.php';
$total_orders = $conn->query("SELECT count(*) as total FROM orders")->fetch_assoc()['total'];
$paid_orders = $conn->query("SELECT count(*) as total FROM orders where amount_tendered > 0")->fetch_assoc()['total'];
$active_products = $conn->query("SELECT count(*) as total FROM products where status = 1")->fetch_assoc()['total'];
$monthly_sales = $conn->query("SELECT IFNULL(sum(total_amount),0) as total FROM orders where amount_tendered > 0 and date_format(date_created,'%Y-%m') = date_format(curdate(),'%Y-%m')")->fetch_assoc()['total'];
$recent_orders = $conn->query("SELECT * FROM orders order by unix_timestamp(date_created) desc limit 5");
?>
<style>
  .dashboard-hero{
    position: relative;
    overflow: hidden;
    border-radius: 28px;
    padding: 2.2rem;
    background:
      radial-gradient(circle at top right, rgba(255,255,255,.18), transparent 22%),
      radial-gradient(circle at bottom left, rgba(225,239,226,.18), transparent 24%),
      linear-gradient(135deg, #24323d, #37515f 52%, #7aa17f 100%);
    color: #fff9f3;
  }
  .dashboard-hero h2{
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: .55rem;
  }
  .dashboard-hero p{
    max-width: 560px;
    color: rgba(255,247,239,.84);
    margin-bottom: 1.2rem;
  }
  .hero-pill{
    display: inline-flex;
    align-items: center;
    gap: .55rem;
    padding: .65rem 1rem;
    border-radius: 999px;
    background: rgba(255,255,255,.14);
    margin-right: .6rem;
    margin-bottom: .6rem;
    font-weight: 600;
  }
  .hero-art{
    position: absolute;
    right: 2rem;
    bottom: -10px;
    font-size: 8rem;
    color: rgba(255,255,255,.12);
  }
  .metric-card{
    border-radius: 22px;
    padding: 1.35rem;
    color: #24323d;
    background: linear-gradient(180deg, #ffffff, #f8fbff);
    height: 100%;
  }
  .metric-icon{
    width: 52px;
    height: 52px;
    border-radius: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.1rem;
    margin-bottom: 1rem;
    box-shadow: 0 14px 28px rgba(60, 37, 25, .12);
  }
  .bg-caramel{ background: linear-gradient(135deg, #8a5638, #c9894d); }
  .bg-caramel{ background: linear-gradient(135deg, #37515f, #4f6b7a); }
  .bg-mocha{ background: linear-gradient(135deg, #24323d, #37515f); }
  .bg-olive{ background: linear-gradient(135deg, #6d9472, #8bb48f); }
  .bg-gold{ background: linear-gradient(135deg, #8aa399, #b7c8ba); }
  .metric-label{
    color: #6c7a80;
    text-transform: uppercase;
    letter-spacing: .12em;
    font-size: .72rem;
    font-weight: 700;
    margin-bottom: .4rem;
  }
  .metric-value{
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: .25rem;
  }
  .metric-note{
    color: #728087;
    margin: 0;
  }
  .dashboard-panel{
    border-radius: 24px;
    overflow: hidden;
  }
  .dashboard-panel .card-header{
    background: linear-gradient(135deg, #fff7ef, #fff);
    border-bottom: 1px solid #e7edf5;
    font-weight: 700;
    color: #24323d;
  }
  .dashboard-table td,
  .dashboard-table th{
    vertical-align: middle !important;
  }
  .dashboard-table tbody tr:hover{
    background: #fff6ee;
  }
  .status-badge{
    padding: .45rem .75rem;
    border-radius: 999px;
    font-size: .75rem;
    font-weight: 700;
  }
  .status-paid{
    background: #e4f4de;
    color: #3f6b49;
  }
  .status-unpaid{
    background: #eef1f4;
    color: #5f6b75;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="dashboard-hero">
        <h2><?php echo "Welcome back, ".ucwords($_SESSION['login_name'])."!" ?></h2>
        <p>Your cafe operations are all in one place. Track orders, monitor monthly sales, and keep service moving smoothly throughout the day.</p>
        <div>
          <span class="hero-pill"><i class="fa fa-mug-hot"></i> Warm service</span>
          <span class="hero-pill"><i class="fa fa-receipt"></i> Faster billing</span>
          <span class="hero-pill"><i class="fa fa-chart-line"></i> Daily insights</span>
        </div>
        <div class="hero-art"><i class="fa fa-coffee"></i></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="metric-card">
        <div class="metric-icon bg-caramel"><i class="fa fa-clipboard-list"></i></div>
        <div class="metric-label">Total Orders</div>
        <div class="metric-value"><?php echo number_format($total_orders) ?></div>
        <p class="metric-note">All recorded customer orders.</p>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="metric-card">
        <div class="metric-icon bg-mocha"><i class="fa fa-check-circle"></i></div>
        <div class="metric-label">Paid Orders</div>
        <div class="metric-value"><?php echo number_format($paid_orders) ?></div>
        <p class="metric-note">Orders completed with payment.</p>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="metric-card">
        <div class="metric-icon bg-olive"><i class="fa fa-th-large"></i></div>
        <div class="metric-label">Active Products</div>
        <div class="metric-value"><?php echo number_format($active_products) ?></div>
        <p class="metric-note">Available items on the menu.</p>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="metric-card">
        <div class="metric-icon bg-gold"><i class="fa fa-rupee-sign"></i></div>
        <div class="metric-label">Monthly Sales</div>
        <div class="metric-value"><?php echo number_format($monthly_sales,2) ?></div>
        <p class="metric-note">Paid sales for the current month.</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 mb-4">
      <div class="card dashboard-panel">
        <div class="card-header">Recent Orders</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table dashboard-table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Order No.</th>
                  <th>Invoice</th>
                  <th class="text-right">Amount</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if($recent_orders->num_rows > 0): ?>
                  <?php while($row = $recent_orders->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo date("M d, Y",strtotime($row['date_created'])) ?></td>
                    <td><?php echo $row['order_number'] ?></td>
                    <td><?php echo $row['amount_tendered'] > 0 ? $row['ref_no'] : 'Pending' ?></td>
                    <td class="text-right"><?php echo number_format($row['total_amount'],2) ?></td>
                    <td>
                      <?php if($row['amount_tendered'] > 0): ?>
                        <span class="status-badge status-paid">Paid</span>
                      <?php else: ?>
                        <span class="status-badge status-unpaid">Unpaid</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="5" class="text-center">No orders available yet.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card dashboard-panel h-100">
        <div class="card-header">Quick Actions</div>
        <div class="card-body">
          <p class="text-muted">Jump into the most common cafe tasks from here.</p>
          <a href="billing/index.php" class="btn btn-primary btn-block mb-3"><i class="fa fa-cash-register mr-2"></i>Take New Order</a>
          <a href="index.php?page=orders" class="btn btn-outline-secondary btn-block mb-3"><i class="fa fa-clipboard-list mr-2"></i>View Orders</a>
          <?php if($_SESSION['login_type'] == 1): ?>
          <a href="index.php?page=products" class="btn btn-outline-secondary btn-block mb-3"><i class="fa fa-th-list mr-2"></i>Manage Products</a>
          <a href="index.php?page=users" class="btn btn-outline-secondary btn-block"><i class="fa fa-users mr-2"></i>Manage Users</a>
          <?php else: ?>
          <a href="index.php?page=sales_report" class="btn btn-outline-secondary btn-block"><i class="fa fa-chart-bar mr-2"></i>View Sales Report</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
