/*SELECT within SELECT Tutorial*/
/*Largest in each continent
7.Find the largest country (by area) in each continent, show the continent, the name and the area:8 */
select continent,name,area from world x
where area >= all
     (select area from world y
             where x.continent = y.continent)
/* First country of each continent (alphabetically)
8.List each continent and the name of the country that comes first alphabetically.*/
select continent, name from world x
where name <= all (
      select name from world y
      where x.continent = y.continent)
/*Difficult Questions That Utilize Techniques Not Covered In Prior Sections
9.Find the continents where all countries have a population <= 25000000.
Then find the names of the countries associated with these continents.
Show name, continent and population.*/
/*refer from web*/
select name,continent, population from world x
where  25000000 >= all(
          select population from world y
          where x.continent = y.continent
          and population > 0)
/*10.Some countries have populations more than three times that of any of their
 neighbours (in the same continent). Give the countries and continents.*/
/* name refer from web*/
 select name,continent from world x
 where population/3 >= all (
       select population from world y
       where population >0
       and x.continent = y.continent
       and x.name != y.name)


/*SUM and COUNT*/
/*Total world population*/
/*1.Show the total population of the world.*/
select sum(population) as POP
from world
/*2.List all the continents - just once each*/
select distinct(continent)
from world
/*3.Give the total GDP of Africa.*/
select sum(gdp)as GDP
from world
where continent = 'Africa'
/*4.How many countries have an area of at least 1000000*/
select count(name) as Countries
from world
where area >= 1000000
/*5.What is the total population of ('Estonia', 'Latvia', 'Lithuania')*/
select sum(population) as TotalPop
from world
where name in ('Estonia', 'Latvia', 'Lithuania')
/*6. For each continent show the continent and number of countries.*/
select continent, count(name)
from world
group by continent
/*7.For each continent show the continent and number of countries with populations of at least 10 million.*/
select continent, count(name)
from world
where population >= 10000000
group by continent
/*8.List the continents that have a total population of at least 100 million.*/
select continent
from world
group by continent
having sum(population) >= 100000000


/*The JOIN operation*/
/*1.Modify it to show the matchid and player name for all goals scored by Germany.
To identify German players, check for: teamid = 'GER'*/
select matchid, player
from goal
where teamid = 'GER'
/*2.Show id, stadium, team1, team2 for just game 1012*/
select id,stadium,team1,team2
from game
where id = '1012'
/*3.Modify it to show the player, teamid, stadium and mdate for every German goal.*/
select player, teamid,stadium,mdate
from game
join goal
   on (id = matchid)
where teamid = 'GER'
/*4.Show the team1, team2 and player for every goal scored by a player called Mario player LIKE 'Mario%'*/
SELECT team1, team2, player
FROM game
JOIN goal
    ON (id = matchid)
WHERE player LIKE 'Mario%'
/*5.Show player, teamid, coach, gtime for all goals scored in the first 10 minutes gtime<=10*/
SELECT player,teamid,coach,gtime
FROM goal
JOIN eteam
    ON (teamid = id)
WHERE gtime <= 10
/*6.List the the dates of the matches and the name of the team in which 'Fernando Santos' was the team1 coach.*/
SELECT mdate, teamname
FROM game
JOIN eteam
    ON (game.team1 = eteam.id)
WHERE coach = 'Fernando Santos'
/*7.List the player for every goal scored in a game where the stadium was 'National Stadium, Warsaw'*/
SELECT player
FROM goal
JOIN game
    ON (goal.matchid = game.id)
WHERE stadium = 'National Stadium, Warsaw'
/*8.Instead show the name of all players who scored a goal against Germany.*/
SELECT DISTINCT(player)
FROM goal
JOIN game
    ON (goal.matchid = game.id)
WHERE (team1 = 'GER' or team2 = 'GER')
AND teamid NOT IN ('GER')
/*9.Show teamname and the total number of goals scored.*/
SELECT teamname, COUNT(*)
FROM  goal
JOIN eteam
    ON (goal.teamid = eteam.id)
GROUP BY teamname
/*10.Show the stadium and the number of goals scored in each stadium.*/
SELECT stadium, COUNT(*) AS goals_scored
FROM game
JOIN goal
     ON (game.id = goal.matchid)
GROUP BY stadium
/*11. For every match involving 'POL', show the matchid, date and the number of goals scored.*/
SELECT matchid, mdate, COUNT(*)
FROM game
JOIN goal
   ON (game.id = goal.matchid)
