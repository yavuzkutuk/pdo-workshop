<?php
require('./config/connec.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include('head.php');?>
<body>
<div class="uk-container">
    <div>
        <a class="uk-button uk-button-primary" href="./create.php">Ajouter une nouvelle histoire</a>
    </div>
    <table class="uk-table uk-table-hover uk-table-divider">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_GET['id'])){
                $requete = 'DELETE FROM story WHERE id ='.$_GET['id'];
                $pdo->exec($requete); 
                echo '<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Supprimer !!!</p>
</div>';
echo '<meta http-equiv="refresh" content="2;URL=/">';
            }
            $requete = 'SELECT * FROM story';
            $stories = $pdo->query($requete)->fetchAll();

            if(!empty($stories)){
                foreach($stories as $story){
                    echo '<tr>';
                        echo '<td>'.$story['title'].'</td>';
                        echo '<td>'.$story['content'].'</td>';
                        echo '<td>'.$story['author'].'</td>';
                        echo '<td><a href="update.php?id='.$story['id'].'" uk-icon="icon: cog"></a> <a href="?id='.$story['id'].'" uk-icon="icon: trash"></a></td>';
                    echo '<tr>';
                }
            }else{
                echo '<tr>';
                    echo '<td colspan="4" class="uk-text-center">Aucune histoire</td>';
                echo '<tr>';
            }
        ?>
        </tbody>
    </table>
</div>
<?php include("./footer.php")?>
</body>
</html>

