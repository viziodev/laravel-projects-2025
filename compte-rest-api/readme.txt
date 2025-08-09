    #Installation

    #Creation du Projet
 
    #Definition du fichier de routes
      1-Creer un fichier api.php dans le dossier routes
      2-Dans bootstrap/app.php ajouter  api: __DIR__.'/../routes/api.php'

    #Creation de la Ressource User
      1-Migration
      2-Factories
      3-Sedders
      4-Controllers
      5-Routes 
      

    #Creation de la Ressource Role
      1-Migration/Factories/Sedders/Controllers/Request  ==> php artisan make:model Role  -mcfs  
      2-Cles etrangeres
      3-Relations
      2-Route Ressources

     #Request Validation
       1.Validation 
       2.Custum Message 
       3.Custum Rule.  php artisan make:rule PhoneNumberRule
     #Chargement des Relation 
      1-Definition au niveau des entity
      2-Eager avec with
      3-Lazy avec load
     #Soft Delete

    #Ressource et Collection
      1-Pagination
    #Authentification avec Passport
        1.Installation et configuration
        1.Creer le AuthController 
           a-methode login avec generation du token et stokage dans les cookiees
           b-Recuperation du user connect
           c-methode logout
           d-methode change password
    #MiddleWare 
      1-Auth
      2-Gestion des Exceptions 
      3-Format Response 
    #Guard et Ploicy    
    #Providers et Facade
    #Utilisation du Pattern Repository
        -Controllers
        -Services 
        -Repositories
    #Events
    #Commands 
    #Jobs 

    
   
