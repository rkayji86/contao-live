<?php

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use GlobalScripts\GlobalScripts;
use AutometaBundle\AutometaBundle;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Contao\NewsBundle\ContaoNewsBundle;
use FormAdd\FormAdd;
use PageAdd\PageAdd;
use FAQAdd\FAQAdd;
use ContentElements\ContentElements;
use CustomNews\CustomNewsBundle;
use Digiwerft\ListViewSortable\ListViewSortableBundle;
use Hofff\Contao\SocialTags\HofffContaoSocialTagsBundle;
use Ivo21\EmailForContent\EmailForContentBundle;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouteCollection;
use Terminal42\NotificationCenterBundle\NotificationCenter;

class ContaoManagerPlugin implements BundlePluginInterface, RoutingPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(GlobalScripts::class)->setLoadAfter([ContaoCoreBundle::class]),
            BundleConfig::create(AutometaBundle::class)->setLoadAfter([ContaoCoreBundle::class, HofffContaoSocialTagsBundle::class]),
            BundleConfig::create(FormAdd::class)->setLoadAfter([ContaoCoreBundle::class]),
            BundleConfig::create(FAQAdd::class)->setLoadAfter([ContaoCoreBundle::class, 'Contao\FaqBundle\ContaoFaqBundle']),
            BundleConfig::create(ContentElements::class)->setLoadAfter([ContaoCoreBundle::class]),
            BundleConfig::create(ListViewSortableBundle::class)->setLoadAfter([ContaoCoreBundle::class]),
            BundleConfig::create(CustomNewsBundle::class)->setLoadAfter([ContaoCoreBundle::class, ContaoNewsBundle::class]),
            BundleConfig::create(EmailForContentBundle::class)->setLoadAfter([ContaoCoreBundle::class, NotificationCenter::class]),
        ];
    }

    /**
     * REMOVE ALL ROUTING. Your bundle does not need routing.
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        return new RouteCollection();
    }
}
