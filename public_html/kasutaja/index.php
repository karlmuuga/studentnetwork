<?php
include ($_SERVER ['DOCUMENT_ROOT'] . "/includes/txt.php");
global $login;
if (! $login) {
	header ( "Location: http://www.studentnetwork.ee/login" );
}
$errormess = "";
getHead ( "SN Kasutajaleht" );

$secure = $_SESSION ['token'];

if (isset ( $_POST ['loginSubmit'] )) {
	
	if ($_POST ['loginPassword'] != "" && $_POST ['fullname'] != "" && $_POST ['loginEmail'] != "") {
		
		$email = $_POST ['loginEmail'];
		$pass = hash ( "sha512", $_POST ['loginPassword'] );
		$token = md5 ( uniqid ( rand (), true ) );
		$fullname = $_POST ['fullname'];
		$kontrolli = mysql_query ( "SELECT * FROM users WHERE email='$email' OR fullname='$fullname'" );
		if (! $kontrolli) {
			echo mysql_error ();
			echo "SELECT * FROM users WHERE email=$email OR fullname=$fullname";
		}
		if (mysql_num_rows ( $kontrolli ) == 0) {
			$rega = mysql_query ( "INSERT INTO users (id,email,fullname,password,secure) 
			VALUES ('','$email','$fullname','$pass','$token');" ) or die ( mysql_error () );
			$errormess = "Kasutaja <span style='font-weight:bold'>$fullname ($email)</span> on edukalt lisatud!";
		} else {
			$errormess = "Selline kasutaja on juba olemas!";
		}
	} else {
		$errormess = "Palun sisesta kõik andmed!";
	}
}
?>

<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>

<li><a href="../uudised">Uudised</a></li>

<li><a href="../meist">Meist</a></li>

<li><a href="../opetajad">Õpetajad</a></li>

<li><a href="../hinnakiri">Hinnakiri</a></li>

<li><a href="#footer">Kontakt</a></li>
<?php
if (isset ( $_SESSION ['token'] )) {
	echo '<li><a style="border-bottom:solid 2px #72c02c" href="../kasutaja">Kasutaja</a></li>';
}
?>
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
		<h1 class="pull-left">Kasutajaleht
            <?php
												global $con, $fullname;
												$admin = false;
												$script = "pole";
												if ($_SESSION ['token'] == "662aa88b89efd660da565d7ddd8e4735" || $_SESSION ['token'] == "d61cd12e365fcbed27aa92c32eff7ad6") {
													$script = "SELECT * FROM lessons";
													$p2ring = mysql_query ( $script );
													$admin = true;
												} else {
													$script = "SELECT * FROM lessons WHERE student = '$fullname'";
													$p2ring = mysql_query ( $script );
												}
												global $admin;
												if ($admin) {
													echo " - Administraator";
												}
												?></h1>
		<ul class="pull-right breadcrumb">
			<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>
			<li><a>Login</a></li>
			<li class="active">Kasutajaleht</li>
		</ul>
	</div>
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container content">
	<div class="row">
        <?php
								if (mysql_num_rows ( $p2ring ) > 0) {
									// NÄITA TUNDE
									echo "<h1>Registreeritud tunnid";
									if ($admin) {
										echo " (ülem-vaade)";
									}
									echo ':</h1><div class="col-md-9">
            <div class="panel panel-green margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i>Tundide tabel</h3>
                    </div>
                    <div class="panel-body">
                        <p>Selles tabelis näete kõiki registreeritud tunde ja muid detaile nende kohta.</p>
                    </div>                                      
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Õpetaja</th>
                                <th class="hidden-sm">Õpilane</th>
                                <th>Kuupäev</th>
                                <th>Staatus</th>
								<th>Kommentaarid</th>
                            </tr>
                        </thead>
                        <tbody>
                            ';
									
									while ( $data = mysql_fetch_assoc ( $p2ring ) ) {
										echo "<tr><td>" . $data ['id'] . "</td>" . "<td>" . $data ['teacher'] . " (" . $data ['teacheruser'] . ")</td>
                   <td>" . $data ['student'] . "</td>
                   <td>" . $data ['date'] . "</td>
                   <td>" . $data ['status'] . "</td>
                   <td>" . $data ['comments'] . "</td></tr>";
									}
									
									echo "                     </tbody>
                    </table></div>
                </div>";
								} else {
									// TUNDE EI SAA NÄIDATA
									echo "<h1>Registreeritud tunde pole. :(</h1>";
								}
								
								if ($admin) {
									
									echo '<div class="col-md-9"><h1>Kasutajate tabel</h1>
                        <div class="panel panel-sea margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-edit"></i>Kõik kasutajad</h3>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kasutajanimi</th>
                                        <th>Täisnimi</th>
										<th>Tundide arv see kuu</th>
                                    </tr>
                                </thead>
                                <tbody>';
									
									$kasutajad = mysql_query ( "SELECT * FROM users" );
									while ( $nimed = mysql_fetch_array ( $kasutajad ) ) {
										echo "<tr>
                                <td>" . $nimed ['id'] . "</td>
                        <td>" . $nimed ['email'] . "</td>
                        <td>" . $nimed ['fullname'] . "</td>
                        <td>" . $nimed ['lessoncount'] . "</td></tr>";
									}
									echo '                                </tbody>
                            </table>
                        </div>                  
                    </div>';
									echo '<div class="col-md-3"><h1>Loo uus kasutaja</h1>
                    <form class="reg-page" method="POST">

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="loginEmail" type="text" placeholder="Kasutajanimi" class="form-control">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="fullname" type="text" placeholder="Täisnimi" class="form-control">
                    </div>   
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="loginPassword" type="password" placeholder="Parool" class="form-control">
                    </div>                    

                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn-u pull-right" type="Submit" name="loginSubmit" style="margin-left:20px">Loo uus kasutaja!</button>                        
                        </div>
                    </div>
                    <hr>
                </form>';
									echo "<span style='font-size:13pt;color:red'>" . $errormess . "</span>
                </div><div class='col-md-3'>
                <form method='POST' action='http://www.studentnetwork.ee/kasutaja/#r'>
                       <table id='r'>
                            <tr><td>
                                    <br>
                                    <select style='max-width:190%;width:150px;height:20px;float:right' name='teacher'>
                                        <option>Vali õpetaja  ></option>
                                        <option>Mariann Reinmann</option>
                                        <option>Grete-Kai Teeäär</option>
                                        <option>Britta Pung</option>
                                        <option>Katariina Purru</option>
                                        <option>Ketlin Vessart</option>
                                        <option>Janna Liina Leemets</option>
                                        <option>Joosep Heinsalu</option>
                                        <option>Triin Marleen Kruusimäe</option>
                                        <option>Grete Elmi</option>
                                        <option>Kristin Hint</option>
                                        <option>Anna Krasnikova</option>
                                        <option>Katariina Soone</option>
                                        <option>Kristiina Paju</option>
                                        <option>Alvar Antson</option>
                                        <option>Anna Aamisepp</option>
                                        <option>Hedvig Vahlberg</option>
                                        <option>Fedja Stomakhin</option>
                                        <option>Anne-Mari Kukk</option>
                                    </select><br></td></tr>
                            <tr><td><input style='max-width:190%;width:150px;height:30px' type='text' name='student' placeholder='Õpilase nimi'><br></tr></td>
                            <tr><td><input style='max-width:190%;width:150px;height:30px' type='text' name='date' id='datepicker' placeholder='Vali kuupäev'><br></tr></td>
                            <tr><td><p>Tundide arv: <select name='count'><option>1</option><option>2</option><option>3</option></select></p></tr></td>
                            <tr><td><textarea rows='7' placeholder='Märkused' name='comm'></textarea>

                                <br><br></tr></td>
                            <tr id='r'><td><button type='submit' class='btn-u btn-u-sea' name='rega'>Registreeri!</button><br></tr></td>
                        </table>
                      </form>
                    </div>     
";
									if (isset ( $_POST ['rega'] )) {
										
										if ($_POST ['student'] != "" and $_POST ['date'] != "" and $_POST ['teacher'] != "" and $_POST ['teacher'] != "Vali õpetaja >") {
											require_once ($_SERVER ['DOCUMENT_ROOT'] . "/includes/connect.php");
											$opil = $_POST ['student'];
											$opet = $_POST ['teacher'];
											$arv = $_POST ['count'];
											$date = $_POST ['date'];
											$comm = $_POST ['comm'];
											$getUser = mysql_query ( "SELECT * FROM users WHERE fullname='$opet'" );
											if (mysql_num_rows ( $getUser ) < 1) {
												echo "Sellist õpetajat ei ole veel olemas!";
											} else {
												$tulemus = mysql_fetch_array ( $getUser );
												$user = $tulemus ['email'];
												$sisesta = mysql_query ( "INSERT INTO lessons VALUES ('','$opet','$user','$opil','$date','0','$comm')" );
												if (! $sisesta) {
													echo mysql_error ();
												} else {
													echo "<br><br>Teie tund sai edukalt registreeritud. See toimub kuupäeval $date õpetajaga $opet.";
												}
											}
										} else {
											echo "Palun sisestage kõik andmed!";
										}
									}
								}
								?>
    </div>
</div>
<!--=== End Content Part ===-->
<?php getFoot(); ?>