<?php
/**
 * pZ:
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_field_to_payment_method extends CI_Migration {

	public function up()
	{
		$col = array(
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11
			)
		);

		$this->dbforge->add_column('ip_payment_methods', $col , 'payment_method_id');

		log_message('info', 'Deskdoo Migration: ' . get_class());
	}

	public function down()
	{
	}
}
