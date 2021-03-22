<?php 
/**
 * @param {String} $image 
 * @param {String} $text 
 * @param {String} $icon 
 * @param {String} $content_type 
 * @param {String} $link 
 * @param {String} $cta_text
 */
function cta_card($image, $text, $link, $icon, $content_type, $cta_text) { ?>
<a href="<?php echo $link; ?>" class="grid-x collapse align-middle cta-card">


    <div class="cell small-4 medium-3 ph1">
      <?php echo $image; ?> 
    </div>
    <div class="cell small-8 medium-9 ph1">
      <div class="copy cta-card__link heading6">
        <?php echo $text; ?>
      </div>
      <!-- <div class="mt1 copy-sm">
        <span class="cta-card__icon">
        <?php switch (strtolower($icon)) {
		  case "analyst report":
		  case "case study":
		  case "data sheet":  
		  case "white paper":
          echo "<img src='/ui/svg/analystreport-icon.svg' alt='Report'>";
          break;
        case "blog":
          echo "<img width='20' src='https://www.mendix.com/wp-content/uploads/icon-blog.svg' alt='Newspaper'>";
          break;
        case "ebook":
          echo "<img width='20' src='https://www.mendix.com/wp-content/uploads/ebook-icon.svg' alt='Book'>";
          break;
        case "video":
          echo "<span class='icon-video' alt='Projector'></span>";
          break;
        case "infographic":
          echo "<span class='icon-infographic' alt=''></span>";
          break;
        case "slideshow":
          echo "<span class='icon-slideshow' alt='Slide deck'></span>";
          break;
        case "webinar":
          echo "<span class='icon-webinar' alt=''></span>";
          break;
        default: 
          echo $icon;  
          break;
        } ?>
        </span>
        <span class="cta-card__title ml25">
          <?php echo $content_type; ?>
        </span>
        <?php ///echo $cta_text; ?>
      </div> -->
    </div>
  </a> 
<?php } ?>

<?php queue_non_critical_css( get_template_directory_uri().'/ui/css/partials/cta-card.min.css') ?>