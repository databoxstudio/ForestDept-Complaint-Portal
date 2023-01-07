



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
                  <h6 class="card-title mb-0">Admin Users</h6>
              
                 <!-- <div class="dropdown mb-2">
                   
                    <a class="btn btn-success" href="<?php echo e(route('usersModule.create')); ?>"> <span class="">Add New Admin User</span></a>
                  </div>-->
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">User ID</th>
                        <th class="pt-0">User Name</th>
                        <th class="pt-0">User Email</th>
                        <th class="pt-0">Local Address</th>
                        <th class="pt-0">Permanent Address</th>
                        <th class="pt-0">Action</th>
                        
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                         <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->local_address_line_1); ?> <?php echo e($user->local_address_line_2); ?>
                            <?php echo e($user->local_address_state); ?> <?php echo e($user->local_address_city); ?>
                            <?php echo e($user->local_address_pincode); ?>
                        </td>
                        <td><?php echo e($user->permanent_address_line_1); ?> <?php echo e($user->permanent_address_line_2); ?>
                            <?php echo e($user->permanent_address_state); ?> <?php echo e($user->permanent_address_city); ?>
                            <?php echo e($user->permanent_address_pincode); ?></td>
                        <td><a href=""><i data-feather="edit-3" class="icon-sm mr-2"></i></a> | <a href=""><i data-feather="trash" class="icon-sm mr-2"></i></i></a></td> 
           

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/userModule/index.blade.php ENDPATH**/ ?>