<?php include_once (VIEWS . 'header.php') ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script src="<?= ROOT ?>js/adminCreateProduct.js"></script>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Alta de un Producto</h1>
        </div>
        <div class="card-body">
            <form action="<?= ROOT ?>AdminProduct/create" method="POST" enctype="multipart/form-data">
                <div class="form-group text-left">
                    <label for="type">Tipo de producto:</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Selecciona el tipo de producto</option>
                        <?php foreach($data['type'] as $type) : ?>
                            <option value="<?= $type->value  ?>"
                            <?= (isset($data['product']['type']) && $data['product']['type'] == $type->value) ? 'SELECTED' : '' ?>
                            ><?= $type->description ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Nombre del produto"
                                value="<?= isset($data['product']['name']) ? $data['product']['name'] : ''?>">
                </div>
                <div class="form-group text-left">
                    <label for="description">Descripcion:</label>
                    <textarea name="description" id="editor" rows="10"><?= isset($data['product']['description']) ? $data['product']['description'] : ''?></textarea>
                </div>


                <div id="book">
                    <div class="form-group text-left">
                        <label for="author">Autor:</label>
                        <input type="text" name="author" id="author" class="form-control" placeholder="Autor del libro"
                               value="<?= isset($data['product']['author']) ? $data['product']['author'] : '' ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="publisher">Editorial:</label>
                        <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Editorial del libro"
                               value="<?= isset($data['product']['publisher']) ? $data['product']['publisher'] : '' ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="pages">Paginas:</label>
                        <input type="text" name="pages" id="pages" class="form-control" placeholder="Paginas del libro"
                               value="<?= isset($data['product']['pages']) ? $data['product']['pages'] : '' ?>">
                    </div>
                </div>
                <div id="course">
                    <div class="form-group text-left">
                        <label for="people">Publico objetivo:</label>
                        <input type="text" name="people" class="form-control" placeholder="A que publico quieres que se dirija?"
                               value="<?= isset($data['product']['people']) ? $data['product']['people'] : '' ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="objetives">Objetivos:</label>
                        <input type="text" name="objetives" class="form-control" placeholder="Objetivos del curso"
                               value="<?= isset($data['product']['objetives']) ? $data['product']['objetives'] : '' ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="necesites">Conocimientos necesarios:</label>
                        <input type="text" name="necesites" class="form-control" placeholder="Conocimientos necesarios previos"
                               value="<?= isset($data['product']['necesites']) ? $data['product']['necesites'] : '' ?>">
                    </div>
                </div>


                <div class="form-group-text left">
                    <label for="price">Precio:</label>
                    <input type="text" name="price" class="form-control" placeholder="Precio del producto | ejemplo: 12.95"
                           pattern="^\d*\d*\.?\d*$"
                           value="<?= isset($data['product']['price']) ? $data['product']['price'] : '' ?>" required>
                </div>
                <div class="form-group-text left">
                    <label for="discount">Discount:</label>
                    <input type="text" name="discount" class="form-control" placeholder="Descuento del producto | ejemplo: 12.95"
                           value="<?= isset($data['product']['discount']) ? $data['product']['discount'] : '' ?>">
                </div>
                <div class="form-group-text left">
                    <label for="send">Gastos de envio:</label>
                    <input type="text" name="send" class="form-control" placeholder="Gastos de envio del producto | ejemplo: 12.95"
                           value="<?= isset($data['product']['send']) ? $data['product']['send'] : '' ?>">
                </div>
                <div class="form-group-text left">
                    <label for="image">Imagen del producto:</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/x-png, image/gif">
                </div>
                <div class="form-group-text left">
                    <label for="published">Fecha de publicacion del producto:</label>
                    <input type="date" name="published" class="form-control" placeholder="Fecha de publicacion (AAAA-MM-DD)"
                           value="<?= isset($data['product']['published']) ? $data['product']['published'] : '' ?>">
                </div>
                <div class="form-group-text left">
                    <label for="relation1">Producto relacionado:</label>
                    <select name="relation1" id="relation1" class="form-control">
                        <option value="">Selecciona un producto relacionado:</option>
                        <?php foreach($data['catalogue'] as $catalogue) : ?>
                            <option value="<?= $catalogue->id  ?>"
                                <?= (isset($data['product']['relation1']) && $data['product']['relation1'] == $catalogue->id) ? 'SELECTED' : '' ?>
                            ><?= $catalogue->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group-text left">
                    <label for="relation2">Producto relacionado:</label>
                    <select name="relation2" id="relation2" class="form-control">
                        <option value="">Selecciona un producto relacionado:</option>
                        <?php foreach($data['catalogue'] as $catalogue) : ?>
                            <option value="<?= $catalogue->id  ?>"
                                <?= (isset($data['product']['relation2']) && $data['product']['relation2'] == $catalogue->id) ? 'SELECTED' : '' ?>
                            ><?= $catalogue->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group-text left">
                    <label for="relation3">Producto relacionado:</label>
                    <select name="relation3" id="relation3" class="form-control">
                        <option value="">Selecciona un producto relacionado:</option>
                        <?php foreach($data['catalogue'] as $catalogue) : ?>
                            <option value="<?= $catalogue->id  ?>"
                                <?= (isset($data['product']['relation3']) && $data['product']['relation3'] == $catalogue->id) ? 'SELECTED' : '' ?>
                            ><?= $catalogue->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group-text left">
                    <label for="status">Estado:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Selecciona un estado:</option>
                        <?php foreach($data['status'] as $status) : ?>
                            <option value="<?= $status->value  ?>"
                            <?= (isset($data['product']['status']) && $data['product']['status'] == $status->value) ? 'SELECTED' : '' ?>
                            ><?= $status->description ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-check text-left">
                    <input type="checkbox" name="mostSold" id="mostsold" class="form-check-input"
                        <?= (isset($data['product']['mostSold']) && $data['product']['mostSold'] == 1) ? 'CHECKED' : ''?>
                    >
                    <label for="mostSold" class="form-check-label">Producto mas vendido</label>
                </div>
                <div class="form-check text-left">
                    <input type="checkbox" name="new" id="new" class="form-check-input"
                        <?= (isset($data['product']['new']) && $data['product']['new'] == 1) ? 'CHECKED' : ''?>
                    >
                    <label for="new" class="form-check-label">Producto nuevo</label>
                </div>

                <div class="form-group text-left">
                    <input type="submit" value="Enviar" class="btn btn-success">
                    <a href="<?= ROOT ?>AdminProduct" class="btn btn-info">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
<?php include_once (VIEWS . 'footer.php') ?>

<script>
    ClassicEditor.create(document.querySelector('#editor')).catch(error => {
        console.error(error);
    });
</script>
