<?php

    foreach($topics as $topic) { 
        if(!empty($topic['translations'])){ ?>
        <div class="table-wrapper">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th class="topic hide-content" colspan="4"><?= $topic['name'] ?></th>
                    </tr>
                    <tr>
                        <th>English</th>
                        <th>Spanish</th>
                        <th>Example</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($topic['translations'] as $translation) { ?>
                    <tr>
                        <td class="clickable"><?= $translation['english'] ?></td>
                        <td class="hide"><?= $translation['spanish'] ?></td>
                        <td class="example" data-desc="<?= $translation['example'] ?>">
                            <button> show </button>
                            <input type="checkbox" data-id="<?= $translation['id'] ?>" value="1" <?= $translation['forgot'] ? "checked" : "" ?> >
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php 
        }
    }
    ?>