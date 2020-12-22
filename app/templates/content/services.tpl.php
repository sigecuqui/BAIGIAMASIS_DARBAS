<?php foreach($data['fields'] as $field): ?>
    <div>
        <?php print $field['individual']; ?>
    </div>
    <div>
        <?php print $field['group']; ?>
    </div>
    <div>
        <?php print $field['consult']; ?>
    </div>
<?php endforeach; ?>