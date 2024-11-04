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
@endforeach
