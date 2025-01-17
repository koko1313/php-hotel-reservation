CREATE TABLE roomtype(
    id int unsigned primary key AUTO_INCREMENT,
    roomtype varchar (20)
)ENGINE=INNODB;

CREATE TABLE `role`(
    id int unsigned primary key AUTO_INCREMENT,
    `role` varchar (20)
)ENGINE=INNODB;

CREATE TABLE room(
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	bedcount int,
	windowview varchar (30),
	roomnumber varchar (3) UNIQUE,
	roomtypeid int unsigned,
	FOREIGN KEY (roomtypeid) REFERENCES roomtype(id)
)ENGINE=INNODB;

CREATE TABLE user(
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	`image` varchar (255),
	roleid int unsigned DEFAULT 2,
	firstname varchar (20),
	lastname varchar (20),
	phone varchar (10),
	email varchar (30) UNIQUE,
	preferredroombedcount int,
	preferredroomtypeid int unsigned,
	`password` varchar (100) not null,
	FOREIGN KEY (preferredroomtypeid) REFERENCES roomtype (id),
	FOREIGN KEY (roleid) REFERENCES `role` (id)
)ENGINE=INNODB;

CREATE TABLE reservation (
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	userid int unsigned,
	roomid int unsigned,
	fromdate date,
	todate date,
	FOREIGN KEY(userid) REFERENCES user(id),
	FOREIGN KEY(roomid) REFERENCES room(id)
)ENGINE=INNODB;

CREATE TABLE contactform (
	id int unsigned PRIMARY KEY AUTO_INCREMENT,
	`name` varchar (50) not null,
	email varchar (50) not null,
	`text` varchar (1500) not null
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

CREATE VIEW userview AS 
SELECT 
	user.id,
	user.image,
	user.firstname,
	user.lastname,
	user.phone,
	user.email,
	user.password,
	user.preferredroombedcount,
	user.preferredroomtypeid,
	user.roleid,
	`role`.`role`
FROM user
INNER JOIN `role` ON user.roleid=`role`.id;

CREATE VIEW reservationview AS
SELECT
	reservation.id AS reservationid,
	reservation.fromdate,
	reservation.todate,
	user.id AS userid,
    user.firstname,
    user.lastname,
    user.preferredroombedcount,
	roomtype.id AS roomtypeid,
    roomtype.roomtype,
	room.id AS roomid,
    room.roomnumber
FROM reservation
INNER JOIN user ON reservation.userid=user.id
INNER JOIN room ON reservation.roomid=room.id
INNER JOIN roomtype ON room.roomtypeid=roomtype.id;

-- ALTER DATABASE hotel CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE user CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE reservation CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE room CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE roomtype CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
