<?php

namespace src\Controller;
use src\Model\ProductModel;


class ProductController
{
    public ProductModel $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        include "src/View/productView/productView.php";


    }


    public function add(){
        if ($_SERVER['REQUEST_METHOD']=="GET"){
            include "src/View/productView/productAdd.php";
        }else{
            $this->uploadfileImg();

            $productName=$_POST['productName'];
            $productType=$_POST['productType'];
            $suppilerId=$_POST['suppilerId'];
            $productStatus=$_POST['productStatus'];
            $productCost=$_POST['productCost'];
            $productPrice=$_POST['productPrice'];
            $productImg=$_FILES['productImg']['name'];
            $this->productModel->add( $productName,$productType,$suppilerId,$productStatus,$productCost,$productPrice,$productImg);
            header("location:index.php?page=list-product");
        }
    }
    public function delete(){
        $id=$_GET['Id'];
        $product=$this->productModel->delete($id);
        header('Location: index.php?page=list-product');

    }
    public function coverUpdate(){
         $Id=(int)$_GET['Id'];
        $product=$this->productModel->coverUpdate($Id);
        if ($_SERVER['REQUEST_METHOD']== 'GET'){
            include "src/View/productView/productUpdate.php";

        }else{
            $this->uploadfileImg();
            $Id=(int)$_POST['Id'];
            $productName=$_POST['productName'];
            $productType=$_POST['productType'];
            $suppilerId=$_POST['suppilerId'];
            $productStatus=$_POST['productStatus'];
            $productCost=$_POST['productCost'];
            $productPrice=$_POST['productPrice'];
            $productImg=$_FILES['productImg']['name'];
            $this->productModel->update( $Id,$productName,$productType,$suppilerId,$productStatus,$productCost,$productPrice,$productImg);
            header('location: index.php?page=list-product');
        }
    }
    public function find(){
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $str=$_POST['dataToFind'];
            if ($str==""){
                echo '<script language="javascript">';
                echo 'alert("Ban chua nhap noi dung can tim kiem")';
                echo '</script>';
            }else{
                $products=$this->productModel->find($str);
                //var_dump($products);
                if ($products[0]==""){
                    echo '<script language="javascript"> 
                         alert("Thong tin ban tim kiem hien khong co!")
                          </script> ';
                }else{
                    include 'src/View/productView/productViewAfterFind.php';
                }
            }
        }
    }
    public function sort(){
        $products=$this->productModel->sort();
        include 'src/View/productView/productViewDESC.php';
    }
    public function detailProduct(){
        $Id=$_GET['Id'];
        $products=$this->productModel->productDetail($Id);
        //var_dump($product);
        include 'src/View/productView/productDetail.php';
    }
    public function uploadfileImg(){
        //upload file
        //check hop le cua file
        $target_dir="img/imgProduct/";
        $target_file=$target_dir. basename($_FILES['productImg']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk=1;

        if (isset($_POST['submit'])){
            $check= getimagesize($_FILES['productImg']['tmp_name']);
            if ($check!=false){
                $uploadOk=1;
            }else{
                $uploadOk=0;
            }
        }
        if ($imageFileType != "jpg" && $imageFileType!="png" && $imageFileType!="jpeg"&&$imageFileType="gif"){
            $uploadOk=0;
        }
        if ($uploadOk==0){
            echo "upload that bai";
        }else{
           /* if (move_uploaded_file($_FILES['productImg']['tmp_name'],$target_file)){
                echo"okee";
            }else{
                echo"saiiiiiiiiiiiii";
            }*/
            move_uploaded_file($_FILES['productImg']['tmp_name'],$target_file);
        }


    }
}







