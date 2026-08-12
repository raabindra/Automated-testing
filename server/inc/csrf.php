<?php
/**
 * CSRF token generation and validation for the login form.
 *
 * Fixes: Absence of Anti-CSRF Tokens - Login Function (Part 1, Table 1, Medium).
 */

function csrf_token(): string
{
    if (session_id() === '') {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/** Renders a hidden <input> field carrying the CSRF token. Place inside the login <form>. */
function csrf_field(): void
{
    echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') . '">';
}

/** Validates a submitted CSRF token using a constant-time comparison. */
function csrf_validate(?string $submitted): bool
{
    if (session_id() === '') {
        session_start();
    }
    if (empty($_SESSION['csrf_token']) || empty($submitted)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $submitted);
}
