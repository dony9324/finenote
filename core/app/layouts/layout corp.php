<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->

<!DOCTYPE html>
<html lang="es">
<head>
<title>Corposum jw</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Corposum, universidad, corporacion universitaria, pltaforma, educacion, estudia en Colombia, Academico, institucion, john wesleyi, Religiosas" />
<link href="res/img/favicon.png" rel='icon' type='image/x-icon'/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="res/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="res/css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="res/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //font -->
<script src="res/js/jquery-2.2.3.min.js"></script> 
<script src="res/js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	<!-- banner -->
	<div class="banner jarallax">

        <div class="w3-header-bottom">
			<div class="w3layouts-logo">
			 <h1>
				<a href="?view=index">Corposum jw</a>
			 </h1>
			</div>
			<div class="top-nav">
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="first-list"><a id="home" href="?view=home"><i id="hom" class="glyphicon glyphicon-home"></i>inicio</a></li>
                                <?php if(!(isset($_SESSION["user_id"]))):?>
 								<li><a id="hom" href="?view=about">Acerca de</a></li>
                                <li><a href="?view=gallery">Galería</a></li>
								<li><a href="?view=contact">Contacto</a></li>
                                <?php endif; ?>
                                <li class="dropdown">
									<a href="codes.html" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">Páginas<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="?view=login">Login</a></li>
                                        <?php if((isset($_SESSION["user_id"]))):?>
                                        <li class="divider"></li>
 										<li><a id="hom" href="?view=about">Acerca de</a></li>
                                		<li><a href="?view=gallery">Galería</a></li>
										<li><a href="?view=contact">Contacto</a></li>
                                <?php endif; ?>
										<li><a href="#">Otro</a></li>
									</ul>
								</li>
                                
                                <?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
  <?php else:?>
<?php endif; ?>
                                
                                
                                
                        		<?php if(isset($_SESSION["user_id"])):?>
        						<li class="dropdown">
         						 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                 <?php echo $user; ?>
                                	<i class="glyphicon glyphicon-user"></i> <span class="caret"></span>
                                 </a>
         						<ul class="dropdown-menu">
            						<li><a href="./?view=home">Mi inicio</a></li>
          							<li><a href="./?view=users&o=all">Usuarios</a></li>
           							<li class="divider"></li>
           							<li><a href="./?action=access&o=logout">Salir</a></li>
          						</ul>
        						</li>
        						<?php endif; ?>
							</ul>	
							<div class="clearfix"> </div>
						</div>	
					</nav>		
			</div>
			<div class="agileinfo-social-grids">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-rss"></i></a></li>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="header">
			<div class="header-left">
				<div class="agileinfo-phone">
					<p><i class="fa fa-volume-control-phone" aria-hidden="true"></i> +1 234 567 8901</p>
				</div>
				<div class="agileinfo-phone agileinfo-map">
					<p><i class="fa fa-map-marker" aria-hidden="true"></i> 123 T.Globel Place,London</p>
				</div>
				<div class="search-grid">
					<form action="#" method="post">
						<input type="text" name="subscribe" placeholder="Subscribe" class="big-dog" name="Subscribe" required="">
						<button class="btn1"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
    
    <?php 
  View::load("index");
?>
    
	<!-- //banner -->
	<!-- modal -->
	
	<!-- //modal -->
	<!-- services -->
	
	<!-- //services -->
<!-- Stats -->
	
	<!-- //Stats --> 
<!-- welcome -->
	
	<!-- //welcome -->
	<!-- newsletter -->

	<!-- //newsletter -->
	<!-- news -->
	
	<!-- //news -->

	<!-- footer -->
		
	<!-- //footer -->
	<script src="res/js/responsiveslides.min.js"></script>
	<script src="res/js/jarallax.js"></script>
	<script src="res/js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>

	<script type="text/javascript" src="res/js/move-top.js"></script>
	<script type="text/javascript" src="res/js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
</body>	
</html>