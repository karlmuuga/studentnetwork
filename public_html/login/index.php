<?php
require_once ($_SERVER ['DOCUMENT_ROOT'] . "/includes/connect.php");
require_once ($_SERVER ['DOCUMENT_ROOT'] . "/includes/txt.php");

// ÄKKI TA ON SISSE LOGITUD?
if (isset ( $_SESSION ['token'] )) {
	header ( "Location: ../kasutaja" );
}

$login_error_message = "";
$error = "";

// KUI LOGIB SISSE:
if (isset ( $_POST ['loginSubmit'] )) {
	$loginError = array ();
	
	if (empty ( $_POST ['loginEmail'] )) {
		$loginError [] = 'Palun sisesta enda meiliaadress. ';
		$emptyEmail2 = true;
	} else {
		$email2 = strtolower ( mysql_real_escape_string ( $_POST ['loginEmail'] ) );
		$emptyEmail2 = false;
	}
	
	if (empty ( $_POST ['loginPassword'] )) {
		$loginError [] = 'Palun sisesta enda parool.';
		$emptyPass2 = true;
	} else {
		$unsecure2 = $_POST ['loginPassword'];
		$password2 = hash ( "sha512", $unsecure2 );
		$cryptedPass2 = mysql_real_escape_string ( $password2 );
		$emptyPass2 = false;
	}
	
	if (empty ( $loginError )) {
		$result3 = mysql_query ( "SELECT * FROM users WHERE email='$email2' AND password='$cryptedPass2' " ) or die ( mysql_error () );
		if (mysql_num_rows ( $result3 ) == 1) {
			while ( $row = mysql_fetch_array ( $result3 ) ) {
				$_SESSION ['token'] = $row ['secure'];
				header ( 'Location: http://www.studentnetwork.ee/kasutaja' );
			}
		} else {
			$login_error_message = "";
			$login_error_message = "<span class='loginError'>Meil on tohutult kahju, kuid " . "Teie sisestatud andmed tunduvad olevat <strong color='red'>valed</strong>.</span>";
		}
	} else {
		// LOGIN ERROR
		if ($emptyPass2 && $emptyEmail2) {
			$login_error_message = "";
			$login_error_message = "<span class='loginError'>Meil on tohutult kahju, kuid 
			Te peate sisestama nii enda e-maili aadressi kui ka parooli, et sisse logida.</span>";
		} else if ($emptyPass2) {
			
			$login_error_message = "";
			$login_error_message = "<span class='loginError'>Meil on tohutult kahju, kuid " . "Te peate sisestama enda parooli, et sisse logida.</span>";
		} else if ($emptyEmail2) {
			
			$login_error_message = "";
			$login_error_message = "<span class='loginError'>Meil on tohutult kahju, kuid sisse " . "logimiseks peate Te sisestama enda e-maili aadressi.</span>";
		}
	}
}

getHead ( "SN Login" );

?>
<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>

<li><a href="../uudised">Uudised</a></li>

<li><a href="../meist">Meist</a></li>

<li><a href="../opetajad">Õpetajad</a></li>

<li><a href="../hinnakiri">Hinnakiri</a></li>

<li><a href="#footer">Kontakt</a></li>

<?php if(isset($_SESSION['token'])){echo '<li><a style="bottom-border:1px solid #E68A2E" href="../kasutaja">Kasutaja</a></li>';}?>
</ul>
</div>
<!--/navbar-collapse-->
</div>
</div>
<!-- End Navbar -->

</div>
<!--=== End Header ===-->

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
	<div class="container">
		<h1 class="pull-left">Login</h1>
		<ul class="pull-right breadcrumb">
			<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>
			<li class="active">Login</li>
		</ul>
	</div>
	<!--/container-->
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container content">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<form class="reg-page" method="POST">
				<div class="reg-header">
					<h2>Logi enda kasutajaga sisse!</h2>
				</div>

				<div class="input-group margin-bottom-20">
					<span class="input-group-addon"><i class="fa fa-user"></i></span> <input
						name="loginEmail" type="text" placeholder="E-mail"
						class="form-control">
				</div>
				<div class="input-group margin-bottom-20">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span> <input
						name="loginPassword" type="password" placeholder="Parool"
						class="form-control">
				</div>
				<div class="row">
					<div class="col-md-6">
						<button class="btn-u pull-right" type="Submit" name="loginSubmit">Logi
							sisse</button>
					</div>
				</div>

				<hr>
			</form>
                <?php echo "<span style='font-size:12pt'>".$login_error_message."</span>";?>
            </div>
	</div>
	<!--/row-->
</div>
<!--/container-->
<!--=== End Content Part ===-->
<?php getFoot();?>