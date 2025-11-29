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

/* @ContaoInstallation/database.html.twig */
class __TwigTemplate_97240fa8f9a2101435a1beb63ddf51aa extends Template
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
    <div>
      <h3>";
        // line 7
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_connection", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</h3>
      ";
        // line 8
        if (array_key_exists("database_error", $context)) {
            // line 9
            yield "        <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["database_error"] ?? null), "contao_html", null, true);
            yield "</p>
      ";
        }
        // line 11
        yield "      <p>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_connection_explain", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</p>
      <form method=\"post\">
        <div class=\"tl_formbody\">
          <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_database_login\">
          <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"";
        // line 15
        yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["request_token"] ?? null), "contao_html", null, true);
        yield "\">
          <h4><label for=\"dbHost\">";
        // line 16
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_host", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</label></h4>
          <input type=\"text\" name=\"dbHost\" id=\"dbHost\" class=\"tl_text\" value=\"";
        // line 17
        yield $this->env->getFilter('escape')->getCallable()($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_host", [], "any", true, true, false, 17)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_host", [], "any", false, false, false, 17), "localhost")) : ("localhost")), "contao_html", null, true);
        yield "\">
          <h4><label for=\"dbPort\">";
        // line 18
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_port", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</label></h4>
          <input type=\"text\" name=\"dbPort\" id=\"dbPort\" class=\"tl_text\" value=\"";
        // line 19
        yield $this->env->getFilter('escape')->getCallable()($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_port", [], "any", true, true, false, 19)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_port", [], "any", false, false, false, 19), 3306)) : (3306)), "contao_html", null, true);
        yield "\">
          <h4><label for=\"dbUser\">";
        // line 20
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_user", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</label></h4>
          <input type=\"text\" name=\"dbUser\" id=\"dbUser\" class=\"tl_text\" value=\"";
        // line 21
        yield $this->env->getFilter('escape')->getCallable()($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_user", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_user", [], "any", false, false, false, 21), "")) : ("")), "contao_html", null, true);
        yield "\">
          <h4><label for=\"dbPassword\">";
        // line 22
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</label></h4>
          <input type=\"password\" name=\"dbPassword\" id=\"dbPassword\" class=\"tl_text\" value=\"";
        // line 23
        yield $this->env->getFilter('escape')->getCallable()($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_password", [], "any", true, true, false, 23)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_password", [], "any", false, false, false, 23), "")) : ("")), "contao_html", null, true);
        yield "\">
          <h4><label for=\"dbName\">";
        // line 24
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("database_name", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</label></h4>
          <input type=\"text\" name=\"dbName\" id=\"dbName\" class=\"tl_text\" value=\"";
        // line 25
        yield $this->env->getFilter('escape')->getCallable()($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_name", [], "any", true, true, false, 25)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["parameters"] ?? null), "database_name", [], "any", false, false, false, 25), "")) : ("")), "contao_html", null, true);
        yield "\">
        </div>
        <div class=\"tl_formbody_submit\">
          <div class=\"tl_submit_container\">
            <button type=\"submit\" class=\"tl_submit\">";
        // line 29
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("save_settings", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</button>
          </div>
        </div>
      </form>
    </div>
  </fieldset>
  <script>
    \$('dbHost').focus();
  </script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoInstallation/database.html.twig";
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
        return array (  129 => 29,  122 => 25,  118 => 24,  114 => 23,  110 => 22,  106 => 21,  102 => 20,  98 => 19,  94 => 18,  90 => 17,  86 => 16,  82 => 15,  74 => 11,  68 => 9,  66 => 8,  62 => 7,  58 => 5,  51 => 4,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoInstallation/database.html.twig", "/var/www/html/contao-live/vendor/contao/installation-bundle/src/Resources/views/database.html.twig");
    }
}
