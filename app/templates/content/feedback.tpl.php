<h2 class="title"><?php print $data['title'] ?></h2>

<?php print $data['table']; ?>

<!-- Create form can be pre-rendered -->
<?php if (isset($data['forms']['create'])): ?>
    <div>
        <?php print $data['forms']['create']; ?>
    </div>
<?php endif; ?>

<?php if ($data['message']): ?>
    <h4><?php print $data['message']; ?></h4>
<?php endif; ?>

<?php foreach ($data['links'] as $link): ?>
    <?php print $link; ?>
<?php endforeach; ?>