<?php $__env->startSection('content'); ?>

<style>
    
    .form-group label {
	font-size: 1.5rem;
}
.form-check .form-check-label {
	font-size: 1.5rem;
}
  
  .btn, .fc .fc-button, .swal2-modal .swal2-actions button, .wizard > .actions a, .wizard > .actions a:hover, .wizard > .actions .disabled a {
	font-size: 1.5rem;
}  
</style>
<div class="page-content">

<div class="row">
<div class="col-md-12 stretch-card">
<div class="card">
<div class="card-body">

<?php echo e(csrf_field()); ?>




<div class="d-flex justify-content-between align-items-baseline mb-2">

                  <h6 class="card-title mb-0">View Complaint</h6>

                  <div class="dropdown mb-2">

                     

                    <a class="btn btn-success btnprn btn" href="<?php echo e(route('printModule.prndetail',$complaints->id)); ?>"> <span class="">Print</span></a>

                  </div>

                </div>

<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script
            

<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
           <div class="form-group">
        <label class="control-label">UID: <?php echo e($complaints->uid); ?></label>
           </div>
    <div class="form-group">
        <label class="control-label">Contact Number: <?php echo e($complaints->contact_number); ?></label>
           </div>

     <div class="form-group">
        <label class="control-label">Full Name:  <?php echo e($complaints->full_name); ?></label>
       
    </div>

   <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" disabled="disabled" name="keep_identity_concealed" value="1" class="form-check-input" <?php echo e(($complaints->keep_identity_concealed == "1") ? 'checked': ''); ?>>
                                            Do you want to keep your identity concealed ?
                                        <i class="input-frame"></i></label>
            </div>

 <div class="form-group">
        <label class="control-label">Village: <?php echo e($complaints->villege); ?></label>
       

    </div>

 <div class="form-group">
        <label class="control-label">Beat: <?php echo e($complaints->beat); ?></label>
       

    </div>

     <div class="form-group">
        <label class="control-label">Block: <?php echo e($complaints->block); ?></label>
    </div>

     <div class="form-group">
        <label class="control-label">Range: <?php echo e($complaints->range); ?></label>
    </div>

         <div class="form-group">
        <label class="control-label">District: <?php echo e($complaints->district); ?></label>
       

    </div>

     <div class="form-group">
        <label class="control-label">Division: <?php echo e($complaints->division); ?></label>
    </div>

     <div class="form-group">
     
        <label class="control-label">Nature of Information: <?php echo e(ucfirst(trans($complaints->nature_information))); ?></label>
       


         
    </div>

     <div class="form-group">

       <?php if(!empty($complaints->information)): ?>
        <label class="control-label">Information: <?php echo html_entity_decode($complaints->information); ?></label>
       
         <?php else: ?>

          <label class="control-label">Complaint: <?php echo e($complaints->complaint); ?></label>
          <?php endif; ?>
    </div>
    
    
                    <div class="form-group">
                        
                        
                        <label class="control-label">Complaint Detail: <?php echo html_entity_decode($complaints->complaintdetail); ?></label>





    </div>
    
    


       



</div>
</div>
</div>


<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->

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
    $("#complaint").show();
    $("#information").hide();
    $("input[name$='nature_information']").click(function() {
        var test = $(this).val();

        if(test=='information'){

        $("#information").show();
        $("#complaint").hide();
    } else {
        $("#information").hide();
        $("#complaint").show();
    }
    });
});





</script>


<?php $__env->stopSection(); ?>




















<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/databoxstudio/public_html/resources/views/PrintModule/printDetail.blade.php ENDPATH**/ ?>