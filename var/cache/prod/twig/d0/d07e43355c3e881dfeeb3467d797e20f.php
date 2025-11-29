<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @ContaoInstallation/layout.html.twig */
class __TwigTemplate_9a5a978ad99e8235bcc3a506d21403f1 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 2
        yield "<!DOCTYPE html>
<html lang=\"";
        // line 3
        yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["language"] ?? null), "contao_html", null, true);
        yield "\">
<head>

  <meta charset=\"utf-8\">
  <title>";
        // line 7
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("install_tool", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield " | ";
        yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["host"] ?? null), "contao_html", null, true);
        yield "</title>
  <meta name=\"generator\" content=\"Contao Open Source CMS\">
  <meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0,shrink-to-fit=no\">
  <meta name=\"robots\" content=\"noindex,nofollow\">

  <link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("system/themes/flexible/fonts.min.css"), "contao_html", null, true);
        yield "\">
  <link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("system/themes/flexible/basic.min.css"), "contao_html", null, true);
        yield "\">
  <link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("system/themes/flexible/install.min.css"), "contao_html", null, true);
        yield "\">

  <script>var Contao={theme:'flexible',path:'";
        // line 16
        yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["path"] ?? null), "contao_html", null, true);
        yield "'}</script>
  <script src=\"";
        // line 17
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/mootools/js/mootools.min.js"), "contao_html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 18
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/contaocore/mootao.min.js"), "contao_html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 19
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/contaocore/core.min.js"), "contao_html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 20
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("system/themes/flexible/hover.min.js"), "contao_html", null, true);
        yield "\"></script>

</head>
<body class=\"";
        // line 23
        yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["ua"] ?? null), "contao_html", null, true);
        yield "\">

  <header id=\"header\">
    <h1>";
        // line 26
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("install_tool", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</h1>
  </header>

  <div id=\"container\">
    <main id=\"main\">
      ";
        // line 31
        yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
        // line 32
        yield "    </main>
  </div>

</body>
</html>
";
        yield from [];
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoInstallation/layout.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  124 => 31,  114 => 32,  112 => 31,  104 => 26,  98 => 23,  92 => 20,  88 => 19,  84 => 18,  80 => 17,  76 => 16,  71 => 14,  67 => 13,  63 => 12,  53 => 7,  46 => 3,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoInstallation/layout.html.twig", "/var/www/html/contao-live/vendor/contao/installation-bundle/src/Resources/views/layout.html.twig");
    }
}
