#Host the server
php artisan serve

#Create a model and migration and controller
php artisan make:modal {Name of Model} -m -c

#migrate database
php artisan make:migrate {migration_name} --create={table_name}
#refresh migrations after changes
migrate:refresh

#Dump Autoload
composer dump-autoload

#tinker
php artisan tinker
##go to path
App\{Name of Model}

#controllers
php artisan make:controller ProjectController