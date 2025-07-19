<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Power Distribution</title>
  <link rel="shortcut icon" href="images/logo.png"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="webcraft/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="webcraft/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="webcraft/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="webcraft/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="style/css/AdminLTE.min.css">
  <link rel="stylesheet" href="style/css/skins/_all-skins.min.css">
  
</head>
<body style="background-image:url(assetsc/images/breadcrumbs/1.gif); background-size:cover;">
<br><br>
<section class="content">
    <div class="row">           
        <section>
            <div class="login-box">
    			<h1 class="text-center" style="color:white;">Sign Up</h1>
                <div class="login-box-body" style="background-color:transparent">
                 <form class="custom-form ticket-form mb-5 mb-lg-0" action="sign_up_save.php" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
                            <div class="ticket-form-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <input type="text" name="name" class="form-control" placeholder="Full name" required pattern="[a-zA-Z]*">
                                    </div>
										
                                     <div class="col-lg-12 col-md-12 col-12" style="margin-top:5px;">
                                        <input type="email" name="email" class="form-control" placeholder="Email address" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12" style="margin-top:5px;">
                                    <input type="text" class="form-control" name="cntno" placeholder="Ph 085-456-7890" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" >

                                    </div>

                                     <div class="col-lg-12 col-md-12 col-12" style="margin-top:5px;">
                                        <input type="file" name="photo" class="form-control" placeholder="Photo" required>
                                    </div>
                                </div>

                               
                                <div class="row">
                                   <div class="col-lg-12 col-md-12 col-12" style="margin-top:5px;">
                                            <select name="sex" class="form-control" required>
                                                <option value="">Select Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Transgender</option>
                                            </select>
                                    </div>

                                   <div class="col-lg-12 col-md-12 col-12" style="margin-top:5px;">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12" style="margin-top:5px;">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12" style="margin-top:5px;">
                                        <input type="text" name="location" class="form-control" placeholder="Location" required>
                                    </div>
                                </div>

                                <textarea name="about" rows="3" class="form-control" placeholder="Tell About"  required style="margin-top:5px;"></textarea>

                                <div class="row">                                                          
                             <div class="col-xs-4 pull-right">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                            </div>  
                            <div class="col-xs-4 pull-right">    
                            	<br>              
                                <a href="index.php" class="btn btn-block btn-danger btn-flat">Back</a>
                           </div>                  
                        </div> 
                            </div>
                        </form>
                </div>
			</div> 	
        </section> 
    </div>
</section>
</body>
</html>

