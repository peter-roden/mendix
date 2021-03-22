<?php 
/**
 * Check an ACF group for the required fields necessary to display. 
 * Default if (have_rows()) returns true if the group field is set, and can not be 
 * used to determine if we should show the section elements.
 * 
 * @param String $acf_group_id
 * @param Array $necessary_sub_field_ids Array of ACF sub_field IDs to check !empty 
 * @param Boolean $require_all_fields Flag for if ALL fields need to be non empty.
 */
function is_subfield_set(string $acf_group_id, $necessary_sub_field_ids, $require_all_fields = false) { 

	if ($group = get_acf_field($acf_group_id)) {
	
		$set_fields_count = 0; 
		foreach ($necessary_sub_field_ids as $field) { 
			if (!empty($group[$field])) {

				if ($require_all_fields = false) {
					return true; 
				}

				$set_fields_count++; 
			}
		}

		if ($set_fields_count == count($necessary_sub_field_ids)) {
			return true; 
		} else {
			// Debug($necessary_sub_field_ids);
		}
	} else {
		// Debug('No acf group: '. $acf_group_id);
	}

	return false; 
}

