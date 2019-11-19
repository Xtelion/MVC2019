<?php include_once (VIEWS . 'header.php') ?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1><?= $data['subtitle'] ?></h1>
        </div>
        <div class="card-body">
            <?php foreach ($data['books'] as $key => $book) : ?>
                <?php if($key%4 == 0): ?>
                    <div class="row">
                <?php endif ?>
                <div class="card pt-2 col-sm-3">
                    <img src="img/<?= $book->image ?>" alt="<?= $book->name ?>" class="img-responsive" style="width: 100%">
                    <a href="<?= ROOT ?>shop/show/<?= $book->id ?>/books"><?= $book->name ?></a>
                </div>
                <?php if(($key+1)%4 == 0): ?>
                    </div>
                <?php endif ?>

            <?php endforeach ?>
        </div>
    </div>

<?php include_once (VIEWS . 'footer.php') ?>