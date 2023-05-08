// Make sure to include the SweetAlert2 library in your HTML file

var captcha;

function generate() {
  // Clear old input
  document.getElementById("submit").value = "";

  // Access the element to store the generated captcha
  captcha = document.getElementById("image");
  var uniquechar = "";

  const randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  // Generate captcha for length of 5 with random characters
  for (let i = 1; i < 5; i++) {
    uniquechar += randomchar.charAt(Math.floor(Math.random() * randomchar.length));
  }

  // Store the generated input
  captcha.innerHTML = uniquechar;
}

async function handleSubmit(e) {
  const paymentCategory = document.getElementById("payment-category").value;
  const name = document.getElementById("customer-name").value.trim().toLowerCase();
  const amount = document.getElementById("advance-payment").value;
  const remarks = document.getElementById("remarks").value.trim();
  const number = document.getElementById("mobile-number").value;
  const address = document.getElementById("address").value.trim();
  const dob = document.getElementById("dob").value;
  const email = document.getElementById("email").value.trim().toLowerCase();

  let body = {
    name: name,
    mobile: number,
    address: address,
    email: email,
    dob: dob,
    offername: paymentCategory,
    amount: amount,
    remarks: remarks
  };

  e.preventDefault();
  const usr_input = document.getElementById("submit").value;

  // Check whether the input is equal to the generated captcha or not
  if (usr_input == captcha.innerHTML) {
    const response = await fetch("https://radhikafood.com/api/orderFood.php", {
      method: "post",
      body: JSON.stringify(body),
      headers: {
        "Content-Type": "application/json"
      }
    });

    if (response.ok) {
      const responseData = await response.json();
      if (responseData.status === "success") {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: responseData.message
        }).then(() => {
            document.getElementById("paymentForm").reset(); // Reset the form
            generate(); // Generate new captcha
          });
      } else if(responseData.status==='error') {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: responseData.message
        });
      }
    } else if(responseData.status==='failed'){
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Failed to execute query.'
      });
    }
  } else {
    var s = document.getElementById("key").innerHTML = "not Matched";
    generate();
  }
}
