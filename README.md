# CrudOO
### CrudOO - Crud Object Oriented in PHP / MySQL with Administration
#### Installation:
Choose your working folder and install with git:
        
    git clone https://github.com/WebDevCF2019/CrudOO.git
    
Create your fork on github and add it to your folder:

    git remote add fork YOUR_GITHUB_URL/CrudOO.git
    
In your console, use composer to install the dependencies:

    composer install
    
    
In PhpMyAdmin, import the structure of your database (disable foreign key verification!):

    datas/CrudOO-structure.sql
    
In PhpMyAdmin, select the "crudoo" db and then import the data:

    datas/CrudOO-datas.sql
    
#### Next step:
To login to the admin:

    votre login : lulu
    votre pwd : lulu
    
### Exercice    
Après la création de studentController.php, qui sera appelé depuis adminContoller.php lorsqu'on est connecté **ET** qu'il existe la **variable GET adminstudent**, il vous faut créer:
##### Page d'accueil gérant les stagiaires
Créez la page d'accueil en Twig dans un sous dossier de

    view/admin/student/

Ensuite dans le modèle 

    thestudentManager.php
Créez une méthode publique qui va récupérer tous les stagiaires avec les sections dans lesquelles ils sont, sélectionnez les stagiaires qui n'ont pas de section également! (jointure externe)

 Récupérez cette méthode dans studentController.php et passez la en paramètre twig (format tableau) pour afficher la vue.
 
 La vue de la page d'accueil doit afficher un lien vers ajouter un stagiaire:
 
    <a href="?adminstudent&addstudent">Ajouter un stagiaire</a>
 Ensuite affichez chaque stagiaire avec les sections dans lesquelles ils sont (si ils en ont) et ajouter les liens modifier et supprimer à côté de chaque nom:
 
    <a href="?adminstudent&update={{ item.idthestudent }}">modifier</a> 
    | 
    <a href="?adminstudent&delete={{ item.idthestudent }}">supprimer</a>  
    
 ##### Page d'ajout d'un stagiaire
 Créez la page affichant le formulaire en Twig dans un sous dossier de
 
     view/admin/student/
     
 Affichez cette vue depuis studentController.php **si le formulaire n'est pas envoyé** en twig pour afficher la vue.  
  
 Créez ensuite une méthode publique dans studentController.php qui va insérer un nouveau stagiaire dans la base de donnée en utilisant un objet (une instance) de type "student"!  
 
 Dans studentController.php **si le formulaire est envoyé** hydratez un objet de type stagiaire, puis utiliser la méthode d'insertion contenue dans studentManager.php pour insérer le stagiaire dans la base de donnée.
 
 Redirigez la page vers l'accueil de gestion du stagiaire en cas d'insertion réussie:
 
    header("Location: ./?adminstudent")  ;
 Sinon réaffichez le formulaire avec affichage d'une erreur (erreur en option)    
 
 ##### Page de modification d'un stagiaire
  Créez la page affichant le formulaire remplit (pour l'update) en Twig dans un sous dossier de
  
      view/admin/student/
      
  Créez une méthode dans studentManager.php permettant de récupérer un seul stagiaire par son id
  
  ### Thank You
  
  Récupérez le stagiaire dans une variable de studentController.php
  
  Affichez cette vue depuis studentController.php **si le formulaire n'est pas envoyé** en twig en passant la variable contenant le stagiaire que l'on veut modifier.  
   
  Créez ensuite une méthode publique dans studentManager.php qui va mettre à jour le stagiaire dans la base de donnée en utilisant un objet (une instance) de type "student"!  
  
  Dans studentController.php **si le formulaire est envoyé** hydratez un objet de type stagiaire, puis utiliser la méthode d'update contenue dans studentManager.php pour modifier le stagiaire dans la base de donnée.
  
  Redirigez la page vers l'accueil de gestion du stagiaire en cas de modification réussie:
  
     header("Location: ./?adminstudent")  ;
  Sinon réaffichez le formulaire avec affichage d'une erreur (erreur en option)       


### Exercice  2

En cas de suppression d'une section, créez un vue comme pour la suppression de l'étudiant ( deleteAdminStudent.html) , qui obligera de supprimer en 2 étapes


du blabla

