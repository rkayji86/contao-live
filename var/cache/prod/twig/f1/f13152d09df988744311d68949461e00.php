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

/* @Terminal42NotificationCenter/table.html.twig */
class __TwigTemplate_a9a081e47511e063cd43bee8ac158899 extends Template
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
        // line 2
        yield "
<table>
    <thead>
    <tr>
        <th>";
        // line 6
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("NC.before", [], "contao_default"), "html", null, true);
        yield "</th>
        <th>";
        // line 7
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("NC.after", [], "contao_default"), "html", null, true);
        yield "</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["changes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["change"]) {
            // line 12
            yield "        <tr>
            <td>";
            // line 13
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["change"], "before", [], "any", false, false, false, 13), "html", null, true);
            yield "</td>
            <td>";
            // line 14
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["change"], "after", [], "any", false, false, false, 14), "html", null, true);
            yield "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['change'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        yield "    </tbody>
</table>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@Terminal42NotificationCenter/table.html.twig";
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
        return array (  79 => 17,  70 => 14,  66 => 13,  63 => 12,  59 => 11,  52 => 7,  48 => 6,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@Terminal42NotificationCenter/table.html.twig", "/var/www/html/contao-live/vendor/terminal42/notification_center/templates/table.html.twig");
    }
}
