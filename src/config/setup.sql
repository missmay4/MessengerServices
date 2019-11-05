DROP DATABASE IF EXISTS MessengerService ;

CREATE DATABASE MessengerService;

USE MessengerService;

CREATE TABLE Users (
	ID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    lastvisit DATETIME,
    userPhoto TEXT DEFAULT "def_userphoto.png",
    email  VARCHAR(30) NOT NULL,
    age TINYINT,
    address VARCHAR(250),
    hobbies VARCHAR (250)
);
CREATE TABLE Groups (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL
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
    userId INT,
    groupId INT,
    CONSTRAINT FK_userId FOREIGN KEY (userId)
    REFERENCES Users(ID),
    CONSTRAINT FK_groupId FOREIGN KEY (groupId)
    REFERENCES Groups(ID)
);