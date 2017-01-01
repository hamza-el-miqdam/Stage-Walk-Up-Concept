<?php

require_once '../../module/Connection.php';
require_once '../../module/model/support/Support.php';

$model = new Support();

$support = $model->getSupport();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>Type</b></td><td><b>Icon</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $support->fetch()){


                    echo("<tr>");
                    echo("<td>".$data['id_support']."</td>");
                    echo("<td>".$data['nom_support']."</td>");
                    echo("<td>".$data['id_type_support']."</td>");
                    echo("<td>".$data['icon_support']."</td>");
                    echo("<td><a href='../../actions/support/deleteAction.php?id=".$data['id_support']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/support/editerActionForm.php?id=".$data['id_support']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
