<?php
    include('function.php');


    if (isset($_GET['update_id'])) {
        $id  = $_GET['update_id'];
        $select_query = "SELECT * FROM `product` WHERE `id`= $id;";
        $result = $connection->query($select_query);
        $product = mysqli_fetch_assoc($result);
    } else {
        header("Location: table.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-database"></i>
                <span>DataManager</span>
            </div>
            <nav>
                <ul>
                    <li><a href="table.php"><i class="fas fa-table"></i> View Records</a></li>
                    <li><a href="form.php"><i class="fas fa-plus-circle"></i> Add Record</a></li>
                    <li class="active"><a href="form.php"><i class="fas fa-edit"></i>Update</a></li>
                    <li><a href="#"><i class="fas fa-chart-bar"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </nav>
        </div>
        
        <main>
            <header>
                <h1>Update Record</h1>
                <div class="user-info">
                    <span>Admin User</span>
                    <div class="avatar">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Avatar">
                    </div>
                </div>
            </header>
            
            <div class="content">
                <div class="card">
                    <form class="crud-form" action="function.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" value="<?php echo $product['title'] ?>" id="title" name="title" placeholder="Enter title" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" required>
                                    <option value="">Select category</option>
                                    <option <?php echo  $product['category'] == "technology" ? 'selected' : '' ?> value="technology">Technology</option>
                                    <option <?php echo  $product['category'] == "health" ? 'selected' : '' ?> value="health">Health</option>
                                    <option <?php echo  $product['category'] == "education" ? 'selected' : '' ?> value="education">Education</option>
                                    <option <?php echo  $product['category'] == "business" ? 'selected' : '' ?>   value="business">Business</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" value="<?php echo $product['price'] ?>" name="price" placeholder="Enter price" step="0.01" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" required>
                                    <option value="">Select status</option>
                                    <option  <?php echo  $product['status'] == "Active" ? 'selected' : '' ?> value="active">Active</option>
                                    <option  <?php echo  $product['status'] == "Inactive" ? 'selected' : '' ?> value="inactive">Inactive</option>
                                    <option  <?php echo  $product['status'] == "Pending" ? 'selected' : '' ?> value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="4" placeholder="Enter description" required><?php echo $product['description'] ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="description">Old Image</label>
                            <img style="width: 20rem;" src="http://localhost/myphp/crud_image_9_10/images/<?php echo $product['image'] ?>" alt="Old image">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image Upload</label>
                            <div class="image-upload-container">
                                <div class="image-preview" id="imagePreview">
                                    <i class="fas fa-image"></i>
                                    <span>No image selected</span>
                                </div>
                                <div class="image-upload-controls">
                                    <label for="image" class="upload-btn">
                                        <i class="fas fa-upload"></i> Choose Image
                                    </label>
                                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='table.php'">Cancel</button>
                            <input type="submit" name="btn_update" class="btn btn-primary" value="Save Record">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Image Preview">`;
                    preview.classList.add('has-image');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = `<i class="fas fa-image"></i><span>No image selected</span>`;
                preview.classList.remove('has-image');
            }
        }
    </script>
</body>
</html>