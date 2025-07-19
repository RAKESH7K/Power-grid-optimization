
<?php
	$result = $db->prepare("select * from admin where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{		
		$smessageu=$row["name"];
		$photo=$row["photo"];	
	}
?>
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img alt=""  src="../photo/<?php echo $photo;?>" />
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name"><?php echo $smessageu;?></div>
                            <div class="user-role">Administrator</div>
                        </div>
                    </div>
                </li>                
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
                        <span class="title">Profle</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="user_profile.php" class="nav-link "> <span class="title">Profile</span>
                            </a>
                        </li>                        
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
                        <span class="title">Notification</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="notification_send.php" class="nav-link "> <span class="title">Send</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="notification_view.php" class="nav-link "> <span class="title">View</span>
                            </a>
                        </li>
                                            
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i data-feather="layers"></i>
                        <span class="title">Complaint</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="compalint_view_all.php" class="nav-link ">
                                <span class="title">View</span>
                            </a>
                        </li>                                          
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i data-feather="layers"></i>
                        <span class="title">Mail</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="mail_inbox.php" class="nav-link ">
                                <span class="title">Mail</span>
                            </a>
                        </li>                 
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link">
                        <i data-feather="lock"></i>Logout</a>
                </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>