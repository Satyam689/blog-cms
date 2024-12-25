<?php
// admin/controllers/Login.php

class LoginController {
    private $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function login($username, $password) {
        if ($this->userModel->login($username, $password)) {
            // Login successful, redirect to dashboard or other protected area
            // For now, just return a success message
            return 'Login successful!';
        } else {
            // Login failed, return an error message
            return 'Invalid username or password';
        }
    }
}
