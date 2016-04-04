--------------------------------------------------------------
-- Adatbázist létrehozó script
--------------------------------------------------------------
​
DROP TABLE Felhasznalo;
DROP TABLE Munka;
DROP TABLE Szaki;
DROP TABLE Ertekeles;
DROP TABLE uzenet;
DROP TABLE hirdetes;
DROP TABLE panasz;
DROP TABLE munkakat;
DROP SEQUENCE FELH_SEQ;
DROP SEQUENCE ert_SEQ;
DROP SEQUENCE sz_SEQ;
​
ALTER SESSION SET NLS_DATE_LANGUAGE = HUNGARIAN;
ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD';
​
​
Table
Data
Indexes
Model
Constraints
Grants
Statistics
UI Defaults
Triggers
Dependencies
SQL
​
CREATE TABLE  "FELHASZNALO" 
   (	"F_ID" NUMBER(*,0) NOT NULL ENABLE, 
	"NEV" VARCHAR2(40), 
	"FELHASZNALONEV" VARCHAR2(20), 
	"JELSZO" VARCHAR2(20), 
	"SZALLITASI_CIM" VARCHAR2(100), 
	"FOTO" VARCHAR2(100), 
	"TELEFONSZAM" NUMBER(11,0), 
	"EMAIL" VARCHAR2(30), 
	"TIPus" BOOLEAN(false), 
	 CONSTRAINT "FELHASZNALO_PRIMARY_KEY" PRIMARY KEY ("F_ID") ENABLE
   ) ;
​
   CREATE SEQUENCE felh_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;
​
CREATE OR REPLACE TRIGGER  "FELH_BIR" 
BEFORE INSERT ON Felhasznalo 
FOR EACH ROW
BEGIN
  :NEW.F_ID := felh_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "FELH_BIR" ENABLE;
​
​
​
​
CREATE TABLE  "MUNKA" 
   (	"M_ID" NUMBER(2,0) NOT NULL ENABLE, 
	"NEV" VARCHAR2(30), 
	 CONSTRAINT "MUNKA_PRIMARY_KEY" PRIMARY KEY ("NEV", "M_ID") ENABLE
   ) ;
​
   
CREATE TABLE  "SZAKI" 
   (	"SZ_ID" NUMBER(*,0) NOT NULL ENABLE, 
	"Munkanev" VARCHAR2(100) NOT NULL ENABLE, 
	"NEVE" VARCHAR2(40), 
	"FELHASZNALONEV" VARCHAR2(20), 
	"JELSZO" VARCHAR2(20), 
	"CIM" VARCHAR2(100), 
	"TELEFONSZAM" NUMBER(11,0), 
	"EMAIL" VARCHAR2(30), 
	"FOTO" VARCHAR2(100), 
	"MUNKATERULET" VARCHAR2(30), 
	 CONSTRAINT "SZAKI_PRIMARY_KEY" PRIMARY KEY ("SZ_ID") ENABLE
   ) ;ALTER TABLE  "SZAKI" ADD CONSTRAINT "SZAKI_FOREIGN_KEY" FOREIGN KEY ("Munkanev")
	  REFERENCES  "MUNKA" ("NEV") ENABLE;
​
CREATE OR REPLACE TRIGGER  "SZ_BIR" 
BEFORE INSERT ON Szaki
FOR EACH ROW
BEGIN
  :NEW.SZ_ID := sz_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "SZ_BIR" ENABLE;
   CREATE SEQUENCE sz_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;
​
​
CREATE TABLE  "ERTEKELES" 
   (	"E_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"SZ_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"F_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"PONT" NUMBER(*,0) NOT NULL ENABLE, 
	"DATUM" DATE, 
	"SZOVEG" VARCHAR2(200), 
	 CONSTRAINT "ERTEKELES_PRIMARY_KEY" PRIMARY KEY ("E_ID", "SZ_ID", "F_ID", "DATUM") ENABLE
   ) ;ALTER TABLE  "ERTEKELES" ADD CONSTRAINT "ERTEKELES_FOREIGN_KEY" FOREIGN KEY ("SZ_ID")
	  REFERENCES  "SZAKI" ("SZ_ID") ENABLE;ALTER TABLE  "ERTEKELES" ADD CONSTRAINT "ERTEKELES_FOREIGN_KEY2" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;
​
CREATE OR REPLACE TRIGGER  "ERT_BIR" 
BEFORE INSERT ON Ertekeles
FOR EACH ROW
BEGIN
  :NEW.E_ID := ert_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "ERT_BIR" ENABLE;
​
   CREATE SEQUENCE ert_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;
​
CREATE TABLE  "HIRDETES" 
   (	"H_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"F_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"DATUM" DATE, 
	"SZOVEG" VARCHAR2(500), 
	 CONSTRAINT "HIRDETES_PRIMARY_KEY" PRIMARY KEY ("H_ID", "F_ID", "DATUM") ENABLE
   ) ;ALTER TABLE  "HIRDETES" ADD CONSTRAINT "HIRDETES_FOREIGN_KEY" FOREIGN KEY ("F_ID")
	  REFERENCES  "SZAKI" ("F_ID") ENABLE;
​
	  
	  
CREATE TABLE  "MUNKAKAT" 
   (	"K_ID" NUMBER(2,0) NOT NULL ENABLE, 
	"KATEGORIA_NEV" VARCHAR2(100), 
	 CONSTRAINT "MUNKAKAT_PRIMARY_KEY" PRIMARY KEY ("K_ID") ENABLE
​
​
	 ) ;
CREATE TABLE  "PANASZ" 
​
   (	"P_ID" NUMBER(4,0) NOT NULL ENABLE, 
   "F_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"PANASZ" VARCHAR2(100) NOT NULL ENABLE, 
	 CONSTRAINT "PANASZ_PRIMARY_KEY" PRIMARY KEY ("F_ID", "P_ID") ENABLE
   ) ;ALTER TABLE  "PANASZ" ADD CONSTRAINT "PANASZ_FOREIGN_KEY" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;
	 
​
	 CREATE TABLE  "UZENET" 
   (	"U_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"SZ_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"F_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"DATUM" DATE, 
	"SZOVEG" VARCHAR2(500), 
	 CONSTRAINT "UZENET_PRIMARY_KEY" PRIMARY KEY ("U_ID", "SZ_ID", "DATUM", "F_ID") ENABLE
   ) ;ALTER TABLE  "UZENET" ADD CONSTRAINT "UZENET_FOREIGN_KEY" FOREIGN KEY ("SZ_ID")
	  REFERENCES  "SZAKI" ("SZ_ID") ENABLE;ALTER TABLE  "UZENET" ADD CONSTRAINT "UZENET_FOREIGN_KEY2" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;
​
CREATE TABLE  "KEDVENCEK" 
​
   (	"KED_ID" NUMBER(4,0) NOT NULL ENABLE, 
   "F_ID" NUMBER(4,0) NOT NULL ENABLE, 
    "SZ_ID" NUMBER(4,0) NOT NULL ENABLE, 
	 CONSTRAINT "KEDVENCEK_PRIMARY_KEY" PRIMARY KEY ("F_ID", "SZ_ID", "KED_ID") ENABLE
   ) ;ALTER TABLE  "KEDVENCEK" ADD CONSTRAINT "KEDVENCEK_FOREIGN_KEY" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;
	  ;ALTER TABLE  "KEDVENCEK" ADD CONSTRAINT "KEDVENCEK_FOREIGN_KEY2" FOREIGN KEY ("SZ_ID")
	  REFERENCES  "SZAKI" ("SZ_ID") ENABLE;