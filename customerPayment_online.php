<!DOCTYPE html>
<html>
<head>
<title>Payment Online</title>
<!-- Including CSS files -->
<link rel="stylesheet" href="css/customerOnlinePayment.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
  /* Styling specific to this page */
  body {
       background-image: url('images/paymentbackground.jpeg');
   }
</style>
</head>
<body>
<a href="customerPayments.php"><i class="fa-solid fa-circle-left icon"></i></a>
<div class="pay">
  <!-- Payment details form -->
  <h2>Payment Details</h2>
  <form>
    <label>Card Type</label><br>
    <!-- Radio buttons for card type selection -->
    <div class="card-type">
      <input type="radio" id="visa" name="card-type" value="visa">
      <img src="images/visacard.jpeg" alt="Visa Logo">
      <label for="visa">Visa</label>
     
      <input type="radio" id="mastercard" name="card-type" value="mastercard">
      <img src="images/mastercard.jpeg" alt="Mastercard Logo">
      <label for="mastercard">Mastercard</label>
    </div><br>
    <!-- Input field for card number -->
    <label>Card Number</label>
    <input type="text" id="card-number" name="card-number" maxlength="19" placeholder="0000 0000 0000 0000" required>
    <div style="display: flex; margin-bottom: 10px;">
      <div style="flex: 1; margin-right: 10px;">
        <br>
        <!-- Select dropdown for expiration month -->
        <label>Expiration Month</label>
        <select id="exp-month" name="exp-month" required>
          <option value="">Month</option>
          <!-- Options for month selection -->
        </select>
      </div>
      <div style="flex: 1;"><br>
        <!-- Select dropdown for expiration year -->
        <label>Expiration Year</label>
        <select id="exp-year" name="exp-year" required>
          <option value="">Year</option>
          <!-- Options for year selection -->
        </select>
      </div>
    </div>
    <br>
    <!-- Input field for CVV -->
    <label>CVV</label>
    <div style="display: flex;">
      <input type="text" id="cvn" name="cvn" maxlength="3" required>
      <img src="images/cv.jpeg" alt="CVN Image" style="width: 50px; margin-left: 10px;">
    </div><br>
    <!-- Buttons for payment submission and cancellation -->
    <div class="buttons">
      <button type="button" class="btn btn-cancel">Cancel</button>
      <button type="submit" class="btn btn-pay">Pay</button>
    </div>
  </form>
</div>
<!-- Script to format card number input and CVV input -->
<script>
    // Event listener for card number input
    document.getElementById('card-number').addEventListener('input', function (e) {
      // Remove non-numeric characters
      var input = e.target.value.replace(/\D/g, '');
      // Format input into groups of 4
      var formattedInput = '';
      for (var i = 0; i < input.length; i++) {
        if (i > 0 && i % 4 === 0) {
          formattedInput += ' ';
        }
        formattedInput += input[i];
      }
      // Update input value
      e.target.value = formattedInput.substring(0, 19); // Limit to 16 digits
    });

    // Event listener for CVV input
    document.getElementById('cvn').addEventListener('input', function(event) {
    this.value = this.value.replace(/\D/g, ''); // Remove non-numeric characters
  });
</script>
</body>
</html>
