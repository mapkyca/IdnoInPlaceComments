<?php
    
    $user = \Idno\Core\site()->session()->currentUser();
    
    if (!empty($user)) {
        $name = $user->title;
        $email = $user->email;
    }

    
?>
<form action="<?= \Idno\Core\site()->config()->url; ?>comments/edit" method="post">
    <div class="comments-form">

        <?php if (empty($user)) { ?>
        <p>
            <label>
                Name:<br />
                <input type="text" name="name" id="name" value="<?=htmlspecialchars($name)?>" class="span8" />
            </label>
        </p>
        <p>
            <label>
                Email address (will not be shown):<br />
                <input type="email" name="email" id="email" value="<?=htmlspecialchars($email)?>" class="span8" />
            </label>
        </p>
        <?php } ?>
        
        <p>
            <label>
                Comment:<br />
                <textarea name="comment" id="comment" class="span8 bodyInput"><?=htmlspecialchars($vars['object']->comment)?></textarea>
            </label>
        </p>
        <p>
            <input type="hidden" name="entity_uuid" id="entity_uuid" value="<?= $vars['object']->uuid; ?>" />
            <?php if (!empty($user)) {
               ?>
                <input type="hidden" name="user_uuid" id="user_uuid" value="<?= $user->uuid; ?>" />
            <?php
            }?>
            
            <?= \Idno\Core\site()->actions()->signForm('/comments/edit') ?>
            <input type="submit" class="btn btn-primary" value="Save" />
        </p>
        
    </div>
</form>
