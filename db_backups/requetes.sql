CREATE table users (
    uid INT AUTO_INCREMENT PRIMARY KEY,
    eid INT,
    departmentId INT,
    role TEXT,
    registration_date date DEFAULT(CURRENT_TIMESTAMP),
    completedRecs INT DEFAULT(0)
    );


    ALTER TABLE employee
ADD CONSTRAINT fr_e FOREIGN KEY (managerid) REFERENCES employee(eid);
ALTER TABLE employee
ADD CONSTRAINT fr_d FOREIGN KEY (chefid) REFERENCES employee(eid);
CREATE TABLE departement ( did INT PRIMARY KEY, dname TEXT UNIQUE, chefid INT )
CREATE TABLE employee( eid int PRIMARY KEY, efname text, elname text, departmentId int, eposte TEXT, managerid int )



ALTER TABLE `reclamation`
ADD CONSTRAINT `fk_reclamation_department`
FOREIGN KEY (`departmentId`)
REFERENCES `departement` (`did`);


/*USERS*/

CREATE TABLE `users` (
 `uid` int(11) NOT NULL AUTO_INCREMENT,
 `fname` text NOT NULL,
 `lname` text NOT NULL,
 `eid` int(11) DEFAULT NULL,
 `username` text NOT NULL,
 `pwd` varchar(200) NOT NULL,
 `departmentId` int(11) DEFAULT NULL,
 `role` text DEFAULT NULL,
 `registration_date` date DEFAULT current_timestamp(),
 `completedRecs` int(11) DEFAULT 0,
 `active` tinyint(1) NOT NULL DEFAULT 0,
 PRIMARY KEY (`uid`),
 UNIQUE KEY `unique` (`username`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4

/*reclamatio*/

CREATE TABLE `reclamatio` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `titre` text DEFAULT NULL,
 `departmentId` int(11) DEFAULT NULL,
 `description` text DEFAULT NULL,
 `etat` text DEFAULT 'En cours',
 `eid` int(11) DEFAULT NULL,
 `date_ouvert` timestamp NULL DEFAULT current_timestamp(),
 `date_ferm` timestamp NULL DEFAULT NULL,
 `priorite` text DEFAULT NULL,
 `review` text DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4


/*employee*/
CREATE TABLE `employee` (
 `eid` int(11) NOT NULL,
 `efname` text DEFAULT NULL,
 `elname` text DEFAULT NULL,
 `departmentId` int(11) DEFAULT NULL,
 `eposte` text DEFAULT NULL,
 `managerid` int(11) DEFAULT NULL,
 PRIMARY KEY (`eid`),
 KEY `fr_e` (`managerid`),
 CONSTRAINT `fr_e` FOREIGN KEY (`managerid`) REFERENCES `employee` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

/*dpartement*/

CREATE TABLE `departement` (
 `did` int(11) NOT NULL,
 `dname` text DEFAULT NULL,
 `chefid` int(11) DEFAULT NULL,
 PRIMARY KEY (`did`),
 UNIQUE KEY `dname` (`dname`) USING HASH,
 KEY `fr_d` (`chefid`),
 CONSTRAINT `fr_d` FOREIGN KEY (`chefid`) REFERENCES `employee` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4