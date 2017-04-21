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

#hashing
>>> $admin= new App\Admin
=> App\Admin {#684}
>>> $admin->name = 'Admin Feng'
=> "Admin Feng"
>>> $admin->email = 'feng@admin.com'
=> "feng@admin.com"
>>> $admin->password = Hash::make('password')
=> "$2y$10$422eIZL72yHggI3h3TtwfumNP0ToNEJ5Wu0Nm/y9guCtM1ZGrGhgC"
>>> $admin->save()
=> true