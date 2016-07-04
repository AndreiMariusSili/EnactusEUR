<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/assets/css/animate.css" rel="stylesheet">
    <!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
    <link href="/assets/css/skins/enactus_colors.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/css/admin.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="form login_form">
          <section class="login_content">
              <h1>Login Form</h1>
              <form action="/Admin/login" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username"/>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="form-group" style="color: #FFFFFF;">
                  <button type="submit" class="btn btn-lg btn-block" style="background-color: #FFC222;">Log in</button>
                </div>
              </form>
              <div class="clearfix">

              <div class="separator"></div>
              <div class="clearfix"></div>

              <div class="text-danger">
                <?php echo $this->session->flashdata('errors');?>
              </div>

              <div>
                <img class="img-responsive" src="/assets/images/Logo_origami.png" alt="Logo_Enactus_Origami">
              </div>

              </div>
          </section>
        </div>
                <div class="clearfix"></div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>