CREATE DATABASE IF NOT EXISTS ezcustomers;
USE ezcustomers;

CREATE TABLE users
(
  id           INT PRIMARY KEY AUTO_INCREMENT,
  name         VARCHAR(32)            NOT NULL,
  password     VARCHAR(32)            NOT NULL,
  email        VARCHAR(100)           NOT NULL,
  is_admin     BOOLEAN DEFAULT FALSE  NOT NULL,
  created_at   DATETIME DEFAULT now() NOT NULL,
  updated_at   DATETIME DEFAULT now() NOT NULL
);
CREATE UNIQUE INDEX users_name_uindex
  ON users (name);

CREATE TABLE customers
(
  id         INT PRIMARY KEY AUTO_INCREMENT,
  user_id    INT                    NOT NULL,
  dni        VARCHAR(9)             NOT NULL,
  first_name VARCHAR(50)            NOT NULL,
  last_names VARCHAR(200)           NOT NULL,
  email      VARCHAR(255)           NOT NULL,
  birth_date DATE                   NOT NULL,
  created_at DATETIME DEFAULT now() NOT NULL,
  updated_at DATETIME DEFAULT now() NOT NULL
);
CREATE UNIQUE INDEX customers_names_uindex
  ON customers (first_name, last_names);
CREATE UNIQUE INDEX customers_dni_uindex
  ON customers (dni);
CREATE UNIQUE INDEX customers_email_uindex
  ON customers (email);

CREATE TABLE bills
(
  id             INT PRIMARY KEY AUTO_INCREMENT,
  customer_id    INT                    NOT NULL,
  concept        VARCHAR(255)           NOT NULL,
  notes          TEXT,
  amount         DOUBLE                 NOT NULL,
  paid           BOOLEAN DEFAULT FALSE  NOT NULL,
  payment_method VARCHAR(50),
  created_at     DATETIME DEFAULT now() NOT NULL,
  updated_at     DATETIME DEFAULT now() NOT NULL,
  CONSTRAINT bills_customers_id_fk
  FOREIGN KEY (customer_id) REFERENCES customers (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

INSERT INTO users (name, password, email, is_admin)
VALUES ('admin', md5('admin'), 'admin@ez-customers.com', TRUE);
