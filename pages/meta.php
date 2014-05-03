<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="ThemeFuse" />
<meta name="Description" content="A short description of your company" />
<meta name="Keywords" content="Some keywords that best describe your business" />
<title><?php echo _getconfigdb("company_name"); ?></title>
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/preloadCssImages.js"></script>
<script type="text/javascript" src="js/jquery.color.js"></script>

<script type="text/javascript" language="JavaScript" src="js/general.js"></script>
<script type="text/javascript" language="JavaScript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" language="JavaScript" src="js/jquery.easing.1.3.js"></script>

<script type="text/javascript" language="JavaScript" src="js/slides.jquery.js"></script>

<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>

<!-- slider -->
<script src="js/jquery.bxSlider.min.js" type="text/javascript"></script>
<link href="css/bxSlider.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(window).load(function () {
  var slider = $('#slider1').bxSlider({
	controls: false,
	mode: 'vertical',
	speed: 500,
	pause: 7000,
	easing: 'easeOutCubic',
	auto: true,
	autoHover: true
  });

  $('#go-prev').click(function(){
    slider.goToPreviousSlide();
    return false;
  });

  $('#go-next').click(function(){
    slider.goToNextSlide();
    return false;
  });
}); 
</script>

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
</head>