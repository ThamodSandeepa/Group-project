


<?php
$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');

if(isset($_POST["submit"])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $woodtypes = $_POST['woodtypes'];
    $unlisted_or_deleted = 1;

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);

    // Insert data into the product table using prepared statements
    $product_table = "INSERT INTO product(Images, Title, Catagory, Unlisted_or_Deleted) VALUES (?, ?, ?, ?)";
    $product_table_statement = $connection->prepare($product_table);
    $product_table_statement->bind_param("sssi", $folder, $title, $category, $unlisted_or_deleted);
    $product_table_statement->execute();
    $product_id = $product_table_statement->insert_id;

    // Loop through woodtypes and insert data into the wood table
    foreach ($woodtypes as $index => $multytypes) {
        // Use prepared statement for querying the type_id
        $id_query = "SELECT `Type_id` FROM `woodtype` WHERE Wood_type=?";
        $id_statement = $connection->prepare($id_query);
        $id_statement->bind_param("s", $multytypes);
        $id_statement->execute();
        $id_result = $id_statement->get_result();
        
        if ($id_result && $id_row = $id_result->fetch_assoc()) {
            $type_id = $id_row['Type_id'];
            // Insert data into the wood table using prepared statements
            $woodtype_table = "INSERT INTO wood(Product_id, type_id, types, is_deleted) VALUES (?, ?, ?, ?)";
            $type_table_statement = $connection->prepare($woodtype_table);
            $type_table_statement->bind_param("issi", $product_id, $type_id, $multytypes, $unlisted_or_deleted);
            $type_table_statement->execute();
        }
    }
}

echo '<h1>Item listeded Successfully. Back to <a href="postproduct.php">Add New Product</a></h1>';

?>