WHERE (team1= 'POL' OR team2 = 'POL')
GROUP BY matchid
/*12.For every match where 'GER' scored, show matchid, match date and the number of goals scored by 'GER'*/
SELECT matchid,mdate, COUNT(*)
FROM game
JOIN goal
   ON (game.id = goal.matchid)
WHERE  teamid = 'GER'
GROUP BY matchid
/*13.List every match with the goals scored by each team as shown.
This will use "CASE WHEN" which has not been explained in any previous exercises.*/
/*The LEFT JOIN keyword returns all records from the left table (table1),
and the matched records from the right table (table2).
The result is NULL from the right side, if there is no match.*/
SELECT mdate, team1,
SUM(CASE WHEN teamid = team1 THEN 1 ELSE 0 END) AS Score1,
team2,
SUM(CASE WHEN teamid = team2 THEN 1 ELSE 0 END) AS Score2
FROM game
LEFT JOIN goal
    ON (game.id = goal.matchid)
GROUP BY mdate,matchid,team1,team2

/*More JOIN operations*/
/*1.List the films where the yr is 1962 [Show id, title]*/
SELECT id, title
 FROM movie
 WHERE yr=1962
 /*2.Give year of 'Citizen Kane'.*/
SELECT yr
FROM movie
WHERE title = 'Citizen Kane'
/*3.List all of the Star Trek movies, include the id, title and yr
(all of these movies include the words Star Trek in the title). Order results by year.*/
SELECT id,title,yr
FROM movie
WHERE title LIKE 'Star Trek%'
ORDER BY yr
/*4.What id number does the actor 'Glenn Close' have?*/
SELECT id
FROM actor
WHERE name = 'Glenn Close'
/*5.What is the id of the film 'Casablanca'*/
SELECT id
FROM movie
WHERE title = 'Casablanca'
/*6.Obtain the cast list for 'Casablanca'. what is a cast list?
The cast list is the names of the actors who were in the movie.
Use movieid=11768, (or whatever value you got from the previous question)*/
SELECT name
FROM casting
JOIN actor
    ON (casting.actorid = actor.id)
WHERE movieid = 11768
/*7.Obtain the cast list for the film 'Alien'*/
SELECT actor.name AS Name
FROM casting
JOIN actor
    ON (casting.actorid = actor.id)
JOIN movie
    ON (movie.id = casting.movieid)
WHERE title = 'Alien'
/*8.List the films in which 'Harrison Ford' has appeared*/
SELECT movie.title AS title
FROM movie
JOIN casting
     ON (movie.id = casting.movieid)
JOIN actor
     ON (casting.actorid = actor.id)
WHERE actor.name = 'Harrison Ford'
/*9.List the films where 'Harrison Ford' has appeared - but not in the starring role.
[Note: the ord field of casting gives the position of the actor.
If ord=1 then this actor is in the starring role]*/
SELECT movie.title AS Title
FROM movie
JOIN casting
     ON (movie.id = casting.movieid)
JOIN actor
     ON (casting.actorid = actor.id)
WHERE actor.name = 'Harrison Ford'
     AND casting.ord != 1
/*10.List the films together with the leading star for all 1962 films.*/
SELECT movie.title AS Films, actor.name AS Name
FROM movie
JOIN casting
    ON (movie.id = casting.movieid)
JOIN actor
    ON (casting.actorid = actor.id)
WHERE movie.yr = 1962
      AND casting.ord = 1
/*11.Which were the busiest years for 'John Travolta',
show the year and the number of movies he made each year for any year in which he made more than 2 movies.*/
/*refer from web*/
SELECT movie.yr, COUNT(*)
FROM movie
JOIN casting ON (movie.id = casting.movieid)
JOIN actor ON(casting.actorid = actor.id)
WHERE actor.name = 'John Travolta'
GROUP BY movie.yr
HAVING COUNT(*) = (SELECT MAX(C) FROM (SELECT movie.yr, COUNT(*) as C FROM movie
JOIN casting ON (movie.id = casting.movieid)
JOIN actor ON(casting.actorid = actor.id)
WHERE actor.name = 'John Travolta'
GROUP BY movie.yr) as T)
/*12.List the film title and the leading actor for all of the films 'Julie Andrews' played in.*/
/*refer from the video's solution*/
SELECT movie.title, actor.name
FROM movie
JOIN casting ON (movie.id = casting.movieid)
JOIN actor ON (casting.actorid = actor.id)
WHERE casting.ord = 1
     AND movie.id IN (SELECT casting.movieid
                       FROM casting
                       JOIN actor ON (casting.actorid = actor.id)
                       WHERE actor.name = 'Julie Andrews')
