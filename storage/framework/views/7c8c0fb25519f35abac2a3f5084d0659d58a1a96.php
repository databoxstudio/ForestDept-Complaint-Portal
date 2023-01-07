



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
                <h6 class="card-title">Add Warehouse</h6>
                <form class="forms-sample" action="<?php echo e(route('coreModule.administrativeSettings.createwarehouse')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                    <div class="row">

                    	 <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Warehouse Name</label>
                                <input type="text" class="form-control" id="warehouse_name"  name="name" placeholder="Warehouse Name"   autocomplete="off" required>
                            </div>
                        </div><!-- Col -->
                                            
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Warehouse Address</label>
                                <input type="text" class="form-control" id="address"  name="address" placeholder="Warehouse Address"   autocomplete="off" required>
                            </div>
                        </div><!-- Col -->
                                           

                        <div class="col-sm-4">
                           <div class="form-group">
										<label>State</label>
										<div class="input-group col-xs-12">
                       <select class="js-example-basic-single"  name="state_id" id="employeFilter">
                        <?php foreach($states as $state) { ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                       <?php } ?>
                      
                     </select>

												</div>
									</div>
                        </div><!-- Col -->
                    </div><!-- Row -->


                    <div class="row">
                        <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">City</label>
                       
                         
                         <select class="js-example-basic-single"  name="city_id" id="employeFilter">
                        <?php foreach($cities as $city) { ?>
                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                       <?php } ?>
                      
                     </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Zipcode</label>
                        <input type="text" class="form-control" id="zipcode"  name="zipcode" placeholder="Zipcode" onkeypress="return isNumberKey(event)"  autocomplete="off" required>
                    </div>
                </div>

			
                </div>
                 <a class="btn btn-success" href="<?php echo e(route('coreModule.administrativeSettings.warehouses')); ?>"> <span class="">Back</span></a>
                    <button type="submit" class="btn btn-primary mr-2">Create</button>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/coreModule/administrativeSettings/addwarehouse.blade.php ENDPATH**/ ?>