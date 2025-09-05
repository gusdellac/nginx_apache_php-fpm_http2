<p align="center">
  <a href="https://www.php.net/" target="_blank" style="text-decoration:none;">
    <img src="./setup-logos/php02-svgrepo-com.svg" width="120" alt="PHP Logo" />
  </a>
  <a href="https://httpd.apache.org/" target="_blank" style="text-decoration:none;">
    <img src="./setup-logos/apache-svgrepo-com.svg" width="120" alt="Apache Logo" />
  </a>
  <a href="https://www.nginx.com/" target="_blank" style="text-decoration:none;">
    <img src="./setup-logos/nginx-svgrepo-com.svg" width="120" alt="Nginx Logo" />
  </a>
  <a href="https://www.docker.com/" target="_blank" style="text-decoration:none;">
    <img src="./setup-logos/docker-svgrepo-com.svg" width="120" alt="Docker Logo" />
  </a>
</p>

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