




CREATE TABLE `category` (
  `categoryno` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`categoryno`)
);


insert into category values(1, '플레인램', '코튼캔디힐의 가장 기본적인 양!');
insert into category values(2, '슈크림램', '슈크림 언덕에서 건너온 슈크림램. 다른 양들이 비해 몸집이 크고 느긋한 성격이 특징');
insert into category values(3, '블레이징램', '불꽃양들의 조상으로 진짜 불꽃과 같은 양털을 가지고 있다');
insert into category values(4, '천사양', '구름성에서 슈가랜드로 날아온 천사양! 털도 무척 푹신한데다 마음씨도 정말 고운 양들');
insert into category values(5, '악마양', '어둠의 숲에서 건너온 장난꾸러기들로 친해지기만 한다면 어떤 양들보다 매력있는 양');
insert into category values(6, '작물', '코튼캔디힐에서만 자라는 달콤한 작물');
insert into category(categoryno, category) values(7, 'SALE');
insert into category(categoryno, category) values(8, 'NEW10%');
insert into category(categoryno, category) values(9, 'BEST10');


CREATE TABLE `itemstatus` (
  `itemstatusno` int(11) NOT NULL,
  `itemstatus` varchar(255) DEFAULT NULL,
  `itemstatusimg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itemstatusno`)
);





CREATE TABLE `item` (
  `itemno` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `itemsalerate` decimal(2,1) DEFAULT '0.2',
  `itemprice` int(11) DEFAULT NULL,
  `itemimg` varchar(300) DEFAULT NULL,
  `itemstatus` int(11) DEFAULT '1',
  `itemstar` int(11) DEFAULT NULL,
  `buycount` int(11) DEFAULT '0',
  PRIMARY KEY (`itemno`),
  KEY `category` (`category`)
  -- FOREIGN KEY (`category`) REFERENCES `category` (`category`),
  -- FOREIGN KEY (`style`) REFERENCES `style` (`style`),
  -- FOREIGN KEY (`itemstatus`) REFERENCES `itemstatus` (`itemstatus`)
);

insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500, './img/1.png', 3);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('먹색 플레인램', 1, 2500, './img/2.png', 1);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);
insert into item(itemname, category, itemprice, itemimg, itemstar) values('흰색 플레인램', 1, 2500);


CREATE TABLE `usertype` (
  `usertypeno` int(11) NOT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `userpointrate` decimal(2,1) DEFAULT '0.1',
  PRIMARY KEY (`usertypeno`)
);


-- insert into





CREATE TABLE `user` (
  `userid` varchar(255) NOT NULL,
  `userpw` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `usernick` varchar(255) DEFAULT NULL,
  `userbirth` varchar(255) DEFAULT NULL,
  `userpoint` int(11) DEFAULT '3500',
  `usertype` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
  -- FOREIGN KEY (`usertype`) REFERENCES `usertype` (`usertype`) -- syntax
  -- FOREIGN KEY (`usertype`) REFERENCES `usertype` (`usertype`) -- cant create table

);


CREATE TABLE `mysheep` (
  `shoppingno` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `itemno` int(11) NOT NULL,
  `sheepname` varchar(255) NOT NULL,
  `curstar` int(11) DEFAULT 0
);


CREATE TABLE `free` (
  `freeno` int(11) NOT NULL,
  `freewriter` varchar(255) DEFAULT NULL,
  `freenotice` tinyint(1) DEFAULT NULL,
  `freedate` date DEFAULT NULL,
  `freetitle` varchar(255) DEFAULT NULL,
  `freecontent` varchar(1000) DEFAULT NULL,
  `freesuper` int(11) DEFAULT NULL,
  PRIMARY KEY (`freeno`),
  KEY `freewriter` (`freewriter`),
  KEY `freesuper` (`freesuper`)
);


CREATE TABLE `shoppinglist` (
  `shoppingno` int(11) NOT NULL AUTO_INCREMENT,
  `shopperid` varchar(255) DEFAULT NULL,
  `shoppeditemname` int(11) DEFAULT NULL,
  `shoppeddate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shoppingno`),
  KEY `shopperid` (`shopperid`),
  KEY `shoppeditemname` (`shoppeditemname`)
);



CREATE TABLE `file` (
  `freeno` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `filedate` varchar(255) DEFAULT NULL,
  PRIMARY KEY `freeno` (`freeno`)
);
