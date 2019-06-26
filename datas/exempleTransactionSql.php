<?php
require_once "config.php";
require_once "connectPDO.php";

/*
 *
 * LA DB doit être en INNODB
 *
 */

/*
 * Renvoie un chaine de caractère de la longueur passée en argument
 */
function donneTexte(int $nb = 5): string {
    $sortie="";
    $chaine = "abcdef ghij vpd xz";
    $nbChaine = strlen($chaine);
     for($i=0;$i<$nb;$i++){
         $hasard = mt_rand(0,($nbChaine-1));
         $sortie .= $chaine[$hasard];
     }
    return $sortie;
}


// transaction

// valeurs de départ
$nom = donneTexte(20);
$texte = donneTexte(500);

try {

    $connexion->beginTransaction(); // début de transaction

    $p = $connexion->prepare("INSERT INTO pdo1 (nom,texte) VALUES (?,?)");
    
    $p->bindParam(1,$nom,PDO::PARAM_STR);
    $p->bindParam(2,$texte,PDO::PARAM_STR);
    
    $p->execute();

    $connexion->exec("INSERT INTO pdo1 (nom,texte) VALUES ('ggg','g g g g')");

    $connexion->exec("INSERT INTO pdo1 (nom,texte) VALUES ('hhh','g g g g')");

    $connexion->commit();
    
    return true;
    
}catch (PDOException $e){
    $connexion->rollBack();
    $erreur = $e->getMessage();
    
    return false;
}


// SELECT ALL
$sql = "SELECT * FROM pdo1 ORDER BY id DESC";

$recupArt = $connexion->query($sql);

if($recupArt->rowCount()){
    $recupAll = $recupArt->fetchAll(PDO::FETCH_OBJ);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ici votre titre</title>
</head>
<body>

<h1>PDO1</h1>
<?php
if(isset($erreur)) echo "<h3>$erreur</h3>";
?>
<div>
    <?php
    foreach ($recupAll as $item){
        ?>
    <h3>ID: <?=$item->id?> | <small><?=$item->ladate?></small></h3>
    <h4><?=$item->nom?></h4>
    <p><?=$item->texte?></p>
    <?php
    }
    ?>
</div>

</body>
</html>