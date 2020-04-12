# Online Contact Book

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)


## Project Features
1. Users Registration
2. Users Authentication
3. Database Relationship
4. User's Restrictions
5. File upload with validation
6. Multiple row insert
7. Search Functionality
8. Custom Paginations
9. UI view for Logged in and Logged out users
10. Full featured crud functionality

## Project Description:
1. Here are two types of users. regular and another admin user
2. The admin user can delete the regular user and have some extra features
3. Here both user can create a contact.
4. Contact has many relationship with contact details and contact group
5. Contact and Contact group hasOne relationship with user
6. Contact details hasOne relationship with contact

## How to run project in your local machine

> Clone the repository
```bash
git clone 
```

> create a mysql database named `cake_contactbook`

> goto your `config/app_local.php` file and add your database configuration, for my case my `username = 'root'` and `password = ''`

> Now copy the following sql and run. 

```sql
            CREATE TABLE users
            (
                id INT
                AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR
                (255) NOT NULL,
                firstName VARCHAR
                (50) NOT NULL,
                lastName VARCHAR
                (50) NOT NULL,
                status tinyInt 
                (2) DEFAULT 0,
                password VARCHAR
                (255) NOT NULL,
                created DATETIME,
                modified DATETIME
            );

            CREATE TABLE contacts(
                id INT
                AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                title VARCHAR(50),
                image VARCHAR(50),
                created DATETIME,
                modified DATETIME,
                FOREIGN KEY user_key
                (user_id) REFERENCES users(id)
                    ON DELETE CASCADE
            );

            CREATE TABLE groups
            (
                id INT
                AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                title VARCHAR
                (255),
                created DATETIME,
                modified DATETIME,
                UNIQUE KEY
                (title),
                FOREIGN KEY groupuser_key
                (user_id) REFERENCES users (id)
                ON DELETE CASCADE
            );


            CREATE TABLE contacts_groups (
                contact_id INT NOT NULL,
                group_id INT NOT NULL,
                PRIMARY KEY (contact_id, group_id),
                FOREIGN KEY group_key
                        (group_id) REFERENCES groups
                        (id),
                FOREIGN KEY contact_key
                        (contact_id) REFERENCES contacts
                        (id)

                        ON DELETE CASCADE
            );


            CREATE TABLE details(
                id INT
                AUTO_INCREMENT PRIMARY KEY,
                contact_id INT NOT NULL,
                title VARCHAR(50),
                mobile VARCHAR(50),
                phone VARCHAR(50),
                email VARCHAR(50),
                website VARCHAR(50),
                address VARCHAR(50),
                created DATETIME,
                modified DATETIME,

                FOREIGN KEY detailscontact_key
                (contact_id) REFERENCES contacts(id)
                ON DELETE CASCADE
            );

```



> goto your project root directory and open terminal    run the following command

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.



