<?php
/**
 * Helper for mod_instagram_viewer
 *
 * @author     Juliano Hallac
 * @subpackage  mod_instagram_viewer
 * @since       1.0
 */

defined('_JEXEC') or die;


class ModInstagramViewer
{
	public static function getLastImage(&$params)
	{
		$user_id = trim($params->get('user_id',''));
		$access_token = trim($params->get('access_token',''));
		$width = $params->get('width','306');
		$height = $params->get('height','306');

		$url = ModInstagramViewer::getInstagramURL($user_id, $access_token, "recent");
		if (empty($url))
			return "";
		$result = ModInstagramViewer::fetchData($url);
		$result = json_decode($result);

		$image['width'] = $width;
		$image['height'] = $height;
		$image['title'] = $result->data[0]->caption->text; 
		$image['src'] = $result->data[0]->images->low_resolution->url;
		return $image;
	}

	private static function getInstagramURL($user_id, $access_token, $type)
	{
		switch ($type) {
			case 'recent':
				$url = "https://api.instagram.com/v1/users/".$user_id."/media/recent/?access_token=".$access_token;
				break;
			
			default:
				$url = "";
				break;
		}

		return $url;

	}

	private static function fetchData($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	    $result = curl_exec($ch);
	    curl_close($ch); 
	    return $result;
	}

}
