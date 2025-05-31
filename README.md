# Web MySQL Demo - Servicios TI LTDA

Este proyecto es una demostración de un sitio web empresarial con integración a base de datos MySQL, diseñado para fines académicos. El sitio web simula una landing page para una empresa de servicios tecnológicos llamada "Servicios TI LTDA".

## 🎯 Objetivo

El objetivo principal de este proyecto es demostrar la integración entre:
- Un sitio web dinámico en PHP
- Una base de datos MySQL
- Servicios web (Apache)
- Configuración de servidor Linux (AlmaLinux)

## 📁 Estructura del Proyecto

```
web-mysql-demo/
├── web/                    # Directorio del sitio web
│   ├── index.php          # Página principal
│   ├── css/               # Estilos CSS
│   ├── js/                # Scripts JavaScript
│   ├── img/               # Imágenes
│   └── config/            # Configuraciones
│       └── database.php   # Configuración de la base de datos
├── database/              # Scripts de base de datos
│   ├── schema.sql        # Esquema de la base de datos
│   └── sample_data.sql   # Datos de ejemplo
└── setup_server.sh        # Script de automatización
```

## 🛠️ Tecnologías Utilizadas

- **Frontend:**
  - HTML5
  - CSS3
  - Bootstrap 5
  - Font Awesome
  - JavaScript

- **Backend:**
  - PHP 7.4+
  - MySQL/MariaDB

- **Servidor:**
  - Apache
  - AlmaLinux

## 📋 Requisitos Previos

- AlmaLinux (o distribución RHEL compatible)
- Apache Web Server
- PHP 7.4 o superior
- MySQL/MariaDB
- Git

## 🚀 Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/asanchezo-duoc/web-mysql-demo.git
   cd web-mysql-demo
   ```

2. **Ejecutar el script de instalación:**
   ```bash
   chmod +x setup_server.sh
   sudo ./setup_server.sh
   ```

El script de instalación realizará automáticamente:
- Instalación de dependencias
- Configuración de la base de datos
- Configuración del servidor web
- Configuración de permisos
- Importación de datos de ejemplo

## 📊 Estructura de la Base de Datos

El proyecto incluye tres tablas principales:

1. **servicios**
   - id (INT, AUTO_INCREMENT)
   - nombre (VARCHAR)
   - descripcion (TEXT)
   - icono (VARCHAR)
   - created_at (TIMESTAMP)

2. **testimonios**
   - id (INT, AUTO_INCREMENT)
   - nombre_cliente (VARCHAR)
   - cargo (VARCHAR)
   - empresa (VARCHAR)
   - testimonio (TEXT)
   - imagen (VARCHAR)
   - created_at (TIMESTAMP)

3. **equipo**
   - id (INT, AUTO_INCREMENT)
   - nombre (VARCHAR)
   - cargo (VARCHAR)
   - descripcion (TEXT)
   - imagen (VARCHAR)
   - created_at (TIMESTAMP)

## 🔧 Configuración

### Base de Datos
La configuración de la base de datos se encuentra en `web/config/database.php`:
```php
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASS', 'tu_contraseña');
define('DB_NAME', 'servicios_ti_db');
```

### Servidor Web
El sitio web está configurado para ejecutarse en Apache con PHP-FPM.

## 📝 Características del Sitio Web

- Diseño responsivo
- Secciones dinámicas alimentadas por base de datos
- Formulario de contacto
- Sección de servicios
- Testimonios de clientes
- Equipo de trabajo

## 🔒 Seguridad

- Contraseñas almacenadas de forma segura
- Configuración de permisos de archivos
- Protección contra inyección SQL usando PDO
- Configuración de SELinux

## 🐛 Solución de Problemas

### Logs
- Apache: `/var/log/httpd/error_log`
- PHP-FPM: `/var/log/php-fpm/www-error.log`
- MariaDB: `/var/log/mariadb/mariadb.log`

### Problemas Comunes
1. **Error de conexión a la base de datos**
   - Verificar credenciales en `database.php`
   - Comprobar que MariaDB esté en ejecución

2. **Errores de permisos**
   - Ejecutar: `sudo chown -R apache:apache /var/www/html`
   - Ejecutar: `sudo chmod -R 755 /var/www/html`

3. **Problemas con SELinux**
   - Ejecutar: `sudo setsebool -P httpd_can_network_connect_db 1`

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👥 Contribuciones

Las contribuciones son bienvenidas. Por favor, lee `CONTRIBUTING.md` para detalles sobre nuestro código de conducta y el proceso para enviarnos pull requests.

## 📞 Contacto

Para soporte o consultas, por favor abrir un issue en el repositorio. 