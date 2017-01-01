<?php

require_once '../../module/Connection.php';
require_once '../../module/model/newslettre/Newslettre.php';

$model = new Newslettre();
#recuperation de la liste des newslettres dans la variable $newslettre
#grace � la m�thode getNewslettre le parammetre Id n'est pas obligatiore
$newslettre = $model->getNewslettre();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Objet</b></td><td><b>Text</b></td><td><b>Date d'envoie</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $newslettre->fetch()){
                    //tant que je re�oi des enregistrement de la table newslettre
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_newslettre']."</td>");
                    echo("<td>".$data['objet_newslettre']."</td>");
                    echo("<td>".$data['text_newslettre']."</td>");
                    echo("<td>".$data['date_envoie_newslettre']."</td>");
                    echo("<td><a href='../../actions/newslettre/deleteAction.php?id=".$data['id_newslettre']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/newslettre/editerActionForm.php?id=".$data['id_newslettre']."'>Editer</a></td>");
                    echo("</tr>");
                }
                ?>
            </table>
        </div>
    </div>
