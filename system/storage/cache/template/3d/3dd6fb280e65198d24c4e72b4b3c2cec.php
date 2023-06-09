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

/* install/view/template/install/step_3.twig */
class __TwigTemplate_7bb1ac611029ae063cbf759dd621dbf1 extends Template
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
  <div class=\"page-header\">
    <div class=\"container\">
      <div class=\"float-end\">";
        // line 5
        echo ($context["language"] ?? null);
        echo "</div>
      <h1>";
        // line 6
        echo ($context["heading_title"] ?? null);
        echo "</h1>
    </div>
  </div>
  <div class=\"container\">
    ";
        // line 10
        if (($context["error_warning"] ?? null)) {
            // line 11
            echo "      <div class=\"alert alert-danger\"><i class=\"fa-solid fa-circle-exclamation\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "</div>
    ";
        }
        // line 13
        echo "    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-cogs\"></i> ";
        // line 14
        echo ($context["text_step_3"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form action=\"";
        // line 16
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
          <fieldset>
            <legend>";
        // line 18
        echo ($context["text_db_connection"] ?? null);
        echo "</legend>

            <div class=\"row\">

              <div class=\"col-md-4 order-md-2\">
                <div class=\"alert alert-info\">
                  <p>";
        // line 24
        echo ($context["text_help"] ?? null);
        echo "</p>
                  <ul class=\"text-info\">
                    <li><strong><a href=\"https://docs.cpanel.net/cpanel/databases/mysql-databases/\" target=\"_blank\">";
        // line 26
        echo ($context["text_cpanel"] ?? null);
        echo "</a></strong></li>
                    <li><strong><a href=\"https://support.plesk.com/hc/en-us/articles/115004263014-How-to-create-a-database-in-Plesk\" target=\"_blank\">";
        // line 27
        echo ($context["text_plesk"] ?? null);
        echo "</a></strong></li>
                  </ul>
                </div>
              </div>
              <div class=\"col-md-8 order-md-1\">

                <div class=\"row mb-3\">
                  <div class=\"col\">
                    <label for=\"input-db-driver\" class=\"form-label\">";
        // line 35
        echo ($context["entry_db_driver"] ?? null);
        echo "</label>
                    <select name=\"db_driver\" id=\"input-db-driver\" class=\"form-control\">
                      ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["drivers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["driver"]) {
            // line 38
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["driver"], "value", [], "any", false, false, false, 38);
            echo "\"";
            if ((($context["db_driver"] ?? null) == twig_get_attribute($this->env, $this->source, $context["driver"], "value", [], "any", false, false, false, 38))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["driver"], "text", [], "any", false, false, false, 38);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['driver'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                    </select>
                    ";
        // line 41
        if (($context["error_db_driver"] ?? null)) {
            // line 42
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_db_driver"] ?? null);
            echo "</div>
                    ";
        }
        // line 44
        echo "                  </div>
                  <div class=\"col required\">
                    <label for=\"input-db-hostname\" class=\"form-label\">";
        // line 46
        echo ($context["entry_db_hostname"] ?? null);
        echo "</label>
                    <input type=\"text\" name=\"db_hostname\" value=\"";
        // line 47
        echo ($context["db_hostname"] ?? null);
        echo "\" id=\"input-db-hostname\" class=\"form-control\"/>
                    ";
        // line 48
        if (($context["error_db_hostname"] ?? null)) {
            // line 49
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_db_hostname"] ?? null);
            echo "</div>
                    ";
        }
        // line 51
        echo "                  </div>
                </div>

                <div class=\"row mb-3\">
                  <div class=\"col required\">
                    <label for=\"input-db-username\" class=\"form-label\">";
        // line 56
        echo ($context["entry_db_username"] ?? null);
        echo "</label>
                    <input type=\"text\" name=\"db_username\" value=\"";
        // line 57
        echo ($context["db_username"] ?? null);
        echo "\" id=\"input-db-username\" class=\"form-control\"/>
                    ";
        // line 58
        if (($context["error_db_username"] ?? null)) {
            // line 59
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_db_username"] ?? null);
            echo "</div>
                    ";
        }
        // line 61
        echo "                  </div>
                  <div class=\"col\">
                    <label for=\"input-db-password\" class=\"form-label\">";
        // line 63
        echo ($context["entry_db_password"] ?? null);
        echo "</label>
                    <input type=\"password\" name=\"db_password\" value=\"";
        // line 64
        echo ($context["db_password"] ?? null);
        echo "\" id=\"input-db-password\" class=\"form-control\" autocomplete=\"new-password\"/>
                  </div>
                </div>

                <div class=\"row mb-3\">

                  <div class=\"col-6 required\">
                    <label for=\"input-db-database\" class=\"text-bold form-label\">";
        // line 71
        echo ($context["entry_db_database"] ?? null);
        echo "</label>
                    <input type=\"text\" name=\"db_database\" value=\"";
        // line 72
        echo ($context["db_database"] ?? null);
        echo "\" id=\"input-db-database\" class=\"form-control\"/>
                    ";
        // line 73
        if (($context["error_db_database"] ?? null)) {
            // line 74
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_db_database"] ?? null);
            echo "</div>
                    ";
        }
        // line 76
        echo "                  </div>

                  <div class=\"col-3\">
                    <label for=\"input-db-prefix\" class=\"form-label\">";
        // line 79
        echo ($context["entry_db_prefix"] ?? null);
        echo "</label>
                    <input type=\"text\" name=\"db_prefix\" value=\"";
        // line 80
        echo ($context["db_prefix"] ?? null);
        echo "\" id=\"input-db-prefix\" class=\"form-control\"/>
                    ";
        // line 81
        if (($context["error_db_prefix"] ?? null)) {
            // line 82
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_db_prefix"] ?? null);
            echo "</div>
                    ";
        }
        // line 84
        echo "                  </div>

                  <div class=\"col-3 required\">
                    <label for=\"input-db-port\" class=\"form-label\">";
        // line 87
        echo ($context["entry_db_port"] ?? null);
        echo "</label>
                    <input type=\"text\" name=\"db_port\" value=\"";
        // line 88
        echo ($context["db_port"] ?? null);
        echo "\" id=\"input-db-port\" class=\"form-control\"/>
                    ";
        // line 89
        if (($context["error_db_port"] ?? null)) {
            // line 90
            echo "                      <div class=\"text-danger\">";
            echo ($context["error_db_port"] ?? null);
            echo "</div>
                    ";
        }
        // line 92
        echo "                  </div>

                </div>
              </div>
            </div>
          </fieldset>
          <fieldset>
            <legend>";
        // line 99
        echo ($context["text_db_administration"] ?? null);
        echo "</legend>
            <div class=\"row mb-3\">
              <div class=\"col required\">
                <label for=\"input-username\" class=\"form-label\">";
        // line 102
        echo ($context["entry_username"] ?? null);
        echo "</label>
                <input type=\"text\" name=\"username\" value=\"";
        // line 103
        echo ($context["username"] ?? null);
        echo "\" id=\"input-username\" class=\"form-control\"/>
                ";
        // line 104
        if (($context["error_username"] ?? null)) {
            // line 105
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_username"] ?? null);
            echo "</div>
                ";
        }
        // line 107
        echo "              </div>
              <div class=\"col required\">
                <label for=\"input-password\" class=\"form-label\">";
        // line 109
        echo ($context["entry_password"] ?? null);
        echo "</label>
                <input type=\"text\" name=\"password\" value=\"";
        // line 110
        echo ($context["password"] ?? null);
        echo "\" id=\"input-password\" class=\"form-control\"/>
                ";
        // line 111
        if (($context["error_password"] ?? null)) {
            // line 112
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_password"] ?? null);
            echo "</div>
                ";
        }
        // line 114
        echo "              </div>
            </div>
            <div class=\"required\">
              <label for=\"input-email\" class=\"form-label\">";
        // line 117
        echo ($context["entry_email"] ?? null);
        echo "</label> <input type=\"text\" name=\"email\" value=\"";
        echo ($context["email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
              ";
        // line 118
        if (($context["error_email"] ?? null)) {
            // line 119
            echo "                <div class=\"text-danger\">";
            echo ($context["error_email"] ?? null);
            echo "</div>
              ";
        }
        // line 121
        echo "            </div>
          </fieldset>
          <div class=\"row\">
            <div class=\"col\"><a href=\"";
        // line 124
        echo ($context["back"] ?? null);
        echo "\" class=\"btn btn-light\">";
        echo ($context["button_back"] ?? null);
        echo "</a></div>
            <div class=\"col text-end\"><input type=\"submit\" value=\"";
        // line 125
        echo ($context["button_continue"] ?? null);
        echo "\" class=\"btn btn-primary\"/></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 132
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "install/view/template/install/step_3.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  350 => 132,  340 => 125,  334 => 124,  329 => 121,  323 => 119,  321 => 118,  315 => 117,  310 => 114,  304 => 112,  302 => 111,  298 => 110,  294 => 109,  290 => 107,  284 => 105,  282 => 104,  278 => 103,  274 => 102,  268 => 99,  259 => 92,  253 => 90,  251 => 89,  247 => 88,  243 => 87,  238 => 84,  232 => 82,  230 => 81,  226 => 80,  222 => 79,  217 => 76,  211 => 74,  209 => 73,  205 => 72,  201 => 71,  191 => 64,  187 => 63,  183 => 61,  177 => 59,  175 => 58,  171 => 57,  167 => 56,  160 => 51,  154 => 49,  152 => 48,  148 => 47,  144 => 46,  140 => 44,  134 => 42,  132 => 41,  129 => 40,  114 => 38,  110 => 37,  105 => 35,  94 => 27,  90 => 26,  85 => 24,  76 => 18,  71 => 16,  66 => 14,  63 => 13,  57 => 11,  55 => 10,  48 => 6,  44 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "install/view/template/install/step_3.twig", "C:\\xampp\\htdocs\\opencartpro\\install\\view\\template\\install\\step_3.twig");
    }
}
