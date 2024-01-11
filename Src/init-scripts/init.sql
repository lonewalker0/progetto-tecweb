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
VALUES ('2024-07-05', '19:30:00', 'assets/artisti/night-skinny.png', "Nella prima serata del festival, l'apertura sarà affidata al dj e produttore Night Skinny, considerato uno dei maggiori esponenti della scena rap italiana, con numerose collaborazioni con gli artisti nostrani del genere musicale.", 'The Night Skinny');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-05', '21:00:00', 'assets/artisti/kid-yugi.png', "Dopo il dj-set proposto da Night Skinny, l'evento prosegue con uno dei suoi collaboratori più affermati: Kid Yugi. Singolo dopo singolo gli sguardi della scena e del pubblico si poggiano sempre più di lui, raggiungendo l'apice con la pubblicazione di The Globe, il suo primo disco ufficiale, a novembre 2022.
In 12 brani segna un esordio da rookie dell'anno.", 'Kid Yugi');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-05', '22:30:00', 'assets/artisti/tony-boy.png', "La serata si conclude con l'artista di zona più influente dell'ultimo periodo. Tony Boy, rapper classe '99 nato a Padova, spicca per la sua capacità di scrittura, interpretazione e versatilità nel flow, mischiando tematiche sentimentali con un'attitudine più cruda.", 'Tony Boy');


INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '19:15:00', 'assets/artisti/radical.png', "Radical è un cantante e producer romano, classe '95. Esordisce su Soundcloud nel 2017, figurando tra i fondatori e maggiori interpreti della scena Soundcloud Rap italiana; il performer emerge per l'attitudine dinamica e la straordinaria disinvoltura nella sperimentazione a partire dal genere trap, con numerosi crossover nel rock e l'elettronica. Contaminazioni di Cloud Rap e Metal sono una costante della sua produzione musicale. ", 'Radical');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '20:30:00', 'assets/artisti/zyrtck.png', "Zyrtck è un artista romano di genere alternative trap, tra le proposte più in vista della già citata scena Soundcloud romana. Ballerino di background con un innata vocalità ed espressività, ha iniziato a parlare di “MOVIMENTO” come proprio trademark sin dai primi pezzi pubblicati sulla Nuvola Arancione.", 'Zyrtck');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '21:15:00', 'assets/artisti/thelonius-b.png', "Hanno pubblicato solo un disco ufficiale, ma i Thelonious B. sono in giro da parecchio tempo. Nel 2020, questo duo iconico in bilico fra post-trap e emo-rap ha dato vita al primo album THB, che ha macinato milioni di stream sulle piattaforme e attirato l'attenzione di una grossa fetta di pubblico del genere. Poi, il successo nazionale grazie ad alcune hit e collaborazioni realizzate con Daytona KK, Rosa Chemical e Radical.", 'Thelonius B');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '22:30', 'assets/artisti/rosa-chemical.png', "Rosa Chemical è un artista poliedrico, eclettico, dalle mille sfaccettature e non etichettabile, non ha dato sfogo alla sua creatività solo a livello musicale, con influenze che spaziano dall'hiphop alla trap all'elettronica, ma lavorando anche come modello per la marca italiana di moda Gucci, come art and creative director e dedicandosi anche alla scrittura di videoclip.", 'Rosa Chemical');


INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-07', '16:30:00', 'assets/artisti/', "To, nome d'arte di Mario Manuel Bruno (Paola, 14 giugno 2000), è un rapper e produttore italiano, originario di Milano. Patto Sliterich l'unica attività trap in Italia.", 'Tony2Milli2');


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
( 'Giornata Singola', 'Giornata Singola - 5 Luglio','assets/biglietti/biglietto.png', '2023-07-05 12:00:00', '2023-07-06 02:30:00', 50.00),
( 'Giornata Singola', 'Giornata Singola - 6 Luglio','assets/biglietti/biglietto.png', '2023-07-06 15:00:00', '2023-07-07 04:30:00', 55.00),
( 'Giornata Singola', 'Giornata Singola - 7 Luglio','assets/biglietti/biglietto.png', '2023-07-07 15:30:00', '2023-07-08 02:00:00', 50.00),
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
('assets/merchitem/redT.png', 'Festival T-Shirt', 'Rosso', 19.99, 'T-shirt a maniche corta comoda e perfetta per i festival.'),

('assets/merchitem/bluecap.png', 'Braccialetto in Pelle', 'Nero', 9.99, 'Braccialetto in pelle nera con logo del festival.'),

('assets/merchitem/bluecap.png', 'Cappellino Estivo', 'Blu', 14.99, 'Cappello estivo blu per mantenerti fresco sotto il sole del festival.





');
