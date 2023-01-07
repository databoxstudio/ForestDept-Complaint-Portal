<nav class="sidebar">



      <div class="sidebar-header">



        <a href="#" class="sidebar-brand">



        COMPLAINT PORTAL<span></span>



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
            <a href="{{URL::to('/')}}/home" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item nav-category">Menus</li>


@if(isset(Auth::user()->role) && Auth::user()->role == 'admin' )
            <!--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#adminComponents" role="button" aria-expanded="false" aria-controls="adminComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Adminstrator Module</span>
            </a>
            <div class="" id="adminComponents">
              <ul class="nav sub-menu">
               <li class="nav-item">
                  <a href="{{route('usersModule.users')}}" class="nav-link">Admin Users</a>
                </li>   
              </ul>
            </div>
          </li>-->
            @endif

          @if(isset(Auth::user()->role) && Auth::user()->role == 'admin' )

          <!--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#doctorsComponents" role="button" aria-expanded="true" aria-controls="doctorsComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Staff Module</span>
            </a>
            <div class="" id="doctorsComponents">
              <ul class="nav sub-menu">
                  <li class="nav-item">
                  <a href="{{route('staffModule.staff')}}" class="nav-link">Staffs</a>
                </li>
                   <li class="nav-item">
                  <a href="{{route('staffModule.create')}}" class="nav-link">Add Staffs</a>
                </li>
              </ul>
            </div>
          </li>-->

          @endif


           <li class="nav-item">
            <a class="nav-link" href="{{route('complaintsModule.contactnumbers')}}" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Officer's Contact Number</span>
            </a>
             
          </li>
       


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Complaints  Module</span>
            </a>
             <div class="collapse1" id="advancedUI">
              <ul class="nav sub-menu">
              <li class="nav-item">
                  <a href="{{route('complaintsModule.complaints')}}" class="nav-link">Complaints</a>
                </li>
    <li class="nav-item">
                  <a href="{{route('complaintsModule.create')}}" class="nav-link">Add Complaint</a>
                </li>
              </ul>
            </div> 
          </li>
        </ul>
      </div>
    </nav>