DROP TABLE ReturnedShipment;
DROP TABLE Shipment;
DROP TABLE OrderForWine;
DROP TABLE OrderReceived;
DROP TABLE StoredIn;
DROP TABLE WineOrigin;
DROP TABLE AgriculturalRegion;
DROP TABLE Restock;
DROP TABLE WineB;
DROP TABLE WineA;
DROP TABLE StorageArea;
DROP TABLE SupplierB;
DROP TABLE SupplierA;
DROP TABLE ShippingManager;
DROP TABLE InventoryManager;
DROP TABLE GeneralEmployee;
DROP TABLE Employee;

CREATE TABLE Employee
(employeeID INTEGER PRIMARY KEY, 
type VARCHAR(20), 
name VARCHAR(20));
INSERT INTO Employee VALUES(000, 'InventoryManager', 'Alexa A');
INSERT INTO Employee VALUES(001, 'InventoryManager', 'Cortana M');
INSERT INTO Employee VALUES(002, 'InventoryManager', 'Bob B');
INSERT INTO Employee VALUES(003, 'InventoryManager', 'Carla C');
INSERT INTO Employee VALUES(004, 'InventoryManager', 'Dylan D');
INSERT INTO Employee VALUES(005, 'ShippingManager', 'Echo G');
INSERT INTO Employee VALUES(006, 'ShippingManager', 'Felix F');
INSERT INTO Employee VALUES(007, 'ShippingManager', 'Gerda G');
INSERT INTO Employee VALUES(008, 'ShippingManager', 'Hilda H');
INSERT INTO Employee VALUES(009, 'ShippingManager', 'Ian I');
INSERT INTO Employee VALUES(010, 'GeneralEmployee', 'Deep M');
INSERT INTO Employee VALUES(011, 'GeneralManager', 'Jenny J');

CREATE TABLE GeneralManager
(employeeID INTEGER PRIMARY KEY,
password varchar(40),
FOREIGN KEY (employeeID) REFERENCES Employee(employeeID));
INSERT INTO GeneralManager VALUES(011, 011);

CREATE TABLE InventoryManager
(employeeID INTEGER PRIMARY KEY,
password varchar(40),
FOREIGN KEY (employeeID) REFERENCES Employee(employeeID));
INSERT INTO InventoryManager VALUES(000, 000);
INSERT INTO InventoryManager VALUES(001, 111);
INSERT INTO InventoryManager VALUES(002, 222);
INSERT INTO InventoryManager VALUES(003, 333);
INSERT INTO InventoryManager VALUES(004, 444);

CREATE TABLE ShippingManager
(employeeID INTEGER PRIMARY KEY,
password varchar(40),
FOREIGN KEY (employeeID) REFERENCES Employee(employeeID));
INSERT INTO ShippingManager VALUES(005, 555);
INSERT INTO ShippingManager VALUES(006, 666);
INSERT INTO ShippingManager VALUES(007, 777);
INSERT INTO ShippingManager VALUES(008, 888);
INSERT INTO ShippingManager VALUES(009, 999);



CREATE TABLE SupplierA
(address VARCHAR(40) PRIMARY KEY, 
name VARCHAR(25));
INSERT INTO SupplierA VALUES('1470 Pemberton Ave, North Vancouver, BC', 'McWines The Winemaker');
INSERT INTO SupplierA VALUES('1825 Boundary Rd, Vancouver, BC', 'Constellation Brands');
INSERT INTO SupplierA VALUES('3855 Canada Way, Burnaby, BC', 'Fermented Grape');
INSERT INTO SupplierA VALUES('55 Dunlevy Ave, Vancouver, BC', 'Vancouver Urban Winery');
INSERT INTO SupplierA VALUES('328 W 2nd Ave, Vancouver, BC', 'City Side');

