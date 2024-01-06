import { appendItem, playVideo, getListKaraokola, refreshList, initVideoActual , nextVideo} from './model.karaokola.js';
export function listenerKaraokola(io, socket) {
  
  socket.on('getkaraokola', async (msg) => {
    console.log('[KARAOKOLA LISTA]');
    const canciones = await getListKaraokola();
    io.emit('refreshkaraokola', canciones);
  })

  socket.on('cargarActual', async (msg) => {
    console.log('[CARGAR VIDEO ACTUAL]');
    let resmsg = await initVideoActual();
    io.emit('initVideo', resmsg);
  })
  
  /**
   * Los mensajes llegan de la forma
   * { id, tipo, descripcion, usuario, ruta } (JSON)
   * id: identificador de cancion 
   * tipo: karaoke o musica 
  */
  socket.on('addkaraokola', async (msg) => {
    console.log('[Nuevo]: ', msg)
    await appendItem(msg);
    const canciones = await getListKaraokola();
    io.emit('refreshkaraokola', canciones);
  });

  /**
   * JSON [{id,tipo,detalle},{...},...]
   */
  socket.on('refreshkaraokola', async (msg) => {
    console.log('[NUEVO ORDEN]')
    await refreshList(msg);
    io.emit('refreshkaraokola', msg);
  });

  /**
   * Envia un JSON con todos los elementos restantes
   * JSON [{id,tipo,detalle}, {...},... ]
   */
  socket.on('deletekaraokola', async (msg) => {
    console.log('[Eliminar cancion]')
    await refreshList(msg);
    io.emit('refreshkaraokola', msg);
  });

  socket.on('playVideo', async (msg) => {
    const resMsg = await playVideo();
    console.log('[Play video]', resMsg)
    io.emit('playVideo', resMsg);
    io.emit('currentVideo', resMsg)
    const canciones = await getListKaraokola();
    io.emit('refreshkaraokola', canciones);
  });

  socket.on('reloadVideo', async (msg) => {
    console.log('[Reload]')
    io.emit('reloadVideo', msg);
  });

  socket.on('nextVideo', async (msg) => {
    console.log('[Next video]')
    const resmsg = await nextVideo();
    io.emit('currentVideo', resmsg);
    const canciones = await getListKaraokola();
    io.emit('refreshkaraokola', canciones);
    io.emit('playVideo', resmsg);
  })


}