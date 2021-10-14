<br/>
<p align="center"> <img src="./resources/js/Assets/ik.png?raw=true" width=15%></p>

## 📋 About I-KOPE
<br/>
I-KOPE is a 3 weeks experimental development project, conducted by a single junior backend programmer within the last month of a full stack bootcamp. Due to its continuous growth, it's still not deployed to a production environment.
 
 <br/>
 <br/>

I-KOPE has been designed as an app for people interested in Psychoanalysis, either professional or not, so they can be up to date on the latest events and publications related to this field, as well as handle their patient's agenda in case is needed.
<br/><br/>

## ✒️ Statement of intent 
<br/>
The main purpose with I-KOPE was not to achieve a perfect application written in beautiful, clean, SOLID code, but to learn as much as possible during the process —which also means facing multiple challenges all along and trying to creatively solve them. 
<br/><br/>

As a brand new software developer, I believe that thinking is better than knowing, and that's why most of the code decisions for this project were not made based only on pragmatic criteria.
<br/><br/>

## 🛠️ Stack and Technologies 
<br/>
This project has been built using the <strong>VILT</strong> stack, along with <strong>Laravel Breeze</strong> authentication package:
<br/>
<br/>

- [Vue.Js](https://vuejs.org/)
- [Inertia.Js](https://inertiajs.com/)
- [Laravel](https://laravel.com/)
- [TailwindCSS](https://tailwindcss.com/)
- [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze)

<br/>



<strong>Other tools:</strong>


- [MySQL](https://www.mysql.com/) + [phpMyAdmin](https://www.phpmyadmin.net/)
- [Redis](https://redis.io/)
- [PHPUnit](https://phpunit.de/)
- [Composer](https://getcomposer.org/)
- [Faker](https://github.com/fzaninotto/Faker)
- [Artisan](https://laravel.com/docs/8.x/artisan)
- [Eloquent ORM](https://laravel.com/docs/8.x/eloquent)

<br/><br/>

## 🚀 Starting 
<br/>

- Git clone: https://github.com/jmasllorens/ikope.git

- npm install

- composer install / update

- Create a DB in phpMyAdmin named <em>ikope</em>

- Rename <em>.env.example</em> file to <em>.env</em> and modify the following data:

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- DB_DATABASE=ikope

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- CACHE_DRIVER=redis

- Download, install and configure [Redis](https://laravel.com/docs/8.x/redis)

- Execute Redis server

- php artisan migrate:fresh --seed

- php artisan key:generate

- npm run dev

- php artisan serve

** &nbsp;&nbsp;If you want to run the tests: php artisan test

<br/><br/>


## 🎨 Features 
<br/>

<strong>Admin User</strong>

    * Dashboard with I-KOPE data
    * Seminars and Publications complete CRUD
    * General Users & Admin Users lists, with a delete option enabled
    * Profile Settings available

<strong>Basic User</strong>

    * Dashboard with I-KOPE & personal data
    * All Seminars and My Seminars pages
    * Publications complete experimental CRUD
    * Profile Settings available, with the possibility to enable the Patients Section
    * Contact form


<strong>Therapist User</strong>

    * Dashboard with I-KOPE & personal data
    * All Seminars and My Seminars pages
    * Publications complete experimental CRUD
    * Patients Section with 3 complete CRUDS: Patients, Sessions & Notes
    * Profile Settings available, with the possibility to disable the Patients Section
    * Contact form
<br/><br/>

## ✔ Implementations & Applied Concepts
<br/>

- OOP
- MVC
- 6 complete CRUDS
- Testing and TDD (84 tests - 100% passing)
- Repository Pattern
- Decorator Pattern (Redis Cache)
- Seminar Subscription
- Searcher
- Pagination
- Feedback Notifications & Confirm Alerts
- Mail Confirmation 
<br/><br/>

## 👨‍💻 Still Pending
<br/>

- Validation & Error Handling
- Loading Spinner
- Refactor
- Front-end Focus (design, responsive...)
- Keep Experimenting & Learning!
<br/><br/>


***
***
<br/>

## Images
<br/>
<p align="center"> <img src="./resources/js/Assets/Screen-1.png?raw=true" width=75%></p>

<p align="center"> <img src="./resources/js/Assets/Screen-2.png?raw=true" width=75%></p>

<p align="center"> <img src="./resources/js/Assets/Screen-3.png?raw=true" width=75%></p>
<br/>

<p align="center"> <img src="./resources/js/Assets/Screen-4.png?raw=true" width=75%></p>

<br/>

<p align="center"> <img src="./resources/js/Assets/Screen-5.png?raw=true" width=75%></p>

<br/>

<p align="center"> <img src="./resources/js/Assets/Screen-6.png?raw=true" width=75%></p>

<br/>

<p align="center"> <img src="./resources/js/Assets/Screen-7.png?raw=true" width=75%></p>

<br/>

<p align="center"> <img src="./resources/js/Assets/Screen-8.png?raw=true" width=75%></p>

<br/>

<p align="center"> <img src="./resources/js/Assets/Screen-9.png?raw=true" width=75%></p>

<br/>

<p align="center"> <img src="./resources/js/Assets/Screen-10.png?raw=true" width=75%></p>

<br/><br/>
