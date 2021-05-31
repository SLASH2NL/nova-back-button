# Nova Back Button

[![Latest Stable Version](https://poser.pugx.org/slash2nl/nova-back-button/v/stable)](https://packagist.org/packages/slash2nl/nova-back-button)
[![Total Downloads](https://poser.pugx.org/slash2nl/nova-back-button/downloads)](https://packagist.org/packages/slash2nl/nova-back-button)

Adds a card that implements a back button to Nova, the content can be fully customized. The url is called through the Vue router and without a url set a history.go(-1) is called.

![image](https://github.com/slash2nl/nova-back-button/blob/master/.github/example-a.png)
![image](https://github.com/slash2nl/nova-back-button/blob/master/.github/example-b.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require slash2nl/nova-back-button
```

## Usage

[Register your new card](https://nova.laravel.com/docs/3.0/customization/cards.html#registering-cards).

```php
use SLASH2NL\NovaBackButton\NovaBackButton;

public function cards()
{
    return [ 
        new NovaBackButton(),
        
        (new NovaBackButton())
            ->width('1/3')
            ->markdown('# Hello World!'),
        (new NovaBackButton())
            ->width('1/3')
            ->view('partials.back-button')
            ->url('/resources/entity/1'),
     ];
}
```

### Options
 - Set content, by default a back svg is used.
     - `->html('<h1>Hello!</h1>')`: Set HTML or plain content.
     - `->markdown('# Hello!')`: Set Markdown content that will be converted into HTML.
     - `->view('path.to.view', [])`: Specify blade view file and optionally pass an array of data to view.
 - Styling
    - `->center(false)`: Center card's content. `false` by default. 
    - `->withoutCardStyles(true)`: Whether to use standard Nova Card styles for a card (background, padding, etc). `false` by default.
    - `->forceFullWidth(true)`: Force the card to be full width. A fix for [nova cards order](https://github.com/laravel/nova-issues/issues/1895). 

## Source

This package was created with the help of: https://github.com/InteractionDesignFoundation/nova-html-card

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
