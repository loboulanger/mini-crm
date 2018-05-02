@extends ('layouts.master')

@section ('content')
<div class="container-fluid">
    <div class="row">

      @include('layouts.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <h2>Liste des entreprises</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Url</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($firms as $firm)
                <tr>
                  <td>{{ $firm->id }}</td>
                  <td>{{ $firm->name }}</td>
                  <td>{{ $firm->email }}</td>
                  <td>{{ $firm->logo }}</td>
                  <td>{{ $firm->url }}</td>
                  <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
                          Supprimer
                      </button>
                  </td>
                </tr>

              @endforeach

            </tbody>
          </table>
        </div>

        {{ $firms->links() }}

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Supprimer une entreprise</h5>
              </div>
              <div class="modal-body">
                Êtes-vous certain de vouloir supprimer '{{ $firm->name }}' ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Retour</button>
                <button type="button" id="deleteFirm" class="btn btn-danger btn-sm" data-id="{{ $firm->id }}" data-token="{{ csrf_token() }}" data-dismiss="modal">Supprimer</button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  @endsection
