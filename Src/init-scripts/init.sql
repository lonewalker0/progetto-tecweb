DROP DATABASE IF EXISTS dbtecweb;
CREATE DATABASE IF NOT EXISTS dbtecweb;
USE dbtecweb;

CREATE TABLE users (
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN NOT NULL,
    nome VARCHAR(255),
    cognome VARCHAR(255),
    data_nascita DATE,
    indirizzo VARCHAR(255),
    email VARCHAR(255) UNIQUE
);

INSERT INTO users (username, password, is_admin) VALUES 
('admin', '$2y$10$sJAmdb2vfldMZ3hFwPJCVOR5GoUKLocPQsGhlouVHw8sx8V5WnSuO', 1);

INSERT INTO users (username, password, is_admin, nome, cognome,data_nascita, indirizzo,email) VALUES
('user','$2y$10$8D4EMtUVTkZfOgKcqqXOtubJyVKSPpyku96UT20NGo7znAb6pabQS',0,'user','user','1990-01-15','via dei crucchi 45','user@user.com');

CREATE TABLE Programma (
    artist_name VARCHAR(100) PRIMARY KEY,
    date DATE,
    hour TIME,
    image_path VARCHAR(255),
    description TEXT
);



INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "Tony 2Milli, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "Tony 2Milli, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli1');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "To, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli2');


CREATE TABLE Biglietti (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    descrizione VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    data_ora_inizio DATETIME,
    data_ora_fine DATETIME,
    prezzo DECIMAL(10, 2) NOT NULL
);

INSERT INTO Biglietti (nome, descrizione, image_path, data_ora_inizio, data_ora_fine, prezzo) VALUES
( 'GiornataSingola', 'Giornata Singola - 5 Luglio','assets/biglietti/biglietto.png', '2023-07-05 12:00:00', '2023-07-06 02:30:00', 50.00),
( 'GiornataSingola', 'Giornata Singola - 6 Luglio','assets/biglietti/biglietto.png', '2023-07-06 15:00:00', '2023-07-07 04:30:00', 55.00),
( 'GiornataSingola', 'Giornata Singola - 7 Luglio','assets/biglietti/biglietto.png', '2023-07-07 15:30:00', '2023-07-08 02:00:00', 50.00),
( 'Intero', 'Intero comprende tutte le giornate','assets/biglietti/biglietto.png','2023-07-05 12:00:00' ,'2023-07-08 02:00:00' , 110.00),
( 'vip', 'VIP tutte le giornate con inclusi incontri con gli artisti','assets/biglietti/biglietto.png','2023-07-05 12:00:00' ,'2023-07-08 02:00:00', 150.00);

CREATE TABLE Ordini (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    id_biglietto INT NOT NULL,
    quantita INT NOT NULL,
    data_acquisto DATETIME NOT NULL,
    prezzo FLOAT NOT NULL,
    FOREIGN KEY (username) REFERENCES users(username),
    FOREIGN KEY (id_biglietto) REFERENCES Biglietti(id)
);


CREATE TABLE Shop (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productImage VARCHAR(255),
    productName VARCHAR(255),
    productColor VARCHAR(50),
    productPrice DECIMAL(10, 2),
    productLongDescription TEXT
);


INSERT INTO Shop (productImage, productName, productColor, productPrice, productLongDescription)
VALUES
('assets/merchitem/redT.png', 'Festival T-Shirt', 'Rosso', 19.99, 'Maglietta rossa comoda e alla moda, perfetta per i festival.'),

('assets/merchitem/bluecap.png', 'Braccialetto in Pelle', 'Nero', 9.99, 'Braccialetto in pelle nera con logo del festival.'),

('assets/merchitem/bluecap.png', 'Cappellino Estivo', 'Blu', 14.99, 'Cappello estivo blu per mantenerti fresco sotto il sole del festival.





');
