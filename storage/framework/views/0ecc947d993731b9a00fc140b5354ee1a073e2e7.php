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
                                <h6 class="card-title">Add Staff</h6>
                                    <form class="forms-sample" action="<?php echo e(route('staffModule.save')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Staff First Name</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo e(old('first_name')); ?>" autocomplete="off" placeholder="Staff First Name">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Staff Last Name</label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo e(old('last_name')); ?>" autocomplete="off" placeholder="Staff Last Name">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Father's Name</label>
                                                    <input type="text" class="form-control id="fathers_name" name="fathers_name" value="<?php echo e(old('fathers_name')); ?>" autocomplete="off" placeholder="Father's Name">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" class="form-control" id="dob"  name="dob" autocomplete="off" value="<?php echo e(old('dob')); ?>" placeholder="Date of Birth" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
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
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Contact Number</label>
                                                    <input type="text" class="form-control" id="phone_number"  name="phone_number" value="<?php echo e(old('phone_number')); ?>" autocomplete="off" placeholder="Phone Number">
                                                </div>
                                            </div><!-- Col -->
                                            
                                        </div><!-- Row -->

                                           <div class="row">
                                            <h6 class="card-title">Login Credentials</h6>
                                                </div>
                                                 <div class="row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Email Address</label>
                                                   <input type="email" class="form-control" id="email"  name="email" value="<?php echo e(old('email')); ?>" autocomplete="off" placeholder="Email Address">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input type="password" class="form-control" id="password"  name="password" value="<?php echo e(old('first_name')); ?>" autocomplete="off" placeholder="Password">
                                                </div>
                                            </div><!-- Col -->
                                        </div>


                                        <div class="row">
                                            <h6 class="card-title">Local Address</h6>
                                                </div>
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Local Address Line 1</label>
                                                   <input type="text" class="form-control" id="local_address_line_1"  name="local_address_line_1" value="<?php echo e(old('local_address_line_1')); ?>" autocomplete="off" placeholder="Address Line 1">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Local Address Line 2</label>
                                                    <input type="text" class="form-control" id="local_address_line_2"  name="local_address_line_2" value="<?php echo e(old('local_address_line_2')); ?>" autocomplete="off" placeholder="Address Line 2">
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
                                                    <input type="text" class="form-control" id="local_address_city"  name="local_address_city" value="<?php echo e(old('local_address_city')); ?>" autocomplete="off" placeholder="City">


                                                    
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="number" class="form-control" id="local_address_pincode"  name="local_address_pincode" value="<?php echo e(old('local_address_pincode')); ?>" autocomplete="off" placeholder="Pincode">
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
                                                   <input type="text" class="form-control" id="permanent_address_line_1"  name="permanent_address_line_1" value="<?php echo e(old('permanent_address_line_1')); ?>" autocomplete="off" placeholder="Address Line 1">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="permanent_address_line_2"  name="permanent_address_line_2" value="<?php echo e(old('permanent_address_line_2')); ?>" autocomplete="off" placeholder="Address Line 2">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                     <select class="form-control" name="permanent_address_state" id="exampleFormControlSelect1">

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

                                                     <input type="text" class="form-control" id="permanent_address_city"  name="permanent_address_city" value="<?php echo e(old('permanent_address_city')); ?>" autocomplete="off" placeholder="City">


                                                  
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="text" class="form-control" id="permanent_address_pincode"  name="permanent_address_pincode" value="<?php echo e(old('permanent_address_pincode')); ?>" autocomplete="off" placeholder="Pincode">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->
                                    

                                
                                       

                                     <a class="btn btn-light" href="<?php echo e(route('staffModule.staff')); ?>">Back</a>
                                     <button type="submit" class="btn btn-primary mr-2">Create Staff</button>
                                       </form>
                            </div>
                        </div>
                    </div>
                </div>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/databoxstudio/public_html/resources/views/StaffModule/create.blade.php ENDPATH**/ ?>