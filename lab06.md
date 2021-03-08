# CSI2532 Lab 6

|name|student number|
|---|---|
|Chedli Redissi| 300074863|


#### Schema  
```sql
CREATE TABLE artists (
 name VARCHAR(20),
 birthplace VARCHAR(20),
 style VARCHAR(20),
 dateofbirth DATE,
 country varchar(100),
 PRIMARY KEY (name)
);

CREATE TABLE customers (
 id INTEGER,
 name VARCHAR(20),
 address VARCHAR(20),
 amount numeric(8,2),
 rating integer CHECK (rating between 1 and 10),
 PRIMARY KEY (id)
);

CREATE TABLE artworks (
 title VARCHAR(20),
 year INTEGER,
 type VARCHAR(20),
 price numeric(8,2),
 artist_name VARCHAR(20),
 PRIMARY KEY (title),
 FOREIGN KEY(artist_name) REFERENCES artists(name)
 ON DELETE CASCADE
 ON UPDATE CASCADE
);

CREATE TABLE likeartists (
 customer_id INTEGER,
 artist_name VARCHAR(20),
 PRIMARY KEY(artist_name, customer_id),
 FOREIGN KEY (artist_name) REFERENCES artists(name),
 FOREIGN KEY (customer_id) REFERENCES customers(id)
);
```


##### Lister les name et birthplace de tous les artists
```sql
 SELECT name, birthplace FROM artists;
```

output:
```
     name     |  birthplace
--------------+---------------
 Caravaggio   | Milan
 Picasso      | Malaga
 Leonardo     | Florence
 Michelangelo | Arezzo
 Josefa       | Seville
 Hans Hofmann | Weisenburg
 John         | San Francisco
(7 rows)
```

##### Lister le title et le price de toutes les artworks après 1600. (On suppose on ne prend pas les artworks en 1600)
```sql
 SELECT title, price FROM artworks WHERE year > 1600;
```

output:
```
      title      |  price
-----------------+----------
 Three Musicians | 11000.00
(1 row)
```

##### Lister le title et le type de toutes les artworks qui ont été peintes en 2000 ou peintes par Picasso.
```sql
 SELECT title, price 
  FROM artworks 
  JOIN artists ON artists.name=artworks.artist_name
  WHERE artworks.year = 2000 OR artists.name = 'Picasso';
```

output:
```
      title      |  price
-----------------+----------
 Three Musicians | 11000.00
(1 row)
```

##### Lister les name et birthplace de tous les artists nés entre 1880 et 1930. (ASTUCE: EXTRACT(YEAR FROM dateofbirth) vous donne l'année à partir d'un attribut DATE)
```sql
 SELECT name, birthplace 
  FROM artists 
  WHERE EXTRACT(YEAR FROM dateofbirth) BETWEEN 1880 AND 1930;
```

output:
```
  name   |  birthplace
---------+---------------
 Picasso | Malaga
 John    | San Francisco
(2 rows)
```

##### Lister les name et le country de naissance de tous les artists dont le style de peinture est Modern, Baroque or Renaissance. (ASTUCE: utilisez le mot-clé IN).
```sql
 SELECT name, country 
  FROM artists 
  WHERE style IN ('Modern', 'Baroque', 'Renaissance');
```

output:
```
     name     | country
--------------+---------
 Caravaggio   |
 Leonardo     | Italy
 Michelangelo | Italy
 Josefa       | Spain
 Hans Hofmann | Germany
 John         | USA
(6 rows)
```

##### Lister tous les détails des artworks dans la base de données, triés par title
```sql
 SELECT * FROM artworks ORDER BY title;
```

output:
```
      title      | year |  type   |  price   | artist_name
-----------------+------+---------+----------+-------------
 The Cardsharps  | 1594 | Baroque | 40000.00 | Caravaggio
 Three Musicians | 1921 | Modern  | 11000.00 | Picasso
(2 rows)
```

##### Lister les name et les customer ids de tous les customers qui aiment Picasso.
```sql
 SELECT c.name, l.customer_id
  FROM likeartists AS l
  JOIN customers AS c ON l.customer_id=c.id
  WHERE l.artist_name='Picasso';
```

output:
```
 name  | customer_id
-------+-------------
 Emre  |           4
 Saeid |           5
(2 rows)
```

##### Lister les name de tous les customers qui aiment les artistes de style Renaissance et dont le price est supérieur à 30000.
```sql
 SELECT c.name 
  FROM customers AS c, 
 	likeartists AS l, 
 	artworks as w, 
 	artists as a 
  WHERE c.id = l.customer_id
   AND l.artist_name=a.name
   AND l.artist_name=w.artist_name
   AND a.style='Renaissance'
   AND w.price > 30000;
```

output:
```
 name
------
(0 rows)
```


