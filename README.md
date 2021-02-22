# CSI2532 Lab 5 Migrations

![lab 2](./lab2.md)

![lab 3](./lab3.md)

![lab 4](./lab4.md)

|name|student number|
|---|---|
|Chedli Redissi| 300074863|


#### Schema  
```sql
CREATE TABLE athletes (
	id int,
	name varchar(300),
	dob date,
	gender varchar(50),
	PRIMARY KEY (id)
);

CREATE TABLE schema_migrations (
 	migration varchar(255),
 	migrated_at time,
 	PRIMARY KEY (migration)
);
```


##### Test migration 1
```sql
INSERT INTO athletes (id, name, identified_gender, dob) VALUES
	(1, 'Andrew', 'm', '1975-12-01'),
	(2, 'Ayana', 'F', '1998-06-11'),
	(3, 'Hayden', 'm', '1996-07-24'),
	(4, 'August', 'm', '1999-09-09');
```

##### Test migration 2
```sql
DELETE FROM athletes;
	INSERT INTO athletes (id, name, gender, dob) VALUES
	(1, 'Andrew', 'm', '1975-12-01'),
	(2, 'Ayana', 'F', '1998-06-11'),
	(3, 'Hayden', 'm', '1996-07-24'),
	(4, 'August', 'm', '1999-09-09');
```
