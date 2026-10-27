# 🌐 MiRed - Red Social Retro "Sopapa & Viridio"

Bienvenido a la documentación oficial del proyecto **MiRed**, una plataforma web comunitaria con estética nostálgica de las redes sociales clásicas de los años 2000s, desarrollada con HTML5 semántico, CSS3 moderno y JavaScript Vanilla modular.

---

## 📋 Resumen de Requerimientos y Funcionalidades de la Versión Actual

A continuación se detalla cómo se encuentra estructurado el proyecto tras las últimas modificaciones:

### 1. 🔐 Pantalla de Ingreso y Derivación Directa a Perfiles (`login.html`)
- **Acceso sin formulario de contraseñas:** Se reemplazaron los campos de texto/contraseña por opciones y botones directos e interactivos para ingresar al perfil de **Ulises** (`ulises.html`) y al perfil de **Amir** (`amir.html`).
- **Cuentas de prueba disponibles:** Se mantiene intacta la caja informativa con las credenciales de referencia:
  > **💡 Cuentas de prueba disponibles:**
  > • Usuario: `ulisesl+kpo` (o `ulises`) | Clave: `12345` (Deriva a **ulises.html**)
  > • Usuario: `amir1234` (o `amir`) | Clave: `12345` (Deriva a **amir.html**)
- **Código limpio de almacenamiento local:** Se eliminó toda manipulación de `LocalStorage` o `LocalHost` del cliente en favor de la navegación fluida y la futura tercerización con backend.

### 2. 👤 Perfiles Individuales y sus Datos Biográficos
- **Perfil de Ulises (`ulises.html`)**:
  - **Usuario:** `ulisesl+kpo`
  - **Avatar:** `img/hk.jpg`
  - **Estado:** `<span class="status-online">En línea</span>` (Verde)
  - **Edad:** `eighteen years cuh`
  - **Ubicación:** `tucuman, tero violado`
  - **Último Login:** `14/08/200X`
  - Acceso a personalización de fondo y navegación de contactos.
- **Perfil de Amir (`amir.html`)**:
  - **Usuario:** `amir1234`
  - **Avatar:** `img/mesi.jpg`
  - **Estado:** `<span class="status-offline">Desconectado</span>` (Rojo - Cumpliendo el requerimiento explícito de estado desconectado)
  - **Edad:** `18 Años`
  - **Ubicación:** `Gral. Roca`
  - **Último Login:** `mañana`
  - Acceso a personalización de fondo y navegación de contactos.

### 3. 🎮 Catálogo de Juegos Enriquecido y Páginas Detalladas
Tanto en `ulises.html` como en `amir.html`, en el portal principal `index.html` y en sus páginas dedicadas, cada juego cuenta con descripciones épicas, rosters de personajes/facciones, mecánicas detalladas y misiones legendarias de desbloqueo:
- **Juegos y Aplicaciones:**
  1. `minecraft3` (`minecraft3.html`): Rango Constructor Maestro; gremio integrado por Shadow, Tukito, El Niño Torres, Rompeviejas747 y Serafio. Misión de derrotar al Wither de Diamante en el End con el Hacha Ancestral para forjar y desbloquear la **Armadura de Netherite Legendaria con Protección Cósmica**.
  2. `gun2.0` (`gun2.0.html`): Escuadrón táctico integrado por Sargento Batistuta, Ghost-Ulises, Amir el Demoledor, Víbora Negra (Fede P) y Comandante Tukito. Operación con **4,500 balas** y racha de 25 bajas en Refinería Nuclear para desbloquear el **Subfusil Láser de Plasma MK-II**.
  3. `skate 2` (`skate2.html`): Team Pro oficial compuesto por Jamie Foy, Paul Rodriguez (P-Rod), Chris Joslin, Milton Martinez, Bam Margera y Leo Messi. Misión suprema de clavar el **"switch half-cab heelflip"** bajando la **lyon twenty five**, cayendo sobre los **ocho tornillos** y desbloquear la **Impact Legendaria** para que las wachas se te tiren encima (portada oficial `img/gonogld.jpg`).
  4. `eyes doom` (`eyes-doom.html`): Bestiario del abismo con El Ojo Primordial (Cthulhu Eye), Centinela del Éter, Vórtice Carmesí, Oráculo Ciego y Caballero del Vacío. Desafío récord Nivel 45/50 con combo de 99 golpes sin pestañear para desbloquear el **Ojo del Caos Supremo Legendario**.
  5. `blue spiral` (`blue-spiral.html`): Criaturas elementales (Espiral Astral de Ulises, Ígnea de Amir, Glacial de Fede P, Umbría de Shadow, Viento de Serafio). Sistema de recarga de 10,000 Watios de amistad cuántica para desbloquear la **Evolución Omega Espiral Legendaria con Alas de Luz**.
  6. `island-dead` (`island-dead.html`): Escuadrón de supervivientes con Capitán Ulises, Soldado Amir, Médico Fede P, Cazador El Niño Torres e Ingeniero Rompeviejas747. Defensa nocturna de la oleada 50 para reparar el refugio atacado y desbloquear el **Bunker Acorazado Legendario con Torreta Láser Orbital**.

