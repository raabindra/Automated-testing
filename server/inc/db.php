<?php
/**
 * PDO connection helper for the login authentication query.
 *
 * The rest of the codebase is unchanged and continues to use the legacy
 * mysqli connection in connection.php. This PDO connection is used only
 * by getLoginAdmin() (server/inc/get.php) so that the login query can use
 * a real parameterized/prepared statement instead of string concatenation.
 *
 * Fixes: SQL Injection - Login Authentication (Part 1, Table 1, High).
 */

function getPDO(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $host = 'localhost';
        $db   = 'royal_express_db';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false, // use REAL prepared statements, not client-side emulation
        ];

        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            // Never leak DSN/credentials/driver detail to the client.
            error_log('[DB] Connection failed: ' . $e->getMessage());
            http_response_code(500);
            exit('An unexpected error has occurred. Please try again later.');
        }
    }

    return $pdo;
}
