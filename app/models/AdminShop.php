<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 5/11/19
 * Time: 15:55
 */

class AdminShop
{

    private $db;

    function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

}