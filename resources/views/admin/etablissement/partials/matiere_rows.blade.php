@foreach ($nosmatieres as $matiere)
<tr>
    <td data-label="Identifiant">{{ $matiere->code }}</td>
    <td data-label="Nom">{{ $matiere->nommatiere }}</td>
    <td data-label="NiveauCoefficient">{{ $matiere->codeniveau }}[{{ $matiere->coefficient }}]</td>
    <td data-label="filiere">{{ $matiere->nomfiliere }}</td>
    <td data-label="credit">{{ $matiere->credit }}</td>
    <td data-label="volume">{{ $matiere->volumehoraire }} h</td>
    <td data-label="Action" class="action-icons no-print">
        <!-- Bouton Toggle -->
        <button type="button" class="btn-toggle" data-id="{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}">
            <input type="checkbox"
                   id="toggle-{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                   class="toggle-checkbox" {{ $matiere->active ? 'checked' : '' }}>
            <label for="toggle-{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}" class="toggle-label"></label>
        </button>

        <!-- Bouton Éditer -->
        <button class="btn btn-sm edit-btn" data-bs-toggle="modal"
                data-bs-target="#editMatiere{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                data-id="{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                data-code="{{ $matiere->code }}"
                data-coefficient="{{ $matiere->coefficient }}"
                data-credit="{{ $matiere->credit }}"
                data-nomfiliere="{{ $matiere->nomfiliere }}"
                data-volumehoraire="{{ $matiere->volumehoraire }}"
                data-label="{{ $matiere->nommatiere }}"
                {{ !$matiere->active ? 'disabled' : '' }}>
            <i class="fas fa-pen"></i>
        </button>

        <!-- Bouton Supprimer -->
        <button class="btn btn-sm delete-btn" data-bs-toggle="modal"
                data-bs-target="#deletematiere{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                {{ !$matiere->active ? 'disabled' : '' }}>
            <i class="fas fa-trash"></i>
        </button>
    </td>
</tr>


<!-- Modal de Modification -->
                            <div class="modal fade"
                                id="editMatiere{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                tabindex="-1" aria-labelledby="editMatiereLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <button type="button" class="custom-close-btn" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i> </button>
                                        <!-- <h1 class="text-center">Modifier</h1> -->
                                        <form
                                            action="{{ route('updateadmin.matiere', $matiere->etablissement_matiere_id ?? $matiere->matiere_id) }}"
                                            method="POST" class="needs-validation">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <!-- Sélection des matières -->
                                                    <div class="col-sm-6">
                                                        <select class="select2-multiple form-control"
                                                            id="matiereSelect" name="matiere_id" style="width: 100%"
                                                            disabled>
                                                            @foreach ($lesmatieres as $matiereOption)
                                                                <option value="{{ $matiereOption->id }}"
                                                                    {{ $matiereOption->id == $matiere->matiere_id ? 'selected' : '' }}>
                                                                    {{ $matiereOption->nommatiere }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="matiere_id"
                                                            value="{{ $matiere->matiere_id }}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <input type="number" name="volumehoraire"
                                                            class="form-control" id="editLastName"
                                                            placeholder="Volume horaire"
                                                            value="{{ $matiere->volumehoraire }}" required>
                                                        <div class="invalid-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12" style="margin-bottom: 15px;">
                                                        <select name="etablissement_filiere_id"
                                                            id="etablissement_filiere_id" class="form-control"
                                                            required>
                                                            <option value="">Sélectionnez une filière</option>
                                                            @foreach ($listefilieres as $filiere)
                                                                <option value="{{ $filiere->filiere_id }}"
                                                                    {{ $filiere->id == $matiere->filiere_id ? 'selected' : '' }}>
                                                                    {{ $filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 aplus">
                                                        <div class="form-control"
                                                            style="display: flex; align-items: center;">
                                                            <!-- Button to decrease value -->
                                                            <button class="btn circular-btn"
                                                                style=" background-color: #9a95de !important;border: none !important; color:white;width: 30px; height: 30px;border-radius: 50%;display: flex; align-items: center;justify-content: center;"
                                                                type="button" id="decrease-btn">-</button>

                                                            <select
                                                                class="sort-by btn custom-btn-color rounded-start-pill ticketBtn vvip py-2"
                                                                id="niveau_id" name="niveau_id" required
                                                                style="height: 35px; border-right: none;">
                                                                <option selected disabled>Niveau</option>
                                                                @foreach ($niveaux as $niveau)
                                                                    <option value="{{ $niveau->id }}"
                                                                        {{ $niveau->id == $matiere->niveau_id ? 'selected' : '' }}>
                                                                        {{ $niveau->code }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <input type="number" placeholder="coef"
                                                                class="sort-by custom-btn-color rounded-end-pill ticketBtn vvip py-2"
                                                                id="coefficient" name="coefficient"
                                                                value="{{ $matiere->coefficient }}" min="1"
                                                                style="width: 62px; height: 35px; border-left: none; -webkit-appearance: none; -moz-appearance: textfield; text-align:center;"
                                                                required>
                                                            <!-- Button to increase value -->
                                                            <button class="btn circular-btn"
                                                                style=" background-color: #9a95de !important;border: none !important; color:white;width: 30px; height: 30px;border-radius: 50%;display: flex; align-items: center;justify-content: center;"
                                                                type="button" id="increase-btn">+</button>
                                                        </div>
                                                    </div>




                                                    <div class="col-sm-6">
                                                        <input type="number" name="credit" class="form-control"
                                                            id="editLastName"
                                                            placeholder="Crédits ECTS / autre système de crédit"
                                                            value="{{ $matiere->credit }}" required>
                                                        <div class="invalid-feedback">
                                                        </div>
                                                    </div>


                                                </div>
                                                <br>
                                                <div class="d-flex justify-content-between margin">
                                                    <button type="submit"
                                                        class="btn btn-success">Sauvegarder</button>
                                                    <button type="button" class="btn btn-secondaire"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                            <!-- Modal de Suppression -->
                            <div class="modal fade"
                                id="deletematiere{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                tabindex="-1" aria-labelledby="deletematiereLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-center">
                                        <button type="button" class="custom-close-btn" data-bs-dismiss="modal"
                                            aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        <div class="modal-body text-center d-flex flex-column" id="">
                                            <i class="fa-solid fa-triangle-exclamation"
                                                id="fa-triangle-exclamation"></i>
                                            <span>Êtes vous sûres ?</span>
                                        </div>
                                        <p>supprimer la matière <span
                                                id="nom_affiche">{{ $matiere->nommatiere }}</span>?</p>
                                        <div class="d-flex justify-content-between margin-bryan">
                                            <form
                                                action="{{ route('destroyadmin.matiere', $matiere->etablissement_matiere_id ?? $matiere->matiere_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success">Supprimer</button>
                                            </form>
                                            <button type="button" style="border-radius: 0%"
                                                class="btn btn-secondaire" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endforeach
