<style> <?php include_once 'static/style.css'; ?> </style>
<?php
require_once 'mongo.php';
require_once 'checkbox.php';


$dirname = "uploaded/Thumbnail/";
$click = "uploaded/Watermark/";

$author = "";
$title = "";

$db = get_db();

$photosOnPage = 2;



if(is_dir($dirname))
{
    if (!isset($_GET['page']))
    {
        $page=1;
    }
    elseif(isset($_GET['page']))
    {
        $files = scandir($dirname);
        $numberOfimg = count($files)-2;
        $numberOfPages = ceil($numberOfimg/$photosOnPage);
        $page=$_GET['page'];
        if($page > $numberOfPages)
        {
            $page = 1;
        }
    }
    

    $files = scandir($dirname);
    $numberOfPhotos = count($files)-2;
    $numberOfPages = ceil($numberOfPhotos/$photosOnPage);
    $start = $photosOnPage*$page;
   
    for ($i = $start; $i < ($start + $photosOnPage); $i++)
    {
        if($i<$numberOfPhotos+2)
        {

            if($files[$i] !='.' && $files[$i] !='..')
            {
                
                echo "<a target='_blank' href='$click$files[$i]'>";
                
                echo "<img src='$dirname$files[$i]' class='galleryGroup'>";
                
                $file = "$files[$i]";
                
                photoExist($file, $author, $title);
                ?>
                </br>
                <div class="descriptionGroup"><?php echo "$author-$title"?>
                <form action="" method="post" enctype="multipart/form-data" >
                    <input type="checkbox" value="<?php echo $file?>" name="cos[]" id="cos" <?php if (photoSaved($file)===true) echo 'checked'?>>
            </br>
                <?php
          }
        }
    }
    ?>
    </br><div>
        <input type="submit" value="Zapamiętaj wybrane" name="remember">
        <input type="submit" value="Usuń zapamiętane" name="forget"></form>
        </br><br>
        <form action="" method="get" enctype="multipart/form-data">
            <p>Ilość stron: <?php echo  $numberOfPages?></p>
            <input type="text" value="" name="page">
        </div>
        </form> 
    </div>
 
                
        <?php
   
}

