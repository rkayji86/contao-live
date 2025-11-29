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

/* @ContaoCore/Image/Studio/figure.html.twig */
class __TwigTemplate_8e7a00f86016a10cc90369ec86fac9a7 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        $macros["studio"] = $this->macros["studio"] = $this->load("@ContaoCore/Image/Studio/_macros.html.twig", 1)->unwrap();
        // line 3
        yield $macros["studio"]->getTemplateForMacro("macro_figure", $context, 3, $this->getSourceContext())->macro_figure(...[($context["figure"] ?? null), Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", true, true, false, 3)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 3), [])) : ([])), ["attr" => ["class" => Twig\Extension\CoreExtension::trim(("image_container " . ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 4
($context["figure"] ?? null), "options", [], "any", false, true, false, 4), "attr", [], "any", false, true, false, 4), "class", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 4), "attr", [], "any", false, false, false, 4), "class", [], "any", false, false, false, 4), "")) : (""))))]])]);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Image/Studio/figure.html.twig";
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
        return array (  45 => 4,  44 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoCore/Image/Studio/figure.html.twig", "/var/www/html/contao-live/vendor/contao/core-bundle/src/Resources/views/Image/Studio/figure.html.twig");
    }
}
