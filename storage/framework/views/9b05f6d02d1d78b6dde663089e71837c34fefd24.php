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
                                <h6 class="card-title">Agent to Supervisor Mapping</h6>
                                    <form class="forms-sample" action="<?php echo e(route('usersModule.assignagentaction')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Supervisor</label>

                                                    <select name="supervisor_id">
                                                        <?php $__currentLoopData = $supervisors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supervisor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($supervisor->id); ?>"><?php echo e($supervisor->first_name); ?> <?php echo e($supervisor->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                                    </select>


                                                  
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Agent</label>
                                                   <select name="agent_id">
                                                          <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($agent->id); ?>"><?php echo e($agent->first_name); ?> <?php echo e($agent->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                                                    </select>
                                                </div>
                                            </div><!-- Col -->
                                         
                                      
                                       

                                    
                                     <button type="submit" class="btn btn-primary mr-2">Assign Agent to Supervisor</button>
                                       </form>
                            </div>
                        </div>
                    </div>
                </div>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/objectivo.in/public_html/resources/views/userModule/assignagent.blade.php ENDPATH**/ ?>