<?php
require_once __DIR__ . '/core/PHPSidebar.class.php';
new Plugin\PHPSidebar\PHPSidebar($_SESSION['USER_DATA']['user_permissions']['MENU'], HOME_URI);
?>