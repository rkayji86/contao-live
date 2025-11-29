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

/* @ContaoCore/Image/Studio/_macros.html.twig */
class __TwigTemplate_e53994813cdd40f4bd4eb74b88cd9cfd extends Template
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
";
        // line 42
        yield "

";
        // line 102
        yield "
";
        yield from [];
    }

    // line 50
    public function macro_figure($figure = null, $options = [], $addSchemaOrg = true, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "addSchemaOrg" => $addSchemaOrg,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 51
            $context["figure_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 51), "attr", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 51), "attr", [], "any", false, false, false, 51), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "attr", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "attr", [], "any", false, false, false, 51), [])) : ([])));
            // line 52
            $context["link_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 52), "link_attr", [], "any", true, true, false, 52)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 52), "link_attr", [], "any", false, false, false, 52), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "link_attr", [], "any", true, true, false, 52)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "link_attr", [], "any", false, false, false, 52), [])) : ([])));
            yield "
    <figure";
            // line 53
            yield $this->getTemplateForMacro("macro_html_attributes", $context, 53, $this->getSourceContext())->macro_html_attributes(...[($context["figure_attributes"] ?? null)]);
            yield ">
        ";
            // line 54
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "linkHref", [], "any", false, false, false, 54)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 55
                $context["base_attributes"] = Twig\Extension\CoreExtension::merge(["href" => CoreExtension::getAttribute($this->env, $this->source,                 // line 56
($context["figure"] ?? null), "linkHref", [], "any", false, false, false, 56), "title" => (((CoreExtension::getAttribute($this->env, $this->source,                 // line 57
($context["figure"] ?? null), "hasLightbox", [], "any", false, false, false, 57) && CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 57))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 57), "title", [], "any", false, false, false, 57)) : (null))], CoreExtension::getAttribute($this->env, $this->source,                 // line 58
($context["figure"] ?? null), "linkAttributes", [], "any", false, false, false, 58));
                // line 59
                yield "<a";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 59, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge(($context["base_attributes"] ?? null), ($context["link_attributes"] ?? null))]);
                yield ">