/*Obtain a list, in alphabetical order, of actors who've had at least 30 starring roles.*/
/*30 starring roles means 30 leaing roles*/
SELECT actor.name
FROM casting
JOIN actor ON(casting.actorid = actor.id)
WHERE casting.ord = 1
GROUP BY casting.actorid
HAVING COUNT(*) >= 30
ORDER BY actor.name
/*14.List the films released in the year 1978 ordered by the number of actors in the cast, then by title.*/
SELECT movie.title,COUNT(*)
FROM movie
JOIN casting ON (movie.id = casting.movieid)
WHERE movie.yr = 1978
GROUP BY movie.title
ORDER BY COUNT(*) DESC, movie.title
/*15.List all the people who have worked with 'Art Garfunkel'.*/
SELECT actor.name
FROM movie
JOIN casting ON (movie.id = casting.movieid)
JOIN actor ON(casting.actorid = actor.id)
WHERE movie.id IN (SELECT casting.movieid
                       FROM casting
                       JOIN actor ON (casting.actorid = actor.id)
                       WHERE actor.name = 'Art Garfunkel')
AND name != 'Art Garfunkel'


/*Using Null*/
/*1.List the teachers who have NULL for their department. Why we cannot use =   */
SELECT name
FROM teacher
WHERE dept IS NULL
/*2.Note the INNER JOIN misses the teachers with no department and the departments with no teacher.*/
SELECT teacher.name, dept.name
FROM teacher
INNER JOIN dept ON (teacher.dept = dept.id)
/*3.Use a different JOIN so that all teachers are listed.*/
SELECT teacher.name, dept.name
FROM teacher
LEFT JOIN dept ON (teacher.dept = dept.id)
/*4.Use a different JOIN so that all departments are listed.*/
SELECT teacher.name, dept.name
FROM teacher
RIGHT JOIN dept ON (teacher.dept = dept.id)
/*5.Use COALESCE to print the mobile number. Use the number '07986 444 2266' if there is no number given.
Show teacher name and mobile number or '07986 444 2266' */
SELECT teacher.name, COALESCE(teacher.mobile,'07986 444 2266') AS num
FROM teacher
/*6.Use the COALESCE function and a LEFT JOIN to print the teacher name and department name.
Use the string 'None' where there is no department.*/
SELECT teacher.name, COALESCE(dept.name, 'None') AS dept
FROM teacher
LEFT JOIN dept ON (teacher.dept = dept.id)
/*7.Use COUNT to show the number of teachers and the number of mobile phones.*/
SELECT COUNT(teacher.id), COUNT(teacher.mobile)
FROM teacher
/*8.Use COUNT and GROUP BY dept.name to show each department and the number of staff.
Use a RIGHT JOIN to ensure that the Engineering department is listed.*/
SELECT dept.name, COUNT(teacher.id)
FROM teacher
RIGHT JOIN dept ON (teacher.dept = dept.id)
GROUP BY dept.name
/*9.Use CASE to show the name of each teacher followed by 'Sci' if the teacher is in dept 1 or 2 and 'Art' otherwise.*/
SELECT teacher.name
             , CASE WHEN teacher.dept = 1 THEN 'Sci'
                         WHEN teacher.dept = 2 THEN 'Sci'
                         ELSE 'Art'
               END
FROM teacher
LEFT JOIN dept ON (teacher.dept = dept.id)
/*10.Use CASE to show the name of each teacher followed by 'Sci' if the teacher is in dept 1 or 2,
show 'Art' if the teacher's dept is 3 and 'None' otherwise.*/
SELECT teacher.name
              , CASE WHEN teacher.dept = 1 THEN 'Sci'
                          WHEN  teacher.dept = 2 THEN 'Sci'
                          WHEN teacher.dept = 3 THEN 'Art'
                          ELSE 'None'
                END
FROM teacher
LEFT JOIN dept ON (teacher.dept = dept.id)


