<?php
class FormUser
{
    public static function show($roles, $document = "", $data = null)
    {
        $path = $document != "" ? "?action=edit&conf=1" : "?action=new&conf=1";  ?>

        <form action="../Controller/UserController.php<?php echo ($path) ?>" method="POST">
            <div class="container">
                <label for="">Datos personales</label>
                <div class="row">
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Nombres</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombres" name="nombre" maxlength="50" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Apellido Paterno</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Apellido Paterno" name="apPaterno" maxlength="50" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Apellido Materno</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Apellido Materno" name="apMaterno" maxlength="50" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Documento</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Documento" name="documento" maxlength="8" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Correo</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Correo" name="correo" maxlength="50" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Número</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Número" name="numero" maxlength="9" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                </div>

                <label for="">Credenciales y privilegios</label>
                <div class="row">
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Usuario</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Usuario" name="usuario" maxlength="20" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="activo" value="1">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" value="Habilitado" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="reset" value="1">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" value="Restablecer contraseña" disabled>
                        </div>
                    </div>
                </div>

                <label for="">Roles</label>
                <div class="row">
                    <?php foreach ($roles as $rol) { ?>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" value="<?php echo ($rol[0]) ?>" name="<?php echo ($rol[1]) ?>">
                                    </div>
                                </div>
                                <input type=" text" class="form-control" aria-label="Text input with checkbox" value="<?php echo ($rol[1]) ?>" disabled>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <input type="submit" class="btn btn-secondary" value="Guardar">
                <a href="../Controller/UserController.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
<?php }
}
