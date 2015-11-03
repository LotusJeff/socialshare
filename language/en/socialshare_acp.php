<?php
/**
 *
 * Dyanmic Opengraph and Twitter Meta tags extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Jeff Cocking
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'LOTUSJEFF_SOCIALSHARE_ALIGN'					=> 'Alignment',
	'LOTUSJEFF_SOCIALSHARE_BLOGGER_ICON'			=> 'Blogger',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_CONFIG'			=> 'Select Social Media Options for Social Share',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_OPTION'			=> 'Enable',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_SEQUENCE'			=> 'Sequence Order',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_TYPE'				=> 'Social Media',
	'LOTUSJEFF_SOCIALSHARE_CENTER'					=> 'Center',
	'LOTUSJEFF_SOCIALSHARE_CUST1'					=> 'Enable Custom Location 1 Icons',
	'LOTUSJEFF_SOCIALSHARE_CUST1_CONFIG'			=> 'Custom Location 1 Social Share Icons',
	'LOTUSJEFF_SOCIALSHARE_CUST_EXPLAIN'			=> 'Custom location allows placement of icons within your templates/themes. Copy the code and paste within your template/theme.',
	'LOTUSJEFF_SOCIALSHARE_CUST2'					=> 'Enable Custom Location 2 Icons',
	'LOTUSJEFF_SOCIALSHARE_CUST2_CONFIG'			=> 'Custom Location 2 Social Share Icons',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_IMAGE'			=> 'Default Image',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_IMAGE_EXPLAIN'	=> 'Enter the URL for the default image. Must be a full http://www.yoursite.tld.',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_IMAGE_YES'		=> 'Default',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_RSS'				=> '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperlink for RSS Feed',
	'LOTUSJEFF_SOCIALSHARE_DELICIOUS_ICON'			=> 'Delicious',
	'LOTUSJEFF_SOCIALSHARE_DIGG_ICON'				=> 'Digg',
	'LOTUSJEFF_SOCIALSHARE_FACEBOOK'				=> 'Enable OpenGraph MetaTags (Facebook)',
	'LOTUSJEFF_SOCIALSHARE_FACEBOOK_ICON'			=> 'Facebook',
	'LOTUSJEFF_SOCIALSHARE_FIRST_IMAGE'				=> 'Which image to use',
	'LOTUSJEFF_SOCIALSHARE_FIRST_IMAGE_EXPLAIN'		=> 'Pick which image will be used. The First or Last image of the topic per page.',
	'LOTUSJEFF_SOCIALSHARE_FIRST_IMAGE_YES'			=> 'First',
	'LOTUSJEFF_SOCIALSHARE_FOOT'					=> 'Enable Footer Icons',
	'LOTUSJEFF_SOCIALSHARE_FOOT_CONFIG'				=> 'Footer Social Share Icons',
	'LOTUSJEFF_SOCIALSHARE_GOOGLE_ICON'				=> 'Google',
	'LOTUSJEFF_SOCIALSHARE_HOVER'					=> 'Enable Hover Icons',
	'LOTUSJEFF_SOCIALSHARE_HOVER_CONFIG'			=> 'Hover Social Share Icons',
	'LOTUSJEFF_SOCIALSHARE_HOVER_MARGIN'			=> 'Top Margin for Hover Icons',
	'LOTUSJEFF_SOCIALSHARE_HOVER_MARGIN_EXPLAIN'	=> 'This is the spcae in pixels between the top of the browser window and the top of the icons.',
	'LOTUSJEFF_SOCIALSHARE_HOVER_SIDE'				=> 'Location of Icons',
	'LOTUSJEFF_SOCIALSHARE_ICON_SIZE_16'			=> '16px by 16px Icons',
	'LOTUSJEFF_SOCIALSHARE_ICON_SIZE_24'			=> '24px by 24px Icons',
	'LOTUSJEFF_SOCIALSHARE_ICON_SIZE_32'			=> '32px by 32px Icons',
	'LOTUSJEFF_SOCIALSHARE_LAST_IMAGE_YES'			=> 'Last',
	'LOTUSJEFF_SOCIALSHARE_LEFT'					=> 'Left',
	'LOTUSJEFF_SOCIALSHARE_LEFT_HOVER'				=> 'Left edge of browser',
	'LOTUSJEFF_SOCIALSHARE_LEFT_MARGIN'				=> 'Left side of content',
	'LOTUSJEFF_SOCIALSHARE_LINKEDIN_ICON'			=> 'Linkedin',
	'LOTUSJEFF_SOCIALSHARE_META_SETTINGS'			=> 'OpenGraph (Facebook) and Twitter Meta Tag Configuration',
	'LOTUSJEFF_SOCIALSHARE_MYSPACE_ICON'			=> 'Myspace',
	'LOTUSJEFF_SOCIALSHARE_NAVBAR'					=> 'Enable Navbar Icons',
	'LOTUSJEFF_SOCIALSHARE_NAVBAR_CONFIG'			=> 'Nav Bar Social Share Icons',
	'LOTUSJEFF_SOCIALSHARE_PINTEREST_ICON'			=> 'Pinterest',
	'LOTUSJEFF_SOCIALSHARE_ODK_ICON'				=> 'Odnoklassniki',
	'LOTUSJEFF_SOCIALSHARE_POST'					=> 'Enable First Post Icons',
	'LOTUSJEFF_SOCIALSHARE_POST_CONFIG'				=> 'First Post Social Share Icons',
	'LOTUSJEFF_SOCIALSHARE_RANDOM_IMAGE'			=> 'No Image Directions',
	'LOTUSJEFF_SOCIALSHARE_RANDOM_IMAGE_EXPLAIN'	=> 'Pages without images require an alternative image. Random picks an random immage from the attachment database assigned to a topic for use. Default requires a defined image to be used. ',
	'LOTUSJEFF_SOCIALSHARE_RANDOM_IMAGE_YES'		=> 'Random',
	'LOTUSJEFF_SOCIALSHARE_REDIDIT_ICON'			=> 'Reddit',
	'LOTUSJEFF_SOCIALSHARE_SETTINGS_SAVED'			=> 'Settings Saved.',
	'LOTUSJEFF_SOCIALSHARE_RSS_ICON'				=> 'RSS',
	'LOTUSJEFF_SOCIALSHARE_RIGHT'					=> 'Right',
	'LOTUSJEFF_SOCIALSHARE_RIGHT_HOVER'				=> 'Right edge of browser',
	'LOTUSJEFF_SOCIALSHARE_SOCIAL'					=> 'Enable Social Share',
	'LOTUSJEFF_SOCIALSHARE_SOCIAL_CONFIG'			=> 'Social Share Configuration',
	'LOTUSJEFF_SOCIALSHARE_SIZE'					=> 'Size of Icons',
	'LOTUSJEFF_SOCIALSHARE_STUMBLE_ICON'			=> 'StumbleOn',
	'LOTUSJEFF_SOCIALSHARE_TITLE'					=> 'Social Share with Opengraph Tags',
	'LOTUSJEFF_SOCIALSHARE_TUMBLER_ICON'			=> 'Tumbler',
	'LOTUSJEFF_SOCIALSHARE_TWITTER'					=> 'Enable Twitter Cards',
	'LOTUSJEFF_SOCIALSHARE_TWITTER_SITE'			=> 'Twitter @username',
	'LOTUSJEFF_SOCIALSHARE_TWITTER_SITE_EXPLAIN'	=> 'Enter the @username associated with this website. Must include the @',
	'LOTUSJEFF_SOCIALSHARE_TWITTER_ICON'			=> 'Twitter',
	'LOTUSJEFF_SOCIALSHARE_VK_ICON'					=> 'VK',
	'LOTUSJEFF_SOCIALSHARE_CATEGORY'				=> 'Social Share w/ Opengraph Tags',
	'LOTUSJEFF_SOCIALSHARE_SETTINGS'				=> 'Settings',
	'LOTUSJEFF_SOCIALSHARE_INVALID_TWITTER_NAME'	=> 'Invalid Twitter Name. Please use @twittername.',
	'LOTUSJEFF_SOCIALSHARE_INVALID_IMAGE_LINK'		=> 'Default Image Link is a invalid format.  Please use http://wwww.yourserver.com/path/to/image.jpg',
	'LOTUSJEFF_SOCIALSHARE_INVALID_IMAGE_SETTING'	=> 'A default image must be defined when default image is selected.',
	'LOTUSJEFF_SOCIALSHARE_INVALID_RSS_SETTING'		=> 'A default RSS feed must be defined when RSS icon is selected.',
	'LOTUSJEFF_SOCIALSHARE_INVALID_FACEBOOK_TAG_SETTING' => 'Opengraph Metatags must be enabled for Social Share to work',
));
