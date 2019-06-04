What Shipment Manager can do?
To generating a list of wines most likely to be backOrder
To determine repeat orders of wines
To identify top 5 wines where every retailer has ordered 

-- Order Received ---

View the Order 

```sql
SELECT * FROM OrderReceived;
```

Add Order

```sql
INSERT INTO OrderReceived 
VALUES('$orderID', '$employeeID', '$quantity', '$address', '$backOrder', TIMESTAMP('$orderReceivedDate'));
```

Update Order

```sql
UPDATE OrderReceived
SET 
    employeeID = $employeeID,
    quantity = $quantity,
    address = $address,
    backorder = $backOrder,
    orderReceivedDate = $orderReceivedDate
WHERE
    orderID = $orderID;
```

delete order

```sql
-- generic delete
DELETE FROM OrderReceived WHERE orderID = $orderID;
```

find all the backOrder

```sql
SELECT * FROM OrderReceived WHERE employeeID = $employee;
```

find all order handled by ShippingManagerJohn

```sql
SELECT * FROM OrderReceived WHERE backorder = 'Y';
```

find the top 5 ordered wine to be backOrdered

```sql
SELECT wineID, count(wineID) as backOrderedWineCount
FROM OrderReceived 
WHERE backorder = 'Y'
GROUP by wineID
ORDER by backOrderedWineCount DESC
LIMIT 5;
```

find the top 10 repeat ordered on Wine

```sql
SELECT retailer, wineID, count(wineID) as repeatWineCount
FROM OrderReceived
GROUP BY retailer, wineID
ORDER BY repeatWineCount DESC
LIMIT 10;
```

find out how many order we have from each retailer

```sql
SELECT retailer, count(retailer) as repeatRetailerCount
FROM OrderReceived
GROUP BY retailer;
```

find top 10 wines where every retailer has ordered 

```sql
SELECT wineID, SUM(quantity) as totalQuantity
FROM OrderReceived
GROUP BY wineID
ORDER BY totalQuantity DESC
LIMIT 10;
```

aggregate the result so that it show the quantity of each wine being ordered

```sql
SELECT wineID, SUM(quantity) as totalQuantity
FROM OrderReceived
GROUP BY wineID;
```

group every order by wineID

```sql
SELECT orderID, wineID
FROM OrderReceived
GROUP BY wineID, orderID;
```

To identify top 5 wines where every retailer has ordered 

```sql
-- find all the wine
select wineID from WineB;

-- display every wine being order, grouped by retailer
SELECT wineID, retailer
FROM OrderReceived
GROUP BY retailer, wineID;

-- find out the retailer count
SELECT COUNT(DISTINCT retailer)
FROM OrderReceived;

-- identify top 5 wine where every retailer has ordered
SELECT retailerCountAndQuantityForEachWine.*
FROM (
      SELECT wineID, COUNT(retailer) as retailerCount, SUM(quantity) as totalQuantity
      FROM OrderReceived
      GROUP BY wineID
      ) AS retailerCountAndQuantityForEachWine
WHERE retailerCountAndQuantityForEachWine.retailerCount = $totalNumberOfRetailers
ORDER BY totalQuantity DESC
LIMIT 5;
```

find out the orderCount for each retailer

```sql
SELECT retailer, COUNT(orderID) AS orderCount 
FROM OrderReceived
GROUP BY retailer;
```

find out retailer count for each wine being ordered

```sql
SELECT wineID, COUNT(retailer) as retailerCount
FROM OrderReceived
GROUP BY wineID;
```

find out a wine where at least 2 retailer has order

```sql
-- TODO
SELECT retailerCountForEachWine.*
FROM (
      SELECT wineID, COUNT(retailer) as retailerCount
      FROM OrderReceived
      GROUP BY wineID
      ) AS retailerCountForEachWine
WHERE retailerCountForEachWine.retailerCount > 2;
```

NOTE: OrderReceived should contain the wine ID and retailerID
If a retailer order wineC for 10 bottle and wineD for 11 bottles on dateB.
The two different types of wine will be different ORDER under the same date, same retailer, and same address

```sql
INSERT INTO OrderReceived VALUES(100004, 009, 98412310, 10, 'Neverland Tea Salon', '444 EEE Road, Vancouver, BC', 'Y', TIMESTAMP('2019-05-22 15:35:18'));
INSERT INTO OrderReceived VALUES(100005, 009, 97802134, 11, 'Neverland Tea Salon', '444 EEE Road, Vancouver, BC', 'Y', TIMESTAMP('2019-05-22 15:35:18'));
```



