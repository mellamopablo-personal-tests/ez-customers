# ez-customers

## Instalación

El proyecto usa Vagrant para configurar el entorno de desarrollo. Para 
inicializarlo, hay que instalar 
[Vagrant](https://www.vagrantup.com/downloads.html) y 
[VirtualBox](https://www.virtualbox.org/wiki/Downloads). Una vez instalados,
podremos montar la máquina virtual:

```sh
$ git clone https://github.com/mellamopablo-personal-tests/ez-customers.git
$ cd ez-customers
$ vagrant up
```

Tras haberse configurado la máquina virtual, podremos acceder al proyecto 
desde `localhost:3000`.


## Variables de entorno

Por defecto, al hacer `vagrant up`, el proyecto se conecta a la base de datos
local de la máquina virtual. Podemos conectarnos a otra base de datos 
modificando los datos del archivo `.env`.

## Iniciando sesión

Podremos acceder a la aplicación con el nombre de usuario `admin` y la 
contraseña `admin`.

## Tipos de usuario

Existen dos tipos de usuario:

* Administradores - Pueden ver y editar todos los clientes de todo el mundo. 
Pueden dar de alta nuevos usuarios en la aplicación.
* Usuarios - Solo pueden ver sus propios clientes. No pueden dar de alta a 
nadie.
