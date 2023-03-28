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
            </tr>
        </thead>
        <tbody>
            <?php
            $requetes = 'SELECT * FROM story';
            $stories = $pdo->query($requetes)->fetchAll();

            if(!empty($stories)){
                foreach($stories as $story){
                    echo '<tr>';
                        echo '<td>'.$story['title'].'</td>';
                        echo '<td>'.$story['content'].'</td>';
                        echo '<td>'.$story['author'].'</td>';
                    echo '<tr>';
                }
            }else{
                echo '<tr>';
                    echo '<td colspan="3" class="uk-text-center">Aucune histoire</td>';
                echo '<tr>';
            }
        ?>
        </tbody>
    </table>
</div>
<?php include("./footer.php")?>
</body>
</html>

