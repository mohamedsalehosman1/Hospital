<?php

namespace App\Components;

use Laraeast\LaravelBootstrapForms\Components\BaseComponent;

class ImageComponent extends BaseComponent
{
    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'components.image';

    /**
     * The image file path.
     *
     * @var string
     */
    protected $file;

    /**
     * Initialized the input arguments.
     *
     * @param mixed ...$arguments
     * @return $this
     */
    public function init(...$arguments)
    {
        $this->name = $name = $arguments[0] ?? null;

        $this->value = ($arguments[1] ?? null) ?: 'http://via.placeholder.com/100x100';

        //$this->setDefaultLabel();

        //$this->setDefaultNote();

        //$this->setDefaultPlaceholder();

        return $this;
    }

    /**
     * Set the file path.
     *
     * @param $file
     * @return $this
     */
    public function file($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * The variables with registerd in view component.
     *
     * @return array
     */
    protected function viewComposer()
    {
        return [
            'file' => $this->file,
        ];
    }
}
