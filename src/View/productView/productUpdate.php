<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<b>Update san pham</b>
<?php //var_dump($product);
foreach ($product as $key=>$value)
$Id=$value['Id'];
$productName=$value['productName'];
$productType=$value['productType'];
$suppilerId=$value['suppilerId'];
$productStatus=$value['productStatus'];
$productCost=$value['productCost'];
$productPrice=$value['productPrice'];
$productImg=$value['productImg'];



?>









<form action="index.php?page=update-product" method="post" enctype="multipart/form-data">



    <div>
        <label for="Id">Id san pham</label>
        <input type="number" name="Id" value="<?php echo "$Id"?>">
    </div>

    <label for="productName">Ten san pham: </label>
    <input type="text" name="productName" value="<?php echo"$productName"?>">
    <br>

    <label for="productType">Loai san pham: </label>
    <input type="text" name="productType" value="<?php echo"$productType"?>">
    <br>

    <label for="suppilerId">Id nha cung cap: </label>
    <input type="number" name="suppilerId" value="<?php echo"$suppilerId"?>">
    <br>

    <label for="productStatus">Trang thai san pham: </label>
    <input type="text" name="productStatus" value="<?php echo"$productStatus"?>">
    <br>

    <label for="productCost">Gia nhap cua san pham: </label>
    <input type="number" name="productCost" value="<?php echo"$productCost"?>">
    <br>

    <label for="productPrice">Gia ban cua san pham: </label>
    <input type="number" name="productPrice" value="<?php echo"$productPrice"?>">
    <br>

    <img src="<?php echo $productImg?>" alt="hinh anh san pham" height="150" width="150">
    <br>

    <input type="file" name="productImg">
    <button type="submit" onclick="return confirm('Oke de tien hanh update')" name="submit">Update</button>
    <button onclick="window.history.go(-1);return false;" type="submit">Huy</button>
</form>







<!--<form action="">

    <input type="text" name="oigioi oi" value="hathu">
</form>-->

<!--tao 1 cai o input co value = "tien" luc hien thi o input ra se co gia tri auto trong o input la "tien" da xong input
-->