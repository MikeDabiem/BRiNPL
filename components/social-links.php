<div class="brinpl-social d-flex">
    <?php require "db.php";
    if ($socials) {
        foreach ($socials as $social) { ?>
            <a href="#" class="<?php echo $social; ?>" target="_blank"><?php echo $social; ?></a>
        <?php }
    } ?>
</div>