<?php
if($this->session->userdata('userData')){ ?>
    <header class="ease">
        <div class="contain regular relative">
            <div class="logo ease">
                <a href="<?= base_url(); ?>"><img src="<?= SITE_IMAGES . $admin_row['logo'] ?>" alt="BlockChange"></a>
            </div>
            <!-- <div class="toggle"><span></span></div> -->
            <?php
                $profilePic =  ($this->session->userdata('userData')['image'] == '') ? DEFAULT_IMG : SITE_IMAGES.$this->session->userdata('userData')['image'];
                $profilePicClass =  ($this->session->userdata('userData')['image'] == '') ? 'icoMask' : '';
            ?>
            <div class="proIco dropDown ease">
                <div class="inside dropBtn">
                    <div class="ico">
                        <img src="<?php echo $profilePic; ?>">
                    </div>
                    <h4 class="proName"><?php echo ucwords($this->session->userdata('userData')['name']); ?><span class="regular">Space Cowboy</span></h4>
                </div>
                <ul class="proDrop dropCnt">
                    <li><a href="<?= base_url('user/dashboard'); ?>"><i class="fi-dashboard"></i>Dashboard</a></li>
                    <li><a href="<?= base_url('user/profile'); ?>"><i class="fi-user"></i>My Profile</a></li>
                    <li><a href="<?= base_url('user/transaction'); ?>"><i class="fi-credit-card"></i>Transaction</a></li>
                    <li><a href="<?= base_url('user/logout'); ?>"><i class="fi-logout"></i>Logout</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>
<?php }else{ ?>
    <header class="ease">
        <div class="contain regular relative">
            <div class="logo ease">
                <a href="<?= base_url(); ?>"><img src="<?= SITE_IMAGES . $admin_row['logo'] ?>" alt="BlockChange"></a>
            </div>
            <div class="toggle"><span></span></div>
            <nav class="ease">
                <ul id="nav">
                    <li class="">
                        <a href="#home-page">Home</a>
                    </li>
                    <li class="">
                        <a href="#what-we-do">About</a>
                    </li>
                    <li class="">
                        <a href="#how-it-works">How it works</a>
                    </li>
                    <li class="">
                        <a href="#performance">Performance</a>
                    </li>
                    <li class="">
                        <a href="#contact">Contact</a>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)" class="log">Login</a>
                    </li>
                    <li class="bTn">
                        <a href="javascript:void(0)" class="register">Sign up</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </div>
    </header>
<?php } ?>






