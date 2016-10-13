<?php require_once($_SERVER['DOCUMENT_ROOT']."/includes/txt.php");getHead("SN Õpetajad");?>

<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>

<li><a href="../uudised">Uudised</a></li>

<li><a href="../meist">Meist</a></li>

<li><a href="../opetajad" style="border-bottom: solid 2px #72c02c">Õpetajad</a></li>

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
		<h1 class="pull-left">Õpetajad</h1>
		<ul class="pull-right breadcrumb">
			<li><a href="http://www.studentnetwork.ee">Avaleht</a></li>
			<li class="active">Õpetajad</li>
		</ul>
	</div>
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container content">
	<div class="row" style="font-size: 14pt">
		<ul>
			<li>Mariann Reinmann</li>
			<li>Grete-Kai Teeäär</li>
			<li>Britta Pung</li>
			<li>Katariina Purru</li>
			<li>Ketlin Vessart</li>
			<li>Janna Liina Leemets</li>
			<li>Joosep Heinsalu</li>
			<li>Triin Marleen Kruusimäe</li>
			<li>Grete Elmi</li>
			<li>Kristin Hint</li>
			<li>Anna Krasnikova</li>
			<li>Katariina Soone</li>
			<li>Kristiina Paju</li>
			<li>Alvar Antson</li>
			<li>Anna Aamisepp</li>
			<li>Hedvig Vahlberg</li>
			<li>Fedja Stomakhin</li>
			<li>Anne-Mari Kukk</li>
		</ul>
	</div>
</div>
<!--=== End Content Part ===-->

<?php getFoot();?>