



<?php $__env->startSection('content'); ?>
<div class="page-content">

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
                  <h6 class="card-title mb-0">Delivery Type</h6>
              
                  <div class="dropdown mb-2">
                   
                    <a class="btn btn-success" href="<?php echo e(route('coreModule.administrativeSettings.addbank')); ?>"> <span class="">Add New Bank</span></a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">Bank ID</th>
                        <th class="pt-0">Bank Name</th>
                        <th class="pt-0">Action</th>
                        
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                      
                        <td><span class="badge badge-danger"><?php echo e($bank->id); ?></span></td>
                        <td><?php echo e($bank->name); ?></td>
                        <td><a href="<?php echo e(URL::to('/')); ?>/coreModule/editbank/<?php echo e($bank->id); ?>"><i data-feather="edit-3" class="icon-sm mr-2"></i></a> | <a href="<?php echo e(route('coreModule.administrativeSettings.deletebank',$bank->id)); ?>" onclick="if (!confirm('Are you sure to delete this record?')) { return false }"><i data-feather="trash" class="icon-sm mr-2"></i></i></a></td> 
                        
                         

                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>

                  <div class="pagination">
                  <?php //echo $category->render(); ?>

                    </div>

                </div>
              </div> 
            </div>
          </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/coreModule/administrativeSettings/banks.blade.php ENDPATH**/ ?>