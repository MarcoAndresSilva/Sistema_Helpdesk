
<!-- Modal -->
<div id="modalmantenimiento" class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
			<h4 id="mdlTitle">Mantenedor de usuarios</h4>

      <form method="post" id="usuario_form">
        <div class="modal-body">
            <input type="hidden" id="user_id" name="user_id">
            <fieldset class="form-group">
              <label class="form-label semibold" for="user_name">Nombre</label>
              <input type="text" class="form-control" id="user_name" placeholder="Nombre" required>
            </fieldset>
            <fieldset class="form-group">
              <label class="form-label semibold" for="user_lastname">Apellido</label>
              <input type="text" class="form-control" id="user_lastname" placeholder="Apellido" required>
            </fieldset>
            <fieldset class="form-group">
              <label class="form-label" for="user_mail">Email</label>
              <input type="email" class="form-control" id="user_mail" placeholder="ingrese email" required>
            </fieldset>
            <fieldset class="form-group">
              <label class="form-label" for="rol_id">Rol</label>
              <select class="bootstrap-select" id="rol_id">
                    <option value="1">Usuario</option>
                    <option value="2">Soporte</optiond=>
              </select>
            </fieldset>
            <fieldset class="form-group">
              <label class="form-label" for="user_mail">Contraseña</label>
              <input type="text" class="form-control" id="user_pass" placeholder="*************" required>
            </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="action" id="#" value="add"  class="btn btn-primary">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>
