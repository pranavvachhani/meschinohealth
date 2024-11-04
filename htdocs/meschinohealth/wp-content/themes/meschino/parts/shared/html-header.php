<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>
        <?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?>
    </title>
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/new_style.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <script>
      jQuery(function ($) {
         var now = new Date(); 
         var day = ("0" + now.getDate()).slice(-2);
         var month = ("0" + (now.getMonth() + 1)).slice(-2);
         var today = now.getFullYear()+"-"+(month)+"-"+(day);
        $('#datePicker').val(today);
        $("#datePicker").attr("min", today);
      });
    </script>
    <style>
        .wp-cpl-theme-no{ display: flex; flex-wrap: wrap; margin: 0; padding: 0; }
.wp-cpl-theme-no li.wp-cpl{ width: 33.33%; list-style-type: none; background: none !important; float: none !important; padding: 3px 5px !important; margin: 2px 0 !important; overflow: hidden !important; }
    </style>
	  <style>
.subscribe-widget{ top: 650px; }
.slick-slide .newstyle-slider-caption .col-right img{ max-width: 66.2vw; }
		  @media(max-width: 767px){
			  .slick-slide .newstyle-slider-caption{ padding: 10% 0 0;}
		  }
	  </style>
<?php $youtube_add_video_url = get_field( "nutrition_natural_medicine_video_url" ); ?>

	  <?php if( $youtube_add_video_url ) { ?>
<style>

.video-gallery-widget{ 
    position: fixed; 
    width: 210px; 
    height: 138px;
    top: 468px; 
    right: 0; 
    z-index: 1000; 
}
.video-gallery-widget .textwidget {
    width: 210px;
    height: 138px;
    background: #fff;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
    position: absolute;
    right: 26px;
    bottom: -90px;
    z-index: 101;
    
}
.video-gallery-widget .textwidget::after, .video-gallery-widget .textwidget::before{
    display: table;
    content: " ";
}
.video-gallery-widget .textwidget::after{
    clear: both;
}
.video-gallery-widget p.our-product{ 
    padding: 10px; 
    text-align: center; 
    font-size: 13px;
    line-height: 20px; 
    font-weight: 500; 
}
.video-gallery-widget p a.our-product-btn { 
    background: #7cd003;
    margin: 23px auto 0;
    width: 145px;
    height: 40px;
    line-height: 40px;
    color: #fff;
    text-transform: uppercase;
    display: block;
    font-weight: 500;
    border-radius: 5px;
    text-align: center;
}
@media (min-width: 1561px){
    .video-gallery-widget .textwidget{
         background: #ccc;
         border:2px solid #c3c3c3;
    }
    .video-gallery-widget p.our-product{
        padding: 15px 10px; 
        font-size: 15px;
    }
    .video-gallery-widget p a.our-product-btn { 
        margin: 6px auto 0;    
    }
}
@media (min-width: 991px) and (max-width: 1560px) {
    .subscribe-widget{ width: 55%; float: left; }
    .subscribe-widget .textwidget .subscribe-ico{ width: 62%;     font-size: 15px;}
    
	.video-gallery-widget{ float:right; width:45%; position: static; height: auto; top: auto; right: auto;}
	.video-gallery-widget .textwidget {width: 100%; height: auto; position: static; right: auto; bottom: auto; }
	.video-gallery-widget .textwidget::after, .subscribe-widget .textwidget::before{ content: ''; display: table; }	
	.video-gallery-widget .textwidget::after{ clear: both; }
	.video-gallery-widget .textwidget .our-product{ width: 45%; float: left; padding: 30px 0 30px 30px; background-position: 35px 14px; font-size: 15px; text-align: left;}
	.video-gallery-widget .textwidget a.our-product-btn{ float: right; margin-right: 30px; }
}
@media (max-width: 990px) {
    .subscribe-widget{ width: 100%; float: none; }
    .video-gallery-widget {
    position: static;
    width: 100%;
    height: auto;
    top: auto;
    right: auto;
    z-index: 1000;
}
.video-gallery-widget .textwidget {
    width: 100%;
    height: auto;
    background: #fff;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
    position: static;
    right: auto;
    bottom: auto;
    z-index: 101;
}
.video-gallery-widget .textwidget .our-product{    width: 70%;
    float: left;
    padding: 30px 0 30px 30px;
    background-position: 35px 14px;
    font-size: 18px;
    text-align: left;}
    
    .video-gallery-widget p a.our-product-btn {
    float: right;
    margin-right: 30px;}

}
@media (max-width: 600px){
    .video-gallery-widget .textwidget p{ float:left; width:100%; text-align: center;}
    .video-gallery-widget .textwidget .our-product{ width: 100%; text-align: center; padding: 20px 0; }
    .video-gallery-widget p a.our-product-btn {
    float: none;
    margin: 0 0 30px;
    display: inline-block;
    }
}
<?php } ?>
    </style>
  </head>
<body <?php body_class(); ?>>