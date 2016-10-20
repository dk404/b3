<?php

?>

<section id="login">

    <h2>"Login"</h2>

    <div class="responseFromDb">

        <?  if ($responseFromDb["error"]){?>
            <div class="error"> <? echo $responseFromDb["error"] ?> </div>
        <? } ?>

        <? if ($responseFromDb["succes"]) {?>
            <div class="succes">

                Добро пожаловать <? echo $responseFromDb["succes"][0]["user_name"] ?>.

                <a href="index.php?r=login">Back to main menu</a>

            </div>
        <? } ?>
    </div>

    <br><br>

    <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
        <input type="hidden" name="method_name" value="login">

        <input type="text" name="login" value="" placeholder="login"/><br><br>
        <input type="password" name="pass" value="" placeholder="password"/><br><br>

        <input name="submit" type="submit" value="sign in"/>
    </form>

</section>