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

/* @Terminal42NotificationCenter/message.html.twig */
class __TwigTemplate_d59723417a67019b531e39703d11d399 extends Template
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
        yield "<div class=\"cte_type ";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "published", [], "any", false, false, false, 1)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("published") : ("unpublished"));
        yield "\">
    <strong>";
        // line 2
        yield $this->env->getFilter('e')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "title", [], "any", false, false, false, 2), "contao_html");
        yield "</strong>
    ";
        // line 3
        if ((($tmp = ($context["gateway"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 4
            yield "    - ";
            yield $this->env->getFilter('e')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["gateway"] ?? null), "title", [], "any", false, false, false, 4), "contao_html");
            yield "
    ";
        }
        // line 6
        yield "</div>
<div>
    <ul>
         ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 10
            yield "        <li>";
            yield $this->env->getFilter('e')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 10), "contao_html");
            yield "</li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        yield "    </ul>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@Terminal42NotificationCenter/message.html.twig";
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
        return array (  77 => 12,  68 => 10,  64 => 9,  59 => 6,  53 => 4,  51 => 3,  47 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@Terminal42NotificationCenter/message.html.twig", "/var/www/html/contao-live/vendor/terminal42/notification_center/templates/message.html.twig");
    }
}
