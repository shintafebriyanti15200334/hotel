 <head>
   <script type="text/javascript">
     function message() {
       alert("Thank You For Staying <?php echo  $_SESSION["nama_user"] ?> ^^") // body...
     }
   </script>
 </head>

 <body onload="message()">
 </body>

 <center>
   <nav class="navbar navbar-expand navbar-dark bg-secondary text-white">

     <a class="navbar-brand mr-1" href="<?php echo site_url('user') ?>"><i class="fa fa-home"></i> <?php echo SITE_NAME ?></a>


     <!-- Navbar Search -->
     <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

     </form>


     <ul class="navbar-nav ml-auto ml-md-0 text-white">
       <?php if (empty($_SESSION['nama_user'])) { ?>
         <li class="nav-item dropdown no-arrow">
           <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('login') ?>" role="button">
             <i class="fas fa-user-circle fa-fw "></i> LOGIN
           </a>

         </li>
       <?php } else { ?>
         <li class="nav-item dropdown no-arrow">
           <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-users"></i> Selamat Datang <?php echo  $_SESSION["nama_user"] ?>
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
             <?php if ($this->session->userdata('status') == "loginadmin") { ?>
               <a class="dropdown-item" href="<?php echo site_url('Admin') ?>">Ke Halaman Admin</a>
               <div class="dropdown-divider"></div>
             <?php } ?>
             <a class="dropdown-item" href="<?php echo site_url('user/ubah_akun') ?>">Setting</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="<?php echo site_url('user/data_reservasi') ?>">Reservasi</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
           </div>
         </li>
       <?php } ?>
     </ul>

   </nav>