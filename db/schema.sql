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


