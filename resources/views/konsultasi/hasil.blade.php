@extends('layouts.app')

@section('content')

<h3>Hasil Diagnosa</h3>

@foreach($hasil as $item)

<div class="card mb-3">

    <div class="card-body">

        <h4>

            {{ $item['diagnosa'] }}

        </h4>

        <p>

            Tingkat Keyakinan :

            <strong>

                {{ $item['cf'] }}%

            </strong>

        </p>

        <hr>

        <h5>Solusi</h5>

        <p>

            {{ $item['solusi'] }}

        </p>

    </div>

</div>

@endforeach

@endsection