CREATE TABLE SupplierB
(supplierID INTEGER PRIMARY KEY, 
phoneNo VARCHAR(15) UNIQUE, 
address VARCHAR(40));
INSERT INTO SupplierB VALUES(1, '604-987-4464', '1470 Pemberton Ave, North Vancouver, BC');
INSERT INTO SupplierB VALUES(2, '604-451-9511', '1825 Boundary Rd, Vancouver, BC');
INSERT INTO SupplierB VALUES(3, '604-434-9463', '3855 Canada Way, Burnaby, BC');
INSERT INTO SupplierB VALUES(4, '604-566-9463', '55 Dunlevy Ave, Vancouver, BC');
INSERT INTO SupplierB VALUES(5, '604-428-6072', '328 W 2nd Ave, Vancouver, BC');

CREATE TABLE StorageArea
(locationID VARCHAR(10) PRIMARY KEY, 
temperature REAL);
INSERT INTO StorageArea VALUES('West Wing', 15.0);
INSERT INTO StorageArea VALUES('East Wing', 12.8);
INSERT INTO StorageArea VALUES('North Wing', 13.5);
INSERT INTO StorageArea VALUES('South Wing', 11.3);
INSERT INTO StorageArea VALUES('Freezer', 10.0);


CREATE TABLE WineA
(grapeType1 VARCHAR(20), 
grapeType2 VARCHAR(20),
brandName VARCHAR(20),  
wineTaste1 VARCHAR(20), 
wineTaste2 VARCHAR(20),
PRIMARY KEY (grapeType1, grapeType2, brandName));
INSERT INTO WineA VALUES('chardonnay', 'chardonnay', 'Yellow Tail','fruity', 'buttery');
INSERT INTO WineA VALUES('pinot grigio', 'sauvignon blanc', 'Tavernello', 'dry', 'crisp');
INSERT INTO WineA VALUES('sauvignon blanc', 'chardonnay', 'Blue Nun', 'herbal', 'dry');
INSERT INTO WineA VALUES('cabernet sauvignon', 'pinot noir', 'Armand de Brignac', 'herbal', 'currant');
INSERT INTO WineA VALUES('merlot', 'shiraz', 'Ecco Domani', 'spicy', 'merlot');
INSERT INTO WineA VALUES('cabernet sauvignon', 'chardonnay', 'Cristol', 'cherry', 'crisp');
INSERT INTO WineA VALUES('pinot grigio', 'merlot', 'Mateus', 'rich', 'smooth');
INSERT INTO WineA VALUES('cabernet sauvignon', 'merlot', 'Beringer', 'currant', 'crisp');
INSERT INTO WineA VALUES('pinot grigio', 'cabernet sauvignon', 'Foxglove', 'spicy', 'herbal');
INSERT INTO WineA VALUES('shiraz', 'shiraz', 'Pine Ridge', 'rich', 'smooth');
INSERT INTO WineA VALUES('chardonnay', 'zinfandel', 'Folonari', 'dry', 'smooth');
INSERT INTO WineA VALUES('pinot grigio', 'zinfandel', 'Acrobat', 'rich', 'buttery');

CREATE TABLE WineB
(wineID INTEGER PRIMARY KEY, 
price REAL, 
color VARCHAR(10), 
brandName VARCHAR(20), 
grapeType1 VARCHAR(20), 
grapeType2 VARCHAR(20), 
alcoholPercent REAL, 
acidity REAL, 
sugarLevel REAL, 
expiryDate DATE);
INSERT INTO WineB VALUES(98412310, 55.50, 'white', 'Yellow Tail', 'chardonnay', 'chardonnay', 15.0, 3.2, 0.5, DATE('2020-08-15'));
INSERT INTO WineB VALUES(98412234, 100.99, 'white', 'Tavernello', 'pinot grigio', 'sauvignon blanc', 14.2, 2.1, 0.4, DATE('2070-07-16'));
INSERT INTO WineB VALUES(97802134, 20.50, 'white', 'Blue Nun', 'sauvignon blanc', 'chardonnay', 10.0, 2.5, 0.5, DATE('2085-01-01'));
INSERT INTO WineB VALUES(97890456, 15.99, 'red', 'Armand de Brignac', 'cabernet sauvignon', 'pinot noir', 11.0, 4.1, 0.2, DATE('2101-03-15'));
INSERT INTO WineB VALUES(96458941, 12.50, 'red', 'Ecco Domani', 'merlot', 'shiraz', 11.5, 3.5, 0.3, DATE('2025-09-17'));
INSERT INTO WineB VALUES(10000000, 1200, 'red', 'Cristol', 'cabernet sauvignon', 'chardonnay', 12, 4.5, 0.4, DATE('1999-01-01'));
INSERT INTO WineB VALUES(10000001, 350, 'red', 'Bogle', 'pinot grigio', 'merlot', 12.1, 4.1, 0.2, DATE('1995-04-05'));
INSERT INTO WineB VALUES(10000002, 35, 'red', 'Beringer', 'cabernet sauvignon', 'merlot', 12.2, 3, 0.1, DATE('2075-01-05'));
INSERT INTO WineB VALUES(10000003, 49.99, 'white', 'Foxglove', 'pinot grigio', 'cabernet sauvignon', 11.1, 4, 0.3, DATE('2055-04-01'));
INSERT INTO WineB VALUES(10000004, 5, 'white', 'Pine Ridge', 'shiraz', 'shiraz', 13.1, 2, 0.2, DATE('2045-11-25'));
INSERT INTO WineB VALUES(10000005, 3.50, 'red', 'Folonari', 'chardonnay', 'zinfandel', 15.1, 3.2, 0.4, DATE('2045-12-22'));
INSERT INTO WineB VALUES(10000006, 20, 'red', 'Acrobat', 'pinot grigio', 'zinfandel', 14.4, 2.2, 0.3, DATE('2035-04-05'));


