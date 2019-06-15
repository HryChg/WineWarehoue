find all the backOrder
```sql
SELECT * FROM OrderReceived WHERE backorder = 'Y';
```

find all order handled by ShippingManagerJohn
```sql
SELECT * FROM OrderReceived WHERE employeeID = $employee;
```

find out how many order we have from each retailer
```sql
SELECT retailer, count(retailer) as repeatRetailerCount
FROM OrderReceived
GROUP BY retailer;
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

display every wine being order, grouped by retailer
```sql
SELECT wineID, retailer
FROM OrderReceived
GROUP BY retailer, wineID;
```

find out the retailer count
```sql
SELECT COUNT(DISTINCT retailer)
FROM OrderReceived;
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
SELECT retailerCountForEachWine.*
FROM (
      SELECT wineID, COUNT(retailer) as retailerCount
      FROM OrderReceived
      GROUP BY wineID
      ) AS retailerCountForEachWine
WHERE retailerCountForEachWine.retailerCount > 2;
```