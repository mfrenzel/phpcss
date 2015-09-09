# phpcss

This is a PHP library to easily create valid CSS.

## Installation

To install this library via [Composer](http://getcomposer.org) add the following to your `composer.json` and then run `composer update`:

```
{
    "minimum-stability": "dev",
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/hielsnoppe/phpcss.git"
        }
    ],
    "require": {
        "hielsnoppe/phpcss": "master"
    }
}
```

## Usage

Given that you have the Composer autoloader in place, you can use PHPCSS as follows:

```
use \NielsHoppe\PHPCSS\Stylesheet as Stylesheet;
use \NielsHoppe\PHPCSS\Ruleset as Ruleset;
use \NielsHoppe\PHPCSS\Values\ColorValue as ColorValue;

$style = new Stylesheet();

$html = new Ruleset('html');
$html->addDeclaration('color', new ColorValue('#00f'));

$body = new Ruleset('body');
$body->addDeclaration('background-color', new ColorValue('rgb(128, 255 , 0, 0.5)'));
$body->addDeclaration('padding-top', '10px');

$style->addStatement($html);
$style->addStatement($body);

echo($style->toString());
```
