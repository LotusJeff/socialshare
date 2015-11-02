<?php
/**
 * Dynamic Opengraph and Twitter Metatags extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Jeff Cocking
 * @license   GNU General Public License, version 2 (GPL-2.0)
 */

namespace lotusjeff\socialshare\migrations;

class v_0_9_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['lotusjeff_socialshare_versions']) && version_compare($this->config['lotusjeff_socialshare_versions'], '0.9.1', '>=');
	}

	static public function depends_on()
	{
		return array('\lotusjeff\socialshare\migrations\v_0_9_0');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('lotusjeff_socialshare_cust1', 0)),
			array('config.add', array('lotusjeff_socialshare_cust1_align', 1)),
			array('config.add', array('lotusjeff_socialshare_cust1_size', 0)),
			array('config.add', array('lotusjeff_socialshare_cust2', 0)),
			array('config.add', array('lotusjeff_socialshare_cust2_align', 1)),
			array('config.add', array('lotusjeff_socialshare_cust2_size', 0)),
			array('config.add', array('lotusjeff_socialshare_default_image', '')),
			array('config.add', array('lotusjeff_socialshare_blogger_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_blogger_icon_seq', 1)),
			array('config.add', array('lotusjeff_socialshare_delicious_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_delicious_icon_seq', 2)),
			array('config.add', array('lotusjeff_socialshare_digg_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_digg_icon_seq', 3)),
			array('config.add', array('lotusjeff_socialshare_facebook_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_facebook_icon_seq', 4)),
			array('config.add', array('lotusjeff_socialshare_foot', 1)),
			array('config.add', array('lotusjeff_socialshare_foot_align', 1)),
			array('config.add', array('lotusjeff_socialshare_foot_size', 0)),
			array('config.add', array('lotusjeff_socialshare_hover', 1)),
			array('config.add', array('lotusjeff_socialshare_hover_margin', 180)),
			array('config.add', array('lotusjeff_socialshare_hover_side', 2)),
			array('config.add', array('lotusjeff_socialshare_hover_size', 1)),
			array('config.add', array('lotusjeff_socialshare_google_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_google_icon_seq', 5)),
			array('config.add', array('lotusjeff_socialshare_linkedin_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_linkedin_icon_seq', 6)),
			array('config.add', array('lotusjeff_socialshare_myspace_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_myspace_icon_seq', 7)),
			array('config.add', array('lotusjeff_socialshare_navbar', 1)),
			array('config.add', array('lotusjeff_socialshare_navbar_align', 2)),
			array('config.add', array('lotusjeff_socialshare_navbar_size', 2)),
			array('config.add', array('lotusjeff_socialshare_odk_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_odk_icon_seq', 8)),
			array('config.add', array('lotusjeff_socialshare_pinterest_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_pinterest_icon_seq', 9)),
			array('config.add', array('lotusjeff_socialshare_post', 1)),
			array('config.add', array('lotusjeff_socialshare_post_align', 1)),
			array('config.add', array('lotusjeff_socialshare_post_size', 0)),
			array('config.add', array('lotusjeff_socialshare_random_image', 1)),
			array('config.add', array('lotusjeff_socialshare_redidit_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_redidit_icon_seq', 10)),
			array('config.add', array('lotusjeff_socialshare_default_rss', '')),
			array('config.add', array('lotusjeff_socialshare_rss_icon', 0)),
			array('config.add', array('lotusjeff_socialshare_rss_icon_seq', 15)),
			array('config.add', array('lotusjeff_socialshare_social', 1)),
			array('config.add', array('lotusjeff_socialshare_stumble_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_stumble_icon_seq', 11)),
			array('config.add', array('lotusjeff_socialshare_tumbler_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_tumbler_icon_seq', 12)),
			array('config.add', array('lotusjeff_socialshare_twitter_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_twitter_icon_seq', 13)),
			array('config.add', array('lotusjeff_socialshare_vk_icon', 1)),
			array('config.add', array('lotusjeff_socialshare_vk_icon_seq', 14)),
			array('config.add', array('lotusjeff_socialshare_versions', '0.9.1')),
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_SOCIALSHARE_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_SOCIALSHARE_TITLE',
				array(
					'module_basename'	=> '\lotusjeff\socialshare\acp\socialshare_module',
					'auth'				=> 'ext_lotusjeff\socialshare && acl_a_board',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
