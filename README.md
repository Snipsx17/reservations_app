## Prueba Técnica - Reservas App

### Descripción

Este repositorio contiene el desarrollo de una prueba técnica utilizando el framework Symfony. La aplicación obtiene un listado de reservas en formato CSV desde un servidor externo, las muestra en una tabla HTML y permite:

Buscar reservas por texto libre.

Exportar el listado en formato JSON.

### Tecnologías utilizadas

Symfony 7.2+

PHP 8.2

Twig (para la renderización de vistas)

Symfony HttpClient (para obtener los datos del CSV)

### Instalación y ejecución

1. Clonar el repositorio

git clone https://github.com/Snipsx17/reservations_app
cd reservation_app

2. Instalar dependencias de PHP

composer install

3. Acceder a la aplicación

Abrir en el navegador: http://localhost:8000

Estructura del Proyecto

src/
├── Controller/
│ ├── ReservationController.php
├── Service/
│ ├── ReservationService.php
├── Templates/
│ ├── index.html.twig
README.md

Endpoints

Listar reservas (interfaz web)

GET /

Exportar reservas en formato JSON

GET /download-json

Posibles mejoras

Implementar paginación en la lista de reservas.

Agregar autenticación para el acceso a los datos.

Mejorar la interfaz con estilos y framework CSS como Bootstrap o Tailwind.

Notas adicionales

Este proyecto fue desarrollado en el contexto de una prueba técnica y sigue principios de buenas prácticas y estándares de código recomendados.

Autor

Desarrollado por Uberth Hernandez.
