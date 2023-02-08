<style> <?php include_once 'static/style.css'; ?> </style>
<?php
require_once 'mongo.php';
require_once 'checkbox.php';


$dirname = "uploaded/Thumbnail/";
$click = "uploaded/Watermark/";

$author = "";
$title = "";

$checkbox = AllCheckbox();

$db = get_db();

$i = $db->checkbox->count();
if ($i>0)
{
    $files = scandir($dirname);
    for ($i =0; $i < count($files); $i++)
    {
        if(photoSaved($files[$i])===true)
        {
            echo "<a target='_blank' href='$click$files[$i]'>";
            
            echo "<img src='$dirname$files[$i]' class='galleryGroup'>";
            
            $file = "$files[$i]";
            
            photoExist($file, $author, $title);
            ?>
            </br>
            <div class="descriptionGroup"><?php echo "$author-$title"?>
            <form action="" method="post" enctype="multipart/form-data" >
                <input type="checkbox" value="<?php echo $file?>" name="name[]" id="name">
            </div>
            <?php
      }
    }
    ?>
    <div class="descriptionGroup">
        <input type="submit" value="Usuń zaznaczone z zapamiętanych" name="forgetPart">
    </div></form><?php
   
}
else {echo 'Nie wybrano żadnego zdjęcia';}