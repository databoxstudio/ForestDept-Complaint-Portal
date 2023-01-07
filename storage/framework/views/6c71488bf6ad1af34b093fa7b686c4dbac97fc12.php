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

                                <h6 class="card-title">Update Customer Profile</h6>

                                    <form class="forms-sample" action="<?php echo e(route('customersModule.update')); ?>" method="post" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>


                <input type="hidden" value="<?php echo e($users->id); ?>" name="user_id">



                                      



                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Customer First Name</label>

                                                    <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" placeholder="Agent First Name" value="<?php echo e($users->first_name); ?>">

                                                </div>

                                            </div><!-- Col -->

                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Customer Last Name</label>

                                                    <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" placeholder="Agent Last Name" value="<?php echo e($users->last_name); ?>">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Customer Contact Number</label>

                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" autocomplete="off" placeholder="Contact Number" value="<?php echo e($users->phone_number); ?>" onkeypress="return isNumberKey(event)">

                                                </div>

                                            </div><!-- Col -->
                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Customer Email</label>

                                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email" value="<?php echo e($users->email); ?>">

                                                </div>

                                            </div><!-- Col -->
                                              <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Reference By</label>

                                                    <input type="text" class="form-control" id="reference_by" name="reference_by" autocomplete="off" placeholder="Reference By" value="<?php echo e($users->reference_by); ?>">

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

                                                      <option>Select Warehouse</option>

                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <option value="<?php echo e($state->id); ?>" <?php if($state->id==$users->local_address_state) { echo "selected=selected"; }?>><?php echo e($state->name); ?></option>



                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">City</label>

                                                    
                                                      <input type="text" class="form-control" id="local_address_city"  name="local_address_city" autocomplete="off" placeholder="City" value="<?php echo e($users->local_address_city); ?>">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Pincode</label>

                                                    <input type="text" class="form-control" id="local_address_pincode"  name="local_address_pincode" autocomplete="off" placeholder="Pincode" onkeypress="return isNumberKey(event)" value="<?php echo e($users->local_address_pincode); ?>">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                    



                                    

                                         



                                       



                                     <a href="<?php echo e(route('customersModule.customers')); ?>"class="btn btn-light">Back</a>

                                     <button type="submit" class="btn btn-primary mr-2">Update Customer</button>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\akriti\resources\views/CustomerModule/edit.blade.php ENDPATH**/ ?>