/*Self join*/
/*1.How many stops are in the database.*/
SELECT COUNT(DISTINCT(stops.id))
FROM stops
/*2.Find the id value for the stop 'Craiglockhart'*/
SELECT stops.id
FROM stops
WHERE stops.name = 'Craiglockhart'
/*3.Give the id and the name for the stops on the '4' 'LRT' service.*/
SELECT stops.id, stops.name
FROM stops
JOIN route ON stops.id = route.stop
WHERE route.num = 4
     AND route.company = 'LRT'
/*4.The query shown gives the number of routes that visit either London Road (149) or Craiglockhart (53).
Run the query and notice the two services that link these stops have a count of 2.
Add a HAVING clause to restrict the output to these two routes.*/
SELECT company, num, COUNT(*)
FROM route WHERE stop=149 OR stop=53
GROUP BY company, num
HAVING COUNT(*) =2
/*5.Execute the self join shown and observe that b.stop gives all the places you can get to from Craiglockhart,
without changing routes. Change the query so that it shows the services from Craiglockhart to London Road.*/
SELECT a.company, a.num, a.stop, b.stop
FROM route a JOIN route b ON
  (a.company=b.company AND a.num=b.num)
WHERE a.stop=53 AND b.stop = 149
/*6.The query shown is similar to the previous one, however by joining two copies of the stops table we can refer
to stops by name rather than by number. Change the query so that the services between 'Craiglockhart' and 'London Road'
are shown. If you are tired of these places try 'Fairmilehead' against 'Tollcross'*/
SELECT a.company,a.num,stopa.name,stopb.name
FROM route a JOIN route b ON
           (a.company = b.company AND a.num = b.num)
           JOIN stops stopa ON (a.stop = stopa.id)
           JOIN stops stopb ON (b.stop = stopb.id)
WHERE stopa.name = 'Craiglockhart'  AND stopb.name = 'London Road'
/*7.Give a list of all the services which connect stops 115 and 137 ('Haymarket' and 'Leith')*/
SELECT a.company,a.num
FROM route a
JOIN route b ON (a.company = b.company AND a.num = b.num)
WHERE a.stop = 115 AND b.stop = 137
GROUP BY a.num
/*8.Give a list of the services which connect the stops 'Craiglockhart' and 'Tollcross'*/
SELECT a.company,a.num
FROM route a JOIN route b ON
            (a.company = b.company AND a.num = b.num)
            JOIN stops stopa ON (a.stop = stopa.id)
            JOIN stops stopb ON (b.stop = stopb.id)
WHERE stopa.name = 'Craiglockhart' AND stopb.name = 'Tollcross'
/*9.Give a distinct list of the stops which may be reached from 'Craiglockhart' by taking one bus,
including 'Craiglockhart' itself, offered by the LRT company. Include the company and bus no. of the relevant services.*/
SELECT stopb.name,a.company,a.num
FROM route a
JOIN route b ON(a.company = b.company AND a.num = b.num)
JOIN stops stopa ON (a.stop = stopa.id)
JOIN stops stopb ON (b.stop = stopb.id)
WHERE stopa.name = 'Craiglockhart'
  AND a.company = 'LRT'
/*10.Find the routes involving two buses that can go from Craiglockhart to Sighthill.
Show the bus no. and company for the first bus, the name of the stop for the transfer,
and the bus no. and company for the second bus.*/
SELECT a.num,a.company,stopb.name,b.num,b.company
FROM route a
JOIN route b ON(a.company = b.company AND a.num = b.num)
JOIN route c ON(b.company = c.company AND b.num = c.num)
JOIN stops stopa ON (a.stop = stopa.id)
JOIN stops stopb ON (b.stop = stopb.id)
JOIN stops stopc ON (c.stop = stopc.id)
WHERE stopa.name = 'Craiglockhart'
  AND stopc.name = 'Sighthill'

SELECT DISTINCT a.num, a.company, stopb.name , c.num,  c.company
FROM route a JOIN route b
ON (a.company = b.company AND a.num = b.num)
JOIN ( route c JOIN route d ON (c.company = d.company AND c.num= d.num))
JOIN stops stopa ON (a.stop = stopa.id)
JOIN stops stopb ON (b.stop = stopb.id)
JOIN stops stopc ON (c.stop = stopc.id)
JOIN stops stopd ON (d.stop = stopd.id)
WHERE  stopa.name = 'Craiglockhart' AND stopd.name = 'Sighthill'
            AND  stopb.name = stopc.name
ORDER BY LENGTH(a.num), b.num, stopb.id, LENGTH(c.num), d.num
