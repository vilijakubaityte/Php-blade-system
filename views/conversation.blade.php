@extends("layouts.main")
@section("content")

    <div class="card">
        <div class="card-header h3 my-2">Įmonės pavadinimas: {{$company->getName()}}</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Pokalbių istorija</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection