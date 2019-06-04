-- add:
INSERT INTO OrderForWine VALUES('$orderID', '$wineID', '$locationID');

-- view:
SELECT * FROM OrderForWine;

-- delete:
DELETE FROM OrderForWine WHERE orderID='$orderID' AND wineID='$wineID' AND locationID='$locationID';