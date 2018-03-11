var app = angular.module('myApp', ['ngRoute', 'ui.bootstrap', 'ngAnimate','angularMdbSelect']);
app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/', {
      title: 'Accueil',
      templateUrl: 'partials/accueil.html',
      controller: 'homeCtrl'
    }).when('/products',{
          title: 'Products',
          templateUrl:'partials/products.html',
          controller:'productsCtrl'
    }).when('/cart',{
        title: 'Cart',
        templateUrl:'partials/cart.html',
        controller:'productsCtrl'
    }).when('/register',{
        title: 'Register',
        templateUrl:'partials/register.html',
        controller:'registerCtrl'
    }).when('/admin',{
        title: 'Admin',
        templateUrl:'partials/index_admin.html',
        controller:''
    }).when('/home_admin',{
        title: 'Admin',
        templateUrl:'partials/home_admin.html',
        controller:'adminCtrl'
    }).when('/contact',{
            title: 'Contact',
            templateUrl:'partials/contact.html',
            controller:''
        })
    .otherwise({
      redirectTo: '/'
        });;
}]);
