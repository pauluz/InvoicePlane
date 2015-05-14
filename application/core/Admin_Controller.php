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

class Admin_Controller extends User_Controller
{
    public $allowed_classes = array(
        'ajax',
//        'layout',
        'dashboard',
        'clients',
        'products',
//        'quotes',
        'invoices',
//        'payments',
        'families',
        'tax_rates',
        'payment_methods',
    );

    public function __construct()
    {
        parent::__construct('user_type', 1);
    }

    /**
     * pZ: _remap
     *
     * @param $method
     *
     * @return mixed
     */
    public function _remap($method, $params = array())
    {
        $class = $this->router->fetch_class();

        if (! in_array($class, $this->allowed_classes)) {

            log_message('error', sprintf('Method "%s" is not allowed', $class . '/' . $method));
            
            $this->layout->set(
                array(
                    'method' => htmlspecialchars(substr(strip_tags("{$class}/{$method}"), 0, 100)),
                )
            );
            $this->layout->buffer('content', 'dashboard/not_allowed');
            $this->layout->render();
            
        } else {
            // pZ: @FIXME routes['404_override'] logic is missing here !!!
            
            if (method_exists($this, strtolower($method))) {
                return call_user_func_array(array($this, $method), $params);
            }
            show_404("{$class}/{$method}");
        }
    }
}

?>