### 4. 🫂 Cuadrícula de Amiguitos en la Red
Se mantiene la consistencia visual y de datos en todos los perfiles y modales:
1. `fede p` (Online - Avatar oficial `img/fede p.jpeg`, vinculado en amir.html, ulises.html e index.html)
2. `el niño torres` (Online)
3. `rompeviejas747` (Offline)
4. `tukito` (Online)
5. `Batistuta` (Offline)
6. `Serafio` (Offline)

### 5. 🧭 Barra Superior (Top-Bar) Limpia y Optimizada
- Se eliminaron los elementos **"👤 Visitante"** y el botón **"🔍 Búsqueda"** en los encabezados globales para ofrecer una interfaz más despejada y directa.
- Distribución ordenada mediante Flexbox:
  - **Lado izquierdo:** Logotipo y copyright corporativo (`🌐 Sopapa & Viridio - © 2026 S&P`).
  - **Lado derecho:**
    - Enlace de acceso a la portada (`🏠 Inicio`).
    - **🔔 Notificaciones (3):** Badge visual con panel emergente modal.
    - **👥 Solicitudes (1):** Badge visual con panel emergente interactivo para aceptar/rechazar.
    - **🚪 Cerrar Sesión:** Enlace estilizado para volver a la pantalla de selección de cuentas (`login.html`).

### 6. 📝 Anotaciones y Código Comentado
- Cada archivo (`index.html`, `login.html`, `ulises.html`, `amir.html`, todas las páginas de juegos, `404.html`, `style.css` y `app.js`) contiene comentarios descriptivos explicando el rol de cada etiqueta, estilo y función.

---

## 🔌 Integración Backend PHP y Base de Datos MySQL

Se implementó la conexión completa entre el sitio web y la base de datos MySQL **`u283509122_cyp`** alojada en Hostinger. El backend utiliza PHP con PDO (prepared statements) para garantizar seguridad contra inyecciones SQL, y expone una API de endpoints JSON consumidos por el frontend mediante `fetch` (AJAX).

### 🗄️ Esquema de Base de Datos

La base de datos `u283509122_cyp` contiene las siguientes **5 tablas**:

