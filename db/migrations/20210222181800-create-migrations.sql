CREATE TABLE schema_migrations (
 	migration varchar(255),
 	migrated_at time,
 	PRIMARY KEY (migration)
);

INSERT INTO schema_migrations (migration, migrated_at) VALUES
('20210222181200-create-athletes.sql', '2021-02-22 18:12:00');

INSERT INTO schema_migrations (migration, migrated_at) VALUES 
('20210222181800-create-migrations.sql', '2021-02-22 18:18:00');
