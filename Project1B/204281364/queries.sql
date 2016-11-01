-- Get the names of all the actors in the movie 'Die Another Day'
SELECT CONCAT(first, ' ', last)
FROM  Movie m, MovieActor ma, Actor a
WHERE m.title = 'Die Another Day' AND m.id = ma.mid AND ma.aid=a.id;

-- Get the number of actors who acted in multiple movies
SELECT COUNT(DISTINCT m1.aid)
FROM MovieActor m1, MovieActor m2
WHERE m1.aid = m2.aid AND m1.mid > m2.mid;
-- check if this is counting actors who acted in one movie

-- Get names of all romcom movies
SELECT title
FROM Movie 
WHERE id IN (SELECT DISTINCT mg1.mid
                FROM MovieGenre mg1, MovieGenre mg2
                WHERE mg1.mid = mg2.mid AND mg1.genre = 'Romance' AND mg2.genre = 'Comedy');
