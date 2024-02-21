@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a user</h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('user_utilisateurs.store') }}">
                @csrf
                <div class="form-group">
                    <label for="Nom">Nom:</label>
                    <input type="text" class="form-control" name="Nom"/>
                </div>

                <div class="form-group">
                    <label for="Prenom">Prenom:</label>
                    <input type="text" class="form-control" name="Prenom"/>
                </div>

                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" class="form-control" name="Email"/>
                </div>
                <div class="form-group">
                    <label for="Telephone">Telephone:</label>
                    <input type="text" class="form-control" name="Telephone"/>
                </div>
                <div class="form-group">
                    <label for="Role">Role:</label>
                    <select class="form-control" name="Role">
                        <option value="Exposant">Exposant</option>
                        <option value="Visiteur">Visiteur</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="MotDePasse">MotDePasse:</label>
                    <input type="password" class="form-control" name="MotDePasse"/>
                </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-primary-outline">Add user</button>
            </form>
        </div>
    </div>
</div>
@endsection
