<?php include_once (VIEWS . 'header.php') ?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1><?= $data['title'] ?></h1>
        </div>
        <div class="card-body">
            <?php foreach ($data['search'] as $key => $product) : ?>
                <?php if($key%4 == 0): ?>
                    <div class="row">
                <?php endif ?>
                <div class="card pt-2 col-sm-3">
                    <img src="../img/<?= $product->image ?>" alt="<?= $product->name ?>" class="img-responsive" style="width: 100%">
                    <a href="<?= ROOT ?>shop/show/<?= $product->id ?>"><?= $product->name ?></a>
                </div>
                <?php if(($key+1)%4 == 0): ?>
                    </div>
                <?php endif ?>

            <?php endforeach ?>
        </div>
    </div>

<?php include_once (VIEWS . 'footer.php') ?>