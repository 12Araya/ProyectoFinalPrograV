<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function requiereSesion(): void {
    if (empty($_SESSION['usuario_id'])) {
        header('Location: ../login.php');
        exit;
    }
}
function escapar($valor): string {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}
