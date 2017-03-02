<?php

//REEMPLAZAR EL NOMBRE DE LA CLASE CON LO QUE SE PIDA EN LA CONSIGNA

class claseABM
{	
	public $key;
	public $atributo1;
	public $atributo2;
	public $atributo3;
	public $atributon;
	
	public static function TraerTodosABM()
	{
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$sql = "SELECT *
				FROM tabla_abm";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		return $consulta->fetchall();
		
	}

	public static function TraerUnicoABM($objetoABM)
	{
		

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta = $objetoAccesoDato->RetornarConsulta('SELECT * FROM tabla_abm WHERE primary_key =:key');
		$consulta->bindValue(':key',$objetoABM->key,PDO::PARAM_INT);
		$consulta->execute();

		return 	$consulta->fetchall();
		
	}


	public static function IngresarABM($objetoABM)
	{
		
		

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta =$objetoAccesoDato->RetornarConsulta('INSERT INTO tabla_abm(atributo1,atributo2,atributo3,atributon) VALUES (:at1,:at2,:at3,:atn)');

		$consulta->bindValue(':at1',$objetoABM->atributo1, PDO::PARAM_INT);
		$consulta->bindValue(':at2',$objetoABM->atributo2, PDO::PARAM_INT);
		$consulta->bindValue(':at3',$objetoABM->atributo3, PDO::PARAM_INT);
		$consulta->bindValue(':atn',$objetoABM->atributon, PDO::PARAM_INT);
		$consulta->execute();

		return "si";		
		
	}

	public static function BorrarABM($objetoABM)
	{
		
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta('DELETE FROM tabla_abm WHERE primary_key = :at1');
		$consulta->bindValue(':at1', $objetoABM->key, PDO::PARAM_INT);
		$consulta->execute();

		return "si";

		
	
	}

	public static function ModificarABM($objetoABM)
	{
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta =$objetoAccesoDato->RetornarConsulta('UPDATE tabla_abm 
															SET atributo1 = :at1,
															    atributo2 = :at2,
																atributo3 = :at3,
																atributon = :atn 
															WHERE primary_key = :key');
		$consulta->bindValue(':key',		  $objetoABM->key      , PDO::PARAM_INT);
		$consulta->bindValue(':at1',		  $objetoABM->atributo1, PDO::PARAM_INT);
		$consulta->bindValue(':at2',   		  $objetoABM->atributo2, PDO::PARAM_INT);
		$consulta->bindValue(':at3',   		  $objetoABM->atributo3, PDO::PARAM_INT);
		$consulta->bindValue(':atn',   		  $objetoABM->atributon, PDO::PARAM_INT);
		$consulta->execute();
		
		return "si";
	
	}

}