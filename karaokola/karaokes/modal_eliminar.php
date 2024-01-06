<div class="modal fade" id="modal_eliminar_karaokes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <h2 class="text-center text-muted">Elegir</h2>
      <p class="lead text-muted text-center" style="display: block;margin:10px"> <output id="interprete_karaokes"></output>:
        <output id="titulo_karaokes"></output>
      </p>


      <input type="text" id="tuNombre" name="tuNombre" placeholder="Escribe tu nombre" minlength="2" autocomplete="true">

      <input type="hidden" id="idCancion_k">
      <input type="hidden" id="descripcion_karaoke">
      <input type="hidden" id="ruta_karaoke">
      <div class="modal-footer">
        <button type="submit" class="btn btn-lg btn-primary" data-dismiss="modal" onclick="enviar_karaoke($('#idCancion_k').val(),$('#tuNombre').val(),$('#descripcion_karaoke').val(),$('#ruta_karaoke').val())">Aceptar</button>
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>