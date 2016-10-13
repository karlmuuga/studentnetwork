<?php

session_start();
$login = false;
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/connect.php");
    $checkUserID = mysql_query("SELECT * FROM `users` WHERE secure='$token' LIMIT 1;");
    if (mysql_num_rows($checkUserID) == 0) {
        
    } else {
        $userData = mysql_fetch_assoc($checkUserID);
        $userEmail = addslashes($userData['email']);
        $userId = $userData['id'];
        $fullname = $userData['fullname'];
        $login = true;
    }
}
/*
  $timezone = date_default_timezone_get();
  date_default_timezone_set($timezone);
  $date = date('m/d/Y h:i:s a', time());
  $ip = $_SERVER['REMOTE_ADDR'];
  $myFile = "base.txt";
  $fh = fopen($myFile, 'a');
  if($fh){
  $read = 0;
  $handle = fopen($myFile, "r");
  while(!feof($handle)){
  $line = fgets($handle);
  $read++;
  }
  $stringData = $read.": IP-aadress oli: ".$ip." ja aeg oli: ".$date."\r\n";
  fwrite($fh, $stringData);
  fclose($fh);} */

function getHead($tiitel) {

    print '
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
    <!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
    <!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
    <title>' . $tiitel . '</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student Networki kodulehekülg">
    <meta name="author" content="Karl-Hendrik Muuga">
    <!-- Datepicker n stuff-->
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="../assets/plugins/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../assets/plugins/jquery-ui.min.js"></script>
            <script type="text/javascript">
                $(document).ready(
                    function () {
                      
                      $( "#datepicker" ).datepicker({
                        changeMonth: true,
                        changeDay: true
                      });
                      $("#datepicker").datepicker("option", "dateFormat", "dd-mm-yy");
                      $( "#datepicker" ).datepicker( "option", "dayNamesMin", [ "Es", "Te", "Ko", "Ne", "Re", "La", "Pü" ] );
                      $( "#datepicker" ).datepicker( "option", "monthNamesShort", [ "Jan", "Veb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dets" ]);
                      '; if($tiitel !="SN Kasutajaleht"){echo '$( "#datepicker" ).datepicker( "option", "minDate", "+3d");';} echo '
                    }
                );
            </script>
            

    <!-- Favicon -->
    <link rel="icon" href="../favicon.jpg" type="image/jpeg">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="../assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/flexslider/flexslider.css">  
    <link rel="stylesheet" href="../assets/plugins/parallax-slider/css/parallax-slider.css">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="../assets/css/themes/default.css" id="style_color">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="../assets/css/custom.css">

</head>	

<body>
<!--=== Style Switcher ===-->    
<i class="style-switcher-btn fa fa-cogs hidden-xs"></i>
<div class="style-switcher animated fadeInRight">
    <div class="theme-close"><i class="icon-close"></i></div>
    <div class="theme-heading">Teemavärvid</div>
    <ul class="list-unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="light"></li>
        <li class="theme-blue" data-style="blue" data-header="light"></li>
        <li class="theme-orange" data-style="orange" data-header="light"></li>
        <li class="theme-red" data-style="red" data-header="light"></li>
        <li class="theme-light last" data-style="light" data-header="light"></li>

        <li class="theme-purple" data-style="purple" data-header="light"></li>
        <li class="theme-aqua" data-style="aqua" data-header="light"></li>
        <li class="theme-brown" data-style="brown" data-header="light"></li>
        <li class="theme-dark-blue" data-style="dark-blue" data-header="light"></li>
        <li class="theme-light-green last" data-style="light-green" data-header="light"></li>
    </ul>
    <div style="margin-bottom:18px;"></div>
    <div class="theme-heading">Paigutused</div>
    <div class="text-center">
        <a href="javascript:void(0);" class="btn-u btn-u-green btn-block active-switcher-btn wide-layout-btn">Lai</a>
        <a href="javascript:void(0);" class="btn-u btn-u-green btn-block boxed-layout-btn">Kastid</a>
    </div>
</div><!--/style-switcher-->
<!--=== End Style Switcher ===-->    

<div class="wrapper">
            <!--=== Header ===-->    
            <div class="header">
                <!-- Topbar -->
                <div class="topbar">
                    <div class="container">
                        <!-- Topbar Navigation -->
                        <ul class="loginbar pull-right">
                            <li class="topbar-devider"></li>';
    global $login;
    if ($login) {
        global $fullname;
        echo '<li>Tere tulemast, ' . $fullname . '!</li><li class="topbar-devider"></li><li><a href="../logout.php">Logi välja!</a></li>';
    } else {
        echo "<li><a href='../login'>LOGI SISSE</a></li>";
    }

    print '
                        </ul>
                        <!-- End Topbar Navigation -->
                    </div>
                </div>
                <!-- End Topbar -->
    
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Luba navigatsioon</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="http://www.studentnetwork.ee">
                        <img id="logo-header1" src="../photo.JPG" style="width:123px;height:50px" alt="Logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">

';
}

