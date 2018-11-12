
<?php if(isset($_SESSION["user_id"])):?>

<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Finenote</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link href="res/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
  <link rel="stylesheet" href="res/css/style.css" type="text/css" media="all" />
  <link href="res/css/font-awesome.css" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Montserrat+Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Libre+Franklin:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <!-- //font -->
  <script src="res/js/jquery-1.11.1.min.js"></script>
  <script src="res/js/bootstrap.js"></script>
</head>
<body>
  <div class="w3-banner-edu">
    <div class="agileits_w3layouts_banner_nav">
      <nav class="navbar navbar-default">
        <div class="navbar-header navbar-left">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="index.html"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Finenote</span></a></h1>
        </div>
        <ul class="agile_forms">
          <li><a class="active" href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i> Acceder</a> </li>
        </ul>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="signin-form profile">
                  <h3 class="agileinfo_sign">Acceder</h3>
                  <div class="login-form">
                    <form action="./?action=access&o=login" method="post" autocomplete="off">
                      <input type="text" name="username" placeholder="usuario" required="">
                      <input type="password" name="password" placeholder="Contraseña" required="">
                      <div class="tp">
                        <input type="submit" value="Acceder">
                      </div>
                    </form>
                  </div>
                  <div class="login-social-grids">
                  </div>
                  <p><a href="#" data-toggle="modal" data-target="#myModal3" > ¿No tienes una cuenta?</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <nav>
            <ul class="nav navbar-nav">
              <li class="active"><a href="/finenote" class="hvr-underline-from-center">Inicio</a></li>
              <li><a href="#about"  class="scroll hvr-underline-from-center">Quienes somos</a></li>
              <li><a href="#news" class="scroll hvr-underline-from-center">Noticias</a></li>
              <li><a href="#contact" class=" scroll hvr-underline-from-center">Contactanos</a></li>
            </ul>
          </nav>

        </div>
      </nav>
      <div class="clearfix"> </div>
    </div>
  </div>
  <?php View::load("index"); ?>
  <!--light-box-files -->
  <script src="res/js/jquery.chocolat.js"></script>
  <link rel="stylesheet" href="res/css/chocolat.css" type="text/css" media="screen">
  <!--//light-box-files -->
  <script type="text/javascript">
  $(function() {
    $('.gallery a').Chocolat();
  });
  </script>
  <!-- //js -->
  <script type="text/javascript" src="res/js/numscroller-1.0.js"></script>
  <script src="res/js/particles.js"></script>
</body>
</html>