social-fontawesome
==================

PHP Class to generate social links with FontAwesome icons.

##Basic Usage

```php
$icons = new LinusRendahl\SocialFontAwesome;
$icons
	->add('http://www.facebook.com/liren')->title('Welcome to my Facebook Page!')
	->add('http://twitter.com/liren')
	->add('http://instagram.se')
	->add('http://github.com')->title('something else')
	->add('http://linkedin.com')
	->add('http://youtube.com')
	->add('http://tumblr.com')
	->add('http://vimeo.com')->setClass('whatever')
	->addCustom('http://www.google.com', 'fa fa-google', 'Google');

$icons->wrapper('<div class="wrapper">', '</div>');

$html = $icons->getHtml();
```