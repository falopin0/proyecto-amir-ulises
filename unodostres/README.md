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
    ├── sesion.php             # GET  — Verificar si el usuario tiene sesión activa
    ├── perfil.php             # GET  — Obtener datos completos de un perfil (?id= o ?nombre=)
    └── amigos.php             # GET/POST/PUT/DELETE — CRUD completo de amiguitos
```

### 🔗 Endpoints de la API PHP

| Endpoint | Método | Parámetros | Descripción |
| :--- | :--- | :--- | :--- |
| `php/api/login.php` | `POST` | `{ usuario_login, contrasena }` | Valida credenciales contra la BD, inicia sesión PHP y retorna datos del perfil. |
| `php/api/logout.php` | `POST` | — | Cierra la sesión, actualiza estado a "offline" y destruye la sesión PHP. |
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

1. El usuario ingresa su **usuario** y **contraseña** en el formulario de `login.html`.
2. El frontend envía los datos al endpoint `php/api/login.php` mediante `fetch` (AJAX con JSON).
3. El backend busca al usuario en la tabla `inicio_sesion` y compara la contraseña convertida a hexadecimal con `contrasena_hex`.
4. Si las credenciales son válidas:
   - Se obtienen los datos del perfil desde las tablas `usuario` y `actividad_usuario`.
   - Se actualiza el estado a **"online"** y se registra la fecha/hora del último login.
   - Se crea una sesión PHP (`$_SESSION`) con los datos del usuario.
   - Se retorna un JSON con `exito: true` y los datos del perfil.
5. El frontend recibe la respuesta, muestra un mensaje de bienvenida y redirige al perfil correspondiente (`ulises.html` o `amir.html`).

### 🛡️ Seguridad Implementada

- **PDO Prepared Statements:** Todas las consultas SQL usan parámetros preparados para prevenir inyecciones SQL.
- **Validación de entrada:** Los datos recibidos se validan y sanitizan antes de procesarse.
- **Sesiones PHP seguras:** Se gestiona la autenticación mediante `$_SESSION` en el servidor.
- **Manejo de errores:** Los errores de BD se registran en logs del servidor sin exponer información sensible al usuario.
- **CORS configurado:** Los endpoints incluyen cabeceras de control de acceso para peticiones cross-origin.

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
├── login.html              # Pantalla de login con formulario conectado al backend PHP
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
