


<!doctype html>
<html lang="en">
  
<!-- Mirrored from iqonic.design/themes/instadash/html/backend/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:23:39 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Insta Dash | Responsive Bootstrap 4 Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="http://iqonic.design/themes/instadash/html/assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="<?php echo base_url()?>css/backend.min0ff5.css?v=1.0.2">
      <link rel="stylesheet" href="<?php echo base_url()?>vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="<?php echo base_url()?>vendor/%40icon/dripicons/dripicons.css">
      
      <link rel='stylesheet' href='<?php echo base_url()?>vendor/fullcalendar/core/main.css' />
      <link rel='stylesheet' href='<?php echo base_url()?>vendor/fullcalendar/daygrid/main.css' />
      <link rel='stylesheet' href='<?php echo base_url()?>vendor/fullcalendar/timegrid/main.css' />
      <link rel='stylesheet' href='<?php echo base_url()?>vendor/fullcalendar/list/main.css' />
      <link rel="stylesheet" href="<?php echo base_url()?>vendor/mapbox/mapbox-gl.css">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-12">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <h2 class="mb-2">Sign In</h2>
                        <p>To Keep connected with us please login with your personal info.</p>
                        <form action="<?php echo base_url()?>login/validation" method="post">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <input class="floating-input form-control border border-primary" type="email" name="email" value="<?php echo set_value('uname');?>">
                                    <label>Email</label>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <input class="floating-input form-control border border-primary" type="password" name="password" value="<?php echo set_value('password');?>">
                                    <label>Password</label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <a href="auth-recoverpw.html" class="text-primary float-right">Forgot Password?</a>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary">Sign In</button>
                        </form>
                     </div>
                     <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                        <img src="<?php echo base_url()?>images/login/01.png" class="img-fluid w-80" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="<?php echo base_url()?>js/backend-bundle.min.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="<?php echo base_url()?>js/flex-tree.min.js"></script>
    <script src="<?php echo base_url()?>js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="<?php echo base_url()?>js/table-treeview.js"></script>
    
    <!-- Masonary Gallery Javascript -->
    <script src="<?php echo base_url()?>js/masonry.pkgd.min.js"></script>
    <script src="<?php echo base_url()?>js/imagesloaded.pkgd.min.js"></script>
    
    <!-- Mapbox Javascript -->
    <script src="<?php echo base_url()?>js/mapbox-gl.js"></script>
    <script src="<?php echo base_url()?>js/mapbox.js"></script>
    
    <!-- Fullcalender Javascript -->
    <script src='<?php echo base_url()?>vendor/fullcalendar/core/main.js'></script>
    <script src='<?php echo base_url()?>vendor/fullcalendar/daygrid/main.js'></script>
    <script src='<?php echo base_url()?>vendor/fullcalendar/timegrid/main.js'></script>
    <script src='<?php echo base_url()?>vendor/fullcalendar/list/main.js'></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="<?php echo base_url()?>js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="<?php echo base_url()?>js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="<?php echo base_url()?>js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="<?php echo base_url()?>s/chart-custom.js"></script>
    
    <!-- slider JavaScript -->
    <script src="<?php echo base_url()?>js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="<?php echo base_url()?>js/app.js"></script>
  </body>

<!-- Mirrored from iqonic.design/themes/instadash/html/backend/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:23:42 GMT -->
</html>
