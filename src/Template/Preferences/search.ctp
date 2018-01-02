<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 17.12.17
 * Time: 19:18
 */
?>

<?php foreach($entities as $entity): ?>
    <tr>
        <td><?= $entity->label ?></td>
        <td><?= $entity->artist->label ?></td>
            <td>
                <?= $this->Form->create($entity,['url'=> ['action' => 'add']]); ?>
                <?= $this->Form->hidden('id_musicbrainz'); ?>
                <?= $this->Form->hidden('label'); ?>
                <?= $this->Form->hidden('artist.label'); ?>
                <?= $this->Form->hidden('artist.id_musicbrainz'); ?>
                <button type="submit" id="add_button" class="btn btn-action fa fa-plus-square-o" aria-hidden="true"</button>
                <?= $this->Form->end(); ?>
            </td>

    </tr>
<?php endforeach; ?>
