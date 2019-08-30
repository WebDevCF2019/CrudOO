<?php
/*
 *
 * ADMIN
 *
 */


if (isset($_GET['disconnect'])) {

    /*
     *
     * On se déconnecte (la redirection est inclue dans le modèle)
     *
     */

    $theuserM->deconnecterSession();

    // on veut gérer les étudiants
}elseif(isset($_GET['adminstudent'])){

    /*
     *
     * Appel du contrôleur gérant les étudiants
     *
     * !!!!! la variable get adminstudent doit toujours rester dans l'url tant que l'on veut gérer les étudients
     *
     */
    require_once "studentController.php";

}else{
    /*
     *
     * Appel du contrôleur gérant les rubriques
     *
     *
     */
    require_once "sectionController.php";
}