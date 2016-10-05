<?php
/**
*
* @package phpBB Extension - Social Share
* @copyright (c) 2016 Jeff Cocking
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lotusjeff\socialshare\migrations;

class v_0_9_2 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['lotusjeff_socialshare_versions']) && version_compare($this->config['lotusjeff_socialshare_versions'], '0.9.2', '>=');
	}
	static public function depends_on()
	{
		return array('\lotusjeff\socialshare\migrations\v_0_9_1');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('lotusjeff_socialshare_versions', '0.9.2')),
			);
	}
}
