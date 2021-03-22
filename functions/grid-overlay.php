<?php if (is_user_logged_in() && strpos($_SERVER["QUERY_STRING"], 'grid') !== false) {
    wp_register_style('grid-overlay', get_template_directory_uri() . '/ui/css/partials/grid-overlay.min.css');
    wp_enqueue_style('grid-overlay');

    /**
     * Echos the markup for a grid overlay development tool.
     *
     * The overlay matches the Foundation grid being used, with 1rem cell padding.
     * It displays as a 12 column grid, matching the grid used in Sketch by the design team.
     *
     * Below the medium break point is shows only 6 columns, which is an arbitrary decision by me
     * since the medium size is, sort of, the "lost" design area in our comps
     *
     * Below the small breakpoint, three columns are shown, which does match the way our
     * design team generlaly lays out items at that size.
     *
     * @author Matthew Szklarz <mszklarz@gmail.com>
     *
     * @return void
     */
    function add_grid_overlay()
    {
        echo "<div class='grid-check'>
			<div class='grid-container grid-x collapse hide-for-medium'>
				<div class='cell small-4 grid-check__cell'></div>
				<div class='cell small-4 grid-check__cell'></div>
				<div class='cell small-4 grid-check__cell'></div>
			</div>

			<div class='grid-container grid-x collapse show-for-medium-only'>
				<div class='cell small-2 grid-check__cell'></div>
				<div class='cell small-2 grid-check__cell'></div>
				<div class='cell small-2 grid-check__cell'></div>
				<div class='cell small-2 grid-check__cell'></div>
				<div class='cell small-2 grid-check__cell'></div>
				<div class='cell small-2 grid-check__cell'></div>
			</div>

			<div class='grid-container-16'>
				<div class='grid-container'></div>
			</div>

			<div class='grid-container grid-x collapse show-for-large'>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>
				<div class='cell small-1 grid-check__cell'></div>

			</div>
		</div>";
    }
}
