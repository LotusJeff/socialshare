<?php
/**
 *
 * Dynamic Opengraph and Twitter Metatags extension for the phpBB Forum Software package.
 * 
 * @copyright (c) 2015 Jeff Cocking
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace lotusjeff\socialshare\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['lotusjeff_socialshare_versions']) && version_compare($this->config['lotusjeff_socialshare_versions'], '1.0.0', '>=');
	}
	static public function depends_on()
	{
		return array('\lotusjeff\socialshare\migrations\v_0_9_2');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('lotusjeff_socialshare_versions', '1.0.0')),
			);
	}
}
