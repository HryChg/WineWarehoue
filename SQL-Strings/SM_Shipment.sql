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