CREATE TABLE Restock
(employeeID INTEGER, 
supplierID INTEGER, 
wineID INTEGER, 
locationID VARCHAR(10),
quantity INTEGER,
restockDate DATE,
PRIMARY KEY (employeeID, supplierID, wineID, locationID),
FOREIGN KEY (employeeID) REFERENCES Employee(employeeID),
FOREIGN KEY (supplierID) REFERENCES SupplierB(supplierID),
FOREIGN KEY (wineID) REFERENCES WineB(wineID),
FOREIGN KEY (locationID) REFERENCES StorageArea(locationID));
INSERT INTO Restock VALUES(000, 1, 98412310, 'West Wing', 100, DATE('2019-05-20'));
INSERT INTO Restock VALUES(001, 2, 98412234, 'East Wing', 50, DATE('2018-07-25'));
INSERT INTO Restock VALUES(002, 3, 97802134, 'North Wing', 250, DATE('2019-01-10'));
INSERT INTO Restock VALUES(003, 4, 97890456, 'South Wing', 200, DATE('2019-03-15'));
INSERT INTO Restock VALUES(004, 5, 96458941, 'Freezer', 150, DATE('2018-04-16'));

CREATE TABLE AgriculturalRegion
(name VARCHAR(20) PRIMARY KEY, 
temperature REAL, 
moisture REAL, 
climate VARCHAR(15));
INSERT INTO AgriculturalRegion VALUES('Thompson-Okanagan', 10.0, 40.0, 'continential');
INSERT INTO AgriculturalRegion VALUES('Champagne', 11.0, 35.0, 'continential');
INSERT INTO AgriculturalRegion VALUES('Provence', 15.0, 42.0, 'Mediterranean');
INSERT INTO AgriculturalRegion VALUES('Tuscany', 16.0, 43.0, 'Mediterranean');
INSERT INTO AgriculturalRegion VALUES('Sicily', 17.0, 43.7, 'Mediterranean');
INSERT INTO AgriculturalRegion VALUES('Bordeaux', 16.0, 42.2, 'Maritime');
INSERT INTO AgriculturalRegion VALUES('Burgundy', 18.0, 43.0, 'Maritime');
INSERT INTO AgriculturalRegion VALUES('Liechtenstein', 12.0, 41.0, 'Maritime');
INSERT INTO AgriculturalRegion VALUES('Saxony', 13.0, 42.8, 'continential');
INSERT INTO AgriculturalRegion VALUES('Sardinia', 17.5, 43.0, 'Mediterranean');



