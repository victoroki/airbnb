<?php
include("header.php");

?>

<br>



<form method="post" enctype="multipart/form-data" action="index.php">
<div style="display:hidden;" class="container alert alert-dark">
  <table class="" style="margin-left: ">
    <tr>
      <th>Rooms</th>
      <th>Price</th>
      <th>City</th>
      <th>Area</th>
    </tr>
    <tr>
      <td><input type="number" name="s_Rooms" class="form-control"></td>
      <td><input type="number" name="s_Price" class="form-control" placeholder="Max Price"></td>
      <td><input type="text" name="s_City" class="form-control"></td>
      <td><input type="text" name="s_Area" class="form-control" placeholder="10 Marla"></td>
      <td><input type="submit" name="search" value="Search" class="btn btn-success"></td>
    </tr>
  </table>
</div>
</form>
<h2 style="text-align: center;font-size: 48px"><span class="badge badge-danger">About US</span></h2>
<div align="center">
<div class="container">
  <br>
  <br>
<p style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);padding: 5px;background-color: white;font-size: 24px;font-weight: 600">
MOREL Corp BNB.
	This application will be offering to the customers to rent a house/apartment in any city they want. It’s often seen that the people need to move in different cities due to their jobs, meetings or family gatherings. These house or apartments can be ready to shift (furnished).<br>

A person can rent a house / apartment in any city. There will be many options available with respect to room capacity, city, area and rent. The user can filter the search results on the basis of the capacity, city, area and rent.
<br>

The customer would be able to give reviews of the facility they had.
If an apartment/house is already in use, it should not be displayed in the available items.

</p>

</div>
</div>






</body>
</html>