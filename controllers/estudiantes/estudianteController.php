<?php

namespace App\controllers\estudiantes;

use App\controllers\EntityController;
use App\models\Estudiante;

class EstudianteController extends EntityController{

    private $dataTable = 'estudiantes';

    function allData(){
        $sql = "select * from ".$this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if($resultSQL->num_rows >0){
            while($item = $resultSQL->fetch_assoc()){
                $estudiante = new Estudiante();
                $estudiante->set('codigo', $item['codigo']);
                $estudiante->set('nombre', $item['nombre']);
                $estudiante->set('email', $item['email']);
                array_push($lista, $estudiante);
            }
        }
        return $lista;
    }

    function getItem($codigo){
        $sql = "select * from " .$this->dataTable." where codigo=".$codigo;
        $resultSQL = $this->execSql($sql);
        $estudiante = null;
        if($resultSQL->num_rows >0){
            while($item = $resultSQL->fetch_assoc()){
                $estudiante = new Estudiante();
                $estudiante->set('codigo', $item['codigo']);
                $estudiante->set('nombre', $item['nombre']);
                $estudiante->set('email', $item['email']);
                break;
            }
        }
        return $estudiante;
    }

    function addItem($estudiante){
        $codigo = $estudiante->get('codigo');
        $nombre = $estudiante->get('nombre');
        $email = $estudiante->get('email');
        $registro = $this->getItem($codigo);
        if(isset($registro)){
            return "El código ya existe";
        }
        $sql="Insert into ".$this->dataTable."(codigo,nombre,email)value ('$codigo','$nombre','$email')";
        $resultSQL = $this->execSql($sql);
        if(!$resultSQL){
            return "no se guardo";
        }
        return "se guardo con exito";
    }

    function updateItem($estudiante){
        $codigo = $estudiante->get('codigo');
        $nombre = $estudiante->get('nombre');
        $email = $estudiante->get('email');
        $registro = $this->getItem($codigo);
        if(!isset($registro)){
            return "El registro no existe";
        }
        $sql="update " .$this->dataTable."set ";
        $sql .= "nombre='$nombre',";
        $sql .= "email='$email' ";
        $sql .= " where codigo=$codigo";

        $resultSQL = $this->execSql($sql);
        if(!$resultSQL){
            return "no se guardo";
        }
        return "se guardo con exito";
    }

    function deleteItem($codigo){
        $sql = "delete from ".$this->dataTable;
        $sql.=" where codigo= $codigo";
        $resultSQL =$this-> execSql($sql);
        if($resultSQL){
            return"Registro eliminado ";
        }
        return"No se pudo eliminar el registro";
    }
}
?>