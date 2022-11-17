<div class="modal fade" id="{{ $editmodal }}" tabindex="-1" aria-hidden="true" wire:ignore.self>

    <div class="modal-dialog   modal-dialog-centered  " role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4>Renvoyer la fiche </h4>
            </div>
            <form action="{{ url('fiches/resendto', $fiche) }}" method="post"
                class="d-inline">
                @csrf
                @method('put')
                <div class="modal-body ">
                    <div class="form-group control-label mb-1 ">
                        <label class="control-label">User <span
                                class="text-danger">*</span></label>
                        <select class="form-select js-select2" name="assignedto" required>
                            <option value="" disabled selected>Select user</option>
                            @foreach ($users as $user)
                                @if ($user->username == $fiche->assignedto)
                                    <option value="{{ $user->username }}" selected>
                                        {{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->username }}">{{ $user->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group control-label mb-1 ">
                        <label class="control-label">Conmmentaire <span
                                class="text-danger">*</span></label>
                        <textarea wire:model="message" id="" cols="5" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-primary fw-bold" type="submit">Envoyer</button>
                    <button type="reset" class="btn btn-outline-danger  fw-bold"
                        data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>