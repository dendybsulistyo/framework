<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $session_nama_aplikasi; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/fontff-awesome.min.css" rel="stylesheet">
   

    <!-- <link href="<?php echo base_url();?>assets/css/morrris.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-aawesome.min.css" rel="stylesheet">
    -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>

<div class=container>

<?php
      // warning kalau login gagal 
      $gagal = $this->session->flashdata('message');
        if(isset($gagal)) 
          {
            echo "<div class='alert alert-danger' id=alertku role=alert>
             <strong>Maaf, login gagal</strong>... ulangi lagi</div>";
            }
        ?>


        <br>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">

              <center><img width=300 src=<?php echo base_url()."assets/images/sdm.jpg";?> >
              </center><br>

                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $session_nama_aplikasi; ?></h3>
                    </div>
                    <div class="panel-body">
                          
                          <?php  
                              $attributes = array('id' => 'loginForm',
                                                  'novalidate' => 'novalidate');
                              echo form_open('authen/login', $attributes);       
                                ?>


                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>


                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                   
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember 
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                 <button type="submit" class="btn btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>



  </div> <!-- container --> 

</body>

    <!-- jQuery -->
    <script href="<?php echo BASE_URL(); ?>assets/js/jquery.js"></script>
    <script href="<?php echo BASE_URL(); ?>assets/js/bootstrap.min.js"></script>
  

</html>