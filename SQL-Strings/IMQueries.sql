-- Select queries:
  -- process-queryWineBySugarRange
    $sql1 = "SELECT wineID, brandName, grapeType1, grapeType2, sugarLevel
	          FROM wineB
	          WHERE sugarLevel >= '$lowRange' AND sugarLevel <= '$highRange'";

    $sql2 = "SELECT COUNT(wineID) AS 'Number of Wine Types'
	          FROM wineB
	          WHERE sugarLevel >= '$lowRange' AND sugarLevel <= '$highRange'";
  -- process-queryWineByAlcoholRange
    $sql1 = "SELECT wineID, brandName, grapeType1, grapeType2, alcoholPercent
	          FROM wineB
	          WHERE alcoholPercent >= '$lowRange' AND alcoholPercent <= '$highRange'";

    $sql2 = "SELECT COUNT(wineID) AS 'Number of Wine Types'
	          FROM wineB
	          WHERE alcoholPercent >= '$lowRange' AND alcoholPercent <= '$highRange'";
  -- process-queryWineByAgriAttribute
  SELECT w.wineID, a.name, a.$attribute, b.brandName, b.grapeType1, b.grapeType2
        FROM WineOrigin AS w
        INNER JOIN AgriculturalRegion AS a ON w.regionName=a.name
        INNER JOIN WineB AS b ON w.wineID=b.wineID
        WHERE a.$attribute = $val"

  -- process-queryWineBByExpiryRange
    $sql1 = "SELECT w.wineID, w.expiryDate, s.locationID, s.quantityInLocation
        FROM WineB as w
        INNER JOIN StoredIn AS s
        ON w.wineID = s.wineID
        WHERE expiryDate >= '$lowRangeDate' AND expiryDate <= '$highRangeDate'";
    $sql2 = "SELECT COUNT(w.wineID) AS 'Number of Wine Types'
        FROM WineB as w
        INNER JOIN StoredIn AS s
        ON w.wineID = s.wineID
        WHERE expiryDate >= '$lowRangeDate' AND expiryDate <= '$highRangeDate'";

  -- process-queryTopSupplier
    SELECT sb.supplierID, sa.name, sa.address, sb.phoneNo, tot.total
        FROM SupplierB AS sb
        INNER JOIN SupplierA as sa ON sb.address = sa.address
        INNER JOIN (SELECT supplierID, SUM(quantity) AS total
                    FROM Restock
                    GROUP BY supplierID
                    ORDER BY total DESC
                    LIMIT 1) AS tot
                    ON sb.supplierID = tot.supplierID

  -- process-queryPriceFromWineBByID
    SELECT wineID, price
	    FROM wineB
	    WHERE wineID = '$wineID'

  -- process-queryMinPriceByBrand
    SELECT w.brandName, w.grapeType1, w.grapeType2, w.price
        from
        (select brandName, grapeType1, grapeType2, price from wineb where brandName = '$brandName') w
        INNER JOIN
        (SELECT brandName, MIN(price) AS min from wineb GROUP BY brandName) m
        ON w.brandName = m.brandName AND w.price = m.min

  -- process-queryMaxPriceOfWineB
    SELECT wineID, brandName, grapeType1, grapeType2, price
            FROM WineB AS p
            INNER JOIN
            ( SELECT MAX(price) AS max FROM WineB ) AS m
            ON p.price = m.max

  -- process-queryLocationAndQuantityByWineID
    if (!empty($wineID) && !empty($locationID)) {
      $sql = "SELECT wineID, locationID, quantityInLocation
	        FROM StoredIn
          WHERE wineID = '$wineID' AND locationID = '$locationID'";
      $result = $conn->query($sql);
    } elseif (!empty($wineID)) {
    $sql = "SELECT wineID, locationID, quantityInLocation
	        FROM StoredIn
          WHERE wineID = '$wineID'";
    $result = $conn->query($sql);
    } elseif (!empty($locationID)) {
    $sql = "SELECT wineID, locationID, quantityInLocation
	      FROM StoredIn
        WHERE locationID = '$locationID'";
     $result = $conn->query($sql);
    }

  -- process-queryExpiredWineInStorage
    if ($expiry == '') {
    $sql = "SELECT w.wineID, w.expiryDate, s.locationID, s.quantityInLocation
        FROM WineB as w
        INNER JOIN StoredIn AS s
        ON w.wineID = s.wineID
        WHERE expiryDate < (SELECT CURDATE())";
    } else {
   $sql = "SELECT w.wineID, w.expiryDate, s.locationID, s.quantityInLocation
        FROM WineB as w
        INNER JOIN StoredIn AS s
        ON w.wineID = s.wineID
        WHERE expiryDate < '$expiry'";

  -- process-queryBrandFromWineAByWineTaste
  SELECT brandName, wineTaste1, wineTaste2
	FROM wineA
	WHERE wineTaste1 = '$wineTaste' OR wineTaste2 = '$wineTaste'

  -- process-queryBrandFromWineAByGrape
  SELECT brandName, grapeType1, grapeType2
	FROM wineA
	WHERE grapeType1 = '$grapeType' OR grapeType2 = '$grapeType'


-- insert:
  -- Restock:
    INSERT INTO Restock VALUES ('$employee_id', '$supplier_id', '$wine_id', '$location', '$quantity', DATE('$date'))

  -- StoredIn:
    INSERT INTO StoredIn VALUES ('$id', '$location', '$quantity')

  -- Supplier:
      $sql = "INSERT INTO SupplierA VALUES ('$address', '$name')";
      $sql = "INSERT INTO SupplierB VALUES ('$id', '$phone', '$address')";

  -- Wine:
      $sql1 = "INSERT INTO WineA VALUES ('$grape1', '$grape2', '$brand', '$taste1', '$taste2')";
      $sql2 = "INSERT INTO WineB VALUES ('$wineid', '$price', '$color', '$brand', '$grape1', '$grape2', '$alcohol', '$acid', '$sugar', DATE('$expiry'))";
      $sql3 = "INSERT INTO AgriculturalRegion VALUES ('$region', '$temperature', '$moisture', '$climate')";
      $sql4 = "INSERT INTO WineOrigin VALUES ('$region', '$wineid', '$year')";



-- delete:
  -- AgriculturalRegion:
    delete from AgriculturalRegion where name = '$name'

  -- Supplier:
      if (empty($name) && empty($supplierID) && empty($phoneNo)) {
       // do nothing
      } elseif (!empty($name)) {
        $sql = "DELETE from SupplierB where address =
        (SELECT address FROM SupplierA where name = '$name');
        DELETE from SupplierA where name = '$name';";
      } else {
        $sql = "DELETE from SupplierA where address =
          (SELECT address FROM SupplierB where supplierID = '$supplierID' or phoneNo = '$phoneNo');
          DELETE from SupplierB where supplierID = '$supplierID' or phoneNo = '$phoneNo'";
      }

  -- Wine:
     -- process-deleteWineByBrand
        $sql = "delete from WineA where brandName = '$brandName'; delete from WineB where brandName = '$brandName'";

     -- process-deleteWineByID
        $sql = "delete from WineB where wineID = '$wineID'";






-- update:
  -- AgriculturalRegion:
      if (!empty($temperature)) {
      $sql1 = "update AgriculturalRegion set temperature = '$temperature' where name = '$name'";
      $result1 = $conn->query($sql1);
      }
      if (!empty($moisture)) {
      $sql2 = "update AgriculturalRegion set moisture = '$moisture' where name = '$name'";
      $result2 = $conn->query($sql2);
      }
      if (!empty($climate)) {
       $sql3 = "update AgriculturalRegion set climate = '$climate' where name = '$name'";
      $result3 = $conn->query($sql3);
      }

  -- StorageArea:
    update StorageArea set temperature = '$temperature' where locationID = '$locationID'

  -- StoredIn:
    update StoredIn set quantityInLocation = '$quantityInLocation' where locationID = '$locationID' and wineID = '$wineID'

  -- Supplier:
      $sqlB = "UPDATE supplierb SET address = '$address'
        WHERE address = (SELECT a.address
        FROM SupplierA a
        WHERE a.name='$name');

      $sqlA = "update SupplierA set address = '$address' where name = '$name'

      $sqlA = "UPDATE suppliera SET address = '$address'
                WHERE address = (SELECT b.address
                                FROM SupplierB b
                                WHERE b.supplierID='$supplierID')

      $sqlB = "update SupplierB set address = '$address' where supplierID = '$supplierID'

      $sqlB = "UPDATE supplierb b SET phoneNo = '$phoneNo'
                WHERE b.address = (SELECT a.address
                                    FROM SupplierA a
                                    WHERE a.name='$name')

      $sqlB = "update SupplierB set phoneNo = '$phoneNo' where supplierID = '$supplierID'

  -- Wine:
      $sql = "update WineB set price = '$price' where wineID = '$wineID'";


  -- WineOrigin:
      $sql = "delete from WineOrigin where regionName = '$regionName' and wineID = '$wineID'";


-- view:
  -- AgriculturalRegion
  -- Restock
  -- StorageArea
  -- StoredIn
  -- Supplier
  -- Wine
  -- WineOrigin