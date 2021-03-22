$.isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

/**
 * window
 */
@import './window/_openA11yDialog.js'
@import './window/_window.mx.js'
@import './window/_convertToSlug.js'
@import './window/_getURLParameter.js'

/**
 * DOMContentLoaded / $(document).ready()
 */
@import './site/_aos.js'
@import './site/_dataLayer.js'
@import './site/_foundation-init.js'
@import './site/_infiniteScroll.js'
@import './site/_language-dialog.js'
@import './site/_logoTicker.js'
@import './site/_magnificPopup.js'
@import './site/_pb_dropdown.js'
@import './site/_rotatedTerms.js'
@import './site/_smoothScrolling.js'
@import './site/_swapping-words.js'
@import './site/_tabs.js'

/**
 * window.load
 */
@import './site/_launchLightbox.js';