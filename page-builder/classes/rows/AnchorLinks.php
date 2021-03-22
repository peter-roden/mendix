<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class AnchorLinks extends Row
{
    public function open()
    {
    ?>
        <nav class='pb-tab-nav show-for-large'>
            <h2 class="show-for-sr">Anchor links</h2>
		    <ul class='grid-container grid-x'>
    <?php
        $this->open_elements[] = 'nav';
        $this->open_elements[] = 'ul';
    }

    public function add()
    {
        if (have_rows('links')): the_row(); $current_anchor = 0;
            while (have_rows('links')): the_row();
    ?>
                <li class="cell auto pb-tab-nav__link <?= $current_anchor == 0 ? 'selected' : '' ?>">
                <?= the_acf_link('link') ?></li>
        <?php
            $current_anchor++;
            endwhile;
        endif;
    }
}