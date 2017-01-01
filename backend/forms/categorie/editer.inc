<?php

require_once '../../module/Connection.php';
require_once '../../module/model/categorie/Categorie.php';

$model = new Categorie();
#recuperation de la liste des categories dans la variable $categorie
#grace � la m�thode getCategorie le parammetre Id n'est pas obligatiore
$categorie = $model->getCategorie();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>Description</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $categorie->fetch()){
                    //tant que je re�oi des enregistrement de la table categorie
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_categorie']."</td>");
                    echo("<td>".$data['nom_categorie']."</td>");
                    echo("<td>".$data['description_categorie']."</td>");
                    echo("<td><a href='../../actions/categorie/deleteAction.php?id=".$data['id_categorie']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/categorie/editerActionForm.php?id=".$data['id_categorie']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
