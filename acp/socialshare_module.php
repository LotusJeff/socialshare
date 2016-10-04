<?php
/**
*
* @package phpBB Extension - Social Share
* @copyright (c) 2016 Jeff Cocking
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lotusjeff\socialshare\acp;

/**
* @ignore
*/
//use lotusjeff\socialshare\prefixes;

class socialshare_module
{
	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;
	/** @var \phpbb\config\config */
	protected $config;
	/** @var \phpbb\config\db_text */
	protected $config_text;
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;
	/** @var \phpbb\log\log */
	protected $log;
	/** @var \phpbb\request\request */
	protected $request;
	/** @var \phpbb\template\template */
	protected $template;
	/** @var \phpbb\user */
	protected $user;
	/** @var string */
	protected $phpbb_root_path;
	/** @var string */
	protected $php_ext;
	/** @var string */
	public $u_action;

	/**
	 * Delegates to proper functions that handle the specific case
	 *
	 * @param string $id the id of the acp-module (the url-param "i")
	 * @param string $mode the phpbb acp-mode
	 */
	public function main($id, $mode)
	{
		global $user, $phpbb_container;

		$user->add_lang_ext('lotusjeff/socialshare', 'socialshare_acp');

		switch ($mode)
		{
			case 'settings':
			// no break
			default:
				$this->tpl_name = 'socialshare';
				$this->page_title = 'ACP_SOCIALSHARE_SETTINGS';
				$this->handle_settings();
		}
	}

	/**
	 * Default settings page
	 */
	private function handle_settings()
	{
		global $config, $request, $template, $user;
		// Define the name of the form for use as a form key
		$form_name = 'socialshare';
		add_form_key($form_name);

		$errors = array();

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key($form_name))
			{
				trigger_error('FORM_INVALID');
			}

			$commit_to_db = true;
			$msg = array();

			//perform validation checks
			// check for valid twitter name
			$twitter_name = $request->variable('lotusjeff_socialshare_twitter_site','');
			if (!preg_match('/^@[a-zA-Z0-9_]{2,16}$/i',$twitter_name) && !empty($twitter_name))
			{
				$commit_to_db = false;
				$errors[] = $user->lang('LOTUSJEFF_SOCIALSHARE_INVALID_TWITTER_NAME');
			}
			//check for invalid hyperlink
			$url_regex = '_^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/[^\s]*)?$_iuS';
			$image_link = $request->variable('lotusjeff_socialshare_default_image','');
			if (!preg_match($url_regex,$image_link) && !empty($imagelink))
			{
				$commit_to_db = false;
				$errors[] = $user->lang('LOTUSJEFF_SOCIALSHARE_INVALID_IMAGE_LINK');
			}
			//check for default image if selected
			$rand_image = $request->variable('lotusjeff_socialshare_random_image', 1);
			if ($rand_image == 0 && empty($image_link))
			{
				$commit_to_db = false;
				$errors[] = $user->lang('LOTUSJEFF_SOCIALSHARE_INVALID_IMAGE_SETTING');
			}
			//check for default rss image if rss is selected
			$rss_link = $request->variable('lotusjeff_socialshare_default_rss', '');
			$rss_icon = $request->variable('lotusjeff_socialshare_rss_icon', '');
			if ($rss_icon == 1 && empty($rss_link))
			{
				$commit_to_db = false;
				$errors[] = $user->lang('LOTUSJEFF_SOCIALSHARE_INVALID_RSS_SETTING');
			}
			//cehck for opengraph tags are turned on if using social share
			$social_share = $request->variable('lotusjeff_socialshare_social', 1);
			$facebook_tags = $request->variable('lotusjeff_socialshare_facebook', 1);
			if ($social_share == 1 && $facebook_tags == 0)
			{
				$commit_to_db = false;
				$errors[] = $user->lang('LOTUSJEFF_SOCIALSHARE_INVALID_FACEBOOK_TAG_SETTING');
			}

