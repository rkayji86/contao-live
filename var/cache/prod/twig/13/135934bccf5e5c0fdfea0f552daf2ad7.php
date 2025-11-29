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

/* @ContaoInstallation/configuration_error.html.twig */
class __TwigTemplate_fff5cfbb01eed74b7c58308a9401c795 extends Template
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
        yield "  <fieldset class=\"tl_tbox nolegend\">
    <h3>";
        // line 6
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("an_error_occurred", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</h3>
    ";
        // line 7
        if ((($context["errorCode"] ?? null) == 1)) {
            // line 8
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("unsupported_version", [], "ContaoInstallationBundle"), "contao_html", null, true);
            yield "</p>
      <p>";
            // line 9
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("unsupported_version_explain", [($context["version"] ?? null)], "ContaoInstallationBundle"), "contao_html", null, true);
            yield "</p>
    ";
        } elseif ((        // line 10
($context["errorCode"] ?? null) == 2)) {
            // line 11
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("unsupported_collation", [], "ContaoInstallationBundle"), "contao_html", null, true);
            yield "</p>
      <p>";
            // line 12
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("unsupported_collation_explain", [($context["collation"] ?? null)], "ContaoInstallationBundle");
            yield "</p>
      <div id=\"sql_wrapper\">
        <pre>doctrine:
    dbal:
        connections:
            default:
                default_table_options:
                    charset: utf8
                    collation: utf8_unicode_ci</pre>
      </div>
    ";
        } elseif ((        // line 22
($context["errorCode"] ?? null) == 3)) {
            // line 23
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("unsupported_engine", [], "ContaoInstallationBundle"), "contao_html", null, true);
            yield "</p>
      <p>";
            // line 24
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("unsupported_engine_explain", [($context["engine"] ?? null)], "ContaoInstallationBundle");
            yield "</p>
      <div id=\"sql_wrapper\">
        <pre>doctrine:
    dbal:
        connections:
            default:
                default_table_options:
                    engine: MyISAM
                    row_format: ~</pre>
      </div>
    ";
        } elseif ((        // line 34
($context["errorCode"] ?? null) == 4)) {
            // line 35
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("engine_mismatch", [], "ContaoInstallationBundle"), "contao_html", null, true);
            yield "</p>
      <p>";
            // line 36
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("engine_mismatch_explain", [($context["engine"] ?? null)], "ContaoInstallationBundle");
            yield "</p>
      <div id=\"sql_wrapper\">
        <pre>doctrine:
    dbal:
        connections:
            default:
                default_table_options:
                    charset: utf8
                    collation: utf8_unicode_ci</pre>
      </div>
    ";
        } elseif ((        // line 46
($context["errorCode"] ?? null) == 5)) {
            // line 47
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("innodb_large_prefix", [], "ContaoInstallationBundle"), "contao_html", null, true);
            yield "</p>
      <p>";
            // line 48
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("innodb_large_prefix_explain", [], "ContaoInstallationBundle");
            yield "</p>
      <div id=\"sql_wrapper\">
        <pre>doctrine:
    dbal:
        connections:
            default:
                default_table_options:
                    charset: utf8
                    collation: utf8_unicode_ci</pre>
      </div>
    ";
        } elseif ((        // line 58
($context["errorCode"] ?? null) == 6)) {
            // line 59
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("innodb_additional", [], "ContaoInstallationBundle"), "contao_html", null, true);
            yield "</p>
      <p>";
            // line 60
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("innodb_additional_explain", [], "ContaoInstallationBundle");
            yield "</p>
      <div id=\"sql_wrapper\">
        <pre>innodb_large_prefix = 1
innodb_file_format = Barracuda
innodb_file_per_table = 1</pre>
      </div>
    ";
        }
        // line 67
        yield "  </fieldset>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoInstallation/configuration_error.html.twig";
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
        return array (  173 => 67,  163 => 60,  158 => 59,  156 => 58,  143 => 48,  138 => 47,  136 => 46,  123 => 36,  118 => 35,  116 => 34,  103 => 24,  98 => 23,  96 => 22,  83 => 12,  78 => 11,  76 => 10,  72 => 9,  67 => 8,  65 => 7,  61 => 6,  58 => 5,  51 => 4,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoInstallation/configuration_error.html.twig", "/var/www/html/contao-live/vendor/contao/installation-bundle/src/Resources/views/configuration_error.html.twig");
    }
}
