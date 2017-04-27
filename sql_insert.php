<?php 
/**
	Autor : Edwar Cruz 
	Este archivo, es el contenido sql de las diferentes tablas que se crean en el momento de la instalación.
*/



$sql_ayuda = "INSERT INTO `tb_ayuda` (`id_ayuda`, `ayuda`, `texto`, `url`, `palabras_claves`) VALUES
(1, 'Casos de uso', 'Un caso de uso es una descripción de los pasos o las actividades que deberán realizarse para llevar a cabo algún proceso.', 'img/caso.png', 'uml, manual técnico, ayudas'),
(2, 'Caso de uso documentado', 'La plantilla siguiente es una muestra de una fuente estándar del sector y puede utilizarse para documentar casos de uso.', 'img/documentacion.png', 'uml, manual técnico, ayudas, '),
(3, 'Modelo entidad relación (MER)', 'Es una herramienta para el modelado de datos que permite representar las entidades relevantes de un sistema de información así como sus interrelaciones y propiedades.', 'img/mer.png', 'uml, manual técnico, ayudas, Base de datos'),
(4, 'UML - Clases', 'En la ingeniería de software , un diagrama de clases en el Lenguaje de Modelado Unificado (UML) es un tipo de diagrama de estructura estática que describe la estructura de un sistema mostrando del sistema de clases , sus atributos, operaciones (o métodos), y las relaciones entre los objetos.', 'img/clases.png', 'uml, manual técnico, ayudas, '),
(5, 'Diagramas de componentes', 'Un diagrama de componentes es un diagrama tipo del Lenguaje Unificado de Modelado. Un diagrama de componentes representa cómo un sistema de software es dividido en componentes y muestra las dependencias entre estos componentes.', 'img/componentes.png', 'uml, manual técnico, ayudas, '),
(6, 'Diagrama de distribuciones ', 'Como ya hemos comentado, el diagrama de distribución muestra la estructura física de un sistema, las máquinas, los dispositivos, las interconexiones entre dispositivos y las piezas de software que se encontrarán en cada máquina.', 'img/distribuciones.png', 'uml, manual técnico, ayudas, ');";


$sql_enfermedad = "INSERT INTO `tb_enfermedades` (`id_enfermedad`, `enfermedad`, `url`) VALUES
(1, 'Bandeja Paisa', 'img/bandeja.png'),
(2, 'Arroz con Pollo', 'img/arroz_pollo.png'),
(3, 'Arroz Con leche', 'img/arroz_leche.png'),
(4, 'Huevo Perico', 'img/perico.png'),
(5, 'Hambuergueza', 'img/hamb.png');";



$sql_relacion = "INSERT INTO `tb_relacion` (`id_relacion`, `id_enfermedad`, `id_sintoma`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 8),
(6, 2, 1),
(7, 2, 5),
(8, 3, 1),
(9, 3, 6),
(10, 3, 7),
(11, 4, 8),
(12, 4, 9),
(13, 4, 10),
(14, 5, 11),
(15, 5, 12),
(16, 5, 13),
(17, 5, 9),
(18, 5, 10);";

$sql_sintomas = "INSERT INTO `tb_sintomas` (`id_sintoma`, `sintomas`) VALUES
(1, 'Arroz'),
(2, 'Frijo'),
(3, 'Chorizo'),
(4, 'Aguacate'),
(5, 'Pollo'),
(6, 'Leche'),
(7, 'Canela'),
(8, 'Huevo'),
(9, 'Tomate'),
(10, 'Cebolla'),
(11, 'Carne'),
(12, 'Pan'),
(13, 'Lechuga');
";  




 ?>