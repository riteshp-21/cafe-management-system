<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	if(isset($system['name']) && in_array($system['name'], array('Simple Cafe Billing System','CafeFlow POS'))){
		$conn->query("UPDATE system_settings set name = 'Cafe Management System' where id = ".$system['id']);
		$system['name'] = 'Cafe Management System';
	}
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
// }
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    min-height: 100vh;
	    margin: 0;
	    background:
	    	linear-gradient(135deg, rgba(248, 242, 236, .78), rgba(239, 227, 214, .62)),
	    	url("assets/img/coffee-bg.svg") center/cover no-repeat fixed,
	    	linear-gradient(135deg, #f8f2ec, #efe3d6 52%, #dcc6b3 100%);
	}
	main#main{
		width:100%;
		min-height: 100vh;
		display: flex;
		align-items: center;
		padding: 2rem 1rem;
	}
	.login-shell{
		max-width: 1080px;
		margin: 0 auto;
	}
	.login-card{
		border: 0;
		border-radius: 24px;
		overflow: hidden;
		box-shadow: 0 24px 70px rgba(14, 8, 5, .35);
	}
	.login-visual{
		position: relative;
		min-height: 540px;
		padding: 3rem;
		background:
			linear-gradient(160deg, rgba(255, 255, 255, .10), rgba(255, 255, 255, .04)),
			linear-gradient(160deg, #24323d, #37515f 55%, #7aa17f 100%);
		color: #fff8f0;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.login-visual:before{
		content: "";
		position: absolute;
		inset: 0;
		background: linear-gradient(180deg, rgba(20, 12, 8, .10), rgba(20, 12, 8, .55));
	}
	.login-copy,
	.login-badge,
	.cafe-art{
		position: relative;
		z-index: 1;
	}
	.login-badge{
		width: 74px;
		height: 74px;
		border-radius: 22px;
		background: rgba(255,255,255,.14);
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 2rem;
		backdrop-filter: blur(4px);
	}
	.login-copy h1{
		font-size: 2.4rem;
		font-weight: 700;
		color: #fff;
		margin-bottom: .85rem;
	}
	.login-copy p{
		max-width: 420px;
		font-size: 1rem;
		line-height: 1.7;
		margin-bottom: 1.5rem;
		color: rgba(255,248,240,.88);
	}
	.visual-tags span{
		display: inline-block;
		margin: 0 .6rem .6rem 0;
		padding: .55rem .9rem;
		border-radius: 999px;
		background: rgba(255,255,255,.14);
		color: #fffaf4;
		font-size: .85rem;
	}
	.cafe-art{
		display: flex;
		align-items: flex-end;
		justify-content: center;
		min-height: 180px;
	}
	.cup-wrap{
		position: relative;
		width: 210px;
		height: 170px;
	}
	.cup-plate{
		position: absolute;
		left: 50%;
		bottom: 8px;
		transform: translateX(-50%);
		width: 190px;
		height: 18px;
		border-radius: 999px;
		background: rgba(255, 244, 231, .50);
		box-shadow: 0 12px 25px rgba(0,0,0,.22);
	}
	.cup{
		position: absolute;
		left: 50%;
		bottom: 24px;
		transform: translateX(-50%);
		width: 126px;
		height: 92px;
		border-radius: 0 0 26px 26px;
		background: linear-gradient(180deg, #fffaf3, #ead8c5);
		box-shadow: 0 18px 30px rgba(0,0,0,.18);
	}
	.cup:before{
		content: "";
		position: absolute;
		left: 10px;
		right: 10px;
		top: -14px;
		height: 24px;
		border-radius: 999px;
		background: linear-gradient(180deg, #6f442c, #3b2319);
	}
	.cup:after{
		content: "";
		position: absolute;
		right: -26px;
		top: 18px;
		width: 32px;
		height: 40px;
		border: 8px solid #f0dfcf;
		border-left: 0;
		border-radius: 0 18px 18px 0;
	}
	.cup-heart{
		position: absolute;
		left: 50%;
		top: 28px;
		transform: translateX(-50%) rotate(-45deg);
		width: 26px;
		height: 26px;
		background: rgba(111, 68, 44, .18);
	}
	.cup-heart:before,
	.cup-heart:after{
		content: "";
		position: absolute;
		width: 26px;
		height: 26px;
		background: rgba(111, 68, 44, .18);
		border-radius: 50%;
	}
	.cup-heart:before{
		top: -13px;
		left: 0;
	}
	.cup-heart:after{
		left: 13px;
		top: 0;
	}
	.steam{
		position: absolute;
		bottom: 124px;
		width: 22px;
		height: 72px;
		border-radius: 999px;
		border: 4px solid rgba(255,255,255,.45);
		border-color: rgba(255,255,255,.45) transparent transparent transparent;
		filter: blur(.2px);
	}
	.steam.s1{
		left: 70px;
		transform: rotate(10deg);
	}
	.steam.s2{
		left: 100px;
		height: 86px;
		transform: rotate(-4deg);
	}
	.steam.s3{
		left: 130px;
		transform: rotate(8deg);
	}
	.login-panel{
		background: #fdf7f1;
		padding: 3rem 2.4rem;
		display: flex;
		align-items: center;
	}
	.login-panel .inner{
		width: 100%;
	}
	.brand-kicker{
		color: #7aa17f;
		font-weight: 700;
		letter-spacing: .18em;
		font-size: .78rem;
		text-transform: uppercase;
	}
	.panel-title{
		font-size: 2rem;
		font-weight: 700;
		color: #24323d;
		margin: .4rem 0 .6rem;
	}
	.panel-subtitle{
		color: #62707b;
		margin-bottom: 1.8rem;
	}
	#login-form .form-group{
		margin-bottom: 1.1rem;
	}
	#login-form label{
		color: #2d3b45;
		font-weight: 600;
	}
	#login-form .form-control{
		height: 48px;
		border-radius: 14px;
		border: 1px solid #e6d7ca;
		background: #fffdfa;
		padding: .8rem 1rem;
		box-shadow: none;
	}
	#login-form .form-control:focus{
		border-color: #7aa17f;
		box-shadow: 0 0 0 .2rem rgba(122,161,127,.18);
	}
	.login-btn{
		width: 100%;
		height: 48px;
		border: 0;
		border-radius: 14px;
		font-weight: 700;
		letter-spacing: .02em;
		background: linear-gradient(135deg, #37515f, #7aa17f);
		box-shadow: 0 14px 30px rgba(55,81,95,.24);
	}
	.login-btn:hover{
		background: linear-gradient(135deg, #2f4754, #6d9472);
	}
	.demo-box{
		margin-top: 1.25rem;
		padding: 1rem 1.1rem;
		border-radius: 14px;
		background: linear-gradient(135deg, #f9f7f2, #edf2ec);
		color: #5c6568;
		font-size: .9rem;
	}
	.demo-box strong{
		color: #24323d;
	}
	@media (max-width: 991.98px){
		.login-visual{
			min-height: 280px;
			padding: 2rem;
		}
		.login-copy h1{
			font-size: 1.9rem;
		}
		.login-panel{
			padding: 2rem 1.4rem;
		}
	}
</style>

<body>


  <main id="main" >
  	<div class="container-fluid login-shell">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-11">
				<div class="card login-card">
					<div class="row no-gutters">
						<div class="col-lg-6">
							<div class="login-visual">
								<div class="login-badge">
									<i class="fa fa-coffee"></i>
								</div>
								<div class="login-copy">
									<h1>Fresh coffee, faster service.</h1>
									<p>Manage orders, billing, receipts, and staff operations from one warm and simple cafe dashboard.</p>
									<div class="visual-tags">
										<span><i class="fa fa-mug-hot mr-2"></i>Coffee Counter</span>
										<span><i class="fa fa-receipt mr-2"></i>Billing Ready</span>
										<span><i class="fa fa-store mr-2"></i>Cafe Operations</span>
									</div>
								</div>
								<div class="cafe-art" aria-hidden="true">
									<div class="cup-wrap">
										<div class="steam s1"></div>
										<div class="steam s2"></div>
										<div class="steam s3"></div>
										<div class="cup">
											<div class="cup-heart"></div>
										</div>
										<div class="cup-plate"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="login-panel">
								<div class="inner">
									<div class="brand-kicker">Welcome</div>
									<h2 class="panel-title"><?php echo $_SESSION['system']['name'] ?></h2>
									<p class="panel-subtitle">Sign in to continue managing your cafe orders and daily billing.</p>
									<form id="login-form" >
										<div class="form-group">
											<label for="username" class="control-label">Username</label>
											<input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
										</div>
										<div class="form-group">
											<label for="password" class="control-label">Password</label>
											<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
										</div>
										<button type="submit" class="btn btn-primary login-btn">Login</button>
									</form>
									<div class="demo-box">
										<strong>Default login</strong><br>
										Admin: <span>admin / admin123</span><br>
										Staff: <span>staff / staff123</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		var $btn = $('#login-form button[type="submit"], #login-form button').first()
		$btn.attr('disabled',true).html('Logging in...')
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$btn.removeAttr('disabled').html('Login')

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$btn.removeAttr('disabled').html('Login')
				}
			}
		})
	})
</script>	
</html>
