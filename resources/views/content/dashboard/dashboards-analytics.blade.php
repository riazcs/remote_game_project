@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
  Game {{ session('addedCount') }} added successfully!.
</div>
@endif
<div class="row">
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Add Games</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <form method="post" action="{{ route('contents.store') }}" id="bulkAddForm">
          @csrf
          <div id="gameFieldsContainer">
            <div class="row game-fields">
              <!-- <div class="col-md-3">
                <div class="input-group">
                  <span class="input-group-text">Titles</span>
                  <input type="text" aria-label="Title" class="form-control" name="titles[]" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="input-group">
                  <span class="input-group-text">Links</span>
                  <input type="link" aria-label="Link" class="form-control" name="links[]" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="input-group">
                  <span class="input-group-text">Image Link</span>
                  <input type="link" aria-label="Link" class="form-control" name="image_pathes[]" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <textarea id="basic-default-message" name="descriptions[]" class="form-control" placeholder="Description Here" required></textarea>
                </div>
              </div> -->
              <div class="col-md-12">
                <div class="mb-3">
                  <textarea id="basic-default-message" name="list" class="form-control" placeholder="title | link|image | description" rows="8" required></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <!-- <button type="button" class="btn btn-success" id="addMoreFields">Add More</button> -->
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Keep track of the number of added fields
    let fieldIndex = 1;

    // Add more fields when the "Add More" button is clicked
    document.getElementById('addMoreFields').addEventListener('click', function() {
      fieldIndex++;

      // Clone the original fields and update the input names
      const originalFields = document.querySelector('.game-fields');
      const clonedFields = originalFields.cloneNode(true);
      clonedFields.querySelectorAll('[name^="titles"]').forEach(function(input) {
        input.name = 'titles[' + fieldIndex + ']';
      });
      clonedFields.querySelectorAll('[name^="links"]').forEach(function(input) {
        input.name = 'links[' + fieldIndex + ']';
      });
      clonedFields.querySelectorAll('[name^="image_pathes"]').forEach(function(input) {
        input.name = 'image_pathes[' + fieldIndex + ']';
      });
      clonedFields.querySelectorAll('[name^="descriptions"]').forEach(function(input) {
        input.name = 'descriptions[' + fieldIndex + ']';
      });
      // Update other field names similarly

      // Append the cloned fields to the container
      document.getElementById('gameFieldsContainer').appendChild(clonedFields);
    });
  });
</script>


@endsection