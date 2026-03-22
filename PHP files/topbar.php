<style>
	.topbar-shell{
    background: linear-gradient(135deg, #24323d, #37515f 52%, #7aa17f);
    box-shadow: 0 16px 32px rgba(36, 50, 61, .22);
  }
  .topbar-brand{
    display: inline-flex;
    align-items: center;
    gap: .9rem;
    color: #fff6ef;
  }
  .topbar-logo {
    width: 44px;
    height: 44px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 14px;
    color: #fff8f2;
  }
  .topbar-title{
    margin: 0;
    font-size: 1.05rem;
    font-weight: 700;
    letter-spacing: .01em;
  }
  .topbar-subtitle{
    margin: 0;
    font-size: .74rem;
    color: rgba(255,244,236,.84);
    text-transform: uppercase;
    letter-spacing: .14em;
  }
  .account-pill{
    display: inline-flex;
    align-items: center;
    gap: .6rem;
    padding: .6rem 1rem;
    border-radius: 999px;
    background: rgba(255,255,255,.12);
    color: #fff8f2 !important;
    border: 1px solid rgba(255,255,255,.12);
  }
  .account-avatar{
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: rgba(255,255,255,.18);
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }
</style>

<nav class="navbar navbar-light fixed-top topbar-shell" style="padding:0">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
      <div class="col-md-6 float-left">
        <div class="topbar-brand">
          <div class="topbar-logo">
            <i class="fa fa-mug-hot"></i>
          </div>
          <div>
            <p class="topbar-subtitle">Cafe Dashboard</p>
            <p class="topbar-title"><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></p>
          </div>
        </div>
      </div>
	  	<div class="float-right">
        <div class=" dropdown mr-4">
            <a href="#" class="dropdown-toggle account-pill"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="account-avatar"><i class="fa fa-user"></i></span>
              <span><?php echo $_SESSION['login_name'] ?></span>
            </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
  </div>
  
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>
