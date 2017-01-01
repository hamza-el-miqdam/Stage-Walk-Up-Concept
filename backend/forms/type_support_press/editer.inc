<?php

require_once '../../module/Connection.php';
require_once '../../module/model/type_support_press/Type_support_press.php';

$model = new Type_support_press();
#recuperation de la liste des type_support_presss dans la variable $type_support_press
#grace � la m�thode getType_support_press le parammetre Id n'est pas obligatiore
$type_support_press = $model->getType_support_press();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>Description</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $type_support_press->fetch()){
                    //tant que je re�oi des enregistrement de la table type_support_press
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_type_support_press']."</td>");
                    echo("<td>".$data['nom_type_support_press']."</td>");
                    echo("<td>".$data['desc_type_support_press']."</td>");
                    echo("<td><a href='../../actions/type_support_press/deleteAction.php?id=".$data['id_type_support_press']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/type_support_press/editerActionForm.php?id=".$data['id_type_support_press']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
