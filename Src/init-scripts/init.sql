DROP DATABASE IF EXISTS dbtecweb;
CREATE DATABASE IF NOT EXISTS dbtecweb;
USE dbtecweb;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password) VALUES
    ('user1', 'password1'),
    ('user2', 'password2'); 


-- Create the table with an additional column for the artist's name
CREATE TABLE Programma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    hour TIME,
    image_path VARCHAR(255),
    description TEXT,
    artist_name VARCHAR(100)
);

-- Insert a new record with the artist's name
INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "Tony 2Milli, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "Tony 2Milli, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-5', '16:30:00', 'assets/artisti/tony2milli.jpg', "To, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia. ", 'Tony2Milli');




