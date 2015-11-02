<?php
/**
*
* @package phpBB Extension - RH Topic Tags
* @copyright (c) 2014 Robet Heim
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lotusjeff\socialshare\acp;

class socialshare_info
{
	public function module()
	{
		return array(
			'filename'	=> '\lotusjeff\socialshare\acp\socialshare_module',
			'title'		=> 'ACP_SOCIALSHARE_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title' => 'ACP_SOCIALSHARE_SETTINGS',
					'auth' => 'ext_lotusjeff/socialshare && acl_a_board',
					'cat' => array('ACP_SOCIALSHARE_TITLE')
				),
			),
		);
	}
}
