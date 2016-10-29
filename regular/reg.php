<?php


    $str = '<h3>Наши выпускники и сертификаты:</h3>

        <div class="wr ">
            <a href="img/graduates/1.jpg" target="_blank" style="background-image:url(img/graduates/1.jpg);"></a>
            <a href="img/graduates/2.jpg" target="_blank" style="background-image:url(img/graduates/2.jpg);"></a>
            <a href="img/graduates/3.jpg" target="_blank" style="background-image:url(img/graduates/3.jpg);"></a>
            <a href="img/graduates/4.jpg" target="_blank" style="background-image:url(img/graduates/4.jpg);"></a>
            <a href="img/graduates/5.jpg" target="_blank" style="background-image:url(img/graduates/6.jpg);"></a>

        </div>
    </section>
';


    $res = preg_replace('/([^"]+)/', '111', $str);

    exit();
    $res = preg_match_all('/href="([^"]+)/', $str, $matches, PREG_PATTERN_ORDER);

    if($matches[1])
    {
        foreach ($matches[1] as $match) {
            echo "<img src='".$match."' width='100'> <br>";
        }
    }

?>



