DROP DATABASE IF EXISTS dbtecweb;
CREATE DATABASE IF NOT EXISTS dbtecweb;
USE dbtecweb;

CREATE TABLE users (
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN NOT NULL
);

INSERT INTO users (username, password, is_admin) VALUES ('admin', '$2y$10$sJAmdb2vfldMZ3hFwPJCVOR5GoUKLocPQsGhlouVHw8sx8V5WnSuO', 1);

CREATE TABLE Programma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    hour TIME,
    image_path VARCHAR(255),
    description TEXT,
    artist_name VARCHAR(100)
);


INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "Tony 2Milli, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "Tony 2Milli, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "To, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli');




