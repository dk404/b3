<?php

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>wysiwyg редактор ckeditor</title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href=""/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <textarea name="" id="" cols="30" rows="10" class="fullArea"></textarea><br><br>

    <div style="width: 50%;"><textarea name="" id="" cols="30" rows="10" class="simpleArea">The following distributions (see comparison table) are available:

basic - the Basic preset
standard - the Standard preset
standard-all - the Standard preset together with all other plugins created by CKSource*
full - the Full preset
full-all - the Full preset together with all other plugins created by CKSource*
* Plugins not included in a preset need to be enabled with config.extraPlugins.

Note: Due to a human error to use CKEditor 4.4.5, you should specify 4.4.5.1. The path that points to 4.4.5 actually points to an older version of CKEditor (4.3.5). To avoid issues on existing installations, we decided to keep the (invalid) old version under that path.

Enabling Local Plugins

To enable an extra plugin from a local folder while using CKEditor CDN, CKEDITOR.plugins.addExternal() must be called first so that CKEditor knew from where to load the plugin.

The CKEDITOR.plugins.addExternal() method accepts three parameters:

The name of the plugin.
The location of the plugin. Make sure that the path starts with a slash character ("/").
File name (usually "plugin.js").The following distributions (see comparison table) are available:

basic - the Basic preset
standard - the Standard preset
standard-all - the Standard preset together with all other plugins created by CKSource*
full - the Full preset
full-all - the Full preset together with all other plugins created by CKSource*
* Plugins not included in a preset need to be enabled with config.extraPlugins.

Note: Due to a human error to use CKEditor 4.4.5, you should specify 4.4.5.1. The path that points to 4.4.5 actually points to an older version of CKEditor (4.3.5). To avoid issues on existing installations, we decided to keep the (invalid) old version under that path.

Enabling Local Plugins

To enable an extra plugin from a local folder while using CKEditor CDN, CKEDITOR.plugins.addExternal() must be called first so that CKEditor knew from where to load the plugin.

The CKEDITOR.plugins.addExternal() method accepts three parameters:

The name of the plugin.
The location of the plugin. Make sure that the path starts with a slash character ("/").
File name (usually "plugin.js").The following distributions (see comparison table) are available:

basic - the Basic preset
standard - the Standard preset
standard-all - the Standard preset together with all other plugins created by CKSource*
full - the Full preset
full-all - the Full preset together with all other plugins created by CKSource*
* Plugins not included in a preset need to be enabled with config.extraPlugins.

Note: Due to a human error to use CKEditor 4.4.5, you should specify 4.4.5.1. The path that points to 4.4.5 actually points to an older version of CKEditor (4.3.5). To avoid issues on existing installations, we decided to keep the (invalid) old version under that path.

Enabling Local Plugins

To enable an extra plugin from a local folder while using CKEditor CDN, CKEDITOR.plugins.addExternal() must be called first so that CKEditor knew from where to load the plugin.

The CKEDITOR.plugins.addExternal() method accepts three parameters:

The name of the plugin.
The location of the plugin. Make sure that the path starts with a slash character ("/").
File name (usually "plugin.js").</textarea><br><br></div>

    <input name="submit" type="submit" value="готово"/>
</form>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>

<script>
    $(document).ready(function () {


        //Настройки для simple editor
        var simple_area = $(".simpleArea");

        $( simple_area ).ckeditor({

            uiColor: '#ffffff',
            toolbar : [

                [ 'Bold', 'Italic', 'Underline', 'Strike' ]
                ,
                [ 'NumberedList','BulletedList']
                ,
                [ 'Link', 'Image', "Youtube", "Smiley"]
                ,
                ['Maximize','ShowBlocks']

            ]


        });


        //---------------------------------------

//Настройки для full editor
        var full_area = $(".fullArea");

        $( full_area ).ckeditor({

            uiColor: '#ffffff'/*,
             toolbar : [

             [ 'Bold', 'Italic', 'Underline', 'Strike' ]
             ,
             [ 'NumberedList','BulletedList']
             ,
             [ 'Link', 'Image']
             ,
             ['Maximize','ShowBlocks']
             ]*/

        });


    }); //Конец Ready
</script>

</body>
</html>

