<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub 3.0</title>
</head>
<body>
        <!-- -->
        <form action="login.php" method="POST">
        <!-- Le pido al usuario su usuario y o guardo en la id usuario -->    
        <p>Usuario: <input type="text" name="usuario"></p>
         <!-- Le pido su contraseña y lo guardo en la id password -->   
            <p>Password <input type="password" name="password"></p>
        <!-- Envio los datos-->
        <button type="submit">Entrar</button>
        </form>

        <?php 
            if(isset($_GET['error'])) {
                echo "Usuario o contraseña incorrectos";
            }
        ?>
</body>
</html>