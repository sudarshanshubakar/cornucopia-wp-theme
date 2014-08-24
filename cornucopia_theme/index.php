<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> ng-app="SiteApp"  ng-controller="SiteController">
	<head>
		<title>{{pageTitle}}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
 		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cosmo/bootstrap.min.css">
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
 		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/style.css">
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script>
 		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-route.min.js"></script>
 		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-sanitize.min.js"></script>
 		<script type="text/javascript">
 			var menu_items = <?= json_encode(wp_get_nav_menu_items('Cornucopia_main' )); ?>;
 			var title = '<?= bloginfo('name'); ?>';
 			var description = '<?= bloginfo('description'); ?>';
 			var pageTitle = title + " - " + description
 		</script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
	    <title>{{pageTitle}}</title>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
 			<div class="container-fluid">
 				<div class="navbar-header">
 					<a class="navbar-brand" href="#">{{siteName}}</a>
    			</div>
	    		<div class="collapse navbar-collapse">
	    			<ul class="nav navbar-nav" ng-controller="MenuController">
				        <li ng-repeat="menuitem in menuitems" class="{{menuitem.active}}" >
				        	<a title="{{menuitem.title}}" href="#/page/{{menuitem.attr_title}}">{{menuitem.title}}</a>
				        </li>
				   	</ul>
				</div>
  			</div>
  		</nav>
  		<div ng-view></div>
  	</body>
</html>


