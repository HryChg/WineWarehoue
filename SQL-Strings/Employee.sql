----------------
--- Employee ---
----------------

-- add
INSERT INTO Employee VALUES ('$employeeID', '$type', '$name');

-- update
update Employee
set name = '$name', type = '$type'
where employeeID = '$employeeID';

-- delete
DELETE FROM Employee WHERE employeeID = $employeeID;

-- view
SELECT employeeID, type, name FROM Employee;
