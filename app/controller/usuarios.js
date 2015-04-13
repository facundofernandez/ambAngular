
var app = angular.module('modUsuarios',['modDirUsuarios']);

app.controller('contUsuarios',function($scope){
	
	$scope.dataForm = { titulo : "Nuevo Usuario",btnTexto : "Editar"};
	$scope.dataPerfil = [{id: 1, perfil:'Administrador'},{id: 2, perfil:'Usuario'},{id: 3, perfil:'Consultor'},{id: 4, perfil:'Visitante'}];
	
	$scope.dataUsuarios = [{
		nombre: 'Facundo Fernandez',
		usuario: 'ffernandez',	
		idPerfil: 1,
		perfil: 'Administrador',
		email: 'ff.fernandez.facundo@gmail.com'
	},
	{
		nombre: 'Gonzalo Fernandez',
		usuario: 'gfernandez',	
		idPerfil: 1,
		perfil: 'Administrador',
		email: 'fernandez.gonzalo.com'
	},
	{
		nombre: 'Martin Perez',
		usuario: 'mperez',	
		idPerfil: 2,
		perfil: 'Usuario',
		email: 'martin.perez@gmail.com'
	}];

	$scope.modalNuevo = function(usuario){
		$scope.dataForm = {};
		$scope.dataForm.titulo = "Nuevo Usuario";
		$scope.dataForm.btnTexto = "Grabar";
		$('#modalUsuario').modal('show');
	};

	$scope.modalEditar = function(usuario){
		
		$scope.dataForm.nombre = usuario.nombre;
		$scope.dataForm.usuario = usuario.usuario;
		$scope.dataForm.selPerfil = {id: usuario.idPerfil};
		$scope.dataForm.email = usuario.email;
		$scope.dataForm.titulo = "Editar Usuario";
		$scope.dataForm.btnTexto = "Editar";
		$('#modalUsuario').modal('show');
	};
	
	$scope.modalEliminar = function(usuario){
		
		$('#modalEliminar').modal('show');
	};
	
	$scope.eliminar = function(){};
	$scope.grabar = function(){};

	
});