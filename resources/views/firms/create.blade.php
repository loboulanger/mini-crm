@extends ('layouts.master')

@section ('content')
<div class="container-fluid">
    <div class="row">

      @include('layouts.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <h2>Ajouter une entreprise</h2>
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="/firms">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="name">Nom</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                      <small id="email" class="form-text text-muted">Optionnel</small>
                    </div>

                    <div class="form-group">
                        <label for="url">Site web</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                        <small id="url" class="form-text text-muted">Optionnel</small>
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <br>
                        <input name="logo" type="file">
                        <small id="logo" class="form-text text-muted">Optionnel</small>
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
