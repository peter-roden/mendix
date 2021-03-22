<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class FlexibleElements
{
    /**
     * @var array $elements Collection of elements built by a FlexibleElement flexible content
     */
    private $elements = [];
    private static $form_count = 0;

    /**
     * Loop through the flexible content and build the markup for all the elements.
     *
     * @param int $heading_max Limit the heading size for this FlexibleElement collection
     */
    public function __construct(int $heading_max = 1)
    {
        global $heading_manager;
        $heading_manager->increase();

        $field_id = 'pb_flexible_elements';
        while (have_rows($field_id)): the_row();

            //element name
            $row_layout = get_row_layout();

            $classlist = ['pb_element', "pb_$row_layout"];
            $element = null;

            switch ($row_layout) {
                case 'heading':
                    if ($text = get_sub_field('text')) {
                        $element = $heading_manager->wrap_text($text, $heading_max);
                    }
                    break;

                case 'image':
                    if ($image = get_acf_image('image')) {
                        $element = $image;
                    }
                    break;

                case 'link':
                    if ($link = get_sub_field('link')) {
                        $class = null;
                        if (strtolower(get_sub_field('type')) == 'cta') {
                            $class = 'pb_link--cta';
                        }
                        $element = get_acf_link('link', ['class' => $class, 'event' => get_sub_field('attribute_event')]);
                    }
                    break;

                case 'paragraph':

                    if ($text = get_sub_field('text')) {

                        if ($column_size = get_sub_field('column_count')) {
                            array_push(
                                $classlist,
                                'column-count-'.$column_size['small'],
                                'medium-column-count-'.$column_size['medium'],
                                'large-column-count-'.$column_size['large']
                            );
                        };

                        $element = $text;
                    }
                    break;

                case 'video':
                    switch ($source = strtolower(get_sub_field('source'))) {
                        case 'vidyard':
                            $uuid = get_sub_field('vidyard_uuid');
                            break;
                        default:
                            $element = get_acf_image(
                                'video_file',
                                array(
                                    'class' => 'tab__img',
                                    'poster' => get_sub_field('poster'),
                                )
                            );
                            break;
                    }
                    break;

                case 'marketoform':

                    if ($formId = get_sub_field('marketo_form_id')) {
                        self::$form_count++;

                        if ($column_size = get_sub_field('column_count')) {
                            array_push(
                                $classlist,
                                'column-count-'.$column_size['small'],
                                'medium-column-count-'.$column_size['medium'],
                                'large-column-count-'.$column_size['large']
                            );
                        };

                        $element = $this->get_form_markup(
							$formId, 
							get_sub_field('thank_you_heading') ?: pll__('Thank You'),
							get_sub_field('thank_you_body') ?: pll__('A member of our team will be in touch with you shortly.')
						);
                    }
                    break;

                default:
                    debug("No element switch for $row_layout");
                    break;
            }

            $classes = implode(' ', $classlist);
            $markup = "<div class='$classes'>$element</div>";

            $this->elements[] = [
                'type'=> $row_layout,
                'markup'=> $markup,
            ];

        endwhile;

        $heading_manager->decrease();
    }

    /**
     * Check if this is a single image element
     * @return bool
     */
    public function is_image_column() : bool
    {
        if (count($this->elements) == 1) {
            return $this->elements[0]['type'] == 'image';
        }

        return false;
    }

    /**
     * Return the value from the key 'markup' within the elements
     * @param array $array The elements array
     */
    private function get_markup_key(array $array) {
        if (!empty($array['markup'])) {
            return $array['markup'];
        }

        return '';
    }

    /**
     * Display marketo form
     *
     * @return string
     */
    private function get_form_markup(string $formId, string $heading, string $body) : string {
        ?>
        <script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function(event) {
            MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", <?= $formId ?>, function(form) {
              //clear styles, and set first/last name inputs up
              //to be displayed at 50% on tablet+ size screens.
              window.removeMarketoStyles($('#mktoForm_<?= $formId ?>'), MktoForms2, form);
              //Add an onSuccess handler
              form.onSuccess(function(values, followUpUrl){
                  dataLayer.push({'event': 'CloudContactThankYou'});
                  window.openA11yDialog('#formSuccessDialog');
                  return false;
              });
              window.fillMarketoFields();
            });
          });
		</script>
		

		<aside class="reveal" id="formSuccessDialog" aria-labelledby="dialogHeading" data-reveal>			
			<main class="text-center">
				
				<h2 id="dialogHeading" class="heading2"><?= $heading ?></h2>
				<p class="copy mt1 mb1"><?= $body ?></p>
				
			</main>

			<button class="close-button" data-close aria-label="<?= pll__('Close modal'); ?>" type="button">
				<span aria-hidden="true">&times;</span>
			</button>
		</aside>
		
        <?php
        return "<div class='ph2'><form id='mktoForm_$formId' class='mt2'></form></div>";
    }

    /**
     * Retrieve and concatenate markup for the elements stored
     * in the $elements array
     *
     * @return string
     */
    public function output(): string
    {
        $elements_markups = array_map(array($this, 'get_markup_key'), $this->elements);
        return implode('', $elements_markups);
    }
}