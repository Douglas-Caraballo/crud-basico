<?php

	session_start();

	if(!$_SESSION["Ingreso"]){
		header("location:Index.php?ruta=ingreso");
		exit();
	}

?>
	<br>
	<h1>EDITAR UN EMPLEADO</h1>

	<form method="post">

        <?php

            $editar = new EmpleadosC();
            $editar -> EditarEmpleadoC();
        ?>

	</form>