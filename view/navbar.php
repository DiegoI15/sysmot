<?php
class Navbar
{
    public static function show($ubicacion, $rutas)
    { ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">SysMot</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php foreach ($rutas as $ruta) { ?>
                        <li class="nav-item <?php echo ($ruta["path"] == $ubicacion ? "active" : "") ?>">
                            <a class="nav-link" href="../Controller<?php echo ($ruta["path"]) ?>"> <?php echo ($ruta["label"]) ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
<?php }
}
