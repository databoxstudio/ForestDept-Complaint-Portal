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
<h6 class="card-title">Add Public's Complaint</h6>
<form class="forms-sample" action="<?php echo e(route('complaintsModule.save')); ?>" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>




<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->


<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
    <div class="form-group">
        <label class="control-label">Contact Number</label>
        <input type="number" class="form-control" id="contact_number" name="contact_number" value="<?php echo e(old('contact_number')); ?>" autocomplete="off" placeholder="Contact Number">
    </div>

     <div class="form-group">
        <label class="control-label">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo e(old('full_name')); ?>" autocomplete="off" placeholder="Full Name">
    </div>

   <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="keep_identity_concealed" value="1" class="form-check-input" <?php echo e((old('keep_identity_concealed') == "1") ? 'checked': ''); ?>>
                                            Do you want to keep your identity concealed ?
                                        <i class="input-frame"></i></label>
            </div>


 <div class="form-group">
        <label class="control-label">Village</label>
       
        <select class="js-example-basic-single w-100" name="villege" id="villagedrop">
     <option selected="" disabled="">Select Village</option>
                                         <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('villege') == $village->id): ?>
                <option value="<?php echo e($village->id); ?>" selected="selected"><?php echo e($village->village); ?></option>
                <?php else: ?> 
                <option value="<?php echo e($village->id); ?>"><?php echo e($village->village); ?></option>
                <?php endif; ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
    </div>








 <!--<div class="form-group">
        <label class="control-label">Beat</label>
       
<select class="js-example-basic-single w-100" name="beat" id="beatdrop">
     <option selected="" disabled="">Select Beat</option>
                                         <?php $__currentLoopData = $forestareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forestarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('beat') == $forestarea->id): ?>
                <option value="<?php echo e($forestarea->id); ?>" selected="selected"><?php echo e($forestarea->beat); ?></option>
                <?php else: ?> 
                <option value="<?php echo e($forestarea->id); ?>"><?php echo e($forestarea->beat); ?></option>
                <?php endif; ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

    </div>-->


         <div class="form-group">
        <label class="control-label">Beat</label>
       
          <input type="text" class="form-control" id="beat" name="beat" value="<?php echo e(old('beat')); ?>" autocomplete="off" placeholder="Beat">
    </div>

     <div class="form-group">
        <label class="control-label">Block</label>
       
          <input type="text" class="form-control" id="block" name="block" value="<?php echo e(old('block')); ?>" autocomplete="off" placeholder="Block">
    </div>

     <div class="form-group">
        <label class="control-label">Range</label>
       
         <input type="text" class="form-control" id="range" name="range" value="<?php echo e(old('range')); ?>" autocomplete="off" placeholder="Range">
    </div>

      <div class="form-group">
        <label class="control-label">District</label>
        <input type="text" class="form-control" id="district" name="district" value="<?php echo e(old('district')); ?>" autocomplete="off" placeholder="District">
    </div>

     <div class="form-group">
        <label class="control-label">Division</label>
       
        <input type="text" class="form-control" id="division" name="division" value="<?php echo e(old('division')); ?>" autocomplete="off" placeholder="Division">
    </div>

     <div class="form-group">
        <label class="control-label">Nature of Information</label>
       
           <div class="form-check form-check-flat form-check-primary">
             <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="nature_information" id="optionsRadios5" value="information" checked="checked">
                                                Information
                                            <i class="input-frame"></i></label>
                                        </div>
                                      <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="nature_information" id="optionsRadios5" value="complaint" >
                                                Complaint
                                            <i class="input-frame"></i></label>
                                        </div>
                                      
                                        
            </div>
    </div>


         <div class="form-group">
        <select class="form-control" name="complaint" id="complaint">
                                            <option selected="" disabled="">Select Complaint</option>
                                            
                                              <?php $__currentLoopData = $complainttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complainttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('complaint') == $complainttype->complaint_type): ?>
                <option value="<?php echo e($complainttype->complaint_type); ?>" selected="selected"><?php echo e($complainttype->complaint_type); ?></option>
                <?php else: ?> 
                <option value="<?php echo e($complainttype->complaint_type); ?>"><?php echo e($complainttype->complaint_type); ?></option>
                <?php endif; ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         
                                        </select>


                                       <textarea class="form-control" name="information" id="information" rows="5"><?php echo e(old('information')); ?></textarea>




    </div>

  <div class="form-group">

    <button type="submit" class="btn btn-primary submit">Continue</button>

      </div>




</div>
</div>
</div>


<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->

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




$(document).ready(function() {
    $("#information").show();
    $("#complaint").hide();
    $("input[name$='nature_information']").click(function() {
        var test = $(this).val();

        if(test=='complaint'){

        $("#complaint").show();
        $("#information").hide();
        $(".tox-tinymce").hide();
    } else {
        $("#complaint").hide();
        $("#information").hide();
        $(".tox-tinymce").show();
    }
    });
});






        $(document).ready(function () {
           $('#beatdrop').change(function () {
             var id = $(this).val();
             $.ajax({
                url:'/complaint-manager/ForestareasModule/getforestarea/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                   // if (len>0) {
                       //// for (var i = 0; i<len; i++) {
                             var id = response.data.id;
                             var range = response.data.range;
                             var block = response.data.block;
                             var division = response.data.division;
                             
                             $("#range").val(range);
                             $("#block").val(block);
                             $("#division").val(division);
                        //}
                   // }
                }
             })
           });
        });



        $(document).ready(function () {
           $('#villagedrop').change(function () {
             var id = $(this).val();
             $.ajax({
                url:'/complaint-manager/VillagesModule/getvillage/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                   // if (len>0) {
                       //// for (var i = 0; i<len; i++) {
                             var id = response.data.id;
                             var beat = response.data.beat;
                             var range = response.data.range;
                             var block = response.data.block;
                             var district = response.data.district;
                             var division = response.data.division;
                             
                             $("#range").val(range);
                             $("#beat").val(beat);
                             $("#block").val(block);
                             $("#division").val(division);
                             $("#district").val(district);
                        //}
                   // }
                }
             })
           });
        });

    </script>



</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\complaint-manager\resources\views/ComplaintModule/create.blade.php ENDPATH**/ ?>