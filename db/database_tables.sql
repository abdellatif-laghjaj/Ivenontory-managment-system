-- CREATE
-- DATABASE ecommerce;

-- USE
-- ecommerce;

CREATE TABLE Admin
(
    adminID   int PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(20),
    username  VARCHAR(20),
    password  VARCHAR(20),
    email     VARCHAR(20),
    phone     VARCHAR(20)
);

CREATE TABLE Customer
(
    customerID int PRIMARY KEY AUTO_INCREMENT,
    full_name  VARCHAR(20),
    userName   VARCHAR(20),
    password   TEXT,
    addresse   VARCHAR(50),
    email      VARCHAR(50),
    phone      VARCHAR(20)
);

CREATE TABLE Category
(
    categoryID     int PRIMARY KEY AUTO_INCREMENT,
    category_name  VARCHAR(20) UNIQUE,
    products_total int
);

CREATE TABLE Product
(
    productID     int PRIMARY KEY AUTO_INCREMENT,
    name          VARCHAR(20),
    desription    VARCHAR(255),
    category      VARCHAR(20),
    CONSTRAINT FK_CI FOREIGN KEY (category) REFERENCES Category (category_name),
    stock         int,
    sale_price    decimal,
    buy_price     decimal,
    product_image blob
);

CREATE TABLE Sale
(
    saleID     int PRIMARY KEY AUTO_INCREMENT,
    customerID int,
    productID  int,
    CONSTRAINT FK_SC FOREIGN KEY (customerID) REFERENCES Customer (customerID),
    CONSTRAINT FK_SP FOREIGN KEY (productID) REFERENCES Product (productID),
    quantity   int,
    earning    decimal,
    sale_date  date
);

CREATE TABLE comment
(
    comment_id   int PRIMARY KEY AUTO_INCREMENT,
    customer_id  int,
    product_id   int,
    CONSTRAINT FK_CustomerC FOREIGN KEY (customer_id) REFERENCES Customer (customerID),
    CONSTRAINT FK_ProductC FOREIGN KEY (product_id) REFERENCES Product (productID),
    comment_body varchar(255),
    comment_date datetime
);