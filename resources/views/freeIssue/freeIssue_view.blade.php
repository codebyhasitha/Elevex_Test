@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow p-4 w-100" style="max-width: 1200px;">
        <h2 class="text-center mb-4">VIEW FREE ISSUES</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 20%;">Free Issue Label</th>
                        <th scope="col" style="width: 20%;">Free Issue Type</th>
                        <th scope="col" style="width: 20%;">Purchase Product</th>
                        <th scope="col" style="width: 20%;">Free Product</th>
                        <th scope="col" style="width: 10%;">Purchase Quantity</th>
                        <th scope="col" style="width: 10%;">Free Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($freeIssues as $freeIssue)
                    <tr>
                        <td>{{ $freeIssue->freeissue_name ?? '-' }}</td>
                        <td>{{ $freeIssue->freeissue_type ?? '-' }}</td>
                        <td>{{ $freeIssue->purchase_product_name ?? '-' }}</td>
                        <td>{{ $freeIssue->free_product ?? '-' }}</td>
                        <td>{{ $freeIssue->purchase_Quantity ?? '-' }}</td>
                        <td>{{ $freeIssue->Free_Quantity ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
