
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		background: linear-gradient(180deg, #24323d 0%, #2f4754 56%, #4f6b62 100%);
    box-shadow: 14px 0 40px rgba(36, 50, 61, .12);
	}
  #sidebar .sidebar-list{
    padding: 1.1rem .8rem 1.2rem;
  }
  #sidebar .nav-item{
    color: rgba(255, 244, 236, .82);
    border-radius: 14px;
    margin-bottom: .45rem;
    transition: .22s ease;
  }
  #sidebar .nav-item:hover,
  #sidebar .nav-item.active{
    background: rgba(255,255,255,.10);
    color: #fffaf4;
    transform: translateX(2px);
  }
  #sidebar .mx-2.text-white{
    margin-top: 1rem;
    margin-bottom: .7rem;
    color: rgba(236, 244, 236, .82) !important;
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
  }
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
				<a href="index.php?page=orders" class="nav-item nav-orders"><span class='icon-field'><i class="fa fa-clipboard-list "></i></span> Orders</a>
				<a href="billing/index.php" class="nav-item nav-takeorders"><span class='icon-field'><i class="fa fa-list-ol "></i></span> Take Orders</a>
				<?php if($_SESSION['login_type'] == 1): ?>

				<div class="mx-2 text-white">Master List</div>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Categories</a>
				<a href="index.php?page=products" class="nav-item nav-products"><span class='icon-field'><i class="fa fa-th-list "></i></span> Products</a>
				<?php endif; ?>
				<div class="mx-2 text-white">Report</div>
				<a href="index.php?page=sales_report" class="nav-item nav-sales_report"><span class='icon-field'><i class="fa fa-th-list"></i></span> Sales Report</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<div class="mx-2 text-white">Systems</div>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users "></i></span> Users</a>
				<!-- <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span> System Settings</a> -->
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
