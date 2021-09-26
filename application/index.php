<?php
require_once 'Controllers/Country.php';

$countryCode = $_GET['countryCode'];
$phoneNumberStatus = $_GET['phoneNumberStatus'];
$country = new Country();
$phoneNumbers = $country->getCustomersPhoneNumbers($countryCode, $phoneNumberStatus);

?>

<html>
<head>
<link rel="stylesheet" href="./assets/homePage.css" />
</head>
<body>

<h1>Phone Numbers</h1>
<div>
    <form action="" method="get">
        <select name="countryCode" id="countries">
            <option value="">Select Country</option>
            <?php
            foreach (Countries as $code => $country) {
            ?>
                <option value="<?php echo $code ?>" <?php echo  $countryCode == $code ? "selected" : ''?>><?php echo $country?></option>
            <?php
            }
            ?>
        </select>

        <select name="phoneNumberStatus" id="status">
            <option value="">Select Phone Status</option>
            <option value="<?php echo VALIDE_STATUS?>" <?php echo  $phoneNumberStatus == VALIDE_STATUS ? "selected" : ''?>>Valide</option>
            <option value="<?php echo NOT_VALIDE_STATUS?>" <?php echo  $phoneNumberStatus == NOT_VALIDE_STATUS ? "selected" : ''?>>Invalide</option>
        </select>
        <button  type="submit" id="filter"> Filter</button>
    </form>

</div>
<table id="customers">
    <tr>
        <th>Country</th>
        <th>Status</th>
        <th>Country Code</th>
        <th>Phone Number</th>
    </tr>
    <?php
    foreach ($phoneNumbers as $phoneNumber) {
      ?>
        <tr>
            <td><?php echo $phoneNumber["Country"]?></td>
            <td><?php echo $phoneNumber["Status"]?></td>
            <td><?php echo $phoneNumber["CountryCode"]?></td>
            <td><?php echo $phoneNumber["phone"]?></td>
        </tr>
    <?php
    }
    ?>
</table>

</body>
</html>


