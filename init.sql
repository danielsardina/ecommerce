CREATE TABLE IF NOT EXISTS users (
    email VARCHAR(255) PRIMARY KEY, 
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    balance DECIMAL(10,2) DEFAULT 0.00
);

INSERT INTO users (email, name, password, balance)
VALUES ('pepe@mail.com', 'Pepe', '1234', 1500.00);
