 <?php $session_u_name=$_SESSION['u_name']; $session_u_role=$_SESSION['u_role']; $session_u_id=$_SESSION['u_id']; ?>
 <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                       <h5 style="font-size: 13px;">  <a href="dashboard.php" style="font-size: 13px;">
                          Mahiti Seva Samiti
                        </a></h5>
                        <a class="mobile-options">
                            <i class="feather icon-menu icon-toggle-left"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                        
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                          
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                           <span><?php echo $session_u_name; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                       
                                        <li>
                                            <a href="profile.php">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                         <li>
                                            <a href="logout.php">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                   
                                       
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar chat start -->
            
          <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                         <ul class="pcoded-item pcoded-left-item">
 <?php  if($_SESSION['u_role']=="Manager") { ?>  
                                <li class="">
                                    <a href="dashboard.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                                                    
                                 <li class="">
                                    <a href="campaigns-list.php">
                                        <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                                        <span class="pcoded-mtext">Campaigns</span>
                                    </a>
                                </li>
                                
 <?php } else if($_SESSION['u_role']=="Executive") { ?> 
                                            <li class="">
                                    <a href="dashboard.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                  
                                  
                                 <li class="">
                                    <a href="executive-case-list.php">
                                        <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                                        <span class="pcoded-mtext">Case List</span>
                                    </a>
                                </li>
                                 
                                     
                             <?php } else  if($_SESSION['u_role']=="Admin") { ?>  
                           
                               
                                     <li class="">
                                    <a href="dashboard.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                  
                                  
                               <li class="">
                                    <a href="campaigns-list.php">
                                        <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                                        <span class="pcoded-mtext">Campaigns List</span>
                                    </a>
                                </li>
                                
                               
                                 <li class="">
                                    <a href="events-list.php">
                                        <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                        <span class="pcoded-mtext">Events List</span>
                                    </a>
                               		</li>
                               		<li class="">
                                    <a href="blog-list.php">
                                        <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                        <span class="pcoded-mtext">Blog List</span>
                                    </a>
                               		</li>
                                  <li class="">
                                    <a href="donars-list.php">
                                        <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                        <span class="pcoded-mtext">Donars List</span>
                                    </a>
                               		</li>
                               		<li class="">
                                    <a href="contactus.php">
                                        <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                        <span class="pcoded-mtext">Contact Us List</span>
                                    </a>
                               		</li>
                               		
                               		<li class="">
                                    <a href="volunteer.php">
                                        <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                        <span class="pcoded-mtext">Volunteer List</span>
                                    </a>
                               		</li>
                  
                          <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                        <span class="pcoded-mtext">Settings</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                
                                 <li class="">
                                            <a href="blog_categories.php">
                                                <span class="pcoded-mtext">Blog Categories</span>
                                            </a>
                                        </li>
                                  <li class="">
                                            <a href="event-categories.php">
                                                <span class="pcoded-mtext">Event Categories</span>
                                            </a>
                                        </li>
                                        
                                           <li class="">
                                            <a href="organizers.php">
                                                <span class="pcoded-mtext">Organizers</span>
                                            </a>
                                        </li>
                                     <!--      <li class="">
                                            <a href="field_agencies_list.php">
                                                <span class="pcoded-mtext">Field Agency</span>
                                            </a>
                                        </li> -->
                                          <li class="">
                                            <a href="users.php">
                                                <span class="pcoded-mtext">Users</span>
                                            </a>
                                        </li>
                                    
                                    </ul>
                                </li>
                                
                                      
                             <?php } ?>             
                          </ul>
                        
                     
                      
                          
                          
                          </div>
                    </nav>