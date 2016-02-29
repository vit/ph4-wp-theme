<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--meta name="description" content="Registration to the International Physics and Control Society (IPACS) Community Site">
  <meta name="keywords" content="IPASC, Physics, Control, Sciense">
  <meta name="author" content=""-->
  <title>International Physics and Control Society (IPACS)</title>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://ph4-my-vit2.c9users.io/assets/app-home.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>


<?php get_template_part( 'partials/remote_auth' ); ?>


<!--nav class="navbar navbar-default navbar-fixed-top"-->
			<!--nav class="navbar-collapse bs-navbar-collapse collapse navbar-default navbar-fixed-top" role="navigation"   id="site-navigation">
			<?php wp_nav_menu( array('theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list',
				'fallback_cb' => 'zerif_wp_page_menu'));
			?>
			</nav-->


<nav class="navbar navbar-default navbar-fixed-top">
<!--nav class="navbar navbar-default" role="navigation"-->
<!-- Brand and toggle get grouped for better mobile display --> 
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">IPACS</a>
    </div>
  <!-- Collect the nav links, forms, and other content for toggling --> 
  <div class="collapse navbar-collapse navbar-ex1-collapse"> 
<?php /* Primary navigation */
wp_nav_menu( array(
  'menu' => 'top_menu',
  'depth' => 2,
  'container' => false,
  'menu_class' => 'nav navbar-nav navbar-right',
  //Process nav menu using our custom nav walker
  'walker' => new wp_bootstrap_navwalker())
);
?>
  </div>
  </div>
</nav>



<?php// get_template_part( 'partials/navbar' ); ?>


<!--div class="container">
  <h1>International Physics and Control Society (IPACS)</h1>
</div-->

