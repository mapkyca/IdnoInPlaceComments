<?php
    
    $user = \Idno\Core\site()->session()->currentUser();
    
    if (!empty($vars['object'])) {
        $user = $vars['object']->getOwner();
    }
    
    if (!empty($user)) {
        $name = $user->title;
        $email = $user->email;
    }

    
?>
<form action="<?= \Idno\Core\site()->config()->url; ?>comments/edit" method="post">
    <div class="comments-form">

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
        <p>
            <label>
                Comment:<br />
                <textarea name="comment" id="comment" class="span8 bodyInput"><?=htmlspecialchars($vars['object']->comment)?></textarea>
            </label>
        </p>
        <p>
            <input type="hidden" name="entity_id" id="entity_id" value="<?= $vars['object']->uuid; ?>" />
            
            <?= \Idno\Core\site()->actions()->signForm('/comments/edit') ?>
            <input type="submit" class="btn btn-primary" value="Save" />
        </p>
        
    </div>
</form>
