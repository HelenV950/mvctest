CREATE TABLE IF NOT EXISTS users(
id INT(10) AUTO_INCREMENT  PRIMARY KEY,
nickname VARCHAR(50) NOT NULL,
birthday DATE NOT NULL,
email VARCHAR(120) NOT NULL UNIQUE,
password TEXT NOT NULL,
created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

