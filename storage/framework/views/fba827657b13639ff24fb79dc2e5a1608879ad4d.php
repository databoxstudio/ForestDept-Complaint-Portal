<?php $__env->startSection('content'); ?>
<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">COMPLAINT PORTAL'S QUICK INFO</h4>
          </div>
        </div>
      

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Number of Call Received</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?php echo e($complaintcount); ?></h3>
                        
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
           
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Today's Call Received</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?php echo e($todaycomplaintcount); ?></h3>
                       
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->





<div class="row">
   <div class="col-12 col-xl-12 stretch-card">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>

var xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var yValues = [<?php echo $compArr[1];?>, <?php echo $compArr[2];?>,<?php echo  $compArr[3];?>, <?php echo $compArr[4];?>, <?php echo $compArr[5];?>, <?php echo $compArr[6];?>, <?php echo $compArr[7];?>, <?php echo $compArr[8];?>, <?php echo $compArr[9];?>, <?php echo $compArr[10];?>, <?php echo $compArr[11];?>,<?php echo $compArr[12];?>];

var barColors = ["red", "green","blue","orange","brown","violet","black","navy","olive","purple","maroon","lime"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Monthwise No of Complaints Lodged"
    }
  }
});
</script>

</div>
 </div> <!-- row -->




            

			</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/databoxstudio/public_html/resources/views/home.blade.php ENDPATH**/ ?>