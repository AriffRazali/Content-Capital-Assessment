<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List</h2>  
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Working Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $user)
            <tr>
              <td>{{ $user["name"] }}</td>
              
              <td>{{\Carbon\Carbon::parse($user['date_of_birth'])->setTimezone('Asia/Kuala_Lumpur')->diff(\Carbon\Carbon::now('Asia/Kuala_Lumpur'))->format('%y Years')}}</td>
              <td>{{ $user['address'] }}</td>
              @if ($user['working_status'])              
                <td>{{ 'Yes' }}</td>
              @else
                <td>{{ 'No' }}</td>
              @endif
              <td><a href={{route('list.id.csv',[$user['id']])}} target="_blank"><span class="btn btn-success btn-sm">Export CSV</span></a></td>
            </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
