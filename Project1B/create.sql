CREATE TABLE Movie (
       id INT NOT NULL,
       title VARCHAR(100) NOT NULL,
       year INT,
       rating VARCHAR(10),
       company VARCHAR(50),
       -- A movie can be uniquely identified by its ID
       PRIMARY KEY(id),
       -- Ratings must conform to the standard MPAA values
       CHECK (rating IS NULL OR rating='G' OR rating='PG' OR rating='PG-13' OR rating='R' OR rating='NC-17')
) ENGINE=INNODB;

CREATE TABLE Actor (
       id INT NOT NULL,
       last VARCHAR(20), 
       first VARCHAR(20), 
       sex VARCHAR(6),
       dob DATE NOT NULL, 
       dod DATE,
       -- An actor can be uniquely identified by his/her ID
       PRIMARY KEY(id),
       -- The DOB must be before/same as the DOD
       CHECK (dod IS NULL OR dod >= dob)
) ENGINE=INNODB;

CREATE TABLE Director (
       id INT NOT NULL,
       last VARCHAR(20),
       first VARCHAR(20),
       dob DATE NOT NULL,
       dod DATE,
       -- A director can be uniquely identified by his/her ID
       PRIMARY KEY(id),
       -- The DOB must be before/same as the DOD
       CHECK (dod IS NULL OR dod >= dob)
) ENGINE=INNODB;

CREATE TABLE MovieGenre (
       mid INT NOT NULL,
       genre VARCHAR(20),
       -- The movie ID here must exist in the Movie table
       FOREIGN KEY (mid) REFERENCES Movie(id)
) ENGINE=INNODB;

CREATE TABLE MovieDirector(
       mid INT NOT NULL,
       did INT,
       -- The movie ID here must exist in the Movie table
       FOREIGN KEY (mid) REFERENCES Movie(id),
       -- The director ID here must exist in the Director table
       FOREIGN KEY (did) REFERENCES Director(id)
) ENGINE=INNODB;

CREATE TABLE MovieActor(
       mid INT NOT NULL,
       aid INT,
       role VARCHAR(50),
       -- The movie ID here must exist in the Movie table
       FOREIGN KEY (mid) REFERENCES Movie(id),
       -- The actor ID here must exist in the Actor table
       FOREIGN KEY (aid) REFERENCES Actor(id)
) ENGINE=INNODB;

CREATE TABLE Review(
       name VARCHAR(20),
       time TIMESTAMP,
       mid INT NOT NULL,
       rating INT,
       comment VARCHAR(500),
       -- The movie ID here must exist in the Movie table
       FOREIGN KEY (mid) REFERENCES Movie(id),
       -- The rating must be a value between 0 and 5 inclusive
       CHECK (rating IS NULL OR rating >= 0 AND rating <= 5)
) ENGINE=INNODB;

CREATE TABLE MaxPersonID(
	id INT NOT NULL
) ENGINE=INNODB;

CREATE TABLE MaxMovieID(
	id INT NOT NULL
) ENGINE=INNODB;
