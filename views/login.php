<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src='../js/bootstrap.min.js'></script><!--estilos-->
    <link rel="stylesheet" type="text/css" href='../css/bootstrap.min.css'><!--estilos-->
    <script type="text/javascript" src='../js/all.min.js'></script><!--colocar iconos ya defininos-->
    <title>Login</title>
</head>
<body style="background: url(../img/disco_raro.gif);">
    <!--<form action="../controllers/Empleado.controlador.php?orden=loguear" method="POST">
        <label for="username">Username</label>
        <input type="text" maxlength="15" size="15" name="username">
        <label for="pass">Password</label>
        <input type="password" maxlength="15" size="15" name="pass">
        <select name="cargo">
            <option value="Recepcionista">Recepcionista</option>
            <option value="Tecnico">Tecnico</option>
            <option value="Gerente">Gerente</option>
        </select>
        <input type="submit" value="Iniciar Sesión">
    </form> -->
    <div class="container mt-5" style="text-align: center; width: 400px; border: 7px solid rgb(238, 255, 0); border-radius: 15px;">
    <i class="fas fa-user-tie fa-10x mt-4 mb-4" style="color:rgb(0, 255, 240);"></i>
    
    <form action='../controllers/Empleado.controlador.php?orden=loguear' method="POST">
        <h1 style="color:rgb(238, 255, 0)">SISTEMA WEB CEC</h1>
        <div class="form-row mt-2">
            <label class="col-form-label" for="user" style="color:white; font-weight: bold;">USERNAME:</label>
            <div class="form-group">
                <input type="text" class="form-control ml-3" placeholder="Ingrese usuario" name="username">
            </div>
        </div>
        <div class="form-row">
            <label class="col-form-label ml-1" for="pass" style="color:white; font-weight: bold;">PASSWORD:</label>
            <div class="form-group">
                <input type="password" class="form-control ml-3" placeholder="Ingrese contraseña" name="pass">
            </div>
        </div>
        <div class="form-row">
            <label class="col-form-label ml-1 mr-4" for="pass" style="color:white; font-weight: bold;">INGRESAR COMO:</label>
            <div class="form-group col-md-5">
                <select class="form-control" id='cargo' name="cargo">
                    <option value="Recepcionista">Recepcionista</option>
                    <option value="Tecnico">Tecnico</option>
                    <option value="Gerente">Gerente</option>
                </select>
            </div>
        </div>
        <input class="btn btn-dark mb-5" type="submit" name='btnLogin' value="Iniciar Sesión">
    </form>
</div>
</body>
</html>