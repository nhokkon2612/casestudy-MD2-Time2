<?php ?>
<br>
<br>
<br>
<br>

<table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">productName</th>
            <th scope="col">productType</th>
            <th scope="col">productStatus</th>
            <th scope="col"><a href="index.php?page=sort-product"  > productPrice</a></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($products as $key => $product): ?>
            <tr>

                <td> <?php echo ++$key ?></td>


                <td>
                    <a href="index.php?page=detail-product&Id=<?php echo $product['Id']?> " class="btn btn-info">
                        <?php echo $product['productName'] ?>
                    </a>
                </td>
                <td> <?php echo $product['productType'] ?></td>
                <td> <?php echo $product['productStatus'] ?></td>
                <td> <?php echo $product['productPrice'] . " VND" ?></td>
                <td><a class="btn btn-danger" href="index.php?page=delete-product&Id= <?php echo $product['Id'] ?>"
                       onclick="return confirm('ban co chac xoa no di khong')"> Delete </a></td>
                <td><a class="btn btn-warning"  href="index.php?page=update-product&Id= <?php echo $product['Id'] ?>"> Update </a></td>
            </tr>
        <?php endforeach; ?>

        </thead>
        <tbody>

        </tbody>





</table>


