<?php
    include 'calendario.php';
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset=UTF-8>
        <title>Calendário</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
	    <div class="calendario">
	     <?php
	         organizarCalendario($mes, $ano);
	     ?>
	    </div>
    </body>
</html>
