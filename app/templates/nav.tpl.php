<nav>
    <?php foreach ($data as $ul): ?>
    <ul>
        <?php foreach ($ul as $title => $link): ?>
            <li><a href="<?php print $title; ?>"><?php print $link; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
</nav>
