<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Facundo
 */
class Login {
	//put your code here
	private $id;
	private $usuario;
	private $nombre;
	private $apellido;
	private $perfil;
	
	public function __construct($id = null) {
		if(!is_null($id)) {
			$this->cargarDatosPorId($id);
		}
	}
	
	public function cargarDatosPorId($id) {
		$query = "SELECT * FROM usuarios WHERE id = :id";
		
		$stmt = DB::getStatement($query);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()) {
			$rows = $stmt->fetch(PDO::FETCH_OBJ);
			return $rows;
		}
		return false;
	}
	
	
}
