social-fontawesome
==================

PHP Class to generate social links with FontAwesome icons.

##Note
This module does not add FontAwesome to your project. This will have to be added by yourself.

##Installation
Either download or use composer:
```json
"require": {
        "linusrendahl/social-fontawesome": "1.*"
}
```


##Basic usage
Usage:
```php
//create the object
$icons = new LinusRendahl\SocialFontAwesome;

//add some icons with the add method
$icons
	->add('http://www.facebook.com')
	->add('http://twitter.com')
	->add('http://instagram.com');

//get the html
$html = $icons->getHtml();
```
Returns:
```html
<a href="http://www.facebook.com"title="Facebook">
	<i class="fa fa-facebook"></i>
</a>
<a href="http://twitter.com"title="Twitter">
	<i class="fa fa-twitter"></i>
</a>
<a href="http://instagram.com"title="Instagram">
	<i class="fa fa-instagram"></i>
</a>
```

##Icons & Social Networks supported by default
- Facebook
- Twitter
- Instagram
- GitHub
- LinkedIn
- Youtube
- Tumblr
- Vimeo

##Methods
####add
Add your URL to your social network with the add method. Use only if the social network is in the defaults listed above.
```php
->add('http://facebook.com/user')
```
Returns:
```html
<a href="http://facebook.com/user" title="Facebook">
	<i class="fa fa-facebook"></i>
</a>
```

####addCustom
If your link is not in the supported defaults, use this method to create your own.
```php
//addCustom($url, $class, $title=null)
->addCustom('http://some-other-network.com/user', 'fa fa-some-icon', 'My title!')
```
Returns:
```html
<a href="http://some-other-network.com/user" title="My title!">
	<i class="fa fa-some-icon"></i>
</a>
```

####title
Change the title for the default icons using this method.
```php
->add('http://facebook.com/user')->title('Welcome to my Facebook page!')
```
Returns:
```html
<a href="http://facebook.com/user" title="Welcome to my Facebook page!">
	<i class="fa fa-facebook"></i>
</a>
```

####wrapper
Add a HTML element to wrap around your icons.
```php
->add('http://facebook.com/user')->wrapper('<div class="wrapper">', '</div>')
```
Returns:
```html
<div class="wrapper">
	<a href="http://facebook.com/user" title="Facebook">
		<i class="fa fa-facebook"></i>
	</a>
</div>
```

####setClass
Add a custom class to the i element.
```php
->add('http://facebook.com/user')->setClass('foobar')
```
Returns:
```html
<a href="http://facebook.com/user" title="Facebook">
	<i class="fa fa-facebook foobar"></i>
</a>
```

####setClass
Add a custom class to the i element.
```php
->add('http://facebook.com/user')->setClass('foobar')
```
Returns:
```html
<a href="http://facebook.com/user" title="Facebook">
	<i class="fa fa-facebook foobar"></i>
</a>
```

####getHtml
Method to return the formatted HTML.
```php
->getHtml()
```

####getArray
Method to return the raw array of icons to easily format with your own markup
```php
->getArray()
```

##Complete Example
Usage:
```php
//create the object
$icons = new LinusRendahl\SocialFontAwesome;

//add some icons with the add method
$icons
	->add('http://www.facebook.com')
	->add('http://twitter.com')->title('My Twitter Page!')
	->add('http://instagram.com')->title('Cool pictures!')->setClass('foobar')
	->wrapper('<div class="wrapper">', '</div>');

//get the html
$html = $icons->getHtml();

echo $html;
```

Returns:
```html
<div class="wrapper">
	<a href="http://www.facebook.com" title="Facebook">
		<i class="fa fa-facebook"></i>
	</a>
	<a href="http://twitter.com" title="My Twitter Page!">
		<i class="fa fa-twitter"></i>
	</a>
	<a href="http://instagram.com" title="Cool pictures!">
		<i class="fa fa-facebook foobar"></i>
	</a>
</div>
```

##History
####v1.0.2
- Added as a composer package at Packagist.

####v1.0
- First release.

