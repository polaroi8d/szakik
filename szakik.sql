--------------------------------------------------------------
-- Adatbázist létrehozó script
-- Szakik.hu 2016
-- 
--------------------------------------------------------------

ALTER SESSION SET NLS_DATE_LANGUAGE = HUNGARIAN;
ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD';

CREATE TABLE  "FELHASZNALO" 
   (	"F_ID" NUMBER(*,0) NOT NULL ENABLE, 
	"NEV" VARCHAR2(40), 
	"FELHASZNALONEV" VARCHAR2(20), 
	"JELSZO" VARCHAR2(20), 
	"CIM" VARCHAR2(100), 
	"VAROS_CIM" VARCHAR2(100),
	"IRANYITO_CIM" VARCHAR2(100),
	"FOTO" VARCHAR2(100), 
	"TELEFONSZAM" NUMBER(11,0), 
	"EMAIL" VARCHAR2(30), 
	 CONSTRAINT "FELHASZNALO_PRIMARY_KEY" PRIMARY KEY ("F_ID") ENABLE
   ) ;

CREATE SEQUENCE felh_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;

CREATE OR REPLACE TRIGGER  "FELH_BIR" 
BEFORE INSERT ON Felhasznalo 
FOR EACH ROW
BEGIN
  :NEW.F_ID := felh_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "FELH_BIR" ENABLE;

INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('1', 'Orbán Levente','orblev','gsafg4','Kemes utca 1/c 3/12','Szeged','6723','/photos/orblev.jpg','+36708452367','orblev@orblev.hu');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('2', 'Kincses Márk','kinmark','4asd53','Forrás utca 3','Kecskemét','6000','/photos/kinmar.jpg','+3670652135','kinmark@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('3', 'Király Bence','kirbenc','1asd53','Horváth Dome krt 54','Kecskemét','6000','/photos/kirben.jpg','+36706321575','kirbenc@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('4', 'Varga Dániel','vargdan','13zht42','Kisfaludy utca 547','Kecskemét','6000','/photos/vargda.jpg','+36704247564','vargdan@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('5', 'Tóth Dávid','tothdav','15htz1','Dobó István krt 6','Kecskemét','6000','/photos/totdav.jpg','+36701245785','tothdav@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('6', 'Gergely Gréta','greti','1tzt531','Katona József utca 3','Kecskemét','6000','/photos/gergelygre.jpg','+36707788563','greti@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('7', 'Lakatos Pista','lajpista','1htz153','Bánk Bán utca 98','Kecskemét','6000','/photos/lakatospist.jpg','+36707557895','lajpista@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('8', 'Vecsernyés Tünde','vecstund','h1t1th','Erkel utca 2','Kecskemét','6000','/photos/vecstund.jpg','+36707556896','vecstund@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('9', 'Fehér Etelka','feheret','kuzzt34','Rávágy tér 1','Kecskemét','6000','/photos/feheretl.jpg','+36706369858','feheret@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('10', 'Varga Dorina','vargador','3r4efewer','Kuraközy utca 13','Kecskemét','6000','/photos/vargdor.jpg','+36305757634','vargador@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('11', 'Lakatos Annamari','laaktan','1asd56','Toth László sétány 88','Kecskemét','6000','','+36306986532','laaktan@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('12', 'Kovács Miron','kovmiron','k56jh561','Ilona utca 2','Kecskemét','6000','','+36307986532','kovmiron@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('13', 'Gellérfy Zsombor','gellrfzsomb','4jh5k4jh1','Murányi utca 1','Kecskemét','6000','','+36302659851','gellrfzsomb@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('14', 'Tisoczki Péter','tisoczkipet','1k5h315','Zöldfa utca 2','Kecskemét','6000','','+36305687954','tisoczkipet@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('15', 'Vince Dániel','vinceda','h1k33h','Dankó utca 1','Kecskemét','6000','','+36307986532','vinceda@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('16', 'Zakor Gyula','zakorgyu','31hk51','Táltos utca 5','Kecskemét','6000','','+36307986532','zakorgyu@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('17', 'Fokin Valentin','fokinva','531jk231h3','Mezei utca 13','Kecskemét','6000','','+3630798654','fokinva@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('18', 'Varga Péter','varpet','123kh31','Vasút utca 76','Kecskemét','6000','','+36306789566','varpet@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('19', 'Gumigyártó Barbie','gyumibar','53jhk53h','Juhász utca 26','Kecskemét','6000','','+36306789654','gyumibar@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('20', 'Golhovics Kitti','golhokiti','21jkh23','Thököly utca 2','Kecskemét','6000','','+36307896545','golhokiti@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('21', 'Kothenc Robert','kotherob','sd231fsd31','Erzsébet utca 56','Kecskemét','6000','','+36307896456','kotherob@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('22', 'Vass Dávid','vasde','43tgr','Számadó utca 65','Kecskemét','6000','','+36307653245','vasde@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('23', 'Dimovics Dániel','dimo','87iu56','Kazal utca 21','Kecskemét','6000','','+36304986545','dimo@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('24', 'Szanka Misi','szakni','65ztrg7','Vízaknai utca ','Kecskemét','6000','','+36307986532','szakni@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('25', 'Szilárd Dani','szida','23ewds','Nyereg utca 3','Kecskemét','6000','','+36307986545','szida@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('26', 'Kerekes Zsolt','kerekeszs','cyfvew3','Főfasor utca 213','Szeged','6726','','+36304986534','kerekeszs@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('27', 'Csonka Gábor','csonkaga','dfs315','Balfasor utca 21','Szeged','6726','','+36306964585','csonkaga@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('28', 'Kitti Timea','kittitimi','3131f1','Jobbfasor utca 83','Szeged','6726','','+36306325145','kittitimi@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('29', 'Bánfi Brigitta','banfibrig','3r13sd5','Középfasor utca 156','Szeged','6726','','+36309658745','banfibrig@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('30', 'Pletl Szilveszter','pletlz','3d13as5','Szövetség utca 23','Szeged','6726','','+36306954751','pletlz@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('31', 'Kovács Viktor','kovacsv','231dsa53','Mikszáth Kálmán utca 2','Szeged','6726','','+36306548565','kovacsv@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('32', 'Szeles Bendeguz','szelesb','23as1da53','Szent László Krt 23','Kecskemét','6000','','+36306587452','szelesb@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('33', 'Ujvári Petra','petrauj','as2d1as1','Székelyfonó utca 2','Kecskemét','6000','','+36306954258','petrauj@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('34', 'Néveri Cintia','cintianever','1as53d531as','Futár utca 543','Kecskemét','6000','','+36306896525','cintianever@gmail.com');
INSERT INTO FELHASZNALO (F_ID, NEV, FELHASZNALONEV, JELSZO, CIM, varos_CIM, iranyito_CIM, FOTO, TELEFONSZAM, EMAIL) VALUES ('35', 'Asztalor Dorottya','dorottyaszt','a1d2a','Vacsi köz 16','Kecskemét','6000','','+3630965856','dorottyaszt@gmail.com');

   
CREATE TABLE  "SZAKI" 
   (	"SZ_ID" NUMBER(*,0) NOT NULL ENABLE, 
	"MUNKANEV" VARCHAR2(100) NOT NULL ENABLE, 
	"NEVE" VARCHAR2(40), 
	"FELHASZNALONEV" VARCHAR2(20), 
	"JELSZO" VARCHAR2(20), 
	"TELEFONSZAM" NUMBER(11,0), 
	"EMAIL" VARCHAR2(30), 
	"FOTO" VARCHAR2(100), 
	"MUNKATERULET" VARCHAR2(30), 
	"TIPUS" VARCHAR2(10),
	 CONSTRAINT "SZAKI_PRIMARY_KEY" PRIMARY KEY ("SZ_ID") ENABLE
   ) ;

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

INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('1', 'Asztalos','Vida Sándor','vidas','56tg','+3670125478','@gmail.com','photos/aszta.jpg','Szeged','premium');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('2', 'Villany szerelő','Szőke Ádám ','szokea','54trg','+36704578545','szokea@gmail.com','','Szeged','premium');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('3', 'Vízvezeték szerelő','Molnár István','molnari','efs34','+36707896457','molnaris@gmail.com','','Szeged','premium');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('4', 'Gáz','Alpár Viktor','alparv','7uzhrtr','+36707554645','alprarvi@gmail.com','','Szeged','premium');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('5', 'Lakatos','Almási Dániel','almasid','34qwda','+36704457864','almasid@gmail.com','','Szeged','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('6', 'Esztergályos','Baranyai Gergő','baranyaig','asf32','+36707777777','eszterbar@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('7', 'Kulcs másoló','Baranyai Ágnes','baranyaia','i8ujz','+36706665612','agneska@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('8', 'Cipész','Bagi Krisztina','bagikrist','jmnhgbvf','+36202459678','krisztinabagi@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('9', 'Rendszergazda','Fazekas Márton','fazekasmart','3red','+36204563124','fazerkmarrt@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('10', 'Dajka','Fodor Hella','fodorhella','23fsdf','+36207986534','fodorhella@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('11', 'Asztalos','Fődi Dániel','fodidani','rfewsdf','+36204653214','fodidani@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('12', 'Kéményseprő','Futó Loránt','futolor','2rdfafs','+3620125364','futolorant@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('13', 'Bicikli szervízelő','Franyó Ádám','franyoad','23rdfasf','+3620698547','franyoadam@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('14', 'Műkörömépítő','Gál Gergő','galgerg','32rewsdf','+36203654212','galgergo@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('15', 'Fodrász','Füzi Imre','fulopi','8iujzh','+3620365215','fuziimere@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('16', 'Artista','Fülöp Ádám','adaminyo','2edas','+3620236524','fulopadam@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('17', 'Állattenyésztő','Görög Bernadett','bernadettg','3rse','+3620653256','gorogbernadett@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('18', 'Agrártechnikus','Kincses Fanni','kincsesf','3rfse','+36206363332','fannikincs@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('19', 'Halőr','Kocsir Réka','kocsirs','34erfs','+3620658752','kocsirrea@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('20', 'Biztonsági őr','Kókity Lilla','koktiya','23rfs','+36205236524','lillakoty@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('21', 'Hegesztő','Komár András','koviandras','54tgfsd','+3620325632','komarandri@gmail.com','','Kecskemét','normal');
INSERT INTO SZAKI (SZ_ID, Munkanev, NEVE, FELHASZNALONEV, JELSZO, TELEFONSZAM, EMAIL, FOTO, MUNKATERULET, TIPUS ) VALUES ('22', 'Takarító','Varga József','vargajozsi','novagyok','+3620632512','jozsefvarga@gmail.com','','Kecskemét','normal');

CREATE TABLE  "ERTEKELES" 
   (	"E_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"SZ_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"F_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"PONT" NUMBER(*,0) NOT NULL ENABLE, 
	"DATUM" DATE, 
	"SZOVEG" VARCHAR2(200), 
	 CONSTRAINT "ERTEKELES_PRIMARY_KEY" PRIMARY KEY ("E_ID", "SZ_ID", "F_ID", "DATUM") ENABLE
   ) ;ALTER TABLE  "ERTEKELES" ADD CONSTRAINT "ERTEKELES_FOREIGN_KEY" FOREIGN KEY ("SZ_ID")
	  REFERENCES  "SZAKI" ("SZ_ID") ENABLE; ALTER TABLE  "ERTEKELES" ADD CONSTRAINT "ERTEKELES_FOREIGN_KEY2" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;
<<<<<<< HEAD

INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('1','2','1','1','2016-01-23', 'Nagyon drága volt és még szarul is csinálta. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('2','3','2','1','2016-01-01', 'Nem ajánlom senkinek. Komolytalan.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('3','4','3','1','2016-02-12', 'Nem nevezném szakembernek, nem igazán érti a dolgát, csak lehuzza az embert. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('4','5','4','1','2016-03-23', 'Még jó, hogy nem történt nagyobb baj, amit ez az ember leművelt... Kész vicc!');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('5','6','5','1','2016-03-23', 'Senki ne hívja fel.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('6','7','6','1','2016-03-02', 'Telefont ha még fel is veszi, semmit nem lehet érteni abból amit mond, nehéz időpontot egyeztetni, és a munkája is hagy némi kivánni valót. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('7','1','7','2','2016-03-03', 'Hát nem mondom, hogy nem találkoztam rosszabb szakemberrel de ő azért ott van köztük.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('8','2','8','2','2016-02-04', 'Huhh.. Mit is mondhatnék? Ne próbáljátok keresni!');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('9','3','9','2','2016-02-05', 'Azért kap 2 pontot mert legalább bocsánatot kért. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('10','4','10','2','2016-02-06', 'Többet nem hívjuk.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('11','5','11','3','2016-03-07', 'Közepes értékelést kap.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('12','6','12','3','2016-03-04', 'Megcsinálta a munkáját de többet nem hívjuk.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('13','7','13','3','2016-03-07', 'Egynek elment, de azért annyira nem volt nagy szám, hogy újra visszahívjam.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('14','8','14','3','2016-03-12', 'Minden rendben ment addig ameddig ki nem mondta, hogy mennyivel tartozunk..');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('15','1','15','3','2016-03-16', 'Bődületes árakon dolgozik');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('16','2','16','3','2016-03-14', 'Ha nem hozta volna magával a kisfiát még időben be is fejezte volna.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('17','3','17','4','2016-01-17', 'Jó volt, nem a legjobb de jó volt.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('18','4','18','4','2016-01-19', 'Meg vagyunk vele elégedve, azért kap csak 4 pontot mert nem tudja felvenni azt a nyüves telefont.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('19','5','19','4','2016-01-20', '4 pont jár a munkájára. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('20','6','20','4','2016-01-30', 'Köszönjük, legközelebb is őt választjuk.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('21','7','21','4','2016-04-30', 'Kijavította amit más elszúrt köszönjük, késése viszont nem tetszett. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('22','8','22','4','2016-04-30', 'Szerszámokat nekem kellett neki adni, amugy minden rendben volt.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('23','9','23','4','2016-04-24', 'Ügyes, ügyes, de büdös. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('24','3','24','5','2016-04-21', 'Király volt!');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('25','5','25','5','2016-04-28', 'Határidőket betartva mindent szépen és ügyesen befejezett. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('26','3','26','5','2016-04-29', 'Szépen dolgozott jár a pacsi.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('27','3','27','5','2016-01-27', 'Ügyes volt! Köszönöm');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('28','2','28','5','2016-01-27', 'Megbízható a munkájára igényes szakember.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('29','4','29','5','2016-01-21', 'Minden rendben volt megvagyok vele elégedve. ');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('30','1','30','1','2016-01-01', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('31','2','31','1','2016-01-02', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('32','3','32','1','2016-01-03', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('33','4','33','1','2016-01-04', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('34','5','34','1','2016-01-05', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('35','6','35','1','2016-01-06', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('36','7','1','1','2016-01-07', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('37','8','1','1','2016-01-08', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('38','9','2','1','2016-01-09', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('39','10','3','1','2016-01-10', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('40','11','3','1','2016-01-11', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('41','12','4','1','2016-01-12', 'Rossz minőségű munka.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('42','13','4','2','2016-01-13', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('43','14','5','2','2016-01-14', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('44','15','5','2','2016-01-15', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('45','16','6','2','2016-01-16', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('46','17','6','2','2016-01-17', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('47','18','7','2','2016-01-18', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('48','19','7','2','2016-01-21', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('49','20','8','2','2016-01-24', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('51','21','10','2','2016-01-21', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('52','22','21','2','2016-01-23', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('53','2','22','2','2016-01-29', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('54','1','23','2','2016-02-30', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('55','4','24','2','2016-02-21', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('56','5','25','2','2016-02-1', '2 pontot adok neki.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('57','6','26','3','2016-02-2', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('58','7','27','3','2016-02-3', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('59','8','28','3','2016-02-20', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('60','9','29','3','2016-02-18', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('61','10','30','3','2016-02-28', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('62','11','31','3','2016-02-27', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('63','12','32','3','2016-02-26', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('64','13','33','3','2016-02-26', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('65','14','34','3','2016-02-24', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('66','15','35','3','2016-02-11', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('67','16','6','3','2016-02-10', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('68','17','7','3','2016-02-11', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('69','18','3','3','2016-02-18', 'Közepes teljesítmény.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('70','19','3','4','2016-02-01', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('71','20','4','4','2016-02-02', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('72','21','6','4','2016-02-03', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('73','22','8','4','2016-02-04', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('74','1','11','4','2016-02-05', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('75','2','12','4','2016-02-06', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('76','3','13','4','2016-02-07', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('77','4','14','4','2016-02-08', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('78','5','15','4','2016-02-09', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('79','6','16','4','2016-03-10', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('80','7','17','4','2016-02-11', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('81','8','18','4','2016-02-1', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('82','9','19','4','2016-03-2', 'Jó, de nem tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('83','10','20','5','2016-03-3', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('84','11','21','5','2016-03-8', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('85','12','22','5','2016-03-9', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('86','13','23','5','2016-03-11', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('87','14','24','5','2016-03-21', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('88','15','25','5','2016-03-01', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('89','16','26','5','2016-03-02', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('90','17','27','5','2016-03-03', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('91','18','28','5','2016-03-04', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('92','19','29','5','2016-03-05', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('93','20','30','5','2016-03-06', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('94','21','31','5','2016-03-07', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('95','22','33','5','2016-03-08', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('96','1','1','5','2016-04-09', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('97','2','2','5','2016-04-10', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('98','3','3','5','2016-04-11', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('99','4','4','5','2016-04-11', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('100','5','5','5','2016-04-12', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('101','6','6','5','2016-04-13', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('102','7','7','5','2016-04-14', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('103','8','8','5','2016-04-15', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('101','9','11','5','2016-04-16', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('105','10','16','5','2016-04-17', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('106','11','19','5','2016-04-18', 'Tökéletes.');
INSERT INTO ERTEKELES (E_ID,SZ_ID,F_ID,PONT, DATUM, SZOVEG) VALUES ('107','12','23','5','2016-04-19', 'Tökéletes.');
=======
CREATE OR REPLACE TRIGGER  "ERT_BIR" 
BEFORE INSERT ON ERTEKELES
FOR EACH ROW
BEGIN
  :NEW.E_ID := ert_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "ERT_BIR" ENABLE;
   CREATE SEQUENCE ert_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;
>>>>>>> a41817915a35cdd482a5956d06751dbc5855d399

CREATE TABLE  "IGENYLES" 
   (	"H_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"F_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"DATUM" DATE,
	"SZOVEG" VARCHAR2(500), 
	"Munkakat" VARCHAR2(50),
	 CONSTRAINT "IGENYLES_PRIMARY_KEY" PRIMARY KEY ("H_ID", "F_ID", "DATUM") ENABLE
   ) ;ALTER TABLE  "IGENYLES" ADD CONSTRAINT "IGENYLES_FOREIGN_KEY" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;


	 ) ;
	 CREATE SEQUENCE igeny_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;

CREATE OR REPLACE TRIGGER  "IGENY" 
BEFORE INSERT ON IGENYLES
FOR EACH ROW
BEGIN
  :NEW.H_ID := igeny_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "IGENY" ENABLE;

CREATE TABLE  "PANASZ" 

   (	"P_ID" NUMBER(4,0) NOT NULL ENABLE, 
   "F_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"PANASZ" VARCHAR2(100) NOT NULL ENABLE, 
	 CONSTRAINT "PANASZ_PRIMARY_KEY" PRIMARY KEY ("F_ID", "P_ID") ENABLE
   ) ;ALTER TABLE  "PANASZ" ADD CONSTRAINT "PANASZ_FOREIGN_KEY" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;
	  
	  CREATE SEQUENCE p_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;
	  
	  	 CREATE OR REPLACE TRIGGER  "PAN" 
BEFORE INSERT ON PANASZ
FOR EACH ROW
BEGIN
  :NEW.P_ID := p_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "PAN" ENABLE;
	 

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
	  
	
	CREATE SEQUENCE uz_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;
CREATE OR REPLACE TRIGGER  "MESS" 
BEFORE INSERT ON UZENET
FOR EACH ROW
BEGIN
  :NEW.U_ID := uz_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "MESS" ENABLE;

CREATE TABLE  "KEDVENCEK" 

   (
   "F_ID" NUMBER(4,0) NOT NULL ENABLE, 
    "SZ_ID" NUMBER(4,0) NOT NULL ENABLE, 
	 CONSTRAINT "KEDVENCEK_PRIMARY_KEY" PRIMARY KEY ("F_ID", "SZ_ID") ENABLE
   ) ;ALTER TABLE  "KEDVENCEK" ADD CONSTRAINT "KEDVENCEK_FOREIGN_KEY" FOREIGN KEY ("F_ID")
	  REFERENCES  "FELHASZNALO" ("F_ID") ENABLE;
	  ;ALTER TABLE  "KEDVENCEK" ADD CONSTRAINT "KEDVENCEK_FOREIGN_KEY2" FOREIGN KEY ("SZ_ID")
	  REFERENCES  "SZAKI" ("SZ_ID") ENABLE;
	  
 CREATE TABLE  "Fizetes" 
   (	"Fiz_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"SZ_ID" NUMBER(4,0) NOT NULL ENABLE, 
	"DATUM" DATE, 
	"osszeg" INTEGER, 
	 CONSTRAINT "Fizetes_PRIMARY_KEY" PRIMARY KEY ("Fiz_ID", "SZ_ID", "DATUM") ENABLE
   ) ;ALTER TABLE  "Fizetes" ADD CONSTRAINT "Fizetes_FOREIGN_KEY" FOREIGN KEY ("SZ_ID")
	  REFERENCES  "SZAKI" ("SZ_ID") ENABLE;
	  

CREATE SEQUENCE fiz_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;
CREATE OR REPLACE TRIGGER  "FIZ" 
BEFORE INSERT ON Fizetes
FOR EACH ROW
BEGIN
  :NEW.Fiz_ID := fiz_seq.NEXTVAL;
END;
/
ALTER TRIGGER  "FIZ" ENABLE;
	  
	  

   