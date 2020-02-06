<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RSJ INVENTORY</title>

    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css') ?>" >
    <link href="<?= base_url('asset/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('asset/css/nprogress.css') ?>" rel="stylesheet">
    <link href="<?= base_url('asset/css/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('asset/css/custom.min.css') ?>" rel="stylesheet">


  </head>

  <body class="login">
    <div>
      
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <img src="<?=base_url('asset/rsj.jpg') ?>"height="100 px" >
            <form role="form" action="<?= base_url('C_login/dologin'); ?>" method="post">
              <h1>Login Form</h1>

              <div id="notifications">
              <?php 
              if (!empty($notif)) {
                echo '<div class="alert alert-danger">';
                echo $notif;
                echo '</div>';
              }
              ?>  
            </div>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Login</button>
               
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> RUMAH SAKIT JIWA TAMPAN</h1>
                  <p>©2018 uin suska riau</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      
      </div>
    </div>
  </body>
</html>
