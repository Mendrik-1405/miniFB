
<?php
function dbconnect()
{
    static $connection = null;
    if ($connection === null) {
        $connection = mysqli_connect('localhost', 'root', '', 'minifb');
    }
    return $connection;
}

?>