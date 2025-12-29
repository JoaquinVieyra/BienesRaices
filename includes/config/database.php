<?php
function conectarDB(): mysqli{
    $db=mysqli_connect('localhost', 'root','root','bienesraices_crud');
    if (!$db) exit;
    return $db;
}
conectarDB();