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

/* knp_menu.html.twig */
class __TwigTemplate_cd1907f016ca95dc5bb2de6bb3c53589 extends Template
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
            'compressed_root' => [$this, 'block_compressed_root'],
            'root' => [$this, 'block_root'],
            'list' => [$this, 'block_list'],
            'children' => [$this, 'block_children'],
            'item' => [$this, 'block_item'],
            'linkElement' => [$this, 'block_linkElement'],
            'spanElement' => [$this, 'block_spanElement'],
            'label' => [$this, 'block_label'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "knp_menu_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("knp_menu_base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_compressed_root(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 12
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 13
            yield from             $this->unwrap()->yieldBlock("root", $context, $blocks);
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 12
        yield Knp\Menu\Twig\MenuExtension::spaceless($_v0);
        yield from [];
    }

    // line 17
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_root(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 18
        $context["listAttributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "childrenAttributes", [], "any", false, false, false, 18);
        // line 19
        yield from         $this->unwrap()->yieldBlock("list", $context, $blocks);
        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_list(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 23
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "hasChildren", [], "any", false, false, false, 23) &&  !(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "depth", [], "any", false, false, false, 23) === 0)) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "displayChildren", [], "any", false, false, false, 23))) {
            // line 24
            yield "    ";
            $macros["knp_menu"] = $this;
            // line 25
            yield "    <ul";
            yield $macros["knp_menu"]->getTemplateForMacro("macro_attributes", $context, 25, $this->getSourceContext())->macro_attributes(...[($context["listAttributes"] ?? null)]);
            yield ">
        ";
            // line 26
            yield from             $this->unwrap()->yieldBlock("children", $context, $blocks);
            yield "
    </ul>
";
        }
        yield from [];
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_children(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 33
        $context["currentOptions"] = ($context["options"] ?? null);
        // line 34
        $context["currentItem"] = ($context["item"] ?? null);
        // line 36
        if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "depth", [], "any", false, false, false, 36))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 37
            $context["options"] = Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["depth" => (CoreExtension::getAttribute($this->env, $this->source, ($context["currentOptions"] ?? null), "depth", [], "any", false, false, false, 37) - 1)]);
        }
        // line 40
        if (( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "matchingDepth", [], "any", false, false, false, 40)) && (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "matchingDepth", [], "any", false, false, false, 40) > 0))) {
            // line 41
            $context["options"] = Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["matchingDepth" => (CoreExtension::getAttribute($this->env, $this->source, ($context["currentOptions"] ?? null), "matchingDepth", [], "any", false, false, false, 41) - 1)]);
        }
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["currentItem"] ?? null), "children", [], "any", false, false, false, 43));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 44
            yield "    ";
            yield from             $this->unwrap()->yieldBlock("item", $context, $blocks);
            yield "
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        $context["item"] = ($context["currentItem"] ?? null);
        // line 48
        $context["options"] = ($context["currentOptions"] ?? null);
        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_item(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 52
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "displayed", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 54
            $context["classes"] = (((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "attribute", ["class"], "method", false, false, false, 54))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ([CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "attribute", ["class"], "method", false, false, false, 54)]) : ([]));
            // line 55
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["matcher"] ?? null), "isCurrent", [($context["item"] ?? null)], "method", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 56
                $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "currentClass", [], "any", false, false, false, 56)]);
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 57
($context["matcher"] ?? null), "isAncestor", [($context["item"] ?? null), CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "matchingDepth", [], "any", false, false, false, 57)], "method", false, false, false, 57)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 58
                $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "ancestorClass", [], "any", false, false, false, 58)]);
            }
            // line 60
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "actsLikeFirst", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 61
                $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "firstClass", [], "any", false, false, false, 61)]);
            }
            // line 63
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "actsLikeLast", [], "any", false, false, false, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 64
                $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "lastClass", [], "any", false, false, false, 64)]);
            }
            // line 66
            yield "
    ";
            // line 68
            yield "    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "hasChildren", [], "any", false, false, false, 68) &&  !(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "depth", [], "any", false, false, false, 68) === 0))) {
                // line 69
                yield "        ";
                if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "branch_class", [], "any", false, false, false, 69)) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "displayChildren", [], "any", false, false, false, 69))) {
                    // line 70
                    $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "branch_class", [], "any", false, false, false, 70)]);
                    // line 71
                    yield "        ";
                }
                // line 72
                yield "    ";
            } elseif ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "leaf_class", [], "any", false, false, false, 72))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 73
                $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "leaf_class", [], "any", false, false, false, 73)]);
            }
            // line 76
            $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "attributes", [], "any", false, false, false, 76);
            // line 77
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["classes"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 78
                $context["attributes"] = Twig\Extension\CoreExtension::merge(($context["attributes"] ?? null), ["class" => Twig\Extension\CoreExtension::join(($context["classes"] ?? null), " ")]);
            }
            // line 81
            yield "    ";
            $macros["knp_menu"] = $this;
            // line 82
            yield "    <li";
            yield $macros["knp_menu"]->getTemplateForMacro("macro_attributes", $context, 82, $this->getSourceContext())->macro_attributes(...[($context["attributes"] ?? null)]);
            yield ">";
            // line 83
            if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "uri", [], "any", false, false, false, 83)) && ( !CoreExtension::getAttribute($this->env, $this->source, ($context["matcher"] ?? null), "isCurrent", [($context["item"] ?? null)], "method", false, false, false, 83) || CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "currentAsLink", [], "any", false, false, false, 83)))) {
                // line 84
                yield "        ";
                yield from                 $this->unwrap()->yieldBlock("linkElement", $context, $blocks);
            } else {
                // line 86
                yield "        ";
                yield from                 $this->unwrap()->yieldBlock("spanElement", $context, $blocks);
            }
            // line 89
            $context["childrenClasses"] = (((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "childrenAttribute", ["class"], "method", false, false, false, 89))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ([CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "childrenAttribute", ["class"], "method", false, false, false, 89)]) : ([]));
            // line 90
            $context["childrenClasses"] = Twig\Extension\CoreExtension::merge(($context["childrenClasses"] ?? null), [("menu_level_" . CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "level", [], "any", false, false, false, 90))]);
            // line 91
            $context["listAttributes"] = Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "childrenAttributes", [], "any", false, false, false, 91), ["class" => Twig\Extension\CoreExtension::join(($context["childrenClasses"] ?? null), " ")]);
            // line 92
            yield "        ";
            yield from             $this->unwrap()->yieldBlock("list", $context, $blocks);
            yield "
    </li>
