<?php

namespace Login\classes;

use PHPUnit\Framework\TestCase;
use Login\classes\Database;
use Login\classes\User;

class UserTest extends TestCase {
    private $username;
    private $db;

    public function testRegisterUser(): void {
        // Test successful registration
        $this->assertTrue($this->user->registerUser('50 lira', 'Fortnite'));
    
        // Test registration with existing username (should fail)
        $this->assertFalse($this->user->registerUser('50 lira', 'Fortnite'));
    }
    

    public function testLoginUser(): void {
        // Test successful login
        $this->assertTrue($this->user->loginUser('Rohan', 'D'));

        // Test login with incorrect password (should fail)
        $this->assertFalse($this->user->loginUser('Rohan', 'JK'));

        // Test login with non-existent username (should fail)
        $this->assertFalse($this->user->loginUser('60 lira', 'Fortnite'));
    }

    public function testIsLoggedin(): void {
        // Test when not logged in
        $this->assertFalse($this->user->isLoggedin());

        // Test after successful login
        $this->user->loginUser('50 lira', 'Fortnite');
        $this->assertTrue($this->user->isLoggedin());
    }

    public function testLogoutUser()
        {
        
            $this->username->Logout();

            $isDeleted = (session_status() == PHP_SESSION_NONE && empty(session_id()));
            $this->assertTrue($isDeleted);
        }
      
}