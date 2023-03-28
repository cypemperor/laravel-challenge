Laravel Challenge

This project requires PHP 8.1


1. Run Migrations with seeder
    - php artisan migrate --seed

2. Run the tests
    - php artisan test
    
3. Commands are in app/Console/Kernel.php
   
   You need to set a cronjob for Laravel Task Scheduler to run every minute.
   * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
