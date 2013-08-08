<?php
/*------------------------------------------------------------------------
# mod_instagramviewer.php (module)
# ------------------------------------------------------------------------
# version		1.0.0
# author    	Juliano Hallac
# copyright 	Copyright (c) 2013 Juliano Hallac All rights reserved.
# @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

-------------------------------------------------------------------------
*/

defined('_JEXEC') or die;
?>
<a class="display-block spotlight" href="http://www.instagram.com/babigourmet" data-spotlight="effect: fade;">
<?php echo JHtml::_('image', $image['src'], $image['title'], array('width' => $image['width'], 'height' => $image['height'])); ?>
<div class="overlay"><h2><?php echo $image['title']; ?></h2></div>
</a>
<!--
<div class="instagram-viewer<?php //echo $moduleclass_sfx ?>">
<?php //echo JHtml::_('image', $image['src'], $image['title'], array('width' => $image['width'], 'height' => $image['height'])); ?>
</div>
-->