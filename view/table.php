<?php
class Table
{
    public static function show($header, $rows, $url, $estado = -1, $id = 1)
    { ?>
        <style>
            .datos {
                border: 1px solid #ccc;
                padding: 10px;
                font-size: 1em;
            }

            .datos tr:nth-child(even) {
                background: #ccc;
            }

            .datos td {
                padding: 5px;
            }

            .datos tr.noSearch {
                background: White;
                font-size: 0.8em;
            }

            .datos tr.noSearch td {
                padding-top: 10px;
                text-align: right;
            }

            .hide {
                display: none;
            }

            .red {
                color: Red;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Buscar</span>
                        </div>
                        <input id="searchTerm" type="text" class="form-control" onkeyup="doSearch()">
                    </div>
                </div>
            </div>

            <table class="table table-striped" id="datos">
                <thead>
                    <tr>
                        <?php foreach ($header as $head) { ?>
                            <th scope="col"><?php echo ($head) ?></th>
                        <?php } ?>
                        <td>
                            <a href="<?php echo ($url) ?>?action=new" class="btn btn-primary">Nuevo</a>
                        </td>
                    </tr>

                </thead>
                <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <?php for ($i = 0; $i < count($row); $i++) {
                                    if ($estado == $i) { ?>
                                        <td>
                                            <?php if ($row[$i] == 1) { ?>
                                                <span class="badge badge-success">Habilitado</span>
                                            <?php } else { ?><span class="badge badge-danger">Deshabilitado</span>
                                            <?php } ?>
                                        </td>
                                    <?php } else { ?>
                                        <td><?php echo ($row[$i]) ?>
                                        </td>
                                    <?php } ?>

                                <?php } ?>
                                <td>
                                    <a href="<?php echo ($url) ?>?action=edit&id=<?php echo ($row[$id]) ?>" class="btn btn-secondary">Editar</a>
                                    <a href="<?php echo ($url) ?>?action=delete&id=<?php echo ($row[$id]) ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr class='noSearch hide'>
                            <td colspan="<?php echo (count($header)) ?>"></td>
                        </tr>
                    </tbody>
                </div>
            </table>
        </div>
        <script>
            function doSearch() {
                const tableReg = document.getElementById('datos');
                const searchText = document.getElementById('searchTerm').value.toLowerCase();
                let total = 0;
                for (let i = 1; i < tableReg.rows.length; i++) {
                    if (tableReg.rows[i].classList.contains("noSearch")) {
                        continue;
                    }
                    let found = false;
                    const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                    for (let j = 0; j < cellsOfRow.length && !found; j++) {
                        const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                        if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                            found = true;
                            total++;
                        }
                    }
                    if (found) {
                        tableReg.rows[i].style.display = '';
                    } else {
                        tableReg.rows[i].style.display = 'none';
                    }
                }

                const lastTR = tableReg.rows[tableReg.rows.length - 1];
                const td = lastTR.querySelector("td");
                lastTR.classList.remove("hide", "red");
                if (searchText == "") {
                    lastTR.classList.add("hide");
                } else if (total) {
                    td.innerHTML = "Se ha encontrado " + total + " coincidencia" + ((total > 1) ? "s" : "");
                } else {
                    lastTR.classList.add("red");
                    td.innerHTML = "No se han encontrado coincidencias";
                }
            }
        </script>
<?php }
}
