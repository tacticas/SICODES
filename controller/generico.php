<?php

class Generico
{
	public function rutaRandom(){
		$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
			$random = rand(1, 9999);
			$fecha .= $random;
			return $fecha;
	}

}