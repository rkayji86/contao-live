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

/* @ContaoInstallation/login.html.twig */
class __TwigTemplate_8df5da38d2c35b1dc8ff95d0ad12608c extends Template
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
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("login", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</h3>
    <p class=\"tl_info\" id=\"cookies\">";
        // line 7
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("allow_cookies", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</p>
    ";
        // line 8
        if (array_key_exists("error", $context)) {
            // line 9
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["error"] ?? null), "contao_html", null, true);
            yield "</p>
    ";
        }
        // line 11
        yield "    <p>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("login_explanation", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</p>
    <form method=\"post\">
      <div class=\"tl_formbody\">
        <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_login\">
        <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"";
        // line 15
        yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["request_token"] ?? null), "contao_html", null, true);
        yield "\">
        <h4><label for=\"password\">";
        // line 16
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</label></h4>
        <input type=\"password\" name=\"password\" id=\"password\" class=\"tl_text\" value=\"\" autocomplete=\"current-password\">
      </div>
      <div class=\"tl_formbody_submit\">
        <div class=\"tl_submit_container\">
          <button type=\"submit\" class=\"tl_submit\">";
        // line 21
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("login", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</button>
        </div>
      </div>
    </form>
  </fieldset>
  <script>
    \$('password').focus();
    navigator.cookieEnabled && \$('cookies').destroy();
  </script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoInstallation/login.html.twig";
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
        return array (  97 => 21,  89 => 16,  85 => 15,  77 => 11,  71 => 9,  69 => 8,  65 => 7,  61 => 6,  58 => 5,  51 => 4,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoInstallation/login.html.twig", "/var/www/html/contao-live/vendor/contao/installation-bundle/src/Resources/views/login.html.twig");
    }
}
