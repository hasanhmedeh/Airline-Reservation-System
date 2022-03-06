<nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid">
  <a class="navbar-brand" href="AirlineCompany.php"><i class="fas fa-plane"></i><?php if(isset($pageName) && $pageName == "admin_page") echo "  Admin Panel"; else echo "Airline Company"; ?></a>   
  <?php 
    if($pageName != "admin_page"){
  ?>
    <button class="viewCreditCard" onclick="$('.creditCard').toggle(); $('.blackBackground').toggle();">VIRTUAL CREDIT CARD</button>
  <?php } ?>
  
</nav>