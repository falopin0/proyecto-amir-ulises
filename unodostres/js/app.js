/**
 * ARCHIVO PRINCIPAL DE LÓGICA JAVASCRIPT: app.js
 * Red Social "CP-ROS"
 *
 * Este script controla:
 * 1. Inicialización del DOM y controladores de interfaz de usuario.
 * 2. Navegación directa entre perfiles y accesos rápidos.
 * 3. Sistema de ventanas emergentes (Modales) para Notificaciones, Solicitudes, Amiguitos y Mensajes.
 * 4. Personalización del fondo de pantalla con subida local de imágenes (FileReader).
 * 5. Documentación exhaustiva paso a paso de cada bloque de código.
 */

// Evento principal: Se ejecuta cuando todo el árbol HTML ha sido completamente cargado y parseado por el navegador
document.addEventListener('DOMContentLoaded', () => {

  /* ==========================================================================
     1. SISTEMA DINÁMICO DE VENTANAS EMERGENTES (MODALES)
     Propósito: Mostrar páneles interactivos para Notificaciones, Solicitudes de Amistad,
     Lista de Amiguitos y Envío de Mensajes sin recargar la página.
     ========================================================================== */

  // Verificamos si existe el contenedor modal en el DOM actual
  let modalContainer = document.getElementById('modal-container');
  let modalTitle = document.getElementById('modal-title');
  let modalBody = document.getElementById('modal-body');
  let closeModalBtn = document.querySelector('.close-modal');

  // Si no existe el contenedor modal en la página (por ejemplo en páginas de juegos), lo creamos dinámicamente
  if (!modalContainer) {
    const modalHTML = `
      <div id="modal-container" class="modal-overlay hidden" role="dialog" aria-modal="true">
        <div class="modal-content">
          <div class="caja-header">
            <span id="modal-title">Título</span>
            <button class="close-modal" aria-label="Cerrar ventana" style="float: right;">✕</button>
          </div>
          <div class="caja-body" id="modal-body">
            <!-- Contenido dinámico inyectado por JavaScript -->
          </div>
        </div>
      </div>
    `;
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    // Reasignamos las referencias tras la inyección en el DOM
    modalContainer = document.getElementById('modal-container');
    modalTitle = document.getElementById('modal-title');
    modalBody = document.getElementById('modal-body');
    closeModalBtn = document.querySelector('.close-modal');
  }

  /**
   * Función para abrir el modal con un título y contenido HTML personalizado.
   * @param {string} title - Título del encabezado del modal.
   * @param {string} contentHTML - Marcado HTML con el cuerpo del mensaje o lista.
   */
  function abrirModal(title, contentHTML) {
    if (modalTitle && modalBody && modalContainer) {
      modalTitle.textContent = title;
      modalBody.innerHTML = contentHTML;
      modalContainer.classList.remove('hidden');
    }
  }

  /**
   * Función para cerrar el modal ocultándolo mediante la clase CSS .hidden.
   */
  function cerrarModal() {
    if (modalContainer) {
      modalContainer.classList.add('hidden');
    }
  }

  // Evento para el botón de cierre (la "X")
  if (closeModalBtn) {
    closeModalBtn.addEventListener('click', cerrarModal);
  }

  // Cerrar el modal al hacer clic en el fondo oscuro exterior
  if (modalContainer) {
    modalContainer.addEventListener('click', (e) => {
      if (e.target === modalContainer) {
        cerrarModal();
      }
    });
  }

  // Cerrar el modal con la tecla Escape del teclado
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modalContainer && !modalContainer.classList.contains('hidden')) {
      cerrarModal();
    }
  });

  /* ==========================================================================
     5. ASIGNACIÓN DE EVENTOS A LOS BOTONES DE ACCIÓN (EVENT LISTENERS)
     ========================================================================== */

  // A) SECCIÓN NOTIFICACIONES
  // Propósito: Mostrar las novedades recientes de la red social al presionar "🔔 Notificaciones"
  const btnsNotificaciones = document.querySelectorAll('.btn-notificaciones');
  btnsNotificaciones.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      abrirModal('🔔 Bandeja de Notificaciones', `
        <p style="font-size: 13px; color: #555; margin-bottom: 10px;">
          <i>Aquí ves las actividades recientes de tus amigos y las actualizaciones de la red.</i>
        </p>
        <hr>
        <ul style="list-style: none; padding-left: 0; line-height: 1.8; font-size: 13px;">
          <li>📩 <b>ulisesl+kpo</b> te ha enviado un mensaje nuevo.</li>
          <li>👥 <b>rompeviejas747</b> te envió una solicitud de amistad.</li>
          <li>🎮 El juego <b>Minecraft 3</b> se actualizó al parche v1.4.</li>
          <li>🏆 <b>Shadow</b> batió tu récord en Minecraft 3.</li>
        </ul>
        <div style="text-align: right; margin-top: 15px;">
          <button onclick="document.getElementById('modal-container').classList.add('hidden');" style="padding: 6px 12px;">Entendido</button>
        </div>
      `);
    });
  });

  // B) SECCIÓN SOLICITUDES DE AMISTAD
  // Propósito: Gestionar solicitudes entrantes con botones de Aceptar o Rechazar
  const btnsSolicitudes = document.querySelectorAll('.btn-solicitudes');
  btnsSolicitudes.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      abrirModal('👥 Solicitudes de Amistad Pendientes', `
        <p style="font-size: 13px; color: #555; margin-bottom: 10px;">
          <i>Gestiona quién puede agregarte a su lista de amiguitos y contactarte.</i>
        </p>
        <hr>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; background: #f8f9fa; padding: 10px; border-radius: 6px; border: 1px solid #e9ecef;">
          <div>
            <strong>👤 rompeviejas747</strong><br>
            <span style="font-size: 11px; color: #666;">Amigos en común: 2 (Batistuta, tukito)</span>
          </div>
          <div style="display: flex; gap: 6px;">
            <button onclick="alert('¡Solicitud de amistad aceptada!'); document.getElementById('modal-container').classList.add('hidden');" style="background: #2b8a3e; padding: 4px 10px; font-size: 12px;">Aceptar</button>
            <button onclick="alert('Solicitud rechazada'); document.getElementById('modal-container').classList.add('hidden');" style="background: #e74c3c; padding: 4px 10px; font-size: 12px;">Rechazar</button>
          </div>
        </div>
      `);
    });
  });

  // C) SECCIÓN LISTA DE AMIGUITOS
  // Propósito: Mostrar en ventana modal la red completa de contactos
  const btnsAmiguitos = document.querySelectorAll('.btn-amiguitos');
  btnsAmiguitos.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      abrirModal('🫂 Lista Completa de Amiguitos', `
        <p style="font-size: 13px; color: #555; margin-bottom: 10px;">
          <i>Tu círculo de amigos para chatear y competir en juegos.</i>
        </p>
        <hr>
        <div class="grid-amigos" style="margin-top: 10px;">
          <div class="amigo-item">
            <div class="amigo-pic" style="background-image: url('img/fede p.jpeg')"></div>
            <div class="amigo-nombre">fede p</div>
            <span class="status-online" style="font-size: 10px;">Online</span>
          </div>
          <div class="amigo-item">
            <div class="amigo-pic" style="background-image: url('https://i.pravatar.cc/60?u=2')"></div>
            <div class="amigo-nombre">el niño torres</div>
            <span class="status-online" style="font-size: 10px;">Online</span>
          </div>
          <div class="amigo-item">
            <div class="amigo-pic" style="background-image: url('https://i.pravatar.cc/60?u=3')"></div>
            <div class="amigo-nombre">rompeviejas747</div>
            <span class="status-offline" style="font-size: 10px;">Offline</span>
          </div>
          <div class="amigo-item">
            <div class="amigo-pic" style="background-image: url('https://i.pravatar.cc/60?u=4')"></div>
            <div class="amigo-nombre">tukito</div>
            <span class="status-online" style="font-size: 10px;">Online</span>
          </div>
          <div class="amigo-item">
            <div class="amigo-pic" style="background-image: url('https://i.pravatar.cc/60?u=5')"></div>
            <div class="amigo-nombre">Batistuta</div>
            <span class="status-offline" style="font-size: 10px;">Offline</span>
          </div>
          <div class="amigo-item">
            <div class="amigo-pic" style="background-image: url('https://i.pravatar.cc/60?u=6')"></div>
            <div class="amigo-nombre">Serafio</div>
            <span class="status-offline" style="font-size: 10px;">Offline</span>
          </div>
        </div>
      `);
    });
  });

  // D) SECCIÓN ENVIAR MENSAJE PRIVADO
  // Propósito: Permitir redactar y simular el envío de mensajes a otros usuarios
  const btnsMensajes = document.querySelectorAll('.btn-mensajes');
  btnsMensajes.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      abrirModal('✉️ Redactar Mensaje Privado', `
        <p style="font-size: 13px; color: #555; margin-bottom: 10px;">
          <i>Envía un mensaje instantáneo a tus contactos o al dueño del perfil.</i>
        </p>
        <hr>
        <form id="form-modal-mensaje" onsubmit="event.preventDefault(); alert('¡Mensaje enviado con éxito!'); document.getElementById('modal-container').classList.add('hidden');">
          <label style="font-size: 12px; font-weight: bold; display: block; margin-bottom: 4px;">Destinatario:</label>
          <input type="text" placeholder="Nombre de usuario..." value="ulisesl+kpo" style="width: 100%; margin-bottom: 10px; box-sizing: border-box;">

          <label style="font-size: 12px; font-weight: bold; display: block; margin-bottom: 4px;">Mensaje:</label>
          <textarea placeholder="Escribe tu mensaje aquí..." required style="width: 100%; height: 90px; margin-bottom: 12px; box-sizing: border-box;"></textarea>

          <div style="text-align: right;">
            <button type="submit" style="background: #4267b2; padding: 6px 14px;">Enviar Mensaje</button>
          </div>
        </form>
      `);
    });
  });

  /* ==========================================================================
     2. PERSONALIZACIÓN DEL TEMA / FONDO DE PANTALLA (FileReader)
     Propósito: Permitir al usuario seleccionar una foto de su computadora y
     establecerla instantáneamente como fondo de la página.
     ========================================================================== */

  const btnPersonalizar = document.getElementById('btn-personalizar');
  const bgUpload = document.getElementById('bg-upload');

  if (btnPersonalizar && bgUpload) {
    // Al hacer clic en el botón de personalizar, simulamos el clic en el input de tipo file oculto
    btnPersonalizar.addEventListener('click', () => {
      bgUpload.click();
    });

    // Al seleccionar un archivo de imagen
    bgUpload.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        // Cuando termine de leer el archivo en Base64
        reader.onload = (event) => {
          document.body.style.backgroundImage = `url('${event.target.result}')`;
          document.body.classList.add('custom-bg');
          alert('¡Fondo de pantalla personalizado aplicado con éxito!');
        };
        reader.readAsDataURL(file);
      }
    });
  }
});
