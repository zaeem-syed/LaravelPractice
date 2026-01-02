<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<form method="POST" action="/pay">
  @csrf
  <label for="" style="margin-top: 10px;">Amount</label>
  <input type="number" name="amount" placeholder="Enter amount" required style="margin-top: 10px; margin-left:20px;" />

  <select name="method" required>
    <option value="">Select Payment Method</option>
    <option value="stripe">Stripe</option>
    <option value="jazz">JazzCash</option>
    <option value="bank">Bank Transfer</option>
  </select>

  <button type="submit">Pay Now</button>
</form>
    
</body>
</html>