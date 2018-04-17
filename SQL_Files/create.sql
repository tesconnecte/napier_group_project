/*
* Execute this file on your local webserver using PHPMyAdmin portal
* It requires to be done only once
*/

CREATE DATABASE IF NOT EXISTS Social_Media_Memories CHARACTER SET  utf8 COLLATE  utf8_unicode_ci;

USE  Social_Media_Memories;

CREATE TABLE  USER (
 id INT  NOT NULL AUTO_INCREMENT PRIMARY  KEY ,
 firstname VARCHAR(20),
 surname VARCHAR (20),
 email VARCHAR (30) UNIQUE NOT NULL,
 password VARCHAR(100),
 birthdate DATE
);

CREATE  TABLE ALBUM (
 id INT  NOT NULL AUTO_INCREMENT PRIMARY  KEY,
 name VARCHAR (20),
 isPublic BOOLEAN
);

CREATE TABLE PERSONNALPOST (
 id INT NOT NULL AUTO_INCREMENT PRIMARY  KEY,
 link VARCHAR (100),
 description VARCHAR (200),
 image VARCHAR (200),
 text VARCHAR(200)
);

CREATE  TABLE USERALBUMS (
userid INT NOT NULL,
albumid INT NOT NULL,
PRIMARY KEY(userid,albumid),
FOREIGN KEY (userid) REFERENCES USER(id),
FOREIGN  KEY (albumid) REFERENCES  ALBUM(id)
);

CREATE TABLE ALBUMPOST (
albumid INT NOT NULL,
postid INT NOT NULL,
PRIMARY KEY(albumid,postid),
FOREIGN  KEY (albumid) REFERENCES  ALBUM(id),
FOREIGN KEY (postid) REFERENCES PERSONNALPOST(id)
);

