# 🏫 Sistema de Gestión Escolar – PHP + MySQL

Este proyecto es una aplicación web desarrollada en **PHP estructurado** con conexión a una base de datos **MySQL**, diseñada con el objetivo de gestionar eficientemente la información académica de una institución educativa. Es ideal como proyecto académico, práctica de backend o base para futuros desarrollos más avanzados.

El sistema permite realizar operaciones CRUD (crear, leer, actualizar, eliminar) sobre diferentes entidades clave: **usuarios**, **cursos**, **materias** y **estudiantes**. Cada módulo está conectado mediante relaciones relacionales bien definidas:

- **1:1** → Cada usuario tiene un perfil.
- **1:N** → Cada curso tiene múltiples materias asociadas.
- **N:M** → Cada estudiante puede estar inscrito en varios cursos y viceversa.

Se ha implementado un sistema de navegación basado en secciones (`?seccion=...`) que permite cargar dinámicamente las vistas correspondientes desde un archivo `index.php`, manteniendo la estructura MVC (Modelo-Vista-Controlador) de forma simple y clara.

Visualmente, la aplicación incorpora una hoja de estilos personalizada (`styles.css`) que aporta una experiencia moderna y profesional, sin depender de frameworks externos como Bootstrap. Cada sección es responsiva, organizada y amigable para el usuario.

Además, se han incorporado formularios inteligentes que se adaptan automáticamente según si estás creando o editando un registro, mejorando la usabilidad sin duplicar código. Se valida la existencia de vistas y rutas, y se incluye una página 404 personalizada cuando la sección no existe.

Este sistema no solo refuerza conceptos clave de desarrollo web (MVC, SQL, validaciones, estructura de carpetas, uso de `$_GET` y `$_POST`), sino que también ofrece una base sólida sobre la cual se pueden integrar funcionalidades futuras como autenticación, control de acceso, exportación de datos, filtros, búsqueda y más.

Desarrollado con enfoque académico, pero estructurado con la lógica de producción que todo desarrollador necesita dominar.
