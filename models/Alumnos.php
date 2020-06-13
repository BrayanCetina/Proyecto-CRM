<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumno
 *
 * @author Brayan Cetina
 */
class AlumnoAdmin {

    function create($matricula, $nombre) {

        
        $sql = "INSERT INTO alumnos(matricula,nombre,id_status,id_avisos) VALUES ('" . $matricula . "','$nombre" . "','1','0')";
        $response = getResultSQL($sql);
        if (!$response) {
            return false;
        } else {
            return true;
        }
    }

    function Alumnodelete($matricula) {
        $sql = "UPDATE alumnos SET id_status ='0' WHERE matricula = '" . $matricula . "'";
        $response = getResultSQL($sql);
        if (!$response) {
            return false;
        } else {
            return true;
        }
    }

    function read() {
        $sql = "SELECT nombres, apellido_p, apellido_m, telefono, etapas FROM clientes, etapas_embudo WHERE  clientes.Id_etapas=etapas_embudo.Id_etapas";
        return getResultSQL($sql);
    }

    function desactivar($matricula) {
        $sql = "UPDATE  alumnos SET id_avisos='1' WHERE matricula='" . $matricula . "'";
        $response = getResultSQL($sql);
        if (!$response) {
            return false;
        } else {
            return true;
        }
    }

    function activar($matricula) {
        $sql = "UPDATE  alumnos SET id_avisos='0' WHERE matricula='" . $matricula . "'";
        $response = getResultSQL($sql);
        if (!$response) {
            return false;
        } else {
            return true;
        }
    }

    function validarMatricula($nuevaMatricula) {
        /* $sql = "SELECT matricula FROM alumnos WHERE matricula=('" . $$nuevaMatricula . "')";
          $response = getResultSQL($sql);
          if (!$response) {
          return false;
          } else {
          return true;
          } */
        $result = getFilaSql("alumnos", "matricula", $nuevaMatricula);
        $valor = $result['matricula'];
        return $valor;
    }

    function updateAlumno($ActualMatricula, $nuevaMatricula, $nuevoNombre) {
        $sql = "UPDATE  alumnos SET matricula= '" . $nuevaMatricula . "', nombre='" . $nuevoNombre . "' WHERE matricula= '" . $ActualMatricula . "' ";
        $response = getResultSQL($sql);
        alert($sql);
        if (!$response) {
            return false;
        } else {
            return true;
        }
    }

}