| Tabla | Campos | Descripción |
| :--- | :--- | :--- |
| `usuario` | `id_usuario`, `nombre_usuario`, `avatar`, `fondo` | Datos de perfil público de cada usuario (nombre, foto de perfil y fondo personalizado). |
| `inicio_sesion` | `id_inicio_sesion`, `id_usuario`, `usuario_login`, `contrasena_hex` | Credenciales de acceso. La contraseña se almacena en formato hexadecimal. |
| `actividad_usuario` | `id_actividad`, `id_usuario`, `estado`, `edad_texto`, `ubicacion`, `ultimo_login` | Información biográfica y estado de conexión (online/offline) que se muestra en el perfil. |
| `amiguitos` | `id_amiguito`, `id_usuario_propietario`, `id_usuario_amigo`, `fecha_agregado`, `estado_amistad` | Relaciones de amistad entre usuarios con estado (pendiente, aceptado, rechazado). |
| `registro` | `id_registro`, `id_usuario`, `correo_electronico`, `fecha_registro`, `estado_cuenta` | Datos de registro de cuentas: correo, fecha de alta y estado (activa, suspendida). |

### 🏗️ Arquitectura Backend (PHP)

```text
php/
├── config/
│   └── database.php          # Conexión centralizada PDO a MySQL (u283509122_cyp)
├── modelos/
│   ├── Usuario.php            # CRUD tabla usuario (obtener por ID/nombre, actualizar avatar/fondo)
│   ├── InicioSesion.php       # Verificación de credenciales contra tabla inicio_sesion
│   ├── ActividadUsuario.php   # Gestión de estado, edad, ubicación y último login
│   ├── Amiguitos.php          # Gestión de amistades (listar, agregar, aceptar, eliminar)
│   └── Registro.php           # Gestión de registros de cuentas (crear, consultar, estado)
└── api/
    ├── login.php              # POST — Autenticación de usuario y creación de sesión PHP
    ├── logout.php             # POST — Cierre de sesión y actualización de estado a offline
    ├── registro.php           # POST — Registro de cuenta nueva (inserta en 4 tablas con transacción)
    ├── sesion.php             # GET  — Verificar si el usuario tiene sesión activa
    ├── perfil.php             # GET  — Obtener datos completos de un perfil (?id= o ?nombre=)
    └── amigos.php             # GET/POST/PUT/DELETE — CRUD completo de amiguitos
```

### 🔗 Endpoints de la API PHP

| Endpoint | Método | Parámetros | Descripción |
| :--- | :--- | :--- | :--- |
| `php/api/login.php` | `POST` | `{ usuario_login, contrasena }` | Valida credenciales contra la BD, inicia sesión PHP y retorna datos del perfil. |
| `php/api/logout.php` | `POST` | — | Cierra la sesión, actualiza estado a "offline" y destruye la sesión PHP. |
| `php/api/registro.php` | `POST` | `{ nombre_usuario, usuario_login, contrasena, correo }` | Crea una cuenta nueva: inserta en las tablas usuario, inicio_sesion, actividad_usuario y registro usando transacción SQL. |
| `php/api/sesion.php` | `GET` | — | Verifica si existe sesión activa; retorna datos del usuario logueado o indica que no hay sesión. |
| `php/api/perfil.php` | `GET` | `?id=<id>` o `?nombre=<nombre>` | Retorna datos completos del perfil: usuario + actividad + registro. |
| `php/api/amigos.php` | `GET` | `?id_usuario=<id>` | Lista los amigos de un usuario con datos de perfil (JOIN con tabla usuario). |
| `php/api/amigos.php` | `POST` | `{ id_propietario, id_amigo }` | Envía solicitud de amistad (estado inicial: "pendiente"). |
| `php/api/amigos.php` | `PUT` | `{ id_amiguito, estado_amistad }` | Acepta o rechaza una solicitud de amistad. |
| `php/api/amigos.php` | `DELETE` | `{ id_amiguito }` | Elimina una relación de amistad. |

Todas las respuestas siguen el formato JSON:
```json
{
  "exito": true,
  "mensaje": "Descripción del resultado",
  "datos": { ... }
}
```

### 🔐 Configuración de la Conexión a la Base de Datos

El archivo `php/config/database.php` centraliza la conexión PDO. Para activar la conexión en el hosting, se debe configurar la contraseña real:

