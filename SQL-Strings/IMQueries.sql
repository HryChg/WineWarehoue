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
  -- AgriculturalRegion:

  -- Restock

-- delete:

-- update:


