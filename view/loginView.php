<div class="container mt-4">
    <h1 class="text-center">Inicio de sesión VideoClub</h1>
    <form method="POST" class="text-center mt-4 p-4 border d-flex align-items-center flex-column" style="width: 400px; margin: auto" action='<?= $_SERVER["PHP_SELF"] ?>'>
        <div class="form-group m-2" style="width: 300px">
            <label for="usr">Usuario</label>
            <input  type="text" class="form-control" id="usr" name="usr" placeholder="Usuario">
            <input type="hidden" id="token" name="token"> 
        </div>
        <div class="form-group m-2" style="width: 300px">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
        </div>
            <!--<input type="hidden" class="form-control" id="token" name="token" value="</*?= $_SESSION['token'] ?*/>">-->
        <button type="submit" class="mt-3 btn btn-primary">Iniciar Sesión</button>
    </form>
</div>
