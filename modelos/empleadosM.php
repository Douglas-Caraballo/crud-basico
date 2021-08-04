<?php

require_once "conexionBD.php";

class EmpleadosM extends ConexionBD{

    //registar empleados

    static public function RegistrarEmpleadosM($datosC, $tablaBD){

        $pdo= ConexionBD::cBD()-> prepare("INSERT INTO $tablaBD (nombre, apellido, email, puesto, salario) VALUES
        (:nombre, :apellido, :email, :puesto, :salario) ");

        $pdo ->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo ->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo ->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo ->bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo ->bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }else{
            return "Error";
        }
        $pdo -> close();
    }

    //Mostrar Empleados

    static public function MostrarEmpleadosM($tablaBD){

        $pdo= ConexionBD::cBD()-> prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD");
        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();

    }

    //Editar Empleados

    static public function EditarEmpleadoM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()-> prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD WHERE
        id = :id");

        $pdo -> bindParam(":id",$datosC, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo ->fetch();

        $pdo -> close();
    }

}