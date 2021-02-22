ALTER TABLE athletes
RENAME COLUMN identified_gender TO gender;

INSERT INTO schema_migrations (migration, migrated_at) VALUES
('20210222182200-update-athletes.sql', '2021-02-22 18:22:00'); 
