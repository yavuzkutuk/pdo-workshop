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
        $requete = 'INSERT INTO story (title,content,author) VALUES(:title,:content,:author)';
        $statement = $pdo->prepare($requete);
        $statement->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
        $statement->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
        $statement->execute();
        header('Location: /');
    }
?>
<div>
        <div class="uk-card uk-card-default uk-card-large uk-card-body">
            <h3 class="uk-card-title">Ajouter une histoire</h3>
            <form method="post">
    <fieldset class="uk-fieldset">
        <div class="uk-margin">
            <input class="uk-input" type="text" name="title" placeholder="Title" aria-label="Input">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" name="content" placeholder="Content" aria-label="Textarea"></textarea>
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" name="author" placeholder="Author" aria-label="Input">
        </div>
        <button class="uk-button uk-button-primary uk-button-large">Ajouter</button>
    </fieldset>
</form>
        </div>
    </div>
    </div>

<?php include("./footer.php")?>
</body>
</html>

