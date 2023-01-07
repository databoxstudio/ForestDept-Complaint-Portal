<?php $__env->startSection('content'); ?>

<div class="page-content">

    

    

        <div class="col-lg-12 col-xl-12 stretch-card">

        <div class="card">

            <div class="card-body">

                <form action="">

                                      

                    <div class="row">

                        <div class="col-sm-3">

                            <div class="form-group">

                                <label class="control-label">Search Text</label>


                                <input type="text" class="form-control" name="search_text" value="<?php echo ((isset($_REQUEST['search_text']) ? $_REQUEST['search_text'] : "")); ?>" placeholder="Search Text">
<!--<input type="text" class="form-control datepicker1"><span class="input-group-addon"><i data-feather="calendar"></i></span>-->
                            </div>

                        </div>

                       

                     


                        <div class="col-sm-2">

                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                   <button class="btn btn-success">Filter Complaint</button>

                            </div>

                        </div>



                         <div class="col-sm-2">

                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                  <a href="<?php echo e(route('customersModule.customers')); ?>" class="btn btn-success">Reset Filter</a>

                            </div>

                        </div>

 <div class="col-sm-2">


                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                  <a href="<?php echo e(route('printModule.index')); ?>" target="_blank" class="btn btn-success">Print</a>

                            </div>

                        </div>

                    </div>

                 

                </form>

            </div>

        </div>

    </div>



        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">


          <div>

            <!-- <h4 class="mb-3 mb-md-0">Roles page.</h4> -->

          </div>

        </div>

        <div class="col-lg-12 col-xl-12 stretch-card">

            <div class="card">

              <div class="card-body">

              <?php if(session()->has('message')): ?>

                <div class="alert alert-success">

                    <?php echo e(session()->get('message')); ?>


                </div>

                <?php endif; ?>


                <div class="d-flex justify-content-between align-items-baseline mb-2">

                  <h6 class="card-title mb-0">Complaints</h6>

                  <div class="dropdown mb-2">

                     

                    <a class="btn btn-success" href="<?php echo e(route('complaintsModule.create')); ?>"> <span class="">Add New Complaint</span></a>

                  </div>

                </div>

                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>

                         <th class="pt-0">UID</th> 

                        <th class="pt-0">Contact Number</th>

                        <th class="pt-0">Full Name</th>

                        <th class="pt-0">Forest Area</th>
                        <th class="pt-0">Complaint/Information</th>

                   
                        <th class="pt-0">Action</th>

                        

                    </thead>

                    <tbody>

                        <?php if(!$complaints->isEmpty()): ?> 
                     <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                      <tr>

                         <td><?php echo e($complaint->uid); ?></td>
<td><?php echo e($complaint->contact_number); ?> </td>
                        <td><?php echo e($complaint->full_name); ?> </td>

                        <td>Village:<?php echo e($complaint->villege); ?> <br/> Beat: <?php echo e($complaint->beat); ?> <br/> Block: <?php echo e($complaint->block); ?> <br/> Range: <?php echo e($complaint->range); ?> <br/> Division: <?php echo e($complaint->division); ?></td>

                         <td><?php if(!empty($complaint->information)): ?>
        
        Information: <?php echo html_entity_decode($complaint->information); ?> <br/><br/>
          Information Detail: <?php echo html_entity_decode($complaint->complaintdetail); ?>

          <?php endif; ?>
        
     
       
         <?php if(!empty($complaint->complaint)): ?>

          Complaint: <?php echo e($complaint->complaint); ?> <br/><br/>
            Complaint Detail: <?php echo html_entity_decode($complaint->complaintdetail); ?>

           <?php endif; ?>
          
      
          
          
         
          </td>
                      

                        <td><a href="<?php echo e(route('complaintsModule.view',$complaint->id)); ?>" class="view_client" ids="<?php echo e($complaint->id); ?>"><img src="/complaintportal/public/assets/images/icons8-view-25.png" style="width:14px;"></a>|<a href="<?php echo e(route('complaintsModule.edit',$complaint->id)); ?>"><img src="/complaintportal/public/assets/images/icons8-edit-24.png" style="width:14px;"></a>|<a href="<?php echo e(route('complaintsModule.delete',$complaint->id)); ?>" onclick="return confirm('Are you sure?')"><img src="/complaintportal/public/assets/images/icons8-delete.svg" style="width:14px;"></a></td>
                      </tr>
                     
                     

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       <?php else: ?>

                         <tr>

                         <td colspan="5" style="font-size: 16px;font-weight: bold;text-align: center;">No complaints are registered yet!</td> 

           



                      </tr>

                      <?php endif; ?>

                     

                    </tbody>

                  </table>

                  <div class="pagination">

                        <?php echo e($complaints->render()); ?>




                    </div>

                </div>

              </div> 

            </div>

          </div>



</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/databoxstudio/public_html/complaintportal/resources/views/ComplaintModule/index.blade.php ENDPATH**/ ?>