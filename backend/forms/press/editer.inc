<?php

require_once '../../module/Connection.php';
require_once '../../module/model/press/Press.php';

$model = new Press();
#recuperation de la liste des presss dans la variable $press
#grace � la m�thode getPress le parammetre Id n'est pas obligatiore
$press = $model->getPress();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Titre</b></td><td><b>Lien</b></td><td><b>Support</b></td><td><b>Date de sortie</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $press->fetch()){
                    //tant que je re�oi des enregistrement de la table press
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_press']."</td>");
                    echo("<td>".$data['titre_press']."</td>");
                    echo("<td>".$data['lien_press']."</td>");
                    echo("<td>".$data['id_support_press']."</td>");
                    echo("<td>".$data['date_press']."</td>");
                    echo("<td><a href='../../actions/press/deleteAction.php?id=".$data['id_press']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/press/editerActionForm.php?id=".$data['id_press']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
