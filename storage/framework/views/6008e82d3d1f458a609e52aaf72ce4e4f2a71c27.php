<?php $__env->startSection('content'); ?>
<div class="page-content">
        <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Select Date</label>
                             <input type="date" value="<?php echo e(old('login_date')); ?>" name="login_date" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy/mm/dd" im-insert="false">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="location">&nbsp;</label>
                                   <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                            <div class="col-sm-2">
                            <div class="form-group">
                                <label for="location">&nbsp;</label>
                                   <a href="<?php echo e(route('reportsModule.dailydeliveryreport')); ?>" class="btn btn-success">Reset</a>
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
                  <h6 class="card-title mb-0"><u>Daily Delivery Report</u></h6>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">Agent Name</th>
                        <th class="pt-0">Fathers Name</th>
                        <th class="pt-0">Date</th>
                        <th class="pt-0">Action</th>
                    </thead>
                    <tbody>

                      <?php $__currentLoopData = $dailyreports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dailyreport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($dailyreport->userDetail->first_name); ?> <?php echo e($dailyreport->userDetail->last_name); ?> (<?php echo e($dailyreport->userDetail->id); ?>)</td>
                        <td><?php echo e($dailyreport->userDetail->fathers_name); ?></td>
                        <td><?php echo e($dailyreport->login_date); ?></td>
                        </td>
                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($dailyreport->user_id); ?>">View Delivery Detail</button>
 <div class="modal fade" id="exampleModal<?php echo e($dailyreport->user_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
         <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0"> </th>
                        <th class="pt-0">Login Date/Time</th>
                        <th class="pt-0">Logout Date/Time</th>
                         <th class="pt-0">LoggedIn Time</th>
                        <th class="pt-0">Collected Package</th>
                        <th class="pt-0">Delivered Package</th>
                        <th class="pt-0">C-Returned Package</th>
                        <th class="pt-0">C-Returned Collected</th>
                        <th class="pt-0">Warehouse</th>
                        <th class="pt-0">Supervisor Name</th>
                      </tr>
                    </thead>
                    <tbody>
        <?php 
         $sumofcollpackage = 0;
         $sumofdelpackage = 0;
         $sumofcreturn = 0;
         $sumofcreturncoll = 0;
         $i=1;
        foreach($dailyreport['dailyreportdetail'] as $dailyrepo){ 
                    $sumofcollpackage += $dailyrepo->collected_package;
                    $sumofdelpackage += $dailyrepo->delivered_package;
                    $sumofcreturn += $dailyrepo->c_returned_package;
                    $sumofcreturncoll += $dailyrepo->c_returned_package_collected;
         ?>

          <tr>
            <td>Trip <?php echo e($i); ?></td>
            <td><?php echo e($dailyrepo->login_date); ?> <?php echo e($dailyrepo->login_time); ?></td>
            <td><?php echo e($dailyrepo->logout_date); ?> <?php echo e($dailyrepo->logout_time); ?></td>
            <td><?php 
            $timediff = strtotime($dailyrepo->logout_date.' '.$dailyrepo->logout_time) - strtotime($dailyrepo->login_date.' '.$dailyrepo->login_time);
            echo date('H:i',$timediff);
            ?></td>
            <td><?php echo e($dailyrepo->collected_package); ?></td>
            <td><?php echo e($dailyrepo->delivered_package); ?></td>
            <td><?php echo e($dailyrepo->c_returned_package); ?></td>
            <td><?php echo e($dailyrepo->c_returned_package_collected); ?></td>
            <td><?php echo e($dailyrepo->warehouseDetail->name); ?></td>
            <td><?php echo e(@$dailyrepo->supervisorDetail->first_name); ?> <?php echo e(@$dailyrepo->supervisorDetail->last_name); ?></td>
          </tr>
        <?php $i++; } ?>
         <tr>
            <td></td>
            <td><strong>Total</strong></td>
             <td><strong></strong></td>
            <td><strong><?php echo e($sumofcollpackage); ?></strong></td>
            <td><strong><?php echo e($sumofdelpackage); ?></strong></td>
            <td><strong><?php echo e($sumofcreturn); ?></strong></td>
            <td><strong><?php echo e($sumofcreturncoll); ?></strong></td>
            <td></td>
            <td></td>
          </tr>
      </tbody> </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Close</button>
      </div>
    </div>
  </div>
</div>
                        </td> 
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  <div class="pagination">
                        <?php echo $dailyreports->render();?>
                    </div>
                </div>
              </div> 
            </div>
          </div>
</div>



























<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/objectivo.in/public_html/resources/views/ReportModule/dailydeliveryreport.blade.php ENDPATH**/ ?>