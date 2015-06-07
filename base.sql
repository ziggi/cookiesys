CREATE SCHEMA cookiesys;

CREATE TABLE module ( 
  module_id            int UNSIGNED NOT NULL  AUTO_INCREMENT,
  name                 varchar(255)  NOT NULL  ,
  title                varchar(255)  NOT NULL  ,
  description          longtext    ,
  installed            bool  NOT NULL DEFAULT false ,
  CONSTRAINT pk_module PRIMARY KEY ( module_id ),
  CONSTRAINT idx_module UNIQUE ( name ) 
 );

CREATE TABLE module_conflicts ( 
  con_id               int UNSIGNED NOT NULL  AUTO_INCREMENT,
  module_id            int UNSIGNED NOT NULL  ,
  from_id              int UNSIGNED NOT NULL  ,
  CONSTRAINT pk_module_conflicts PRIMARY KEY ( con_id )
 );

CREATE INDEX idx_module_conflicts ON module_conflicts ( module_id );

CREATE INDEX idx_module_conflicts_0 ON module_conflicts ( from_id );

CREATE TABLE module_depends ( 
  dep_id               int UNSIGNED NOT NULL  AUTO_INCREMENT,
  module_id            int UNSIGNED NOT NULL  ,
  from_id              int UNSIGNED NOT NULL  ,
  CONSTRAINT pk_module_depends PRIMARY KEY ( dep_id )
 );

CREATE INDEX idx_module_depends ON module_depends ( module_id );

CREATE INDEX idx_module_depends_0 ON module_depends ( from_id );

CREATE TABLE news ( 
  id                   int UNSIGNED NOT NULL  AUTO_INCREMENT,
  name                 varchar(255)  NOT NULL  ,
  title                varchar(255)  NOT NULL  ,
  `text`               longtext  NOT NULL  ,
  CONSTRAINT pk_news PRIMARY KEY ( id ),
  CONSTRAINT idx_news UNIQUE ( name ) 
 );

CREATE TABLE page ( 
  id                   int UNSIGNED NOT NULL  AUTO_INCREMENT,
  name                 varchar(255)  NOT NULL  ,
  title                varchar(255)  NOT NULL  ,
  `text`               longtext  NOT NULL  ,
  CONSTRAINT pk_page PRIMARY KEY ( id ),
  CONSTRAINT idx_page UNIQUE ( name ) 
 );

ALTER TABLE module_conflicts ADD CONSTRAINT fk_module_conflicts FOREIGN KEY ( module_id ) REFERENCES module( module_id ) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE module_conflicts ADD CONSTRAINT fk_module_conflicts_0 FOREIGN KEY ( from_id ) REFERENCES module( module_id ) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE module_depends ADD CONSTRAINT fk_module_depends FOREIGN KEY ( module_id ) REFERENCES module( module_id ) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE module_depends ADD CONSTRAINT fk_module_depends_0 FOREIGN KEY ( from_id ) REFERENCES module( module_id ) ON DELETE RESTRICT ON UPDATE RESTRICT;

