CREATE TABLE tools (
    tool_id INT NOT NULL AUTO_INCREMENT,
    tool_name VARCHAR(50) NOT NULL,
    tool_category VARCHAR(50) NOT NULL,
    tool_price DECIMAL(10, 2) NOT NULL,
    tool_brand VARCHAR(50) NOT NULL,
    PRIMARY KEY (tool_id)
);






INSERT INTO tools (tool_name, tool_category, tool_price, tool_brand)
VALUES
('Hammer', 'Handgereedschap', 14.99, 'Hultafors'),
('Schroevendraaierset', 'Handgereedschap', 19.99, 'Stanley'),
('Moersleutelset', 'Handgereedschap', 29.99, 'Bahco'),
('Boormachine', 'Elektrisch gereedschap', 99.99, 'Bosch'),
('Cirkelzaag', 'Elektrisch gereedschap', 149.99, 'Makita'),
('Slijpmachine', 'Elektrisch gereedschap', 79.99, 'Metabo'),
('Schuurmachine', 'Elektrisch gereedschap', 39.99, 'Black & Decker'),
('Haakse slijper', 'Elektrisch gereedschap', 89.99, 'Festool'),
('Combinatietang', 'Handgereedschap', 12.99, 'Knipex'),
('Waterpas', 'Meetgereedschap', 9.99, 'BMI'),
('Rolmaat', 'Meetgereedschap', 7.99, 'Stanley'),
('Multimeter', 'Meetgereedschap', 24.99, 'Fluke'),
('Tegelsnijder', 'Tegelgereedschap', 49.99, 'Rubi'),
('Voegenkrabber', 'Tegelgereedschap', 7.99, 'Norton'),
('Kitpistool', 'Kitgereedschap', 12.99, 'Tesa'),
('Lijmpistool', 'Lijmgereedschap', 19.99, 'Bison'),
('Stofzuiger', 'Stofafzuiging', 119.99, 'Kärcher'),
('Verfafbrander', 'Verfgereedschap', 39.99, 'Steinel'),
('Verfroller', 'Verfgereedschap', 9.99, 'Anza'),
('Plamuurmes', 'Verfgereedschap', 6.99, 'Goudhaantje');

/*
Onderstaande code gaan we ook gebruiken maar op een later moment
CREATE TABLE categories (
    category_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (category_id)
);

INSERT INTO categories(name) VALUES 
('Handgereedschap'),
('Elektrisch gereedschap'),
('Tegelgereedschap'),
('Meetgereedschap'),
('Kitgereedschap'),
('Lijmgereedschap'),
('Stofafzuiging'),
('Verfgereedschap');
