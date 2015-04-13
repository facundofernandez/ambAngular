<?php 

namespace Com\facundofernandez\api;

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

require_once 'class/db.class.php';
require_once 'class/login.class.php';

session_start();

$app = new \Slim\Slim();

$app->get('/getUsuario/:id', function ($id) {
	$modLogin = new \Login();
	header('Content-Type: application/json');
    echo json_encode( $modLogin->cargarDatosPorId($id) );
	exit;
});
$app->get('/books/:id', function ($id) {
    //Show book identified by $id
});
$app->run();