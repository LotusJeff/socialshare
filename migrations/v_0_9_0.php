<?php
/**
*
* @package phpBB Extension - Social Share
* @copyright (c) 2016 Jeff Cocking
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lotusjeff\socialshare\migrations;

class v_0_9_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return;
	}
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\gold');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('lotusjeff_socialshare_facebook', 1)),
			array('config.add', array('lotusjeff_socialshare_twitter', 1)),
			array('config.add', array('lotusjeff_socialshare_first_image', 1)),
			array('config.add', array('lotusjeff_socialshare_twitter_site', '')),
			array('config.add', array('lotusjeff_socialshare_versions', '0.9.0')),
			);
	}
}
