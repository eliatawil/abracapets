FROM php:8.2-cli

# Instala extensões do PHP e servidor embutido
RUN docker-php-ext-install pdo pdo_mysql

# Copia todos os arquivos para dentro do contêiner
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html/public

# Expõe a porta que o Render usa
EXPOSE 10000

# Comando para rodar o servidor PHP embutido
CMD ["php", "-S", "0.0.0.0:10000"]
