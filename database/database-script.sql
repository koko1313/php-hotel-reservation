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
	FOREIGN KEY (preferredroomtypeid) REFERENCES roomtype (id)
)ENGINE=INNODB;

CREATE TABLE reservation (
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	clientid int unsigned,
	roomid int unsigned,
	FOREIGN KEY(clientid) REFERENCES client(id),
	FOREIGN KEY(roomid) REFERENCES room(id)
)ENGINE=INNODB;

CREATE VIEW roomview AS 
SELECT 
	room.bednumber,
	room.windowview,
	room.roomnumber,
	roomtype.roomtype
FROM room
INNER JOIN roomtype ON room.roomtypeid=roomtype.id

CREATE VIEW reservationview AS
SELECT
	reservation.id,
    client.firstname,
    client.lastname,
    client.preferredroombedcount,
    roomtype.roomtype,
    room.roomnumber
FROM reservation
INNER JOIN client ON reservation.clientid=client.id
INNER JOIN room ON reservation.roomid=room.id
INNER JOIN roomtype ON room.roomtypeid=roomtype.id