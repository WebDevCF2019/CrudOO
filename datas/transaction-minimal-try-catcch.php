<?php
// Essai
try {
    // lancement transaction
    $this->db->beginTransaction();

    // toutes nos requêtes

    // ......
    
    // envoi de nos requêtes à notre serveur de DB 
    $this->db->commit();

// Si au moins 1 Erreur de requête, on capture celle-ci dans $ex
} catch (PDOException $ex) {

    // affichage du message d'erreur
    echo $ex->getMessage();

    // on re met la db telle qu'elle était avant la transaction
    $this->db->rollBack();

}