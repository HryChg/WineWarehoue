-- add:
INSERT INTO ReturnShipment VALUES('$shipmentID', '$returnID',
'$returnedQuantity');

-- view:
SELECT * FROM ReturnShipment;

-- update:
UPDATE ReturnShipment
SET <condition>
WHERE shipmentID='$shipmentID' AND returnID='$returnID';

-- delete:
DELETE FROM ReturnShipment WHERE shipmentID='$shipmentID' AND returnID='$returnID';