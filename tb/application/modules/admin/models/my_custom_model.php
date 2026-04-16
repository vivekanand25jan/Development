<?php
class My_Custom_model extends grocery_CRUD_Model  {
 
    function get_relation_n_n_unselected_array($field_info, $selected_values)
    {
		$results_array = array('aaa' => 'xxx', 'bbb' => 'zzz');
		return $results_array;
		//file_put_contents('test.txt', 'aaa');
		/*print_r($field_info);
		print_r($selected_values); 
		file_put_contents('test.txt',json_encode($field_info));
		
		exit;
        /*$selection_primary_key = $this->get_primary_key($field_info->selection_table);
 
        if($field_info->name = '....')

        {
            $this->db->where(....);
            .......your custom queries
        }
 
        $this->db->order_by("{$field_info->selection_table}.{$field_info->title_field_selection_table}");

        $results = $this->db->get($field_info->selection_table)->result();

 
        $results_array = array();
        foreach($results as $row)

        {
            if(!isset($selected_values[$row->{$field_info->primary_key_alias_to_selection_table}]))
                $results_array[$row->{$field_info->primary_key_alias_to_selection_table}] = $row->{$field_info->title_field_selection_table}; 
        }

 
        return $results_array;*/        
    }
 
}  