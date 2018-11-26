<?php
// si el usuario no esta logeado
$exist = false;
if(!isset($_SESSION["user_id"])){
	?>
	<div class="container">
		<div class="row">
			<?php if(isset($_COOKIE['password_updated'])):?>
				<div class="alert alert-success text-center">
					<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
					<p>Pruebe iniciar sesion con su nueva contraseña.</p>
				</div>
				<?php setcookie("password_updated","",time()-18600);
			endif;?>
			<div class="col-md-12">
				<div class="row">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<div class="signin-form profile">
									<h3 class="agileinfo_sign">Acceder</h3>
									<div class="login-form">
										<form method="post" action="./?action=access&amp;o=login" autocomplete="off">
											<input type="text" name="username" placeholder="usuario" required="">
											<input type="password" name="password" placeholder="Contraseña" required="">
											<div class="tp">
												<input type="submit" value="Acceder">
											</div>
										</form>
									</div>
									<div class="login-social-grids">
									</div>
									<p><a href="#" data-toggle="modal" data-target="#myModal3"> ¿No tienes una cuenta?</a></p>
								</div>
							</div>
						</div>
					</div>
					<?php if(isset($_COOKIE['error_acceder'])):?>
						<div class="alert alert-danger text-center">
							<p><i class='glyphicon glyphicon-ban-circle'></i>Usuario o Contraseña erroneos !!</p>
							<p>Pruebe iniciar nuevamentes</p>
						</div>
						<?php setcookie("error_acceder","",time()-18600);
					endif;?>
				</div>
				<?php
				//$user = UserData::getBy("id",2);
				//$user->del();
				//print_r($user);
				?>
			</div>
		</div>
	</div>
	<?php
} else {
	$user= UserData::getById($_SESSION["user_id"]);
	// si el id  del usuario no existe.
	if($user==null){
		?>
		<div class="container">
			<div class="row">
				<?php if(isset($_COOKIE['password_updated'])):?>
					<div class="alert alert-success text-center">
						<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
						<p>Pruebe iniciar sesion con su nueva contraseña.</p>
					</div>
					<?php setcookie("password_updated","",time()-18600);
				endif;?>
				<div class="col-md-12">
					<div class="row">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<div class="signin-form profile">
										<h3 class="agileinfo_sign">Acceder</h3>
										<div class="login-form">
											<form method="post" action="./?action=access&amp;o=login" autocomplete="off">
												<input type="text" name="username" placeholder="usuario" required="">
												<input type="password" name="password" placeholder="Contraseña" required="">
												<div class="tp">
													<input type="submit" value="Acceder">
												</div>
											</form>
										</div>
										<div class="login-social-grids">
										</div>
										<p><a href="#" data-toggle="modal" data-target="#myModal3"> ¿No tienes una cuenta?</a></p>
									</div>
								</div>
							</div>
						</div>

						<?php if(isset($_COOKIE['error_acceder'])):?>
							<div class="alert alert-danger text-center">
								<p><i class='glyphicon glyphicon-ban-circle'></i>Usuario o Contraseña erroneos !!</p>
								<p>Pruebe iniciar nuevamentes</p>
							</div>
							<?php setcookie("error_acceder","",time()-18600);
						endif;?>

					</div>
					<?php
					//$user = UserData::getBy("id",2);
					//$user->del();
					//print_r($user);
					?>

				</div>
			</div>
		</div>
		<?php
	}else {
		?>
		<div class="container">
			<div class="row">
				<?php if(isset($_COOKIE['password_updated'])):?>
					<div class="alert alert-success text-center">
						<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
						<p>Pruebe iniciar sesion con su nueva contraseña.</p>
					</div>
					<?php setcookie("password_updated","",time()-18600);
				endif;?>
				<div class="col-md-12">
					<div class="row">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">

									<div class="signin-form profile">
										<h3 class="agileinfo_sign">Acceder</h3>
										<div class="login-form">
											<p><a href="#" data-toggle="modal" data-target="#myModal3"> Ya existe una sesión ¿desea cerrarla?</a></p>
											<br>
											<div class="tp">
												<a class="active" href="./?action=access&amp;o=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php if(isset($_COOKIE['error_acceder'])):?>
							<div class="alert alert-danger text-center">
								<p><i class='glyphicon glyphicon-ban-circle'></i>Usuario o Contraseña erroneos !!</p>
								<p>Pruebe iniciar nuevamentes</p>
							</div>
							<?php setcookie("error_acceder","",time()-18600);
						endif;?>

					</div>
					<?php
					//$user = UserData::getBy("id",2);
					//$user->del();
					//print_r($user);
					?>

				</div>
			</div>
		</div>




		<?php
	}
}
?>
