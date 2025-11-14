CREATE TABLE IF NOT EXISTS users (
    email VARCHAR(255) PRIMARY KEY, 
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    balance DECIMAL(10,2) DEFAULT 0.00
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) DEFAULT 0.00,
    stock INT DEFAULT 0,
    image VARCHAR(255) DEFAULT NULL 
);

INSERT INTO products (name, price, stock, image)
VALUES 
    ("salmon", 12.99, 8,"./img/salmon.jpg"),
    ("bacalao", 8.55, 23,"./img/bacalao.jpg"),
    ("merluza", 6.75, 31,"./img/merluza.jpg"),
    ("rape", 9.99, 3,"./img/rape.jpg");