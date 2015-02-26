## Introduction

Mustache is a [Viper 4](http://modules.viperframework.com/mustache) module for using [Mustache](http://mustache.github.com/) templates in your application.

## Install

### Configuration

## Usage

To use, simply create a POPO (Plain Old PHP Object) like so:

```php
<?php

class View_Test
{
	public $hello = 'world';

	public function testing()
	{
		return 'foobar';
	} // End Method

} // End Class
```

And create a mustache renderer. The parameter to the engine method is the template name to use.

```php
<?php

$renderer = Mustache::factory();
```

And render it:

```php
<?php

$this->response->body($renderer->render(new View_Test));
```
### Templates

Templates should go in the `templates/` directory in your cascading file system. They should have a .mustache extension.

### Partials

Partials are loaded automatically based on the name used in the template. So if you reference `{{>foobar}}` in your template, it will look for that partial in `templates/partials/foobar.mustache`.

## Layouts

Mustache supports layouts. To use, just add a `templates/layout.mustache` file (a simple one is already provided), and use `Mustache_Layout` for your renderer instead of `Mustache`. You'll probably want to put a `$title` property in your view class. The layout should include a `{{>content}}` partial to render the body of the page.

## Additional Information

For specific usage and documentation, see:

[PHP Mustache](http://github.com/bobthecow/mustache.php)

[Original Mustache](http://mustache.github.com/)







