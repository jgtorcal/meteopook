@extends('layout.index')
@section('content')


<div class="col">
    <div class="card">
        <div class="card-header">Lloros</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th>from_username</th>
                            <th>text</th>
                            <th>fecha</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($lloros as $lloro)
                            <tr data-entry-id="{{ $lloro->id }}">
                                <td>{{ $lloro->from_username ?? '' }}</td>
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