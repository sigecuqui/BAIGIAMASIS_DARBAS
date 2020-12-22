<header>
    <nav>
        <?php foreach ($data as $ul): ?>

            <ul>
                <?php foreach ($ul as $link => $title): ?>

                    <li><a href="<?php print $link; ?>" class="<?php $_SERVER['REQUEST_URI'] == $link ?
                            print 'active' : ''; ?>"><?php print $title; ?></a></li>

                <?php endforeach; ?>
            </ul>

        <?php endforeach; ?>
    </nav>
</header>
