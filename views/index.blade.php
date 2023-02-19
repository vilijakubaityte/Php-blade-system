@extends("layouts.main")
@section("content")

            <div class="card">
                <div class="card-header h5 my-2">Klientų valdymo sistema</div>
                <div class="card-body">
                    <a href="new.php" class="btn btn-secondary float-end">Pridėti naują įmonę</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Adresas</th>
                            <th>Vat kodas</th>
                            <th>Įmonės pavadinimas</th>
                            <th>Telefonas</th>
                            <th>Elektroninis paštas</th>
                            <th>Klientai</th>
                            <th>Veiksmai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( \models\Company::all() as $company)
                        <tr>
                            <td>{{$company->getName()}}</td>
                            <td>{{$company->getAddress()}}</td>
                            <td>{{$company->getVatCode()}}</td>
                            <td>{{$company->getCompanyName()}}</td>
                            <td>{{$company->getPhone()}}</td>
                            <td>{{$company->getEmail()}}</td>
                            <td>
                                <a class="btn btn-secondary" href="customer.php?id={{$company->getId()}}">Klientai</a>
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="update.php?id={{$company->getId()}}">Redaguoti</a>
                                <a class="btn btn-danger" href="index.php?delete={{$company->getId()}}">Trinti</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

@endsection

