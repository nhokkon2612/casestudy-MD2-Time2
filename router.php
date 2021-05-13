<?php


use src\Controller\ProductController;
$page= $_REQUEST['page'] ?? '';
$productController = new ProductController();


switch ($page){
    case 'list-product':
        $productController->index();
        break;
    case 'add-product':
        $productController->add();
        break;
    case 'delete-product':
        $productController->delete();
        break;
    case 'update-product':
        $productController->coverUpdate();
        break;
    case 'find-product':
        $productController->find();
        break;
    case 'sort-product':
        $productController->sort();
        break;
    case 'detail-product':
        $productController->detailProduct();
        break;



    default:
        echo"";
}