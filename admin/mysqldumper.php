<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

# ##############################################################################
// ///////////////////// REQUIRED LOCAL PAGE VARIABLES \\\\\\\\\\\\\\\\\\\\\\\\\
$item    = array();
$success = null;
$_SESSION['is_dumper'] = 1;
// //////////////////// END REQUIRED LOCAL PAGE VARIABLES \\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ////////////////////////// POST AND GET OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\
// \\\\\\\\\\\\\\\\\\\\\\\ END POST AND GET OPERATIONS /////////////////////////
# ##############################################################################


# ##############################################################################
// ///////////////////////// LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\
ob_start();
require_once('dumper.php');
$item['text'] = ob_get_contents();
ob_end_clean();
// /////////////////////// END LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
///////////////////// SMARTY BASE PAGE VARIABLES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$smarty->assign('item', $item);
//\\\\\\\\\\\\\\\\\ END SMARTY BASE PAGE VARIABLES /////////////////////////////
# ##############################################################################
