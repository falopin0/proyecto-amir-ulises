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

## 🔮 Futuras Actualizaciones: Tercerización con Servidor Externo y PHP

Todo mecanismo de persistencia y guardado que anteriormente utilizaba `LocalStorage` o entornos locales simulados (`LocalHost`) ha sido removido del código fuente frontend y documentado en esta sección para ser implementado mediante una arquitectura cliente-servidor robusta y tercerizada:

1. **Servidor Backend Dedicado (PHP 8.x):**
   - Desarrollo de una API RESTful o arquitectura basada en endpoints PHP (`/api/login.php`, `/api/user.php`, `/api/notifications.php`, `/api/messages.php`).
   - Gestión nativa de sesiones seguras en el servidor mediante `$_SESSION` y cookies con directivas `HttpOnly`, `Secure` y `SameSite=Strict`.

2. **Base de Datos Relacional Centralizada (MySQL / PostgreSQL):**
   - **Tabla `usuarios`:** Almacenamiento de credenciales con hashing criptográfico (`password_hash` con algoritmo `PASSWORD_BCRYPT` o `PASSWORD_ARGON2ID`), roles, avatares y estados de conexión (`online`/`offline`) calculados por actividad en el servidor.
   - **Tabla `amigos` y `solicitudes`:** Relación muchos a muchos para el manejo en tiempo real de amistades, solicitudes entrantes y estados de aprobación.
   - **Tabla `notificaciones` y `mensajes`:** Persistencia de bandejas de entrada, lectura/no lectura e historial de mensajes privados entre usuarios.
   - **Tabla `preferencias_usuario`:** Guardado del tema de fondo personalizado de cada usuario en el servidor o CDN en lugar de memoria volátil del navegador.

3. **Autenticación y Seguridad Avanzada:**
   - Implementación de tokens JWT o sesiones PHP con renovación periódica contra ataques de fijación de sesión.
   - Sanitización y validación estricta de entradas en el servidor contra inyecciones SQL (PDO prepared statements) y ataques XSS.

4. **Sincronización en Tiempo Real:**
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
├── login.html              # Pantalla de acceso a perfiles de Amir y Ulises
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
