  -- CREATE DB AND TABLES --
  
  CREATE DATABASE IF NOT EXISTS hotel;

  USE hotel;

  CREATE TABLE IF NOT EXISTS customer (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    dni VARCHAR (15) NOT NULL UNIQUE,
    password VARCHAR (100) NOT NULL,
    email VARCHAR (100) NOT NULL UNIQUE,
    phone VARCHAR (20) NOT NULL,
    card_number VARCHAR (50) NOT NULL UNIQUE
  )

 CREATE TABLE IF NOT EXISTS roomType (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    roomPrice FLOAT (20) NOT NULL,    
    roomType ENUM('individual', 'doble', 'triple', 'cuadruple'),
    amountOfGuests int(5) NOT NULL
  );

  CREATE TABLE IF NOT EXISTS room (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    roomNumber VARCHAR (5) NOT NULL UNIQUE,
    roomTypeId INT(11) NOT NULL,
    FOREIGN KEY (roomTypeId) REFERENCES roomType(id) ON DELETE CASCADE ON UPDATE CASCADE
  )

  CREATE TABLE IF NOT EXISTS book (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    roomId INT(11) NOT NULL,
    customerId INT(11) NOT NULL,
    dateIn date NOT NULL,
    dateOut date NOT NULL,
    bookNote text (500) NULL,
    bookCode VARCHAR(10) NOT NULL,
    FOREIGN KEY (roomId) REFERENCES room(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (customerId) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE
  )

-- INSERTS --
INSERT INTO roomType (roomPrice, roomType, amountOfGuests) VALUES
(20, 'individual', 1),
(30, 'doble', 2),
(40, 'individual', 3),
(50, 'cuadruple', 4);

-- 10 habitaciones individuales, 15 triples, 10 cuádruples. 
INSERT INTO room (roomNumber, roomTypeId) VALUES
('100', 1),
('101', 1),
('102', 1),
('103', 1),
('104', 1),
('105', 1),
('106', 1),
('107', 1),
('108', 1),
('109', 1);

-- 15 habitaciones dobles
INSERT INTO room (roomNumber, roomTypeId) VALUES
('200', 2),
('201', 2),
('202', 2),
('203', 2),
('204', 2),
('205', 2),
('206', 2),
('207', 2),
('208', 2),
('209', 2),
('210', 2),
('211', 2),
('212', 2),
('213', 2),
('214', 2);

-- 15 habitaciones triples
INSERT INTO room (roomNumber, roomTypeId) VALUES
('300', 3),
('301', 3),
('302', 3),
('303', 3),
('304', 3),
('305', 3),
('306', 3),
('307', 3),
('308', 3),
('309', 3),
('310', 3),
('311', 3),
('312', 3),
('313', 3),
('314', 3);
  
-- 10 cuádruples
INSERT INTO room (roomNumber, roomTypeId) VALUES
('400', 4),
('401', 4),
('402', 4),
('403', 4),
('404', 4),
('405', 4),
('406', 4),
('407', 4),
('408', 4),
('409', 4);

-- DEMO CUSTOMER --
-- psswd = 123456
INSERT INTO customer (name, surname, dni, password, email, phone, card_number) VALUES
('Tyler', 'Durden', '00000000x', '7c4a8d09ca3762af61e59520943dc26494f8941b','tdurden@streetsoap.com','5555-0153','4444888877779999');

INSERT INTO book (roomId, customerId, dateIn, dateOut, bookNote, bookCode) VALUES
(1, 1, '2020-1-1', '2020-2-1', 'Llegaré algo tarde','AAA');



SELECT r.id, r.roomNumber, rt.roomType
FROM room r 
LEFT JOIN roomType rt ON r.roomTypeId = rt.id
WHERE r.id NOT IN 
  ( SELECT b.roomId 
    FROM book b 
    WHERE (b.dateOut <= '2020-02-01' AND b.dateIn <= '2012-01-01') 
    OR (b.dateOut >= '2020-02-01' AND b.dateIn >= '2012-01-01')
  ) 
  AND rt.amountOfGuests = 1
  GROUP BY r.id
  ORDER BY r.id;