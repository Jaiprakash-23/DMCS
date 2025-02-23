<!-- Sidebar -->
@extends('layouts.app')
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Loader -->
        {{-- <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-ellips">
                  <span class="loader-ellips__dot"></span>
                  <span class="loader-ellips__dot"></span>
                  <span class="loader-ellips__dot"></span>
                  <span class="loader-ellips__dot"></span>
                </div>
            </div>
        </div> --}}
        <!-- /Loader -->

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" width="40" height="40" alt="">
                </a>
            </div>
            <!-- /Logo -->

            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <!-- Header Title -->
            <div class="page-title-box">
                <h3> Duty Management & Control System </h3>
            </div>
            <!-- /Header Title -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">



                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="" src="assets/img/profiles/avatar-06.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="" src="assets/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="" src="assets/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- Message Notifications -->
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Messages</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Richard Miles </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">John Doe</span>
                                                <span class="message-time">6 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Tarah Shropshire </span>
                                                <span class="message-time">5 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Mike Litorus</span>
                                                <span class="message-time">3 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-08.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Catherine Manseau </span>
                                                <span class="message-time">27 Feb</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="">View all Messages</a>
                        </div>
                    </div>
                </li>
                <!-- /Message Notifications -->

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
                        <span class="status online"></span></span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <!--<a class="dropdown-item" href="my_profile.php"> My Profile </a>
                        <a class="dropdown-item" href="my-attendance.php"> My Attendance </a>
                        <a class="dropdown-item" href="settings.html">Settings</a> -->
                        <a class="dropdown-item" href="login.php"> Logout </a>
                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="my_profile.php"> My Profile </a>
                        <!--<a class="dropdown-item" href="settings.html">Settings</a> -->
                        <a class="dropdown-item" href="login.php"> Logout </a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{route('homepage')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                        </li>


                        <li class="submenu">
                            <a href="#"><i class="la la-newspaper-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                        <li>
                            <a href="{{route('all_employee')}}"><i class="la la-users"></i> <span> All Employee </span></a>
                        </li>
                        <li>
                            <a href="{{route('all_employee_attendance')}}"><i class="la la-file-powerpoint-o"> </i> &nbsp; <span> All Employee Attendance </span></a></li>

                        <li><a href="{{route('all_employee_salary_report')}}"> <i class="la la-money"></i> &nbsp; <span> Employee Salary Report </span></a></li>
                        <li>
                            <a href="{{route('all_employee_sitename')}}"><i class="la la-child"></i>&nbsp; <span> Site Name & salary  </span></a>
                            </li>

                        </ul>
                        </li>

                          <li class="submenu">
                            <a href="#"><i class="la la-money"></i> <span> My Informations </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                        <li>
                            <a href="{{route('my_profile')}}"><i class="la la-child"></i>&nbsp; <span> My Profile  </span></a>
                            </li>
                        <li>
                            <a href="{{route('my_attendance')}}"><i class="la  la-calendar"></i> &nbsp;<span> My Attendance </span></a>
                        </li>
                        <li>
                            <a href="{{route('my_salary')}}"><i class="la la-inr"></i> &nbsp; <span> My Salary </span></a>
                        </li>
                        </ul>
                        </li>

                        <li class="submenu">
                            <a href="#" class="noti-dot"><i class="la la-users"></i> <span> Attendance</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li>
                                <a href="{{route('all_attendance')}}"><i class="la  la-calendar"></i> &nbsp; <span> All Employees </span></a>
                                </li>
                                <li>
                                <a href="{{route('gaurd_attendance')}}"><i class="la la-calendar"></i> &nbsp; <span> Guard </span></a>
                                </li>
                                <li>
                                <a href="{{route('qrt_attendance')}}"><i class="la la-calendar"></i> &nbsp; <span> QRT </span></a>
                                </li>
                                <li>
                                <a href="{{route('officer_attendance')}}"><i class="la la-calendar"></i> &nbsp; <span> Officer </span></a>
                                </li>
                                <li>
                                <a href="{{route('management_attendance')}}"><i class="la la-calendar"></i> &nbsp; <span> Management </span></a>
                                </li>

                                <li><a href="{{route('transfer')}}"><i class="la la-calendar"></i> &nbsp; <span> Transfer </span> </a></li>

                            </ul>
                        </li>

                        <!--<li class="submenu">
                            <a href="#" class="noti-dot"><i class="la la-users"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="add-employ.php"> Add Employees</a></li>
                                <li><a href="allemploy.php">All Employees</a></li>

                            </ul>
                        </li>-->

                         <li class="submenu">
                            <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('generate_salary')}}"> Genrate Salary </a></li>
                                <li><a href="{{route('emp_salary_report')}}" class=""> Employee Salary Report </a></li>
                                <li><a href="{{route('emp_pf_detail')}}"> Employee PF Details </a></li>

                            </ul>
                        </li>

                         <li class="submenu">
                            <a href="#"><i class="la la-gears"></i> <span> Settings  </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('add_location')}}"><i class="la la-map-marker"></i> &nbsp; <span> Add location (Site)</span></a></li>
                                <li><a href="{{route('roles_group')}}"> <i class="la la-group"></i>  &nbsp; <span> Roles & Group  </span></a></li>
                                <li><a href="{{route('salary_settings')}}"><i class="la la-money"></i> &nbsp; <span> Salary Settings </span></a></li>
                                <li><a href="{{route('add_employee')}}"><i class="la la-map-marker"></i> &nbsp; <span> Add Employees </span></a></li>

                                </ul>
                        </li>


                   <!-- <li>
                            <a href="projects.html"><i class="la la-rocket"></i> <span>Projects</span></a>
                        </li>
                        <li>
                            <a href="tasks.html"><i class="la la-tasks"></i> <span>Tasks</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-phone"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="outgoing-call.html">Outgoing Call</a></li>
                                <li><a href="incoming-call.html">Incoming Call</a></li>
                            </ul>
                        </li>-->

                        <!--<li>
                            <a href="leads.html"><i class="la la-user-secret"></i> <span>Leads</span></a>
                        </li>-->
                        <!--<li class="submenu">
                            <a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="#">Estimates</a></li>
                                <li><a href="#">Invoices</a></li>
                                <li><a href="#">Payments</a></li>
                                <li><a href="#">Expenses</a></li>
                                <li><a href="#">Provident Fund</a></li>
                                <li><a href="#">Taxes</a></li>
                            </ul>
                        </li>-->


                        <!--<li>
                            <a href="#"><i class="la la-users"></i> <span>Clients</span></a>
                        </li>-->

                        <li>
                            <a href="{{route('all_client')}}"><i class="la la-user"></i> <span> All Client (Site) </span></a>
                        </li>

                        <li>
                            <a href="{{route('contact')}}"><i class="la la-book"></i> <span>Contacts</span></a>
                        </li>


                         <!-- <li class="submenu">
                            <a href="#"><i class="la la-building"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="jobs.html"> Manage Jobs </a></li>
                                <li><a href="job-applicants.html"> Applied Candidates </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="tickets.html"><i class="la la-ticket"></i> <span>Tickets</span></a>
                        </li>
                        <li>
                            <a href="events.html"><i class="la la-calendar"></i> <span>Events</span></a>
                        </li>
                        <li>
                            <a href="inbox.html"><i class="la la-at"></i> <span>Email</span></a>
                        </li>
                        <li>
                            <a href="chat.html"><i class="la la-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li>
                            <a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
                        </li>
                        <li>
                            <a href="knowledgebase.html"><i class="la la-question"></i> <span>Knowledgebase</span></a>
                        </li>
                        <li>
                            <a href="policies.html"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
                        </li>
                        <li>
                            <a href="activities.html"><i class="la la-bell"></i> <span>Activities</span></a>
                        </li>
                        <li>
                            <a href="users.html"><i class="la la-user-plus"></i> <span>Users</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="expense-reports.html"> Expense Report </a></li>
                                <li><a href="invoice-reports.html"> Invoice Report </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="settings.html"><i class="la la-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.html"> Login </a></li>
                                <li><a href="register.html"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="otp.html"> OTP </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                                <li><a href="profile.html"> Employee Profile </a></li>
                                <li><a href="client-profile.html"> Client Profile </a></li>
                                <li><a href="search.html"> Search </a></li>
                                <li><a href="faq.html"> FAQ </a></li>
                                <li><a href="terms.html"> Terms </a></li>
                                <li><a href="privacy-policy.html"> Privacy Policy </a></li>
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                                <li><a href="blank-page.html"> Blank Page </a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="components.html"><i class="la la-puzzle-piece"></i> <span>Components</span></a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                            <ul style="display: none;">
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> <span>Level 1</span></a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
