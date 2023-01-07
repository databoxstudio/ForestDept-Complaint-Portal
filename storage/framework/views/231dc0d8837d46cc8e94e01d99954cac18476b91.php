



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
                                <h6 class="card-title">Update Supervisor Profile</h6>
                                    <form class="forms-sample" action="<?php echo e(route('usersModule.updateprofile')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="<?php echo e($users->id); ?>" name="user_id">

                                         <div class="row">
                                            
                                        </div><!-- Row -->

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" placeholder="First Name" value="<?php echo e($users->first_name); ?>">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" placeholder="Last Name" value="<?php echo e($users->last_name); ?>">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email" value="<?php echo e($users->email); ?>">
                                                </div>
                                            </div><!-- Col -->
                                            
                                             
                                             
                                            
                                           
                                        </div><!-- Row -->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Contact Number</label>
                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" autocomplete="off" placeholder="Contact Number" value="<?php echo e($users->phone_number); ?>" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div><!-- Col -->
                             
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" class="form-control" id="dob"  name="dob" autocomplete="off" placeholder="Date of Birth" value="<?php echo e($users->dob); ?>">
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
                                                   <input type="text" class="form-control" id="local_address_line_1"  name="local_address_line_1" autocomplete="off" placeholder="Address Line 1" value="<?php echo e($users->local_address_line_1); ?>">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="local_address_line_2"  name="local_address_line_2" autocomplete="off" placeholder="Address Line 2" value="<?php echo e($users->local_address_line_2); ?>">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                      <select class="form-control" name="local_address_state" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select State</option>
                                                      <option>Select Warehouse</option>
                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>

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
                                                            <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="text" class="form-control" id="local_address_pincode"  name="local_address_pincode" autocomplete="off" placeholder="Pincode" onkeypress="return isNumberKey(event)" value="<?php echo e($users->local_address_pincode); ?>">
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
                                                   <input type="text" class="form-control" id="permanent_address_line_1"  name="permanent_address_line_1" autocomplete="off" placeholder="Address Line 1" value="<?php echo e($users->permanent_address_line_1); ?>">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="permanent_address_line_2"  name="permanent_address_line_2" autocomplete="off" placeholder="Address Line 2" value="<?php echo e($users->permanent_address_line_2); ?>">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                      <select class="form-control" name="permanent_address_state" id="exampleFormControlSelect1" >
                                                    <option selected="" disabled="">Select State</option>
                                                   <option>Select Warehouse</option>
                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>

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
                                                            <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="text" class="form-control" id="permanent_address_pincode"  name="permanent_address_pincode" autocomplete="off" placeholder="Pincode" onkeypress="return isNumberKey(event)" value="<?php echo e($users->permanent_address_pincode); ?>">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->
                                    

                                         
                                      
                                       
                                     <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/userModule/editprofile.blade.php ENDPATH**/ ?>