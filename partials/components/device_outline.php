<?php while(have_rows('device_outline_group')): the_row();

	$type = get_sub_field('type'); 
	$device_outline = new DeviceOutline;
	
	switch (strtolower($type)){
		case 'laptop': 
			$device_outline->outline(DeviceOutline::LAPTOP);
		break; 
		case 'mobile': 
			$device_outline->outline(DeviceOutline::MOBILE);
			break; 
		case 'tablet': 
			$device_outline->outline(DeviceOutline::TABLET);
			break; 
	}

	if (is_subfield_set('device_outline_video', ['id'])) {
		the_vidyard_link(get_sub_field('id')); 
	}

endwhile;