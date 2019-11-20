DROP DATABASE IF EXISTS MessengerService ;

CREATE DATABASE MessengerService;

USE MessengerService;

CREATE TABLE Users (
	ID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    lastVisit DATETIME,
    userPhoto TEXT DEFAULT "def_userphoto.png",
    email VARCHAR(30) NOT NULL,
    age TINYINT,
    address VARCHAR(250),
    hobbies VARCHAR (250),
    recovery VARCHAR (250)
);
CREATE TABLE Groups (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    groupName VARCHAR(20) NOT NULL
);
CREATE TABLE Messages (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    sender INT, 
    receiver INT, 
    title VARCHAR(20), 
    body VARCHAR(255), 
    sendingTime DATETIME,
    seen int DEFAULT 0, 
    CONSTRAINT FOREIGN KEY (sender) REFERENCES Users(ID), 
    CONSTRAINT FOREIGN KEY (receiver) REFERENCES Users(ID) 
);
CREATE TABLE GroupsBelongs (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    groupID INT,
    CONSTRAINT FK_userID FOREIGN KEY (userID)
    REFERENCES Users(ID),
    CONSTRAINT FK_groupID FOREIGN KEY (groupID)
    REFERENCES Groups(ID)
);
CREATE TABLE Attachments(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    attachmentPath VARCHAR(20),
    updateTime DATETIME ,
    IDMessage INT NOT NULL ,

    CONSTRAINT FK_Messages FOREIGN KEY (IDMessage)
    REFERENCES Messages(ID)
);

CREATE USER IF NOT EXISTS 'MSM'@'localhost' IDENTIFIED BY 'ROOT';
GRANT ALL ON `MessengerService`.* TO 'MSM'@'localhost' IDENTIFIED BY 'ROOT';