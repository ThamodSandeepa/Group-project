<?php

use PHPUnit\Framework\TestCase;

require_once 'C:\xampp\htdocs\project\login.php'; 

class LoginTest extends TestCase
{
    // Valid login: Test with valid username and password
    public function testValidLogin()
    {
        $result = authenticate('thuwan@gmail.com', '12345678');
        $this->assertTrue($result);
    }

    // Invalid username: Test with an incorrect username
    public function testInvalidUsername()
    {
        $result = authenticate('wrong@gmail.com', '12345678');
        $this->assertFalse($result);
    }

    // Invalid password: Test with an incorrect password
    public function testInvalidPassword()
    {
        $result = authenticate('thuwan@gmail.com', 'wrongpassword');
        $this->assertFalse($result);
    }

    // Empty fields: Test with empty username and/or password fields
    public function testEmptyUsername()
    {
        $result = authenticate('', '12345678');
        $this->assertFalse($result);
    }

    public function testEmptyPassword()
    {
        $result = authenticate('thuwan@gmail.com', '');
        $this->assertFalse($result);
    }

    public function testEmptyUsernameAndPassword()
    {
        $result = authenticate('', '');
        $this->assertFalse($result);
    }
}

?>
