<?php

/* weather.html */
class __TwigTemplate_5a51b681868a6036415c4a802704116169db3164012d27f920348fe4d0f0c859 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("main.html", "weather.html", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        $this->displayParentBlock("head", $context, $blocks);
        echo "
<title>Погода</title>
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<h2>Погода</h2>
<table class=\"table table-striped table-hover\">
    <tr>
        <td>Дата:</td><td>";
        // line 12
        echo (isset($context["day"]) ? $context["day"] : null);
        echo " ";
        echo (isset($context["month"]) ? $context["month"] : null);
        echo " ";
        echo (isset($context["year"]) ? $context["year"] : null);
        echo "г.</td>
    </tr>
    <tr>
        <td>Страна:</td><td>";
        // line 15
        echo (isset($context["country"]) ? $context["country"] : null);
        echo "</td>
    </tr>
    <tr>
        <td>Регион:</td><td>";
        // line 18
        echo (isset($context["region"]) ? $context["region"] : null);
        echo "</td>
    </tr>
    <tr>
        <td>Город:</td><td>";
        // line 21
        echo (isset($context["city"]) ? $context["city"] : null);
        echo "</td>
    </tr>

    <tr>
        <td>Температура:</td><td>";
        // line 25
        echo (isset($context["temp"]) ? $context["temp"] : null);
        echo "</td>
    </tr>
    <tr>
        <td>Направление:</td><td>";
        // line 28
        echo (isset($context["wind_direction"]) ? $context["wind_direction"] : null);
        echo "</td>
    </tr>
    <tr>
        <td>Сила ветра:</td><td>";
        // line 31
        echo (isset($context["wind_power"]) ? $context["wind_power"] : null);
        echo "</td>
    </tr>
    <tr>
        <td>Давление:</td><td>";
        // line 34
        echo (isset($context["press"]) ? $context["press"] : null);
        echo "</td>
    </tr>
    <tr>
        <td>Влажность:</td><td>";
        // line 37
        echo (isset($context["humidity"]) ? $context["humidity"] : null);
        echo "</td>
    </tr>
    <tr>
        <td>Температура воды:</td><td>";
        // line 40
        echo (isset($context["water_temp"]) ? $context["water_temp"] : null);
        echo "</td>
    </tr>
</table>
";
    }

    public function getTemplateName()
    {
        return "weather.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 40,  100 => 37,  94 => 34,  88 => 31,  82 => 28,  76 => 25,  69 => 21,  63 => 18,  57 => 15,  47 => 12,  42 => 9,  39 => 8,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {%extends 'main.html'%}*/
/* */
/* {%block head%}*/
/* {{parent()}}*/
/* <title>Погода</title>*/
/* {%endblock%}*/
/* */
/* {%block content%}*/
/* <h2>Погода</h2>*/
/* <table class="table table-striped table-hover">*/
/*     <tr>*/
/*         <td>Дата:</td><td>{{day}} {{month}} {{year}}г.</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Страна:</td><td>{{country}}</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Регион:</td><td>{{region}}</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Город:</td><td>{{city}}</td>*/
/*     </tr>*/
/* */
/*     <tr>*/
/*         <td>Температура:</td><td>{{temp}}</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Направление:</td><td>{{wind_direction}}</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Сила ветра:</td><td>{{wind_power}}</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Давление:</td><td>{{press}}</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Влажность:</td><td>{{humidity}}</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td>Температура воды:</td><td>{{water_temp}}</td>*/
/*     </tr>*/
/* </table>*/
/* {%endblock%}*/
