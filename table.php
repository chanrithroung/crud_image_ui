
<?php include('function.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Table</title>
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
                    <li class="active"><a href="table.php"><i class="fas fa-table"></i> View Records</a></li>
                    <li><a href="form.php"><i class="fas fa-plus-circle"></i> Add Record</a></li>
                    <li><a href="update.php"><i class="fas fa-edit"></i>Update</a></li>

                    <li><a href="#"><i class="fas fa-chart-bar"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </nav>
        </div>
        
        <main>
            <header>
                <h1>Records</h1>
                <div class="user-info">
                    <span>Admin User</span>
                    <div class="avatar">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Avatar">
                    </div>
                </div>
            </header>
            
            <div class="content">
                <div class="table-actions">
                    <div class="search-container">
                        <input type="text" placeholder="Search records...">
                        <button class="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                    
                    <div class="filter-container">
                        <select>
                            <option value="">All Categories</option>
                            <option value="technology">Technology</option>
                            <option value="health">Health</option>
                            <option value="education">Education</option>
                            <option value="business">Business</option>
                        </select>
                        
                        <select>
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    
                    <a href="form.html" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                
                <div class="card">
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php listProduct(); ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="pagination">
                        <button class="pagination-btn" disabled><i class="fas fa-chevron-left"></i></button>
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                        <span class="pagination-ellipsis">...</span>
                        <button class="pagination-btn">10</button>
                        <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Modal for delete confirmation -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirm Delete</h3>
                <button class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this record? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary">Cancel</button>
                <button class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
    
    <script>
        // Show modal on delete button click
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('deleteModal').classList.add('show');
            });
        });
        
        // Close modal
        document.querySelector('.close-btn').addEventListener('click', () => {
            document.getElementById('deleteModal').classList.remove('show');
        });
        
        document.querySelector('.modal-footer .btn-secondary').addEventListener('click', () => {
            document.getElementById('deleteModal').classList.remove('show');
        });
    </script>
</body>
</html>