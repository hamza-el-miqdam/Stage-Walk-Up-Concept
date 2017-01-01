<?php

require_once '../../module/Connection.php';
require_once '../../module/model/utilisateur/Utilisateur.php';

$model = new Utilisateur();
#recuperation de la liste des users dans la variable $user
#grace � la m�thode getUtilisateur le parammetre Id n'est pas obligatiore
$user = $model->getUser();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Genre</b></td><td><b>Statut Social</b></td><td><b>Nom</b></td><td><b>Prenom</b></td>
                        <td><b>Rang</b></td><td><b>Email</b></td><td><b>mot de passe</b></td><td><b>Date d'enscription</b></td><td><b>Newslettre</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $user->fetch()){
                    //tant que je re�oi des enregistrement de la table user
                    //je continue � afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_user']."</td>");
                    echo("<td>".$data['genre_user']."</td>");
                    echo("<td>".$data['statut_social_user']."</td>");
                    echo("<td>".$data['nom_user']."</td>");
                    echo("<td>".$data['prenom_user']."</td>");
                    echo("<td>".$data['id_rang_user']."</td>");
                    echo("<td>".$data['email_user']."</td>");
                    echo("<td>".$data['mot_de_passe_user']."</td>");
                    echo("<td>".$data['date_insc_user']."</td>");
                    echo("<td>".$data['newslettre_user']."</td>");
                    echo("<td><a href='../../actions/utilisateur/deleteAction.php?id=".$data['id_user']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/utilisateur/editerActionForm.php?id=".$data['id_user']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