```php
define('DB_HOST', 'localhost');          // Host del servidor MySQL en Hostinger
define('DB_NAME', 'u283509122_cyp');     // Nombre de la base de datos
define('DB_USER', 'u283509122_cyp');     // Usuario de la base de datos
define('DB_PASS', '');                   // ← COMPLETAR con la contraseña real del hosting
define('DB_CHARSET', 'utf8mb4');         // Charset completo con soporte de emojis
```

> **⚠️ Importante:** La contraseña de la base de datos (`DB_PASS`) debe ser configurada directamente en el servidor de producción. Por seguridad, no se incluye en el repositorio.

### 🔄 Flujo de Autenticación (Login)

1. El usuario ingresa su **usuario** y **contraseña** en la pestaña "Iniciar Sesión" de `login.html`.
2. El frontend envía los datos al endpoint `php/api/login.php` mediante `fetch` (AJAX con JSON).
3. El backend busca al usuario en la tabla `inicio_sesion` y compara la contraseña convertida a hexadecimal con `contrasena_hex`.
4. Si las credenciales son válidas:
   - Se obtienen los datos del perfil desde las tablas `usuario` y `actividad_usuario`.
   - Se actualiza el estado a **"online"** y se registra la fecha/hora del último login.
   - Se crea una sesión PHP (`$_SESSION`) con los datos del usuario.
   - Se retorna un JSON con `exito: true` y los datos del perfil.
5. El frontend recibe la respuesta, muestra un mensaje de bienvenida y redirige al perfil correspondiente (`ulises.html`, `amir.html` o `index.html` para usuarios nuevos).

### 📝 Flujo de Registro de Cuenta Nueva

1. El usuario hace clic en la pestaña **"Crear Cuenta"** en `login.html`.
2. Completa los 4 campos del formulario: **Nombre de Usuario** (público), **Usuario de Login**, **Correo Electrónico** y **Contraseña** (con confirmación).
3. El frontend valida en el navegador (campos obligatorios, contraseñas coinciden, largo mínimo) y envía los datos al endpoint `php/api/registro.php` vía `fetch` (POST con JSON).
4. El backend PHP ejecuta las siguientes validaciones:
   - Verifica que el `usuario_login` no esté ya registrado en la tabla `inicio_sesion`.
   - Verifica que el `correo` no esté ya en la tabla `registro`.
   - Verifica que el `nombre_usuario` no exista en la tabla `usuario`.
5. Si todo es válido, se ejecuta una **transacción SQL** que inserta registros en las 4 tablas:
   - `usuario` → perfil público con avatar por defecto (`img/images.jpg`).
   - `inicio_sesion` → credenciales con la contraseña convertida a hexadecimal.
   - `actividad_usuario` → datos biográficos iniciales (estado "offline", edad y ubicación "Sin especificar").
   - `registro` → correo, fecha de registro actual y estado de cuenta "activa".
6. Si alguna inserción falla, se revierte toda la transacción (`ROLLBACK`) para mantener la integridad de datos.
7. El frontend muestra un mensaje de éxito y automáticamente cambia a la pestaña de Login para que el usuario pueda ingresar con su cuenta recién creada.

### 🔗 Integración Frontend ↔ Backend en los HTML

Todos los archivos HTML del sitio están adaptados para comunicarse con el backend PHP:

| Archivo HTML | Integración con PHP |
| :--- | :--- |
| `login.html` | Formulario de **Login** → `php/api/login.php` (POST). Formulario de **Registro** → `php/api/registro.php` (POST). Sistema de pestañas para alternar entre ambos. |
| `ulises.html` | **Carga dinámica de perfil** desde la BD vía `php/api/perfil.php` (GET). **Logout real** vía `php/api/logout.php` (POST). Si el backend no está disponible, muestra los datos estáticos del HTML como fallback. |
| `amir.html` | Igual que `ulises.html`: carga de perfil desde BD y logout real vía PHP con fallback estático. |
| `index.html` | **Verifica sesión activa** vía `php/api/sesion.php` (GET). **Logout real** vía PHP. Muestra el nombre del usuario logueado en la barra superior. |

