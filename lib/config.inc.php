<?php
   

   // Windows
    //define('PATH_INCLUDE', 'C:\\apache\\htdocs\\gco\\');
    //
    // Linux
    //define('PATH_INCLUDE', '/var/www/htdocs/gco/');
    define('PATH_INCLUDE', '');

    // Vers�o desta libera��o
    $version = '6.1';

    // Vari�veis do conex�o com o BD
    $server = 'localhost';
    $user = 'u832326909_nona';
    $pass = 'Ipx159700!';
    $bd = 'u832326909_dentista';
  
    // Quantidade de p�ginas exibidas nas pagina��es
    define('PG_MAX', 15);
    // Quantidade de p�ginas exibidas nas pagina��es menores
    define('PG_MAX_MEN', 10);
    // Quantidade de zeros para completar a numera��o dos boletos
    define('ZEROS', 11);
  
    // Define se est� instalado ou n�o
    $install = true;
