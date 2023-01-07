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



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   
   <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
   
      <!-- <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> -->   
      <link rel="stylesheet" href="<?php echo e(asset('/public/assets/css/style.css')); ?>">

      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
   </head>
   <style>.help-block{  color:red;}</style>
   <body class="settings-open sidebar-dark">
 
               <?php echo $__env->yieldContent('content'); ?>   


  <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
			<!-- core:js -->  	
		

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/jquery.printPage.js"></script>
   </body>
</html>
<script>$(document).ready(function(){  $('.datepicker1').datepicker();});</script>

<?php /**PATH /home/databoxstudio/public_html/resources/views/layouts/print.blade.php ENDPATH**/ ?>