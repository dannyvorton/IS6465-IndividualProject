create table users (
    user_id int(11) unsigned auto_increment primary key,
    first_name varchar(128) not null,
    last_name varchar(128) not null,
    email varchar(128) not null,
    username varchar(128) unique not null,
    password varchar(128) not null,
    role varchar(128) not null,
    points int
)
ENGINE MyISAM;

create table account (
    account_id int(11) unsigned auto_increment primary key,
    user_id int(11) not null,
    account_type varchar(128) not null,
    points int(50)
)
ENGINE MyISAM;

create table redemption (
    redeem_id int(11) unsigned auto_increment primary key,
    date varchar(128) not null,
    account_id int(11) not null,
    card_id int(11) not null,
    points_redeemed int(50) not null
)
ENGINE MyISAM;

create table gift_card (
    card_id int(11) unsigned auto_increment primary key,
    card_name varchar(128) not null,
    card_type varchar(128) not null,
    card_value float(10) not null,
    points int(50) not null
)
ENGINE MyISAM;

insert into gift_card (card_name, card_type, card_value, points) values ('Visa', 'Credit Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('Grubhub', 'Restaurant Card', 50, 40);
insert into gift_card (card_name, card_type, card_value, points) values ('Chilis', 'Restaurant Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('Amazon', 'Store Card', 40, 35);
insert into gift_card (card_name, card_type, card_value, points) values ('Whole Foods', 'Store Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('Red Lobster', 'Restaurant Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('Chipotle', 'Restaurant Card', 45, 40);
insert into gift_card (card_name, card_type, card_value, points) values ('Panera Bread', 'Restaurant Card', 25, 25);
insert into gift_card (card_name, card_type, card_value, points) values ('Dominos', 'Restaurant Card', 20, 15);
insert into gift_card (card_name, card_type, card_value, points) values ('Buffalo Wild Wings', 'Restaurant Card', 30, 25);
insert into gift_card (card_name, card_type, card_value, points) values ('Lowes', 'Store Card', 200, 175);
insert into gift_card (card_name, card_type, card_value, points) values ('Papa Johns', 'Restaurant Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('Apple', 'Store Card', 50, 45);
insert into gift_card (card_name, card_type, card_value, points) values ('Best Buy', 'Store Card', 250, 200);
insert into gift_card (card_name, card_type, card_value, points) values ('Google Play', 'Store Card', 35, 30);
insert into gift_card (card_name, card_type, card_value, points) values ('Texas Roadhouse', 'Restaurant Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('DoorDash', 'Restaurant Card', 35, 30);
insert into gift_card (card_name, card_type, card_value, points) values ('Netflix', 'Subscription Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('Taco Bell', 'Restaurant Card', 25, 20);
insert into gift_card (card_name, card_type, card_value, points) values ('Spotify', 'Subsription Card', 99, 75);
