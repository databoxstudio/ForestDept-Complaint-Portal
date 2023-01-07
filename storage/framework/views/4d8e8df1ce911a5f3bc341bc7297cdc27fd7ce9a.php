<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->    
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      <title><?php echo e(config('app.name', '')); ?></title>
      <!-- Styles -->    
      <link rel="shortcut icon" href="<?php echo e(asset('/public/assets/images/favicon.ico')); ?>" type="image/x-icon">
      <!--== GOOGLE FONTS ==-->    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
      <link rel="stylesheet" href="https://www.nobleui.com/html/template/assets/vendors/core/core.css">
      <link rel="stylesheet" href="<?php echo e(asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/vendors/fullcalendar/fullcalendar.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/vendors/select2/select2.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/vendors/dropzone/dropzone.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/vendors/dropify/dist/dropify.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/vendors/simplemde/simplemde.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/fonts/feather-font/css/iconfont.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/css/mysqpaymentform.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/css/select2.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/css/dataTables.bootstrap4.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/css/jquery.steps.css')); ?>">
      <link href="<?php echo e(asset('/public/css/frontpage/style.css')); ?>" rel="stylesheet" />
      <link rel="shortcut icon" href="<?php echo e(asset('/public/assets/images/favicon.ico')); ?>" />
      <!-- <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> -->   
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/css/style.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/css/jquery.steps.css')); ?>">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
   </head>
   <style>.help-block{  color:red;}</style>
   <body class="settings-open sidebar-dark">
      <?php if(Auth::check()): ?>              
      <div class="main-wrapper">
         <div class="page-wrapper">               

          <?php echo $__env->make('layouts.partials._sidebar',['plan' => 'asdad'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	  
                     
             <?php echo $__env->make('layouts.partials._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

                  <?php endif; ?>          

               <?php echo $__env->yieldContent('content'); ?>   

           <?php if(Auth::check()): ?>     

              <?php echo $__env->make('layouts.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   

                     <?php endif; ?>      

                       </div>
      </div>
			<!-- core:js -->  	
			<script src="<?php echo e(asset('/public/assets/vendors/core/core.js')); ?>"></script>	
			<!-- endinject -->  <!-- plugin js for this page -->  
			<script src="<?php echo e(asset('/public/assets/vendors/chartjs/Chart.min.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/vendors/jquery.flot/jquery.flot.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/vendors/jquery.flot/jquery.flot.resize.js')); ?>"></script> 
			<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
			<script src="<?php echo e(asset('/public/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/vendors/apexcharts/apexcharts.min.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/vendors/progressbar.js/progressbar.min.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/js/jquery.inputmask.bundle.min.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/vendors/select2/select2.min.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/vendors/dropzone/dropzone.min.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/vendors/dropify/dist/dropify.min.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/vendors/simplemde/simplemde.min.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/js/simplemde.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/vendors/jquery-ui/jquery-ui.min.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/vendors/moment/moment.min.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/vendors/fullcalendar/fullcalendar.min.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/vendors/feather-icons/feather.min.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/js/fullcalendar.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/js/select2.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/vendors/tinymce/tinymce.min.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/js/tinymce.js')); ?>"></script>   
			<script>tinymce.init({selector:'textarea.form-control'});</script>	
			<script src="<?php echo e(asset('/public/assets/vendors/feather-icons/feather.min.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/js/template.js')); ?>"></script>   
			<script src="<?php echo e(asset('/public/assets/js/dashboard.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/js/datepicker.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/js/jquery.dataTables.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/js/dataTables.bootstrap4.js')); ?>"></script>
			<script src="<?php echo e(asset('/public/assets/js/data-table.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/js/jgk.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/js/file-upload.js')); ?>"></script> 
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
			<script src="<?php echo e(asset('/public/assets/js/select2.min.js')); ?>"></script>  
			<script src="<?php echo e(asset('/public/assets/js/jquery.steps.min.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/js/inputmask.js')); ?>"></script> 
			<script src="<?php echo e(asset('/public/assets/js/wizard.js')); ?>"></script>  
			<script type="text/javascript" src="https://js.squareupsandbox.com/v2/paymentform"></script> 	<!-- end custom js for this page -->    <!-- Scripts -->     <!-- <script src="<?php echo e(asset('js/app.js')); ?>"></script>  -->
   </body>
</html>
<script>$(document).ready(function(){  $('.datepicker1').datepicker();});</script>

<?php /**PATH C:\xampp\htdocs\complaint-manager\resources\views/layouts/app.blade.php ENDPATH**/ ?>