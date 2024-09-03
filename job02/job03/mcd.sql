CREATE TABLE Products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    photos VARCHAR(255),
    description VARCHAR(255),
    quantity INT,
    createdAt DATETIME,
    updatedAt DATETIME,
    category_id INT
);

CREATE TABLE Category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description VARCHAR(255),
    createdAt DATETIME,
    updatedAt DATETIME
);