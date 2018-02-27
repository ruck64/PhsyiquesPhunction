CREATE TABLE Users (
	id INT (6) UNSIGNED AUTO_INCREMENT,
	display_name VARCHAR (30) NOT NULL,
	email VARCHAR (50) NOT NULL,
	password CHAR(41) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE INDEX (email),
	access INT(1),
	reg_date TIMESTAMP
)
	
CREATE TABLE UserInfo (
	id INT NOT NULL,
	firstname VARCHAR (30) NOT NULL,
	lastname VARCHAR (30) NOT NULL,
	age INT (3) NOT NULL,
	weight INT (3) NOT NULL,
	bodytype CHAR NOT NULL,
	PRIMARY KEY(id)
)