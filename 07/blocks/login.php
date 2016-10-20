<?php

?>

    <section id = "login">

    <h2>"Login"</h2>

     <div class="responseFromDb"></div>

        <?  if ($responcefromDB ["error"]){?>
         <div class="error"> <? echo $responcefromDB ["error"] ?> </div>
       <? } ?>

    <? if ($responcefromDB ["succes"]) {?>
        <div class="succes">

            Добро пожаловать пользователь.

            <a href="index.php?r=login">Back to main menu</a>

        </div>
        <? } ?>
        form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
        <input type="hidden" name="method_name" value="Login">

        <input type="text" name="login" value="" placeholder="login"/><br><br>
        <input type="password" name="pass" value="" placeholder="password"/><br><br>

        <input name="submit" type="submit" value="register now"/>
        </form>

    </section>