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


/* % Luglio */
INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-05', '21:00:00', 'assets/artisti/night-skinny.png', "<span lang='en'>Producer</span> e ingegnere del suono in ambito hip hop, Night Skinny è considerato uno dei maggiori esponenti della scena rap italiana, con numerose collaborazioni con gli artisti nostrani del genere musicale.", 'The Night Skinny');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-05', '22:00:00', 'assets/artisti/kid-yugi.png', "Kid Yugi è uno dei nomi più caldi della scena rap italiana. Singolo dopo singolo gli sguardi del pubblico si poggiano sempre più su di lui, raggiungendo l'apice con la pubblicazione di <cite lang='en'>The Globe</cite>, il suo primo disco ufficiale, a <time datetime='2022-11-01'>novembre 2022</time>. In 12 brani segna un esordio da rookie dell'anno.", 'Kid Yugi');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-05', '23:00:00', 'assets/artisti/tony-boy.png', "Tony Boy, rapper classe <abbr title='1999'>'99</abbr> nato a Padova, spicca per la sua capacità di scrittura, interpretazione e versatilità nel <span lang='en'>flow</span>, mischiando tematiche sentimentali con un'attitudine più cruda.", 'Tony Boy');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-05', '23:30:00', 'assets/artisti/peggy-gou.png', "La rivoluzionaria regina della musica elettronica Peggy Gou, ritorna in Italia! Dopo il trionfale successo di <cite lang='en'>It Goes Like Nanana</cite>, Peggy è pronta a trasformare TechnoLum250 Festival in un grande evento <span lang='en'>dance</span> per tutti i suoi fan Italiani!", 'Peggy Gou');


/* 6 Luglio */
INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '21:00:00', 'assets/artisti/radical.png', "Radical è un cantante e <span lang='en'>producer</span> romano, classe <abbr title='1995'>'95</abbr>. Esordisce su Soundcloud nel <time datetime='2017'>2017</time>, figurando tra i fondatori e maggiori interpreti della scena Soundcloud Rap italiana; il performer emerge per l'attitudine dinamica e la straordinaria disinvoltura nella sperimentazione a partire dal genere trap, con numerosi crossover nel rock e l'elettronica. Contaminazioni di Cloud Rap e Metal sono una costante della sua produzione musicale. ", 'Radical');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '22:00:00', 'assets/artisti/zyrtck.png', "Zyrtck è un artista romano di genere alternative trap, tra le proposte più in vista della già citata scena Soundcloud romana. Ballerino di background con un innata vocalità ed espressività, ha iniziato a parlare di <cite>MOVIMENTO</cite> come proprio <span lang='en'>trademark</span> sin dai primi pezzi pubblicati sulla Nuvola Arancione.", 'Zyrtck');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '23:00:00', 'assets/artisti/thelonius-b.png', "Hanno pubblicato solo un disco ufficiale, ma i Thelonious B. sono in giro da parecchio tempo. Nel <time datetime='2020'>2020</time>, questo duo iconico in bilico fra post-trap e emo-rap ha dato vita al primo album <cite>THB</cite>, che ha macinato milioni di <span lang='en'>stream</span> sulle piattaforme e attirato l'attenzione di una grossa fetta di pubblico del genere.", 'Thelonius B');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-06', '23:30:00', 'assets/artisti/franchino.png', "Francesco Principato in arte Franchino, è uno dei più noti DJ di musica elettronica in Italia. Conosciuto per la sua tecnica di mixaggio e le sue performance energiche, ha contribuito a diffondere la cultura della musica dance nel nostro Paese.", 'Franchino');


/* 7 Luglio */
INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-07', '22:00:00', 'assets/artisti/prince.png', "Rapper e produttore italiano, con i soci Tauro Boys ha portato un suono nuovo in Italia, ora con il suo debutto solista alza ancora la posta.", 'Tauro Boy Prince');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-07', '21:00:00', 'assets/artisti/rosa-chemical.png', "Rosa Chemical è un artista poliedrico, eclettico, dalle mille sfaccettature e non etichettabile, non ha dato sfogo alla sua creatività solo a livello musicale, con influenze che spaziano dall'hiphop alla trap all'elettronica, ma lavorando anche come modello per la marca italiana di moda Gucci, come <span lang='en'>art and creative director</span> e dedicandosi anche alla scrittura di videoclip.", 'Rosa Chemical');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-07', '23:00:00', 'assets/artisti/anna-pepe.png', "A soli 16 anni è già una ragazza da record. Anna Pepe è una giovane rapper classe <time datetime='2003'>2003</time>. Cresciuta tra i vinili del padre DJ, coltiva la passione per la cultura <span lang='en'>Urban</span> americana che l'ha portata ad appassionarsi all'hip hop.", 'Anna Pepe');

