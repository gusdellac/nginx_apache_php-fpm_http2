<p align="center">
  <a href="https://www.php.net/" target="_blank">
    <img src="https://www.php.net/images/logos/new-php-logo.svg" width="120" alt="PHP Logo" />
  </a>
  <a href="https://httpd.apache.org/" target="_blank">
    <img src="https://httpd.apache.org/images/httpd-logo.png" width="120" alt="Apache Logo" />
  </a>
  <a href="https://www.nginx.com/" target="_blank">
    <img src="https://www.nginx.com/wp-content/uploads/2021/09/NGINX-logo-rgb-large.png" width="120" alt="Nginx Logo" />
  </a>
  <a href="https://www.docker.com/" target="_blank">
    <img src="https://www.docker.com/sites/default/files/d8/2019-07/Moby-logo.png" width="120" alt="Docker Logo" />
  </a>
</p>

[build-php-apache]: https://img.shields.io/github/workflow/status/gusdellac/tu-repo/PHP-Apache
[build-php-nginx]: https://img.shields.io/github/workflow/status/gusdellac/tu-repo/PHP-Nginx
[build-docker]: https://img.shields.io/github/workflow/status/gusdellac/tu-repo/Docker

[PHP-Apache Build Status][build-php-apache]  
[PHP-Nginx Build Status][build-php-nginx]  
[Docker Build Status][build-docker]


## Docker

### Construir imagen desarrollo (ENV=dev)

```bash
docker-compose up --build
```

### Generar certificado autofirmado para desarrollo (emitir antes de levantar contenedores)

```bash
$ docker run --rm -v ${PWD}/certs:/certs alpine/openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /certs/server.key -out /certs/server.crt -subj "/CN=localhost"
```

### Levantar contenedores en desarrollo

```bash
docker-compose up
```

### Construir imagen produccion (ENV=prod)

```bash
docker-compose up --build
```

### Generar certificado con lets encrypt para produccion (emitir antes de levantar contenedores)
```bash
$ docker run --rm \
  -v ${PWD}/letsencrypt:/etc/letsencrypt \
  -v ${PWD}/html:/var/www/html \
  certbot/certbot certonly --webroot \
  -w /var/www/html \
  -d midominio.com -d www.midominio.com --agree-tos -m tuemail@dominio.com --no-eff-email
```

### Levantar contenedores en produccion

```bash
docker-compose up
```