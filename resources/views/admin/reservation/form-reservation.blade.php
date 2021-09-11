<div class="modal fade" id="modal-reservation-{{$action}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ $title }} Reservation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <form action="" id="form-reservation-{{$action}}" class="body-cont">
                @csrf 
                @if($action == 'update')
                    @method('PATCH')
                    <input type="hidden" name="id" id="id">
                @endif
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="client_id">Cliente</label>
                      <select id="client_id" name="client_id" class="form-control" aria-describedby="inputGroupPrepend" required>
                          <option value="">Selecciona una opción...</option>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="restrestaurant_id_id">Restaurant</label>
                    <select id="restaurant_id" name="restaurant_id" class="form-control selectTable-{{ $action }}" aria-describedby="inputGroupPrepend" required>
                        <option value="">Selecciona una opción...</option>
                    </select>
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="section_id">Sección</label>
                      <select id="section_id" name="section_id" class="form-control selectTable-{{ $action }}" aria-describedby="inputGroupPrepend" required>
                          <option value="">Selecciona una opción...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="table_id">Mesa</label>
                        <select id="table_id" name="table_id" class="form-control" aria-describedby="inputGroupPrepend" required>
                            <option value="">Selecciona un restaurant y sección</option>
                        </select>
                      </div>
                  
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="date">Fecha</label>
                      <input type="date" name="date_reservation" id="date_reservation" class="form-control" min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="hour">Hora</label>
                        <input type="time" name="time" id="time" class="form-control" min="13:00" max="22:30" required>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="factura" id="factura" value="1">
                    <label class="form-check-label" for="factura">Factura</label>
                  </div>
                
            </form>
        @include('partials.spinner')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="form-reservation-{{$action}}" id="submit-form-reservation">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  