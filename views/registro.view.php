<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Regístrese en HomeSwitchHome</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="js/registro.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
<title>Regístrate</title>

</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logos/HSH-Logo.svg" alt="homeswitchhome registro">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Registro</h4>
							<form method="POST" class="my-login-validation" novalidate="" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="login">
								<div class="form-group">
									<label for="nombre">Nombre</label>
									<input id="nombre" type="text" class="form-control" name="nombre" required autofocus>
									<div class="invalid-feedback">
										¿Cual es tu nombre?
									</div>
								</div>

								<div class="form-group">
									<label for="apellido">Apellido</label>
									<input id="apellido" type="text" class="form-control" name="apellido" required autofocus>
									<div class="invalid-feedback">
										¿Cual es tu apellido?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Tu e-mail no es valido
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye placeholder="Contraseña">
									<div class="invalid-feedback">
										Password requerida
									</div>
								</div>

								<div class="form-group">
									<label for="password2">Repita Password</label>
									<input id="password2" type="password" class="form-control" name="password2" required data-eye placeholder="Contraseña">
									<div class="invalid-feedback">
										Confirmacion de Password requerida
									</div>
								</div>


								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">Acepto los <a href="#"> terminos y condiciones</a></label>
										<div class="invalid-feedback">
											Debes aceptar los terminos y condiciones
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" onclick="registro()">
										Registrar
									</button>
								</div>
								<?php if(!empty($errores)): ?>
								<div class="error">
								<ul>
									<?php echo $errores; ?>
								</ul>
								</div>
								<?php endif; ?>
								<div class="mt-4 text-center"> 
								¿Ya tienes una cuenta? <a href="index.php"> Login</a>
								</div>
								
							</form>
						</div>      
					</div>
					<div class="footer">
						Copyright &copy; 2019 &mdash; Guns 'n Coders 
					</div>
				</div>
			</div>
		</div>
	</section>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
