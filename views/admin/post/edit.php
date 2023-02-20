<h1>Modifier <?= $params['post']->title ?></h1>

<form action="/PhpStorm/myapp/admin/posts/edit<?= $params['post']->id ?>" method="post">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= $params['post']->content ?>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>