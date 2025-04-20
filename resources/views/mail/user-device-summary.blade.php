<h2>Hello {{ $user->name }},</h2>
<p>Here's your Apple device collection:</p>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Model</th>
            <th>Description</th>
            <th>Release Date</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->devices as $device)
            <tr>
                <td>{{ $device->details->model_name }}</td>
                <td>{{ $device->details->description }}</td>
                <td>{{ $device->details->release_date }}</td>
                <td>${{ number_format($device->details->release_price, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>Thanks for using The Apple Basket!</p>
