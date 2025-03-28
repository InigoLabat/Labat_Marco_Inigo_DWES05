CREATE DATABASE IF NOT EXISTS atletismo;
USE atletismo;

CREATE TABLE IF NOT EXISTS clubes (
    id_club INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_club VARCHAR(100) NOT NULL,
    ciudad VARCHAR(50),
    fundacion YEAR,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS atletas (
    id_atleta INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    id_club INT UNSIGNED,
    prueba VARCHAR(50),
    marca DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    CONSTRAINT FK_IDCLUB FOREIGN KEY (id_club) REFERENCES clubes(id_club)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

INSERT INTO clubes (nombre_club, ciudad, fundacion) VALUES
('Real Sociedad', 'Donostia', 1909),
('Athletic', 'Bilbo', 1898),
('Alaves', 'Gasteiz', 1921);

INSERT INTO atletas (nombre, apellido, id_club, prueba, marca) VALUES
('Usain', 'Bolt', 1, '100m', 9.58),
('Yohan', 'Blake', 2, '100m', 9.69),
('Justin', 'Gatlin', 3, '100m', 9.74),
('Michael', 'Johnson', 1, '200m', 19.32),
('Noah', 'Lyles', 2, '200m', 19.31),
('Andre', 'De Grasse', 3, '200m', 19.62),
('Tyson', 'Gay', 1, '100m', 9.77),
('Frankie', 'Fredericks', 2, '200m', 19.68),
('Christian', 'Coleman', 3, '100m', 9.76);