";
                // line 60
                yield $this->getTemplateForMacro("macro_picture", $context, 60, $this->getSourceContext())->macro_picture(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
                yield "
            </a>";
            } else {
                // line 63
                yield $this->getTemplateForMacro("macro_picture", $context, 63, $this->getSourceContext())->macro_picture(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
            }
            // line 65
            yield "        ";
            yield $this->getTemplateForMacro("macro_caption", $context, 65, $this->getSourceContext())->macro_caption(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
            yield "
    </figure>
    ";
            // line 67
            if ((($tmp = ($context["addSchemaOrg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 68
                $this->env->getRuntime('Contao\CoreBundle\Twig\Runtime\SchemaOrgRuntime')->add(CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "schemaOrgData", [], "any", false, false, false, 68));
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 77
    public function macro_picture($figure = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 78
            $context["picture_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 78), "picture_attr", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 78), "picture_attr", [], "any", false, false, false, 78), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "picture_attr", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "picture_attr", [], "any", false, false, false, 78), [])) : ([])));
            // line 79
            $context["source_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 79), "source_attr", [], "any", true, true, false, 79)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 79), "source_attr", [], "any", false, false, false, 79), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "source_attr", [], "any", true, true, false, 79)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "source_attr", [], "any", false, false, false, 79), [])) : ([])));
            // line 81
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "image", [], "any", false, false, false, 81), "sources", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 82
                yield "<picture";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 82, $this->getSourceContext())->macro_html_attributes(...[($context["picture_attributes"] ?? null)]);
                yield ">
            ";
                // line 83
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "image", [], "any", false, false, false, 83), "sources", [], "any", false, false, false, 83));
                foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
                    // line 84
                    $context["defineProportions"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", true, true, false, 84)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", false, false, false, 84), false)) : (false)) && ((CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", true, true, false, 84)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", false, false, false, 84), false)) : (false)));
                    // line 85
                    $context["base_attributes"] = ["srcset" => CoreExtension::getAttribute($this->env, $this->source,                     // line 86
$context["source"], "srcset", [], "any", false, false, false, 86), "sizes" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 87
$context["source"], "sizes", [], "any", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "sizes", [], "any", false, false, false, 87), null)) : (null)), "media" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 88
$context["source"], "media", [], "any", true, true, false, 88)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "media", [], "any", false, false, false, 88), null)) : (null)), "type" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 89
$context["source"], "type", [], "any", true, true, false, 89)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "type", [], "any", false, false, false, 89), null)) : (null)), "width" => (((($tmp =                     // line 90
($context["defineProportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", false, false, false, 90)) : (null)), "height" => (((($tmp =                     // line 91
($context["defineProportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", false, false, false, 91)) : (null))];
                    // line 93
                    yield "<source";
                    yield $this->getTemplateForMacro("macro_html_attributes", $context, 93, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge(($context["base_attributes"] ?? null), ($context["source_attributes"] ?? null))]);
                    yield ">";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['source'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 95
                yield "
            ";
                // line 96
                yield $this->getTemplateForMacro("macro_img", $context, 96, $this->getSourceContext())->macro_img(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
                yield "
        </picture>";
            } else {
                // line 99
                yield "        ";
                yield $this->getTemplateForMacro("macro_img", $context, 99, $this->getSourceContext())->macro_img(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 106
    public function macro_img($figure = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 107
            $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 108
                yield "        ";
                $context["img_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 108), "img_attr", [], "any", true, true, false, 108)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 108), "img_attr", [], "any", false, false, false, 108), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "img_attr", [], "any", true, true, false, 108)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "img_attr", [], "any", false, false, false, 108), [])) : ([])));
                // line 109
                yield "
        ";
                // line 110
                $context["img"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "image", [], "any", false, false, false, 110), "img", [], "any", false, false, false, 110);
                // line 111
                yield "        ";
                $context["defineProportions"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "width", [], "any", true, true, false, 111)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "width", [], "any", false, false, false, 111), false)) : (false)) && ((CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "height", [], "any", true, true, false, 111)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "height", [], "any", false, false, false, 111), false)) : (false)));
                // line 112
                yield "
        ";
                // line 113
                $context["base_attributes"] = ["src" => CoreExtension::getAttribute($this->env, $this->source,                 // line 114
($context["img"] ?? null), "src", [], "any", false, false, false, 114), "alt" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 115
($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 115), "alt", [], "any", false, false, false, 115)) : ("")), "title" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 116
($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 116), "title", [], "any", false, false, false, 116)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 116), "title", [], "any", false, false, false, 116)) : (null))) : (null)), "srcset" => (((CoreExtension::getAttribute($this->env, $this->source,                 // line 117
($context["img"] ?? null), "srcset", [], "any", true, true, false, 117) && (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "srcset", [], "any", false, false, false, 117) != CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "src", [], "any", false, false, false, 117)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "srcset", [], "any", false, false, false, 117)) : (null)), "sizes" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 118
($context["img"] ?? null), "sizes", [], "any", true, true, false, 118)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "sizes", [], "any", false, false, false, 118), null)) : (null)), "width" => (((($tmp =                 // line 119
($context["defineProportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "width", [], "any", false, false, false, 119)) : (null)), "height" => (((($tmp =                 // line 120
($context["defineProportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "height", [], "any", false, false, false, 120)) : (null)), "loading" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 121
($context["img"] ?? null), "loading", [], "any", true, true, false, 121)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "loading", [], "any", false, false, false, 121), null)) : (null)), "class" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 122
($context["img"] ?? null), "class", [], "any", true, true, false, 122)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "class", [], "any", false, false, false, 122), null)) : (null))];
                // line 124
                yield "        <img";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 124, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge(($context["base_attributes"] ?? null), ($context["img_attributes"] ?? null))]);
                yield ">
    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 107
            yield Twig\Extension\CoreExtension::spaceless($_v0);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 133
    public function macro_caption($figure = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 134
            $_v1 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 135
                yield "        ";
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 135) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 135), "caption", [], "any", false, false, false, 135))) {
                    // line 136
                    yield "            ";
                    $context["caption_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 136), "caption_attr", [], "any", true, true, false, 136)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 136), "caption_attr", [], "any", false, false, false, 136), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "caption_attr", [], "any", true, true, false, 136)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "caption_attr", [], "any", false, false, false, 136), [])) : ([])));
                    // line 137
                    yield "            <figcaption";
                    yield $this->getTemplateForMacro("macro_html_attributes", $context, 137, $this->getSourceContext())->macro_html_attributes(...[($context["caption_attributes"] ?? null)]);
                    yield ">";
                    // line 138
                    yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 138), "caption", [], "any", false, false, false, 138);
                    // line 139
                    yield "</figcaption>
        ";
                }
                // line 141
                yield "    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 134
            yield Twig\Extension\CoreExtension::spaceless($_v1);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 154
    public function macro_html_attributes($attributes = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "attributes" => $attributes,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 155
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, ($context["attributes"] ?? null), function ($__v__) use ($context, $macros) { $context["v"] = $__v__; return  !(null === ($context["v"] ?? null)); }));
            foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
                // line 156
                yield $this->env->getFilter('escape')->getCallable()($this->env, (" " . $context["attr"]), "contao_html", null, true);
                if ((($tmp = $context["value"]) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "=\"";
                    yield $this->env->getFilter('escape')->getCallable()($this->env, $context["value"], "contao_html", null, true);
                    yield "\"";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attr'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Image/Studio/_macros.html.twig";
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
        return array (  286 => 156,  282 => 155,  270 => 154,  264 => 134,  260 => 141,  256 => 139,  254 => 138,  250 => 137,  247 => 136,  244 => 135,  242 => 134,  229 => 133,  223 => 107,  216 => 124,  214 => 122,  213 => 121,  212 => 120,  211 => 119,  210 => 118,  209 => 117,  208 => 116,  207 => 115,  206 => 114,  205 => 113,  202 => 112,  199 => 111,  197 => 110,  194 => 109,  191 => 108,  189 => 107,  176 => 106,  168 => 99,  163 => 96,  160 => 95,  152 => 93,  150 => 91,  149 => 90,  148 => 89,  147 => 88,  146 => 87,  145 => 86,  144 => 85,  142 => 84,  138 => 83,  133 => 82,  131 => 81,  129 => 79,  127 => 78,  114 => 77,  107 => 68,  105 => 67,  99 => 65,  96 => 63,  91 => 60,  86 => 59,  84 => 58,  83 => 57,  82 => 56,  81 => 55,  79 => 54,  75 => 53,  71 => 52,  69 => 51,  55 => 50,  49 => 102,  45 => 42,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoCore/Image/Studio/_macros.html.twig", "/var/www/html/contao-live/vendor/contao/core-bundle/src/Resources/views/Image/Studio/_macros.html.twig");
    }
}