CREATE TABLE WineOrigin
(regionName VARCHAR(20), 
wineID INTEGER, 
year INTEGER,
PRIMARY KEY (regionName, wineID), 
FOREIGN KEY (regionName) REFERENCES AgriculturalRegion(name),
FOREIGN KEY (wineID) REFERENCES WineB(wineID));
INSERT INTO WineOrigin VALUES('Thompson-Okanagan', 98412310, 2011);
INSERT INTO WineOrigin VALUES('Champagne', 98412234, 2018);
INSERT INTO WineOrigin VALUES('Provence', 97802134, 1970);
INSERT INTO WineOrigin VALUES('Tuscany', 97890456, 1999);
INSERT INTO WineOrigin VALUES('Sicily', 96458941, 2009);

CREATE TABLE StoredIn
(wineID INTEGER, 
locationID VARCHAR(10), 
quantityInLocation INTEGER,
PRIMARY KEY (wineID, locationID),
FOREIGN KEY (wineID) REFERENCES WineB(wineID),
FOREIGN KEY (locationID) REFERENCES StorageArea(locationID));
INSERT INTO StoredIn VALUES(98412310, 'West Wing', 1000);
INSERT INTO StoredIn VALUES(98412234, 'East Wing', 1500);
INSERT INTO StoredIn VALUES(97802134, 'North Wing', 2000);
INSERT INTO StoredIn VALUES(97890456, 'South Wing', 2500);
INSERT INTO StoredIn VALUES(96458941, 'Freezer', 3000);
INSERT INTO StoredIn VALUES(10000000, 'South Wing', 10);
INSERT INTO StoredIn VALUES(10000001, 'South Wing', 50);

CREATE TABLE OrderReceived
(orderID INTEGER PRIMARY KEY, 
employeeID INTEGER NOT NULL,
wineID INTEGER,
quantity INTEGER,
retailer VARCHAR(40),
address VARCHAR(40), 
backorder CHAR(1),
orderReceivedDate TIMESTAMP,
FOREIGN KEY (employeeID) REFERENCES ShippingManager(employeeID),
FOREIGN KEY (wineID) REFERENCES WineB(wineID));
INSERT INTO OrderReceived VALUES(100000, 005, 98412310, 100, 'The Stable House Bistro', '000 AAA Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-17 10:10:30'));
INSERT INTO OrderReceived VALUES(100001, 006, 98412234, 200, 'Uva Wine & Cocktail Bar', '111 BBB Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-01 11:30:44'));
INSERT INTO OrderReceived VALUES(100002, 007, 97802134, 150, 'Gotham Steakhouse & Cocktail Bar', '222 CCC Road, Vancouver, BC', 'N', TIMESTAMP('2019-04-29 10:37:12'));
INSERT INTO OrderReceived VALUES(100003, 008, 98412310, 130, 'Victor', '333 DDD Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-20 09:25:18'));
INSERT INTO OrderReceived VALUES(100004, 009, 98412310, 111, 'Neverland Tea Salon', '444 EEE Road, Vancouver, BC', 'Y', TIMESTAMP('2019-05-22 15:35:18'));
INSERT INTO OrderReceived VALUES(100005, 009, 97802134, 111, 'Neverland Tea Salon', '444 EEE Road, Vancouver, BC', 'Y', TIMESTAMP('2019-05-22 15:35:18'));
INSERT INTO OrderReceived VALUES(100006, 008, 98412310, 130, 'Victor', '333 DDD Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-29 09:25:18'));
INSERT INTO OrderReceived VALUES(100007, 007, 97802134, 150, 'Gotham Steakhouse & Cocktail Bar', '222 CCC Road, Vancouver, BC', 'Y', TIMESTAMP('2019-06-29 10:37:12'));
INSERT INTO OrderReceived VALUES(100008, 005, 96458941, 250, 'Neverland Tea Salon', '444 EEE Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-29 10:40:12'));
INSERT INTO OrderReceived VALUES(100009, 006, 98412310, 500, 'Uva Wine & Cocktail Bar', '111 BBB Road, Vancouver, BC', 'Y', TIMESTAMP('2019-06-29 12:37:12'));
INSERT INTO OrderReceived VALUES(100010, 007, 97890456, 25, 'High Point', '555 FFF Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-29 15:37:12'));
INSERT INTO OrderReceived VALUES(100011, 005, 97802134, 10, 'Everything Wine', '666 GGG Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-29 18:37:12'));
INSERT INTO OrderReceived VALUES(100012, 009, 97802134, 400, 'Gotham Steakhouse & Cocktail Bar', '222 CCC Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 10:37:12'));
INSERT INTO OrderReceived VALUES(100013, 007, 98412234, 60, 'Liberty Wine Merchants', '777 HHH Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 10:50:12'));
INSERT INTO OrderReceived VALUES(100014, 005, 97802134, 88, 'BottleJockey', '888 III Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 10:51:12'));
INSERT INTO OrderReceived VALUES(100015, 007, 98412234, 70, 'Liberty Wine Merchants', '777 HHH Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 12:00:12'));
INSERT INTO OrderReceived VALUES(100016, 008, 97890456, 280, 'High Point', '555 FFF Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 16:37:12'));
INSERT INTO OrderReceived VALUES(100017, 009, 97890456, 350, 'Gotham Steakhouse & Cocktail Bar', '222 CCC Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-31 18:00:12'));

