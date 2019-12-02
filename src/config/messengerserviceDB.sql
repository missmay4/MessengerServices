
INSERT INTO `Users` (`ID`, `username`, `password`, `lastVisit`, `userPhoto`, `email`, `age`, `address`, `hobbies`, `recovery`) VALUES
(1, 'Mayte', '$2y$10$lJym5Zbk0M4St9wWcsSdC.vYaPeOHzHGrJg2QFmKv/apNw98Kthfy', '2019-11-30 09:11:52', '1.png', 'mcalmunoz@gmail.com', 28, 'Madrid', 'Listen to music', NULL),
(2, 'Gero', '$2y$10$j.I3aQy7dlA3IvRireGiRuWP.znScWWNrpovY8/M/RplIETumyD4q', '2019-11-30 09:11:53', '2.png', 'geroal.xander@gmail.com', 21, 'Madrid', 'Programming', NULL),
(3, 'Test', '$2y$10$Tj3wPrQxGkq1N.v5iyTNj.xb2TFILuDrG6zwTNTAjY7DNugX0xHqy', '2019-11-30 09:11:46', 'def_userphoto.png', 'test@test.com', NULL, NULL, NULL, NULL);

INSERT INTO `Messages` (`ID`, `sender`, `receiver`, `title`, `body`, `sendingTime`, `seen`) VALUES
(1, 2, 1, 'Hello!', 'Hi Mayte, \nI\'m trying this new message app that the company release today.\n\nI hope it would be useful for all.\n\nSee you!', '2019-11-30 21:11:13', 1),
(2, 1, 2, 'RE : Hello!', 'Hello Gero!\n\nI find this app so much useful, I think I would use it forever!\n\nSee you at the office', '2019-11-30 21:11:23', 1),
(3, 1, 2, 'Trying to attach files', 'Hi!\n\nI saw that we can include files attached to the mails, so I\'m trying to see if is working. I attached a photo of my dog.\n\nI hope you can answer me if you can download the file.\n\nThanks!', '2019-11-30 21:11:19', 1),
(4, 2, 1, 'RE : Trying to attach files', 'Hello Mayte, \n\nI can download the photo of your dog, and I like it! Seems very friendly. \n\nI attached a photo of my cat, I hope you like it!\n\nSee you!', '2019-11-30 21:11:52', 1),
(5, 3, 1, 'Testing multiple messages', 'Hello, \n\nIm trying to send the same message to two different users', '2019-11-30 21:11:53', 0),
(6, 3, 2, 'Testing multiple messages', 'Hello, \n\nIm trying to send the same message to two different users', '2019-11-30 21:11:53', 1),
(7, 1, 1, 'Message to myself', 'Hello there!', '2019-11-30 21:11:27', 0),
(8, 2, 1, 'Attach file to multiple users', 'Sendind a file to multiple users', '2019-11-30 21:11:21', 1),
(9, 2, 2, 'Attach file to multiple users', 'Sendind a file to multiple users', '2019-11-30 21:11:21', 0),
(10, 2, 3, 'Attach file to multiple users', 'Sendind a file to multiple users', '2019-11-30 21:11:21', 0);

INSERT INTO `Attachments` (`ID`, `attachmentPath`, `updateTime`, `IDMessage`) VALUES
(1, 'mydog.jpg', '2019-11-30 21:11:19', 3),
(2, 'mycat.jpg', '2019-11-30 21:11:52', 4),
(3, 'test.txt', '2019-11-30 21:11:21', 8),
(4, 'test.txt', '2019-11-30 21:11:21', 9),
(5, 'test.txt', '2019-11-30 21:11:21', 10);
