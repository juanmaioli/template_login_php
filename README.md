# 🐈 Template Login PHP

https://github.com/juanmaioli/template_login_php

[![PHP Version](https://img.shields.io/badge/php-%3E%3D7.4-8892bf.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

Una plantilla robusta y segura para sistemas de autenticación y gestión de usuarios desarrollada en **PHP** y **MySQL**.

## 1. ✨ Características

- 🛡️ **Seguridad Avanzada:** Inmunidad contra Inyecciones SQL mediante sentencias preparadas (`mysqli`) en login y logout.
- 🔑 **Hashing Moderno:** Almacenamiento de contraseñas utilizando el algoritmo **BCRYPT** (`password_hash`).
- ⚡ **Optimización:** Sistema de caché de sesión para reducir la carga en la base de datos.
- 🍪 **Cookies Seguras:** Configuración con flags `HttpOnly`, `Secure` y `SameSite` para prevenir ataques XSS y CSRF.
- 🎨 **Interfaz Moderna:** Diseño responsivo basado en **Bootstrap 5.3** y **Font Awesome 6**.
- 🌗 **Selector de Tema:** Modo claro/oscuro automático con selector manual y persistencia local.
- 🛠️ **Gestión de Usuarios:** Panel administrativo para el alta, baja, edición y gestión de perfiles (incluyendo imágenes).

## 2. 🚀 Instalación Rápida

### Requisitos Previos
- Servidor Web (Apache/Nginx).
- PHP 7.4 o superior.
- MySQL 5.7+ o MariaDB 10.3+.

### Pasos
1.  **Clonar el repositorio:**
    ```bash
    git clone https://github.com/juanmaioli/template_login_php.git
    ```
2.  **Preparar la Base de Datos:**
    Importar el archivo `template_login.sql` en tu servidor MySQL.
3.  **Configurar el entorno:**
    Renombrar `config.example.php` a `config.php` y completar con tus credenciales:
    ```php
    $db_server = "localhost";
    $db_user   = "tu_usuario";
    $db_pass   = "tu_clave";
    $db_name   = "template_login";
    ```
4.  **¡Listo!** Accede a través de tu servidor local. El usuario por defecto es `admin@example.com` con la clave `123456789` (o la que hayas configurado).

## 3. 🛠️ Tecnologías Utilizadas

- **Backend:** PHP (Mysqli, Sessions, Password Hashing API).
- **Frontend:** Bootstrap 5, Font Awesome 6, JavaScript (Vanilla).
- **Base de Datos:** MySQL / MariaDB.

## 4. 📄 Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---
Desarrollado con ❤️ por [Juan Gabriel Maioli](https://github.com/juanmaioli)
