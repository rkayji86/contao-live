<?php
/*
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace AutometaBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Routing\ResponseContext\HtmlHeadBag\HtmlHeadBag;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;
use Contao\System;

/**
 * Handles insert tags for news.
 *
 * @author Andreas Schempp <https://github.com/aschempp>
 */
#[AsHook('generatePage')]
class SetInsertTagsForMetaData
{

    function __invoke(PageModel $objPage, LayoutModel $objLayout, PageRegular $objPageRegular)
    {
        $responseContext = System::getContainer()->get('contao.routing.response_context_accessor')->getResponseContext();
        if ($responseContext?->has(HtmlHeadBag::class)) {
            $htmlHeadBag = $responseContext->get(HtmlHeadBag::class);
            if ("" == $objPage->description) {
                $htmlHeadBag->setMetaDescription("[[seitenbeschreibung]]");
            }
            if ("" == $objPage->pageTitle) {
                $htmlHeadBag->setTitle("[[seitentitel]]");
            }
            if ("" == $GLOBALS['TL_KEYWORDS']) {
                $GLOBALS['TL_KEYWORDS'] = "[[keywords]]";
            }
        }
    }
}