			//Submit to db

			if ($commit_to_db)
			{
				$config->set('lotusjeff_socialshare_cust1', $request->variable('lotusjeff_socialshare_cust1', 0));
				$config->set('lotusjeff_socialshare_cust1_align', $request->variable('lotusjeff_socialshare_cust1_align', 1));
				$config->set('lotusjeff_socialshare_cust1_size', $request->variable('lotusjeff_socialshare_cust1_size', 1));
				$config->set('lotusjeff_socialshare_cust2', $request->variable('lotusjeff_socialshare_cust2', 0));
				$config->set('lotusjeff_socialshare_cust2_align', $request->variable('lotusjeff_socialshare_cust2_align', 1));
				$config->set('lotusjeff_socialshare_cust2_size', $request->variable('lotusjeff_socialshare_cust2_size', 1));
				$config->set('lotusjeff_socialshare_default_image', $image_link, '');
				$config->set('lotusjeff_socialshare_blogger_icon', $request->variable('lotusjeff_socialshare_blogger_icon', 1));
				$config->set('lotusjeff_socialshare_blogger_icon_seq', $request->variable('lotusjeff_socialshare_blogger_icon_seq', 1));
				$config->set('lotusjeff_socialshare_delicious_icon', $request->variable('lotusjeff_socialshare_delicious_icon', 1));
				$config->set('lotusjeff_socialshare_delicious_icon_seq', $request->variable('lotusjeff_socialshare_delicious_icon_seq', 2));
				$config->set('lotusjeff_socialshare_digg_icon', $request->variable('lotusjeff_socialshare_digg_icon', 1));
				$config->set('lotusjeff_socialshare_digg_icon_seq', $request->variable('lotusjeff_socialshare_digg_icon_seq', 3));
				$config->set('lotusjeff_socialshare_facebook', $facebook_tags);
				$config->set('lotusjeff_socialshare_facebook_icon', $request->variable('lotusjeff_socialshare_facebook_icon', 1));
				$config->set('lotusjeff_socialshare_facebook_icon_seq', $request->variable('lotusjeff_socialshare_facebook_icon_seq', 4));
				$config->set('lotusjeff_socialshare_first_image', $request->variable('lotusjeff_socialshare_first_image', 1));
				$config->set('lotusjeff_socialshare_foot', $request->variable('lotusjeff_socialshare_foot', 1));
				$config->set('lotusjeff_socialshare_foot_align', $request->variable('lotusjeff_socialshare_foot_align', 1));
				$config->set('lotusjeff_socialshare_foot_size', $request->variable('lotusjeff_socialshare_foot_size', 1));
				$config->set('lotusjeff_socialshare_google_icon', $request->variable('lotusjeff_socialshare_google_icon', 1));
				$config->set('lotusjeff_socialshare_google_icon_seq', $request->variable('lotusjeff_socialshare_google_icon_seq', 5));
				$config->set('lotusjeff_socialshare_hover', $request->variable('lotusjeff_socialshare_hover', 1));
				$config->set('lotusjeff_socialshare_hover_margin', $request->variable('lotusjeff_socialshare_hover_margin', 180));
				$config->set('lotusjeff_socialshare_hover_side', $request->variable('lotusjeff_socialshare_hover_side', 1));
				$config->set('lotusjeff_socialshare_hover_size', $request->variable('lotusjeff_socialshare_hover_size', 1));
				$config->set('lotusjeff_socialshare_linkedin_icon', $request->variable('lotusjeff_socialshare_linkedin_icon', 1));
				$config->set('lotusjeff_socialshare_linkedin_icon_seq', $request->variable('lotusjeff_socialshare_linkedin_icon_seq', 6));
				$config->set('lotusjeff_socialshare_myspace_icon', $request->variable('lotusjeff_socialshare_myspace_icon', 1));
				$config->set('lotusjeff_socialshare_myspace_icon_seq', $request->variable('lotusjeff_socialshare_myspace_icon_seq', 7));
				$config->set('lotusjeff_socialshare_navbar', $request->variable('lotusjeff_socialshare_navbar', 1));
				$config->set('lotusjeff_socialshare_navbar_align', $request->variable('lotusjeff_socialshare_navbar_align', 1));
				$config->set('lotusjeff_socialshare_navbar_size', $request->variable('lotusjeff_socialshare_navbar_size', 1));
				$config->set('lotusjeff_socialshare_odk_icon', $request->variable('lotusjeff_socialshare_odk_icon', 1));
				$config->set('lotusjeff_socialshare_odk_icon_seq', $request->variable('lotusjeff_socialshare_odk_icon_seq', 8));
				$config->set('lotusjeff_socialshare_pinterest_icon', $request->variable('lotusjeff_socialshare_pinterest_icon', 1));
				$config->set('lotusjeff_socialshare_pinterest_icon_seq', $request->variable('lotusjeff_socialshare_pinterest_icon_seq', 9));
				$config->set('lotusjeff_socialshare_post', $request->variable('lotusjeff_socialshare_post', 1));
				$config->set('lotusjeff_socialshare_post_align', $request->variable('lotusjeff_socialshare_post_align', 1));
				$config->set('lotusjeff_socialshare_post_size', $request->variable('lotusjeff_socialshare_post_size', 1));
				$config->set('lotusjeff_socialshare_random_image', $rand_image);
				$config->set('lotusjeff_socialshare_redidit_icon', $request->variable('lotusjeff_socialshare_redidit_icon', 1));
				$config->set('lotusjeff_socialshare_redidit_icon_seq', $request->variable('lotusjeff_socialshare_redidit_icon_seq', 10));
				$config->set('lotusjeff_socialshare_default_rss', $rss_link, '');
				$config->set('lotusjeff_socialshare_rss_icon', $rss_icon, 0);
				$config->set('lotusjeff_socialshare_rss_icon_seq', $request->variable('lotusjeff_socialshare_rss_icon_seq', 15));
				$config->set('lotusjeff_socialshare_social', $social_share);
				$config->set('lotusjeff_socialshare_stumble_icon', $request->variable('lotusjeff_socialshare_stumble_icon', 1));
				$config->set('lotusjeff_socialshare_stumble_icon_seq', $request->variable('lotusjeff_socialshare_stumble_icon_seq', 11));
				$config->set('lotusjeff_socialshare_tumbler_icon', $request->variable('lotusjeff_socialshare_tumbler_icon', 1));
				$config->set('lotusjeff_socialshare_tumbler_icon_seq', $request->variable('lotusjeff_socialshare_tumbler_icon_seq', 12));
				$config->set('lotusjeff_socialshare_twitter', $request->variable('lotusjeff_socialshare_twitter', 1));
				$config->set('lotusjeff_socialshare_twitter_site', $twitter_name, '');
				$config->set('lotusjeff_socialshare_twitter_icon', $request->variable('lotusjeff_socialshare_twitter_icon', 1));
				$config->set('lotusjeff_socialshare_twitter_icon_seq', $request->variable('lotusjeff_socialshare_twitter_icon_seq', 13));
				$config->set('lotusjeff_socialshare_vk_icon', $request->variable('lotusjeff_socialshare_vk_icon', 1));
				$config->set('lotusjeff_socialshare_vk_icon_seq', $request->variable('lotusjeff_socialshare_vk_icon_seq', 14));

				if (empty($msg))
				{
					$msg[] = $user->lang('LOTUSJEFF_SOCIALSHARE_SETTINGS_SAVED');
				}
				trigger_error(join('<br/>', $msg) . adm_back_link($this->u_action));
			}
		}
		$template->assign_vars(array(
			'LOTUSJEFF_SOCIALSHARE_CUST1'			=> $config['lotusjeff_socialshare_cust1'],
			'LOTUSJEFF_SOCIALSHARE_CUST1_ALIGN'		=> $config['lotusjeff_socialshare_cust1_align'],
			'LOTUSJEFF_SOCIALSHARE_CUST1_SIZE'		=> $config['lotusjeff_socialshare_cust1_size'],
			'LOTUSJEFF_SOCIALSHARE_CUST2'			=> $config['lotusjeff_socialshare_cust2'],
			'LOTUSJEFF_SOCIALSHARE_CUST2_ALIGN'		=> $config['lotusjeff_socialshare_cust2_align'],
			'LOTUSJEFF_SOCIALSHARE_CUST2_SIZE'		=> $config['lotusjeff_socialshare_cust2_size'],
			'LOTUSJEFF_SOCIALSHARE_BLOGGER_ICON'		=> $config['lotusjeff_socialshare_blogger_icon'],
			'LOTUSJEFF_SOCIALSHARE_BLOGGER_ICON_SEQ'	=> $config['lotusjeff_socialshare_blogger_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_DELICIOUS_ICON'		=> $config['lotusjeff_socialshare_delicious_icon'],
			'LOTUSJEFF_SOCIALSHARE_DELICIOUS_ICON_SEQ'	=> $config['lotusjeff_socialshare_delicious_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_DEFAULT_IMAGE'	=> $config['lotusjeff_socialshare_default_image'],
			'LOTUSJEFF_SOCIALSHARE_DIGG_ICON'		=> $config['lotusjeff_socialshare_digg_icon'],
			'LOTUSJEFF_SOCIALSHARE_DIGG_ICON_SEQ'	=> $config['lotusjeff_socialshare_digg_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_FACEBOOK'		=> $config['lotusjeff_socialshare_facebook'],
			'LOTUSJEFF_SOCIALSHARE_FACEBOOK_ICON'	=> $config['lotusjeff_socialshare_facebook_icon'],
			'LOTUSJEFF_SOCIALSHARE_FACEBOOK_ICON_SEQ'	=> $config['lotusjeff_socialshare_facebook_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_FIRST_IMAGE'		=> $config['lotusjeff_socialshare_first_image'],
			'LOTUSJEFF_SOCIALSHARE_FOOT'			=> $config['lotusjeff_socialshare_foot'],
			'LOTUSJEFF_SOCIALSHARE_FOOT_ALIGN'		=> $config['lotusjeff_socialshare_foot_align'],
			'LOTUSJEFF_SOCIALSHARE_FOOT_SIZE'		=> $config['lotusjeff_socialshare_foot_size'],
			'LOTUSJEFF_SOCIALSHARE_GOOGLE_ICON'	=> $config['lotusjeff_socialshare_google_icon'],
			'LOTUSJEFF_SOCIALSHARE_GOOGLE_ICON_SEQ'	=> $config['lotusjeff_socialshare_google_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_HOVER'			=> $config['lotusjeff_socialshare_hover'],
			'LOTUSJEFF_SOCIALSHARE_HOVER_MARGIN'	=> $config['lotusjeff_socialshare_hover_margin'],
			'LOTUSJEFF_SOCIALSHARE_HOVER_SIDE'		=> $config['lotusjeff_socialshare_hover_side'],
			'LOTUSJEFF_SOCIALSHARE_HOVER_SIZE'		=> $config['lotusjeff_socialshare_hover_size'],
			'LOTUSJEFF_SOCIALSHARE_LINKEDIN_ICON'	=> $config['lotusjeff_socialshare_linkedin_icon'],
			'LOTUSJEFF_SOCIALSHARE_LINKEDIN_ICON_SEQ'	=> $config['lotusjeff_socialshare_linkedin_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_MYSPACE_ICON'		=> $config['lotusjeff_socialshare_myspace_icon'],
			'LOTUSJEFF_SOCIALSHARE_MYSPACE_ICON_SEQ'	=> $config['lotusjeff_socialshare_myspace_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_NAVBAR'			=> $config['lotusjeff_socialshare_navbar'],
			'LOTUSJEFF_SOCIALSHARE_NAVBAR_ALIGN'	=> $config['lotusjeff_socialshare_navbar_align'],
			'LOTUSJEFF_SOCIALSHARE_NAVBAR_SIZE'		=> $config['lotusjeff_socialshare_navbar_size'],
			'LOTUSJEFF_SOCIALSHARE_ODK_ICON'		=> $config['lotusjeff_socialshare_odk_icon'],
			'LOTUSJEFF_SOCIALSHARE_ODK_ICON_SEQ'	=> $config['lotusjeff_socialshare_odk_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_PINTEREST_ICON'	=> $config['lotusjeff_socialshare_pinterest_icon'],
			'LOTUSJEFF_SOCIALSHARE_PINTEREST_ICON_SEQ'	=> $config['lotusjeff_socialshare_pinterest_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_POST'			=> $config['lotusjeff_socialshare_post'],
			'LOTUSJEFF_SOCIALSHARE_POST_ALIGN'		=> $config['lotusjeff_socialshare_post_align'],
			'LOTUSJEFF_SOCIALSHARE_POST_SIZE'		=> $config['lotusjeff_socialshare_post_size'],
			'LOTUSJEFF_SOCIALSHARE_RANDOM_IMAGE'	=> $config['lotusjeff_socialshare_random_image'],
			'LOTUSJEFF_SOCIALSHARE_REDIDIT_ICON'	=> $config['lotusjeff_socialshare_redidit_icon'],
			'LOTUSJEFF_SOCIALSHARE_REDIDIT_ICON_SEQ'	=> $config['lotusjeff_socialshare_redidit_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_DEFAULT_RSS'		=> $config['lotusjeff_socialshare_default_rss'],
			'LOTUSJEFF_SOCIALSHARE_RSS_ICON'		=> $config['lotusjeff_socialshare_rss_icon'],
			'LOTUSJEFF_SOCIALSHARE_RSS_ICON_SEQ'	=> $config['lotusjeff_socialshare_rss_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_SOCIAL'			=> $config['lotusjeff_socialshare_social'],
			'LOTUSJEFF_SOCIALSHARE_STUMBLE_ICON'	=> $config['lotusjeff_socialshare_stumble_icon'],
			'LOTUSJEFF_SOCIALSHARE_STUMBLE_ICON_SEQ'	=> $config['lotusjeff_socialshare_stumble_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_TUMBLER_ICON'		=> $config['lotusjeff_socialshare_tumbler_icon'],
			'LOTUSJEFF_SOCIALSHARE_TUMBLER_ICON_SEQ'	=> $config['lotusjeff_socialshare_tumbler_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_TWITTER'			=> $config['lotusjeff_socialshare_twitter'],
			'LOTUSJEFF_SOCIALSHARE_TWITTER_SITE'	=> $config['lotusjeff_socialshare_twitter_site'],
			'LOTUSJEFF_SOCIALSHARE_TWITTER_ICON'	=> $config['lotusjeff_socialshare_twitter_icon'],
			'LOTUSJEFF_SOCIALSHARE_TWITTER_ICON_SEQ'	=> $config['lotusjeff_socialshare_twitter_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_VK_ICON'		=> $config['lotusjeff_socialshare_vk_icon'],
			'LOTUSJEFF_SOCIALSHARE_VK_ICON_SEQ'	=> $config['lotusjeff_socialshare_vk_icon_seq'],
			'LOTUSJEFF_SOCIALSHARE_VERSION'			=> $config['lotusjeff_socialshare_versions'],
			'S_LOTUSJEFF_SOCIALSHARE'    			  => true,
			'S_ERROR'                                => (sizeof($errors)) ? true : false,
			'ERROR_MSG'                              => implode('<br />', $errors),
			'U_ACTION'                               => $this->u_action,
		));
	}
}
