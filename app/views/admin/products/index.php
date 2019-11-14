<?php include_once(VIEWS . 'header.php') ?>

    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Aministracion de productos</h1>
        </div>
        <div class="card-body">
            <table class="table table-strip text-center" width="100%">
                <thead>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </thead>
                <tbody>
                    <?php foreach($data['data'] as $product) : ?>
                        <tr>
                            <td class="text-center"><?= $product->id ?></td>
                            <td class="text-center"><?= $data['type'][$product->type -1]->description ?></td>
                            <td class="text-center"><?= $product->name ?></td>
                            <td class="text-center"><?= html_entity_decode($product->description) ?></td>
                            <td><a href="<?= ROOT ?>AdminProduct/update/<?= $product->id ?>"
                                            class="btn btn-outline-info">Modificar</a></td>
                            <td><a href="<?= ROOT ?>AdminProduct/delete/<?= $product->id ?>"
                                            class="btn btn-outline-warning">Borrar</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?= ROOT ?>AdminProduct/create" class="btn btn-outline-success">Crear Producto</a>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>

<?php include_once(VIEWS . 'footer.php') ?>
