<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Contact Us Email</h2>

<table>
  <tr>
    <th>Name</th>
    <th>{{ ($first_name??"").($last_name??"") }}</th>
  </tr>
  <tr>
    <th>Email</th>
    <th>{{ ($email??"") }}</th>
  </tr>
  
  <tr>
    <th>Phone Number</th>
    <th>{{ ($phone_number??"") }}</th>
  </tr>
  
  <tr>
    <th>Message</th>
    <th>{{ ($message??"") }}</th>
  </tr>
</table>

</body>
</html>

