<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class MarketoForm extends Row
{
    private static $form_count = 0;
    public function open()
    {
        echo '<div class="grid-container">';
        $this->open_elements[] = 'div';
    }

    public function add()
    {
        if ($formId = get_sub_field('formId')) {
			self::$form_count++;
			$form_success_heading = get_sub_field('thank_you_heading') ?
				get_sub_field('thank_you_heading') : 
				pll__('Thank You');
			?>
            <script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
            <div class="ph2">
                <form id="mktoForm_1934" class="mt2"></form>
            </div>
			
			<script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    MktoForms2.loadForm("//ww2.mendix.com", "<?= $formId ?>", 1934, function(form){
                        //clear styles, and set first/last name inputs up
                        //to be displayed at 50% on tablet+ size screens.
                        window.removeMarketoStyles($('#mktoForm_1934'), MktoForms2, form);
                        //Add an onSuccess handler
                        form.onSuccess(function(values, followUpUrl){
                            dataLayer.push({'event': 'DemoSignupThankYou'});
                            window.openA11yDialog('#formSuccessDialog<?= self::$form_count ?>');

                            return false;
                        });
						window.fillMarketoFields();
					});
				});						
			</script>
			
			<aside id="formSuccessDialog<?= self::$form_count ?>" class="mfp-hide" aria-hidden="true">
				<div tabindex="-1" data-a11y-dialog-hide style="width: 100%; height: 100%;"></div>
				<div role="dialog" aria-labelledby="dialogHeading" class="a11y-dialog__modal">
                    <div role="document">
                        <button class="mfp-close" type="button" data-a11y-dialog-hide aria-label="Close this dialog window">
                            <span aria-hidden="true">×</span>
                        </button>
                        <main>
                          
                        </main>
                    </div>
                </div>
			</aside>

			<aside class="reveal" id="formSuccessDialog<?= self::$form_count ?>" aria-labelledby="dialogHeading" data-reveal>
				<main class="text-center">

					<h2 id="dialogHeading" class="heading2">
						<?= $form_success_heading ?>
					</h2>
					
					<p class="copy mt1 mb1">
						<?=	get_sub_field('thank_you_body') ?
							get_sub_field('thank_you_body') :
							pll__('A member of our team will be in touch with you shortly.');
						?>
					</p>					
					
					<button class="close-button" data-close aria-label="<?= pll__('Close modal'); ?>" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</main>
			</aside>
			
		<?php
		}
	}
}