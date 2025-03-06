<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow p-4 w-100" style="max-width: 1200px;">
        <h2 class="text-center mb-4">VIEW USERS</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 15%;">Name</th>
                        <th scope="col" style="width: 20%;">Email</th>
                        <th scope="col" style="width: 15%;">NIC</th>
                        <th scope="col" style="width: 20%;">Address</th>
                        <th scope="col" style="width: 12%;">Mobile</th>
                        <th scope="col" style="width: 10%;">Gender</th>
                        <th scope="col" style="width: 10%;">Zone</th>
                        <th scope="col" style="width: 15%;">Region</th>
                        <th scope="col" style="width: 15%;">Territory</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name ?? '-' }}</td>
                        <td>{{ $user->email ?? '-' }}</td>
                        <td>{{ $user->nic ?? '-' }}</td>
                        <td>{{ $user->address ?? '-' }}</td>
                        <td>{{ $user->mobile ?? '-' }}</td>
                        <td>{{ $user->gender ?? '-' }}</td>
                        <td>{{ $user->territory[0]->region[0]->zone[0]->longdescription ?? '-' }}</td>
                        <td>{{ $user->territory[0]->region[0]->region_name ?? '-' }}</td>
                        <td>{{ $user->territory[0]->territory_name ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
