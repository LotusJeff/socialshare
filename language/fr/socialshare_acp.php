<?php
/**
*
* @package phpBB Extension - Social Share
* @copyright (c) 2016 Jeff Cocking
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	'LOTUSJEFF_SOCIALSHARE_ALIGN'					=> 'Alignement',
	'LOTUSJEFF_SOCIALSHARE_BLOGGER_ICON'			=> 'Blogger',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_CONFIG'			=> 'Selectionnez les options pour les médias sociaux',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_OPTION'			=> 'Activer',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_SEQUENCE'			=> 'Ordre séquentiel',
	'LOTUSJEFF_SOCIALSHARE_BUTTON_TYPE'				=> 'Medias sociaux',
	'LOTUSJEFF_SOCIALSHARE_CENTER'					=> 'Centre',
	'LOTUSJEFF_SOCIALSHARE_CUST1'					=> 'Activer l’emplacement personnalisé “1”',
	'LOTUSJEFF_SOCIALSHARE_CUST1_CONFIG'			=> 'Emplacement personnalisé “1” des icônes',
	'LOTUSJEFF_SOCIALSHARE_CUST_EXPLAIN'			=> 'Vous pouvez personnaliser l’emplacement des icônes dans vos templates/themes en copiant-collant le code',
	'LOTUSJEFF_SOCIALSHARE_CUST2'					=> 'Activer l’emplacement personnalisé  “2” des icônes',
	'LOTUSJEFF_SOCIALSHARE_CUST2_CONFIG'			=> 'Emplacement personnalisé “2”  des icônes',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_IMAGE'			=> 'Image par défaut',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_IMAGE_EXPLAIN'	=> 'Indiquez le chemin complet vers l’image par défaut exemple <samp>http://www.yoursite.tld</samp>.',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_IMAGE_YES'		=> 'Défaut',
	'LOTUSJEFF_SOCIALSHARE_DEFAULT_RSS'				=> '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lien vers RSS Feed',
	'LOTUSJEFF_SOCIALSHARE_DELICIOUS_ICON'			=> 'Delicious',
	'LOTUSJEFF_SOCIALSHARE_DIGG_ICON'				=> 'Digg',
	'LOTUSJEFF_SOCIALSHARE_FACEBOOK'				=> 'Activer les meta tags Open Graph (Facebook)',
	'LOTUSJEFF_SOCIALSHARE_FACEBOOK_ICON'			=> 'Facebook',
	'LOTUSJEFF_SOCIALSHARE_FIRST_IMAGE'				=> 'Image à utiliser',
	'LOTUSJEFF_SOCIALSHARE_FIRST_IMAGE_EXPLAIN'		=> 'Choisir l’image à utiliser. La première ou la dernière de chaque sujet.',
	'LOTUSJEFF_SOCIALSHARE_FIRST_IMAGE_YES'			=> 'Première',
	'LOTUSJEFF_SOCIALSHARE_FOOT'					=> 'Activer l’affichage des icônes dans le pied de page',
	'LOTUSJEFF_SOCIALSHARE_FOOT_CONFIG'				=> 'Pied de page (footer)',
	'LOTUSJEFF_SOCIALSHARE_GOOGLE_ICON'				=> 'Google+',
	'LOTUSJEFF_SOCIALSHARE_HOVER'					=> 'Activer l’affichage de la barre flottante des icônes',
	'LOTUSJEFF_SOCIALSHARE_HOVER_CONFIG'			=> 'Barre flottante',
	'LOTUSJEFF_SOCIALSHARE_HOVER_MARGIN'			=> 'Taille de la marge',
	'LOTUSJEFF_SOCIALSHARE_HOVER_MARGIN_EXPLAIN'	=> 'Ceci est l’espace en pixels entre le bord supérieur de la fenêtre du navigateur et le haut des icônes.',
	'LOTUSJEFF_SOCIALSHARE_HOVER_SIDE'				=> 'Emplacement des icônes',
	'LOTUSJEFF_SOCIALSHARE_ICON_SIZE_16'			=> '16px par 16px',
	'LOTUSJEFF_SOCIALSHARE_ICON_SIZE_24'			=> '24px par 24px',
	'LOTUSJEFF_SOCIALSHARE_ICON_SIZE_32'			=> '32px par 32px',
	'LOTUSJEFF_SOCIALSHARE_LAST_IMAGE_YES'			=> 'Dernière',
	'LOTUSJEFF_SOCIALSHARE_LEFT'					=> 'Gauche',
	'LOTUSJEFF_SOCIALSHARE_LEFT_HOVER'				=> 'Bord gauche du navigateur',
	'LOTUSJEFF_SOCIALSHARE_LEFT_MARGIN'				=> 'À gauche du contenu',
	'LOTUSJEFF_SOCIALSHARE_LINKEDIN_ICON'			=> 'Linkedin',
	'LOTUSJEFF_SOCIALSHARE_META_SETTINGS'			=> 'Configuration Open Graph (Facebook) et Meta tags Twitter',
	'LOTUSJEFF_SOCIALSHARE_MYSPACE_ICON'			=> 'Myspace',
	'LOTUSJEFF_SOCIALSHARE_NAVBAR'					=> 'Activer la barre de partage des icônes',
	'LOTUSJEFF_SOCIALSHARE_NAVBAR_CONFIG'			=> 'Barre de partage des icônes',
	'LOTUSJEFF_SOCIALSHARE_PINTEREST_ICON'			=> 'Pinterest',
	'LOTUSJEFF_SOCIALSHARE_ODK_ICON'				=> 'Odnoklassniki',
	'LOTUSJEFF_SOCIALSHARE_POST'					=> 'Activer l’affichage des icônes dans les premiers messages',
	'LOTUSJEFF_SOCIALSHARE_POST_CONFIG'				=> 'Premiers messages',
	'LOTUSJEFF_SOCIALSHARE_RANDOM_IMAGE'			=> 'Pages sans images',
	'LOTUSJEFF_SOCIALSHARE_RANDOM_IMAGE_EXPLAIN'	=> 'Les pages sans images nécessitent une image alternative. En mode aléatoire, une image de la base de données des fichiers joints sera affichée.',
	'LOTUSJEFF_SOCIALSHARE_RANDOM_IMAGE_YES'		=> 'Aléatoire',
	'LOTUSJEFF_SOCIALSHARE_REDIDIT_ICON'			=> 'Reddit',
	'LOTUSJEFF_SOCIALSHARE_SETTINGS_SAVED'			=> 'La configuration a été sauvegardée.',
	'LOTUSJEFF_SOCIALSHARE_RSS_ICON'				=> 'RSS',
	'LOTUSJEFF_SOCIALSHARE_RIGHT'					=> 'Droite',
	'LOTUSJEFF_SOCIALSHARE_RIGHT_HOVER'				=> 'Bord droit du navigateur',
	'LOTUSJEFF_SOCIALSHARE_SOCIAL'					=> 'Activer les partages sociaux',
	'LOTUSJEFF_SOCIALSHARE_SOCIAL_CONFIG'			=> 'Configuration',
	'LOTUSJEFF_SOCIALSHARE_SIZE'					=> 'Taille des icônes',
	'LOTUSJEFF_SOCIALSHARE_STUMBLE_ICON'			=> 'StumbleOn',
	'LOTUSJEFF_SOCIALSHARE_TITLE'					=> 'Partages sociaux Open graph',
	'LOTUSJEFF_SOCIALSHARE_TUMBLER_ICON'			=> 'Tumbler',
	'LOTUSJEFF_SOCIALSHARE_TWITTER'					=> 'Activer Twitter Cards',
	'LOTUSJEFF_SOCIALSHARE_TWITTER_SITE'			=> 'Twitter @nom utilisateur',
	'LOTUSJEFF_SOCIALSHARE_TWITTER_SITE_EXPLAIN'	=> 'Entrez le @nom utilisateur associé à votre site. Il doit être précédé de @',
	'LOTUSJEFF_SOCIALSHARE_TWITTER_ICON'			=> 'Twitter',
	'LOTUSJEFF_SOCIALSHARE_VK_ICON'					=> 'VK',
	'LOTUSJEFF_SOCIALSHARE_CATEGORY'				=> 'Partages sociaux avec les tags Open graph',
	'LOTUSJEFF_SOCIALSHARE_SETTINGS'				=> 'Configuration',
	'LOTUSJEFF_SOCIALSHARE_INVALID_TWITTER_NAME'	=> 'Le nom Twitter est incorrect.',
	'LOTUSJEFF_SOCIALSHARE_INVALID_IMAGE_LINK'		=> 'Le lien vers l’image par défaut n’est pas valide. Example : http://wwww.yourserver.com/path/to/image.jpg',
	'LOTUSJEFF_SOCIALSHARE_INVALID_IMAGE_SETTING'	=> 'Une image par défaut doit être sélectionnée lorsque le choix défaut a été choisi.',
	'LOTUSJEFF_SOCIALSHARE_INVALID_RSS_SETTING'		=> 'Un flux RSS par défaut doit être défini lorsque l’icône RSS est sélectionnée.',
	'LOTUSJEFF_SOCIALSHARE_INVALID_FACEBOOK_TAG_SETTING' => 'Les meta tags Open Graph doivent être activées pour faire fonctionner les partages vers Facebook',
));
