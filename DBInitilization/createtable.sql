CREATE TABLE DIAGNOSIS (
  Diag_Id INT NOT NULL Primary Key CHECK(Diag_Id>0) ,
  Patient_LName varchar(255) NOT NULL,
  Patient_FName varchar(255) NOT NULL,
  Staff_Id INT CHECK(Staff_Id > 0),
  Diag_Details varchar(500) DEFAULT NULL,
  Severity INT DEFAULT NULL CHECK(Severity>0 AND Severity<10),
  Diag_Date INT DEFAULT NULL,            
  Med_id INT CHECK(Med_Id > 0),
  Remark varchar(255) DEFAULT NULL,
  Patient_Id INT UNIQUE  CHECK(Patient_Id>0),    
  Second_Diag_Date varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table MEDICATION(
Med_Id INT primary key CHECK(Med_Id > 0),
Name VARCHAR(20),
Manf varchar(50),
Contents varchar(50),
Effects varchar(50),
Form varchar(50),
Dosage varchar(50),
Side_Effects varchar(50),
Schedule varchar(50),
Description varchar(50),
Cost INT CHECK(Cost>0)
);

create table STAFF(
        Staff_Id int(20) primary key CHECK(Staff_Id > 0),
        First_Name varchar(20),
        Last_Name       varchar(20),
        Gender          INT CHECK(Gender=1 OR Gender=0),
        SSN            BIGINT,
        Home_Phone BIGINT,
        Mobile_Phone  BIGINT,
        Email varchar(20),
        Department_Id   varchar(20),
        Position_Id     varchar(20),
        Position_Title  varchar(20)
);

CREATE TABLE PATIENT(
Patient_Id INT primary key CHECK(Patient_Id>0),
First_Name VARCHAR(100),
Last_Name VARCHAR(100) ,
Gender int CHECK(Gender=1 OR Gender=0),
Home_Phone BIGINT,
Cell_Phone BIGINT,
Emerg_Cont BIGINT,
Birthday varchar(30), 
Allergies VARCHAR(20) ,
Surgical_History VARCHAR(20),
Visit_Date varchar(30) ,
Staff_Id INT CHECK(Staff_Id > 0) ,
Insurance VARCHAR(20),
Med_Id INT CHECK(Med_Id>0),
Reason varchar(50)
);

create table MADE_BY
(
    Diag_Id INT,
    Staff_Id INT
);
create table DIAGNOSED_BY
(
Patient_Id INT,
Staff_Id INT
);

create table VISITS
(
Patient_Id int ,
Staff_Id int,
Reason varchar(30),
Visit_Date DATE 
);
create table PRESCRIBES
(
Staff_Id int,
Med_Id int
);

CREATE TABLE Takes(
Patient_Id int,
Med_Id int,
Dosage varchar(255),
Schedule varchar(255)
);

CREATE TABLE Applies_To(
           Patient_Id int,
Diag_Id int
);

-- insertion --

INSERT INTO STAFF VALUES( 2001, 'Erasmo ', 'Littlewood ', 1, 8807971152, 7569500329, 9740871525, 'elittle@hospital.med', 1, 11, 'Doctor');
INSERT INTO STAFF VALUES( 2002, 'Edyth ', 'Upright ', 0, 2695269298, 9073981254, 4839743141, 'eupright@hospital.med', 2, 21, 'Nurse');
INSERT INTO STAFF VALUES( 2003, 'Tijuana ', 'Hatten  ', 1, 6236733046, 4541110556, 3625408642, 'thatten@hospital.med', 2, 31, 'Pharmacist');
INSERT INTO STAFF VALUES( 2004, 'Suzy', 'Straus  ', 0, 5850614984, 6699216085, 5712189460, 'sstraus@hospital.med', 3, 41, 'Surgeon');
INSERT INTO STAFF VALUES( 2005, 'Adriane', 'Goodwill  ', 1, 2660658227, 2701735760, 6423552585, 'agood@hospital.med', 9, 51, 'Receptionist');
INSERT INTO STAFF VALUES( 2006, 'Celine', 'Orsi  ', 1, 9671774852, 4564309608, 9098630294, 'corsi@hospital.med', 10, 61, 'Janitor');
INSERT INTO STAFF VALUES( 2007, 'Dannie', 'Moor  ', 0, 9697882032, 7423689471, 8607328462, 'dmoore@hospital.med', 4, 71, 'Assistant ');
INSERT INTO STAFF VALUES( 2008, 'Loreta', 'Dunagan', 1, 6759977834, 8606851796, 3975347172, 'ldunagan@hospital.med', 5, 72, 'Assistant ');
INSERT INTO STAFF VALUES( 2009, 'Corrina', 'Spargo ', 1, 8733479346, 2426781230, 5761493817, 'cspargo@hospital.med', 3, 52, 'Receptionist');
INSERT INTO STAFF VALUES( 2010, 'Maricruz', 'Doyle  ', 1, 9759035541, 8688776729, 3096584399, 'mdoyle@hospital.med', 6, 32, 'Pharmicist');
INSERT INTO STAFF VALUES( 2011, 'Lisbeth', 'Kneip  ', 0, 7671662059, 1620687077, 8836828071, 'lkneip@hospital.med', 7, 12, 'Doctor');
INSERT INTO STAFF VALUES( 2012, 'Brooks', 'Temple  ', 1, 4519245512, 6064078498, 7076642119, 'btemple@hospital.med', 3, 13, 'Doctor');
INSERT INTO STAFF VALUES( 2013, 'Lyndsey', 'Teachout  ', 1, 6725107234, 8188514325, 3511258555, 'lteach@hospital.med', 4, 42, 'Surgeon');
INSERT INTO STAFF VALUES( 2014, 'Lola', 'Noe  ', 0, 2724512754, 7411977772, 1763501391, 'lnoe@hospital.med', 5, 22, 'Nurse');
INSERT INTO STAFF VALUES( 2015, 'Winford', 'Brewton  ', 0, 6663719162, 3607663064, 3400069608, 'wbrewton@hospital.med', 2, 33, 'Pharmacist');
INSERT INTO STAFF VALUES( 2016, 'Charleen', 'Burleigh  ', 1, 6223869116, 2594740800, 4431514723, 'cburleigh@hospita.med', 6, 53, 'Receptionist');
INSERT INTO STAFF VALUES( 2017, 'Kanisha', 'Rudolph  ', 1, 3506642774, 8267861115, 5431198849, 'krudolph@hospital.med', 7, 14, 'Doctor');
INSERT INTO STAFF VALUES( 2018, 'Bobby', 'Timko  ', 1, 5771851267, 8022056151, 8151212845, 'btimbko@hospital.med', 2, 23, 'Nurse');
INSERT INTO STAFF VALUES( 2019, 'Kena', 'Marzano  ', 0, 4805180527, 7406514856, 2987032200, 'kmarzano@hospital.med', 1, 62, 'Janitor');
INSERT INTO STAFF VALUES( 2020, 'Erlinda Deem  ', 'Deem  ', 1, 3934377728, 2152156126, 7297848399, 'edeem @hospital.med', 1, 15, 'Doctor');

INSERT INTO PATIENT VALUES( 1001, 'Theresia ', 'Newson  ', 1, 7823941382, 9504547736, 984772063, '2/13/1990', 'peanuts', 'NA', '1/1/2000', 2001,'Medicare', 10, 'fever');
INSERT INTO PATIENT VALUES( 1002, 'Tessa   ', 'Carstens', 1, 7514683710, 8645651126, 3247511527, '3/25/1987', 'penecillan', 'tonsilectomy', '4/5/2014', 2001,'United Healthcare', 10, 'flu');
INSERT INTO PATIENT VALUES( 1003, 'Latina   ', 'Rabalais', 1, 4274498999, 7218988374, 8522315617, '8/4/1980', 'cats', 'Breast Biopsy', '3/3/2010', 2001,'Medicare', 1, 'common cold');
INSERT INTO PATIENT VALUES( 1004, 'Veda  ', ' Demers', 1, 5493678444, 3620526120, 7501219613, '11/21/1967', 'penecillan', 'NA', '5/2/2016', 2020,'Aetna Student', 5, 'Epityphlitis');
INSERT INTO PATIENT VALUES( 1005, 'Loris ', 'Scipio  ', 1, 7627069797, 1576820951, 9444290294, '11/5/2000', 'Carbamazepine', 'Thyroid surgery', '7/4/2013', 2004,'Aetna', 2, 'dislocated shoulder');
INSERT INTO PATIENT VALUES( 1006, 'Ruthanne  ', ' Bermeo', 1, 3396929696, 4316305192, 5216139229, '12/3/1977', 'pollen', 'NA', '4/21/2014', 2020,'Blue Cross Blue Shield', 2, 'stomach ache');
INSERT INTO PATIENT VALUES( 1007, 'Lasonya', ' Ferrell  ', 1, 9581518011, 1204828189, 1338885005, '4/3/1964', 'aspirin', 'NA', '1/1/2012', 2013,'Cigna', 1, 'heart attack');
INSERT INTO PATIENT VALUES( 1008, 'Yung   ', 'Cornette', 1, 9617247247, 5406883942, 4916880311, '6/23/1987', 'anticonvulsants', 'NA', '1/1/2015', 2017,'Aetna Student', 4, 'asthma');
INSERT INTO PATIENT VALUES( 1009, 'Charlott   ', 'Wuensche', 1, 9180335318, 7910281602, 8703137795, '8/6/1978', 'anticonvulsants', 'NA', '1/2/2015', 2017,'Aetna Student', 7, 'ADD');
INSERT INTO PATIENT VALUES( 1010, 'Coretta ', 'Lefevers  ', 1, 2642364739, 8566262691, 3642449459, '9/3/1989', 'codeine', 'NA', '1/3/2015', 2017,'Cigna', 8, 'ADHD');
INSERT INTO PATIENT VALUES( 1011, 'Jamal ', 'Person  ', 0, 2441511192, 9763625115, 5135172470, '3/20/1993', 'cats', 'NA', '1/4/2015', 2012,'Humana', 14, 'epilepsy');
INSERT INTO PATIENT VALUES( 1012, 'Velma', 'Fredrickson  ', 1, 2211071721, 3447091411, 1095574594, '2/3/1993', 'Carbamazepine', 'NA', '1/5/2015', 2012,'Blue Cross Blue Shield', 12, 'high blood pressure');
INSERT INTO PATIENT VALUES( 1013, 'Nida', 'Moris  ', 1, 2466429201, 2743304657, 6768855987, '1/13/1992', 'codeine', 'NA', '1/6/2015', 2001,'United Healthcare', 11, 'high cholestorol');
INSERT INTO PATIENT VALUES( 1014, 'Mikel ', 'Smidt  ', 0, 1841768245, 1394067378, 7496331929, '4/20/1977', 'Phenytoin', 'NA', '1/7/2015', 2001,'Lifetime Healthcare', 5, 'diabetes');
INSERT INTO PATIENT VALUES( 1015, 'Jessia', 'Galan ', 1, 9943238048, 9381766908, 3666321071, '6/21/1948', 'Tetracycine', 'ultrasound', '1/9/2015', 2012,'Medicare', 15, 'seasonal affective disorder');
INSERT INTO PATIENT VALUES( 1016, 'Asuncion', 'Overman  ', 1, 9561069090, 8342978454, 1817954459, '7/29/1990', 'Sufa', 'NA', '1/2/2015', 2004,'Aetna Student', 6, 'moderate head cut');
INSERT INTO PATIENT VALUES( 1017, 'Emile ', 'Geno  ', 0, 8762179183, 6192322207, 9270368267, '3/1/2000', 'Tetracycine', 'NA', '1/3/2015', 2013,'Blue Cross Blue Shield', 6, 'bone fracture');
INSERT INTO PATIENT VALUES( 1018, 'Mao   ', 'Michaelsen', 1, 9054436042, 6712032066, 3027976818, '8/24/1955', 'Carbamazepine', 'NA', '1/4/2015', 2013,'Humana', 6, 'car accident ');
INSERT INTO PATIENT VALUES( 1019, 'Huey', 'Courville  ', 0, 4420082607, 6153662773, 4455847817, '9/26/2003', 'Phenytoin', 'NA', '1/5/2015', 2001,'Cigna', 0, 'cramp ');
INSERT INTO PATIENT VALUES( 1020, 'Henriette', 'Plante  ', 1, 7742282398, 2573768552, 5975061471, '5/17/1996', 'Sufa', 'NA', '1/6/2015', 2020,'Aetna', 6, 'broken leg');


INSERT INTO MEDICATION VALUES( 1, 'tylenol', 'a', 'a', 'mild painkiller', 'pill', 'a', 'a', 'a', 'a', 86);
INSERT INTO MEDICATION VALUES( 2, 'ibuprofen', 'b', 'b', 'mild painkiller', 'pill', 'b', 'b', '', 'b', 57);
INSERT INTO MEDICATION VALUES( 3, 'sudafed', 'c', 'c', 'decongestant', 'pill', 'c', 'c', 'c', 'c', 50);
INSERT INTO MEDICATION VALUES( 4, 'odfa', 'd', 'd', 'strong painkiller', 'pill', 'd', 'd', 'd', 'd', 56);
INSERT INTO MEDICATION VALUES( 5, 'insulin', 'e', 'e', 'processes sugar', 'injection', 'e', 'e', 'e', 'e', 70);
INSERT INTO MEDICATION VALUES( 6, 'wnafsk', 'f', 'f', 'localized painkiller', 'spray', 'f', 'f', 'f', 'f', 96);
INSERT INTO MEDICATION VALUES( 7, 'ritalin', 'g', 'g', 'helps focus', 'pill', 'g', 'g', 'g', 'g', 100);
INSERT INTO MEDICATION VALUES( 8, 'concerta', 'a', 'a', 'helps focus', 'pill', 'a', 'a', 'a', 'a', 54);
INSERT INTO MEDICATION VALUES( 9, '', 'b', 'b', 'opens airways', 'inhaler', 'b', 'b', 'b', 'b', 95);
INSERT INTO MEDICATION VALUES( 10, 'mucinex', 'c', 'c', 'decreases mucus', 'pill', 'c', 'c', 'c', 'c', 66);
INSERT INTO MEDICATION VALUES( 11, 'a', 'd', 'd', 'decreases cholestorol', 'pill', 'd', 'd', 'd', 'd', 64);
INSERT INTO MEDICATION VALUES( 12, 'Lasix', 'e', 'e', 'decreases blood pressure', 'pill', 'e', 'e', 'e', 'e', 80);
INSERT INTO MEDICATION VALUES( 13, 'keppra', 'f', 'f', 'prevents epileptic seizures', 'pill', 'f', 'f', 'f', 'f', 83);
INSERT INTO MEDICATION VALUES( 14, 'c', 'g', 'g', 'decreases symptoms of depression', 'pill', 'g', 'g', 'g', 'g', 74);
INSERT INTO MEDICATION VALUES( 15, 'g', 'a', 'a', 'decreases symptoms of anxiety', 'pill', 'a', 'a', 'a', 'a', 86);
INSERT INTO MEDICATION VALUES( 16, 'c', 'b', 'b', 'does a thing', 'pill', 'b', 'b', 'b', 'b', 75);
INSERT INTO MEDICATION VALUES( 17, 'f', 'c', 'c', 'wklnfe', 'pill', 'c', 'c', 'c', 'c', 92);
INSERT INTO MEDICATION VALUES( 18, 'b', 'd', 'd', 'wkefn', 'pill', 'd', 'd', 'd', 'd', 98);
INSERT INTO MEDICATION VALUES( 19, 'd', 'e', 'e', 'wleknfkw', 'pill', 'e', 'e', 'e', 'e', 54);
INSERT INTO MEDICATION VALUES( 20, 'c', 'f', 'f', 'weflmwe', 'pill', 'f', 'f', 'f', 'f', 81);
INSERT INTO MEDICATION VALUES( 0, 'e', 'g', 'g', 'placebo', 'pill', 'g', 'g', 'g', 'g',56);

INSERT INTO DIAGNOSIS VALUES( 4001, 'Veda  ', ' Demers', 2020, 'fever', 3, '3/25/2013', 5, 'NA', 1004, '7/12/2013');
INSERT INTO DIAGNOSIS VALUES( 4002, 'Theresia ', 'Newson  ', 2001, 'flu', 4, '4/14/2013', 10, 'NA', 1001,  '9/13/2013');
INSERT INTO DIAGNOSIS VALUES( 4003, 'Asuncion', 'Overman  ', 2004, 'common cold', 1, '2/13/2003', 3, 'NA', 1016, '8/12/2003');
INSERT INTO DIAGNOSIS VALUES( 4004, 'Mao   ', 'Michaelsen', 2013, 'Epityphlitis', 7, '5/12/2011', 6, 'NA', 1018, '5/21/2011');
INSERT INTO DIAGNOSIS VALUES( 4005, 'Henriette', 'Plante  ', 2020, 'dislocated shoulder', 8, '5/12/2012', 6, 'NA', 1020, '6/13/2012');
INSERT INTO DIAGNOSIS VALUES( 4006, 'Tessa   ', 'Carstens', 2001, 'stomach ache', 3, '6/16/2010', 0, 'NA', 1002, '8/13/2010');
INSERT INTO DIAGNOSIS VALUES( 4007, 'Jamal ', 'Person  ', 2012, 'heart attack', 10, '9/15/2000', 14, 'surgery needed', 1011, '10/25/2000');
INSERT INTO DIAGNOSIS VALUES( 4008, 'Lasonya', ' Ferrell  ', 2013, 'asthma', 9, '12/13/2014', 9, 'NA', 1007, '12/25/2014');
INSERT INTO DIAGNOSIS VALUES( 4009, 'Mikel ', 'Smidt  ', 2001, 'ADD', 3, '6/12/2010', 11, 'NA', 1014, '9/30/2010');
INSERT INTO DIAGNOSIS VALUES( 4010, 'Nida', 'Moris  ', 2001, 'ADHD', 6, '8/16/2011', 12, 'NA', 1013, '9/30/2011');
INSERT INTO DIAGNOSIS VALUES( 4011, 'Ruthanne  ', ' Bermeo', 2020, 'epilepsy', 7, '12/3/2001', 13, 'minor seizures had', 1006, '1/3/2002');
INSERT INTO DIAGNOSIS VALUES( 4012, 'Latina   ', 'Rabalais', 2001, 'high blood pressure', 4, '4/15/2010', 12, 'NA', 1003, '6/17/2010');
INSERT INTO DIAGNOSIS VALUES( 4013, 'Jessia', 'Galan ', 2012, 'high cholestorol', 1, '8/15/2010', 15, 'NA', 1015, '10/20/2010');
INSERT INTO DIAGNOSIS VALUES( 4014, 'Velma', 'Fredrickson  ', 2012, 'diabetes', 4, '7/16/2011', 5, 'NA', 1012, '8/20/2011');
INSERT INTO DIAGNOSIS VALUES( 4015, 'Loris ', 'Scipio  ', 2004, 'seasonal affective disorder', 7, '9/8/2014', 0, 'get sunlight', 1005, '10/8/2014');
INSERT INTO DIAGNOSIS VALUES( 4016, 'Huey', 'Courville  ', 2001, 'moderate head cut', 8, '5/14/2010', 6, 'stiches needed', 1019, '8/20/2010');
INSERT INTO DIAGNOSIS VALUES( 4017, 'Coretta ', 'Lefevers  ', 2017, 'sprained shoulder', 3, '10/10/2011', 8, 'NA', 1010, '11/11/2011');
INSERT INTO DIAGNOSIS VALUES( 4018, 'Emile ', 'Geno  ', 2013, 'car accident ', 9, '8/4/2005', 6, 'surgery ', 1017, '10/12/2005');
INSERT INTO DIAGNOSIS VALUES( 4019, 'Charlott   ', 'Wuensche', 2017, 'cramp ', 2, '8/3/2012', 7, 'NA', 1009, '9/7/2012');
INSERT INTO DIAGNOSIS VALUES( 4020, 'Yung   ', 'Cornette', 2017, 'broken leg', 3, '7/12/2014', 4, 'NA', 1008, '12/23/2014');

-- alter fkey --
ALTER TABLE PATIENT
ADD FOREIGN KEY (Staff_Id) REFERENCES STAFF(Staff_Id);
ALTER TABLE PATIENT
ADD FOREIGN KEY (Med_Id) REFERENCES MEDICATION(Med_Id);

ALTER TABLE DIAGNOSIS
ADD FOREIGN KEY (Staff_Id)    REFERENCES STAFF(Staff_Id);
ALTER TABLE DIAGNOSIS
ADD FOREIGN KEY (Med_Id)     REFERENCES MEDICATION(Med_Id);
ALTER TABLE DIAGNOSIS
ADD FOREIGN KEY (Patient_Id) REFERENCES PATIENT(Patient_Id);


