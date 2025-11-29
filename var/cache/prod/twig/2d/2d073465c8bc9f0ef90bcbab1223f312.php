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

/* @ContaoInstallation/misconfigured_database_url.html.twig */
class __TwigTemplate_2fad4b7bbb086fadb93403d3fdf00f03 extends Template
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

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@ContaoInstallation/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("@ContaoInstallation/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "    <fieldset class=\"tl_tbox nolegend\">
        <h3>";
        // line 6
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("an_error_occurred", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</h3>
        <p class=\"tl_error\">";
        // line 7
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_could_not_connect", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</p>
        <p>";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("misconfigured_database_url_explain", [], "ContaoInstallationBundle");
        yield "</p>
    </fieldset>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoInstallation/misconfigured_database_url.html.twig";
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
        return array (  69 => 8,  65 => 7,  61 => 6,  58 => 5,  51 => 4,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoInstallation/misconfigured_database_url.html.twig", "/var/www/html/contao-live/vendor/contao/installation-bundle/src/Resources/views/misconfigured_database_url.html.twig");
    }
}
