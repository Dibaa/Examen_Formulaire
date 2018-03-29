<?php 
try{
  require('connexionBD.php');
  // requette d'insertion dans la base de donnée
if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['adesse'])) {
 
}
$requete=$con->prepare("INSERT INTO TABLE(Nom,Prenom,Adresse)
                          VALUES(:nom,:prenom,:adresse)"
                          );

 function secure($info){
                $info = trim($info);
                $info = stripslashes($info);
                $info = strip_tags($info);
                return $info;
          }
          
          $nom = secure($_POST['nom']);
          $prenom = secure($_POST['prenom']);
          $adresse = secure($_POST['adresse']);
          
    
   
   $requete->bindParam(':nom',$nom);
   $requete->bindParam(':prenom',$prenom);
   $requete->bindParam(':adresse',$adresse);

 
 $resultat = $requete->execute();



  if($resultat){
    //echo "la connection a bien marché";
   require('affichageBD.php');
  }else{
    //echo "erreur";
    require('erreur.php');
  }


  // si le nom ou le prenom ou l'adersse est vide
}else
require('Mon_formulaire.php');
}


}catch(PDOException $e){
  echo 'Erreur!!! '.$e->getMessage();
  echo 'Echec de la connexion avec la base de donnée';
}

?>
</body>
</html>