-- Additional
INSERT INTO OrderReceived VALUES(100018, 007, 98412234, 25, 'High Point', '555 FFF Road, Vancouver, BC', 'N', TIMESTAMP('2019-08-29 12:00:00'));
INSERT INTO OrderReceived VALUES(100019, 007, 97802134, 25, 'High Point', '555 FFF Road, Vancouver, BC', 'N', TIMESTAMP('2019-08-29 12:00:00'));
INSERT INTO OrderReceived VALUES(100020, 007, 98412234, 10, 'Gotham Steakhouse & Cocktail Bar', '222 CCC Road, Vancouver, BC', 'N', TIMESTAMP('2019-04-29 12:00:00'));
INSERT INTO OrderReceived VALUES(100021, 007, 97890456, 5, 'Liberty Wine Merchants', '777 HHH Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 12:00:00'));
INSERT INTO OrderReceived VALUES(100022, 007, 97802134, 5, 'Liberty Wine Merchants', '777 HHH Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 12:00:00'));
INSERT INTO OrderReceived VALUES(100023, 005, 97890456, 12, 'BottleJockey', '888 III Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 10:00:12'));
INSERT INTO OrderReceived VALUES(100024, 005, 98412234, 12, 'BottleJockey', '888 III Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-30 10:00:12'));
INSERT INTO OrderReceived VALUES(100025, 005, 97890456, 1, 'Everything Wine', '666 GGG Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-29 18:30:00'));
INSERT INTO OrderReceived VALUES(100026, 005, 98412234, 1, 'Everything Wine', '666 GGG Road, Vancouver, BC', 'N', TIMESTAMP('2019-06-29 18:30:00'));
INSERT INTO OrderReceived VALUES(100027, 006, 97890456, 5, 'Uva Wine & Cocktail Bar', '111 BBB Road, Vancouver, BC', 'Y', TIMESTAMP('2019-06-29 12:37:12'));
INSERT INTO OrderReceived VALUES(100028, 006, 97802134, 5, 'Uva Wine & Cocktail Bar', '111 BBB Road, Vancouver, BC', 'Y', TIMESTAMP('2019-06-29 12:37:12'));
INSERT INTO OrderReceived VALUES(100029, 009, 97890456, 20, 'Neverland Tea Salon', '444 EEE Road, Vancouver, BC', 'Y', TIMESTAMP('2019-05-22 15:35:18'));
INSERT INTO OrderReceived VALUES(100030, 009, 98412234, 20, 'Neverland Tea Salon', '444 EEE Road, Vancouver, BC', 'Y', TIMESTAMP('2019-05-22 15:35:18'));
INSERT INTO OrderReceived VALUES(100031, 008, 97890456, 13, 'Victor', '333 DDD Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-20 09:25:18'));
INSERT INTO OrderReceived VALUES(100032, 008, 98412234, 13, 'Victor', '333 DDD Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-20 09:25:18'));
INSERT INTO OrderReceived VALUES(100033, 008, 97802134, 13, 'Victor', '333 DDD Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-20 09:25:18'));
INSERT INTO OrderReceived VALUES(100034, 005, 97890456 , 100, 'The Stable House Bistro', '000 AAA Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-17 10:10:30'));
INSERT INTO OrderReceived VALUES(100035, 005, 98412234, 100, 'The Stable House Bistro', '000 AAA Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-17 10:10:30'));
INSERT INTO OrderReceived VALUES(100036, 005, 97802134, 100, 'The Stable House Bistro', '000 AAA Road, Vancouver, BC', 'N', TIMESTAMP('2019-05-17 10:10:30'));


