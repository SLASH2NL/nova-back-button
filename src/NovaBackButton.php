<?php

namespace SLASH2NL\NovaBackButton;

use Illuminate\Mail\Markdown;
use Laravel\Nova\Card;

class NovaBackButton extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';

    /**
     * Create a new element.
     *
     * @param  string|null  $component
     * @return void
     */
    public function __construct($component = null)
    {
        parent::__construct($component);

        $this->withMeta([
            'center' => false,
            'withoutCardStyles' => true,
            'forceFullWidth' => false,
            'content' => '<span class="btn btn-icon btn-default btn-white" style="position: absolute; top: -2.25rem;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </span>',
            'url' => null,
        ]);
    }

    /** @inheritDoc */
    public function component()
    {
        return 'nova-back-button';
    }

    /**
     * Set HTML code to display in a card
     *
     * @param string $htmlContent
     * @return NovaBackButton
     */
    public function html(string $htmlContent)
    {
        return $this->withMeta(['content' => $htmlContent]);
    }

    /**
     * Set Markdown code to display in a card (converted into HTML)
     *
     * @param string $htmlContent
     * @return NovaBackButton
     */
    public function markdown(string $markdownContent)
    {
        $htmlContent = Markdown::parse($markdownContent)->toHtml();

        return $this->html($htmlContent);
    }

    /**
     * Use blade view file to render Card content.
     *
     * @param string $view
     * @param array  $viewData
     * @return NovaBackButton
     */
    public function view(string $view, array $viewData = [])
    {
        $htmlContent = (string) view($view, $viewData);

        return $this->html($htmlContent);
    }

    /**
     * Center card's content
     *
     * @param bool $centerContent
     * @return NovaBackButton
     */
    public function center(bool $centerContent = true)
    {
        return $this->withMeta(['center' => $centerContent]);
    }

    /**
     * URL for the card. Can be an array with a Vue router value or just a string.
     *
     * @param mixed $url
     * @return NovaBackButton
     */
    public function url($url = null)
    {
        return $this->withMeta(['url' => $url]);
    }

    /**
     * Force Nova to apply full width for a card.
     * Nova has undocumented feature to auto-order cards based on width and put
     * full-width cards at the bottom. If you want to display full-width cards
     * not at the end, you should use with=1/3 or 2/3 and this method.
     * @see https://github.com/laravel/nova-issues/issues/1895#issuecomment-543684472
     *
     * @param bool $forceFullWidth
     * @return NovaBackButton
     */
    public function forceFullWidth(bool $forceFullWidth = true)
    {
        return $this->withMeta(['forceFullWidth' => $forceFullWidth]);
    }

    /**
     * Whether to use standard Nova Card styles for a card (background, padding, etc)
     *
     * @param bool $withoutStyles
     * @return NovaBackButton
     */
    public function withoutCardStyles(bool $withoutStyles = true)
    {
        return $this->withMeta(['withoutCardStyles' => $withoutStyles]);
    }
}
