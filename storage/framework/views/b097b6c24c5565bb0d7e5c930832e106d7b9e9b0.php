<?php $__env->startSection('content'); ?>
<div class="page-content">
    
    
        <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="">
                                        <input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ;?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Search Text</label>
                                <input type="text" class="form-control" name="search_text" value="<?php echo ((isset($_REQUEST['search_text']) ? $_REQUEST['search_text'] : "")); ?>" placeholder="Search Text">
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="location">State</label>
                                <select class="form-control" id="location" name="state_id">
                                    <option selected="" disabled="">Select State</option>
                                  
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="location">City</label>
                                <select class="form-control" id="location" name="city_id">
                                    <option selected="" disabled="">Select City</option>
                                  
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="location">&nbsp;</label>
                                   <button class="btn btn-success">Filter Profiles</button>
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
                  <h6 class="card-title mb-0">Warehouses</h6>
              
                  <div class="dropdown mb-2">
                   
                    <a class="btn btn-success" href="<?php echo e(route('coreModule.administrativeSettings.addwarehouse')); ?>"> <span class="">Add New Warehouse</span></a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">Warehouse ID</th>
                        <th class="pt-0">Warehouse Name</th>
                        <th class="pt-0">Warehouse Address</th>
                        <th class="pt-0">State / City</th>
                        <th class="pt-0">Action</th>
                        
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                      
                        <td><span class="badge badge-danger"><?php echo e($warehouse->id); ?></span></td>
                        <td><?php echo e($warehouse->name); ?></td>
                        <td><?php echo e($warehouse->address); ?></td>
                        <td><?php echo e($warehouse->State->name); ?> / <?php echo e($warehouse->City->name); ?></td>
                        <td><a href="<?php echo e(URL::to('/')); ?>/coreModule/editwarehouse/<?php echo e($warehouse->id); ?>"><i data-feather="edit-3" class="icon-sm mr-2"></i></a> | <a href="<?php echo e(route('coreModule.administrativeSettings.deletewarehouse',$warehouse->id)); ?>" onclick="if (!confirm('Are you sure to delete this record?')) { return false }"><i data-feather="trash" class="icon-sm mr-2"></i></i></a></td> 
                         

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/objectivo.in/public_html/resources/views/coreModule/administrativeSettings/warehouses.blade.php ENDPATH**/ ?>