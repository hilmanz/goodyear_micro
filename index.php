<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="en-US"> <!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Goodyear</title>
<!--Stylesheets-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"  media="all" />
<link href="css/prettyPhoto.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/icons.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/cropper.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/goodyear.css" type="text/css"  media="all" />
<link rel="stylesheet" href="css/responsive.css" type="text/css"  media="all" />
<!--Favicon-->
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.charactercounter.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/cropper.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/goodyear.js"></script>

<!--GA-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-867847-68', 'auto');
  ga('send', 'pageview');

</script>
<!-- Facebook Conversion Code for FB - Submission -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6027518402765', {'value':'0.00','currency':'IDR'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6027518402765&amp;cd[value]=0.00&amp;cd[currency]=IDR&amp;noscript=1" /></noscript>

<!--JavaScript-->
</head>
<body>
<div id="mainContainer">
        <?php include('header.php'); ?>
		<?php 
        if(@$_GET['menu']=='gallery'){
            include("gallery.php");
        }else if(@$_GET['menu']=='info-kontes'){ 
            include("info-kontes.php");
        }else if(@$_GET['menu']=='tnc'){ 
            include("tnc.php");
        }else if(@$_GET['menu']=='demographic-data'){ 
            include("demographic-data.php");
        }else{ 
            include("home.php");
        }?>
    <?php include('footer.php'); ?>
</div>

                        
</body>
</html>
