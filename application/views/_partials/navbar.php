<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?= base_url("home") ?>">Nara<a style="color: #6495ED;">demy</a></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="asset/img/logo-narademy.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <?php if($this->session->userdata('access')=='1'):?>
          <li class="dropdown"><a href="#" class="getstarted scrollto"><span><?php echo $this->session->userdata('Nama'); ?></span><i class="bi bi-person-circle"></i></a>
            <ul>
              <li><a href="<?= site_url('admin') ?>">Go To Admin Page</a></li>
              <li><a href="<?= site_url('admin/setting') ?>">Settings</a></li>
              <li><a href="https://narademy.com/">Go To Homepage</a></li>
              <hr>
              <li><a href="<?= site_url('auth/logout') ?>">Logout</a></li>
            </ul>
          </li>
          <!-- Akses Buat Member -->
          <?php elseif($this->session->userdata('access')=='2'):?>
            <li class="dropdown"><a href="#" class="getstarted scrollto"><span><?php echo $this->session->userdata('Nama'); ?></span><i class="bi bi-person-circle"></i></a>
            <ul>
              <li><a href="#">My Certificate</a></li>
              <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Edit Profile</a></li>
              <li><a href="https://narademy.com/">Go To Homepage</a></li>
              <hr>
              <li><a href="<?= site_url('auth/logout') ?>">Logout</a></li>
            </ul>
          </li>
          <?php else:?>
            <li class="dropdown"><a href="#" class="getstarted scrollto"><span>Get Certified</span></a>
            <ul>
              <li><a href="<?= site_url('auth/login') ?>">Sign in <i class="bi bi-person-circle"></i></a></li>
              <li><a href="https://narademy.com/">Go To Homepage</a></li>
            </ul>
          </li>
          <?php endif;?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
