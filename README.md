<p align="center"> <img src="./resources/js/Assets/ik.png?raw=true" width=15%></p>

## About I-KOPE

I-KOPE is a 3 weeks experimental development project, conducted by a single junior backend programmer within the last month of a full stack bootcamp. Due to its continuous growth, it's still not deployed to a production environment. 

I-KOPE has been designed as an app for people interested in Psychoanalysis, either professional or not, so they can be up to date on the latest events and publications related to this field, as well as handle their patient's agenda in case is needed.


## Statement of intent ✒️

The main purpose with I-KOPE was not to achieve a perfect application written in beautiful, clean, SOLID code, but to learn as much as possible during the process —which also means facing multiple challenges all along and trying to creatively solve them. As a brand new software developer, I believe that thinking is better than knowing, and that's why most of the code decisions for this project were not made based only on pragmatic criteria.


## Stack and Technologies 🛠️

This project has been built using the VILT stack ([Vue.Js](https://vuejs.org/), [Inertia.Js](https://inertiajs.com/), [Laravel](https://laravel.com/), [TailwindCSS](https://tailwindcss.com/)) with [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze) authentication package.


<strong>Other tools</strong>


- [MySQL](https://www.mysql.com/) + [phpMyAdmin](https://www.phpmyadmin.net/)
- [Redis](https://redis.io/)
- [PHPUnit](https://phpunit.de/)
- [Composer](https://getcomposer.org/)
- [Faker](https://github.com/fzaninotto/Faker)
- [Artisan](https://laravel.com/docs/8.x/artisan)
- [Eloquent ORM](https://laravel.com/docs/8.x/eloquent)

<strong>Some applied concepts</strong>

- OOP
- MVC
- CRUD
- TDD
- Repository Pattern
- Decorator Pattern


## Starting: Project Set-Up 🚀

1. Git clone: https://github.com/jmasllorens/ikope.git

2. npm install

3. composer install / update

4. Create a DB in phpMyAdmin named 'ikope'

5. Rename .env.example file to .env and modify the following data:

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DB_DATABASE=ikope

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CACHE_DRIVER=redis

6. Download, install and configure [Redis](https://laravel.com/docs/8.x/redis)

7. Execute Redis server

8. php artisan migrate:fresh --seed

9. php artisan key:generate

10. npm run dev

11. php artisan serve

** If you want to run the tests: php artisan test


***



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

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
