<?php
/**
 * pZ:
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Set_default_settings extends CI_Migration {

	public function up()
	{
		$data_array = array(
			array(
				'setting_key' => 'custom_title',
				'setting_value' => 'Deskdoo Invoices',
			),
			array(
				'setting_key' => 'default_language',
				'setting_value' => 'polish',
			),
			array(
				'setting_key' => 'date_format',
				'setting_value' => 'd/m/Y',
			),
			array(
				'setting_key' => 'currency_symbol',
				'setting_value' => ' zł',
			),
			array(
				'setting_key' => 'currency_symbol_placement',
				'setting_value' => 'after',
			),
			array(
				'setting_key' => 'thousands_separator',
				'setting_value' => '.',
			),
			array(
				'setting_key' => 'decimal_point',
				'setting_value' => ',',
			),
			array(
				'setting_key' => 'tax_rate_decimal_places',
				'setting_value' => 0,
			),
			array(
				'setting_key' => 'disable_sidebar',
				'setting_value' => 0,
			),
			array(
				'setting_key' => 'first_day_of_week',
				'setting_value' => 1,
			),
			array(
				'setting_key' => 'pauluz_sign',
				'setting_value' => date('Y-m-d H:i:s'),
			),
		);
		foreach ($data_array as $data) {
//			$this->db->replace('ip_settings', $data);
		}
		
		log_message('info', 'Deskdoo Migration: ' . get_class());
	}

	public function down()
	{
	}
}