function getFoot() {

    print '

<!--=== Footer ===-->
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 md-margin-bottom-40">
                                        <div class="headline"><h2>Info</h2></div>  
                    <p class="margin-bottom-25 md-margin-bottom-40">Student Network on Tallinna 21. Kooli õpilaste loodud õpilasfirma, 
                        mis tegeleb õpiabi pakkumisega. <br><br>Firma tegutseb põhiliselt Tallinnas ning tegeleb peamiselt põhikooliõpilastele 
                        suunatud järelaitamistundide pakkumisega. <br><br>Õpetajateks on gümnaasiumiõpilased, kellelt on võimalik tellida 
                        õpiabitunde nii reaal- kui ka humanitaarainetes.</p>    
                    <!-- End About -->
                    
                </div><!--/col-md-4-->  
                
                                <div class="col-md-4 md-margin-bottom-40">
                    <!-- Recent Blogs -->
                    <div class="posts">
                        <div class="headline"><h2>Viimased uudised</h2></div>
                        <dl class="dl-horizontal">
                            <dt><a href="../uudised"><img src="../assets/img/sliders/elastislide/6.jpg" alt="" /></a></dt>
                            <dd>
                                <p><a href="../uudised">Õpilasfirma Student Network on tiibadesse saanud uued tuuled!</a></p> 
                            </dd>
                        </dl>
               
                    </div>
                    <!-- End Recent Blogs -->                    
                </div><!--/col-md-4-->

                <div class="col-md-4">
                    <!-- Contact Us -->
                    <div class="headline"><h2>Kontakteeru meiega</h2></div> 
                    <address class="md-margin-bottom-40">
                        Raua 6, Tallinn, Eesti<br />
                        Telefon: +372 562 051 81 <br />
                        Email: <a href="mailto:tunnid@studentnetwork.ee" class="">tunnid@studentnetwork.ee</a>
                    </address>
                    <!-- End Contact Us -->

                    <!-- Social Links -->
                    <div class="headline"><h2>Püsi kursis!</h2></div> 
                    <ul class="social-icons">
                        <li><a href="http://fb.com/OFStudentNetwork" data-original-title="Facebook" class="social_facebook"></a></li>
                    </ul>
                    <!-- End Social Links -->
                </div><!--/col-md-4-->
            </div>
        </div> 
    </div><!--/footer-->
    <!--=== End Footer ===-->

    <!--=== Copyright ===-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">                     
                    <p>
                        2014 &copy; Student Network. ALL Rights Reserved / Kõik õigused reserveeritud. 
                    </p>
                </div>
                <div class="col-md-6">  
                    <a href="http://www.studentnetwork.ee">
                        <img id="logo-header" src="../photo.JPG" style="width:123px;height:50px;float:right;margin-right:12%" alt="Logo">
                    </a>
                </div>
            </div>
        </div> 
    </div><!--/copyright--> 
    <!--=== End Copyright ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->			
<script type="text/javascript" src="../assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="../assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="../assets/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="../assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="../assets/js/app.js"></script>
<script type="text/javascript" src="../assets/js/pages/index.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initParallaxSlider();        
    });
</script>
<!--[if lt IE 9]>
    <script src="../assets/plugins/respond.js"></script>
    <script src="../assets/plugins/html5shiv.js"></script>    
<![endif]-->

</body>
</html>	

';
}

?>