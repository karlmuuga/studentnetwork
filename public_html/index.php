<?php require_once($_SERVER['DOCUMENT_ROOT']."/includes/txt.php");getHead("Student Network");?>

<li><a href="http://www.studentnetwork.ee"
	style="border-bottom: solid 2px #72c02c">Avaleht</a></li>

<li><a href="/uudised">Uudised</a></li>

<li><a href="/meist">Meist</a></li>

<li><a href="/opetajad">Õpetajad</a></li>

<li><a href="/hinnakiri">Hinnakiri</a></li>

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

<!--=== Slider ===-->
<div class="slider-inner">
	<img style="width: 100%" src="../assets/img/team/team.JPG"
		alt="Student Network'i tiim" title="Student Network'i tiim">
</div>
<!--/slider-->
<!--=== End Slider ===-->



<!--=== Content Part ===-->
<div class="container content">

	<!-- Recent Works -->
	<div class="headline">
		<h2>Viimased uudised</h2>
	</div>
	<div class="row margin-bottom-20">
		<div class="col-md-3 col-sm-6">
			<div class="thumbnails thumbnail-style thumbnail-kenburn">
				<div class="thumbnail-img">
					<div class="overflow-hidden">
						<img class="img-responsive" src="assets/img/main/2.jpg" alt="">
					</div>
					<a class="btn-more hover-effect" href="/uudised">loe juudre +</a>
				</div>
				<div class="caption">
					<h3>
						<a class="hover-effect" href="news.html">Uus juhtkond</a>
					</h3>
					<p>Õpilasfirma Student Network on tiibadesse saanud uued tuuled!</p>
				</div>
			</div>
		</div>
	</div>
	<!-- End Recent Works -->
</div>
<!--/container-->
<!-- End Content Part -->
<?php getFoot();?>