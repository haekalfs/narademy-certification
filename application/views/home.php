<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/header.php'); ?>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>
  <?php $this->load->view('_partials/hero.php'); ?>
    
<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/img/clients/Binus.png") ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/img/clients/Jasamarga.png") ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/img/clients/Maranatha.png") ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/img/clients/UII.png") ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/img/clients/XLAxiata.png") ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/img/clients/Smartfren.png") ?>" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

<section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Browse all of our available courses and claim your certificate.</p>
        </div>
        <div class="text-end">
        <a href="<?= site_url('search') ?>" class="btn btn-primary">Search Courses <i class="bi-search"></i></a><br><br><br>
        </div>
        <div class="row">
        <?php foreach ($courses as $course) : ?>
          <div style="padding-top: 20px;" class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box" style="height: 280px;">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4>
                <?php if($this->session->userdata('access')=='1'):?>
                  <a href="<?= site_url('course/'.$course->slug) ?>"><?= $course->title ? html_escape($course->title) : "No Title" ?></a>
                <?php elseif($this->session->userdata('access')=='2'):?>
                  <a href="<?= site_url('course/'.$course->slug) ?>"><?= $course->title ? html_escape($course->title) : "No Title" ?></a>
                <?php else:?>
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#restrictModal"> <i class="fa fa-plus" aria-hidden="true"></i> <?= $course->title ? html_escape($course->title) : "No Title" ?></a>
                <?php endif;?>
              </h4>
              <p style="width: 300px;"><?= substr_replace($course->content, "...", 80); ?></p>
            </div>
          </div>
		  <?php endforeach ?>
		</div>
  </div>

  <!-- modal -->
<div class="modal fade" id="restrictModal">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">Access Denied!</h4>
           </div>
          <div class="modal-body">
        <p>
          <p>You need to become a member. </p>
          <p>Sign in or Create an account to access this course and Claim your certificate now.</p>
          <p>Sincerely,
            <p><br>
              <b>Nara<a style="color: blue;">demy</a>.com</b>
            </p>
          </p>
        </p>
          </div>
           <div class="modal-footer">
              <a href="<?= site_url('auth/login') ?>" class="btn btn-primary" type="button">Sign in</a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
       </div>
  </div>
</div>
</section>

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>A Perfect blend of creativity and talented people. Maybe talent wins games, but teamwork and intelligence win championships.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets/img/team/haekal.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Haekal Sastradilaga</h4>
                <span>Lead</span>
                <p>Sayangi ibumu jangan ibu-ibu dan bekerjalah hingga tulang anda keropos.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets/img/team/nada1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Nada Rahmawati</h4>
                <span>Co-Lead</span>
                <p>When life gets you down, do you wanna know what you've gotta do? Just keep swimming-dory.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <?php $this->load->view('_partials/footer.php'); ?>
</body>
</html>