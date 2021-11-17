<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Realizar Conexion a BD
// Realizar consulta SQL
class alumnos {

    public $id;
    public $nombre;
    public $sexo;

    public function __construct($id, $Nombre, $Territorio) {
        $this->id     = $id;
        $this->nombre = $Nombre;
        $this->sexo   = $Territorio;
    }

    public static function consultar() {
        include ('conexion.php');
        $consulta = "select * from ciudades";
        echo ('<br>');
        // echo ($consulta);
        $resultado = mysqli_query($mysqli, $consulta);
        if (!$resultado) {
            echo 'No pudo Realizar la consulta a la base de datos';
            exit;
        }
        $listaAlumnos = [];
        while ($alumno = mysqli_fetch_array($resultado)) {
            $listaAlumnos[] = new alumnos($alumno['id'], $alumno['Nombre'], $alumno['Territorio']);
        }
        return $listaAlumnos;
    }

}

?>
