<?php 
// app/helper/Session.php

class Session {
    private $sessionName;
    private $sessionLifetime;
    private $sessionPath;
    private $sessionDomain;
    private $sessionSecure;
    private $sessionHttpOnly;

    public function __construct($sessionName = 'my_session', $sessionLifetime = 3600, $sessionPath = '/', $sessionDomain = null, $sessionSecure = false, $sessionHttpOnly = true) {
        $this->sessionName = $sessionName;
        $this->sessionLifetime = $sessionLifetime;
        $this->sessionPath = $sessionPath;
        $this->sessionDomain = $sessionDomain;
        $this->sessionSecure = $sessionSecure;
        $this->sessionHttpOnly = $sessionHttpOnly;

        // Start the session
        session_name($this->sessionName);
        session_start();

        // Set the session lifetime
        ini_set('session.gc_maxlifetime', $this->sessionLifetime);

        // Set the session path
        ini_set('session.save_path', $this->sessionPath);

        // Set the session domain
        if ($this->sessionDomain) {
            ini_set('session.cookie_domain', $this->sessionDomain);
        }

        // Set the session secure flag
        ini_set('session.cookie_secure', $this->sessionSecure ? 'On' : 'Off');

        // Set the session HTTP-only flag
        ini_set('session.cookie_httponly', $this->sessionHttpOnly ? 'On' : 'Off');
    }

    public function set($key, $value) {
        // Validate the key and value
        if (!is_string($key) || !is_scalar($value)) {
            throw new InvalidArgumentException('Invalid key or value');
        }

        // Set the session variable
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        // Validate the key
        if (!is_string($key)) {
            throw new InvalidArgumentException('Invalid key');
        }

        // Return the session variable
        return $_SESSION[$key] ?? null;
    }

    public function unset($key) {
        // Validate the key
        if (!is_string($key)) {
            throw new InvalidArgumentException('Invalid key');
        }

        // Unset the session variable
        unset($_SESSION[$key]);
    }

    public function destroy() {
        // Destroy the session
        session_destroy();
    }

    public function regenerateId() {
        // Regenerate the session ID
        session_regenerate_id(true);
    }

    public function isValid() {
        // Check if the session is valid
        return session_status() === PHP_SESSION_ACTIVE;
    }
}