**Flujo de datos en los perfiles (`ulises.html` / `amir.html`):**
1. Al cargar la página, un script JavaScript llama a `php/api/perfil.php` con el nombre o ID del usuario.
2. Si el servidor responde con datos, se actualizan dinámicamente: el nombre de usuario, avatar, estado (online/offline), edad, ubicación y último login.
3. El botón "Cerrar Sesión" llama a `php/api/logout.php` para destruir la sesión PHP, limpia el `sessionStorage` del navegador y redirige a `login.html`.
4. Si el backend no está disponible (por ejemplo, abriendo los HTML localmente sin servidor PHP), los datos estáticos escritos en el HTML se mantienen visibles sin errores.

### 🛡️ Seguridad Implementada

- **PDO Prepared Statements:** Todas las consultas SQL usan parámetros preparados para prevenir inyecciones SQL.
- **Validación de entrada:** Los datos recibidos se validan y sanitizan tanto en el frontend (HTML5 + JS) como en el backend (PHP).
- **Transacciones SQL:** El registro de usuarios usa transacciones para garantizar la integridad de datos (todo se inserta o nada).
- **Sesiones PHP seguras:** Se gestiona la autenticación mediante `$_SESSION` en el servidor.
- **Manejo de errores:** Los errores de BD se registran en logs del servidor sin exponer información sensible al usuario.
- **CORS configurado:** Los endpoints incluyen cabeceras de control de acceso para peticiones cross-origin.
- **Fallback estático:** Si el backend no está activo, los HTML muestran sus datos estáticos sin errores de JavaScript.

---

## 🗃️ Conexión con HeidiSQL — Guía para Administrar la Base de Datos

**HeidiSQL** es un programa gratuito para Windows que permite ver y editar la base de datos MySQL de manera visual (como una planilla). Sirve para agregar datos de prueba, verificar los registros y administrar las tablas sin escribir SQL a mano.

### Paso a Paso para Conectar HeidiSQL con la BD de Hostinger

