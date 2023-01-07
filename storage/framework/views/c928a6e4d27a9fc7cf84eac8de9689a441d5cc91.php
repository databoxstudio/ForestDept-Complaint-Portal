<?php $__env->startSection('content'); ?>

<div class="page-content">

    

    

        <div class="col-lg-12 col-xl-12 stretch-card">

        <div class="card">

            <div class="card-body">

                <form action="">

                                      

                    <div class="row">

                        <div class="col-sm-3">

                            <div class="form-group">

                                <label class="control-label">Select Division</label>

                              

                                   <select class="js-example-basic-single w-100" name="search_text" id="divid">
     <option selected="" disabled="">Select Division</option>
                                         <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(@$_REQUEST['search_text'] == $division->division_name): ?>
                <option value="<?php echo e($division->division_name); ?>" selected="selected"><?php echo e($division->division_name); ?></option>
                <?php else: ?> 
                <option value="<?php echo e($division->division_name); ?>"><?php echo e($division->division_name); ?></option>
                <?php endif; ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

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

                                  <a href="<?php echo e(route('complaintsModule.contactnumbers')); ?>" class="btn btn-success">Reset Filter</a>

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

                  <h6 class="card-title mb-0">Officer's Contact Number</h6>

                 <!-- <div class="dropdown mb-2">

                     

                    <a class="btn btn-success" href="<?php echo e(route('complaintsModule.create')); ?>"> <span class="">Add New Complaint</span></a>

                  </div>-->

                </div>

                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>
                          <th class="pt-0">Division</th>

                   
                        <th class="pt-0">DFO Name</th>

                         <th class="pt-0">DFO Contact</th>

                         <th class="pt-0">Range Name</th> 

                        <th class="pt-0">Range Officer Name</th>

                        <th class="pt-0">Range Officer Contact</th>

                      

                        

                    </thead>

                    <tbody>

                        <?php if(!$contactnumbers->isEmpty()): ?> 
                     <?php $__currentLoopData = $contactnumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contactnumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                 <td><?php echo e($contactnumber->division_name); ?> </td>

                               <td><?php echo e($contactnumber->dfo_name); ?> </td>
                                  <td><?php echo e($contactnumber->dfo_contact); ?> </td>

                              <td><?php echo e($contactnumber->range_name); ?></td>
                              <td><?php echo e($contactnumber->ro_name); ?> </td>
                              <td><?php echo e($contactnumber->ro_contact); ?> </td>

                             


                      

           



                      </tr>
                     
                     

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       <?php else: ?>

                         <tr>

                         <td colspan="5" style="font-size: 16px;font-weight: bold;text-align: center;">No contact number found!</td> 

           



                      </tr>

                      <?php endif; ?>

                     

                    </tbody>

                  </table>

                  <div class="pagination">

                        <?php echo e($contactnumbers->render()); ?>




                    </div>

                </div>

              </div> 

            </div>

          </div>



</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/databoxstudio/public_html/resources/views/ComplaintModule/contactnumbers.blade.php ENDPATH**/ ?>