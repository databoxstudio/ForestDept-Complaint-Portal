



<?php $__env->startSection('content'); ?>
<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">OBJECTIVO DASHBOARD</h4>
          </div>
        </div>
      

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Number of Agents</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?php echo e($agentcount); ?></h3>
                        
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Number of Supervisors</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?php echo e($supervisorcount); ?></h3>
                       
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Number of Warehouse</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?php echo e($warehousecount); ?></h3>
                       
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->


<!-- <div class="row">
          <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                  <h6 class="card-title mb-0">Total Deliveries</h6>
                 
                </div>
                <div class="row align-items-start mb-2">
                  <div class="col-md-7">
                    <p class="text-muted tx-13 mb-3 mb-md-0">The total number of Deliveries.</p>
                  </div>
                  <div class="col-md-5 d-flex justify-content-md-end">
                    <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-outline-primary">Today</button>
                      <button type="button" class="btn btn-outline-primary d-none d-md-block">Week</button>
                      <button type="button" class="btn btn-primary">Month</button>
                      <button type="button" class="btn btn-outline-primary">Year</button>
                    </div>
                  </div>
                </div>
                <div class="flot-wrapper">
                  <div id="flotChart1" class="flot-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>  -->
             



        <div class="row">
          <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                </div>
                <div class="monthly-sales-chart-wrapper">
                  <canvas id="monthly-sales-chart"></canvas>
                </div>
              </div> 
            </div>
          </div>
        </div> <!-- row -->

        

			</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/home.blade.php ENDPATH**/ ?>