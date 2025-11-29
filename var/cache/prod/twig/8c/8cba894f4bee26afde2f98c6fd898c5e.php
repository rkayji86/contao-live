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

/* @ContaoInstallation/password.html.twig */
class __TwigTemplate_920b01f30b994a88e4a95ae4e4785efa extends Template
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
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("set_password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</h3>
    ";
        // line 7
        if (array_key_exists("error", $context)) {
            // line 8
            yield "      <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["error"] ?? null), "contao_html", null, true);
            yield "</p>
    ";
        }
        // line 10
        yield "    <p>";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("set_password_hint", [], "ContaoInstallationBundle");
        yield "</p>
    <form method=\"post\">
      <div class=\"tl_formbody\">
        <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_password\">
        <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"";
        // line 14
        yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["request_token"] ?? null), "contao_html", null, true);
        yield "\">
        <h4><label for=\"password\">";
        // line 15
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</label></h4>
        <input type=\"password\" name=\"password\" id=\"password\" class=\"tl_text\" value=\"\" autocomplete=\"new-password\">
        <img src=\"../../system/themes/flexible/icons/visible.svg\" width=\"16\" height=\"16\" alt=\"\" title=\"";
        // line 17
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("show_password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "\" id=\"pw_password\"/>
      </div>
      <div class=\"tl_formbody_submit\">
        <div class=\"tl_submit_container\">
          <button type=\"submit\" class=\"tl_submit\">";
        // line 21
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("save_password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "</button>
        </div>
      </div>
    </form>
  </fieldset>
  <script>
    \$('password').focus();
    \$('pw_password').addEvent('click', function(e) {
      e.preventDefault();
      var el = \$('password');
      if (el.type == 'password') {
        el.type = 'text';
        this.store('tip:title', '";
        // line 33
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("hide_password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "');
        this.src = this.src.replace('visible.svg', 'visible_.svg');
      } else {
        el.type = 'password';
        this.store('tip:title', '";
        // line 37
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("show_password", [], "ContaoInstallationBundle"), "contao_html", null, true);
        yield "');
        this.src = this.src.replace('visible_.svg', 'visible.svg');
      }
    });
  </script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoInstallation/password.html.twig";
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
        return array (  119 => 37,  112 => 33,  97 => 21,  90 => 17,  85 => 15,  81 => 14,  73 => 10,  67 => 8,  65 => 7,  61 => 6,  58 => 5,  51 => 4,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoInstallation/password.html.twig", "/var/www/html/contao-live/vendor/contao/installation-bundle/src/Resources/views/password.html.twig");
    }
}
