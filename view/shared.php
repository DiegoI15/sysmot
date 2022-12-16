<?php
class Shared
{
    public static function showTitle($title)
    { ?>
        <div class="container">
            <h1> <?php echo ($title) ?></h1>
            <hr>
        </div>
    <?php }

    public static function showMessage($url, $dni)
    { ?>
        <div class="container text-center ">
            <label> Se va a eliminar el registro, ¿Desea continuar?</label>
            <a href="<?php echo ($url) ?>?action=delete&id=<?php echo ($dni) ?>&conf=1" class="btn btn-secondary">Sí</a>
            <a href="<?php echo ($url) ?>?action=delete&id=<?php echo ($dni) ?>&conf=0" class="btn btn-danger">No</a>
        </div>
<?php }
}
