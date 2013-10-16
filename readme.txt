Sistema nuevo de templates

Ejemplo: 
require 'Core/template.php';
$template = new Core_template();
$template->setView(array('header_example.php','content_example.php'));
$template->setView('footer_example.php');
$template->setCSS('styles.css');
$template->setJS('jquery-latest.js');
$template->setTitle('Welcome custom');
echo $template->render();

primero se incluye el core del template, después se crea una instancia de la clase $template = new Core_template(); , Por default carga el archivo Template/template.php , en este archivo se encuentra el "template" principal de nuestro sitio que se usara de base para las demás páginas, para dibujarlo se manda a llamar la siguiente función echo $template->render(); .

Views
Si queremos incluir un view dentro de nuestro template, esto lo que haría es poner el contenido de nuestra view dentro del body, podemos incluir varias views al mismo tiempo o solo una, 

Ejemplo:
$template->setView('content_example.php');
Esto pondria el contenido de "content_example.php" dentro del body de template.php.
Pero también podemos mandarle un array con nuestras views. Ejemplo:
$template->setView(array('header_example.php','content_example.php'));
Esto pondria en el orden que se lo mandamos al body.

CSS y JS
Para agregar archivos JS y CSS solo tenemos que mandarle un array o un string con el nombre de nuestros archivos. 

Ejemplo:
$template->setCSS('styles.css');
$template->setJS('jquery-latest.js');

Nota: Por defecto nuestro template ya incluye jquery y un archivo styles.css

Title
Por default el template lee el archivo config.php donde tenemos nuestro title global en este caso "Welcome" , pero si queremos que nustra página tenga un 
title custom lo que hacemos es lo siguiente:

Ejemplo:
$template->setTitle('Welcome custom');

Nombres y carpetas

Las carpetas que están en la raíz empiezan preferentemente con Mayúsculas
En el archivo config.php debe de ir toda la información de nuestro sitio de configuración incluyendo de la base de datos.