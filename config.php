<?php if(!defined('PLX_ROOT')) exit; ?>
<?php

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
	$plxPlugin->setParam('theme', $_POST['theme'], 'string');
	$plxPlugin->setParam('opacity', $_POST['opacity'], 'string');
	$plxPlugin->setParam('duration', $_POST['duration'], 'numeric');
	$plxPlugin->setParam('animation', $_POST['animation'], 'string');
	$plxPlugin->setParam('width', $_POST['width'], 'numeric');
	$plxPlugin->setParam('height', $_POST['height'], 'numeric');
	$plxPlugin->setParam('gallery', $_POST['gallery'], 'string');
	$plxPlugin->setParam('autoplay', $_POST['autoplay'], 'string');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=plxZoombox');
	exit;
}
$theme = $plxPlugin->getParam('theme')!='' ? $plxPlugin->getParam('theme') : 'zoombox';
$opacity = $plxPlugin->getParam('opacity')!='' ? $plxPlugin->getParam('opacity') : '0.8';
$duration = $plxPlugin->getParam('duration')!='' ? $plxPlugin->getParam('duration') : '800';
$animation = $plxPlugin->getParam('animation')!='' ? $plxPlugin->getParam('animation') : 'true';
$width = $plxPlugin->getParam('width')!='' ? $plxPlugin->getParam('width') : '1000';
$height = $plxPlugin->getParam('height')!='' ? $plxPlugin->getParam('height') : '800';
$gallery = $plxPlugin->getParam('gallery')!='' ? $plxPlugin->getParam('gallery') : 'true';
$autoplay = $plxPlugin->getParam('autoplay')!='' ? $plxPlugin->getParam('autoplay') : 'false';
?>

<h2><?php echo $plxPlugin->getInfo('title') ?></h2>

<form action="parametres_plugin.php?p=plxZoombox" method="post" id="form_plxZoombox">
	<fieldset>
		<p class="field"><label for="id_theme"><?php $plxPlugin->lang('L_THEME') ?></label></p>
		<?php plxUtils::printSelect('theme',array('zoombox'=>'zoombox','lightbox'=>'lightbox','prettyphoto'=>'prettyphoto','darkprettyphoto'=>'darkprettyphoto','simple'=>'simple'),$theme) ?>
		<p class="field"><label for="id_opacity"><?php $plxPlugin->lang('L_OPACITY') ?></label></p>
		<?php plxUtils::printInput('opacity',$opacity,'text','4-4') ?>
		<p class="field"><label for="id_duration"><?php $plxPlugin->lang('L_DURATION') ?></label></p>
		<?php plxUtils::printInput('duration',$duration,'text','4-4') ?>
		<p class="field"><label for="id_animation"><?php $plxPlugin->lang('L_ANIMATION') ?></label></p>
		<?php plxUtils::printSelect('animation',array('true'=>$plxPlugin->getLang('L_YES'),'false'=>$plxPlugin->getLang('L_NO')),$animation) ?>
		<p class="field"><label for="id_width"><?php $plxPlugin->lang('L_WIDTH') ?></label></p>
		<?php plxUtils::printInput('width',$width,'text','4-4') ?>
		<p class="field"><label for="id_height"><?php $plxPlugin->lang('L_HEIGHT') ?></label></p>
		<?php plxUtils::printInput('height',$height,'text','4-4') ?>
		<p class="field"><label for="id_gallery"><?php $plxPlugin->lang('L_GALLERY') ?></label></p>
		<?php plxUtils::printSelect('gallery',array('true'=>$plxPlugin->getLang('L_YES'),'false'=>$plxPlugin->getLang('L_NO')),$gallery) ?>
		<p class="field"><label for="id_autoplay"><?php $plxPlugin->lang('L_AUTOPLAY') ?></label></p>
		<?php plxUtils::printSelect('autoplay',array('true'=>$plxPlugin->getLang('L_YES'),'false'=>$plxPlugin->getLang('L_NO')),$autoplay) ?>
		<p>
			<?php echo plxToken::getTokenPostMethod() ?>
			<input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
		</p>
	</fieldset>
</form>