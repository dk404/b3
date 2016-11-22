<?php
if($_GET["r"] == "edit" && $_GET["ID"])
{
    $thisItem = $DB->select("SELECT * FROM blog WHERE ID=".$_GET["ID"])["result"][0];
}

$method = ($thisItem)? "edit" : "add";


?>

<section id="addBlogItem" class="mt35 mb50">
    

    
    <form action="blog.php" method="post" enctype="multipart/form-data" name="myForm" target="_self">
        <input type="hidden" name="method_name" value="<? echo "blog_". $method ?>">
        <input type="hidden" name="ID" value="<? echo $thisItem["ID"] ?>">
        <input type="text" name="title" value="<? echo $thisItem["title"] ?>"/><br><br>

        <div>добавить файл <br>
            <input type="file" name="photo">
        </div>
        <br><br>

        <textarea  name="descr" class="fullArea" cols="30" rows="10" placeholder="короткое описание"><? echo $thisItem["descr"] ?></textarea>

        

        <br><br>
        <textarea name="text" class="simpleArea" cols="30" rows="10" placeholder="Полный тест"><? echo $thisItem["text"] ?></textarea><br><br>

        <input name="submit" type="submit" value="готово"/>
    </form>
</section>



