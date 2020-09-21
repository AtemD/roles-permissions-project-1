## About This Project

This is a simple project to demostrate how to use roles and permissions in a laravel project

## How to install on your machine
1. Clone this GitHub repo
    - to do this, 
    - navigate to the folder you want to clone the repo on your machine
    - once you in this folder, run the below command:
        
        git clone linktogithubrepo.com/ projectName
        
    - where linktogithubrepo is:  https://github.com/AtemD/roles-permissions-project-1.git
    - and projectName is roles-permissions or whatever name you prefer to use for your project
    
 2. cd into your project 
    - run this in your terminal 
        
        cd projectName 
        
        e.g cd roles-permissions
        
    - this commmand moves your terminal working location to the project file you just cloned.
    
 3. Install composer dependencies
    - run the command:
        
        composer install 
        
 4. Install NPM Dependencies 
    - run the command : 
    
        npm install 
        
 5. Create a copy of your .env file 
    - run the command:
        
        cp .env.example .env
        
 6. Generate an app encryption key
    - run the command:
    
        php artisan key:generate
        
 7. Create an empty database for your application
    - you can use whatever database tool you prefer: eg. phpmyadmin, sequelpro, heidisql etc
    - the exact steps of database setup here depend on your system.
    
 8. Add the database connection credentials in the .env file
    - In the .env file you just created, add the necessary environment information for your laravel app to connect to the database
    
 9. Migrate the database
    - once your credentials are in the .env file,
    - you can run this command: 
    
        php artisan migrate
        
 10. Seed the database
    - this fills your database with starter or dummy data.
    - run the command: 
        
        php artisan db:seed
        
  11. Log in as an admin user
    - to do this,
    - go to your database roles table, memorise the id of an administrator
    - go to your database users table, get the email address of any user with the administrator id you memorised
    - copy this email address
    - navigate to your project url homepage
    - click on login at the navigation bar 
    - paste the email address you copied
    - type in the password, which is "password" for all seeded users.
    - click login, this will redirect you to the admin dashboard
    
   12. Explore the app features :) THE END..........
