(function(){
	angular.module('app', ['ngRoute','modUsuarios','modDirApp','modSerError']);

	app.config(function($routeProvider){		
		$routeProvider
			.when('/',{ templateUrl: 'app/view/panel.html'})
			.when('/usuarios',{ templateUrl: 'app/view/usuarios.html', controller: 'contUsuarios'})
			.when('/reportes',{ templateUrl: 'app/view/reportes.html'})
			.otherwise({ redirectTo: '/'});
	});

	app.controller('contApp',function($scope,$timeout,serError){
		

	
	});
})();