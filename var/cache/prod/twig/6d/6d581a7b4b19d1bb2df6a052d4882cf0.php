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

/* @ContaoCore/Error/error.html.twig */
class __TwigTemplate_1f71dc2aef112c9771b211865aeac2f8 extends Template
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
            'title' => [$this, 'block_title'],
            'matter' => [$this, 'block_matter'],
            'howToFix' => [$this, 'block_howToFix'],
            'explain' => [$this, 'block_explain'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "@ContaoCore/Error/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("@ContaoCore/Error/layout.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "    ";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.error", [], "contao_exception"), "contao_html", null, true);
        yield "
";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_matter(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        yield "    <p>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.errorOccurred", [], "contao_exception"), "contao_html", null, true);
        yield "</p>
";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_howToFix(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "    <p>";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.errorFixOne", [], "contao_exception");
        yield "</p>
";
        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_explain(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 13
        yield "    <p>";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.errorExplain", ["https://to.contao.org/support"], "contao_exception");
        yield "</p>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Error/error.html.twig";
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
        return array (  106 => 13,  99 => 12,  91 => 10,  84 => 9,  76 => 7,  69 => 6,  61 => 4,  54 => 3,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoCore/Error/error.html.twig", "/var/www/html/contao-live/vendor/contao/core-bundle/src/Resources/views/Error/error.html.twig");
    }
}
