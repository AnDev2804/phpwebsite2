<?php

class conexion
{
	//------------------------------------------------------------------------
	//ATRIBUTOS
	private $servidor;
	private $usuario;
	private $clave;
	private $bdd;
	private $conex=null;
	//------------------------------------------------------------------------
	//GETTER'S & SETTER'S
	//GETTER'S
	public function getServidor(){return $this->servidor;}
	public function getUsuario(){return $this->usuario;}
	public function getClave(){return $this->clave;}
	public function getBdd(){return $this->bdd;}
	public function getConex(){return $this->conex;}
	//SETTER'S
	public function setServidor($valor){$this->servidor=$valor;}
	public function setUsuario($valor){$this->usuario=$valor;}
	public function setClave($valor){$this->clave=$valor;}
	public function setBdd($valor){$this->bdd=$valor;}
	public function setConex($valor){$this->conex=$valor;}
	//------------------------------------------------------------------------
	//CONSTRUCTOR
	public function __construct($Servidor=null,$Usuario=null,$Clave=null,$Bdd=null)
	{
	 if($Servidor!=null)$this->setServidor($Servidor); else $this->setServidor("localhost");
	 if($Usuario!=null)$this->setUsuario($Usuario); else $this->setUsuario("root");
	 if($Clave!=null)$this->setClave($Clave); else $this->setClave("");
	 if($Bdd!=null)$this->setBdd($Bdd); else $this->setBdd("test");
	 
	 $this->setConex(mysqli_connect($this->getServidor(),$this->getUsuario(),$this->getClave(),$this->getBdd()));
	 
	 if (mysqli_connect_errno()) 
	    {$this->setConex(null);}
	}
	//------------------------------------------------------------------------
	//toString
	public function toString()
	{
		if($this->getConex()==null)
		  return "No Conexion <br>";
		else
		  return "Conexion <br>";
	}
	//------------------------------------------------------------------------
	//METODOS OPERATIVOS
	//------------------------------------------------------------------------
    public function validaringresopaciente($email,$password)
    {
        $sql="SELECT P.EMAILPACIENTE, P.CLAVE, P.IDRIF FROM PACIENTE P
            WHERE P.EMAILPACIENTE = '$email'
            AND P.CLAVE = '$password';";
        $result=mysqli_query($this->getConex(),$sql);
        mysqli_close($this->getConex());
        return $result;
    }
	public function validaringresoempleado($email,$password)
    {
        $sql="SELECT E.EMAILESP, E.CLAVEESP, E.IDESP, E.CODESP FROM EMPLEADO E
            WHERE E.EMAILESP = '$email'
            AND E.CLAVEESP = '$password';";
        $result=mysqli_query($this->getConex(),$sql);
        mysqli_close($this->getConex());
        return $result;
    }
    public function estado($ci)
    {
        $sql="SELECT P.CODESTADO, P.APEPAC1 FROM PACIENTE P
        WHERE $ci = P.IDRIF";
        $result=mysqli_query($this->getConex(),$sql);
        mysqli_close($this->getConex());
        return $result;
    }
    public function regperfil($ci,$tsangre,$fsangre,$est,$pes,$faler,$fcon,$fmot)
    {
		$sql="INSERT INTO PERFILPAC VALUES('$ci','$tsangre','$fsangre','$faler','$fcon','$fmot',$est,$pes);";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
    }
	public function updateestado($ci)
	{
		$sql="UPDATE PACIENTE SET CODESTADO = 2
		WHERE PACIENTE.IDRIF = '$ci';";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function buscarpac($ci)
	{
		$sql="SELECT P.IDRIF, P.EMAILPACIENTE, P.APEPAC1, P.APEPAC2, P.NOMBPAC1, P.NOMBPAC2, P.FECHANACPACIENTE, P.TELEFONOPACIENTE, P.SEXO FROM PACIENTE P
		WHERE P.IDRIF = '$ci';";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
	}
	public function actualizarpaciente($ci,$email,$ape1,$ape2,$nomb1,$nomb2,$ntel,$fnac,$sex)
    {
        $sql="UPDATE PACIENTE SET EMAILPACIENTE='$email',APEPAC1='$ape1',APEPAC2='$ape2',NOMBPAC1='$nomb1',NOMBPAC2='$nomb2',TELEFONOPACIENTE='$ntel', FECHANACPACIENTE='$fnac', SEXO='$sex'
		WHERE PACIENTE.IDRIF=$ci";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
    }
	public function buscarcitas($ci)
	{
		$sql="SELECT C.IDRIF, C.FECHACITA, ESP.DESCESP, C.CODESPTA, C.OBSERV, C.DIAGNOS, T.DESCTRAT, C.NCITA, C.COSTO FROM CITAS C, ESPECIALIDAD ESP, TRATAMIENTO T
		WHERE C.IDRIF = '$ci'
		AND C.CODESP = ESP.CODESP
		AND C.CODTRAT = T.CODTRAT;";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
	}
	public function eliminarpac($ci)
	{
		$sql="DELETE FROM PACIENTE WHERE IDRIF = '$ci'";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function citapendiente($numero,$ci,$fcita,$espec)
	{
		$sql="INSERT INTO CITASPEND VALUES($numero,'$ci','$fcita',$espec);";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function cantcitas($codesp)
	{
		$sql="SELECT COUNT(C.CODESPDAD) FROM CITASPEND C, PACIENTE P, ESPECIALIDAD E
		WHERE C.CODESPDAD = $codesp
        AND P.IDRIF = C.IDRIF
        AND C.CODESPDAD = E.CODESP;";
        $result=mysqli_query($this->getConex(),$sql);
        mysqli_close($this->getConex());
        return $result;
	}
	public function citaspend($codesp)
	{
		$sql="SELECT C.IDCITA ,P.IDRIF, C.FECHA, E.DESCESP, P.APEPAC1, P.NOMBPAC1, P.EMAILPACIENTE, P.TELEFONOPACIENTE, P.SEXO FROM CITASPEND C, PACIENTE P, ESPECIALIDAD E
		WHERE C.CODESPDAD = $codesp
        AND P.IDRIF = C.IDRIF
        AND C.CODESPDAD = E.CODESP;";
        $result=mysqli_query($this->getConex(),$sql);
        mysqli_close($this->getConex());
        return $result;
	}
	public function aceptarcita($idcita)
	{
		$sql="DELETE FROM CITASPEND WHERE IDCITA=$idcita";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function registrarcita($ci,$fcita,$codesp,$ciesp,$observ,$diag,$codtrat,$ncita,$costo)
	{
		$sql="INSERT INTO CITAS VALUES('$ci','$fcita',$codesp,'$ciesp','$observ','$diag',$codtrat,$ncita,$costo)";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function eliminarcita($idcita)
	{
		$sql="DELETE FROM CITASPEND WHERE IDCITA = $idcita";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function numcita()
	{
		$sql="SELECT C.IDCITA FROM CITASPEND C";
		$result=mysqli_query($this->getConex(),$sql);
        mysqli_close($this->getConex());
        return $result;
	}
	public function ncita($idcita,$ci,$fecha,$codespdad)
	{
		$sql="INSERT INTO CITASPEND VALUES($idcita,$ci,'$fecha',$codespdad)";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function numemergencia()
	{
		$sql1="SELECT E.IDEMER FROM EMERGENCIA E";
		$result=mysqli_query($this->getConex(),$sql1);
		return $result;
	}
	public function regemergencia($id,$desc)
	{
		$sql2="INSERT INTO EMERGENCIA VALUES($id,'$desc')";
		try 
		{
			mysqli_query($this->getConex(),$sql2);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function constancia($factual,$codesp,$ci)
	{
		$sql="SELECT P.APEPAC1, P.NOMBPAC1, C.FECHACITA, ES.DESCESP FROM PACIENTE P, CITAS C, ESPECIALIDAD ES
		WHERE P.IDRIF = '$ci'
		AND C.IDRIF = '$ci'
		AND ES.CODESP = $codesp
		AND C.FECHACITA = '$factual'";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
	}
	public function constancia2($codesp,$ci)
	{
		$sql="SELECT P.APEPAC1, P.NOMBPAC1, ES.DESCESP FROM PACIENTE P, CITAS C, ESPECIALIDAD ES
		WHERE P.IDRIF = '$ci'
		AND C.IDRIF = '$ci'
		AND ES.CODESP = $codesp";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
	}
	public function contratmto()
	{
		$sql="SELECT T.CODTRAT, T.DESCTRAT FROM TRATAMIENTO T";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
	}
	public function regtrat($cod,$nomb)
	{
		$sql2="INSERT INTO TRATAMIENTO VALUES($cod,'$nomb')";
		try 
		{
			mysqli_query($this->getConex(),$sql2);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function regemp($empci,$empcorreo,$emppass,$empAp1,$empAp2,$empNo1,$empNo2,$esp,$Fini,$Ffin,$dact,$titref,$sex,$ntel)
	{
		if($empNo2==''&&$empAp2=='')
		{
			$empNo2==null;$empAp2==null;
		}
		$sql="INSERT INTO EMPLEADO VALUES('$empci','$empcorreo','$emppass','$empAp1','$empAp2','$empNo1','$empNo2',$esp,'$Fini','$Ffin','$dact','$titref','$sex','$ntel')";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function buscaremp($ci)
	{
		$sql="SELECT E.IDESP,E.EMAILESP,E.CLAVEESP,E.ESPA1,E.ESPA2,E.ESPN1,E.ESPN2,ES.DESCESP,E.FINIC,E.FFIN,E.DACT,E.TITREF,E.SEXOESP,E.TELEFONOESP FROM EMPLEADO E, ESPECIALIDAD ES
		WHERE E.IDESP = '$ci'
		AND E.CODESP = ES.CODESP;";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
	}
	public function actualizaremp($empci,$empcorreo,$emppass,$empAp1,$empAp2,$empNo1,$empNo2,$esp,$Fini,$Ffin,$dact,$titref,$sex,$ntel)
	{
		$sql="UPDATE `empleado` SET `idEsp`='$empci',`emailEsp`='$empcorreo',`claveEsp`='$emppass',`espA1`='$empAp1',`espA2`='$empAp2',`espN1`='$empNo1',`espN2`='$empNo2',`codesp`=$esp,`Finic`='$Fini',`Ffin`='$Ffin',`DAct`='$dact',`TitRef`='$titref',`sexoEsp`='$sex',`telefonoEsp`='$ntel' WHERE EMPLEADO.IDESP = $empci";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function eliminaremp($ci)
	{
		$sql="DELETE FROM EMPLEADO WHERE IDESP = '$ci'";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function buscaremail($email)
	{
		$sql="SELECT P.EMAILPACIENTE FROM PACIENTE P
		WHERE P.EMAILPACIENTE = '$email'";
		$result=mysqli_query($this->getConex(),$sql);
		$linea=mysqli_fetch_array($result);
		if($linea==null)
		{
			$sql="SELECT E.EMAILESP FROM EMPLEADO E
			WHERE E.EMAILESP = '$email'";
			$result=mysqli_query($this->getConex(),$sql);
			return $result;
			mysqli_close($this->getConex());
		}
		else
		{
			$sql="SELECT P.EMAILPACIENTE FROM PACIENTE P
			WHERE P.EMAILPACIENTE = '$email'";
			$result=mysqli_query($this->getConex(),$sql);
			return $result;
			mysqli_close($this->getConex());
		}
		mysqli_close($this->getConex());
	}
	public function actcon($email,$password)
	{
		$sql="SELECT P.EMAILPACIENTE FROM PACIENTE P
		WHERE P.EMAILPACIENTE = '$email'";
		$result=mysqli_query($this->getConex(),$sql);
		$linea=mysqli_fetch_array($result);
		if($linea==null)
		{
			$sql="UPDATE EMPLEADO SET EMPLEADO.CLAVEESP = '$password'
			WHERE EMPLEADO.EMAILESP = '$email';";
			try 
			{
				mysqli_query($this->getConex(),$sql);
				return true;
			}
			catch(Exception $e) 
			{  		    
				return false;
			}
			finally
			{
				mysqli_close($this->getConex());	
			}
		}
		else
		{
			$sql="UPDATE PACIENTE SET PACIENTE.CLAVE = '$password'
			WHERE PACIENTE.EMAILPACIENTE = '$email';";
			try 
			{
				mysqli_query($this->getConex(),$sql);
				return true;
			}
			catch(Exception $e) 
			{  		    
				return false;
			}
			finally
			{
				mysqli_close($this->getConex());	
			}
		}
		mysqli_close($this->getConex());
	}
	public function buscarpacreg($ci)
	{
		$sql="SELECT P.IDRIF, P.EMAILPACIENTE,P.APEPAC1,P.APEPAC2,P.NOMBPAC1,P.NOMBPAC2,P.FECHANACPACIENTE,P.TELEFONOPACIENTE,P.SEXO,
		PR.TIPOSANGRE,PR.FACTORSANGRE,PR.FACTORALERGICO,PR.FACTORCONGENITO,PR.FACTORMOTRIZ,PR.ESTATURA,PR.PESO FROM PACIENTE P, PERFILPAC PR
		WHERE P.IDRIF='$ci'
		AND PR.IDRIF='$ci';";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
		mysqli_close($this->getConex());
	}
	public function actpac($cior,$ci,$email,$ap1,$ap2,$no1,$no2,$fnac,$ntel,$sex)
	{
		$sql="UPDATE PACIENTE P SET P.IDRIF = '$ci', P.EMAILPACIENTE='$email',P.APEPAC1='$ap1',P.APEPAC2='$ap2',P.NOMBPAC1='$no1',P.NOMBPAC2='$no2',
		P.FECHANACPACIENTE='$fnac',P.TELEFONOPACIENTE='$ntel',P.SEXO='$sex'
		WHERE P.IDRIF='$cior';";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function actperf($cior,$ci,$tsangre,$fsangre,$falerg,$fcong,$fmot,$est,$peso)
	{
		$sql="UPDATE PERFILPAC PR SET PR.IDRIF='$ci',PR.TIPOSANGRE='$tsangre',PR.FACTORSANGRE='$fsangre',PR.FACTORALERGICO='$falerg',
		PR.FACTORCONGENITO='$fcong',PR.FACTORMOTRIZ='$fmot',PR.ESTATURA=$est,PR.PESO=$peso
		WHERE PR.IDRIF='$cior';";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	public function conemerg()
	{
		$sql="SELECT *  FROM EMERGENCIA
		LIMIT 15;";
		$result=mysqli_query($this->getConex(),$sql);
		return $result;
		mysqli_close($this->getConex());
	}
	public function elimemerg($id)
	{
		$sql="DELETE FROM EMERGENCIA WHERE IDEMER = $id";
		try 
		{
			mysqli_query($this->getConex(),$sql);
			return true;
		}
		catch(Exception $e) 
		{  		    
			return false;
		}
		finally
		{
			mysqli_close($this->getConex());	
		}
	}
	//------------------------------------------------------------------------
	//------------------------------------------------------------------------
}// FIN DE LA CLASE

?>