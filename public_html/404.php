<?php require_once($_SERVER['DOCUMENT_ROOT']."/includes/txt.php");getHead("SN - ei leidnud");?>
<link rel="stylesheet" href="../assets/css/pages/page_404_error.css">

                                <li><a href="http://www.studentnetwork.ee">Avaleht</a></li>

                                <li><a href="../uudised">Uudised</a></li>

                                <li><a href="../meist">Meist</a></li>

                                <li><a href="../opetajad">Õpetajad</a></li>

                                <li><a href="../hinnakiri">Hinnakiri</a></li>

                                <li><a href="#footer">Kontakt</a></li>
                                
                                <?php if(isset($_SESSION['token'])){echo '<li><a href="../kasutaja">Kasutaja</a></li>';}?>

                            </ul>
                        </div><!--/navbar-collapse-->
                    </div>    
                </div>            
                <!-- End Navbar -->

            </div>
            <!--=== End Header ===-->    

            <!--=== Breadcrumbs ===-->
            <div class="breadcrumbs">
                <div class="container">
                    <h1 class="pull-left">404</h1>
                    <ul class="pull-right breadcrumb">
                        <li><a href="http://www.studentnetwork.ee">Avaleht</a></li>
                        <li><a>Login</a></li>
                        <li class="active">404</li>
                    </ul>
                </div> 
            </div><!--/breadcrumbs-->
            <!--=== End Breadcrumbs ===-->

            <!--=== Content Part ===-->
<div class="container content">		
        <!--Error Block-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v1">
                    <span class="error-v1-title">404</span>
                    <span>On ilmnenud tõrge!</span>
                    <p>Ilmnes tõrge, sest me ei leidnud sinu otsitud lehte.</p>
                    <a class="btn-u btn-bordered" href="http://www.studentnetwork.ee">Tagasi avalehele</a>
                </div>
            </div>
        </div>
        <!--End Error Block-->
    </div>	
            <!--=== End Content Part ===-->
<?php getFoot();?>