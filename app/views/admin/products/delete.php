<?php include_once (VIEWS . 'header.php')?>

    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Alta de un Producto</h1>
        </div>
        <div class="card-body">
            <form action="<?= ROOT ?>AdminProduct/delete/<?= $data['product']->id ?>" method="POST">
                <div class="form-group text-left">
                    <label for="type">Tipo de producto:</label>
                    <select name="type" id="type" class="form-control" disabled>
                        <option value="">Selecciona el tipo de producto</option>
                        <?php foreach($data['type'] as $type) : ?>
                            <option value="<?= $type->value  ?>"
                                <?= (isset($data['product']->type) && $data['product']->type == $type->value) ? 'SELECTED' : '' ?>
                            ><?= $type->description ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" disabled placeholder="Nombre del produto"
                           value="<?= isset($data['product']->name) ? $data['product']->name : ''?>">
                </div>

                <div class="form-group-text left">
                    <label for="price">Precio:</label>
                    <input type="text" name="price" class="form-control" placeholder="Precio del producto | ejemplo: 12.95"
                           pattern="^\d*\d*\.?\d*$"
                           value="<?= isset($data['product']->price) ? $data['product']->price : '' ?>" disabled>
                </div>


                <div class="form-group text-left">
                    <input type="submit" value="Eliminar" class="btn btn-outline-warning">
                    <a href="<?= ROOT ?>AdminProduct" class="btn btn-info">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

<?php include_once (VIEWS . 'footer.php')?>