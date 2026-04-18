# Task API - Laravel + Docker

API RESTful desarrollada en Laravel para la gestión de tareas, con autenticación mediante tokens (Laravel Sanctum) e integración con API externa.

---

## Tecnologías utilizadas

* PHP 8.x
* Laravel
* MySQL
* Docker & Docker Compose
* Laravel Sanctum
* Postman

---

## Instalación y ejecución

### 1. Clonar repositorio

```bash
git clone <repo-url>
cd task-api
```

---

### 2. Levantar contenedores

```bash
docker compose up -d --build
```

---

### 3. Instalar dependencias

```bash
docker compose exec app composer install
```

---

### 4. Configurar entorno

```bash
cp .env.example .env
```

Verificar variables de base de datos:

```env
DB_HOST=db
DB_DATABASE=task_api
DB_USERNAME=root
DB_PASSWORD=root
```

---

### 5. Generar clave

```bash
docker compose exec app php artisan key:generate
```

---

### 6. Ejecutar migraciones

```bash
docker compose exec app php artisan migrate
```

---

## Autenticación

### Registro

POST `/api/register`

```json
{
  "name": "Nicolas",
  "email": "nico@test.com",
  "password": "123456"
}
```

---

### Login

POST `/api/login`

```json
{
  "email": "nico@test.com",
  "password": "123456"
}
```

Respuesta:

```json
{
  "token": "xxxxx"
}
```

---

### Uso del token

En Postman:

Authorization → Bearer Token

```
Bearer TU_TOKEN
```

---

## Endpoints

### Obtener tareas

GET `/api/tasks`
Requiere autenticación

---

### Crear tarea

POST `/api/tasks`

```json
{
  "title": "Nueva tarea",
  "description": "Descripción",
  "completed": false
}
```

---

### Ver tarea

GET `/api/tasks/{id}`

---

### Actualizar tarea

PUT `/api/tasks/{id}`

---

### Eliminar tarea

DELETE `/api/tasks/{id}`

---

## API externa

### Endpoint

GET `/api/external-tasks`

---

### Fuente

https://jsonplaceholder.typicode.com/todos

---

### Descripción

Este endpoint consume una API externa y retorna la información en formato JSON desde Laravel.

---

## Pruebas

Se utilizó Postman para validar:

 Autenticación
 CRUD de tareas
 Consumo de API externa

---

## Estructura del proyecto

```
src/
├── app/
│   ├── Http/
│   ├── Models/
│   ├── Services/
│   ├── Repositories/
│
├── routes/
│   └── api.php
│
├── database/
│
└── README.md
```

---

## Características implementadas

 CRUD completo de tareas
 Arquitectura por capas (Controller → Service → Repository)
 Validaciones con FormRequest
 Autenticación con Sanctum
 Consumo de API externa
 Dockerización del proyecto

---

## Autor

Desarrollado por Nicolas Vargas
