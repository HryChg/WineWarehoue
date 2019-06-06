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