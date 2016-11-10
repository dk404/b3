<header>
    <nav>
        <ul>
            <li>
                <a href="index.php">HOME</a>
            </li>
            <li>
                <a href="index.php?r=users">USERS</a>
            </li>
            <li>
                <a href="blog.php">BLOG</a>
            </li>
        </ul>
    </nav>
    <div class="authBlock">
        <? if(!$auth){ ?>
        <a href="index.php?r=login">Login</a>
        <a href="index.php?r=register">Register</a>
        <? }else { ?>
        <a href="index.php?r=logout">Logout</a>
        <? } ?>
    </div>
</header>
