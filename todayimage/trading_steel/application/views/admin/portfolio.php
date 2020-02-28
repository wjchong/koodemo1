<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <?php require_once('includes/site-master-dashboard.php'); ?>
</head>

<body class="header-light sidebar-dark sidebar-expand">
    <div id="wrapper" class="wrapper">
        <?php require_once('includes/header.php'); ?>
    <div class="content-wrapper">
        <?php require_once('includes/sidebar.php'); ?>

        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h5 class="mr-0 mr-r-5">Portfolio</h5>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Portfolio</li>
                    </ol>
                </div>
                <!-- /.page-title-right -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">  
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="http://files.coinmarketcap.com.s3-website-us-east-1.amazonaws.com/static/img/coins/200x200/ethereum.png">
							<h4 class="portflio-heading">Ethereum Mining</h4> 
							</div>
							</div>
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>POOL EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="https://steemitimages.com/DQmQicz4Vx9kFjZRgWq9RS334QhZuDw5vq7kUVnhGFKeApf/burst%20post.png">
							<h4 class="portflio-heading">Burst Mining</h4> 
							</div>
							</div>
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>POOL EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div>
						</div>
					</div> 
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="https://bitjohny.cloudingenium.com/wp-content/uploads/sites/23/2015/08/dash_icon_f.png">
							<h4 class="portflio-heading">Dash Mining</h4> 
							</div>
							</div>
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>POOL EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div>
						</div>
					</div> 
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV9RdHABAv5s4WX0DtbNXyiay6byy387WB-h60i4LFmPEaUVqm">
							<h4 class="portflio-heading">Zcash Mining</h4> 
							</div>
							</div>
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>POOL EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="https://www.crypto-economy.net/wp-content/uploads/2017/06/nem2-300x300.jpg">
							<h4 class="portflio-heading">Nem Mining</h4> 
							</div>
							</div>
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>POOL EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="https://www.techaroha.com/wp-content/uploads/2017/08/xmr.svg">
							<h4 class="portflio-heading">Monero Mining</h4> 
							</div>
							</div>
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>POOL EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div>
						</div>
					</div>	
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="https://www.coingecko.com/assets/coin-250/gamecredits-4abfa24e9bcc5f31b6963df988c591f2afa536db5f7bebf17be0873b49ca9d35.png">
							<h4 class="portflio-heading">Game Credit Mining</h4> 
							</div>
							</div>
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>POOL EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="portfolio-data">
							<div class="row portflio-header">
							<div class="portfolio-name">
							<img class="portfolio-image" src="https://seeklogo.com/images/B/bitcoin-logo-DDAEEA68FA-seeklogo.com.png"> 
							<h4 class="portflio-heading">Currency Exchange Mining</h4> 
							</div>
							</div>
							
							<div class="row protfolio-footer">
								<div class="text-center col-md-12">
								<strong>Exchange EARNING</strong><br>
								<strong>$0</strong>
								</div>
							</div> 
						</div>
					</div>
				</div>
				 
				</div>
            </div>
            <!-- /.widget-list -->
        </main>
		<style>
		.portfolio-name {
    display: inline-flex;
}
			.portfolio-data {
				border: 1px solid #ddd;
				border-radius: 10px;
				background: #fff;
				/* border-color: #f1f1f1; */
				padding: 10px;
				margin-bottom: 1em;
			}
			img.portfolio-image {
				width: 3em;
				height: 3em; 
				border: 1px solid #ddd;
				border-radius: 27px;
			}
			h4.portflio-heading {
				color: #3FA6B2;
				font-size: 22px;
				margin: 0;
				padding: 9px;
			}
			.row.protfolio-footer {
				border-top: 1px solid #EFF0F3;
				margin-top: 10px;
				padding: 10px 0px;
			} 
			.row.portflio-header {
			padding: 2px 11px;
		}
		</style>
        <!-- /.main-wrappper -->
        <!-- RIGHT SIDEBAR -->
        <aside class="right-sidebar scrollbar-enabled">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                    <h3>Chat</h3>
                    <p class="text-muted">You can chat with your family and friends in this space.</p>
                </div>
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Online</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Julein Renvoye">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Eddie Lebanovkiy">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--away thumb-xs" data-chat-user="Cameron Moll">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user3.jpg" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user7.jpg" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Trent Walton">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user6.jpg" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Offline</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Julien Renvoye">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Eddie Lebaovskiy">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Cameron Moll">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user3.jpg" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user7.jpg" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Trent Walton">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user6.jpg" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
            </div>
            <!-- /.sidebar-chat -->
        </aside>
        <!-- CHAT PANEL -->
        <div class="chat-panel" hidden>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="minimize" aria-label="Minimize"><span aria-hidden="true"><i class="material-icons">expand_more</i></span>
                    </button> <span class="user-name">John Doe</span>
                </div>
                <!-- /.card-header -->
                <div class="card-block custom-scroll">
                    <div class="messages custom-scroll-content scrollbar-enabled">
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <p>Lorem ipsum dolor sit amet?</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" alt="">
                            <div class="message">
                                <p>Etiam rhoncus. Maecenas tempus, tellus eget condi mentum rhoncus</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <img src="<?= base_url('assets/admin') ?>/demo/chat-message.jpg" alt=""> <small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <p>Maecenas nec odio et ante tincidunt tempus.</p><small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" alt="">
                            <div class="message">
                                <p>Donec sodales :)</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                    </div>
                    <!-- /.messages -->
                    <form action="javascript:void(0)" method="post">
                        <textarea name="message" style="resize: none" placeholder="Type message and hit enter"></textarea>
                        <ul class="list-unstyled list-inline chat-extra-buttons">
                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="material-icons">insert_emoticon</i></a>
                            </li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="material-icons">attach_file</i></a>
                            </li>
                        </ul>
                        <button class="btn btn-color-scheme btn-circle submit-btn" type="submit"><i class="material-icons">send</i>
                        </button>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.chat-panel -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once('includes/footer.php'); ?>
</body>

</html>
