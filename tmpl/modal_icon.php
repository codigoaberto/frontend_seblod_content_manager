<?php
/**
* @version 			SEBLOD 3.x Core ~ $Id: modal_icon.php sebastienheraud $
* @package			SEBLOD (App Builder & CCK) // SEBLOD nano (Form Builder)
* @url				http://www.seblod.com
* @editor			Octopoos - www.octopoos.com
* @copyright		Copyright (C) 2013 SEBLOD. All Rights Reserved.
* @license 			GNU General Public License version 2 or later; see _LICENSE.php
**/

defined( '_JEXEC' ) or die;

$app		=	JFactory::getApplication();
$base		=	'index.php?option=com_cck&view=form';
$doc		=	JFactory::getDocument();
$lang		=	JFactory::getLanguage();
$type		=	'';
$user		=	JFactory::getUser();
if(!file_exists(JPATH_ROOT.'/templates/'.$app->getTemplate().'/less/uikit/uikit.less')) {
if ( isset( $params['quickadd'] ) && $params['quickadd'] == 1 ) {
	$legacy	=	0;
	$url	=	'none';
} else {
	$legacy	=	$options->get( 'add_alt' );
	$url	=	'';
}
$items		=	JCckDevIntegration::getForms( $url, $type );
$doc->addStyleSheet( JURI::root( true ).'/administrator/components/com_cck/assets/css/cpanel.css' );
$target_id	=	( isset( $target_id ) ) ? $target_id : 'collapseModal2';

if ( $legacy == 1 ) {
	$legend		=	'';
	$legend		=	JText::sprintf( 'LIB_CCK_INTEGRATION_MODAL_BOX_LEGEND1',
									'<a id="joomla-standard-content" href="'.$options->get( 'add_alt_link' ).'">'.JText::_( 'LIB_CCK_INTEGRATION_CLICK_HERE' ).'</a>' );
	$legend2	=	'';
} elseif ( $legacy == 2 ) {
	$legend		=	JText::_( 'LIB_CCK_INTEGRATION_SELECT_A_FORM' );
	$legend2	=	JText::sprintf( 'LIB_CCK_INTEGRATION_MODAL_BOX_LEGEND2', '<a id="joomla-standard-content" href="'.$options->get( 'add_alt_link' ).'">'.JString::strtolower( JText::_( 'LIB_CCK_INTEGRATION_CLICK_HERE' ) ).'</a>' );
} else {
	$legend		=	JText::_( 'LIB_CCK_INTEGRATION_SELECT_A_FORM' );
	$legend2	=	'';
}
$doc->addStyleDeclaration( 'div.modal-footer button.pull-left{position:relative; top:8px;}' );
?>
<div class="modal hide fade" id="<?php echo $target_id; ?>">
	<div class="modal-header">
		<button type="button" role="presentation" class="close" data-dismiss="modal">x</button>
		<h3><?php echo $legend; ?></h3>
	</div>
	<div class="modal-body">
		<div class="cpanel row-fluid">
			<?php
		    foreach ( $items as $item ) {
				if ( $user->authorise( 'core.create', 'com_cck.form.'.$item->id ) ) {
					$image	=	( $item->folder_icon ) ? $item->folder_icon : 'administrator/components/com_cck/assets/images/48/icon-48-form.png';
					$key	=	'APP_CCK_FORM_'.$item->name;
					$lang->load( 'pkg_app_cck_'.$item->folder_app, JPATH_SITE, null, false, false );
					$link	=	$base.'&type='.$item->name.$variables;
					if ( $lang->hasKey( $key ) == 1 ) {
						$text	=	JText::_( $key );
					} else {
						$text	=	$item->title;
					}
				?>
		        <div class="wrapper-icon span3">
		            <div class="icon">
		                <a href="<?php echo $link; ?>&layout=edit" target="_parent">
		                    <?php echo JHtml::_( 'image', $image, htmlspecialchars( str_replace( '<br />', ' ', $text ) ) ); ?>
		                    <span><?php echo $text; ?></span>
						</a>
		            </div>
		        </div>
		    <?php } } ?>
		</div>
		<?php
		echo $legend2;
		?>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal">
			<?php echo JText::_( 'JCANCEL' ); ?>
		</button>
          <a class="uk-modal-close uk-close"></a>
	</div>
</div>
<?php } else { 
if ( isset( $params['quickadd'] ) && $params['quickadd'] == 1 ) {
	$legacy	=	0;
	$url	=	'none';
} else {
	$legacy	=	$options->get( 'add_alt' );
	$url	=	'';
}
$items		=	JCckDevIntegration::getForms( $url, $type );
$doc->addStyleSheet( JURI::root( true ).'/administrator/components/com_cck/assets/css/cpanel.css' );
$target_id	=	( isset( $target_id ) ) ? $target_id : 'collapseModal2';

if ( $legacy == 1 ) {
	$legend		=	'';
	$legend		=	JText::sprintf( 'LIB_CCK_INTEGRATION_MODAL_BOX_LEGEND1',
									'<a id="joomla-standard-content" href="'.$options->get( 'add_alt_link' ).'">'.JText::_( 'LIB_CCK_INTEGRATION_CLICK_HERE' ).'</a>' );
	$legend2	=	'';
} elseif ( $legacy == 2 ) {
	$legend		=	JText::_( 'LIB_CCK_INTEGRATION_SELECT_A_FORM' );
	$legend2	=	JText::sprintf( 'LIB_CCK_INTEGRATION_MODAL_BOX_LEGEND2', '<a id="joomla-standard-content" href="'.$options->get( 'add_alt_link' ).'">'.JString::strtolower( JText::_( 'LIB_CCK_INTEGRATION_CLICK_HERE' ) ).'</a>' );
} else {
	$legend		=	JText::_( 'LIB_CCK_INTEGRATION_SELECT_A_FORM' );
	$legend2	=	'';
}
// $doc->addStyleDeclaration( 'div.modal-footer button.pull-left{position:relative; top:8px;}' );
 $doc->addStyleDeclaration( '.uk-modal.uk-open{z-index:1000000;}' );?>
<div class="uk-modal" id="addcontent">
   <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
		<h3><?php echo $legend; ?></h3>
		<div class="uk-grid">
       	<?php
		    foreach ( $items as $item ) {
				if ( $user->authorise( 'core.create', 'com_cck.form.'.$item->id ) ) {
					$image	=	( $item->folder_icon ) ? $item->folder_icon : 'administrator/components/com_cck/assets/images/48/icon-48-form.png';
					$key	=	'APP_CCK_FORM_'.$item->name;
					$lang->load( 'pkg_app_cck_'.$item->folder_app, JPATH_SITE, null, false, false );
					$link	=	$base.'&type='.$item->name.$variables;
					if ( $lang->hasKey( $key ) == 1 ) {
						$text	=	JText::_( $key );
					} else {
						$text	=	$item->title;
					}
				?>
		        <div class="wrapper-icon span3 uk-width-1-3">
		            <div class="icon">
		                <a href="<?php echo $link; ?>&layout=edit" target="_parent">
		                    <?php echo JHtml::_( 'image', $image, htmlspecialchars( str_replace( '<br />', ' ', $text ) ) ); ?>
		                    <span><?php echo $text; ?></span>
						</a>
		            </div>
		        </div>
		    <?php } } ?>
            </div>
	</div>
</div>
<?php } ?>
