<?php $__env->startSection('content'); ?>

<div class="page-content">
        <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
        <script type="text/javascript">
           $(document).ready(function () {
        $('input[type=radio][name=dateoption]').change(function() {
            if (this.value == 'monthyear') {
                    $('#selmonth').show();
                $('#selyear').show();

                $('#fromdate').hide();
                $('#todate').hide();
            }
            else if (this.value == 'daterange') {
                $('#selmonth').hide();
                $('#selyear').hide();

                $('#fromdate').show();
                $('#todate').show();
            }
        });


        <?php 

        if(@$_REQUEST['dateoption']=='daterange'){ ?>


                $('#selmonth').hide();
                $('#selyear').hide();

                $('#fromdate').show();
                $('#todate').show();

       <?php } ?>

        });



        </script>


                          <div class="col-sm-3">
                            <div class="form-group">
                               <label for="from">Delivery Agent</label>
                               <select name="agent" class="js-example-basic-single w-100">
                               <option value="">Select Delivery Agent</option>


                               <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($agent->id); ?>" <?php if(@$agent->id==@$_REQUEST['agent']) { echo "selected=selected"; } ?>><?php echo e($agent->first_name); ?> <?php echo e($agent->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                            </div>
                        </div>



                            <div class="col-sm-3" id="seloption">
                            <div class="form-group">
                                <label class="control-label">Select Date Option</label>
                                
                                <input type="radio" name="dateoption" value="monthyear" <?php if(@$_REQUEST['dateoption']=='monthyear'){ ?> checked <?php } ?>> Month/Year
                               
                                <input type="radio" name="dateoption" value="daterange" <?php if(@$_REQUEST['dateoption']=='daterange'){ ?> checked <?php } ?>> Date Range
                               
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





                      
                         <div class="col-sm-3" id="fromdate" style="display: none;">
                            <div class="form-group">
                                <label for="location">From</label>
                                     <input type="date" value="<?php echo @$_REQUEST['from_date'];?>" name="from_date" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false">
                            </div>
                        </div>

                          <div class="col-sm-3" id="todate" style="display: none;">
                            <div class="form-group">
                                <label for="location">To</label>
                                     <input type="date" value="<?php echo @$_REQUEST['to_date'];?>" name="to_date" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false">
                            </div>
                        </div>
                    
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="location">&nbsp;</label>
                                   <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                            <div class="col-sm-1">
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




                <?php if(!empty($dadetail)): ?>

        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
              <div class="card-body">
                 <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0"><u>Delivery Agent Detail</u></h6>
                </div>

                
                 <div class="row">
                      <div class="col-sm-3">
                            <div class="form-group">
                               <label for="from">Delivery Agent</label>
                              
                              <?php echo e(@$dadetail->first_name); ?> <?php echo e(@$dadetail->last_name); ?> (<?php echo e(@$dadetail->id); ?>)
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="form-group">
                               <label for="from">DOB</label>
                              
                              <?php echo date('d-m-Y',@strtotime(str_replace('-','/',$dadetail->dob))) ;?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <label for="from">Local Address</label>
                              
                               <?php echo e(@$dadetail->local_address_line_1); ?> <?php echo e(@$dadetail->local_address_line_2); ?> <?php echo e(@$dadetail->localCity->name); ?> <br/>
                               <?php echo e(@$dadetail->localState->name); ?> <?php echo e(@$dadetail->local_address_pincode); ?>

                            </div>
                        </div>
          </div>
              </div>
            </div>
        </div>
         <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
          </div>
        </div>
        <?php endif; ?>




 <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
              <div class="card-body">
              <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message')); ?>

                </div>
                <?php endif; ?>
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0"><u>Consolidated DA Report</u></h6>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                            <th class="pt-0">Sup. Name/Ware.</th>
                        <th class="pt-0">Date</th>
                        <th class="pt-0">Login/Logout Time</th>
                        <th class="pt-0">Coll. Package</th>
                        <th class="pt-0">Del. Package</th>
                        
                        <th class="pt-0">Pac. Returned</th>
                        <th class="pt-0">Del. Type</th>
                        <th class="pt-0">C-Ret. Package</th>
                        <th class="pt-0">C-Ret. Collected</th>
                    
                      </tr>
                    </thead>
          <tbody>
                      <?php 
                      $totalcollectpac = 0; 
                      $totaldelpac = 0;
                      $totalpacreturn =0;
                      $totalcretuned = 0;
                      $totalcreturendcollected = 0;

                      foreach($consolidatedreports as $consolidatedreport) {

                      $totalcollectpac = $totalcollectpac + $consolidatedreport->collected_package;
                      $totaldelpac = $totaldelpac + $consolidatedreport->delivered_package;
                      $totalpacreturn += $consolidatedreport->collected_package - $consolidatedreport->delivered_package;

                      $totalcretuned = $totalcretuned + $consolidatedreport->c_returned_package;
                      $totalcreturendcollected = $totalcreturendcollected + $consolidatedreport->c_returned_package_collected;



                      ?>
                      <tr>
                          <td><?php echo $consolidatedreport->supervisorDetail->first_name.' '.$consolidatedreport->supervisorDetail->last_name.' ('.$consolidatedreport->warehouseDetail->name; ?>)</td>

                          <td><?php echo $consolidatedreport->login_date;?> </td>
                          <td><?php echo $consolidatedreport->login_time.'/'.$consolidatedreport->logout_time;?></td>
                          <td><?php echo $consolidatedreport->collected_package;?></td>
                          <td><?php echo $consolidatedreport->delivered_package;?></td>

                          <td><?php echo $consolidatedreport->collected_package - $consolidatedreport->delivered_package;?></td>
                          <td><?php echo $consolidatedreport->deliveryType->name;?> (₹ <?php echo $consolidatedreport->deliveryType->delivery_rate;?>)</td>

                          <td><?php echo $consolidatedreport->c_returned_package;?></td>
                          <td><?php echo $consolidatedreport->c_returned_package_collected;?></td>
                      </tr>
                     <?php } ?>
                       <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Total</td>
                            <td><strong><?php echo $totalcollectpac;?></strong></td>
                            <td><strong><?php echo $totaldelpac;?></strong></td>
                            <td><strong><?php echo $totalpacreturn;?></strong></td>
                            <td></td>
                            <td><strong><?php echo $totalcretuned;?></strong></td>
                            <td><strong><?php echo $totalcreturendcollected;?></strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="pagination">
                        <?php // echo $weeklyreport->render();?>
                    </div>
                </div>
              </div> 
            </div>
          </div>



</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/objectivo/domains/objectivo.in/public_html/resources/views/ReportModule/cosolreportofda.blade.php ENDPATH**/ ?>