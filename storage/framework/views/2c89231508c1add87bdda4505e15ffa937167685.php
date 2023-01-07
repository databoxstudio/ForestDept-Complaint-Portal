<nav class="sidebar">



      <div class="sidebar-header">



        <a href="#" class="sidebar-brand">



        AKRITI<span></span>



        </a>



        <div class="sidebar-toggler not-active">



          <span></span>



          <span></span>



          <span></span>



        </div>



      </div>



      <div class="sidebar-body">



        <ul class="nav">



          <li class="nav-item nav-category">Main</li>



          <li class="nav-item">



            <a href="<?php echo e(URL::to('/')); ?>/home" class="nav-link">



              <i class="link-icon" data-feather="box"></i>



              <span class="link-title">Dashboard</span>



            </a>



          </li>







       







          <li class="nav-item nav-category">Aktiti Menus</li>


            <!--<li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#adminComponents" role="button" aria-expanded="false" aria-controls="adminComponents">



              <i class="link-icon" data-feather="feather"></i>



              <span class="link-title">Adminstrator Module</span>




            </a>



            <div class="" id="adminComponents">



              <ul class="nav sub-menu">











               



               <li class="nav-item">

                  <a href="<?php echo e(route('usersModule.users')); ?>" class="nav-link">Admin Users</a>

                </li>   

              </ul>



            </div>



          </li>-->











          <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#doctorsComponents" role="button" aria-expanded="true" aria-controls="doctorsComponents">



              <i class="link-icon" data-feather="feather"></i>



              <span class="link-title">Staff Module</span>




            </a>



            <div class="" id="doctorsComponents">



              <ul class="nav sub-menu">



                  <li class="nav-item">



                  <a href="<?php echo e(route('staffModule.staff')); ?>" class="nav-link">Staffs</a>



                </li>
                   <li class="nav-item">



                  <a href="<?php echo e(route('staffModule.create')); ?>" class="nav-link">Add Staffs</a>



                </li>



              </ul>



            </div>



          </li>



   <!--<li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#doctorsComponents" role="button" aria-expanded="true" aria-controls="doctorsComponents">



              <i class="link-icon" data-feather="feather"></i>



              <span class="link-title">Customer Module</span>




            </a>



            <div class="" id="doctorsComponents">



              <ul class="nav sub-menu">



                  <li class="nav-item">



                  <a href="<?php echo e(route('customersModule.customers')); ?>" class="nav-link">Customers</a>



                </li>
                   <li class="nav-item">



                  <a href="<?php echo e(route('customersModule.create')); ?>" class="nav-link">Add Customer</a>



                </li>



              </ul>



            </div>



          </li>
-->




          <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">



              <i class="link-icon" data-feather="anchor"></i>



              <span class="link-title">Measurements  Module</span>


            </a>



             <div class="collapse1" id="advancedUI">



              <ul class="nav sub-menu">



              <li class="nav-item">



                  <a href="<?php echo e(route('measurementsModule.measurements')); ?>" class="nav-link">Measurements</a>



                </li>
    <li class="nav-item">



                  <a href="<?php echo e(route('measurementsModule.create')); ?>" class="nav-link">Add Measurements</a>



                </li>


              </ul>



            </div> 



          </li>

        </ul>



      </div>



    </nav><?php /**PATH C:\xampp\htdocs\akriti\resources\views/layouts/partials/_sidebar.blade.php ENDPATH**/ ?>