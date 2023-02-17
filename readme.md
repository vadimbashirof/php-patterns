## Библиотека паттернов на php

Паттерны по примерам с сайта <https://refactoring.guru/> и другие

**Запустите контейнер docker**  

`docker composer build`  
`docker composer up`  

**Запуск паттернов**

зайдите в контейнер php-fpm  
`docker composer exec php-fpm bash`

Код запуска всех паттернов происходит через консольные команды и находится в папке `commands`. 
В ней находятся 3 папки соответствующие типам паттеров `Creational` `Structural` `Behavioral`.
В каждой из этих папок находятся папки с конкретным паттерном внутри нее файлы запуска различных реальзаций

чтобы запустить код паттерна введите команду  
`php bin/console [NamePatternCommand]`

`[NamePatternCommand]` - имя файла конкретного файла команды из папки `commands`

Например команда `php bin/console AbstractFactoryCommand` запустит код файла `./commands/Creational/AbstractFactory/AbstractFactoryCommand.php`
Все необходимые файлы для запуска этой команды находятся по пути `./src/Creational/AbstractFactory`

**Настройка xdebug для phpstorm**  

1. заходим в настройки `File -> Settings -> PHP -> Servers` нажимаем на значак плюса `+`
2. добавляем новый сервер  
   `name: docker`  
   `host: 127.0.0.1`  
   нажимаем галочку `Use path mappings`
   укажем расположение файлов внутри контейнера для папки проекта `Absolute path on the server: /var/www`
3. сверху в панели управления, рядом с кнопкой жучка дебага нажать на выпадающий список и выбираем Edit configurations
4. нажимаем `+` и добавляем `PHP Remote Debug`
5. добавляем конфигурацию
   `name: debug`
   нажимаем галочку `Filter Debug connection by IDE key`  
   `Server: docker` - имя сервера который создавали в предыдущем шаге  
   `IDE key: PHPSTORM` - этот параметр можно посмотреть в файле `docker/php-fpm/xdebug.ini` в параметре `xdebug.idekey`

***
