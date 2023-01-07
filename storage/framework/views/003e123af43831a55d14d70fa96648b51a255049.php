<nav class="sidebar">



      <div class="sidebar-header">



        <a href="#" class="sidebar-brand">



        OBJECTIVO<span></span>



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







       







          <li class="nav-item nav-category">Objectivo Menus</li>


            <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#adminComponents" role="button" aria-expanded="false" aria-controls="adminComponents">



              <i class="link-icon" data-feather="feather"></i>



              <span class="link-title">Adminstrator Module</span>




            </a>



            <div class="" id="adminComponents">



              <ul class="nav sub-menu">











               



               <li class="nav-item">



                  <a href="<?php echo e(route('usersModule.users')); ?>" class="nav-link">Admin Users</a>



                </li>   



                <li class="nav-item">



                  <a href="<?php echo e(route('usersModule.assignagent')); ?>" class="nav-link">Assign Agents To Supervisor</a>



                </li>                



                          



             



              </ul>



            </div>



          </li>











          <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#doctorsComponents" role="button" aria-expanded="true" aria-controls="doctorsComponents">



              <i class="link-icon" data-feather="feather"></i>



              <span class="link-title">Agent Module</span>




            </a>



            <div class="" id="doctorsComponents">



              <ul class="nav sub-menu">



                  <li class="nav-item">



                  <a href="<?php echo e(route('agentsModule.agents')); ?>" class="nav-link">Agents</a>



                </li>



              </ul>



            </div>



          </li>



          <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">



              <i class="link-icon" data-feather="anchor"></i>



              <span class="link-title">Supervisor  Module</span>



              <!--<i class="link-arrow" data-feather="chevron-down"></i>-->



            </a>



             <div class="collapse1" id="advancedUI">



              <ul class="nav sub-menu">



              <li class="nav-item">



                  <a href="<?php echo e(route('supervisorsModule.supervisors')); ?>" class="nav-link">Supervisors</a>



                </li>



              </ul>



            </div> 



          </li>







           <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#reportModule" role="button" aria-expanded="false" aria-controls="advancedUI">



              <i class="link-icon" data-feather="anchor"></i>



              <span class="link-title">Reports  Module</span>



              <!--<i class="link-arrow" data-feather="chevron-down"></i>-->



            </a>



             <div class="collapse1" id="reportModule">



              <ul class="nav sub-menu">



              <li class="nav-item">



                  <a href="<?php echo e(route('reportsModule.dailydeliveryreport')); ?>" class="nav-link">Daily delivery report of DA</a>



                </li>



                <li class="nav-item">



                  <a href="<?php echo e(route('reportsModule.weeklydeliveryreport')); ?>" class="nav-link">Weekly delivery report of DA</a>



                </li>



                <li class="nav-item">



                  <a href="<?php echo e(route('reportsModule.cosolreportofda')); ?>" class="nav-link">Consolidated report of DA</a>



                </li>



                <li class="nav-item">



                  <a href="<?php echo e(route('agentsModule.blacklistedDa')); ?>" class="nav-link">Blacklisted DA</a>



                </li>







                <li class="nav-item">



                  <a href="<?php echo e(route('reportsModule.dawiseloginhr')); ?>" class="nav-link">DA wise login hours</a>



                </li>



              </ul>



            </div> 



          </li>



            

           <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#coreComponents" role="button" aria-expanded="false" aria-controls="coreComponents">



              <i class="link-icon" data-feather="feather"></i>



              <span class="link-title">Core Module</span>



             


            </a>



            <div class="" id="coreComponents">



              <ul class="nav sub-menu">








                <li class="nav-item">



                  <a href="<?php echo e(route('coreModule.administrativeSettings.warehouses')); ?>" class="nav-link">Warehouse</a>



                </li>







                <li class="nav-item">



                  <a href="<?php echo e(route('coreModule.administrativeSettings.deliverytypes')); ?>" class="nav-link">Delivery Types</a>



                </li>







                 <li class="nav-item">



                  <a href="<?php echo e(route('coreModule.administrativeSettings.banks')); ?>" class="nav-link">Banks</a>



                </li>







               



             



              </ul>



            </div>



          </li>


         







         <!--  <li class="nav-item">



            <a class="nav-link" data-toggle="collapse" href="#ManagePagesModule" role="button" aria-expanded="false" aria-controls="advancedUI">



              <i class="link-icon" data-feather="anchor"></i>



              <span class="link-title">Pages Module</span>



              <i class="link-arrow" data-feather="chevron-down"></i>



            </a>



             <div class="collapse" id="ManagePagesModule">



              <ul class="nav sub-menu">



                



              <li class="nav-item">



                  <a href="<?php echo e(route('pagesModule.managepages')); ?>" class="nav-link">Manage Pages</a>



                </li>



                  



                



              </ul>



            </div> 



          </li> -->











        </ul>



      </div>



    </nav><?php /**PATH /home/admin/domains/objectivo.in/public_html/resources/views/layouts/partials/_sidebar.blade.php ENDPATH**/ ?>