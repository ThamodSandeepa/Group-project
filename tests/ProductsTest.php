<?php

use PHPUnit\Framework\TestCase;

class ProductsTest extends TestCase
{
    protected $connection;

    protected function setUp(): void
    {
        // Mock the database connection
        $this->connection = $this->createMock(mysqli::class);
    }

    public function testDeleteProduct()
    {
        $_POST['delete'] = true;
        $_POST['Product_id'] = 1;

        // Mock the query
        $query = "UPDATE product SET Unlisted_or_Deleted ='0' WHERE Product_id = '1'";
        $this->connection->expects($this->once())
                         ->method('query')
                         ->with($this->equalTo($query))
                         ->willReturn(true);

        // Include the file to test
        include 'products.php';

        // Add assertions if needed
        $this->assertTrue(true); // Dummy assertion
    }

    public function testUnlistProduct()
    {
        $_POST['Unlist'] = true;
        $_POST['Product_id'] = 1;

        // Mock the query
        $query = "UPDATE product SET Unlisted_or_Deleted ='2' WHERE Product_id = '1'";
        $this->connection->expects($this->once())
                         ->method('query')
                         ->with($this->equalTo($query))
                         ->willReturn(true);

        // Include the file to test
        include 'products.php';

        // Add assertions if needed
        $this->assertTrue(true); // Dummy assertion
    }

    public function testPagination()
    {
        $_GET['page'] = 2;

        // Mock the query to count rows
        $countQuery = "SELECT COUNT(Product_id) AS total_rows FROM product WHERE Unlisted_or_Deleted = 1";
        $this->connection->expects($this->once())
                         ->method('query')
                         ->with($this->equalTo($countQuery))
                         ->willReturn($this->createMockResultSet(['total_rows' => 14]));

        // Mock the query to get products
        $start = 7;
        $rows_per_page = 7;
        $productQuery = "SELECT Product_id, Images, Title, Catagory FROM product WHERE Unlisted_or_Deleted = 1 ORDER BY time_date DESC LIMIT {$start}, {$rows_per_page}";
        $this->connection->expects($this->once())
                         ->method('query')
                         ->with($this->equalTo($productQuery))
                         ->willReturn($this->createMockResultSet([
                             ['Product_id' => 8, 'Images' => 'image.jpg', 'Title' => 'Product 8', 'Catagory' => 'Category 8'],
                             // Add other mock products as needed
                         ]));

        // Include the file to test
        include 'products.php';

        // Add assertions if needed
        $this->assertTrue(true); // Dummy assertion
    }

    protected function createMockResultSet(array $data)
    {
        $mockResult = $this->createMock(mysqli_result::class);

        $mockResult->expects($this->any())
                   ->method('fetch_assoc')
                   ->willReturnOnConsecutiveCalls(...$data);

        return $mockResult;
    }

    protected function tearDown(): void
    {
        unset($_POST['delete'], $_POST['Unlist'], $_POST['Product_id'], $_GET['page']);
    }
}
