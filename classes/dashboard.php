<?php

class dashboard extends Dbh
{
    protected function getOrders($dateFrom,$dateTo)
    {
        $sql = "SELECT COUNT(*) AS orders 
            FROM `order` 
            WHERE `purchase date` 
            BETWEEN ? AND ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($dateFrom,$dateTo));

        $result = $stmt->fetchAll();
        return $result;
    }
    protected function getCustomers($dateFrom,$dateTo)
    {
        $sql = "SELECT COUNT(customerID) AS customers 
            FROM `order` 
            WHERE `purchase date` 
            BETWEEN ? AND ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($dateFrom,$dateTo));

        $result = $stmt->fetchAll();
        return $result;
    }
    protected function getRevenue($dateFrom,$dateTo)
    {
        $sql = "SELECT SUM(price*quantity) AS revenue 
        FROM `order_items`, `order` 
        WHERE `order`.id = `order_items`.orderID 
        AND `order`.`purchase date` 
        BETWEEN ? AND ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($dateFrom,$dateTo));

        $result = $stmt->fetchAll();
        return $result;
    }
    protected function getTimeFrame($dateFrom,$dateTo)
    {
        $sql = "SELECT COUNT(id) AS orders, COUNT(DISTINCT(customerID)) AS customers, `purchase date` AS `date`
        FROM `order` 
        WHERE `purchase date` BETWEEN ? AND ?
        GROUP BY `purchase date`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($dateFrom,$dateTo));

        $result = $stmt->fetchAll();
        return $result;
    }
}
