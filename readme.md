### Student Tracker Project
# Introduction

<p>The development of a web-based database to document and showcase the past projects which students have worked on. This will help future students to appreciate the work done for projects in the past. It will also allow students to have a referenceable online resource to highlight their accomplishments during their undergraduate degree.</p>

# Capabilities
1. Two types of users: Administrators and Students
2. Users can sign up, however information published will only be visible after administrator approval.
3. Users can provide the following details about the project:
    + Project Name
    + Course code
    + Course name
    + Year
    + Github (source code link)
    + Upload (up to 100MB)
    + Group Members (With publicly available profile images)
    + Tags
4. Registered Users Can leave comment
5. Registered Users can view their dashboard for published, pending and rejected projects. 
6. Users can view website without signing in. However, only other approved students can access the uploading project files.

# Pre-Requisites
1. <a href="https://getcomposer.org/">Composer</a>
2. <a href="https://nodejs.org/en/">NodeJs </a>
3. <a href="https://bower.io/">Bower</a>
4. LAMP stack/ <a href="https://www.apachefriends.org/index.html">XAMP(Windows)</a>

# Installation
* Composer Install
* Npm Install
* Bower install
* Set enviroment
    * duplicate .env.example and rename to .env in your root folder
    * run "php artisan key:generate
    * copy generated key to .env file e.g APP_KEY = {generated_key}}
    * start your mysql server
    * create a database e.g studentprojecttracker
    * set database credentails in .env file e.g DB_DATABASE = studentprojecttracker, DB_USERNAME = root, DB_PASSWORD=
    * save .env
* php artisan migrate (if you have problem migrating, run "composer dump-autoload" and then try again)
* php artisan db:seed( adds an admin to database)
* php artisan serve

# Notes
* Go to /admin to access admin login
