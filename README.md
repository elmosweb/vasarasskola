# Project Title

This project is a starter project for Printful Summer School

## Getting Started

To get started with this project, you need at least one testing platform 
(XAMPP or WAMP), to get your code running on your local machine.


### Prerequisites

You need to create a new database with phymyadmin - called mvc;
afterwards, there must be inserted data from SQL Dump File.

```
The best/most secure way is also to create a new user, and grant all privilleges;

Afterwards, config.php, which is found in mvc/app/config needs to be replaced with corresponding values, you set up making this new user with all privilleges:
  define('DB_HOST', 'localhost');
  define('DB_USER', '_YOUR_USER_NAME');
  define('DB_PASS', '_YOUR_PASSWORD');
  define('DB_NAME', 'mvc');

```

### Installing

Installing - no special requirements, if prequisites are done.


## Additional information

There are created .htaccess files for each section.
The main section is to set up the base to public;
the file inside public section is used to rewritebase and conditions, applied to the directory localhost/mvc;
the file inside app is used as Options -Indexes, which makes app folder unaccessible form outside, therefore making it secure;




## Versioning

0.0.0.2

## Authors

Elmars Sirovatskis
## License
-----------------------------------------------------------
## Acknowledgments

* I ove big part of  understanding of MVC pattern to Traversy Media;


