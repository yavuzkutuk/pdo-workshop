<?php
require('./config/connec.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include('head.php');?>
<body>
    
<div class="uk-container">
<div>
<a class="uk-button uk-button-primary" href="./">Voir toutes les histoires</a>
</div>

<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $requete = 'UPDATE story SET title=:title, content=:content, author=:author WHERE id=:id';
        $statement = $pdo->prepare($requete);
        $statement->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
        $statement->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $statement->execute();
        header('Location: /');
    }

    $requete = 'SELECT * FROM story WHERE id='.$_GET['id'];
    $story = $pdo->query($requete)->fetch();
?>
<div>
        <div class="uk-card uk-card-default uk-card-large uk-card-body">
            <h3 class="uk-card-title">Modifier l'histoire numéro <?=$_GET['id']; ?></h3>
            <form method="post">
    <fieldset class="uk-fieldset">
        <div class="uk-margin">
            <input class="uk-input" type="text" name="title" value="<?=$story['title']; ?>" placeholder="Title" aria-label="Input">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" name="content" placeholder="Content" aria-label="Textarea"><?=$story['content']; ?></textarea>
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" name="author" placeholder="Author" value="<?=$story['author']; ?>" aria-label="Input">
        </div>
        <input type="hidden" name="id" value="<?=$story['id']; ?>" />
        <button class="uk-button uk-button-primary uk-button-large">Modifier</button>
    </fieldset>
</form>
        </div>
    </div>
    </div>

<?php include("./footer.php")?>
</body>
</html>

