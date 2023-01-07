<?php $__env->startSection('content'); ?>
<div class="page-content">

<div class="row">
<div class="col-md-12 stretch-card">
<div class="card">
<div class="card-body">
<?php if(count($errors) > 0): ?>

<div class = "alert alert-danger">

<ul>

<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li><?php echo e($error); ?></li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>

</div>

<?php endif; ?>


<?php if(session()->has('message')): ?>
<div class="alert alert-success">
<?php echo e(session()->get('message')); ?>

</div>
<?php endif; ?>
<h6 class="card-title">Update Customer's Measurement</h6>
<form class="forms-sample" action="<?php echo e(route('measurementsModule.update')); ?>" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="measurement_id" value="<?php echo e($measurement->id); ?>">
<?php echo e(csrf_field()); ?>

<div class="row">
<div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Customer First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo e($measurement->first_name); ?>" autocomplete="off" placeholder="Customer First Name">
    </div>
</div><!-- Col -->
 <div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Customer Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo e($measurement->last_name); ?>" autocomplete="off" placeholder="Customer Last Name">
    </div>
</div><!-- Col -->

 <div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Customer Contact Number</label>
        <input type="text" class="form-control" id="phone_number"  name="phone_number" value="<?php echo e($measurement->phone_number); ?>" autocomplete="off" placeholder="Phone Number">
    </div>
</div><!-- Col -->
<div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Customer Email</label>
        <input type="email" class="form-control" id="email"  name="email" value="<?php echo e($measurement->email); ?>" autocomplete="off" placeholder="Email">
    </div>
</div><!-- Col -->

  <div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Reference By</label>
        <input type="text" class="form-control" id="reference_by" name="reference_by" value="<?php echo e($measurement->reference_by); ?>" autocomplete="off" placeholder="Reference By">
    </div>
</div><!-- Col -->

     <div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Image</label>
        <input type="file" name="profile_image" class="form-control">
    </div>
</div><!-- Col -->

    



</div><!-- Row -->




<div class="row">
<h6 class="card-title">Address</h6>
    </div>
<div class="row">

<div class="col-sm-4">
    <div class="form-group">
        <label class="control-label"> Address Line 1</label>
       <input type="text" class="form-control" id="local_address_line_1"  value="<?php echo e($measurement->local_address_line_1); ?>" name="local_address_line_1" autocomplete="off" placeholder="Address Line 1">
    </div>
</div><!-- Col -->
<div class="col-sm-4">
    <div class="form-group">
        <label class="control-label"> Address Line 2</label>
        <input type="text" class="form-control" id="local_address_line_2" value="<?php echo e($measurement->local_address_line_2); ?>" name="local_address_line_2" autocomplete="off" placeholder="Address Line 2">
    </div>
</div><!-- Col -->
 <div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Country</label>
       
         <select class="form-control" name="local_address_country" id="exampleFormControlSelect1">

        <option selected="" disabled="">Select Country</option>

    

                <option value="India" selected="selected">India</option>
               

    </select>
    </div>
</div><!-- Col -->
<div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">State</label>
       
         <select class="form-control" name="local_address_state" id="exampleFormControlSelect1">

        <option selected="" disabled="">Select State</option>

    

            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($measurement->local_address_state == $state->name): ?>
                <option value="<?php echo e($state->id); ?>" selected="selected"><?php echo e($state->name); ?></option>
                <?php else: ?> 
                <option value="<?php echo e($state->id); ?>")><?php echo e($state->name); ?></option>
                <?php endif; ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
    </div>
</div><!-- Col -->
<div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">City</label>
        <input type="text" class="form-control" id="local_address_city" value="<?php echo e($measurement->local_address_city); ?>" name="local_address_city" autocomplete="off" placeholder="City">


        
    </div>
</div><!-- Col -->
<div class="col-sm-4">
    <div class="form-group">
        <label class="control-label">Pincode</label>
        <input type="number" class="form-control" id="local_address_pincode" value="<?php echo e($measurement->local_address_pincode); ?>" name="local_address_pincode" autocomplete="off" placeholder="Pincode">
    </div>
</div><!-- Col -->
</div><!-- Row -->

<div class="row">
<h6 class="card-title">Measurement</h6>
    </div>



    <div class="row">

 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Delivery Date</label>
        <input type="text" class="form-control" id="delivery_date" name="delivery_date" value="<?php echo e($measurement->delivery_date); ?>" autocomplete="off" placeholder="Delivery Date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
    </div>
</div><!-- Col -->

 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Measurement Date</label>
        <input type="text" class="form-control" id="measurement_date"  name="measurement_date" value="<?php echo e($measurement->measurement_date); ?>" autocomplete="off" placeholder="Measurement Date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
    </div>
</div><!-- Col -->

