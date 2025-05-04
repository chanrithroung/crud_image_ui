<?php 
    $connection = new mysqli('localhost','root', '', 'php_crud_image_8_11');

    function uploadFile($soursefile) {
        $file_name = rand(0,99999999).date('y-m-d-h-i-s').'.'.pathinfo($soursefile['name'], PATHINFO_EXTENSION);
        move_uploaded_file($soursefile['tmp_name'], './images/'.$file_name);
        return $file_name;
    }

    function createProduct() {
        global $connection;
        if( isset($_POST['btn_submit'])) {
            $file     = $_FILES['image'];
            $image    = uploadFile($file);
            $title    = $_POST['title'];
            $price    = $_POST['price'];
            $category = $_POST['category'];
            $status   = $_POST['status'];
            $description  = $_POST['description'];

            $insert_qeury = "INSERT INTO `product`(`image`, `title`, `price` , `category`, `status`, `description`) VALUES ('$image','$title', '$price','$category','$status', '$description')";
            $connection->query($insert_qeury);
            header("Location: table.php");
        }
    }

    createProduct();


    function listProduct() {
        global $connection;

        $select_product = "SELECT * FROM `product`;";
        $result = $connection->query($select_product);

        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $image = $row['image'];
            $title = $row['title'];
            $price = $row['price'];
            $category = $row['category'];
            $status =  strtolower($row['status']);
            
            echo "
                <tr>
                    <td>$id</td>
                    <td>
                        <div class='table-image'>
                            <img src='http://localhost/myphp/crud_image_9_10/images/$image' alt='Product 1'>
                        </div>
                    </td>
                    <td>$title</td>
                    <td><span class='badge technology'>$category</span></td>
                    <td>$$price</td>
                    <td><span style='text-transfrom:  capitalize' class='status-badge $status'>$status</span></td>
                    <td>
                        <div class='action-buttons'>
                            <button class='action-btn view-btn' title='View'><i class='fas fa-eye'></i></button>
                            <a href='update.php?update_id=$id' class='action-btn edit-btn' title='Edit' onclick='window.location.href=\'form.html\''><i class='fas fa-edit'></i></a>
                            <button class='action-btn delete-btn' title='Delete'><i class='fas fa-trash'></i></button>
                        </div>
                    </td>
                </tr>
            ";
        }
    }
