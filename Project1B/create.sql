CREATE TABLE Movie (
       id INT NOT NULL,
       title VARCHAR(100) NOT NULL,
       year INT,
       rating VARCHAR(10),
       company VARCHAR(50),
       PRIMARY KEY(id)
) ENGINE=INNODB;

CREATE TABLE Actor (
       id INT NOT NULL,
       last VARCHAR(20), 
       first VARCHAR(20), 
       sex VARCHAR(6),
       dob DATE NOT NULL, 
       dod DATE,
       PRIMARY KEY(id)
) ENGINE=INNODB;

CREATE TABLE Director (
       id INT NOT NULL,
       last VARCHAR(20),
       first VARCHAR(20),
       sex VARCHAR(6),
       dob DATE NOT NULL,
       dod DATE,
       PRIMARY KEY(id)
) ENGINE=INNODB;

CREATE TABLE MovieGenre (
       mid INT NOT NULL,
       genre VARCHAR(20),
       FOREIGN KEY (mid) REFERENCES Movie(id)
) ENGINE=INNODB;

CREATE TABLE MovieDirector(
       mid INT NOT NULL,
       did INT,
       FOREIGN KEY (mid) REFERENCES Movie(id),
       FOREIGN KEY (did) REFERENCES Director(id)
) ENGINE=INNODB;

CREATE TABLE MovieActor(
       mid INT NOT NULL,
       aid INT,
       role VARCHAR(50),
       FOREIGN KEY (mid) REFERENCES Movie(id),
       FOREIGN KEY (aid) REFERENCES Actor(id)
) ENGINE=INNODB;

CREATE TABLE Review(
       name VARCHAR(20),
       time TIMESTAMP,
       mid INT NOT NULL,
       rating INT,
       comment VARCHAR(500),
       FOREIGN KEY (mid) REFERENCES Movie(id)
) ENGINE=INNODB;

CREATE TABLE MaxPersonID(
	id INT NOT NULL
) ENGINE=INNODB;

CREATE TABLE MaxMovieID(
	id INT NOT NULL
) ENGINE=INNODB;
