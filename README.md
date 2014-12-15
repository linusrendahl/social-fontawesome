social-fontawesome
==================

PHP Class to generate social links with FontAwesome icons.

##Basic usage

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
Above code will return:
```¨html
<a href="http://www.facebook.com"title="Facebook"><i class="fa fa-facebook"></i></a>
<a href="http://twitter.com"title="Twitter"><i class="fa fa-twitter"></i></a>
<a href="http://instagram.com"title="Instagram"><i class="fa fa-instagram"></i></a>
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
