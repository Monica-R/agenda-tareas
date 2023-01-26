<?php
/**
 * @param slug
 * 
 */
    require_once '../vendor/autoload.php';
    
    // Get path by url
    $slug = $_GET['slug'] ?? '';
    $slug = explode('/', $slug);

    $resource = $slug[0] === '' ? '/' : $slug[0];
    $id = $slug[1] ?? null;
?>