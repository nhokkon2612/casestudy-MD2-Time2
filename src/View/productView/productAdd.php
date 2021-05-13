<br>
<br>
<br>
<br>
<br>


<br>
<form action="index.php?page=add-product" method="post"  enctype="multipart/form-data">
    <label for="productName">Ten san pham: </label>
    <input type="text" name="productName">
    <br>


    <label for="productType">Loai san pham: </label>
    <input type="text" name="productType">
    <br>


    <label for="suppilerId">Id nha cung cap: </label>
    <input type="number" name="suppilerId">
    <br>


    <label for="productStatus">Trang thai san pham: </label>
    <input type="text" name="productStatus">
    <br>


    <label for="productCost">Gia nhap cua san pham: </label>
    <input type="number" name="productCost">
    <br>


    <label for="productPrice">Gia ban cua san pham: </label>
    <input type="number" name="productPrice">
    <br>


    <input type="file" name="productImg">
    <br>











    <button type="submit" name="submit">Them</button>
    <button onclick="window.history.go(-1);return false;" type="submit">Huy</button>
</form>
