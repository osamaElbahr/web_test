create schema if not exists blog ;
use blog;
create table if not exists users(
id  int primary key auto_increment,
fname  varchar(255) not null,
email  varchar(255) not null unique,
phone varchar(11) not null unique,
created_at timestamp default current_timestamp,
updated_at timestamp default current_timestamp
);
create table if not exists posts(
id int primary key auto_increment,
title varchar(255) not null,
content text,
image varchar(255),
user_id int,
constraint fk_user_id_users 
foreign key(user_id)
references users(id)
on delete cascade
on update cascade
);
CREATE TABLE if not exists comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
use blog;
alter table users
add column role enum('subscriber','admin') default 'subscriber' after phone;
alter table users 
drop column role;