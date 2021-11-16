<?php

class dashboardCon extends dashboard
{
    private $dateFrom;
    private $dateTo;

    public function __construct($dateFrom,$dateTo)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    public function showDates($str)
    {
        switch ($str) {
            case 'from':
                return $this->dateFrom;
                break;
            case 'to':
                return $this->dateTo;
                break;
            default:
                break;
        }
    }

    public function showOrders()
    {
        $result = $this->getOrders($this->dateFrom,$this->dateTo);
        echo "Orders: " . $result[0]['orders'];
    }
    public function showCustomers()
    {
        $result = $this->getCustomers($this->dateFrom,$this->dateTo);
        echo "Customers: " . $result[0]['customers'];
    }
    public function showRevenue()
    {
        $result = $this->getRevenue($this->dateFrom,$this->dateTo);
        echo "Revenue: " . $result[0]['revenue'];
    }
    public function showChart($str)
    {
        $result = $this->getTimeFrame($this->dateFrom,$this->dateTo);
        foreach ($result as $data) {
            if ($str=='date'){echo "'". $data[$str] ."', ";}
            else{echo "". $data[$str] .", ";}
        }
    }
}
