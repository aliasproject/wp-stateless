<?php
/**
 * Plugin Name: Easy Digital Downloads
 * Plugin URI: https://wordpress.org/plugins/easy-digital-downloads/
 *
 * Compatibility Description: 
 *
 */

namespace wpCloud\StatelessMedia {

    if(!class_exists('wpCloud\StatelessMedia\GravityForm')) {
        
        class GravityForm extends ICompatibility {
            protected $id = 'gravity-form';
            protected $title = 'Gravity Form File Upload';
            protected $constant = 'WP_STATELESS_COMPATIBILITY_GF';
            protected $description = 'Ensures compatibility with Gravity Form File Upload field.';

            public function module_init($sm){
                // add_filter( 'gform_upload_path', array($this, 'gform_upload_path'), 10, 2 );
                do_action('sm:sync::register_dir', '/gravity_forms/');
                add_filter( 'gform_save_field_value', array($this, 'gform_save_field_value'), 10, 5 );
                add_action( 'sm::synced::nonMediaFiles', array($this, 'modify_db'), 10, 3);

                add_action( 'gform_file_path_pre_delete_file', array($this, 'gform_file_path_pre_delete_file'), 10, 2);
            }
            
            
            /**
             * 
             *
             * @param $value
             * @param $lead
             * @param $field
             * @param $form
             * @param $input_id
             */
            public function gform_save_field_value( $value, $lead, $field, $form, $input_id ) {
                $type = \GFFormsModel::get_input_type($field);
                if($type == 'fileupload'){
                    $dir = wp_upload_dir();
                    $position = strpos($value, 'gravity_forms/');

                    if( $position !== false ){
                        $name = substr($value, $position);
                        $absolutePath = $dir['basedir'] . '/' .  $name;
                        do_action( 'sm:sync::syncFile', $name, $absolutePath);
                        $value = ud_get_stateless_media()->get_gs_host() . '/' . $name;
                    }
                }
                else if($type == 'post_image'){
                    add_action( 'gform_after_create_post', function($post_id, $lead, $form) use ($value, $field){
                        global $wpdb;
                        $dir = wp_upload_dir();
                        $lead_detail_id         = $lead['id'];
                        $gf_upload_root        = \GFFormsModel::get_upload_root();
                        $gf_upload_url_root    = \GFFormsModel::get_upload_url_root();
                        $lead_detail_table      = \GFFormsModel::get_lead_details_table_name();

                        $position = strpos($value, 'gravity_forms/');
                        $_name = substr($value, $position);
                        $arr_name = explode('|:|', $_name);
                        $name = rgar( $arr_name, 0 );
                        
                        do_action( 'sm:sync::syncFile', $name, $dir['basedir'] . '/' .  $name);

                        $value = ud_get_stateless_media()->get_gs_host() . '/' . $_name;
                        
				        $result = $wpdb->update( $lead_detail_table, array( 'value' => $value ), array( 'lead_id' => $lead_detail_id, 'form_id' => $form['id'], 'field_number' => $field['id'], ), array( '%s' ), array( '%d' ) );
                    }, 10, 3);
                }
                return $value;
            }

            public function modify_db( $file_path, $fullsizepath, $media ){
                global $wpdb;
                $position = strpos($file_path, 'gravity_forms/');
                $is_index = strpos($file_path, 'index.html');

                if( $position !== false && !$is_index ){
                    $file_path = trim($file_path, '/');
                    
                    $file_url = ud_get_stateless_media()->get_gs_host() . '/' . $file_path;
                    $query = sprintf(
                        "
                        UPDATE {$wpdb->prefix}rg_lead_detail
                        SET value = '%s'
                        WHERE value like '%s'
                        "
                        , $file_url, '%' . $file_path
                    );
                    $entries = $wpdb->get_results( $query );
                }
            }

            public function gform_file_path_pre_delete_file( $file_path, $url ){
                $file_path = wp_normalize_path($file_path);
                $gs_host = wp_normalize_path( ud_get_stateless_media()->get_gs_host() );
                $dir = wp_upload_dir();
                $is_stateless = strpos($file_path, $gs_host);
                
                if($is_stateless !== false){
                    $gs_name = substr($file_path, strpos($file_path, '/gravity_forms/'));
                    $file_path = $dir['basedir'] . $gs_name;
                    
                    $client = ud_get_stateless_media()->get_client();
                    if( !is_wp_error( $client ) ) {
                        $client->remove_media( trim($gs_name, '/') );
                    }
                }

		        return $file_path;
            }
        }

    }

}
