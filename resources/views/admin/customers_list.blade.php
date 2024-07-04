<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Customer List</title>
</head>
<body>

	<div class="container mt-5">
		<h3><a href="{{url('dashboard')}}" class="btn btn-secondry">Back</a></h3>
		<h3>Customer List</h3>
<table class="table table-bordered">
	<thead>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>status</th>
		<th>Action</th>
	</thead>
	<tbody>
		@php
		$index = 1;
		@endphp
		@foreach($customer_details as $detail)
		<tr>
		<td>{{$index++}}</td>
		<td>{{$detail->name}}</td>
		<td>{{$detail->email}}</td>
         <td>{{$detail->approved ? 'Approved' : 'Pending'}}</td>
		<td>
    <form action="{{ route('customers.approve', $detail) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-success">Approve</button>
    </form>
    <form action="{{ route('customers.reject', $detail) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Reject</button>
    </form>
     <a href="{{ route('customers.edit', $detail) }}">Edit</a>
</td>

	    </tr>
		@endforeach
	</tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>