<?php $__env->startSection('content'); ?>

<style>
    .table td {
	font-size: 15px;
}
    
</style>

<div class="page-content">

    
       
        <div class="col-lg-12 col-xl-12 stretch-card">



         <div class="col-sm-2">

                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                  <a href="#" class="btn btn-success btnprn btn">Print Preview</a>

                            </div>

                        </div>

          
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script
            



            <div class="card">

              <div class="card-body">


                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>

                         <th class="pt-0">UID</th> 

                        <th class="pt-0">Contact Number</th>

                        <th class="pt-0">Full Name</th>

                        <th class="pt-0">Forest Area</th>
                        <th class="pt-0">Forest Area</th>

                   
                   
                        

                    </thead>

                    <tbody>

                        <?php if(!$complaints->isEmpty()): ?> 
                     <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                      <tr>

                         <td><?php echo e($complaint->uid); ?></td>
<td><?php echo e($complaint->contact_number); ?> </td>
                        <td><?php echo e($complaint->full_name); ?> </td>

                        <td>Village:<?php echo e($complaint->villege); ?> <br/>Beat: <?php echo e($complaint->beat); ?> <br/>Block: <?php echo e($complaint->block); ?> <br/>Range: <?php echo e($complaint->range); ?> <br/>Division: <?php echo e($complaint->division); ?></td>

                         <td><?php if(!empty($complaint->information)): ?>
        
        Information: <?php echo html_entity_decode($complaint->information); ?> <br/><br/>
          Information Detail: <?php echo html_entity_decode($complaint->complaintdetail); ?>

          <?php endif; ?>
        
     
       
         <?php if(!empty($complaint->complaint)): ?>

          Complaint: <?php echo e($complaint->complaint); ?> <br/><br/>
            Complaint Detail: <?php echo html_entity_decode($complaint->complaintdetail); ?>

           <?php endif; ?>
          
      
          
          
         
          </td>
                      

                     
                      </tr>
                     
                     

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       <?php else: ?>

                         <tr>

                         <td colspan="5" style="font-size: 16px;font-weight: bold;text-align: center;">No complaints are registered yet!</td> 

           



                      </tr>

                      <?php endif; ?>

                     

                    </tbody>

                  </table>

                 

                </div>

              </div> 

            </div>

          </div>



</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/databoxstudio/public_html/resources/views/PrintModule/printcomplaint.blade.php ENDPATH**/ ?>