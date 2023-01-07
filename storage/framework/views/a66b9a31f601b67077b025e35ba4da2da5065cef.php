<?php $__env->startSection('content'); ?>

<div class="page-content">



<div class="row">

                    <div class="col-md-12 stretch-card">

                        <div class="card">

                            <div class="card-body">

                                <?php if(session()->has('message')): ?>

                <div class="alert alert-success">

                    <?php echo e(session()->get('message')); ?>


                </div>

                <?php endif; ?>

                                <h6 class="card-title">Agent Detail</h6>

                                    <form class="forms-sample" action="<?php echo e(route('staffModule.save')); ?>" method="post">

                <?php echo e(csrf_field()); ?>


                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Agent First Name</label>

                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo e($users->first_name); ?>" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Agent Last Name</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->last_name); ?>" name="last_name" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Father's Name</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->fathers_name); ?>" name="fathers_name" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Date of Birth</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->dob); ?>"  name="dob" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Blood Group</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->blood_group); ?>"  name="blood_group" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                              <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Contact Numnber</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->phone_number); ?>"  name="phone_number" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->









                                        <div class="row">

                                            <h6 class="card-title">Local Address</h6>

                                                </div>

                                        <div class="row">



                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 1</label>

                                                   <input type="text" class="form-control" value="<?php echo e($users->local_address_line_1); ?>"  name="local_address_line_1" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 2</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->local_address_line_2); ?>"  name="local_address_line_2" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">State</label>

                                                     <input type="text" class="form-control" value="<?php echo e($users->localState->name); ?>"  name="local_address_state" disabled="disabled">



                                                    

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">City</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->local_address_city); ?>"  name="local_address_city" disabled="disabled">



                                                   

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Pincode</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->local_address_pincode); ?>"  name="local_address_pincode" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                    



                                        <div class="row">

                                            <h6 class="card-title">Permanent Address</h6>

                                                </div>

                                          <div class="row">

                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 1</label>

                                                   <input type="text" class="form-control" value="<?php echo e($users->permanent_address_line_1); ?>"  name="permanent_address_line_1" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 2</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->permanent_address_line_2); ?>"  name="permanent_address_line_2" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">State</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->permanentState->name); ?>"  name="permanent_address_state" disabled="disabled">



                                                    

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">City</label>

                                                     <input type="text" class="form-control" value="<?php echo e($users->permanent_address_city); ?>"  name="local_address_city" disabled="disabled">



                                                     

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Pincode</label>

                                                    <input type="text" class="form-control" value="<?php echo e($users->permanent_address_pincode); ?>" name="permanent_address_pincode" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                    
                                 

                                       </form>

                            </div>

                        </div>

                    </div>

                </div>







</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/databoxstudio/public_html/resources/views/StaffModule/view.blade.php ENDPATH**/ ?>