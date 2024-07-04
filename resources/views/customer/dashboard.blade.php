<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
<h3>Welcome to {{Auth::guard('customer')->user()->name}}</h3>
<form action="{{route('customer.logout')}}" method="POST">
	@csrf
	<button type="submit">Logout</button>
</form>
</body>
</html>