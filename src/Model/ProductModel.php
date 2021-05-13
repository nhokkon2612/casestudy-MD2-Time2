<?php


namespace src\Model;


class ProductModel
{
    protected $database;

    public function __construct()
    {
        $connect = new DBconnect;
        $this->database = $connect->connect();
    }

    public function getAll()
    {
        $sql = "SELECT `Id`,`productName`,`productType`,`productStatus`,`productPrice` FROM `products` ORDER BY productPrice ASC ";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function add($productName, $productType, $suppilerId, $productStatus, $productCost, $productPrice, $productImg)
    {
        $sql = "INSERT INTO products(`productName`,`productType`,`suppilerId`,`productStatus`,`productCost`,`productPrice`,`productImg`) VALUES(:productName,:productType,:suppilerId,:productStatus,:productCost,:productPrice,:productImg)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":productName", $productName);
        $stmt->bindParam(":productType", $productType);
        $stmt->bindParam(":suppilerId", $suppilerId);
        $stmt->bindParam(":productStatus", $productStatus);
        $stmt->bindParam(":productCost", $productCost);
        $stmt->bindParam(":productPrice", $productPrice);
        $stmt->bindParam(":productImg", $productImg);
        $stmt->execute();
    }


    public function update($Id, $productName, $productType, $suppilerId, $productStatus, $productCost, $productPrice, $productImg)
    {
        $sql = "UPDATE products
                  SET productName=:productName , productType=:productType,suppilerId=:suppilerId,productStatus=:productStatus,productCost=:productCost,productPrice=:productPrice,productImg=:productImg
                  WHERE Id=:Id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":productName", $productName);
        $stmt->bindParam(":productType", $productType);
        $stmt->bindParam(":suppilerId", $suppilerId);
        $stmt->bindParam(":productStatus", $productStatus);
        $stmt->bindParam(":productCost", $productCost);
        $stmt->bindParam(":productPrice", $productPrice);
        $stmt->bindParam(":productImg", $productImg);
        $stmt->bindParam(':Id', $Id);
        $stmt->execute();
    }

    public function coverUpdate($Id)
    {
        //var_dump($Id);die();
        $sql = "SELECT * FROM `products` WHERE Id=:Id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':Id', $Id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE Id=:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }


    public function find($str)
    {
        //if ($str=="")
        //var_dump($str);die("aaaaaaaaaaaaaa");
        $sqlstr = "'%$str%'";
        //var_dump($sqlstr);echo "<br>";
        //var_dump($sqlstr);die("oiiii gioi oi");
        $sql = "SELECT * FROM `products` WHERE productName LIKE $sqlstr OR productType LIKE $sqlstr";
        //$sql="SELECT * FROM `products` WHERE productName LIKE $sqlstr OR ";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function sort()
    {
        $sql = "SELECT `Id`,`productName`,`productType`,`productStatus`,`productPrice` FROM `products` ORDER BY productPrice DESC ";
        $stmt = $this->database->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function productDetail($Id)
    {
        $sql = "SELECT products.Id,`productName`,`productType`,`productStatus`,`productCost`,`productPrice`,`productImg`,suppilerName,`suppilerId`
                FROM `products` INNER JOIN suppilers
                ON products.suppilerId=suppilers.Id
                WHERE products.Id=:Id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':Id', $Id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
