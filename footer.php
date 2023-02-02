    <footer class="footer">
        <div class="wrapper d-flex justify-content-between align-items-center">
            <?php $footerCopyright = get_field("footer_copyright", "options");
            if($footerCopyright) { ?>
                <span class="copyright"><?php echo $footerCopyright; ?></span>
            <?php }
            $privPolID = get_field("privacy_policy_page", "options");
            if ($privPolID) {
                $privPolTitle = get_the_title($privPolID);
                $privPolLink = get_permalink($privPolID); ?>
                <a href="<?= $privPolLink; ?>" target="_blank" class="privacy-link transition-default"><?= $privPolTitle; ?></a>
            <?php } ?>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>