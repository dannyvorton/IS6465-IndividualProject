create table users (
    userId int(11) unsigned auto_increment primary key,
    firstName varchar(128) not null,
    lastName varchar(128) not null,
    email varchar(128) not null,
    userName varchar(128) unique not null,
    password varchar(128) not null,
    role varchar(128) not null,
    points int
)
ENGINE MyISAM;

create table account (
    accountId int(11) unsigned auto_increment primary key,
    userId int(11) not null,
    accountType varchar(100) not null,
    points int(50)
)
ENGINE MyISAM;

create table redemption (
    redeemId int(11) unsigned auto_increment primary key,
    date varchar(100) not null,
    accountId int(11) not null,
    cardId int(11) not null,
    pointsRedeemed int(50) not null
)
ENGINE MyISAM;

create table giftcard (
    cardId int(11) unsigned auto_increment primary key,
    cardName varchar(100) not null,
    cardType varchar(100) not null,
    cardValue float(10) not null,
    points int(50) not null
)
ENGINE MyISAM;

insert into giftcard (cardName, cardType, cardValue, points) values ('Visa', 'Credit Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('Grubhub', 'Restaurant Card', 50, 40);
insert into giftcard (cardName, cardType, cardValue, points) values ('Chilis', 'Restaurant Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('Amazon', 'Store Card', 40, 35);
insert into giftcard (cardName, cardType, cardValue, points) values ('Whole Foods', 'Store Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('Red Lobster', 'Restaurant Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('Chipotle', 'Restaurant Card', 45, 40);
insert into giftcard (cardName, cardType, cardValue, points) values ('Panera Bread', 'Restaurant Card', 25, 25);
insert into giftcard (cardName, cardType, cardValue, points) values ('Dominos', 'Restaurant Card', 20, 15);
insert into giftcard (cardName, cardType, cardValue, points) values ('Buffalo Wild Wings', 'Restaurant Card', 30, 25);
insert into giftcard (cardName, cardType, cardValue, points) values ('Lowes', 'Store Card', 200, 175);
insert into giftcard (cardName, cardType, cardValue, points) values ('Papa Johns', 'Restaurant Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('Apple', 'Store Card', 50, 45);
insert into giftcard (cardName, cardType, cardValue, points) values ('Best Buy', 'Store Card', 250, 200);
insert into giftcard (cardName, cardType, cardValue, points) values ('Google Play', 'Store Card', 35, 30);
insert into giftcard (cardName, cardType, cardValue, points) values ('Texas Roadhouse', 'Restaurant Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('DoorDash', 'Restaurant Card', 35, 30);
insert into giftcard (cardName, cardType, cardValue, points) values ('Netflix', 'Subscription Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('Taco Bell', 'Restaurant Card', 25, 20);
insert into giftcard (cardName, cardType, cardValue, points) values ('Spotify', 'Subsription Card', 99, 75);
