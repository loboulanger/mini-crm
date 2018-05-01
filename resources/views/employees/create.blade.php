@extends ('layouts.master')

@section ('content')
<div class="container-fluid">
    <div class="row">

      @include('layouts.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <h2>Ajouter un employé</h2>
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="/employees">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="firstname">Prénom</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Nom</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
                    </div>

                    <div class="form-group">
                        <label for="firm_id">Entreprise</label>
                        <select class="form-control" id="firm_id" name="firm_id">
                          <option value="0">Choisir...</option>
                          @foreach ($firms as $firm)
                          <option value="{{ $firm->id }}">{{ $firm->name }} </option>
                          @endforeach
                        </select>
                        <small id="email" class="form-text text-muted">Si l'entreprise de l'employé n'est pas dans la liste, vous devrez d'abord <a href="https://mini-crm.test/firms/create">ajouter l'entreprise</a> correspondante</small>
                      </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        <small id="email" class="form-text text-muted">Optionnel</small>
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        <small id="email" class="form-text text-muted">Optionnel</small>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Ajouter</button>
                    </div>

                    @include ('layouts.errors')

                  </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  @endsection
