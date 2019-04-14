CREATE DATABASE sales;

USE sales;

CREATE TABLE users(
				id_user INT NOT NULL AUTO_INCREMENT,
				id_parent INT NOT NULL,
				user_fullname VARCHAR(50) NOT NULL,
				user_email VARCHAR(50) NOT NULL,
				user_name VARCHAR(50) NOT NULL,
				user_role VARCHAR(10) NOT NULL,
				user_password text(50) NOT NULL,
				created_date DATETIME NOT NULL,
				updated_date DATETIME NOT NULL,
				PRIMARY KEY(id_user)
					);
