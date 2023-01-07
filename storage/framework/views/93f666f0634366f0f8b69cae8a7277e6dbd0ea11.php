



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
                <h6 class="card-title">Update Department/Category</h6>
                <form class="forms-sample" action="<?php echo e(route('coreModule.administrativeSettings.updatebank')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                    <div class="row">
                    <input type="hidden" class="form-control" id="bank_id" name="bank_id" value="<?php echo e($banks->id); ?>" >

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Bank Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Bank Name" value="<?php echo e($banks->name); ?>">
                                                </div>
                                            </div>

                                           

                                           
                                            
                                        </div><!-- Row -->



               
                 <a class="btn btn-success" href="<?php echo e(route('coreModule.administrativeSettings.banks')); ?>"> <span class="">Back</span></a>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>

                </form>
              </div>
            </div>
                    </div>
                
                </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/coreModule/administrativeSettings/editbank.blade.php ENDPATH**/ ?>