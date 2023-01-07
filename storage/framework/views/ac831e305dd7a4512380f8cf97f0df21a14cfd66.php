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
                                <label for="location">Agent</label>
                                  <select class="form-control" id="agent" name="agent">
                                    <option selected="" disabled="">Select Agent</option>
                                      <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($agent->id); ?>" <?php if(isset($_REQUEST['agent']) == $agent->id ){ echo "selected"; } ?> ><?php echo e($agent->first_name); ?> <?php echo e($agent->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>    
                            </div>
                        </div>

                       



                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="location">Supervisor</label>
                                  <select class="form-control" id="supervisor_id" name="supervisor_id">
                                    <option selected="" disabled="">Select Supervisor</option>
                                      <?php $__currentLoopData = $supervisors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supervisor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($supervisor->id); ?>" <?php //if(isset($_REQUEST['warehouse_id']) == $warehouse->id ){ echo "selected"; } ?> ><?php echo e($supervisor->first_name); ?> <?php echo e($supervisor->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>    
                            </div>
                        </div>

                            <div class="col-sm-3" id="selmonth">
                            <div class="form-group">
                                <label class="control-label">Month</label>
                                <select name="month">
                             <option value="">All Months</option>
                             <option value="01" <?php if(@$_REQUEST['month']=='01'){ echo 'selected'; } ?>>January</option>
                             <option value="02" <?php if(@$_REQUEST['month']=='02'){ echo 'selected'; } ?>>February</option>
                             <option value="03" <?php if(@$_REQUEST['month']=='03'){ echo 'selected'; } ?>>March</option>
                             <option value="04" <?php if(@$_REQUEST['month']=='04'){ echo 'selected'; } ?>>April</option>
                             <option value="05" <?php if(@$_REQUEST['month']=='05'){ echo 'selected'; } ?>>May</option>
                             <option value="06" <?php if(@$_REQUEST['month']=='06'){ echo 'selected'; } ?>>June</option>
                             <option value="07" <?php if(@$_REQUEST['month']=='07'){ echo 'selected'; } ?>>July</option>
                             <option value="08" <?php if(@$_REQUEST['month']=='08'){ echo 'selected'; } ?>>August</option>
                             <option value="09" <?php if(@$_REQUEST['month']=='09'){ echo 'selected'; } ?>>September</option>
                             <option value="10" <?php if(@$_REQUEST['month']=='10'){ echo 'selected'; } ?>>October</option>
                             <option value="11" <?php if(@$_REQUEST['month']=='11'){ echo 'selected'; } ?>>November</option>
                             <option value="12" <?php if(@$_REQUEST['month']=='12'){ echo 'selected'; } ?>>December</option>
                             </select>
                              </div>
                        </div>


                         <div class="col-sm-3" id="selyear">
                            <div class="form-group">
                                <label class="control-label">Year</label>
                                <select name="year">
                             <option value="">Select Year</option>
                             <option value="2020" <?php if(@$_REQUEST['year']=='2020'){ echo 'selected'; } ?>>2020</option>
                          </select>
                            </div>
                        </div>






                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="location">&nbsp;</label>
                                   <button class="btn btn-success">Filter Profiles</button>
                            </div>
                        </div>
                            <div class="col-sm-2">
                            <div class="form-group">
                                <label for="location">&nbsp;</label>
                                   <a href="<?php echo e(route('agentsModule.agents')); ?>" class="btn btn-success">Reset Filter</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
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
                  <h6 class="card-title mb-0">Agents</h6>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                         <th class="pt-0">ID</th>
                        <th class="pt-0">Agent Name</th>
                          <th class="pt-0">Mobile Number</th>
                        <th class="pt-0">Local Address</th>
                        <th class="pt-0">Total Login Hours</th>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                         <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
                        <td><?php echo e($user->phone_number); ?></td>
                        <td><?php echo e($user->local_address_line_1); ?> <?php echo e($user->local_address_line_2); ?>

                            <?php echo e($user->local_address_state); ?> <?php echo e($user->local_address_city); ?>

                            <?php echo e($user->local_address_pincode); ?>

                        </td>
                        <td>


                        </td> 
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                      <div class="pagination">
                        <?php echo $users->render();?>
                    </div>
                  </div>
              </div> 
            </div>
          </div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/ReportModule/dawiseloginhr.blade.php ENDPATH**/ ?>