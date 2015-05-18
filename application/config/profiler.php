<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/

// pZ:
$config['benchmarks']         = false;
//$config['config']             = false;
$config['controller_info']    = false;
//$config['get']                = false;
$config['http_headers']       = false;
$config['memory_usage']       = false;
$config['post']               = false;
$config['queries']            = false;
$config['uri_string']         = false;
$config['query_toggle_count'] = 10;


/* End of file profiler.php */
/* Location: ./application/config/profiler.php */