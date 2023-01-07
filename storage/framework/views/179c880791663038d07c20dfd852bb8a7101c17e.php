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

                                <h6 class="card-title">Add Supervisor</h6>

                                    <form class="forms-sample" action="<?php echo e(route('supervisorsModule.save')); ?>" method="post">

                <?php echo e(csrf_field()); ?>




                                         <div class="row">

                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Supervisor's Warehouse</label>

                                                    <select class="form-control" id="warehouse_id" name="warehouse_id">

                                                        <option value="">Select Warehouse</option>

                                                        <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(old('warehouse_id') == $warehouse->id): ?>
                                                            <option value="<?php echo e($warehouse->id); ?>" selected="selected"><?php echo e($warehouse->name); ?></option>
                                                            <?php else: ?>
                                                            <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                                            <?php endif; ?>



                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select>

                                                </div>

                                            </div><!-- Col -->

                                             <div class="col-sm-4"



                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Supervisor Contact Number</label>

                                                    <input type="text" value="<?php echo e(old('phone_number')); ?>" class="form-control" id="phone_number" name="phone_number" autocomplete="off" placeholder="Contact Number" onkeypress="return isNumberKey(event)">

                                                </div>

                                            </div><!-- Col -->

                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Supervisor Email</label>

                                                    <input type="email" value="<?php echo e(old('email')); ?>" class="form-control" id="email" name="email" autocomplete="off" placeholder="Supervisor Email">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Password</label>

                                                    <input type="text" class="form-control id="password" name="password" autocomplete="off" placeholder="Password">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->



                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Supervisor First Name</label>

                                                    <input type="text" value="<?php echo e(old('first_name')); ?>" class="form-control" id="first_name" name="first_name" autocomplete="off" placeholder="Supervisor First Name">

                                                </div>

                                            </div><!-- Col -->

                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Supervisor Last Name</label>

                                                    <input type="text" value="<?php echo e(old('last_name')); ?>" class="form-control" id="last_name" name="last_name" autocomplete="off" placeholder="Supervisor Last Name">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Father's Name</label>

                                                    <input type="text" value="<?php echo e(old('fathers_name')); ?>" class="form-control id="fathers_name" name="fathers_name" autocomplete="off" placeholder="Father's Name">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Date of Birth</label>

                                                    <input type="text" value="<?php echo e(old('dob')); ?>" class="form-control" id="dob"  name="dob" autocomplete="off" placeholder="Date of Birth">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Blood Group</label>

                                                    <select name="blood_group" class="form-control" id="exampleFormControlSelect1">

                                                       <option selected="" disabled="">Select Blood Group</option>

                                                        <option value="A+">A+</option>

                                                        <option value="B+">B+</option>

                                                        <option value="O+">O+</option>

                                                        <option value="AB+">AB+</option>

                                                        <option value="A-">A-</option>

                                                        <option value="B-">B-</option>

                                                        <option value="O-">O-</option>

                                                        <option value="AB-">AB-</option>

                                                    </select>

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

                                                   <input type="text" value="<?php echo e(old('local_address_line_1')); ?>" class="form-control" id="local_address_line_1"  name="local_address_line_1" autocomplete="off" placeholder="Address Line 1">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 2</label>

                                                    <input type="text" value="<?php echo e(old('local_address_line_2')); ?>" class="form-control" id="local_address_line_2"  name="local_address_line_2" autocomplete="off" placeholder="Address Line 2">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">State</label>

                                                   

                                                      <select class="form-control" name="local_address_state" id="exampleFormControlSelect1">

                                                    <option selected="" disabled="">Select State</option>

                                                

                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(old('local_address_state') == $state->id): ?>
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

                                                     <select class="form-control" name="local_address_city" id="exampleFormControlSelect1">

                                                    <option selected="" disabled="">Select City</option>

                                              

                                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(old('local_address_city') == $city->id): ?>
                                                            <option value="<?php echo e($city->id); ?>" selected="selected"><?php echo e($city->name); ?></option>
                                                            <?php else: ?> 
                                                            <option value="<?php echo e($city->id); ?>")><?php echo e($city->name); ?></option>
                                                            <?php endif; ?>



                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Pincode</label>

                                                    <input type="text" value="<?php echo e(old('local_address_pincode')); ?>" class="form-control" id="local_address_pincode"  name="local_address_pincode" autocomplete="off" placeholder="Pincode" onkeypress="return isNumberKey(event)">

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

                                                   <input type="text" value="<?php echo e(old('permanent_address_line_1')); ?>" class="form-control" id="permanent_address_line_1"  name="permanent_address_line_1" autocomplete="off" placeholder="Address Line 1">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 2</label>

                                                    <input type="text" value="<?php echo e(old('permanent_address_line_2')); ?>" class="form-control" id="permanent_address_line_2"  name="permanent_address_line_2" autocomplete="off" placeholder="Address Line 2">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">State</label>

                                                   

                                                      <select class="form-control" name="permanent_address_state" id="exampleFormControlSelect1">

                                                    <option selected="" disabled="">Select State</option>

                                                   <option>Select State</option>

                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(old('permanent_address_state') == $state->id): ?>
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

                                                     <select class="form-control" name="permanent_address_city" id="exampleFormControlSelect1">

                                                    <option selected="" disabled="">Select City</option>

                                               

                                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <?php if(old('permanent_address_city') == $city->id): ?>
                                                            <option value="<?php echo e($city->id); ?>" selected="selected"><?php echo e($city->name); ?></option>
                                                             <?php else: ?> 
                                                            <option value="<?php echo e($city->id); ?>")><?php echo e($city->name); ?></option>
                                                            <?php endif; ?>


                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Pincode</label>

                                                    <input type="text" value="<?php echo e(old('permanent_address_pincode')); ?>" class="form-control" id="permanent_address_pincode"  name="permanent_address_pincode" autocomplete="off" placeholder="Pincode" onkeypress="return isNumberKey(event)">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                    



                                         

                                      

                                       



                                       



                                     <button class="btn btn-light">Back</button>

                                     <button type="submit" class="btn btn-primary mr-2">Create Supservisor</button>

                                       </form>

                            </div>

                        </div>

                    </div>

                </div>







</div>

<?php $__env->stopSection(); ?>





      <script>

      function isNumberKey(evt){

    var charCode = (evt.which) ? evt.which : evt.keyCode

    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;

    return true;

}

</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/SupervisorModule/create.blade.php ENDPATH**/ ?>