<?php

namespace Core\Template;

use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class TemplateRendererAwareTrait
 *
 * @package Core\Template
 */
trait TemplateRendererAwareTrait
{
    /** @var TemplateRendererInterface */
    private $renderer;

    /**
     * @param TemplateRendererInterface $renderer
     */
    public function setRenderer(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }
}