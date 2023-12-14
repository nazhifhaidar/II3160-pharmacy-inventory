CREATE TABLE drugs(
  id 		 VARCHAR(32) NOT NULL PRIMARY KEY DEFAULT UUID()
  ,brandName     VARCHAR(16) 
  ,genericName   VARCHAR(13) NOT NULL
  ,NDC           INTEGER  NOT NULL
  ,dosage        INTEGER  NOT NULL
  ,expDate       VARCHAR(5) NOT NULL
  ,supID         INTEGER  NOT NULL
  ,purchasePrice NUMERIC(5,2) NOT NULL
  ,sellPrice     NUMERIC(5,2) NOT NULL
  ,stock INTEGER NOT NULL DEFAULT FLOOR(RAND() * 101)
);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Aldactone','sprinolactone',12365,25,'12/24',1,14.56,17.88);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Amoxil','amoxicillin',17863,50,'12/25',1,12.34,15.99);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Glucotrol','glipizide',23123,50,'11/23',1,9.45,10.55);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Motrin','ibuprophen',23127,80,'09/22',2,2.32,4.32);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Neurontin','gabapentin',23456,80,'12/22',2,35.67,37.66);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Zocor','simvastatin',23467,80,'05/23',1,12.44,14.54);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Lipitor','atorvastatin',23567,10,'09/22',1,11.23,12.55);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Lasix','furosemide',34321,20,'04/24',1,3.22,4.33);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Imdur','isosorbide',34532,30,'04/23',2,12.77,14.55);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Mobic','meloxicam',34543,15,'09/23',1,4.65,6.76);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Naprosyn','naproxen',34567,50,'08/24',1,2.55,5.67);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Neurontin','gabapentin',43234,40,'12/22',2,33.43,40.33);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Motrin','ibuprophen',45652,60,'04/21',2,2.34,4.33);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Ambien','zolpidem',45687,25,'11/25',2,77.87,90.76);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Tenormin','atenolol',45689,20,'11/23',2,13.88,14.9);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Aldactone','sprinolactone',45698,60,'12/24',1,13.54,14.67);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Lipitor','atorvastatin',56765,40,'10/26',1,12.23,13.45);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Plavix','clopidogrel',65456,75,'03/21',1,9.33,10.43);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Prilosec','omeprazole',67542,20,'03/22',1,6.77,10.45);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Tenormin','atenolol',67545,10,'11/22',2,13.92,16.93);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Tenormin','atenolol',67854,30,'04/25',2,13.77,15.98);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Cozaar','losartan',67876,50,'09/23',1,6.77,7.89);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Cozaar','losartan',78965,100,'05/23',1,5.45,6.78);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Tylenol','acetaminophen',78977,100,'12/23',1,1.98,3.44);
INSERT INTO drugs(brandName,genericName,NDC,dosage,expDate,supID,purchasePrice,sellPrice) VALUES ('Ambien','zolpidem',78987,80,'11/24',2,25.44,30.56);
