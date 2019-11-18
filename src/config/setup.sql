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
    hobbies VARCHAR (250),
    status VARCHAR (250)
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
CREATE TABLE Atachments( 
    ID INT AUTO_INCREMENT PRIMARY KEY,
    atachmentPath VARCHAR(20),
    updateTime DATETIME
);
CREATE TABLE AtachmentContainer( 
    ID INT AUTO_INCREMENT PRIMARY KEY,
    IDAtachment INT NOT NULL ,
    IDMessage INT NOT NULL ,

    CONSTRAINT FK_atachment FOREIGN KEY (IDAtachment)
    REFERENCES Messages(ID),
    CONSTRAINT FK_uatachment FOREIGN KEY (IDMessage)
    REFERENCES Atachments(ID)

);

CREATE USER IF NOT EXISTS 'MSM'@'localhost' IDENTIFIED BY 'ROOT';
GRANT ALL ON `MessengerService`.* TO 'MSM'@'localhost' IDENTIFIED BY 'ROOT';