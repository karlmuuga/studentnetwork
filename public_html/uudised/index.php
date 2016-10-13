<?php require_once($_SERVER['DOCUMENT_ROOT']."/includes/txt.php");getHead("SN Uudised");?>

<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>

<li><a href="../uudised" style="border-bottom: solid 2px #72c02c">Uudised</a></li>

<li><a href="../meist">Meist</a></li>

<li><a href="../opetajad">Õpetajad</a></li>

<li><a href="../hinnakiri">Hinnakiri</a></li>

<li><a href="#footer">Kontakt</a></li>

<?php if(isset($_SESSION['token'])){echo '<li><a style="border-bottom:solid 2px #E68A2E" href="../kasutaja">Kasutaja</a></li>';}?>
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
		<h1 class="pull-left">Uudised</h1>
		<ul class="pull-right breadcrumb">
			<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>
			<li class="active">Uudised</li>
		</ul>
	</div>
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container content">
	<div class="blog margin-bottom-40">
		<div class="blog-img">
			<img class="img-responsive" src="../assets/img/sliders/4.jpg" alt="">
		</div>
		<h2>Õpilasfirma Student Network on tiibadesse saanud uued tuuled!</h2>
		<div class="blog-post-tags">
			<ul class="list-unstyled list-inline blog-info">
				<li><i class="fa fa-calendar"></i> 1. September, 2014</li>
				<li><i class="fa fa-pencil"></i> Student Network'i juhatus</li>
			</ul>
		</div>
		<p>
			Nimelt on meil hea meel Teile tutvustada juhatust selleks
			õppeaastaks:<br>
			<br> Tegevjuht - Joosep Heinsalu<br> Finantsjuht - Maria Reinoja<br>
			Turundusjuht - Grete Elmi<br> Personalijuht - Triin Marleen Kruusimäe<br>
			<br> Oleme kõik edumeelsed ning teotahtelised Tallinna 21. Kooli
			gümnaasiumiõpilased ja oleme palju tööd teinud, et ka sel aastal
			Student Network'i edu saadaks! Meil on hea meel teatada, et pakume
			jätkuvalt õpilassõbralikku ja taskukohast õpiabi
			gümnaasiumiõpilastelt põhikooliõpilastele! Ning kui on soovijaid,
			hakkame pakkuma ka instrumendiõpetuse eratunde, näiteks kitarritunde.<br>
			Ühendust saate meiega võtta jätkuvalt meili teel: <a
				href="mailto:tunnid@studentnetwork.ee">tunnid@studentnetwork.ee</a>;
			ning vajadusel saate meid kätte ka meie kontaktnumbri kaudu:
			56205181. <br>Ei tohi ka unustada, et muidugi kõige kiirem ja lihtsam
			viis abiõpetaja leidmiseks on läbi meie kodulehe, kust leiate
			täitmiseks vastavad <a href="../hinnakiri">juhised</a>! <br>
			<br> Kui küsimusi tekib, võtke julgelt ühendust!<br>
			<br> Kõike paremat,<br> Student Network'i juhatus
		</p>
	</div>

</div>
<!--=== End Content Part ===-->

<?php getFoot();?>