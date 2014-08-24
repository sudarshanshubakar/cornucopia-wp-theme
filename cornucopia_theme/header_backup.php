<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> ng-app="SiteApp">
<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!--     <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'> -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Optional theme -->
<!--     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
 -->    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cosmo/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-route.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-sanitize.min.js"></script>
    <script type="text/javascript">
    //var pages = <?= json_encode(get_pages( array('post_type' => 'page', 'post_status' => 'publish' ))); ?>;
    var menu_items = <?= json_encode(wp_get_nav_menu_items('Test Menu' )); ?>;
    var title = <?= bloginfo('name'); ?>;
    var description = <?= bloginfo('description'); ?>;
    var pageTitle = title + " - " + description
    //var page = <?= json_encode(get_page('13' )); ?>;
    </script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" ng-controller="MenuController">
                <li ng-repeat="menuitem in menuitems" class="{{menuitem.active}}" > <!--class="active"-->
                    <a title="{{menuitem.title}}" href="#/page/{{menuitem.object_id}}">{{menuitem.title}}</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- <div id="wrapper" class="hfeed">
    <div id="header">
        <div id="masthead">
 
            <div id="access">
                <nav id="my-navigation">
                    <a href="#my-navigation" title="Show navigation"></a>
                    <a href="#" title="Hide navigation"></a>
                    <div class="primary-menu-nav">
                        <ul id="menu-test-menu" class="nav-menu" ng-controller="MenuController">
                            <li ng-repeat="menuitem in menuitems" class="{{menuitem.classes}} menu-item menu-item-type-post_type menu-item-object-page page_item">
                                <a title="{{menuitem.title}}" href="#/page/{{menuitem.object_id}}">{{menuitem.title}}</a>
                            </li>
                        </ul>
    				<!--<?php wp_nav_menu( array( 'theme_location' => 'primary menu', 'menu_class' => 'nav-menu' ) ) ?>
                    <!-- <div id='mobile-menu-trigger'><p >MENU</p>
                    // <?php wp_nav_menu( array( 'theme_location' => 'primary mobile', 'menu_class' => 'nav-menu' ) ) ?>
                     </div>

                </nav>
            </div><!-- #access >
 			
        </div><!-- #masthead >
    </div><!-- #header -->
 
    <div id="main">