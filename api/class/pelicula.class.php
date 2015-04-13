<?php
require_once "db.class.php";

class Pelicula {
	private $codigo;
	private $titulo;
	private $genero;
	private $descripcion;
	private $disponibles;
	private $stock;
	private $precio;

	public function __construct($id = null) {
		if(!is_null($id)) {
			$this->cargarDatosPorId($id);
		}
	}

	public function cargarDatosPorId($id) {
		$query = "SELECT * FROM peliculas
				WHERE cod_pelicula = :id";

		$stmt = DB::getStatement($query);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()) {
			$this->cargarDatosDeArray($stmt->fetch());
			return true;
		}
		return false;
	}

	public function cargarDatosDeArray($fila) {
		$this->setCodigo($fila['cod_pelicula']);
		$this->setTitulo($fila['nombre']);
		$this->setGenero($fila['genero']);
		$this->setDescripcion($fila['descripcion']);
		$this->setDisponibles($fila['disponibles']);
		$this->setStock($fila['stock']);
		$this->setPrecio($fila['precio']);
	}

	public function cargarDatosDeForm() {
		$this->setCodigo($_POST['cod']);
		$this->setTitulo($_POST['titulo']);
		$this->setGenero($_POST['genero']);
		$this->setDescripcion($_POST['descripcion']);
		$this->setDisponibles($_POST['disponibles']);
		$this->setStock($_POST['stock']);
		$this->setPrecio($_POST['precio']);
	}

	public function grabar() {
		$query = "INSERT INTO peliculas (nombre, genero, descripcion, disponibles, stock, precio)
				  VALUES (:titulo, :genero, :desc, :disp, :stock, :precio)";

		$stmt = DB::getStatement($query);

		$stmt->bindParam(":titulo", $this->getTitulo(), PDO::PARAM_STR);
		$stmt->bindParam(":genero", $this->getGenero(), PDO::PARAM_STR);
		$stmt->bindParam(":desc",   $this->getDescripcion(), PDO::PARAM_STR);
		$stmt->bindParam(":disp",   $this->getDisponibles(), PDO::PARAM_INT);
		$stmt->bindParam(":stock",  $this->getStock(), PDO::PARAM_INT);
		$stmt->bindParam(":precio", $this->getPrecio(), PDO::PARAM_STR);

		if($stmt->execute()) {
			$this->setCodigo(DB::getConnection()->lastInsertId());
			return true;
		}
		return false;
	}

	public function modificar() {
		$query = "UPDATE peliculas
				 SET    nombre      = :titulo,
				        genero      = :genero,
				        descripcion = :desc,
				        disponibles = :disp,
				        stock       = :stock,
				        precio      = :precio
				 WHERE  cod_pelicula = :id";

		$stmt = DB::getStatement($query);

		$stmt->bindParam(":titulo", $this->getTitulo(), PDO::PARAM_STR);
		$stmt->bindParam(":genero", $this->getGenero(), PDO::PARAM_STR);
		$stmt->bindParam(":desc",   $this->getDescripcion(), PDO::PARAM_STR);
		$stmt->bindParam(":disp",   $this->getDisponibles(), PDO::PARAM_INT);
		$stmt->bindParam(":stock",  $this->getStock(), PDO::PARAM_INT);
		$stmt->bindParam(":precio", $this->getPrecio(), PDO::PARAM_STR);
		$stmt->bindParam(":id",     $this->getCodigo(), PDO::PARAM_INT);

		if($stmt->execute()) {
			return true;
		}
		return false;
	}

	public function borrar() {
		$query = "DELETE FROM peliculas
				  WHERE cod_pelicula = :id";

		$stmt = DB::getStatement($query);

		$stmt->bindParam(":id",     $this->getCodigo(), PDO::PARAM_INT);

		if($stmt->execute()) {
			return true;
		}
		return false;
	}

	public function esPeliculaValida() {
		$valida = true;
		if(empty($this->titulo)) {
			$valida = false;
		}
		if(empty($this->genero)) {
			$valida = false;
		}
		if(empty($this->descripcion)) {
			$valida = false;
		}
		if(empty($this->precio)) {
			$valida = false;
		}

		return $valida;
	}

	/***** BEGIN SETTERS & GETTERS *****/
	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function getGenero() {
		return $this->genero;
	}

	public function setGenero($genero) {
		$this->genero = $genero;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	public function getDisponibles() {
		return $this->disponibles;
	}

	public function setDisponibles($disponibles) {
		$this->disponibles = $disponibles;
	}

	public function getStock() {
		return $this->stock;
	}

	public function setStock($stock) {
		$this->stock = $stock;
	}

	public function getPrecio() {
		return $this->precio;
	}

	public function setPrecio($precio) {
		$this->precio = $precio;
	}
	/***** END SETTERS & GETTERS *****/
}
