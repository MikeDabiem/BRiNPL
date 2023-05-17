<section class="faq wrapper">
    <?php if ($faqTitle) { ?>
        <h3 class="section-title font-bold text-center"><?= $faqTitle; ?></h3>
    <?php } if ($faqSubtitle) { ?>
        <div class="faq__subtitle wysiwyg-styles text-center small-title font-medium">
            <?= $faqSubtitle; ?>
        </div>
    <?php } if ($faqItem) { ?>
        <div class="faq__items">
            <?php foreach($faqItem as $faq_item) {
                if ($faq_item["faq_question"] && $faq_item["faq_answer"]) { ?>
                    <article class="faq__item img-shadow">
                        <h4 class="faq__item-question font-bold transition-default"><?= $faq_item["faq_question"]; ?></h4>
                        <div class="faq__item-answer wysiwyg-styles"><?= $faq_item["faq_answer"]; ?></div>
                    </article>
                <?php }
            } ?>
        </div>
    <?php } ?>
</section>