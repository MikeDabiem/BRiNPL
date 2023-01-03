<?php
    require "db.php";
    if ($whatwedo_tabs) {
        foreach ($whatwedo_tabs as $tab) {
?>
<div class="whatwedo__content-item" id="<?php echo $tab["id"]; ?>">
    <div class="whatwedo__content-col1 wysiwyg-styles">
        <h4 class="whatwedo__content-title tab-title font-bold"><?php echo $tab["title"]; ?></h4>
        <p class="whatwedo__content-text font-medium"><?php echo $tab["text"]; ?></p>
    </div>
    <?php
        if (count($tab["images"]) === 2) {
            $img_class = "whatwedo__content-2images";
        } else if (count($tab["images"]) === 3) {
            $img_class = "whatwedo__content-3images";
        } else {
            $img_class = "";
        }
    ?>
    <div class="whatwedo__content-col2 wysiwyg-styles <?php echo $img_class ?>">
        <?php
            foreach ($tab["images"] as $img) { ?>
                <div class="img-shadow img-wrapper">
                    <img src="images/<?php echo $img; ?>" alt="thumbnail" class="whatwedo__content-img absolute-cover-img">
                </div>
            <?php }
        ?>
    </div>
</div>
<?php }}