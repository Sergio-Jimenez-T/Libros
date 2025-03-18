# Libros
Este proyecto es una aplicación web desarrollada en **PHP** bajo el patrón **Modelo-Vista-Controlador (MVC)**. Está diseñado para ejecutarse en **XAMPP** y permite visualizar una tabla con libros almacenados en una base de datos. Además, ofrece la opción de consultar detalles de un libro o varios libros específicos a través de la URL.  

---

## 📚 Índice  

- [🚀 Funcionalidades](#-funcionalidades)  
- [🛠 Requisitos](#-requisitos)  
- [🔧 Instalación](#-instalación)  
  - [1⃣ Descargar e instalar XAMPP](#1⃣-descargar-e-instalar-xampp)  
  - [2⃣ Clonar el repositorio](#2⃣-clonar-el-repositorio)  
  - [3⃣ Configurar la base de datos](#3⃣-configurar-la-base-de-datos)  
  - [4⃣ Configurar la conexión a la base de datos](#4⃣-configurar-la-conexión-a-la-base-de-datos)  
- [🎯 Uso](#-uso)  
  - [📌 Mostrar la tabla de libros](#-mostrar-la-tabla-de-libros)  
  - [📌 Ver detalles de un libro específico](#-ver-detalles-de-un-libro-específico)  
  - [📌 Ver varios libros a la vez](#-ver-varios-libros-a-la-vez)  
- [📂 Estructura del Proyecto](#-estructura-del-proyecto)  
- [⚠️ Notas](#-notas)  
- [📌 Repositorio en GitHub](#-repositorio-en-github)  

---

## 🚀 Funcionalidades  

✅ **Visualizar una tabla con libros** extraídos de la base de datos.  
✅ **Consultar información de un libro específico** ingresando su `ID` en la URL.  
✅ **Mostrar varios libros simultáneamente**, especificando sus `ID`s en la URL.  
✅ **Diseño estructurado en MVC**, separando lógica, datos y vistas.  
✅ **URLs amigables** para una mejor experiencia de usuario.  

---

## 🛠 Requisitos  

Para comenzar, asegúrate de contar con:  
1. **XAMPP**.  
2. **Navegador web**.  
3. **Base de datos MySQL**.

---

## 🔧 Instalación  

### 1⃣ Descargar e instalar XAMPP  

- Descarga XAMPP desde [https://www.apachefriends.org](https://www.apachefriends.org) e instálalo.  
- Abre el **Panel de Control de XAMPP en modo administrador** y activa los módulos:  
  - **Apache** (para el servidor web).  
  - **MySQL** (para la base de datos).  

---

### 2⃣ Clonar el repositorio  

Ejecuta el siguiente comando dentro de la carpeta `htdocs` de XAMPP:  

```sh
git clone https://github.com/Sergio-Jimenez-T/Libros.git
```

---

### 3⃣ Configurar la base de datos  

Para que la aplicación funcione correctamente, debes crear la base de datos **`libreria`** y la tabla **`libros`** con la siguiente estructura:  

```sql
CREATE DATABASE libreria;
USE libreria;

CREATE TABLE libros (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    editorial VARCHAR(100) NOT NULL,
    url TEXT NOT NULL
);
```

📌 **Descripción de los campos:**  
- `id`: Identificador único del libro.  
- `titulo`: Nombre del libro.  
- `autor`: Nombre del autor.  
- `editorial`: Editorial del libro.  
- `url`: Enlace a información adicional o compra del libro.  

---

### 4⃣ Configurar la conexión a la base de datos  

Para conectar la aplicación a la base de datos, edita el archivo **`config/Database.php`** y asegúrate de que tenga la siguiente configuración:  

```php
<?php
class Database {
    private $host = "localhost";
    private $db_name = "libreria";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
```

---

## 🎯 Uso

### 📌 Mostrar la tabla de libros  
Accede a la aplicación en:  
```
http://localhost/libros/
```

### 📌 Ver detalles de un libro específico  
Para ver la información del libro con **ID 3**, accede a:  
```
http://localhost/libros/index.php?action=ver&id=3
```

### 📌 Ver varios libros a la vez  
Para mostrar, por ejemplo, **3 libros** a la vez, accede a:  
```
http://localhost/libros/index.php?action=verVarios&cantidad=3
```

---

## 📂 Estructura del Proyecto  

El proyecto contiene el folder pricipal llamado:
libro
El cual contiene 4 carpetas (configuracion, Controller, model, view) juntoaun archivo inde.php y un archivo SQL para la recreacion de las tablas con los datos de la B.D. utilizada en este proyecto
	<H2>configuracion</H2>
	<H5>La carpeta de configuración contiene un archivo .php el cual se encarga de la conexión entre la pagina web y la base de datos en phpMyAdmin con el nombre de libreria y con una tabla llamada libros donde se almacenan los libros de la base de datos</H5>
	<H2>Controller</H2>
	<H5>La carpeta Controller es la encargada de contener el controlador de nuestra ppagina web el cual se encarga de llevar a cabo las consultas en la B.D. de los id o de la cantidad de libros solicitados por el usuario desde la URL de la pagina</H5>
	<H2>model</H2>
	<H5>La carpeta de model contiene el modelo de libro el cual Dentro de la clase Libro, se definen cuatro propiedades públicas:
**$id: Identificador único del libro.**
<br>
**$titulo: El título del libro.**
<br>
**$autor: El autor del libro.**
<br>
**$editorial: La editorial que publicó el libro.**
<br>
	</H5>
	<H5>El contructor recibe cuatro parámetros: $id, $titulo, $autor, y $editorial, y asigna esos valores a las propiedades correspondientes de la clase utilizando this.</H5>
	<H2>view</H2>
	<H5>La carpeta view contiene todas las vistas de las tablas dependiendo de el tipo de consulta que se va a realizar ademas de que tambien ya contiene unos estilos encargados de hacer la tabla un poco mas amigable a la vista del usuario</H5>
---

## ⚠️ Notas  

Importante tener en cuenta que es un codigo con fines didacticos escolares sin animo de lucro  🫰 que tenga buen dia

---

## 📌 Repositorio en GitHub  

Puedes encontrar el repositorio en:  
[https://github.com/Sergio-Jimenez-T/Libros](https://github.com/Sergio-Jimenez-T/Libros)

