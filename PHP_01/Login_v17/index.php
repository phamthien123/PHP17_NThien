<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	require_once "html/head.php";
	?>
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>

					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Sign in
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							User name / password?
						</a>
					</div>
					<div class="w-full text-center">
						<a href="#" class="txt3">
							Sign Up
						</a>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

				<?php
				$Name = isset($_POST['username']) ? $_POST['username'] : null;
				$Pass  = isset($_POST['pass']) ? $_POST['pass'] : null;
				$Admin =  ($Name == "admin" && $Pass == "admin");
				$Menber =  ($Name == "thien" && $Pass == "123" || $Name == "thien1" && $Pass == "123");

				if (!$Admin && !$Menber && $Name != "" && $Pass != "") {
					echo '<script>alert("Sai TK or MK")</script>';
				} else if ($Admin) {
					header("Location: admin.php");
				} else if ($Menber) {
					header("Location: menber.php");
				}
				?>
				
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	<?php require_once "html/script.php"; ?>
</body>

</html>