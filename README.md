<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Définition du projet
Ce projet à pour but de créer une plateforme de formations en ligne. Les visiteurs du site peuvent consulter en libre accès les formations ainsi que leurs détails.
Si un visiteur le souhaite, il peut envoyer un formulaire de contact pour devenir formateur. L'administrateur du site pourra accepter la demande de l'utilisateur via un dashboard. Enfin l'utilisateur enregistré pourra facilement créer des formations composés de chapitre, de catégorie, de type, etc... L'utilisateur peut a tous moment supprimer ou modifier les formations qu'il a mis en ligne.


## Pré-requis

Etapes à suivre pour installer le projet en local : 
- Vérifier la présence de php sur votre système avec la commande ```php --version```.
- Vérifier qu'une version de MySql pouvant accueillir la base de données est présente sur votre système.
- Vérifier qu'une version de composer est installé sur votre système avec la commande ```composer --version```.

## Initialisation

Etape à suivre pour initialiser le projet en local :
- Ouvrir un terminal dans votre dossier projet.
- Exécuté la commande ```composer install``` pour récupérer les dépendances utilisées.
- Si un fichier ".env" ne sait pas créer automatiquement, copier le fichier ".env.example" (sans oublié de le renommer) puis exécutez la commande suivante : ```php artisan key:generate```.
- Pour rattacher votre service de mail de test, modifier les champs ```MAIL_MAILER=, MAIL_HOST=, MAIL_PORT=, MAIL_USERNAME=, MAIL_PASSWORD=, MAIL_ENCRYPTION=,``` du fichier ".env".
- Création d'une base de donnée au nom suivant : laravel_training.
- N'oubliez pas de mettre le nom de la base de données dans le champs ```DB_DATABASE=``` de votre fichier ".env" ainsi que votre configuration MySql.
- Utilisation de la commande ```php artisan migrate``` pour créer la base de données.
- Exécuté la commande ```php artisan db:seed``` pour remplir la base de données.

## Lancement

- Exécuté la commande ```php artisan serve``` pour démarrer l'application.


## Documentation technique

- MCD : disponible dans le dossier bdd_model au format .png ou .mcd

<img src="bdd_model/mcd.png" alt="MCD_Image">




## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
