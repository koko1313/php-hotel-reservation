INSERT INTO roomtype (roomtype) VALUES ("Двойна"), ("Тройна"), ("Студио"), ("Апартамент");

INSERT INTO room (bedcount, windowview, roomnumber, roomtypeid)
    VALUES
    ("2", "Гледка към морете", "101", "1"), -- Двойна
    ("2", "Гледка към морете", "102", "1"), -- Двойна
    ("3", "Гледка към морете", "103", "2"), -- Тройна
    ("3", "Гледка към морете", "104", "2"), -- Тройна
    ("4", "Гледка към морете", "201", "3"), -- Студио
    ("4", "Гледка към морете", "202", "3"), -- Студио
    ("5", "Гледка към морете", "203", "4"), -- Апартамент
    ("5", "Гледка към морете", "204", "4"); -- Апартамент

INSERT into `ROLE` (`role`) VALUES
    ("Admin"),
    ("Client");

INSERT into user (firstname, lastname, roleid, email, `password`) VALUES
    ("Admin", "Admin", 1, "admin@admin.com", MD5("admin"));
