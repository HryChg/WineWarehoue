---------------------
-- Special Queries --
---------------------
-- find the top 5 ordered wine to be backOrdered // COUNT
SELECT wineID, count(wineID) as backOrderedWineCount
FROM OrderReceived
WHERE backorder = 'Y'
GROUP by wineID
ORDER by backOrderedWineCount DESC
LIMIT 5;

-- find the top 10 most repeatedly ordered Wine // COUNT
SELECT wineID, count(wineID) as repeatWineCount
FROM OrderReceived
GROUP BY wineID
ORDER BY repeatWineCount DESC
LIMIT 10;

-- identify top 3 wine where every retailer has ordered // DIVISION
SELECT wineID
FROM WineB
WHERE wineID NOT IN (
	SELECT w.wineID
	FROM WineB w, OrderReceived o
	WHERE (w.wineID, o.retailer) NOT IN (
  	SELECT wineID, retailer
 	FROM OrderReceived
))
LIMIT 3;

--figure out best transportation mode by comparing actual and expected delivery dates
CREATE VIEW difference_view AS
SELECT TIMESTAMPDIFF(SECOND, expectedDeliveryDate, actualDeliveryDate) AS difference 
FROM SHIPMENT;

SELECT x.*
FROM Shipment s
WHERE s.transportationMode =    (SELECT MAX(d.difference)
                                FROM difference_view d);

---------------------
-- Order Received ---
---------------------
-- View the Order
SELECT * FROM OrderReceived;

-- Add Order
INSERT INTO OrderReceived
VALUES('$orderID', '$employeeID', '$quantity', '$address', '$backOrder', TIMESTAMP('$orderReceivedDate'));

-- Update Order
UPDATE OrderReceived
SET
    employeeID = $employeeID,
    quantity = $quantity,
    address = $address,
    backorder = $backOrder,
    orderReceivedDate = $orderReceivedDate
WHERE
    orderID = $orderID;

-- delete order
DELETE FROM OrderReceived WHERE orderID = $orderID;

-- find all the backOrder
SELECT * FROM OrderReceived WHERE backorder = 'Y';

-- find the quantity of each wine being ordered
SELECT wineID, SUM(quantity) as totalQuantity
FROM OrderReceived
GROUP BY wineID;

-- find the top clients (retailer who order most frequently)
SELECT retailer, COUNT(orderID) AS orderCount
FROM OrderReceived
GROUP BY retailer;


---------------------
-- OrderForWine   ---
---------------------
-- add:
INSERT INTO OrderForWine VALUES('$orderID', '$wineID', '$locationID');

-- view:
SELECT * FROM OrderForWine;

-- delete:
DELETE FROM OrderForWine WHERE orderID='$orderID' AND wineID='$wineID' AND locationID='$locationID';


---------------------
-- Shipment       ---
---------------------
-- add:
INSERT INTO Shipment VALUES('$shipmentID', '$transportationMode', '$expectedDeliveryDate','$actualDeliveryDate','$orderID', '$employeeID');

-- view:
SELECT * FROM Shipment;

-- update:
UPDATE Shipment
SET <condition>
WHERE shipmentID='$shipmentID';

-- delete:
DELETE FROM Shipment WHERE shipmentID='$shipmentID';


-------------------------
-- Returned Shipment  ---
-------------------------
-- add:
INSERT INTO ReturnedShipment VALUES('$shipmentID', '$returnID',
'$returnedQuantity');

-- view:
SELECT * FROM ReturnedShipment;

-- update:
UPDATE ReturnShipment
SET <condition>
WHERE shipmentID='$shipmentID' AND returnID='$returnID';

-- delete:
DELETE FROM ReturnedShipment WHERE shipmentID='$shipmentID' AND returnID='$returnID';