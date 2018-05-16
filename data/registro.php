<?php
    include_once("conexion.php");

    $existe = 0;
    $existeEmail = 0;

    $txtnombres     = $_POST["nombres"];
    $txtapellidos   = $_POST["apellidos"];
    $txtfecha_nac   = $_POST["fecha_nac"];
    $txtemail       = $_POST["email"];
    $txtdistrito    = $_POST["distrito"];
    $selsexo        = $_POST["sexo"];
    $telefono       = $_POST["telefono"];

    $sqlexiste = $PDO -> prepare("SELECT nombres, apellidos FROM sorteo_mayo_2018 WHERE nombres = :nombrese AND apellidos = :apellidose");
    $sqlexiste->bindParam(":nombrese", $txtnombres);
    $sqlexiste->bindParam(":apellidose", $txtapellidos);
    $sqlexiste->execute();
    $row_existe = $sqlexiste->rowCount();
    
    $fecha_registro = date("Y-m-d H:i:s");

    if ($row_existe != 0) {
        echo "existes";
    }
    else{
        $sqlexisteEmail = $PDO -> prepare("SELECT email FROM sorteo_mayo_2018 WHERE email = :email");
        $sqlexisteEmail->bindParam(":email", $txtemail);
        $sqlexisteEmail->execute();
        $row_existeEmail = $sqlexisteEmail->rowCount();


        if($row_existeEmail != 0){
            echo "emailexiste";
        }
        else{
            $sql = $PDO -> prepare("INSERT INTO sorteo_mayo_2018( nombres, apellidos, fecha_nac, email, telefono, distrito, sexo, fecha_registro ) VALUES ( :nombres, :apellidos, :fecha_nac, :email, :telefono, :distrito, :sexo, :fecha_registro)");

            $sql->bindParam(":nombres", $txtnombres);
            $sql->bindParam(":apellidos", $txtapellidos);
            $sql->bindParam(":fecha_nac", $txtfecha_nac);
            $sql->bindParam(":email", $txtemail);
            $sql->bindParam(":telefono", $telefono);
            $sql->bindParam(":distrito", $txtdistrito);
            $sql->bindParam(":sexo", $selsexo);
            $sql->bindParam(":fecha_registro", $fecha_registro);
            // $sql->bindParam(":respuesta", $txtrespuesta);
            $sql->execute();

            echo "listo";
        }

    }
?>