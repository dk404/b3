$(document).ready(function () {


    $(".fullArea").ckeditor();

    $(".simpleArea").ckeditor({
        //uiColor: '#ffffff',
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


}); //Конец Ready