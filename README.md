# Local File Inclusion & Social Engineering Practice Site
This site provides an environment for practicing common methods of exploiting web applications.
If you wish to explore the site and find the vulnerabilities on your own, be sure to avoid the SOLUTION.md file.

## Goals
* **Easy**: Find the name of a Sudo Auto Insurance customer
* **Medium**: Find the account number of a Sudo Auto Insurance customer
* **Hard**: Upload a web-based shell to the server

## Requirements
The application is relatively simple and should run on any stack supporting a modern version of PHP + MySQL.

## Deployment
The `/app/config` directory contains the database configuration files.
Execute the SQL contained in `/app/config/init.sql` to create the necessary database table.
Configure the details of the database in `/app/config/db.php`.

After the database is deployed, simply move the `/app` directory into your apache / nginx / your-favorite-php-server web root.
Since this is a demo, more things are hardcoded than they probably should be.
Some challengers will attempt to pull the .git directory and download the source code.
We can prevent this by only exposing the `/app` directory instead of the whole project.

For best results, the server should support .htaccess files.
If your server does not, ensure that `/app/views/*` is not directly accessible.

## Credits
* **Alfred State Information Security Team** - for providing the ideas behind this challenge and implementing this challenge as part of the Fall 2015 CTF.
* **https://github.com/panique/php-login-minimal** - for providing a secure php authentication library on which to base this app.
