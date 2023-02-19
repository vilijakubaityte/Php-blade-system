
@extends("layouts.main")
@section("content")

<div class="card">
    <div class="card-header h5 my-2">Klientai: {{$company->getName()}}</div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Telefono nr.</th>
                <th>Elektroninis paštas</th>
                <th>Adresas</th>
                <th>Pozicija</th>
                <th>Veiksmai</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($company->getCustomer() as $customer)
            <tr>
                <td>{{$customer->getName()}}</td>
                <td>{{$customer->getSurname()}}</td>
                <td>{{$customer->getPhone()}}</td>
                <td>{{$customer->getEmail()}}</td>
                <td>{{$customer->getAddress()}}</td>
                <td>{{$customer->getPosition()}}</td>
                <td>
                    <a class="btn btn-secondary" href="conversation.php?id={{$company->getId()}}">Daugiau</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection