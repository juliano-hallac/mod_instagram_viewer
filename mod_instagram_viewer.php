<?php
/*------------------------------------------------------------------------
# mod_instagram_viewer.php (module)
# ------------------------------------------------------------------------
# version		1.0.0
# author    	Juliano Hallac
# copyright 	Copyright (c) 2011 Juliano Hallac All rights reserved.
# @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

-------------------------------------------------------------------------
*/
// no direct access
defined('_JEXEC') or die;
require_once __DIR__ . '/helper.php';

$image	= ModInstagramViewer::getLastImage($params);
$hashtag = $params->get('hashtag');
//retira hash tags do titulo da imagem
if ($hashtag == "1" && strpos($image['title'],"#") !== false) {
	$image['title'] = substr($image['title'], 0, strpos($image['title'], "#"));
}
//Insere uma quebra de linha pra dividir os titulos em outras linguas separados por '/'
$image['title'] = str_replace("/", "<br/>", $image['title']);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require JModuleHelper::getLayoutPath('mod_instagram_viewer', $params->get('layout', 'default'));

?>