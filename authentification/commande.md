php artisan make:controller EtudiantAuthController

php artisan make:model Etudiant -m
// creation du model avec migration

php artisan migrate
// Apres avoir creer les table dans le migration on doit le migreer dans le base de données

php artisan make:middleware AuthCheck
// securiser l'url ver profile


php artisan make:middleware AlreadyLoggedIn
// si le session exite et l'utilisateur click sur le button login de redirect vers le profile automatique