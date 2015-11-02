# Social Sharing with OpenGraph Metatags (Facebook) for phpBB 3.1
===========

Extension for phpBB 3.1 to facilitate social media posting. This extension supports 15 different social media sites. Supports dynamically creating Opengraph tags to provide Title, Description, Images and URL for all pages.

##	Features
===========
###	Social Sharing
* Ability to have 6 different sharing locations
* * All or none can be turned on.
* *	Each location can have different sized icons (32px by 32px, 24px by 24px, 16px by 16px)
* *	Each location can have different alignment (Left, Centered, Right)
* *	4 locations are predefined.
* *	* Navigation bar in alignment with breadcrumbs
* *	* First post of each Topic page.
* *	* Footer of Page
* *	* Hover outside of content (left edge of browser, right edge of browser, left of forum content, hieght of hover from top of browser)
* *	2 locations are user defined
* *	* Code is provided to add social share icons within your theme at your choice
* *	*Ability to control icon size and alignment from within settings
* Ability to have up to 15 different social media sharing sites
* *	Blogger, Delicious, Digg, Facebook, Google Plus, Linkedin, Myspace, Odnoklassniki, Pinterest, Redidit, Stumbleupon, Tumbler, Twitter, VK and RSS.
* *	Turn on or off social media icons from settings.
* *	Change order of social media icons from settings.
###	OpenGraph MetaTags
* Ability to create Opengraph tags for all pages
* Ability to create Twitter Cards for all pages
* Ability to choose first or last image of page to use.
* Ability to choose a random image or a default image if no images are found on page.
### Screen Shots
! [Topic Page - Eaxmple One] (example1.jpg) 
! [Topic Page - Example Two] (example2.jpg) 
! [Top of ACP Settings] (admin_top.jpg) 
! [Bottom of ACP Settings] (admin_bot.jpg) 

## Requirements
* phpBB 3.1.2 or higher

## Installation
* Download Method
	# [Download the latest release](https://github.com/LotusJeff/socialshare) and unzip it (or use git clone.)
	# Unzip the downloaded release and copy it to the `ext` directory of your phpBB board. The directory strcuture should be phpBB3/ext/lotusjeff/socialshare
	# Navigate in the ACP to `Customise -> Manage extensions`.
	# Look for Social Share w/ Dynamic OpenGraph Tags under the Disabled Extensions list, and click its `Enable` link.

 * Git Clone Method

```
cd phpBB3  (base forum install)
git clone https://github.com/LotusJeff/socialshare.git ext/lotusjeff/socialshare/
```

### 2. activate
Go to ACP -> tab Customise -> Manage extensions -> enable Social Share w/ Dynamic OpenGraph Tags

### 3. configure

Goto ACP -> Extensions -> Social Sharing

## Update

Go to ACP -> tab Customise -> Manage extensions -> disable Social Share w/ Dynamic OpenGraph Tags

```
cd phpBB3/ext/lotusjeff/socialshare
git pull
```

Go to ACP -> tab Customise -> Manage extensions -> enable Social Share w/ Dynamic OpenGraph Tags

## Uninstallation
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for Fancybox.
3. To permanently uninstall, click `Delete Data`, then delete the `socialshare` folder from `phpBB3/ext/lotusjeff/`.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2015 - Jeff Cocking (LotusJeff)
