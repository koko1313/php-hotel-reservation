INSERT INTO roomtype (roomtype) VALUES ("Двойна"), ("Тройна"), ("Студио"), ("Апартамент");

INSERT INTO room (bedcount, windowview, roomnumber, roomtypeid)
    VALUES
    ("2", "Гледка към морето", "101", "1"), -- Двойна
    ("2", "Гледка към морето", "102", "1"), -- Двойна
    ("3", "Гледка към морето", "103", "2"), -- Тройна
    ("3", "Гледка към морето", "104", "2"), -- Тройна
    ("4", "Гледка към морето", "201", "3"), -- Студио
    ("4", "Гледка към морето", "202", "3"), -- Студио
    ("5", "Гледка към морето", "203", "4"), -- Апартамент
    ("5", "Гледка към морето", "204", "4"); -- Апартамент

INSERT INTO `role` (`role`) VALUES
    ("Admin"),
    ("Client");

INSERT INTO user (firstname, lastname, roleid, email, `password`) VALUES
    ("Admin", "Admin", 1, "admin@admin.com", MD5("admin"));