CREATE TABLE OrderForWine
(orderID INTEGER, 
wineID INTEGER, 
locationID VARCHAR(10),
PRIMARY KEY (orderID, wineID, locationID),
FOREIGN KEY (orderID) REFERENCES OrderReceived(orderID),
FOREIGN KEY (wineID) REFERENCES WineB(wineID),
FOREIGN KEY (locationID) REFERENCES StorageArea(locationID));
INSERT INTO OrderForWine VALUES(100000, 98412310, 'West Wing');
INSERT INTO OrderForWine VALUES(100001, 98412234, 'East Wing');
INSERT INTO OrderForWine VALUES(100002, 97802134, 'North Wing');
INSERT INTO OrderForWine VALUES(100003, 97890456, 'South Wing');
INSERT INTO OrderForWine VALUES(100004, 96458941, 'Freezer');


CREATE TABLE Shipment
(shipmentID CHAR(10) PRIMARY KEY, 
transportationMode VARCHAR(25), 
expectedDeliveryDate TIMESTAMP,
actualDeliveryDate TIMESTAMP,
orderID INTEGER NOT NULL,
employeeID INTEGER NOT NULL,
FOREIGN KEY (orderID) REFERENCES OrderReceived(orderID),
FOREIGN KEY (employeeID) REFERENCES ShippingManager(employeeID));

INSERT INTO Shipment VALUES('WFZUCHPJEB', 'Train', TIMESTAMP('2019-01-27 09:15:00', 'YYYY-MM-DD HH24:MI:SS'), TIMESTAMP('2019-01-31 12:40:18', 'YYYY-MM-DD HH24:MI:SS'), 100000, 005);
INSERT INTO Shipment VALUES('KNTXDWLCFF', 'Air', TIMESTAMP('2019-02-10 09:55:20', 'YYYY-MM-DD HH24:MI:SS'), TIMESTAMP('2019-02-15 13:10:20', 'YYYY-MM-DD HH24:MI:SS'), 100001, 006);
INSERT INTO Shipment VALUES('ASUOMMKTND', 'Train', TIMESTAMP('2019-02-20 10:00:18', 'YYYY-MM-DD HH24:MI:SS'), TIMESTAMP('2019-02-23 15:15:29', 'YYYY-MM-DD HH24:MI:SS'), 100002, 007);
INSERT INTO Shipment VALUES('LSSCPQBMSN', 'Freight', TIMESTAMP('2019-03-06 10:30:09', 'YYYY-MM-DD HH24:MI:SS'), TIMESTAMP('2019-03-31 16:10:18', 'YYYY-MM-DD HH24:MI:SS'), 100003, 008);
INSERT INTO Shipment VALUES('ZTBKUPWSHU', 'Land', TIMESTAMP('2019-03-17 12:25:18', 'YYYY-MM-DD HH24:MI:SS'), TIMESTAMP('2019-03-17 15:50:25', 'YYYY-MM-DD HH24:MI:SS'), 100004, 009);

 
CREATE TABLE ReturnedShipment
(shipmentID CHAR(10), 
returnID INTEGER, 
returnedQuantity INTEGER,
PRIMARY KEY (shipmentID, returnID),
FOREIGN KEY (shipmentID) REFERENCES Shipment(shipmentID)
	ON DELETE CASCADE);
INSERT INTO ReturnedShipment VALUES('WFZUCHPJEB', 1, 5);
INSERT INTO ReturnedShipment VALUES('WFZUCHPJEB', 2, 1);
INSERT INTO ReturnedShipment VALUES('ASUOMMKTND', 1, 2);
INSERT INTO ReturnedShipment VALUES('LSSCPQBMSN', 1, 3);
INSERT INTO ReturnedShipment VALUES('ZTBKUPWSHU', 1, 10);