<header>
    <nav>
        <ul class="nav_left">
            <?php foreach ($data as $title => $link): ?>
                <?php if ($link == 'Home' || $link == 'Feedback'): ?>
                    <li><a href="<?php print $title; ?>"><?php print $link; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <ul class="nav_right">
            <?php foreach ($data as $title => $link): ?>
                <?php if ($link == 'Logout' || $link == 'Register' || $link == 'Login'): ?>
                    <li><a href="<?php print $title; ?>"><?php print $link; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
