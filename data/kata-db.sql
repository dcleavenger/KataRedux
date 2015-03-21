-- ITEM TABLE

DROP TABLE IF EXISTS Item;

CREATE TABLE Item (
  ItemID              VARCHAR(1)          PRIMARY KEY
  ,Price              DECIMAL(15,2)
  ,Offer              VARCHAR(100)
);

/*
 Item  Price   Offer
 --------------------------
 A     50       3 for 130
 B     30       2 for 45
 C     20
 D     15
*/

-- ITEM DATA

INSERT INTO Item VALUES ('A',50.00,'3 for 130');
INSERT INTO Item VALUES ('B',30.00,'2 for 45');
INSERT INTO Item VALUES ('C',20.00,'');
INSERT INTO Item VALUES ('D',15.00,'');

/*

mysql> show tables;
+----------------+
| Tables_in_Kata |
+----------------+
| Item           |
+----------------+
1 row in set (0.00 sec)

mysql> select * from Item;
+--------+-------+-----------+
| ItemID | Price | Offer     |
+--------+-------+-----------+
| A      | 50.00 | 3 for 130 |
| B      | 30.00 | 2 for 45  |
| C      | 20.00 |           |
| D      | 15.00 |           |
+--------+-------+-----------+
4 rows in set (0.00 sec)

*/

