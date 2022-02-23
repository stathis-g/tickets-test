# Steps to install the app
- Install Docker Desktop
- Run Docker Desktop
- Run command `./vendor/bin/sail up` to start server
- Run `./vendor/bin/sail php artisan migrate` to create db tables
- Run `./vendor/bin/sail php artisan schedule:list` to see active schedulers
- Run `./vendor/bin/sail php artisan schedule:work` to run scheduler locally
- 