$(document).ready(function(){
	$("#main").on('click',function() {
		$(".nav-menu").css('display','none');
	});	
	$("#my-navigation").on('click',function() {
		$(".nav-menu").attr('style','');
	});	
});

console.log(menu_items);

var siteApp = angular.module('SiteApp', ['ngRoute','ngSanitize']);

siteApp.config(function($routeProvider) {
	$routeProvider
	.when('/', {
		templateUrl: 'wp-content/themes/cornucopia_theme/pages/page_content.html',
		controller: 'HomeController'
	})
	.when('/page/:page_slug', {
		templateUrl: 'wp-content/themes/cornucopia_theme/pages/page_content.html',
		controller: 'PageController'
	});
});

function SiteController($scope) {
	$scope.pageTitle = pageTitle;
	$scope.siteName = title;
}

function MenuController ($scope, $rootScope) {
	$rootScope.menuitems = menu_items;
}

function PageController ($scope, $rootScope, $routeParams, $sce, $http) {
  	var pageSlug = $routeParams.page_slug;
  	var url = window.location.pathname+"/wp-json/pages/"+pageSlug;
  	console.log(window.location.origin);
	if($rootScope.menuitems != null) {
		$rootScope.menuitems.forEach(function (menuitem) {
			if(pageSlug == menuitem.attr_title) {
				menuitem.active = "active";
			} else {
				menuitem.active = ""
			} 
		});
	}

	$http({
		method: 'GET',
		url : url
	}).success(function(data, status, headers, config) {
		$scope.page = data;
		$scope.page.content_safe = $sce.trustAsHtml($scope.page.content);
	});
}

function HomeController ($scope, $rootScope, $routeParams, $sce, $http) {
  	var pageSlug = "";
  	console.log(window.location.origin);
	if($rootScope.menuitems != null) {
		$rootScope.menuitems.some(function (menuitem) {
			if(menuitem.attr_title == 'home') {
				menuitem.active = "active";
				pageSlug = menuitem.attr_title;
				return true;
			} 
		});
	}
  	var url = window.location.pathname+"/wp-json/pages/"+pageSlug;

	$http({
		method: 'GET',
		url : url
	}).success(function(data, status, headers, config) {
		$scope.page = data;
		$scope.page.content_safe = $sce.trustAsHtml($scope.page.content);
	});
}