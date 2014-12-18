<?php

namespace LinusRendahl;

/**
* FontAwesomeSocialIcons
*/
class SocialFontAwesome
{

	//array of social icons
	public $icons = array();

	//html to be returned
	public $html;

	//default icons
	public $default = array();

	//wrapper element for icons (default is none)
	public $wrapper_start;
	public $wrapper_end;
	
	/**
	 * Set default social icons
	 */
	function __construct()
	{
		//set default social icons
		$this->default = array(
			'facebook'	=> array(
					'class' => 'fa fa-facebook',
					'title'	=> 'Facebook'
				),
			'twitter'	=> array(
					'class'	=> 'fa fa-twitter',
					'title'	=> 'Twitter'
				),
			'instagram'	=> array(
					'class'	=> 'fa fa-instagram',
					'title'	=> 'Instagram'
				),
			'github'	=> array(
					'class'	=> 'fa fa-github',
					'title'	=> 'GitHub'
				),
			'linkedin'	=> array(
					'class'	=> 'fa fa-linkedin',
					'title'	=> 'LinkedIn'
				),
			'youtube'	=> array(
					'class'	=> 'fa fa-youtube',
					'title'	=> 'YouTube'
				),
			'tumblr'	=> array(
					'class'	=> 'fa fa-tumblr',
					'title'	=> 'Tumblr'
				),
			'vimeo'	=> array(
					'class'	=> 'fa fa-vimeo-square',
					'title'	=> 'Vimeo'
				)
			);
	}

	/**
	 * Adds a URL to social network
	 * @param string url
	 * @return SocialFontAwesome $this
	 */
	public function add($url)
	{
		//get the domain name from URL (without TLD)
		$domain = $this->getDomain($url);

		//does this social network exist in the defaults?
		if(array_key_exists($domain, $this->default)) {
			$this->icons[$domain] = array(
					'class'	=> $this->default[$domain]['class'],
					'title'	=> $this->default[$domain]['title'],
					'url'	=> $url
				);
		}

		return $this;
	}

	/**
	 * Add a custom icon that doesn't exist in the defaults
	 * @param string url
	 * @return SocialFontAwesome $this
	 */
	public function addCustom($url, $class, $title=null)
	{
		//get the domain name from URL (without TLD)
		$domain = $this->getDomain($url);

		//create new custom icon
		$this->icons[$domain] = array(
					'class'	=> $class,
					'title'	=> $title,
					'url'	=> $url
				);

		return $this;
	}

	/**
	 * Set a custom title for a icon
	 * @param string $title
	 * @return SocialFontAwesome $this
	 */
	public function title($title = null)
	{
		end($this->icons);						//set internal pointer to end of array
		$key = key($this->icons);				//get the key of last element
		$this->icons[$key]['title'] = $title;	//set new title

		return $this;
	}

	/**
	 * Set a HTML element as a wrapper for the icons
	 * @param string $start element
	 * @param string $end element
	 * @return SocialFontAwesome $this
	 */
	public function wrapper($start = null, $end = null)
	{
		$this->wrapper_start = $start;
		$this->wrapper_end = $end;

		return $this;
	}

	/**
	 * Set a custom class for a icon
	 * @param string $class
	 * @return SocialFontAwesome $this
	 */
	public function setClass($class = null)
	{
		end($this->icons); //set internal pointer to end of array
		$key = key($this->icons); //get the key of last element
		$this->icons[$key]['class'] = $this->icons[$key]['class'] . ' ' . $class; //set new title

		return $this;
	}

	/**
	 * Returns generated HTML for the social icons
	 * @return string $this->html
	 */
	public function getHtml()
	{
		//start of wrapper if set
		if(!empty($this->wrapper_start))
			$this->html .= $this->wrapper_start;

		//loop through icons
		foreach($this->icons as $key => $value) {

			$this->html .= '<a href="' . $value['url'] . '"title="' . $value['title'] . '"><i class="' . $value['class'] . '"></i></a>'; }

		if(!empty($this->wrapper_end))
			$this->html .= $this->wrapper_end;

		return $this->html;
	}

	/** 
	 * Returns unformated array of the social icons
	 * @return array $this->icons
	 */
	public function getArray()
	{
		return $this->icons;
	}

	/**
	* Parse URL and return the base domain name
	* @param string $url
	* @return string $domain
	*/
	public function getDomain($url)
	{
		$domain = parse_url($url, PHP_URL_HOST); 	//Get host from URL.
		$domain = str_replace('www.', '', $domain);	//Remove www. if set.
		$domain = explode('.', $domain)[0];			//Remove TLD from host.

		return $domain;
	}

}