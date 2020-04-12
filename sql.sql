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

    CREATE TABLE contacts
    (
        id INT
        AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
title VARCHAR
        (50),
image VARCHAR
        (50),
created DATETIME,
modified DATETIME,
FOREIGN KEY user_key
        (user_id) REFERENCES users
        (id)
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
        (user_id) REFERENCES users
        (id)
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


            CREATE TABLE details
            (
                id INT
                AUTO_INCREMENT PRIMARY KEY,
contact_id INT NOT NULL,
title VARCHAR
                (50),
mobile VARCHAR
                (50),
phone VARCHAR
                (50),
email VARCHAR
                (50),
website VARCHAR
                (50),
address VARCHAR
                (50),
created DATETIME,
modified DATETIME,

FOREIGN KEY detailscontact_key
        (contact_id) REFERENCES contacts
        (id)
        ON DELETE CASCADE

);

INSERT INTO users (email,firstName,lastName,status, password, created, modified)
VALUES
('test@example.com','firstName','lastName',1, 'password', NOW(), NOW());