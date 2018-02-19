INSERT INTO USER(firstname,surname,email,password,birthdate) VALUES ('Alexis','Canevali', '40326915@live.napier.ac.uk',MD5('alex'),STR_TO_DATE('12-11-1997','%d-%m-%Y'));
INSERT INTO USER(firstname,surname,email,password,birthdate) VALUES ('Liam','Lyons', '40326973@live.napier.ac.uk',MD5('liam'),STR_TO_DATE('04-11-1996','%d-%m-%Y'));
INSERT INTO USER(firstname,surname,email,password,birthdate) VALUES ('Ronan','Defours', '40326913@live.napier.ac.uk',MD5('rona'),STR_TO_DATE('07-07-1996','%d-%m-%Y'));
INSERT INTO USER(firstname,surname,email,password,birthdate) VALUES ('Samm','Laidlaw', '40208441@live.napier.ac.uk',MD5('samm'),STR_TO_DATE('01-01-1999','%d-%m-%Y'));
INSERT INTO USER(firstname,surname,email,password,birthdate) VALUES ('Jack','Sweeney', '40209035@live.napier.ac.uk',MD5('jack'),STR_TO_DATE('23-07-1997','%d-%m-%Y'));
INSERT INTO USER(firstname,surname,email,password,birthdate) VALUES ('Iain','Bruce', '40213038@live.napier.ac.uk',MD5('iain'),STR_TO_DATE('24-07-1997','%d-%m-%Y'));


INSERT INTO ALBUM (name,isPublic) VALUES ('Musilac festival',false);
INSERT INTO ALBUM (name,isPublic) VALUES ('London Trip',false);
INSERT INTO ALBUM (name,isPublic) VALUES ('New York Trip',false);
INSERT INTO ALBUM (name,isPublic) VALUES ('Paris Trip',false);
INSERT INTO ALBUM (name,isPublic) VALUES ('20th Birthday',false);
INSERT INTO ALBUM (name,isPublic) VALUES ('Memes -_-',false);

INSERT INTO USERALBUMS  VALUES (1,1);
INSERT INTO USERALBUMS  VALUES (2,2);
INSERT INTO USERALBUMS  VALUES (3,3);
INSERT INTO USERALBUMS  VALUES (4,4);
INSERT INTO USERALBUMS  VALUES (5,5);
INSERT INTO USERALBUMS  VALUES (6,6);

INSERT INTO PERSONNALPOST(link, text,description,image) VALUES ('Local','Cold Play','ColdPlay show at Musilac !','/user_data/1/img1.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES ('Local','Indochine','Indochine show at Musilac !','/user_data/1/img2.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES ('Local','Depeche mode','Depeche mode show at Musilac !','/user_data/1/img3.jpg');

INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Big Ben','Just arrived in London !','/user_data/2/img1.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Buckingham Palace','Where s the queen ???','/user_data/2/img2.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Trafalgar Square','Love this city <3','/user_data/2/img3.jpg');

INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Time square','Just arrived in New york !','/user_data/3/img1.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Empire state building','Impressively high','/user_data/3/img2.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','White House','Love this city <3','/user_data/3/img3.jpg');

INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Eiffel Tower !','Just arrived in Paris !','/user_data/4/img1.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Champs Elysés','The most beautiful avenue in the world','/user_data/4/img2.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','River seine','Chiling next to the seine','/user_data/4/img3.jpg');

INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','All the fam !','Ready to party with the whole family','/user_data/5/img1.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','20th bday cake','Look a that cake :O','/user_data/5/img2.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES  ('Local','Partying','And now partying with pals !','/user_data/5/img3.jpg');

INSERT INTO PERSONNALPOST(link, text,description,image) VALUES ('Local','Meme 1','got me evry time','/user_data/6/img1.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES ('Local','Meme 2','Laughed so hard','/user_data/6/img2.jpg');
INSERT INTO PERSONNALPOST(link, text,description,image) VALUES ('Local','Meme 3','I cant forget this one','/user_data/3/img3.jpg');

INSERT INTO ALBUMPOST VALUES (1,1);
INSERT INTO ALBUMPOST VALUES (1,2);
INSERT INTO ALBUMPOST VALUES (1,3);
INSERT INTO ALBUMPOST VALUES (2,4);
INSERT INTO ALBUMPOST VALUES (2,5);
INSERT INTO ALBUMPOST VALUES (2,6);
INSERT INTO ALBUMPOST VALUES (3,7);
INSERT INTO ALBUMPOST VALUES (3,8);
INSERT INTO ALBUMPOST VALUES (3,9);
INSERT INTO ALBUMPOST VALUES (4,10);
INSERT INTO ALBUMPOST VALUES (4,11);
INSERT INTO ALBUMPOST VALUES (4,12);
INSERT INTO ALBUMPOST VALUES (5,13);
INSERT INTO ALBUMPOST VALUES (5,14);
INSERT INTO ALBUMPOST VALUES (5,15);
INSERT INTO ALBUMPOST VALUES (6,16);
INSERT INTO ALBUMPOST VALUES (6,17);
INSERT INTO ALBUMPOST VALUES (6,18);