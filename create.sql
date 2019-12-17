DROP DATABASE IF EXISTS cake3youtube;

CREATE DATABASE cake3youtube DEFAULT CHARACTER SET = utf8;

USE cake3youtube;

DROP TABLE IF EXISTS users;

CREATE TABLE users(
	id int(11) NOT NULL AUTO_INCREMENT,
	email varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY email (email)
)engine=InnoDB default charset=utf8;

DROP TABLE IF EXISTS playlists;

CREATE TABLE playlists (
	id int(11) NOT NULL AUTO_INCREMENT,
	user_id int(11) NOT NULL,
	name  varchar(255) NOT NULL,
	status int(11) NOT NULL,
	created_at datetime DEFAULT NULL,
	modified_at datetime DEFAULT NULL,
	PRIMARY KEY (id)
)engine=InnoDB default charset=utf8;

DROP TABLE IF EXISTS comments;

CREATE TABLE comments (
	id int(11) NOT NULL AUTO_INCREMENT,
	youtube_id varchar(255) NOT NULL,
	user_id int(11) NOT NULL,
	content varchar(255) NOT NULL,
	created_at datetime DEFAULT NULL,
	PRIMARY KEY (id)
)engine=InnoDB default charset=utf8;

DROP TABLE IF EXISTS movies;

CREATE TABLE movies (
	id int(11) NOT NULL AUTO_INCREMENT,
	playlist_id int(11) NOT NULL,
	youtube_id int(11) NOT NULL,
	created_at datetime DEFAULT NULL,
	PRIMARY KEY (id)
)engine=InnoDB default charset=utf8;

