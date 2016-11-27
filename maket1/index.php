<?
require_once "autoload.php";

$PATH = new library\Path();

echo $PATH->clear_url("/maket1/");

?>

   


<!-- todo: Что необходимо сделать?
    Задача: создать из этого статического макета - динамический
     1. Перевести из html в php
     2. Разбить страницу на части
     3. Скопировать библиотеки
     4. Создать необходимые таблицы в бд
     5. Создать админ страницы для управления информацией "этих" частей
-->


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Backend для макета (Сам работа)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>
        <header>
            <div id="logo"></div>

            <ul id="menu">
                <li><a href="#" class="active">home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">service</a></li>
                <li><a href="#">projects</a></li>
                <li><a href="#">contacts</a></li>
            </ul>
            <div class="clear"></div>

        </header>

        <section class="slider">
            <div class="photo"></div>
            <div class="info">
                <ul class="info-list">
                    <li><span>Property type:</span><span>56m</span></li>
                    <li><span>Address:</span><span>56m</span></li>
                    <li><span>Land Area:</span><span>56m</span></li>
                    <li><span>Year Build:</span><span>56m</span></li>
                    <li><span>Building Size:</span><span>56m</span></li>
                    <li><span>Construction:</span><span>56m</span></li>
                    <li><span>Bath:</span><span>56m</span></li>
                    <li><span>Beds:</span><span>56m</span></li>
                    <li><span>Parking:</span><span>56m</span></li>
                </ul>
                <div class="total">$1099'99</div>
                <ul class="counters">
                    <li><a href="#" class="active"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
                <a href="#" class="more-info">More info</a>
            </div>
            <div class="clear"></div>
        </section>

        <section class="others-items">
            <section>
                <h1>residental</h1>
                <div class="bg" style="background-image:url(http://www.projekulisi.com/img/haber/7406.jpg);"></div>
                <div class="more"><a href="#">More info</a></div>
            </section>
            <section>
                <h1>commercial</h1>
                <div class="bg" style="background-image:url(http://bamo.ru/wp-content/uploads/2014/06/nedvizhimost-na-kipre-272x200.jpg);"></div>
                <div class="more"><a href="#">More info</a></div>
            </section>
            <section>
                <h1>luxury</h1>
                <div class="bg" style="background-image:url(http://brigantina.eu/wp-content/uploads/2015/06/spain_aparts-320x202.jpg);"></div>
                <div class="more"><a href="#">More info</a></div>
            </section>
        </section>


        <section class="others-items">
            <section class="services">
                <h1>services</h1>
                <ul class="service-list">
                    <li><a href="#"><span class="S-1">g</span> Lorem.</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem ipsum.</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem ipsum dolor.</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem  sit.</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem </a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem  .</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem   adipisicing.</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem   adipisicing elit.</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem ipsum dolor sit amet, consectetur.</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem   adipisici</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem   adipisicin perferendis?</a></li>
                    <li><a href="#"><span class="S-1">g</span> Lorem   adipisicing  odio veritatis!</a></li>
                </ul>

                <div class="more"><a href="#">More info</a></div>
            </section>
            <section class="welcome">
                <h1>welcome</h1>
                <div class="bg" style="background-image:url(http://bamo.ru/wp-content/uploads/2014/06/nedvizhimost-na-kipre-272x200.jpg);"></div>
                <p class="forText">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore Lorem ipsum dolor sit amet..</p>
                <p class="forText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quia.</p>

                <div class="more"><a href="#">More info</a></div>
            </section>
            <section class="news">
                <h1>news</h1>
                <ul class="news-list">
                    <li>
                        <a href="#" class="for-photo" style="background-image:url(http://board.od.ua/uploads/aimages/large/630/629545-707810.jpg);"></a>
                        <div class="for-desc">
                            <div class="date"><span>Mart 09</span></div>
                            <p class="forText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum illo sequi voluptatibus.</p>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <a href="#" class="for-photo" style="background-image:url(http://board.od.ua/uploads/aimages/large/630/629545-707810.jpg);"></a>
                        <div class="for-desc">
                            <div class="date"><span>Mart 09</span></div>
                            <p class="forText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi officiis quisquam tempore.</p>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <a href="#" class="for-photo" style="background-image:url(http://board.od.ua/uploads/aimages/large/630/629545-707810.jpg);"></a>
                        <div class="for-desc">
                            <div class="date"><span>Mart 09</span></div>
                            <p class="forText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam commodi cupiditate velit!</p>
                        </div>
                        <div class="clear"></div>
                    </li>
                </ul>

                <div class="more"><a href="#">More info</a></div>
            </section>

        </section>




        <footer>
            <section>ARCHITECTURE.COM &copy; 2016 &#x25CF; <a href="#" class="email">USER@MAIL.COM</a></section>
            <section>RSS SUBMIT<a href="#" class="S-4 rss">r</a></section>
            <div class="clear"></div>
        </footer>
    </main>

</body>
</html>