<?php

require_once '../../module/Connection.php';
require_once '../../module/model/mediatheque/Mediatheque.php';

$model = new Mediatheque();
#recuperation de la liste des medias dans la variable $media
#grace � la m�thode getMedia le parammetre Id n'est pas obligatiore
$media = $model->getMedia();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Titre</b></td><td><b>Lien</b></td><td><b>Format</b></td><td><b>Description</b></td><td><b>Visible</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $media->fetch()){
                    //tant que je re�oi des enregistrement de la table media
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_media']."</td>");
                    echo("<td>".$data['titre_media']."</td>");
                    echo("<td>".$data['lien_media']."</td>");
                    echo("<td>".$data['id_format_media']."</td>");
                    echo("<td>".$data['description_media']."</td>");
                    echo("<td>".$data['visible_media']."</td>");
                    echo("<td><a href='../../actions/mediatheque/deleteAction.php?id=".$data['id_media']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/mediatheque/editerActionForm.php?id=".$data['id_media']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
