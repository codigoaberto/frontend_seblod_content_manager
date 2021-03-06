<?php
/**
* @version 			SEBLOD 3.x Core ~ $Id: default_status.php sebastienheraud $
* @package			SEBLOD (App Builder & CCK) // SEBLOD nano (Form Builder)
* @url				http://www.seblod.com
* @editor			Octopoos - www.octopoos.com
* @copyright		Copyright (C) 2013 SEBLOD. All Rights Reserved.
* @license 			GNU General Public License version 2 or later; see _LICENSE.php
**/

defined( '_JEXEC' ) or die;
if ( JCck::on() ) {
	$class	=	'';
	$href	=	'#';
	if ( !$app->input->getBool( 'hidemainmenu' ) ) {
	$layout	=	dirname(__FILE__) . '/modal_icon.php';
	JCckDevIntegration::appendModal( $layout, 'collapseModal3', '.cck-quickadd > button', array( 'quickadd'=>1 ) );
//		$class	=	' btn-success';
	}
	?>
  <div class="casebmanager btn-toolbar">
      <div class="btn-group pull-right">
				<p><?php echo JText::_('MOD_CASEBMANAGER_CONTENT_MANAGER_TOOLBAR');?></p>

	</div>
	<div class="btn-group">
    <?php if(!file_exists(JPATH_ROOT.'/templates/'.$app->getTemplate().'/less/uikit/uikit.less')) { ?>
	<button href="<?php echo $href; ?>" class="btn btn-small<?php echo $class; ?>" data-toggle="modal" data-target="#collapseModal3">
			<i class="icon-plus"></i>
			<?php echo $label; ?>
		</button>
   <?php } else {  ?>
       <button class="uk-button" data-uk-modal="{target:'#addcontent'}"><i class="icon-plus"></i>
			<?php echo $label; ?></button>
    <?php } ?>
	</div>
    <div class="btn-group">
		<a href="<?php echo JURI::base();?>index.php/content-management" class="btn btn-small<?php echo $class; ?>">
			<i class="icon-list-view"></i>
			<?php echo JText::_('Content Management'); ?>
		</a>
	</div>
    </div>
<?php } ?>
