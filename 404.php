<?php 
/**
 *
 */

get_header(); ?>

<div class="grid-container grid-x pt5 align-center">
  <div class="cell medium-9 large-7 text-center">
    <h1 class='visually-hidden'>404: Page not found</h1>
    <p class="heading2">All these pages, yet we can’t find the one you’re looking for.</p>
  </div>
  <div class="cell medium-9 large-6">
    <p class="mt2 copy">Sorry about that. You can either <a href="javascript:goBack()">go back</a> to your previous page or use the search function up in the header of our website.</p>
  </div>
</div>

<div class="text-center pv3">
  <img src="/wp-content/uploads/mobile-404.svg'" alt="404 Error">
</div>

<script>
  function goBack() {
    var lastURL = (window.history && window.history.previous) ? window.history.previous.href : false;
    if (lastURL && lastURL.indexOf('mendix') > -1) {
      window.history.back();
    } else {
      window.location.replace("https://www.mendix.com/");
    }
  }
  dataLayer.push({'event': '404Error'});
</script>

<?php get_footer(); ?>
