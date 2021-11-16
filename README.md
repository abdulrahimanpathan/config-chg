<h1 align="center">Configuration</h1>

This application is developed using laravel framework to merge list of configuration files where the later files override settings in earlier ones.

<p>PHP version used: 8.0.12</p>
<p>Laravel version used: 8.65</p>

## Application Setup

1. Pull the code from the repository
2. Run composer install in root directory of the repo

Run following command to run the application in your local

    php artisan serve

Once the application is setup in your local we can browse folowing url to get the configurations from merged configuration files.

http://127.0.0.1:8000/getConfig/{key}

where key is the dot separated path used to retrieve parts of the configuration.

## Test cases

There are 2 sample test cases written in this application.

1. On passing key which is available in merged configuration file.
2. On passing key which is not available in merged configuration file.

You can run the following command to run the test cases.

    php artisan test
    
## Code coverage report

Following are code coverage report of ConfigController(100% covered) and ConfigService(92.59% covered) after writing test cases.

![image](https://user-images.githubusercontent.com/23741487/140092989-c94fd6ee-ed31-489d-be9c-69537b1faf92.png)

![image](https://user-images.githubusercontent.com/23741487/140093252-6920bb8d-2017-4ebf-8be6-75042d5c02f1.png)