</div><!-- Row -->
<div class="row">


<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label"> General Length</label>
       <input type="text" class="form-control" id="general_length"  name="general_length" value="<?php echo e($measurement->general_length); ?>" autocomplete="off" placeholder="General Length">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Shoulder/Teera </label>
        <input type="text" class="form-control" id="shoulder"  name="shoulder" value="<?php echo e($measurement->shoulder); ?>" autocomplete="off" placeholder="Shoulder">
    </div>
</div><!-- Col -->

<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Knee Length </label>
        <input type="text" class="form-control" id="knee_length"  name="knee_length" value="<?php echo e($measurement->knee_length); ?>" autocomplete="off" placeholder="Knee Length">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Front Across </label>
        <input type="text" class="form-control" id="front_across"  name="front_across" value="<?php echo e($measurement->front_across); ?>" autocomplete="off" placeholder="Pincode">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Ankle Length </label>
        <input type="text" class="form-control" id="ankle_length"  name="ankle_length" value="<?php echo e($measurement->ankle_length); ?>" autocomplete="off" placeholder="Ankle Length">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Back Across </label>
        <input type="text" class="form-control" id="back_across"  name="back_across" value="<?php echo e($measurement->back_across); ?>" autocomplete="off" placeholder="Back Across">
    </div>
</div><!-- Col -->
  <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Full Length </label>
        <input type="text" class="form-control" id="full_length"  name="full_length" value="<?php echo e($measurement->full_length); ?>" autocomplete="off" placeholder="Full Length">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label"> Front Neck</label>
        <input type="text" class="form-control" id="front_neck"  name="front_neck" value="<?php echo e($measurement->front_neck); ?>" autocomplete="off" placeholder="Front Neck">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Upper Chest </label>
        <input type="text" class="form-control" id="upper_chest"  name="upper_chest" value="<?php echo e($measurement->upper_chest); ?>" autocomplete="off" placeholder="Upper Chest">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Back Neck</label>
          <input type="text" class="form-control" id="back_neck"  name="back_neck" value="<?php echo e($measurement->back_neck); ?>" autocomplete="off" placeholder="Back Neck">
         
    </div>
</div><!-- Col -->

 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Chest </label>
        <input type="text" class="form-control" id="chest"  name="chest" value="<?php echo e($measurement->chest); ?>" autocomplete="off" placeholder="Chest">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Full Sleeve + Muri </label>
        <input type="text" class="form-control" id="full_sleeve_muri"  name="full_sleeve_muri" value="<?php echo e($measurement->full_sleeve_muri); ?>" autocomplete="off" placeholder="Full Sleeve + Muri">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Under Chest/Waist </label>
        <input type="text" class="form-control" id="chest"  name="under_chest_waist" value="<?php echo e($measurement->under_chest_waist); ?>" autocomplete="off" placeholder="Under Chest/Waist">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Sleeve + Muri </label>
        <input type="text" class="form-control" id="sleeve_muri"  name="sleeve_muri" value="<?php echo e($measurement->sleeve_muri); ?>" autocomplete="off" placeholder="Sleeve + Muri">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Stomach/Low Waist </label>
        <input type="text" class="form-control" id="low_waist"  name="low_waist" value="<?php echo e($measurement->low_waist); ?>" autocomplete="off" placeholder="Low Waist">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Elbow Sleeve + Muri</label>
        <input type="text" class="form-control" id="elbow_sleeve_muri"  name="elbow_sleeve_muri" value="<?php echo e($measurement->elbow_sleeve_muri); ?>" autocomplete="off" placeholder="Elbow Sleeve + Muri">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Hip </label>
        <input type="text" class="form-control" id="hip"  name="hip" value="<?php echo e($measurement->hip); ?>" autocomplete="off" placeholder="Hip">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Sleeve + Muri </label>
        <input type="text" class="form-control" id="sleeve_muri_2"  name="sleeve_muri_2" value="<?php echo e($measurement->sleeve_muri_2); ?>" autocomplete="off" placeholder="Sleeve + Muri">
    </div>
</div><!-- Col -->
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Dart Point </label>
        <input type="text" class="form-control" id="dart_point"  name="dart_point" value="<?php echo e($measurement->dart_point); ?>" autocomplete="off" placeholder="Dart Point">
    </div>
</div><!-- Col -->

<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label"> Arm Hole</label>
       <input type="text" class="form-control" id="arm_hole"  name="arm_hole" value="<?php echo e($measurement->arm_hole); ?>" autocomplete="off" placeholder="Arm Hole">
    </div>
</div><!-- Col -->

<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Shoulder To Waist </label>
        <input type="text" class="form-control" id="shoulder_to_waist"  name="shoulder_to_waist" value="<?php echo e($measurement->delivery_date); ?>" autocomplete="off" placeholder="Shoulder To Waist">
    </div>
