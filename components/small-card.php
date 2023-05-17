<div class="brinpl-small-card img-shadow">
    <?php if ($smallCardImage) { ?>
        <div class="img-wrapper">
            <img src="<?= $smallCardImage["sizes"]["medium"]; ?>" alt="<?= $smallCardImage["alt"]; ?>" class="absolute-cover-img">
        </div>
    <?php } if ($smallCardTitle) { ?>
        <h4 class="brinpl-small-card-title contacts-text text-center"><?= $smallCardTitle; ?></h4>
    <?php } ?>
</div>