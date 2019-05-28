create schema AulaPW;

use AulaPW;

create table Users (
    id             INT PRIMARY KEY AUTO_INCREMENT,
    user_login     VARCHAR(20) NOT NULL UNIQUE,
    user_password  VARCHAR(23) NOT NULL,
    user_salt      VARCHAR(15) NOT NULL
)Engine=InnoDB;