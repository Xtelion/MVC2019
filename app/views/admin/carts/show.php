<?php include_once(VIEWS . 'header.php')?>

    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Detalle de venta</h1>
        </div>
        <div class="card-body">
            <table class="table-table-stripped text-center" width="100%">
                <thead>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Descuento</th>
                <th>Envio</th>
                <th>Total</th>
                </thead>
                <tbody>
                <?php foreach($data['data'] as $sale): ?>
                    <tr>
                        <td class="text-center"><?= $sale->name ?></td>
                        <td class="text-center"><?= substr($data['date'], 0, 10) ?></td>
                        <td class="text-center"><?= number_format($sale->price, 2) ?></td>
                        <td class="text-center"><?= number_format($sale->quantity,2) ?></td>
                        <td class="text-center"><?= number_format($sale->discount, 2) ?></td>
                        <td class="text-center"><?= number_format($sale->send, 2) ?></td>
                        <td class="text-center"><?= number_format($sale->price * $sale->quantity + $sale->send - $sale->discount, 2) ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <a href="<?= ROOT ?>cart/sales" class="btn btn-outline-success">Volver</a>
        </div>
    </div>

<?php include_once(VIEWS . 'footer.php')?>