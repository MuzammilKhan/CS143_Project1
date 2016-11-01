-- PRIMARY KEY CONSTRAINTS

-- This fails the primary key check because there is already a value with id 3
-- ERROR 1062 (23000): Duplicate entry '3' for key 'PRIMARY'
INSERT INTO Movie VALUES (3, 'Temp', 2016, 'PG', 'UCLA');

-- This fails the primary key check because there is already a value with id 10
-- ERROR 1062 (23000): Duplicate entry '10' for key 'PRIMARY'
INSERT INTO Actor VALUES (10, 'Fake', 'Person', 'Male', '1995-09-09', NULL);

-- This fails the primary key check because there is already a value with id 30256
-- ERROR 1062 (23000): Duplicate entry '30256' for key 'PRIMARY'
INSERT INTO Director VALUES (30256, 'Fake', 'Person', '1995-09-09', NULL);


-- FOREIGN KEY CONSTRAINTS

-- This fails the foreign key check since 1 is not a Movie id
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- ('TEST'.'MovieGenre', CONSTRAINT 'MovieGenre_ibfk_1' FOREIGN KEY ('mid') REFERENCES 
-- 'Movie' ('id'))
INSERT INTO MovieGenre VALUES (1, 'horror');

-- This fails the foreign key check since 1 is not a Movie id
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- ('TEST'.'MovieDirector', CONSTRAINT 'MovieDirector_ibfk_1' FOREIGN KEY ('mid') REFERENCES 
-- 'Movie' ('id'))
INSERT INTO MovieDirector VALUES (1, 30256);

-- This fails the foreign key check since 1 is not a Director id
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- ('TEST'.'MovieDirector', CONSTRAINT 'MovieDirector_ibfk_2' FOREIGN KEY ('did') REFERENCES 
-- 'Director' ('id'))
INSERT INTO MovieDirector VALUES (2, 1);

-- This fails the foreign key check since 1 is not a Movie id
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- ('TEST'.'MovieActor', CONSTRAINT 'MovieActor_ibfk_1' FOREIGN KEY ('mid') REFERENCES 
-- 'Movie' ('id'))
INSERT INTO MovieActor VALUES (1, 10, 'lead');

-- This fails the foreign key check since 5 is not an Actor id
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- ('TEST'.'MovieActor', CONSTRAINT 'MovieActor_ibfk_2' FOREIGN KEY ('mid') REFERENCES 
-- 'Actor' ('id'))
INSERT INTO MovieActor VALUES (2, 5, 'lead');

-- This fails the foreign key check since 1 is not a Movie id
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- ('TEST'.'Review', CONSTRAINT 'Review_ibfk_1' FOREIGN KEY ('mid') REFERENCES 
-- 'Movie' ('id'))
INSERT INTO Review VALUES ('review name', 1, 1, 4, 'good movie');


-- CHECK CONSTRAINTS

-- This will fail the check that ensures the movie MPAA rating is a standard value
INSERT INTO Movie VALUES (3, 'Temp', 2016, 'PGG', 'UCLA');

-- This will fail the check that ensures the DOD is after the DOB
INSERT INTO Actor VALUES (10, 'Fake', 'Person', 'Male', '1995-09-09', '1994-09-09');

-- This will fail the check that ensures the DOD is after the DOB
INSERT INTO Director VALUES (30256, 'Fake', 'Person', '1995-09-09', '1994-09-09');

-- This will fail the check that ensures that the rating is between 0 and 5 inclusive
INSERT INTO Review VALUES ('review name', 1, 2, 99, 'good movie');





