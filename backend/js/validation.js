/**}
 * Created by Mike Down on 15/08/2015.
 */
function valider(form,type) {
    var expreg = /^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/;
    var erreur = "";
    var email = "";
    if (type == "ajouterformat") {
        if (form.typeformat.value == "") {
            document.getElementById("idtypeformat").className="danger";
            erreur += "- Veuillier donner un type de format <br/>";
        }
        if (form.extformat.value == "") {
            erreur += "- Veuillier des Extensions pour la format <br/>";
            document.getElementById("idextformat").className="danger";
        }
    } else if (type == "ajoutercategorie") {
        if (form.nomcategorie.value == "") {
            erreur += '-Veuillier donner un nom a la categorie <br/>';
            document.getElementById("idnom").className="danger";
        }
        if (form.descriptioncategorie.value == "") {
            erreur += '-Veuillier des description de la categorie <br/>';
            document.getElementById("iddesc").className="danger";
        }
    }else if(type == "ajoutermedia") {
        if (form.titremedia.value == "") {
            erreur += "- Veuillier donner un titre <br/>";
            document.getElementById("idtitre").className="danger";
        }
        if (form.lienmedia.value == "") {
            erreur += "- Veuillier donne un lien <br/>";
            document.getElementById("idlien").className="danger";
        }
        if(form.idformatmedia.value == "") {
            erreur+="- Veulliez choisir une format<br/>";
            document.getElementById("idformat").className="danger";
        }
        if (form.descriptionmedia.value == "") {
            erreur += "- Veuillier donne un lien <br/>";
            document.getElementById("iddesc").className="danger";
        }
    }else if (type == "ajoutertypesupport") {
        if (form.nomtypesupport.value == "") {
            erreur += '-Veuillier donner un nom<br/>';
            document.getElementById("idnom").className="danger";
        }
        if (form.desctypesupport.value == "") {
            erreur += '-Veuillier des description<br/>';
            document.getElementById("iddesc").className="danger";
        }
    }else if (type == "ajouterrang") {
        if (form.titrerang.value == "") {
            erreur += '-Veuillier donner un titre<br/>';
            document.getElementById("idtitre").className="danger";
        }
        if (form.permissionrang.value == "") {
            erreur += '-Veuillier specifier les permission<br/>';
            document.getElementById("idperm").className="danger";
        }
    }else if(type == "ajouterpress") {
        if (form.titrepress.value == "") {
            erreur += '-Veuillier donner un titre<br/>';
            document.getElementById("idtitre").className="danger";
        }
        if (form.lienpress.value == "") {
            erreur += '-Veuillier donner un Document<br/>';
            document.getElementById("idlien").className="danger";
        }
        if (form.datepress.value == "") {
            erreur += '-Veuillier specifier la date d\'aparition<br/>';
            document.getElementById("iddate").className="danger";
        }
        if (form.idsupportpress.value == "") {
            erreur += '-Veuillier specifier le support<br/>';
            document.getElementById("idsupport").className="danger";
        }
    }else if(type == "ajoutersupport") {
        if (form.nomsupport.value == "") {
            erreur += '-Veuillier donner un nom<br/>';
            document.getElementById("idnom").className="danger";
        }
        if (form.iconsupport.value == "") {
            erreur += '-Veuillier donner une icon<br/>';
            document.getElementById("idicon").className="danger";
        }
        if (form.idTypesupport.value == "") {
            erreur += '-Veuillier specifier le type de support<br/>';
            document.getElementById("idtype").className="danger";
        }
    }else if(type == "ajouterarticle") {
        if (form.titrearticle.value == "") {
            erreur += '-Veuillier donner un titre<br/>';
            document.getElementById("idtitre").className="danger";
        }
        if (form.textarticle.value == "") {
            erreur += '-l\'article est vide ??<br/>';
            document.getElementById("idtext").className="danger";
        }
        if (form.idmediaarticle.value == "") {
            erreur += '-Veuillier specifier le media<br/>';
            document.getElementById("idmedia").className="danger";
        }
    }else if(type == "ajouteruser") {
        if (form.nomuser.value == "") {
            erreur += '-Veuillier donner votre nom<br/>';
            document.getElementById("idnomuser").className="danger";
        }
        if (form.prenomuser.value == "") {
            erreur += '-Veuillier donner votre prenom<br/>';
            document.getElementById("idprenom").className="danger";

        }

        email=form.emailuser.value;
        if(email.match(expreg) == null) {
            erreur += "-Veilliez corrigez votre email <br/>";
            document.getElementById("idemail").className="danger";
        }

        if ( form.pwduser.value == "") {
            erreur += '-Veuillier donner un mot de passe<br/>';
            document.getElementById("idpwd").className="danger";
            document.getElementById("idpwdt").className="danger";
        }else if(form.pwduser.value != form.pwdtest.value){
            erreur +='-les deux champs de Mot de passe ne corresponde pas. Veullier verifier votre mot de passe<br/>';
            document.getElementById("idpwd").className="danger";
            document.getElementById("idpwdt").className="danger";
        }

        if(form.modifierpwduser.value != form.modifierpwdtest.value){
            erreur +='-les deux champs de Mot de passe ne corresponde pas. Veullier verifier votre mot de passe<br/>';
            document.getElementById("idpwd").className="danger";
            document.getElementById("idpwdt").className="danger";
        }

        if (form.idranguser.value == "") {
            erreur += '-Veuillier preciser votre rang<br/>';
            document.getElementById("idrang").className="danger";
        }
        if (form.genreuser.value == "") {
            erreur += '-Monsieur ou Madame ??<br/>';
            document.getElementById("idgenre").className="danger";

        }
    }else if (type=="ajouternewslettre"){

        if(form.objetnewslettre.value== "") {
            erreur += "-Veuiller donner un objet<br/>";
            document.getElementById("idobjet").className="danger";

        }
        if(form.textnewslettre.value == ""){
           erreur += "-Veuiller donne le contenu<br/>";
            document.getElementById("idtext").className="danger";

        }
    }else if(type == "ajouterinscritnews"){
        email = form.email.value;
        if(email.match(expreg) == null){
            erreur += "-Veilliez corrigez votre email <br/>";
            document.getElementById("idemail").className="danger";
        }
    }
    if (erreur == "") {
        form.submit();

    } else {
        document.getElementById("bloc_erreur").innerHTML = "<div id='erreur'>" + erreur + "</div>";
    }
}

