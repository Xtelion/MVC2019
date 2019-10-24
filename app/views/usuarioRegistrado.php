<?php include_once 'header.php' ?>


<h2 class="text-center"><?= $data['subtitle'] ?></h2>

<div class="alert alert-<?= $data['alert'] ?> mt-3">
    <h4><?= $data['text'] ?></h4>
</div>

<a href="<?= ROOT . $data['url'] ?>" class="btn btn-outline-success">Inicio</a>


<?php include_once 'footer.php' ?>
