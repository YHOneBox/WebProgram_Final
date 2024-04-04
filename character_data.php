<?php require_once "class_character.php" ?>
<div>
    <?php echo Character::getCharacterImg(); ?>
    <div id = dialogFrame class = dialogFrame>
        <!-- <img id = "dialogFrame" src = "image/dialog_frame.png" alt = "dialog_frame"> -->
        <div class = "center"><?php echo $data ?></div>
    </div>
</div>