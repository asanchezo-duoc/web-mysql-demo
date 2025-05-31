#!/bin/bash

# Colores para mensajes
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# Función para mostrar mensajes
print_message() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

# Verificar si se está ejecutando como root
if [ "$EUID" -ne 0 ]; then 
    print_error "Este script debe ejecutarse como root"
    exit 1
fi

# Configuración de la base de datos
DB_ROOT_PASSWORD="ServiciosTI2024!"

# Actualizar el sistema
print_message "Actualizando el sistema..."
dnf update -y

# Instalar dependencias
print_message "Instalando dependencias..."
dnf install -y mariadb-server httpd php php-pdo php-mysqlnd git

# Iniciar y habilitar servicios
print_message "Configurando servicios..."
systemctl enable mariadb
systemctl start mariadb

# Configurar contraseña inicial de MariaDB
print_message "Configurando contraseña inicial de MariaDB..."
mysqladmin -u root password "${DB_ROOT_PASSWORD}"

# Actualizar el archivo de configuración de la base de datos
print_message "Actualizando configuración de la base de datos..."
sed -i "s/define('DB_PASS', '');/define('DB_PASS', '${DB_ROOT_PASSWORD}');/" /var/www/html/config/database.php

systemctl enable httpd
systemctl start httpd

# Configurar firewall
print_message "Configurando firewall..."
firewall-cmd --permanent --add-service=http
firewall-cmd --permanent --add-service=https
firewall-cmd --reload

# Clonar repositorio
print_message "Clonando repositorio..."
if [ -d "web-mysql-demo" ]; then
    print_warning "El directorio web-mysql-demo ya existe, actualizando..."
    cd web-mysql-demo
    git pull
else
    git clone https://github.com/asanchezo-duoc/web-mysql-demo.git
    cd web-mysql-demo
fi

# Copiar archivos al directorio web
print_message "Copiando archivos al directorio web..."
cp -Rv web/* /var/www/html/

# Configurar permisos
print_message "Configurando permisos..."
chown -R apache:apache /var/www/html
chmod -R 755 /var/www/html

# Configurar base de datos
print_message "Configurando base de datos..."
mysql -u root -p"${DB_ROOT_PASSWORD}" < database/schema.sql
mysql -u root -p"${DB_ROOT_PASSWORD}" < database/sample_data.sql

# Configurar SELinux
print_message "Configurando SELinux..."
setsebool -P httpd_can_network_connect_db 1

# Reiniciar servicios
print_message "Reiniciando servicios..."
systemctl restart mariadb
systemctl restart httpd
systemctl restart php-fpm

# Verificar estado de los servicios
print_message "Verificando estado de los servicios..."
systemctl status mariadb | grep "Active:"
systemctl status httpd | grep "Active:"
systemctl status php-fpm | grep "Active:"

# Mostrar IP del servidor
print_message "IP del servidor:"
hostname -I

# Verificar puertos
print_message "Puertos en uso:"
ss -tapnl | grep -E ':80|:443|:3306'

print_message "Configuración completada. Verifica los logs si hay errores:"
print_message "Logs de Apache: /var/log/httpd/error_log"
print_message "Logs de PHP-FPM: /var/log/php-fpm/www-error.log"
print_message "Logs de MariaDB: /var/log/mariadb/mariadb.log"

print_message "Credenciales de la base de datos:"
print_message "Usuario: root"
print_message "Contraseña: ${DB_ROOT_PASSWORD}"
print_warning "IMPORTANTE: Por favor, cambia la contraseña de la base de datos después de la instalación inicial" 