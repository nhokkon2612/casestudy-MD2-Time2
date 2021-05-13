
<br>
<br>
<br>
<br>
<br>
<div class="d-grid gap-2">

    <a href="index.php?page=list-product" type="button" class="btn btn-secondary btn-lg btn-block" >Propduct Detail</a>
</div>

<table class="table table-striped table-dark" >
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col"> ProductName</th>
        <th scope="col"> ProductType</th>
        <th scope="col"> ProductStatus</th>
        <th scope="col"> ProductCost</th>
        <th scope="col"> ProductPrice</th>
        <th scope="col"> Suppiler</th>
        <th scope="col"> IMG</th>
    </tr>


    <?php foreach ($products as $key => $product): ?>
        <?php /*var_dump($products);die();*/?>
        <tr>

            <td> <?php echo ++$key ?></td>
            <td> <?php echo $product['productName'] ?></td>
            <td> <?php echo $product['productType'] ?></td>
            <td> <?php echo $product['productStatus'] ?></td>
            <td> <?php echo $product['productCost']." VND "?></td>
            <td> <?php echo $product['productPrice'] . " VND" ?></td>
            <td> <?php echo $product['suppilerName']  ?></td>
            <td>
                <img src="img/imgProduct/<?php echo $product['productImg']?>" width="100" height="100">
            </td>

        </tr>
    <?php endforeach; ?>
    </thead>

</table>




