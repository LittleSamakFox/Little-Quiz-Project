i have no copyright of image.


mysql> connect littlesamakfox

mysql> CREATE TABLE thread(
    -> uid int unsigned auto_increment,
    -> gid int unsigned DEFAULT 0,
    -> depth varchar(255) DEFAULT 'A',
    -> name varchar(20) NOT NULL,
    -> passwd varchar(10) NOT NULL,
    -> subject varchar(255) NOT NULL,
    -> article text NOT NULL,
    -> userfile varchar(50),
    -> userfile2 varchar(50),
    -> writedate char(10) NOT NULL,
    -> refnum int unsigned DEFAULT 0,
    -> primary key (uid)
    -> );

mysql> CREATE TABLE member_tab(
    -> mem_id varchar(20) DEFAULT '' NOT NULL,
    -> mem_email varchar(50),
    -> mem_password varchar(20) DEFAULT '' NOT NULL,
    -> mem_coin int unsigned DEFAULT 0,
    -> mem_savecoin int unsigned DEFAULT 0,
    -> mem_iconslot int unsigned DEFAULT 0,
    -> primary key (mem_id)
    -> );

ALTER TABLE `member_tab`  ORDER BY `mem_savecoin` DESC 


mysql> CREATE TABLE reply_thread(
    -> reply_uid int unsigned auto_increment,
    -> reply_saveuid int unsigned DEFAULT 0,
    -> reply_savepage int unsigned DEFAULT 0,
    -> reply_name varchar(20) NOT NULL,
    -> reply_password varchar(10) NOT NULL,
    -> reply_article text NOT NULL,
    -> primary key (reply_uid)
    -> );

mysql> CREATE TABLE game(
    -> game_uid int unsigned auto_increment,
    -> game_name varchar(50) NOT NULL,
    -> game_score int unsigned DEFAULT 0,
    -> game_limit int unsigned DEFAULT 0,
    -> game_hint text NOT NULL,
    -> game_hint2 text NOT NULL,
    -> game_hint3 text NOT NULL,
    -> game_answer varchar(20) NOT NULL,
    -> guserfile varchar(50),
    -> guserfile2 varchar(50),
    -> game_article text NOT NULL,
    -> game_initial varchar(20) NOT NULL,
    -> primary key (game_uid)
    -> );


mysql> CREATE TABLE meta(
    -> meta_uid int unsigned auto_increment,
    -> meta_name varchar(50) NOT NULL,
    -> meta_score int unsigned DEFAULT 0,
    -> muserfile varchar(50),
    -> meta_article text NOT NULL,
    -> meta_initial varchar(20) NOT NULL,
    -> meta_played int unsigned DEFAULT 1,
    -> primary key (meta_uid)
    -> );



//����
-���� main.php


//�α���
-���� ���� createaccount.php createaccount_db.php
-���� ã�� findaccount.php findaccount_db.php
-�α��� login.php login_db.php



//����
-���� game.php
-���� �б� nazo.php
-���� ���� editgame.php editgame_db.php
-���� ���� writegame.php writegame_db.php
-�̴� ���� endquiz.php



//�Խ���
-���� thread.php count_ref.php
-�� ���� �б� read.php
-�� ���� delete.php delete_db.php
-�� ���� edit.php edit_db.php
-�� ���� write.php write_db.php
-���� ���� writereply_db.php 


//��Ÿ ����
-���� meta.php
-��Ÿ �б� readmeta.php
-��Ÿ ���� writemeta.php writemete_db.php
-��Ÿ ���� editmeta.php editmeta_db.php


//��ŷ
-���� ranking.php


//����
-���� shop.php shop_db.php


//������
-���� mypage.php


�� 35���� php