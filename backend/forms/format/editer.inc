<?php

require_once '../../module/Connection.php';
require_once '../../module/model/format/Format.php';

$model = new Format();
#recuperation de la liste des formats dans la variable $format
#grace � la m�thode getFormat le parammetre Id n'est pas obligatiore
$format = $model->getFormat();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Type</b></td><td><b>Extensions</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $format->fetch()){
                    //tant que je re�oi des enregistrement de la table format
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_format']."</td>");
                    echo("<td>".$data['type_format']."</td>");
                    echo("<td>".$data['ext_format']."</td>");
                    echo("<td><a href='../../actions/format/deleteAction.php?id=".$data['id_format']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/format/editerActionForm.php?id=".$data['id_format']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
