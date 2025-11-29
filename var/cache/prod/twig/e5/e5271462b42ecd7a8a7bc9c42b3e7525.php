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

/* @ContaoCore/Error/missing_route_parameters.html.twig */
class __TwigTemplate_e84c4eb8a96da4deac1cd8c0aa1d7ad8 extends Template
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

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "    ";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.title", [], "contao_exception"), "contao_html", null, true);
        yield "
";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_matter(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "    <p>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.matter", [], "contao_exception"), "contao_html", null, true);
        yield "</p>
";
        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_explain(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 11
        yield "    <p>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.explain", [], "contao_exception"), "contao_html", null, true);
        yield "</p>
    <p>";
        // line 12
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.path", [], "contao_exception"), "contao_html", null, true);
        yield ": <code>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["throwable"] ?? null), "route", [], "any", false, false, false, 12), "path", [], "any", false, false, false, 12), "contao_html", null, true);
        yield "</code></p>
    <table>
        <thead>
        <tr>
            <th>";
        // line 16
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterName", [], "contao_exception"), "contao_html", null, true);
        yield "</th>
            <th>";
        // line 17
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterRequirement", [], "contao_exception"), "contao_html", null, true);
        yield "</th>
            <th>";
        // line 18
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterDefault", [], "contao_exception"), "contao_html", null, true);
        yield "</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["throwable"] ?? null), "route", [], "any", false, false, false, 22), "requirements", [], "any", false, false, false, 22));
        foreach ($context['_seq'] as $context["variable"] => $context["requirement"]) {
            // line 23
            yield "            <tr>
                <td>";
            // line 24
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["variable"], "contao_html", null, true);
            yield "</td>
                <td><code>";
            // line 25
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["requirement"], "contao_html", null, true);
            yield "</code></td>
                <td>";
            // line 26
            if (Twig\Extension\CoreExtension::testEmpty((($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["throwable"] ?? null), "route", [], "any", false, false, false, 26), "defaults", [], "any", false, false, false, 26)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[$context["variable"]] ?? null) : null))) {
                yield "<i>";
                yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterEmpty", [], "contao_exception"), "contao_html", null, true);
                yield "</i>";
            } else {
                yield $this->env->getFilter('escape')->getCallable()($this->env, (($_v1 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["throwable"] ?? null), "route", [], "any", false, false, false, 26), "defaults", [], "any", false, false, false, 26)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[$context["variable"]] ?? null) : null), "contao_html", null, true);
            }
            yield "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['variable'], $context['requirement'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "        </tbody>
    </table>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Error/missing_route_parameters.html.twig";
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
        return array (  149 => 29,  134 => 26,  130 => 25,  126 => 24,  123 => 23,  119 => 22,  112 => 18,  108 => 17,  104 => 16,  95 => 12,  90 => 11,  83 => 10,  75 => 8,  68 => 7,  60 => 5,  53 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoCore/Error/missing_route_parameters.html.twig", "/var/www/html/contao-live/vendor/contao/core-bundle/src/Resources/views/Error/missing_route_parameters.html.twig");
    }
}
