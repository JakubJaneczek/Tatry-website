<?php
include_once 'mongo.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remember']))
{
    if (isset($_POST['cos']))
    {
        $file = $_POST['cos'];
        AddCheckbox($file);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forget']))
{
    clearCheckboxes();
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forgetPart']))
{
    if (isset($_POST['name']))
    {
        $file = $_POST['name'];
        clearSelected($file);
    }
}

?>