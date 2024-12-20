@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Active Subscription Plan')
@section('content')

<div class="container my-5">
    <h2 class="d-flex justify-content-center align-items-center" style="height: 10vh;">Active Subscription Plan</h2>

    <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
        <!-- Subscription Details Section -->
        <div class="border p-4" style="width: 50%; border-radius: 8px;">
            <h3 class="mb-3 text-center">Your Active Plan</h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Plan Name:</th>
                        <td>Free Plan</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <th>Next Billing Date:</th>
                        <td>TBD</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">You are not subscribed to any plan.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
