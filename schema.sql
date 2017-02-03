CREATE DATABASE dbmusic;

USE dbmusic;

INSERT INTO tbkategori VALUES('1', 'Barat', 'Barat');
INSERT INTO `tbartist` VALUES('', 'The Chainsmokers', 'the-chainsmokers', '1');

INSERT INTO tbmusic VALUES('', 'XDFRFdefr', 'The Chainsmokers - Closer', 'Closer', '00:03:44', '4.5 MB', '', '2016', 'Pop', 'Closer, Thechainsmokers', 'http://youtubeinmp3.com?fetch=fregerg', '1', '1');

SELECT * FROM tbmusic;
SELECT * FROM `tbkategori`;

CREATE VIEW vlistmusic AS
SELECT idmusic, idyoutube, Title, Track, Duration, Filesize, Album, Tahun, Tag, Link, NamaArtist, `tbartist`.`SlugArtist`, `tbkategori`.`SlugKategori`, `tbkategori`.`Namakategori` FROM `tbmusic`
LEFT JOIN `tbartist`
ON `tbmusic`.`idartist`=`tbartist`.`idartist`
LEFT JOIN `tbkategori`
ON `tbartist`.`idkategori`=`tbkategori`.`idkategori` ORDER BY `idmusic` DESC;

SELECT * FROM `vlistmusic` WHERE Title LIKE '%Charlie%';

DROP VIEW `vlistmusic`;

CREATE VIEW vlagubarat AS
SELECT * FROM `vlistmusic` WHERE `SlugKategori`='lagu-barat';

SELECT * FROM vlagubarat;
SELECT * FROM `vartist`;

DROP VIEW `vartist`;

CREATE VIEW vartist AS
SELECT `tbartist`.`idartist`, `tbartist`.`NamaArtist`, `tbartist`.`SlugArtist`, `tbkategori`.`idkategori`, `tbkategori`.`NamaKategori`, `tbkategori`.`SlugKategori` FROM tbartist
LEFT JOIN tbkategori
ON tbartist.`idkategori`=`tbkategori`.`idkategori`;

DESC tbkategori;
DESC tbartist;