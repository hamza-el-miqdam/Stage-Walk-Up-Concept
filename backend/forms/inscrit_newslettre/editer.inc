<?php

require_once '../../module/Connection.php';
require_once '../../module/model/inscrit_newslettre/Inscrit_newslettre.php';

$model = new InscritNewsLettre();
#recuperation de la liste des inscrits dans la variable $inscrit
#grace � la m�thode getArticle le parammetre Id n'est pas obligatiore
$inscrit = $model->getInscrit();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Email</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $inscrit->fetch()){
                    //tant que je re�oi des enregistrement de la table inscrit
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_inscrit']."</td>");
                    echo("<td>".$data['email_inscrit']."</td>");
                    echo("<td><a href='../../actions/inscrit_newslettre/deleteAction.php?id=".$data['id_inscrit']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/inscrit_newslettre/editerActionForm.php?id=".$data['id_inscrit']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