";
        }
        yield from [];
    }

    // line 97
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_linkElement(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $macros["knp_menu"] = $this;
        yield "<a href=\"";
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "uri", [], "any", false, false, false, 97), "html", null, true);
        yield "\"";
        yield $macros["knp_menu"]->getTemplateForMacro("macro_attributes", $context, 97, $this->getSourceContext())->macro_attributes(...[CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "linkAttributes", [], "any", false, false, false, 97)]);
        yield ">";
        yield from         $this->unwrap()->yieldBlock("label", $context, $blocks);
        yield "</a>";
        yield from [];
    }

    // line 99
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_spanElement(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $macros["knp_menu"] = $this;
        yield "<span";
        yield $macros["knp_menu"]->getTemplateForMacro("macro_attributes", $context, 99, $this->getSourceContext())->macro_attributes(...[CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "labelAttributes", [], "any", false, false, false, 99)]);
        yield ">";
        yield from         $this->unwrap()->yieldBlock("label", $context, $blocks);
        yield "</span>";
        yield from [];
    }

    // line 101
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "allow_safe_labels", [], "any", false, false, false, 101) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getExtra", ["safe_label", false], "method", false, false, false, 101))) {
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "label", [], "any", false, false, false, 101);
        } else {
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "label", [], "any", false, false, false, 101), "html", null, true);
        }
        yield from [];
    }

    // line 3
    public function macro_attributes($attributes = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "attributes" => $attributes,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["attributes"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                // line 5
                if (( !(null === $context["value"]) &&  !($context["value"] === false))) {
                    // line 6
                    yield Twig\Extension\CoreExtension::sprintf(" %s=\"%s\"", $context["name"], ((($context["value"] === true)) ? ($this->env->getFilter('e')->getCallable()($this->env, $context["name"])) : ($this->env->getFilter('e')->getCallable()($this->env, $context["value"]))));
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['name'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "knp_menu.html.twig";
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
        return array (  337 => 6,  335 => 5,  331 => 4,  319 => 3,  304 => 101,  288 => 99,  270 => 97,  260 => 92,  258 => 91,  256 => 90,  254 => 89,  250 => 86,  246 => 84,  244 => 83,  240 => 82,  237 => 81,  234 => 78,  232 => 77,  230 => 76,  227 => 73,  224 => 72,  221 => 71,  219 => 70,  216 => 69,  213 => 68,  210 => 66,  207 => 64,  205 => 63,  202 => 61,  200 => 60,  197 => 58,  195 => 57,  193 => 56,  191 => 55,  189 => 54,  187 => 52,  180 => 51,  175 => 48,  173 => 47,  156 => 44,  139 => 43,  136 => 41,  134 => 40,  131 => 37,  129 => 36,  127 => 34,  125 => 33,  118 => 31,  109 => 26,  104 => 25,  101 => 24,  99 => 23,  92 => 22,  87 => 19,  85 => 18,  78 => 17,  73 => 12,  67 => 13,  65 => 12,  58 => 11,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "knp_menu.html.twig", "/var/www/html/contao-live/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views/knp_menu.html.twig");
    }
}
