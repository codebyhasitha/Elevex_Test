<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg p-4 w-100" style="max-width: 1200px;">
        <h2 class="text-center mb-4 text-primary fw-bold">Users List</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover text-center align-middle mx-auto">
                <thead class="table-dark text-uppercase">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>NIC</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Zone</th>
                        <th>Region</th>
                        <th>Territory</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    //dd($users);
                    @endphp
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name ?? '-' }}</td>
                        <td>{{ $user->email ?? '-' }}</td>
                        <td>{{ $user->nic ?? '-' }}</td>
                        <td>{{ $user->address ?? '-' }}</td>
                        <td>{{ $user->mobile ?? '-' }}</td>
                        <td>{{ $user->gender ?? '-' }}</td>
                        {{-- <td>{{ optional($user->territory->first()->region->zone)->longdescription ?? '-' }}</td> --}}
                        <td>{{  $user->territory[0]->region->zone[0]->longdescription ?? '-' ?? '-' }}</td>
                        <td>{{ $user->territory[0]->region->region_code ?? '-' }}</td>
                        <td>{{$user->territory[0]->territory_code ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    table {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
        align-self: center;
    }
    th, td {
        padding: 10px !important;
        white-space: nowrap;
    }
    th {
        background: #343a40 !important;
        color: white !important;
    }
</style>
