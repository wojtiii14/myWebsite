CREATE TABLE IF NOT EXISTS `clients` 
(`ID` INT NOT NULL ,
`Name and Surname` TEXT COLLATE utf8_polish_ci NOT NULL ,
`E-mail` TEXT NOT NULL ,
`Phone Number` TEXT NOT NULL )
ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

INSERT INTO `clients` (`ID`, `Name and Surname`, `E-mail`, `Phone Number`) VALUES
(1, 'Wojciech Kaczmarek', 'wojtak123@gmail.com', '668792084');

ALTER TABLE `clients`
ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

ALTER TABLE `clients`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;