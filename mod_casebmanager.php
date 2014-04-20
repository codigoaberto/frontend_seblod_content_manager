<?php
/**
 * @copyright	@copyright	Copyright (c) 2014 casebmanager. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$assets = JFactory::getDocument();
$assets->addStyleSheet('modules/mod_casebmanager/assets/css/style.css');
$modal_layout	=	'icon';
$class_sfx = htmlspecialchars($params->get('class_sfx'));

require(JModuleHelper::getLayoutPath('mod_casebmanager', $params->get('layout', 'default')));