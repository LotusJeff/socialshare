<?php
/**
 * Dynamic Opengraph and Twitter Meta Tags extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Jeff Cocking
 * @license   GNU General Public License, version 2 (GPL-2.0)
 */

namespace lotusjeff\socialshare\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/**
	* @var \phpbb\config\config
	*/
	protected $config;
	/**
	* @var \phpbb\template\template
	*/
	protected $template;
	/**
	* @var \phpbb\user
	*/
	protected $user;
	/**
	* @var \phpbb\db
	*/
	protected $db;

	/**
	 * Constructor
	 *
	 * @param  \phpbb\config\config     $config   Config object
	 * @param  \phpbb\template\template $template Template object
	 * @param  \phpbb\user              $user     User object
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	static public function getSubscribedEvents()
	{
		return array(
		'core.page_header_after'            => 'lotusjeff_socialshare_master_tpl_data',
		'core.viewtopic_modify_post_data'   => 'lotusjeff_socialshare_viewtopic_header_data',
		'core.viewforum_get_topic_data'     => 'lotusjeff_socialshare_viewforum_header_data',
		'core.index_modify_page_title'      => 'lotusjeff_socialshare_index_header_data',
		'core.user_setup'                   => 'lotusjeff_socialshare_load_language',
		);
	}

	/**
	 * Set Dynamic template data
	 *
	 * @return null
	 * @access public
	 */
	public function lotusjeff_socialshare_master_tpl_data()
	{
		$this->user->add_lang_ext('lotusjeff/socialshare', 'common');
		/**
		* Assigns a default image and site description for pages without.
		*/
		if (empty($this->config['lotusjeff_socialshare_image']))
		{
			if ($this->config['lotusjeff_socialshare_random_image'])
			{
				$this->config['lotusjeff_socialshare_image'] = $this->lotusjeff_socialshare_get_random_image();
			}
			else
			{
				$this->config['lotusjeff_socialshare_image'] = $this->config['lotusjeff_socialshare_default_image'];
			}
		}
		if (empty($this->config['lotusjeff_socialshare_description']))
		{
		$this->config['lotusjeff_socialshare_description'] = $this->config['site_desc'];
		}
		$template_vars = '';
		if ($this->config['lotusjeff_socialshare_social'])
		{
			if ($this->config['lotusjeff_socialshare_foot'])
			{
				// handle visual elements sizes and locations.
				switch ($this->config['lotusjeff_socialshare_foot_align'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_foot_align = 'left';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_foot_align = 'center';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_foot_align = 'right';";
					break;
				}
				switch ($this->config['lotusjeff_socialshare_foot_size'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_foot_size = '32';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_foot_size = '24';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_foot_size = '16';";
					break;
				}
			}
			if ($this->config['lotusjeff_socialshare_navbar'])
			{
				switch ($this->config['lotusjeff_socialshare_navbar_align'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_navbar_align = 'left';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_navbar_align = 'center';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_navbar_align = 'right';";
					break;
				}
				switch ($this->config['lotusjeff_socialshare_navbar_size'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_navbar_size = '32';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_navbar_size = '24';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_navbar_size = '16';";
					break;
				}
			}
			if ($this->config['lotusjeff_socialshare_post'])
			{
				switch ($this->config['lotusjeff_socialshare_post_align'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_post_align = 'left';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_post_align = 'center';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_post_align = 'right';";
					break;
				}
				switch ($this->config['lotusjeff_socialshare_post_size'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_post_size = '32';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_post_size = '24';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_post_size = '16';";
					break;
				}
			}
			if ($this->config['lotusjeff_socialshare_cust1'])
			{
				switch ($this->config['lotusjeff_socialshare_cust1_align'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_cust1_align = 'left';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_cust1_align = 'center';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_cust1_align = 'right';";
					break;
				}
				switch ($this->config['lotusjeff_socialshare_cust1_size'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_cust1_size = '32';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_cust1_size = '24';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_cust1_size = '16';";
					break;
				}
			}
			if ($this->config['lotusjeff_socialshare_cust2'])
			{
				switch ($this->config['lotusjeff_socialshare_cust2_align'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_cust2_align = 'left';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_cust2_align = 'center';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_cust2_align = 'right';";
					break;
				}
				switch ($this->config['lotusjeff_socialshare_cust2_size'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_cust2_size = '32';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_cust2_size = '24';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_cust2_size = '16';";
					break;
				}
			}
			if ($this->config['lotusjeff_socialshare_hover'])
			{
				switch ($this->config['lotusjeff_socialshare_hover_side'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_hover_align = 'right:5px;';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_hover_align = 'left:5px;';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_hover_align = 'margin-left:-70px;';";
					break;
				}
				switch ($this->config['lotusjeff_socialshare_hover_size'])
				{
					case 0:
						$template_vars .= "var lotusjeff_socialshare_hover_size = '32';";
					break;
					case 1:
						$template_vars .= "var lotusjeff_socialshare_hover_size = '24';";
					break;
					case 2:
						$template_vars .= "var lotusjeff_socialshare_hover_size = '16';";
					break;
				}
				$template_vars .= "var lotusjeff_socialshare_m2 = '".$this->config['lotusjeff_socialshare_hover_margin']."';";
			}
			$template_vars .= "var lotusjeff_socialshare_rss_link = '".$this->config['lotusjeff_socialshare_default_rss']."';";
			//create sequence structure for icons.
			if ($this->config['lotusjeff_socialshare_blogger_icon'])
			{
				$data[0] = $this->config['lotusjeff_socialshare_blogger_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_delicious_icon'])
			{
				$data[1] = $this->config['lotusjeff_socialshare_delicious_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_digg_icon'])
			{
				$data[2] = $this->config['lotusjeff_socialshare_digg_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_facebook_icon'])
			{
				$data[3] = $this->config['lotusjeff_socialshare_facebook_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_google_icon'])
			{
				$data[4] = $this->config['lotusjeff_socialshare_google_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_linkedin_icon'])
			{
				$data[5] = $this->config['lotusjeff_socialshare_linkedin_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_myspace_icon'])
			{
				$data[6] = $this->config['lotusjeff_socialshare_myspace_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_odk_icon'])
			{
				$data[7] = $this->config['lotusjeff_socialshare_odk_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_pinterest_icon'])
			{
				$data[8] = $this->config['lotusjeff_socialshare_pinterest_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_redidit_icon'])
			{
				$data[9] = $this->config['lotusjeff_socialshare_redidit_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_stumble_icon'])
			{
				$data[10] = $this->config['lotusjeff_socialshare_stumble_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_tumbler_icon'])
			{
				$data[11] = $this->config['lotusjeff_socialshare_tumbler_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_twitter_icon'])
			{
				$data[12] = $this->config['lotusjeff_socialshare_twitter_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_vk_icon'])
			{
				$data[13] = $this->config['lotusjeff_socialshare_vk_icon_seq'];
			}
			if ($this->config['lotusjeff_socialshare_rss_icon'])
			{
				$data[14] = $this->config['lotusjeff_socialshare_rss_icon_seq'];
			}
			uasort($data, function($a, $b)
			{
				if ($a == $b)
				{
					return 0;
				}
				return ($a < $b) ? -1 : 1;
			}
			);
			$icon_sort_order = 'var lotusjeff_socialshare_sort_order = new Array (';
			foreach ($data as $key => $value)
			{
				$icon_sort_order .= "'".$key."',";
			}
			$icon_sort_order = rtrim($icon_sort_order, ",");
			$icon_sort_order .= ');';
			$template_vars .= $icon_sort_order;
		}
		/**
		* Assigns base variables to template.
		* S_SOCIALSHARE_FACEBOOK AND S_SOCIALSHARE_TWITTER on/off switches.
		* SOCIALSHARE_TWITTER_SITE is defined in the ACP
		*/
		$this->template->assign_vars(
			array(
			'LOTUSJEFF_SOCIALSHARE_VARS'			=> 	$template_vars,
			'S_LOTUSJEFF_SOCIALSHARE_FACEBOOK'		=> (int) $this->config['lotusjeff_socialshare_facebook'],
			'S_LOTUSJEFF_SOCIALSHARE_TWITTER'		=> (int) $this->config['lotusjeff_socialshare_twitter'],
			'LOTUSJEFF_SOCIALSHARE_TWITTER_SITE'    => $this->config['lotusjeff_socialshare_twitter_site'],
			'LOTUSJEFF_SOCIALSHARE_IMAGE'			=> $this->config['lotusjeff_socialshare_image'],
			'LOTUSJEFF_SOCIALSHARE_DESCRIPTION'     => $this->config['lotusjeff_socialshare_description'],
			'LOTUSJEFF_SOCIALSHARE_URL'             => $this->config['lotusjeff_socialshare_board_url'],
			'S_LOTUSJEFF_SOCIALSHARE_FOOT'			=> $this->config['lotusjeff_socialshare_foot'],
			'S_LOTUSJEFF_SOCIALSHARE_HOVER'			=> $this->config['lotusjeff_socialshare_hover'],
			'S_LOTUSJEFF_SOCIALSHARE_NAVBAR'		=> $this->config['lotusjeff_socialshare_navbar'],
			'S_LOTUSJEFF_SOCIALSHARE_POST'			=> $this->config['lotusjeff_socialshare_post'],
			'S_LOTUSJEFF_SOCIALSHARE_CUST1'			=> $this->config['lotusjeff_socialshare_cust1'],
			'S_LOTUSJEFF_SOCIALSHARE_CUST2'			=> $this->config['lotusjeff_socialshare_cust2'],
			'S_LOTUSJEFF_SOCIALSHARE_SOCIAL'		=> $this->config['lotusjeff_socialshare_social'],
			'S_LOTUSJEFF_SOCIALSHARE_NAVBAR_ALIGN'	=> $this->config['lotusjeff_socialshare_navbar_align'],
			)
		);
	}

	/**
	 * Loads language file for og:locale value deteremine in language files.
	 *
	 * @return null
	 * @access public
	 */
	public function lotusjeff_socialshare_load_language($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'lotusjeff/socialshare',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	 * Determine image and description data for Viewtopic pages.
	 *
	 * @return null
	 * @access public
	 */
	public function lotusjeff_socialshare_viewtopic_header_data($event)
	{
		global $db;
		$attachments = $event['attachments'];
		$topic_data = $event['topic_data'];
		$rowset = $event['rowset'];
		/**
		* Determine image to use.
		*  We first process attachments.  If we do not find any attachments, we then will process for external images embedded in the posts.
		*  If we do not find any images or attachments, we will review the entire topic to see if there are any attachments on different pages.
		*  If we do not find any images, we will then assign a random/default image to the topic.
		*/
		$dynamic_image = null;
		$base_url = generate_board_url()."/download/file.php?id=";
		$append_url = "&amp;t=";
		if (!empty($attachments))
		{
			if ($this->config['lotusjeff_socialshare_first_image'] == 1)
			{
				//first image
				$set_postition = min(array_keys($attachments));
				$attach_id = $attachments[$set_postition]['0']['attach_id'];
				$thumbnail = $attachments[$set_postition]['0']['thumbnail'];
			}
			else
			{
				$max_post = max(array_keys($attachments));
				$max_image = max(array_keys($attachments[$max_post]));
				$attach_id = $attachments[$max_post][$max_image]['attach_id'];
				$thumbnail = $attachments[$max_post][$max_image]['thumbnail'];
			}
			$dynamic_image = $base_url.$attach_id.$append_url.$thumbnail;
		}
		else
		{
	    	$master_img_links = array();
			foreach ($rowset as $key => $value)
			{
				$pulled_links = array();
		        $open_tag = "[img:".$value['bbcode_uid']."]";
		        $close_tag = "[/img:".$value['bbcode_uid']."]";
				$pulled_links = $this->getContents($value['post_text'],$open_tag,$close_tag);
				$master_img_links = array_merge($master_img_links, $pulled_links);
			}
			if (!empty($master_img_links))
			{
				if ($this->config['lotusjeff_socialshare_first_image'] == 1)
				{
					//First image
					$dynamic_image = max($master_img_links);
				}
				else
				{
					$dynamic_image = min($master_img_links);
				}
			}
		}
		if (($topic_data['topic_attachment'] == 1) && (empty($dynamic_image)))
		{
			/*
            * Image exists in topic, but not on this paganation. Get image data.
            * Currently just get first image. Could expand to get first and last image.
            */
			$sql_array = array(
			 'topic_id'    => $topic_data['topic_id'],
			);
			$sql = 'SELECT attach_id, thumbnail 
			        FROM ' . ATTACHMENTS_TABLE . ' 
			        WHERE ' . $db->sql_build_array('SELECT', $sql_array);
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			$dynamic_image = $base_url.$row['attach_id'].$append_url.$row['thumbnail'];
		}
		$this->config['lotusjeff_socialshare_image'] = $dynamic_image;
		/*
        * Obtain description data.
        * First determine if we are dealing with page 1 of a topic. If not, we pull
        * the first post_text from the database.
        * If this is page one, we use the post_text from the existing array.
        */
		if ($event['start'] > 0 )
		{
			$sql_array = array(
			 'post_id'    => $topic_data['topic_first_post_id'],
			);
			$sql = 'SELECT post_text 
			        FROM ' . POSTS_TABLE . ' 
			        WHERE ' . $db->sql_build_array('SELECT', $sql_array);
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			$post_content = $row['post_text'];
		}
		else
		{
			$post_content = $rowset[$topic_data['topic_first_post_id']]['post_text'];
		}
		$post_content = $this->lotusjeff_socialshare_strip_code($post_content);
		$this->config['lotusjeff_socialshare_description'] = $post_content;
	}

	/**
	 * Determine image and description data from Viewforum pages.
	 *
	 * @return null
	 * @access public
	 */
	public function lotusjeff_socialshare_viewforum_header_data($event)
	{
		$forum_data = $event['forum_data'];
		if (!empty($forum_data['forum_desc']))
		{
			$forum_desc = $this->lotusjeff_socialshare_strip_code($forum_data['forum_desc']);
			$this->template->assign_var('LOTUSJEFF_SOCIALSHARE_DESCRIPTION', $forum_desc);
		}
		if ($this->config['lotusjeff_socialshare_random_image'])
		{
			$dynamic_image = $this->lotusjeff_socialshare_get_random_image();
			$this->template->assign_var('LOTUSJEFF_SOCIALSHARE_IMAGE', $dynamic_image);
		}
		else
		{
			$this->template->assign_var('LOTUSJEFF_SOCIALSHARE_IMAGE', $this->config['lotusjeff_socialshare_default_image']);
		}
	}

	/**
	 * The index page does not have the U_CANNONICAL template tag. This
	 * requires adding the board url for the url meta tags.
	 *
	 * @return null
	 * @access public
	 */
	public function lotusjeff_socialshare_index_header_data()
	{
		$board_url = generate_board_url()."/";
		$this->config['lotusjeff_socialshare_board_url'] = $board_url;
	}

	/**
	 * Pulls a random image for forum and index pages.  The routing looks
	 * for images that are not in PMs, are thumbnails and are jpg images.
	 *
	 * @return image attach id
	 * @access private
	 */
	private function lotusjeff_socialshare_get_random_image()
	{
		global $db;
		$sql_array = array(
		 'in_message'    =>    '0',
		 'thumbnail'        =>    '1',
		 'extension'        =>    'jpg',
		);
		$sql = 'SELECT attach_id 
		        FROM ' . ATTACHMENTS_TABLE . ' 
		        WHERE ' . $db->sql_build_array('SELECT', $sql_array) .'
		        ORDER BY RAND() LIMIT 0,1';
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		$base_url = generate_board_url()."/download/file.php?id=";
		$append_url = "&amp;t=1";
		$dynamic_image = $base_url.$row['attach_id'].$append_url;
		return $dynamic_image;
	}

	/**
	 * Clean up post_text and forum_desc for non text data
	 *
	 * @return $text
	 * @access private
	 */
	private function lotusjeff_socialshare_strip_code($text)
	{
		$text = censor_text($text);
		strip_bbcode($text);
		$text = str_replace(array("&quot;", "/", "\n", "\t", "\r"), ' ', $text);
		$text = preg_replace(array("|http(.*)jpg|isU", "@(http(s)?://)?(([a-z0-9.-]+)?[a-z0-9-]+(!?\.[a-z]{2,4}))@"), ' ', $text);
		$text = preg_replace("/[^A-ZА-ЯЁ.,-–?]+/ui", " ", $text);
		$text = preg_replace("/\[(.*)?\](.*)?\[(.*)?\]/", ' ', $text);
		if (strlen($text) > 180)
		{
			$text_ar = explode("\n", wordwrap($text, 180));
			$text = $text_ar[0] . '...';
		}
		return $text;
	}

	/**
	 * Searches post_text for values between two variables. Will return multiples.
	 *
	 * @return $contents - array of values found
	 * @access private
	 */
	private function getContents($str, $startDelimiter, $endDelimiter)
	{
	  $contents = array();
	  $startDelimiterLength = strlen($startDelimiter);
	  $endDelimiterLength = strlen($endDelimiter);
	  $startFrom = $contentStart = $contentEnd = 0;
	  while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom)))
	  {
	    $contentStart += $startDelimiterLength;
	    $contentEnd = strpos($str, $endDelimiter, $contentStart);
	    if (false === $contentEnd)
	    {
	      break;
	    }
	    $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
	    $startFrom = $contentEnd + $endDelimiterLength;
	  }

	  return $contents;
	}
}
