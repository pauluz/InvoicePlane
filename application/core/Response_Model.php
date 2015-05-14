<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * InvoicePlane
 * 
 * A free and open source web based invoicing system
 *
 * @package		InvoicePlane
 * @author		Kovah (www.kovah.de)
 * @copyright	Copyright (c) 2012 - 2015 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 * 
 */

class Response_Model extends Form_Validation_Model
{
    // pZ:
    var $tables_with_user_id = array(
        'ip_clients',
//        'ip_invoices', // pZ: invoices już miało kolumne user_id i sypie się przy db_array() - ale kasowanie działa OK
        'ip_families',
        'ip_payment_methods',
        'ip_products',
        'ip_tax_rates',
    );

    /**
     * pZ: default_select
     * 
     */
    public function default_select()
    {
        if (in_array($this->table, $this->tables_with_user_id)) {
            $this->filter_where($this->table . '.user_id', $this->session->userdata('user_id'));
        }
    }

    /**
     * pZ: db_array
     *
     * @return array
     */
    public function db_array()
    {
        $db_array = parent::db_array();

        if (in_array($this->table, $this->tables_with_user_id)) {
            $db_array['user_id'] = $this->session->userdata('user_id');
        }

        return $db_array;
    }

    public function save($id = NULL, $db_array = NULL)
    {

        if ($id) {
            $this->session->set_flashdata('alert_success', lang('record_successfully_updated'));
            parent::save($id, $db_array);
        } else {
            $this->session->set_flashdata('alert_success', lang('record_successfully_created'));
            $id = parent::save(NULL, $db_array);
        }

        return $id;
    }

    public function delete($id)
    {
        // pZ: @TODO można zrobić sprawdzanie czy udało się w ogóle coś skasować...
        if (in_array($this->table, $this->tables_with_user_id)) {
            $this->db->where('user_id', $this->session->userdata('user_id'));
        }

        parent::delete($id);

        $this->session->set_flashdata('alert_success', lang('record_successfully_deleted'));
    }

}

?>