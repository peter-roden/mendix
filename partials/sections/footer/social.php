<div class="cell mt1 mb1 large-mb0 large-auto large-order-2">
	<?php if (get_current_language() <> LANGUAGE_CODE_CHINESE): ?>
      <h3 class="visually-hidden"><?= pll__('Social Links'); ?></h3>

      <ul class="cell shrink flex-container align-middle large-align-right">
          <li>
              <a class="social-svg" href="https://www.youtube.com/channel/UCM8pMKzsNP9sQ0IoANQ7FBg" target="_blank" rel="noopener">
                  <?php readfile(get_template_directory().'/ui/logos/youtube.svg'); ?>
              </a>
          </li>

          <li>
              <a class="social-svg" href="https://www.instagram.com/mendixinc/" target="_blank" rel="noopener">
                  <?php readfile(get_template_directory().'/ui/logos/instagram.svg'); ?>
              </a>
          </li>

          <li>
              <a class="social-svg" href="http://www.linkedin.com/company/mendix" target="_blank" rel="noopener">
                  <?php readfile(get_template_directory().'/ui/logos/linkedin.svg'); ?>
              </a>
          </li>

          <li>
              <a class="social-svg" href="https://www.facebook.com/mendixsoftware" target="_blank" rel="noopener">
                  <?php readfile(get_template_directory().'/ui/logos/facebook.svg'); ?> 
              </a>
          </li>

          <li>
              <a class="social-svg" href="https://twitter.com/mendix" target="_blank" rel="noopener">
                  <?php readfile(get_template_directory().'/ui/logos/twitter.svg'); ?>
              </a>
          </li>
      </ul>
    <?php endif;?>
</div>