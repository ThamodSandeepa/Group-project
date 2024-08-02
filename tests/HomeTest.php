<?php

use PHPUnit\Framework\TestCase;

class HomeTest extends TestCase
{
    private $connection;

    protected function setUp(): void
    {
        // Mock session data
        $_SESSION = ['User' => 'test@example.com'];

        // Mock database connection
        $this->connection = $this->createMock(mysqli::class);
        $this->connection->method('connect')
            ->willReturn(true);
        $this->connection->method('query')
            ->willReturn($this->getMockedUserResult());
    }

    private function getMockedUserResult()
    {
        $result = $this->createMock(mysqli_result::class);
        $result->method('fetch_assoc')
            ->willReturn(['Name' => 'Test User']);
        return $result;
    }

    public function testUserIsLoggedIn()
    {
        // Simulate running home.php
        ob_start();
        include 'home.php';
        $output = ob_get_clean();

        // Test that user is logged in and correct name is displayed
        $this->assertStringContainsString('Test User', $output);
    }

    public function testUserIsRedirectedWhenNotLoggedIn()
    {
        // Clear session data to simulate user not logged in
        $_SESSION = [];

        // Capture the output
        ob_start();
        include 'home.php';
        $output = ob_get_clean();

        // Test that user is redirected to login page
        $this->assertStringContainsString('location:login.php', $output);
    }

    protected function tearDown(): void
    {
        $this->connection = null;
        $_SESSION = [];
    }
}

?>
