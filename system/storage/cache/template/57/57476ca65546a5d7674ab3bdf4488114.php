<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* install/view/template/install/step_1.twig */
class __TwigTemplate_ef0571b7f882ca64da3c667121965ac9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo "
<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container\">
\t\t\t<div class=\"float-end\">";
        // line 5
        echo ($context["language"] ?? null);
        echo "</div>
\t\t\t<h1>";
        // line 6
        echo ($context["heading_title"] ?? null);
        echo "</h1>
\t\t</div>
\t</div>
\t<div class=\"container\">
\t\t<div class=\"card\">
\t\t\t<div class=\"card-header\"><i class=\"fab fa-opencart\"></i>&nbsp;&nbsp;&nbsp;";
        // line 11
        echo ($context["text_step_1"] ?? null);
        echo "</div>
\t\t\t<div class=\"card-body\">
\t\t\t\t<div class=\"form-control\" style=\"max-height: 300px; overflow-y: scroll;\">";
        // line 13
        echo ($context["text_terms"] ?? null);
        echo "</div>
\t\t\t\t<div class=\"row mt-3\">
\t\t\t\t\t<div class=\"col text-end\"><a href=\"";
        // line 15
        echo ($context["continue"] ?? null);
        echo "\" class=\"btn btn-primary\">";
        echo ($context["button_continue"] ?? null);
        echo "</a></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 21
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "install/view/template/install/step_1.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 21,  66 => 15,  61 => 13,  56 => 11,  48 => 6,  44 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "install/view/template/install/step_1.twig", "C:\\xampp\\htdocs\\opencartpro\\install\\view\\template\\install\\step_1.twig");
    }
}
