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




    