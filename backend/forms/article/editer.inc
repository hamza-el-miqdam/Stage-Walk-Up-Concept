<?php

require_once '../../module/Connection.php';
require_once '../../module/model/article/Article.php';

$model = new Article();
#recuperation de la liste des articles dans la variable $article
#grace � la m�thode getArticle le parammetre Id n'est pas obligatiore
$article = $model->getArticle();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Titre</b></td><td><b>Media</b></td><td><b>Text</b></td><td><b>visible</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $article->fetch()){
                    //tant que je re�oi des enregistrement de la table article
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_article']."</td>");
                    echo("<td>".$data['titre_article']."</td>");
                    echo("<td>".$data['id_media_article']."</td>");
                    echo("<td>".$data['text_article']."</td>");
                    echo("<td>".$data['visible_article']."</td>");
                    echo("<td><a href='../../actions/article/deleteAction.php?id=".$data['id_article']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/article/editerActionForm.php?id=".$data['id_article']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
