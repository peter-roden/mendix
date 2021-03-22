<style>
  <?php include_once('ui/css/cta-sign-up-drop-in.css'); ?>
</style>

<?php
/**
 * @param {string} $header
 * @param {string} $subheader
 * @param {string} $button_text 
 * @param {string} $button_text_small Alternate text for buttons that shows on small Foundation small only.
 */
function cta_drop_in($link, $header, $subheader, $button_text, $button_text_small = '') { 
  if ($button_text_small === '') {
    $button_text_small = $button_text;
  }
  ?>

  <aside class="cta-dropdown">
  <div class="row align-justify large-align-center align-middle">
    <div class="pl1 cta-dropdown__text">
      <h1 class="cta-dropdown__header copy-sm medium-copy blue large-inline-block"><?php echo $header; ?></h1>
      <p class="cta-dropdown__copy copy-xs show-for-medium large-inline-block large-pl50"><?php echo $subheader; ?></p>
    </div>
    <div class="pr1 large-pl3 cta-dropdown__button">
      <a href="<?php echo $link; ?>" class="btn btn-sm green show-for-small-only">
        <?php echo $button_text_small; ?>
      </a>
      <a href="<?php echo $link; ?>" class="btn btn-tight green show-for-medium">
        <?php echo $button_text; ?>
      </a>
    </div>
  </div>
  </aside>
<?php } ?>

<script src="/ui/js/cta-drop-in.min.js"></script>
