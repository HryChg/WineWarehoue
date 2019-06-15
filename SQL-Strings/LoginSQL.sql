-- General employee:
  SELECT name
	FROM Employee
	WHERE name = '$user'

-- Inventory Manager:
  SELECT i.employeeID
	FROM InventoryManager i
	INNER JOIN Employee e
	ON i.employeeID = e.employeeID
	WHERE e.name = '$user' AND i.password = '$pass'

-- Shipping Manager:
  SELECT s.employeeID
	FROM ShippingManager s
	INNER JOIN Employee e
	ON s.employeeID = e.employeeID
	WHERE e.name = '$user' AND s.password = '$pass'
