<?php
require_once ($_SERVER ['DOCUMENT_ROOT'] . "/includes/txt.php");
getHead ( "SN Hinnakiri" );
?>

<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>

<li><a href="../uudised">Uudised</a></li>

<li><a href="../meist">Meist</a></li>

<li><a href="../opetajad">Õpetajad</a></li>

<li><a href="../hinnakiri" style="border-bottom: solid 2px #72c02c">Hinnakiri</a></li>

<li><a href="#footer">Kontakt</a></li>

<?php
if (isset ( $_SESSION ['token'] )) {
	echo '<li><a style="border-bottom:solid 2px #E68A2E" href="../kasutaja">Kasutaja</a></li>';
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
		<h1 class="pull-left">Hinnakiri</h1>
		<ul class="pull-right breadcrumb">
			<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>
			<li class="active">Hinnakiri</li>
		</ul>
	</div>
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container content">
	<h1>
		HIND: <span style="font-weight: strong">1 h - 6€</span>
	</h1>
	<h2>Tasumine</h2>
	Maria Reinoja - EE842200221060588037, Swedbank<br>
	<h3>Selgitusse märkida</h3>
	Tundide toimumise kuu, õpetaja nimi, õpilase nimi, tundide arv.<br>
	<h2>Maksetingimused:</h2>
	<ul>
		<li>Maksmine toimub ainult pangaülekandega! Kui soovite maksta
			sularahas, palume meid sellest eelnevalt informeerida, et saaksime
			teha eraldi kokkuleppe.</li>
		<li>Käesoleva kuu eest peab tasuma hiljemalt järgneva kuu esimeseks
			päevaks.</li>
		<li>Tunni tühistamise eest palume ette teatada vähemalt 2 päeva (48h).</li>
		<li>Kui ühes kuus võetakse mitu tundi, saadame kuu lõpus arve, mille
			alusel tasuda.</li>
	</ul>
	<br>
	<div class="col-md-5">
		<div class="panel panel-grey">
			<div class="panel-heading">
				<h2 class="panel-title">
					<i class="fa fa-tasks"></i> Registreeri tund kohe!
				</h2>
			</div>
			<div class="panel-body">
				<form method="POST"
					action="http://www.studentnetwork.ee/hinnakiri/#r">
					<style type="text/css">
td {
	text-align: center;
	padding: 4px
}
</style>
					<div
						style="width: 45%; max-width: 95%; margin: 0 auto; padding: 10px; font-size: 11pt">
						<table>
							<tr>
								<td><br> <select
									style="max-width: 190%; width: 150px; height: 20px; float: right"
									name="teacher">
										<option>Vali õpetaja ></option>
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
								</select><br></td>
							</tr>
							<tr>
								<td><input style="max-width: 190%; width: 150px; height: 30px"
									type="text" name="student" placeholder="Õpilase nimi"><br>
							
							</tr>
							</td>
							<tr>
								<td><input style="max-width: 190%; width: 150px; height: 30px"
									type="text" name="date" id="datepicker"
									placeholder="Vali kuupäev"><br>
							
							</tr>
							</td>
							<tr>
								<td><p>
										Tundide arv: <select name="count"><option>1</option>
											<option>2</option>
											<option>3</option></select>
									</p>
							
							</tr>
							</td>
							<tr>
								<td><textarea rows="7" placeholder="Märkused" name="comm"></textarea>

									<br>
								<br>
							
							</tr>
							</td>
							<tr id="r">
								<td><button type="submit" class="btn-u btn-u-sea" name="rega">Registreeri!</button>
									<br>
							
							</tr>
							</td>
						</table>
                        <?php
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
																								?>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--=== End Content Part ===-->
<?php getFoot(); ?>