<?php

/* main.html */
class __TwigTemplate_b52260af87ea455fb03c5fab337e08c3025ed46b02c64104216039c701309363 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'form' => array($this, 'block_form'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head lang=\"en\">
    ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "</head>
<body>
    <div class=\"container\">
        ";
        // line 14
        $this->displayBlock('form', $context, $blocks);
        // line 16
        echo "
        ";
        // line 17
        $this->displayBlock('content', $context, $blocks);
        // line 19
        echo "    </div>
</body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    <script src=\"//code.jquery.com/jquery-1.11.3.min.js\"></script>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\" integrity=\"sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"http://bootswatch.com/flatly/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"../css/style.css\" type=\"text/css\"/>
    <meta charset=\"UTF-8\">
    ";
    }

    // line 14
    public function block_form($context, array $blocks = array())
    {
        // line 15
        echo "        ";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "        ";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function getDebugInfo()
    {
        return array (  69 => 18,  66 => 17,  62 => 15,  59 => 14,  50 => 5,  47 => 4,  41 => 19,  39 => 17,  36 => 16,  34 => 14,  29 => 11,  27 => 4,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head lang="en">*/
/*     {%block head%}*/
/*     <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>*/
/*     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">*/
/*     <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css">*/
/*     <link rel="stylesheet" href="../css/style.css" type="text/css"/>*/
/*     <meta charset="UTF-8">*/
/*     {%endblock%}*/
/* </head>*/
/* <body>*/
/*     <div class="container">*/
/*         {%block form%}*/
/*         {%endblock%}*/
/* */
/*         {%block content%}*/
/*         {%endblock%}*/
/*     </div>*/
/* </body>*/
/* </html>*/
