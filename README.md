# Little - Quiz - Project

http://projectfox.dothome.co.kr/


PHP로 제작

본 프로젝트에 사용된 이미지의 저작권은 닌텐도에 있습니다.

# PHP
//메인
-메인 main.php


//로그인
-계정 생성 createaccount.php createaccount_db.php
-계정 찾기 findaccount.php findaccount_db.php
-로그인 login.php login_db.php



//퀴즈
-메인 game.php
-퀴즈 읽기 nazo.php
-퀴즈 수정 editgame.php editgame_db.php
-퀴즈 쓰기 writegame.php writegame_db.php
-미니 게임 endquiz.php



//게시판
-메인 thread.php count_ref.php
-글 덧글 읽기 read.php
-글 삭제 delete.php delete_db.php
-글 수정 edit.php edit_db.php
-글 쓰기 write.php write_db.php
-덧글 쓰기 writereply_db.php 


//메타 점수
-메인 meta.php
-메타 읽기 readmeta.php
-메타 쓰기 writemeta.php writemete_db.php
-메타 수정 editmeta.php editmeta_db.php


//랭킹
-메인 ranking.php


//상점
-메인 shop.php shop_db.php


//내정보
-메인 mypage.php


총 35개의 php


# DB


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