</div><!-- Col -->
</div>
<div class="row">
<h6 class="card-title">Bottom from Naval/Low Waist</h6>
</div>

<div class="row">



  <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Ankle Length</label>
        <input type="text" class="form-control" id="ankle"  name="ankle" value="<?php echo e($measurement->ankle); ?>" autocomplete="off" placeholder="Ankle">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Thigh </label>
        <input type="text" class="form-control" id="upper_thigh"  name="upper_thigh" value="<?php echo e($measurement->upper_thigh); ?>" autocomplete="off" placeholder="Upper Thigh">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Pant Length </label>
        <input type="text" class="form-control" id="pant_waist"  name="pant_waist" value="<?php echo e($measurement->pant_waist); ?>" autocomplete="off" placeholder="Pant Waist">
    </div>
</div><!-- Col -->
  <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Calf </label>
        <input type="text" class="form-control" id="calf"  name="calf" value="<?php echo e($measurement->calf); ?>" autocomplete="off" placeholder="Calf">
    </div>
</div><!-- Col -->



<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Salwar Length </label>
        <input type="text" class="form-control" id="salwar_length"  name="salwar_length" value="<?php echo e($measurement->salwar_length); ?>" autocomplete="off" placeholder="Salwar Length">
    </div>
</div><!-- Col -->
 

<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Knee </label>
        <input type="text" class="form-control" id="knee"  name="knee" value="<?php echo e($measurement->knee); ?>" autocomplete="off" placeholder="Knee">
    </div>
</div><!-- Col -->
 
<div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Shrara Length</label>
        <input type="text" class="form-control" id="shrara_length"  name="shrara_length" value="<?php echo e($measurement->shrara_length); ?>" autocomplete="off" placeholder="Shrara Length">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Muri</label>
        <input type="text" class="form-control" id="muri"  name="muri" value="<?php echo e($measurement->muri); ?>" autocomplete="off" placeholder="Muri">
    </div>
</div><!-- Col -->
   <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Lehnga Length </label>
        <input type="text" class="form-control" id="lehnga_length"  name="lehnga_length" value="<?php echo e($measurement->lehnga_length); ?>" autocomplete="off" placeholder="Lehnga Length">
    </div>
</div><!-- Col -->

   <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Heels </label>
        <input type="text" class="form-control" id="heels"  name="heels" value="<?php echo e($measurement->heels); ?>" autocomplete="off" placeholder="Heels">
    </div>
</div><!-- Col -->
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Paint Waist </label>
        <input type="text" class="form-control" id="waist"  name="waist" value="<?php echo e($measurement->waist); ?>" autocomplete="off" placeholder="Waist">
    </div>
</div><!-- Col -->
    <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Lehnga Waist </label>
        <input type="text" class="form-control" id="lehnga_waist"  name="lehnga_waist" value="<?php echo e($measurement->lehnga_waist); ?>" autocomplete="off" placeholder="Lehnga Waist">
    </div>
</div><!-- Col -->
</div>
<div class="row">
<h6 class="card-title">Blouse</h6>
</div>


<div class="row">
 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Blouse Length </label>
        <input type="text" class="form-control" id="blouse_length"  name="blouse_length" value="<?php echo e($measurement->blouse_length); ?>" autocomplete="off" placeholder="Blouse Length">
    </div>
</div><!-- Col -->
    <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">F.N. </label>
        <input type="text" class="form-control" id="f_n"  name="f_n" value="<?php echo e($measurement->f_n); ?>" autocomplete="off" placeholder="F.N.">
    </div>
</div><!-- Col -->

 <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Peticoat Length </label>
        <input type="text" class="form-control" id="peticoat_length"  name="peticoat_length" value="<?php echo e($measurement->peticoat_length); ?>" autocomplete="off" placeholder="Peticoat Length">
    </div>
</div><!-- Col -->
    <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">B.N. </label>
        <input type="text" class="form-control" id="b_n"  name="b_n" value="<?php echo e($measurement->b_n); ?>" autocomplete="off" placeholder="B.N.">
    </div>
</div><!-- Col -->




 




 
 







</div><!-- Row -->


<a class="btn btn-light" href="<?php echo e(route('customersModule.customers')); ?>">Back</a>
<button type="submit" class="btn btn-primary mr-2">Create Customer</button>
</form>
</div>
</div>
</div>
</div>



</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
$( "#delivery_date" ).datepicker({
minDate: 0,
dateFormat: 'dd-mm-yy'
});




$( "#measurement_date" ).datepicker({
minDate: 0,
dateFormat: 'dd-mm-yy',
});



} );
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\akriti\resources\views/MeasurementModule/edit.blade.php ENDPATH**/ ?>