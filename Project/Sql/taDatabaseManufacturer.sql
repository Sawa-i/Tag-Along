Drop schema if exists WebProject;

create schema WebProject;

Use WebProject;

create table NUSTReg (
cms int primary key,
fName varchar(15) Not Null,
lName varchar(15) Not null,
email varchar(40) Not null,
department varchar(6) Not null
);

create table members (
cms int primary key,
password varchar(35) Not Null,
fName varchar(15) Not Null,
lName varchar(15) Not null,
department varchar(6) Not null
);


create table plans(
planID int auto_increment,
leadre_cms int ,
partyName varchar(20) ,
vehicle varchar(5) Not Null,
passengers int Not Null,
pointA varchar(3) Not Null,
pointB varchar(3) Not Null,
date date Not Null,
time time Not Null,
Primary key (planID)
);
/*
ALTER TABLE `NUSTReg` ADD INDEX( `fName`, `lName`, `department`);

ALTER TABLE `members` 
ADD CONSTRAINT `ForeignKeys` 
FOREIGN KEY (`cms`, `department`, `fName`, `lName`) 
REFERENCES `nustreg`(`cms`, `department`, `fName`, `lName`) 
ON DELETE CASCADE 
ON UPDATE CASCADE;*/



/* Data Entries */

INSERT INTO `nustreg` (`cms`, `fName`, `lName`, `email`, `department`)
 VALUES ('242554', 'Mohammad', 'Awais', 'mawais.bscs18seecs@seecs.edu.pk','SEECS'), 
		('242555', 'Abdul', 'Wahab', 'awahab.bscs18seecs@seecs.edu.pk','SEECS');
        
        
        
CREATE TABLE `webproject`.`admins` ( `username` VARCHAR(15) NOT NULL , `password` VARCHAR(50) NOT NULL , `cms` INT NOT NULL , PRIMARY KEY (`cms`)) ENGINE = InnoDB;
INSERT INTO `admins` (`username`, `password`, `cms`) VALUES ('admin123', '1a145a23d6e47aadfe2063f1f951e691', '242555');