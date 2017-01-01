<?php

require_once '../../module/Connection.php';
require_once '../../module/model/rang/Rang.php';

$model = new Rang();
#recuperation de la liste des rangs dans la variable $rang
#grace � la m�thode getRang le parammetre Id n'est pas obligatiore
$rang = $model->getRang();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Titre</b></td><td><b>Permissions</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $rang->fetch()){
                    //tant que je re�oi des enregistrement de la table rang
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_rang']."</td>");
                    echo("<td>".$data['titre_rang']."</td>");
                    echo("<td>".$data['permission_rang']."</td>");
                    echo("<td><a href='../../actions/rang/deleteAction.php?id=".$data['id_rang']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/rang/editerActionForm.php?id=".$data['id_rang']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
