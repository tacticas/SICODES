<?php 
	class Mensaje {
		// DB stuff
		private $conn;
		private $table = 'mensaje';

		// properties
		public $id;
		public $rx;
		public $tx;
		public $rx_name;
		public $tx_name;
		public $titulo;
		public $msg;
		public $status;
		public $crated_at;
		
		
		//construct with DB
		public function __construct($db){
			$this->conn = $db;
			
		}	

		//get posts
		public function read(){
			//create query
			$query  = 'SELECT t.nombre as tx_name,
					r.nombre as rx_name, 
					m.id,
					m.tx,
					m.rx,
					m.titulo,
					m.msg,
					m.status,
					m.created_at
					FROM
				  	'.$this->table.' m
					LEFT JOIN 
					  alumno t ON m.tx = t.idAlumno
					JOIN 
            alumno r ON m.rx = r.idAlumno
          ORDER BY
            m.created_at DESC';
		//preapare  Statement
	
		$stmt = $this->conn->prepare($query);
		
		// Execute query
		$stmt->execute();
		
		return $stmt;
		
		}

	}
