Demande nouveau formateur <br><br>
Nom: {{$firstname}} {{$lastname}}
Email: {{$email}}

<form method="post" action="{{route('isNewUser', $user)}}">
    @csrf
    <div>
            <div class="form-check form-check-inline">
                <input type="checkbox"
                       class="form-check-input"
                       name="{{$user->admin_verified_user}}"
                       value=true
                >
                <label class="form-check-inline">Ajouter</label>
            </div>
        <div class="form-check form-check-inline">
            <input type="checkbox"
                   class="form-check-input"
                   name="{{$user->admin_verified_user}}"
                   value=false
            >
            <label class="form-check-inline">Ne pas ajouter</label>
        </div>
    </div>

    <button type="submit" class="mt-3 btn btn-primary">Valider</button>

    <strong>Non fonctionelle</strong>
</form>