1. **Descargar e instalar HeidiSQL:**
   - Ir a [https://www.heidisql.com/download.php](https://www.heidisql.com/download.php) y descargar la versión más reciente.
   - Instalarlo normalmente (siguiente, siguiente, finalizar).

2. **Obtener los datos de conexión desde Hostinger:**
   - Ingresar al panel de control de **Hostinger** → sección **Bases de datos** → **MySQL**.
   - Anotar los siguientes datos que aparecen ahí:
     - **Servidor/Host:** Generalmente es algo como `srv###.hstgr.io` o `localhost` (depende del plan). En el panel de Hostinger aparece como "Hostname del servidor MySQL".
     - **Nombre de BD:** `u283509122_cyp`
     - **Usuario de BD:** `u283509122_cyp`
     - **Contraseña:** la que se haya configurado al crear la base de datos en Hostinger.
     - **Puerto:** `3306` (es el puerto por defecto de MySQL).

3. **Crear la conexión en HeidiSQL:**
   - Abrir HeidiSQL → clic en **"Nueva"** (abajo a la izquierda) para crear una sesión nueva.
   - Configurar los campos:
     - **Tipo de red:** `MySQL (TCP/IP)`
     - **Nombre del host / IP:** pegar el hostname que anotaste de Hostinger (ej: `srv1234.hstgr.io`)
     - **Usuario:** `u283509122_cyp`
     - **Contraseña:** la contraseña real de la BD
     - **Puerto:** `3306`
   - Clic en **"Abrir"** para conectarse.

4. **Navegar las tablas:**
   - En el panel izquierdo aparecerá la base de datos `u283509122_cyp`.
   - Hacer clic en ella y se verán las 5 tablas: `usuario`, `inicio_sesion`, `actividad_usuario`, `amiguitos`, `registro`.
   - Al hacer clic en cada tabla, se pueden ver los registros existentes en la pestaña **"Datos"**.

5. **Insertar datos de prueba (ejemplo para las cuentas de Ulises y Amir):**
   - Ir a la pestaña **"Consulta"** (o Query) y pegar los siguientes comandos SQL:

```sql
-- =============================================
-- DATOS DE PRUEBA PARA CP-ROS
-- Ejecutar estos INSERT en HeidiSQL para crear
-- las cuentas de Ulises y Amir en la BD.
-- =============================================

-- 1. Insertar usuarios en la tabla 'usuario'
INSERT INTO usuario (nombre_usuario, avatar, fondo) VALUES ('ulisesl+kpo', 'img/hk.jpg', '');
INSERT INTO usuario (nombre_usuario, avatar, fondo) VALUES ('amir1234', 'img/mesi.jpg', '');

-- 2. Insertar credenciales en 'inicio_sesion'
--    Contraseña "12345" convertida a hexadecimal = "3132333435"
INSERT INTO inicio_sesion (id_usuario, usuario_login, contrasena_hex) VALUES (1, 'ulisesl+kpo', '3132333435');
INSERT INTO inicio_sesion (id_usuario, usuario_login, contrasena_hex) VALUES (2, 'amir1234', '3132333435');

-- 3. Insertar actividad/datos biográficos en 'actividad_usuario'
INSERT INTO actividad_usuario (id_usuario, estado, edad_texto, ubicacion, ultimo_login) VALUES (1, 'online', 'eighteen years cuh', 'tucuman, tero violado', '14/08/200X');
INSERT INTO actividad_usuario (id_usuario, estado, edad_texto, ubicacion, ultimo_login) VALUES (2, 'offline', '18 Años', 'Gral. Roca', 'mañana');

-- 4. Insertar registros de cuenta en 'registro'
INSERT INTO registro (id_usuario, correo_electronico, fecha_registro, estado_cuenta) VALUES (1, 'ulises@cpros.com', NOW(), 'activa');
INSERT INTO registro (id_usuario, correo_electronico, fecha_registro, estado_cuenta) VALUES (2, 'amir@cpros.com', NOW(), 'activa');
```

   - Seleccionar todo el texto y presionar **F9** (o el botón ▶️ "Ejecutar") para insertar los datos.

6. **Verificar:**
   - Hacer clic en la tabla `usuario` → pestaña "Datos" → deberían aparecer los 2 usuarios.
   - Hacer clic en `inicio_sesion` → deberían verse las credenciales.
   - Ahora al ir a `login.html` en el hosting y escribir `ulisesl+kpo` con contraseña `12345`, debería funcionar el login.

> **⚠️ Nota sobre el Host remoto:** Para conectarte desde HeidiSQL a Hostinger, el hosting debe tener habilitado el **acceso remoto MySQL**. En Hostinger esto se configura en: Panel de control → Bases de datos → Acceso remoto MySQL → agregar tu IP (o `%` para cualquier IP, pero esto es menos seguro). Si solo necesitas administrar desde el propio hosting, podés usar **phpMyAdmin** que viene incluido en el panel de Hostinger (no necesita HeidiSQL).

---

## 🔮 Futuras Actualizaciones Pendientes

Las siguientes mejoras están planificadas para próximas versiones:

1. **Seguridad Avanzada:**
   - Migración de contraseñas hexadecimales a hashing con `password_hash` (BCRYPT/ARGON2ID).
   - Implementación de tokens CSRF en formularios.
   - Cookies de sesión con directivas `HttpOnly`, `Secure` y `SameSite=Strict`.

2. **Funcionalidades Adicionales:**
   - Endpoints para notificaciones y mensajes privados.
   - Subida de avatares y fondos directamente desde el perfil al servidor.
   - Panel de administración para gestión de usuarios.

3. **Sincronización en Tiempo Real:**
   - Posibilidad de incorporar WebSockets o Server-Sent Events (SSE) para actualización en vivo del estado de los amigos y avisos instantáneos de nuevos mensajes o notificaciones.

---

## 🔑 Cuentas de Prueba Disponibles (`login.html`)

| Usuario | Contraseña | Destino al Abrir Perfil | Estado Inicial |
| :--- | :--- | :--- | :--- |
| `ulisesl+kpo` (o `ulises`) | `12345` | `ulises.html` | 🟢 En línea |
| `amir1234` (o `amir`) | `12345` | `amir.html` | 🔴 Desconectado |

---

## 📂 Estructura del Proyecto

```text
unodostres/
├── README.md               # Documentación general y planificación de actualizaciones
├── index.html              # Portada principal y acceso a perfiles
├── login.html              # Pantalla de login + registro con formularios conectados al backend PHP
├── ulises.html             # Perfil individual de Ulises (ulisesl+kpo)
├── amir.html               # Perfil individual de Amir (amir1234)
├── blue-spiral.html        # Vista y lanzador del juego Blue Spiral
├── eyes-doom.html          # Vista y lanzador del juego Eyes Doom
├── gun2.0.html             # Vista y lanzador del juego Gun 2.0
├── island-dead.html        # Vista y lanzador del juego Island Dead
├── minecraft3.html         # Vista y lanzador del juego Minecraft 3
├── skate2.html             # Vista y lanzador de Skate 2 (portada gonogld.jpg, roster pro y truco legendario)
├── skateboard.html         # Archivo de compatibilidad y redirección a skate2.html
├── 404.html                # Página personalizada de error 404
├── css/
│   └── style.css           # Estilos retro, Flexbox, Grid y diseño responsivo
├── js/
│   └── app.js              # Controlador de modales, eventos y personalización de temas
├── php/                    # ★ Backend PHP con conexión a base de datos MySQL
│   ├── config/
│   │   └── database.php    #   Conexión PDO centralizada a u283509122_cyp (Hostinger)
│   ├── modelos/
│   │   ├── Usuario.php     #   Modelo CRUD para tabla usuario
│   │   ├── InicioSesion.php#   Modelo de verificación de credenciales
│   │   ├── ActividadUsuario.php # Modelo de actividad y estado del usuario
│   │   ├── Amiguitos.php   #   Modelo de relaciones de amistad
│   │   └── Registro.php    #   Modelo de registro de cuentas
│   └── api/
│       ├── login.php       #   Endpoint POST: autenticación y sesión
│       ├── logout.php      #   Endpoint POST: cierre de sesión
│       ├── registro.php    #   Endpoint POST: registro de cuenta nueva (transacción en 4 tablas)
│       ├── sesion.php      #   Endpoint GET: verificar sesión activa
│       ├── perfil.php      #   Endpoint GET: datos completos del perfil
│       └── amigos.php      #   Endpoint CRUD: gestión de amiguitos
├── img/                    # Catálogo de recursos gráficos, avatares (fede p.jpeg, gonogld.jpg, etc.)
├── package.json            # Configuración de dependencias
└── webpack.config.*.js     # Configuración de compilación Webpack
```

---

## 🚀 Cómo Ejecutar y Navegar el Proyecto

1. **Apertura Directa:** Abre cualquier archivo `.html` (por ejemplo `index.html` o `login.html`) en tu navegador web preferido.
2. **Acceso a Perfiles:** Desde `login.html` o `index.html`, haz clic en los botones de **Abrir Perfil de Ulises** o **Abrir Perfil de Amir** para navegar entre sus vistas dedicadas.
3. **Interacción con Modales:** Haz clic en **🔔 Notificaciones** o **👥 Solicitudes** en la barra superior para desplegar las ventanas modales interactivas.
4. **Personalización:** En cualquier perfil, haz clic en **🎨 [+] Editar Tema / Personalizar** para elegir una imagen local como fondo de pantalla dinámico.
