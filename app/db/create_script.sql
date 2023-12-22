drop database Jamin;
create database Jamin;

use Jamin;

create table Product (
    Id          INT                 NOT NULL    PRIMARY KEY,
    Naam        VARCHAR(50)         NOT NULL,
    Barcode     BIGINT
);

INSERT INTO Product (Id, Naam,              Barcode)
            VALUES  (1, 'Mintnopjes',       8719587231278),
                    (2, 'Schoolkrijt',      8719587326713),
                    (3, 'Honingdrop',       8719587327836),
                    (4, 'Zure Beren',       8719587321441),
                    (5, 'Cola Flesjes',     8719587321237),
                    (6, 'Turtles',          8719587322245),
                    (7, 'Witte Muizen',     8719587328256),
                    (8, 'Reuzen Slangen',   8719587325641),
                    (9, 'Zoute Rijen',      8719587322739),
                    (10, 'Winegums',        8719587327527),
                    (11, 'Drop Munten',     8719587322345),
                    (12, 'Kruis Drop',      8719587322265),
                    (13, 'Zoute Ruitjes',   8719587323256);



create table Allergeen (
    Id              INT		PRIMARY KEY,
    Naam            VARCHAR(50),
    Omschrijving    VARCHAR(200)
);

INSERT INTO Allergeen    (Id, Naam,              Omschrijving)
            VALUES      (1, 'Gluten',          'Dit product bevat gluten'),
                        (2, 'Gelatine',        'Dit product bevat gelatine'),
                        (3, 'AZO-kleurstof',   'Dit product bevat AZO-kleurstoffen'),
                        (4, 'Lactose',         'Dit product bevat lactose'),
                        (5, 'Soja',            'Dit product bevat soja');


create table Leverancier (
    Id                      INT		PRIMARY KEY,
    Naam                    VARCHAR(50),
    ContactPersoon          VARCHAR(50),
    LeverancierNummer       VARCHAR(20),
    Mobiel                  VARCHAR(15)
);

INSERT INTO Leverancier (Id, Naam,                   ContactPersoon,     LeverancierNummer,  Mobiel)
                VALUES  (1, 'Venco',                'Bert van Linge',   'L102 93 84 719',   '06-28493827'),
                        (2, 'Astra sweets',         'Jasper del Monte', 'L102 92 84 315',   '06-39398734'),
                        (3, 'Haribo',               'Sven Stalman',     'L102 93 24 748',   '06-24383292'),
                        (4, 'Joyce  Stelterberg',   'Jasper del Monte', 'L102 38 45 773',   '06-48293823'),
                        (5, 'De Bron',              'Remco Veenstra',   'L102 38 57 736',   '06-34291234');
                        (6, 'Quality Street',       'Johan Nooij',      'L102 92 34 586',   '06-23458456');



create table Magazijn (
    Id                      INT     NOT NULL    PRIMARY KEY,
    ProductId               INT,
    VerpakkingsEenheid      DECIMAL(10, 2),
    AantalAanwezig          INT,

    FOREIGN KEY (ProductId) REFERENCES Product(Id)
);

INSERT INTO Magazijn (Id, ProductId, VerpakkingsEenheid, AantalAanwezig)
            VALUES   (1,  1,         5,                  453),
                     (2,  2,         2.5,                400),
                     (3,  3,         5,                  1),
                     (4,  4,         1,                  800),
                     (5,  5,         3,                  234),
                     (6,  6,         2,                  345),
                     (7,  7,         1,                  795),
                     (8,  8,         10,                 233),
                     (9,  9,         2.5,                123),
                     (10,  10,       3,                  NULL),
                     (11,  11,       2,                  367),
                     (12,  12,       1,                  467),
                     (13,  13,       5,                  20);



create table ProductPerAllergeen (
	Id              INT 	NOT NULL	PRIMARY KEY,
	ProductId       INT,
	AllergeenId     INT,

	FOREIGN KEY (ProductId)     REFERENCES Product(Id),
	FOREIGN KEY (AllergeenId)   REFERENCES Allergeen(Id)
);

INSERT INTO ProductPerAllergeen (Id, ProductId, AllergeenId)
            VALUES   (1,  1,         2),
                     (2,  1,         1),
                     (3,  1,         3),
                     (4,  3,         4),
                     (5,  6,         5),
                     (6,  9,         2),
                     (7,  9,         5),
                     (8,  10,        2),
                     (9,  12,        4),
                     (10, 13,        1),
                     (11, 13,        4),
                     (12, 13,        5);
                     




create table ProductLeverancier (
		Id                              INT     NOT NULL        PRIMARY KEY,    
		LeverancierId                   INT,
		ProductId                       INT,
		DatumLevering                   DATE,
		Aantal                          INT,
		DatumEerstVolgendeLevering      DATE,

		FOREIGN KEY (LeverancierId)     REFERENCES Leverancier(Id)
);

INSERT INTO ProductLeverancier (Id, LeverancierId, ProductId, DatumLevering, Aantal, DatumEerstVolgendeLevering)
                        VALUES  (1,  1,             1,         '2023-04-09',  23,     '2023-04-09'),
                                (2,  1,             1,         '2023-04-18',  21,     '2023-04-25'),
                                (3,  1,             2,         '2023-04-09',  12,     '2023-04-16'),
                                (4,  1,             3,         '2023-04-10',  11,     '2023-04-17'),
                                (5,  2,             4,         '2023-04-14',  16,     '2023-04-21'),
                                (6,  2,             4,         '2023-04-21',  23,     '2023-04-28'),
                                (7,  2,             5,         '2023-04-14',  45,     '2023-04-21'),
                                (8,  2,             6,         '2023-04-14',  30,     '2023-04-21'),
                                (9,  3,             7,         '2023-04-12',  12,     '2023-04-19'),
                                (10, 3,             7,         '2023-04-19',  23,     '2023-04-26'),
                                (11, 3,             8,         '2023-04-10',  12,     '2023-04-17'),
                                (12, 3,             9,         '2023-04-11',  1,      '2023-04-18'),
                                (13, 4,             10,        '2023-04-16',  24,     '2023-04-30'),
                                (14, 5,             11,        '2023-04-10',  47,     '2023-04-17'),
                                (15, 5,             11,        '2023-04-10',  60,     '2023-04-26'),
                                (16, 5,             12,        '2023-04-11',  45,     NULL),
                                (17, 5,             13,        '2023-04-12',  23,     NULL);
                     
