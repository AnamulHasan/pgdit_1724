CREATE DATABASE IF NOT EXISTS pgdit_2017;

USE pgdit_2017;

CREATE TABLE IF NOT EXISTS contact_me(
  id INT(32) PRIMARY KEY auto_increment,
  fullName VARCHAR(128),
  eMail VARCHAR(56),
  subject VARCHAR(128),
  message VARCHAR(512)
);

CREATE TABLE  IF NOT EXISTS admin_user(
  id INT(32) PRIMARY KEY AUTO_INCREMENT,
  userName VARCHAR(128),
  passWord VARCHAR(128)
);

INSERT INTO admin_user(userName, passWord) VALUES ('admin','admin');