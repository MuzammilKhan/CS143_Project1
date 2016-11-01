Project 1B
----------------------------------------------------
Team members: 
Muzammil Khan
Saad Syed

Primary Key constraints:
    - Movie id
    - Actor id
    - Director id

Foreign Key constraints:
    - MovieGenre mid references Movie id
    - MovieDirector mid references Movie id
    - MovieDirector did references Director id
    - MovieActor mid references Movie id
    - MovieActor aid references Actor id
    - Review mid references Movie id

Check constraints:
    - Movie: ratings must conform to the standard MPAA values: G, PG, PG-13, R, or NC-17
    - Actor: DOB must be before/same as the DOD
    - Director: DOB must be before/same as the DOD
    - Review: rating must be a value between 0 and 5 inclusive

Queries given in queries.sql:
    - Get the names of all the actors in the movie 'Die Another Day'
    - Get the number of actors who acted in multiple movies
    - Get names of all romcom movies