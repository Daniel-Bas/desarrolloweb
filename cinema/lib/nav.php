<!-- header -->
<div class="header">
	<div class="container">
		<div class="w3layouts_logo">
			<a href="index.html">
				<h1>One<span>Movies</span></h1>
			</a>
		</div>
		<div class="w3_search">
			<form action="#" method="post">
				<input type="text" name="Search" placeholder="Search" required="">
				<input type="submit" value="Go">
			</form>
		</div>
		<div class="w3l_sign_in_register">
			<ul>
				<li><i class="fa fa-phone" aria-hidden="true"></i>
					<?php
					if (isset($_SESSION['usuario']))
						echo "Hola " . $_SESSION['usuario'];
					else
						echo "(+000) 123 345 653";

					?>
				</li>
				<li>
					<?php
					if (!isset($_SESSION['usuario']))
						echo "<a href='#' data-toggle='modal' data-target='#myModal'>Login</a>";
					else
						echo "<a href='cerrar_sesion.php'>Cerrar Sesión</a>";
					?>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				Autenticación
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<section>
				<div class="modal-body">
					<div class="w3_login_module">
						<div class="module form-module">
							<div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Click Me</div>
							</div>
							<div class="form">
								<h3>Autenticación</h3>
								<form action="./login.php" method="post">
									<input type="email" name="email" placeholder="Email" required="">
									<input type="password" name="contrasena" placeholder="Contraseña" required="">
									<input type="submit" value="Login" name="agregar">
								</form>
							</div>
							<div class="form">
								<h3>Create an account</h3>
								<form action="./agregar_usuario.php" method="post">
									<input type="email" name="email" placeholder="Email" required="">
									<input type="text" name="nombres" placeholder="Nombres" required="">
									<input type="text" name="apellidos" placeholder="Apellidos" required="">
									<input type="password" name="contrasena" placeholder="Contraseña" required="">
									<input type="submit" value="Registrar" name="agregar">
								</form>
							</div>
							<div class="cta"><a href="#">Forgot your password?</a></div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<script>
	$('.toggle').click(function() {
		// Switches the Icon
		$(this).children('i').toggleClass('fa-pencil');
		// Switches the forms  
		$('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		}, "slow");
	});
</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
<div class="movies_nav">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav>
					<ul class="nav navbar-nav">
						<li class="w3_home_act"><a href="index.php">Inicio</a></li>
						
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Genero <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<li>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<?php

											$sql = "SELECT * FROM genero"; //consulta DBMS
											$consulta = mysqli_query($conexion, $sql); //ejecuta la consulta
											while ($row = mysqli_fetch_array($consulta)) { //recorrer la tabla para mostrar los datos
											?>
												<li><a href="genres.php?id=<?= $row['idGenero'] ?>"><?= $row['nomGenero']; ?></a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="clearfix"></div>
								</li>
							</ul>
						</li>
						<li><a href="series.php">Plataforma</a></li>
						<li><a href="news.php">news</a></li>
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pais <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<li>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<?php

											$sql = "SELECT * FROM pais"; //consulta DBMS
											$consulta = mysqli_query($conexion, $sql); //ejecuta la consulta
											while ($row = mysqli_fetch_array($consulta)) { //recorrer la tabla para mostrar los datos
											?>
												<li><a href="pais.php?id=<?= $row['idPais'] ?>"><?= $row['nomPais']; ?></a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="clearfix"></div>
								</li>
							</ul>
						</li>
					
						<li><a href="list.php">A - z list</a></li>
					</ul>
				</nav>
			</div>
		</nav>
	</div>
</div>
<!-- //nav -->

<!--Agregar pelicula-->
<div class="modal video-modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				Agregar pelicula
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<section>
				<div class="modal-body">
					<div class="w3_login_module">
						<div class="module form-module">
							<div class="toggle"><i class="fa fa-times fa-pencil"></i>
							</div>
							<div class="form">

								<form action="/cinema/agregar_pelicula.php" method="post" enctype="multipart/form-data">

									<h4>Ingrese la URL de la portada</h4>
									<input type="file" name="portada" value="Ingrese la URL de la portada" placeholder="Ingrese el URL de la portada " autofocus required><br>
									<h4>Ingrese la URL deL banner</h4>
									<input type="file" name="banner" placeholder="Ingrese el URL del banner" autofocus required><br>

									<input type="text" name="titulo" placeholder="Ingrese el título" autofocus required>

									<input type="number" name="año" placeholder="Ingrese el año de la película" autofocus required>

									<textarea rows="5" cols="45" name="sinopsis" placeholder="Ingrese la sinopsis de la película"></textarea>



									<select name="idGenero" required>
										<option value="">Seleccione el Genero</option>
										<?php
										$sql = "SELECT * FROM genero";
										$consulta = mysqli_query($conexion, $sql);
										while ($row = mysqli_fetch_array($consulta)) {
										?>
											<option value="<?= $row['idGenero']; ?>"><?= $row['nomGenero']; ?></option>
										<?php } ?>
									</select>
									<br><br>

									<select name="idPais" required>
										<option value="">Seleccione el pais</option>
										<?php
										$sql = "SELECT * FROM pais";
										$consulta = mysqli_query($conexion, $sql);
										while ($row = mysqli_fetch_array($consulta)) {
										?>
											<option value="<?= $row['idPais']; ?>"><?= $row['nomPais']; ?></option>
										<?php } ?>
									</select>
									<br><br>

									<select name="idPlataforma" required>
										<option value="">Seleccione la plataforma</option>
										<?php
										$sql = "SELECT * FROM plataforma";
										$consulta = mysqli_query($conexion, $sql);
										while ($row = mysqli_fetch_array($consulta)) {
										?>
											<option value="<?= $row['idPlataforma']; ?>"><?= $row['plataforma']; ?></option>
										<?php } ?>
									</select>
									<br><br>
									<input type="submit" name="agregar" class="btn btn-warning" value="Agregar">
								</form>
							</div>


						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<!--Agregar pelicula-->
<?php
					if (isset($_SESSION['usuario'])){
						echo '<nav class="social"><ul>';
						echo '<li class="w3_twitter"><a href="#" data-toggle="modal" data-target="#agregar">Agregar <i class="fa fa-plus-circle"></i></i></a></li>';
						echo '<li class="w3_g_plus"><a href="/cinema/list.php">eliminar <i class="fa fa-ban"></i></i></a></li>';
						echo '</ul></nav>';
					}
					?>

	
