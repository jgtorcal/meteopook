@extends('layout.index')
@section('content')


<div class="col">
    <div class="card">
        <div class="card-header">Lloros1</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th>Llorica</th>
                            <th>Lloro</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($lloros as $lloro)
                            <tr data-entry-id="{{ $lloro->id }}">
                                <td>

                                    @switch($lloro->from_username)
                                        @case('JordiWP')
                                            John
                                            @break

                                        @case('Tetsunider')
                                            Tetsu
                                            @break

                                        @case('Sholvat')
                                            MM
                                            @break
                                        @case('Tremalleta')
                                            B_R_T
                                            @break
                                        
                                        @case('infraimovic')
                                            Tetsu
                                            @break

                                        @default
                                            Indefinido
                                    @endswitch
                                
                                </td>
                                <td>{{ $lloro->text ?? '' }}</td>
                                <td>{{ $lloro->updated_at ?? '' }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
@parent
@endsection