<?php if ($what = get_field('what')): ?>
<section id="careersWhat" class="mt3 medium-mt1 mb3 medium-mb4">

    <div class="grid-container">

        <div class="grid-x grid-padding-x align-middle">

            <div class="cell medium-6 copy small-only-mb3">
                <?= $what['copy']; ?>
            </div>

            <div class="cell medium-5 medium-offset-1">
                <blockquote class="heading3 mb1"><?php echo wrap_with_quotation_marks($what['quote']['the_quote']); ?></blockquote>
                <p class="normal7"><?= $what['quote']['attribution']; ?></p>
            </div>

        </div>

    </div>

</section>
<?php endif; ?>