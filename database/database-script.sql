CREATE TABLE roomtype(
    id int unsigned primary key AUTO_INCREMENT,
    roomtype varchar (20)
)ENGINE=INNODB;

CREATE TABLE room(
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	bedcount int,
	windowview varchar (30),
	roomnumber varchar (3),
	roomtypeid int unsigned,
	FOREIGN KEY (roomtypeid) REFERENCES roomtype(id)
)ENGINE=INNODB;

CREATE TABLE client(
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	firstname varchar (20),
	lastname varchar (20),
	phone varchar (10),
	email varchar (30),
	preferredroombedcount int,
	preferredroomtypeid int unsigned,
	`password` varchar (100) not null,
	FOREIGN KEY (preferredroomtypeid) REFERENCES roomtype (id)
)ENGINE=INNODB;

CREATE TABLE reservation (
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	clientid int unsigned,
	roomid int unsigned,
	`date` date,
	FOREIGN KEY(clientid) REFERENCES client(id),
	FOREIGN KEY(roomid) REFERENCES room(id)
)ENGINE=INNODB;

CREATE VIEW roomview AS 
SELECT 
	room.id AS roomid,
	room.bedcount,
	room.windowview,
	room.roomnumber,
	roomtype.id AS roomtypeid,
	roomtype.roomtype
FROM room
INNER JOIN roomtype ON room.roomtypeid=roomtype.id;

CREATE VIEW reservationview AS
SELECT
	reservation.id AS reservationid,
	client.id AS clientid,
    client.firstname,
    client.lastname,
    client.preferredroombedcount,
	roomtype.id AS roomtypeid,
    roomtype.roomtype,
	room.id AS roomid,
    room.roomnumber
FROM reservation
INNER JOIN client ON reservation.clientid=client.id
INNER JOIN room ON reservation.roomid=room.id
INNER JOIN roomtype ON room.roomtypeid=roomtype.id;

ALTER DATABASE hotel CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE client CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE reservation CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE room CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE roomtype CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;