# ez-customers

`ez-customers` es un gestor de clientes que permite gestionar clientes y 
facturas de forma sencilla. Asimismo permite a los administradores de una 
empresa gestionar qué empleados tienen acceso al programa.

`ez-customers` es mi proyecto de la asignatura "Desarrollo en entorno 
servidor" del primer trimestre del segundo curso de "Desarrollo de 
aplicaciones web".

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
modificando las variables del archivo `.env`, que se corresponden con los 
credenciales de conexión a base de datos.

## Iniciando sesión

Podremos acceder a la aplicación con el nombre de usuario `admin` y la 
contraseña `admin`.

## Tipos de usuario

Existen dos tipos de usuario:

* **Administradores** - Pueden ver y editar todos los clientes, y sus facturas,
de todo el mundo. Pueden dar de alta nuevos usuarios en la aplicación.
* **Usuarios** - Solo pueden ver y editar sus propios clientes, y sus facturas.
No pueden dar de alta a nadie.

## Rutas y permisos de acceso

Los permisos de acceso de las rutas son los siguientes:

* `/` - Pública
    * `/login` - Pública
    * `/customers` - Usuarios autenticados
    * `/customers/new` - Usuarios autenticados
    * `/customers/<id de cliente>` - Usuarios autenticados dueños del 
    cliente, o bien administradores.
        * `/customers/<id de cliente>/bills` - Usuarios autenticados dueños del 
            cliente, o bien administradores.
        * `/customers/<id de cliente>/bills/<id de factura>` - Usuarios 
        autenticados dueños 
        del cliente, o bien administradores. 
        * `/customers/<id de cliente>/bills/new` - Usuarios autenticados dueños 
        del cliente, o bien administradores.
    * `/users` - Administradores
    * `/users/new` - Administradores
    * `/users/<id de usuario>` - Administradores, o usuarios autenticados, 
    pero solo para su propio perfil de usuario.

## Ejemplos de uso

La empresa *ComputerRepair S.L.* necesita un software que le permita 
organizar sus facturas. Sus empleados se dividen en encargados y becarios. 
Los encargados necesitan tener acceso a todos los clientes, pero cada becario
gestiona su propio grupo de clientes y no debe interferir en el de los demás.

*ComputerRepair* crea cuentas de administrador para sus encargados y cuentas 
de usuario estándar para sus becarios.

Cuando un becario añade clientes, y añade facturas a los clientes, los 
administradores tienen acceso a esa información para poder controlarla.
 