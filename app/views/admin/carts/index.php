<?php include_once(VIEWS . 'header.php')?>

<div class="card p-4 bg-light">
    <div class="card-header">
        <h1 class="text-center">Ventas por usuario y dia</h1>
    </div>
    <div class="card-body">
        <table class="table-table-stripped text-center" width="100%">
            <thead>
                <th>Id</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th>Descuento</th>
                <th>Envio</th>
                <th>Total</th>
                <th>Detalle</th>
            </thead>
            <tbody>
                <?php foreach($data['data'] as $sale): ?>
                    <tr>
                        <td class="text-center"><?= $sale->user_id ?></td>
                        <td class="text-center"><?= substr($sale->date, 0, 10) ?></td>
                        <td class="text-center"><?= number_format($sale->cost, 2) ?></td>
                        <td class="text-center"><?= number_format($sale->discount,2) ?></td>
                        <td class="text-center"><?= number_format($sale->send, 2) ?></td>
                        <td class="text-center"><?= number_format($sale->cost - $sale->discount + $sale->send, 2) ?></td>
                        <td><a href="<?= ROOT ?>cart/show/<?= $sale->date ?>/<?= $sale->user_id ?>" class="btn btn-outline-info">Detalles</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <a href="<?= ROOT ?>cart/chartDailySales" class="btn btn-outline-success">Grafico de ventas por dia</a>
    </div>
</div>

<?php include_once(VIEWS . 'footer.php')?>