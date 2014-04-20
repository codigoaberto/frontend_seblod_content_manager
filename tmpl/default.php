<?php
/**
 * @copyright	Copyright (c) 2014 casebmanager. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JCck::loadjQuery();
$app	=	JFactory::getApplication();
$doc	=	JFactory::getDocument();
$css	=	'';
$elem	=	'';
$href	=	'index.php?option=com_cck&view=form&layout=select&quickadd=1&quicklayout='.$modal_layout.'&tmpl=component';
$label	=	JText::_( 'MOD_CASEBMANAGER_ADD_CONTENT' );

require JModuleHelper::getLayoutPath('mod_casebmanager', 'default_status');

if ( $css ) {
	$doc->addStyleDeclaration( $css );
}
if ( $elem ) {
	$doc->addScript( JURI::root( true ).'/media/cck/scripts/jquery-colorbox/js/jquery.colorbox-min.js' );
	$doc->addStyleSheet( JURI::root( true ).'/media/cck/scripts/jquery-colorbox/css/colorbox.css' );
	$js	=	'
			jQuery(document).ready(function($){
				$("'.$elem.'").live("click", function(e) { e.preventDefault();
					$.fn.colorbox({href:$(this).attr(\'href\'),open:true,iframe:true,innerWidth:850,innerHeight:430,scrolling:true,overlayClose:false,fixed:true});
					return false;
				});
			});
			';
	$doc->addScriptDeclaration( $js );
}
?>
