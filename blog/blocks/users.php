<?php
    $userList = $DB->select("SELECT ID, user_name FROM users ORDER BY user_name ASC")["result"];
?>


<section id="users">
    <h3>Пользователи:</h3>
    <? if($userList){ ?>
        <table class="usersTable">
            <thead>
            <th>id</th>
            <th>userName</th>
            </thead>
            <tbody>
            <? foreach ($userList as $item) { ?>
                <tr>
                    <td style="width: 35px;"><b><? echo $item["ID"] ?></b></td>
                    <td><? echo $item["user_name"] ?></td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    <? }else{ ?>

        <h4>Пользователей нет</h4>

    <? } ?>
</section>