INSERT INTO Programma (date, hour, image_path, description, artist_name)
VALUES ('2024-07-07', '23:30:00', 'assets/artisti/gigi-dagostino.png', "All'anagrafe Luigino Di Agostino, per tutti è Gigi D'Agostino o Gigi D'Ag. E' impossibile non aver ballato o cantato una sua canzone, anche se non si è grandi fan della musica da discoteca.", 'Gigi D''Agostino');


CREATE TABLE Biglietti (
    id INT PRIMARY KEY AUTO_INCREMENT,
    validita VARCHAR(255) NOT NULL,
    tipologia VARCHAR(50) NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL
);

INSERT INTO Biglietti (validita, tipologia, prezzo) VALUES
( '<time datetime="2024-07-05">5 Luglio 2024</time>', 'Giornata Singola', 30.00 ),
( '<time datetime="2024-07-06">6 Luglio 2024</time>', 'Giornata Singola', 30.00 ),
( '<time datetime="2024-07-07">7 Luglio 2024</time>', 'Giornata Singola', 30.00 ),
( '<time datetime="2024-07-06">6 Luglio 2024</time> - <time datetime="2024-07-07">7 Luglio 2024</time>', 'Weekend', 50.00 ),
( '<time datetime="2024-07-05">5 Luglio 2024</time> - <time datetime="2024-07-06">6 Luglio 2024</time> - <time datetime="2024-07-07">7 Luglio 2024</time>', 'Intero', 80.00 ),
( '<time datetime="2024-07-05">5 Luglio 2024</time> - <time datetime="2024-07-06">6 Luglio 2024</time> - <time datetime="2024-07-07">7 Luglio 2024</time>', 'Vip', 100.00 );



CREATE TABLE Ordini (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
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
('assets/merchitem/redT.png', 'T-shirt Festival', 'Rosso', 19.99, 'T-shirt a maniche corta di colore rosso con una rappresentazione bianca, comoda e leggera.'),
('assets/merchitem/bluecap.png', 'Cappellino Festival Technolum250', 'Blu', 14.99, 'Fantastico cappellino blu con ricamo centrale, 100% cotone con ricamo bianco frontale. Perfetto per mantenerti fresco sotto il sole del festival.'),
('assets/merchitem/bermudaverdi.png', 'Bermuda Festival Technolum250', 'Verde', 35.99, 'Bermuda brandizzati Technolum250, presentano un fantasia ispirata alla musica Urban. Fantastici dettagli presenti.'),
('assets/merchitem/cappelliniverdi.png', 'Cappellino Festival Technolum250', 'Verde', 14.99, 'Fantastico cappellino verde, 100% cotone con ricamo bianco frontale. Perfetto per mantenerti fresco sotto il sole del festival.'),
('assets/merchitem/cdvecchiaedizione.png', 'Cd Technolum250 2023', 'Verde', 19.99, 'CD in formato mp3 contentente una registrazione del Festival nella sua edizione del 2023. Magnifici dettagli verdi a decorare.'),
('assets/merchitem/polo.png', 'Polo Festival Technolum250', 'Bianco', 39.99, 'Polo Bianca realizzata in cotone finissimo da abili artigiani. Presenta il numero 250 ricamato in verde presso il petto.'),
('assets/merchitem/poloverde.png', 'Polo Festival Technolum250', 'Verde', 39.99, 'Polo Verde realizzata in cotone finissimo da abili artigiani. Presenta il numero 250 ricamato in bianco presso il petto.'),
('assets/merchitem/felpabianca.png', 'Felpa Festival Technolum250', 'Bianco', 59.99, 'Felpa Bianca realizzata in mordido cotone da abili artigiani. Presenta il numero 250 ricamato in verde presso il petto.'),
('assets/merchitem/setsticker.png', 'Set di Sticker Festival Technolum250', 'Bianco/Verde', 9.99, 'Set di Sticker di varie dimensioni, rimandi vari al numero 250'),
('assets/merchitem/fantasticabandane.png', 'Bandana Festival Technolum250', 'Bianco/Verde', 14.99, 'Bandana realizzata in cotone finissimo, riporta fantastici dettagli verdi. Ideali per proteggere il capo durante le ore più calde.'); 




