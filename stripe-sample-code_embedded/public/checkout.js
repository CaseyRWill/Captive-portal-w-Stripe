// This is your test secret API key.
const stripe = Stripe("pk_test_51QIdN6K1ucZlE5ZZhIldpukgPxX09LZXL6qTetX1sYOiEoGwmpUB4QZVvh5DrWlBs2ndDry0DdQO4RjdFlJIxvtX006A5poe4A");

initialize();

// Create a Checkout Session
async function initialize() {
  const fetchClientSecret = async () => {
    const response = await fetch("/checkout.php", {
      method: "POST",
    });
    const { clientSecret } = await response.json();
    return clientSecret;
  };

  const checkout = await stripe.initEmbeddedCheckout({
    fetchClientSecret,
  });

  // Mount Checkout
  checkout.mount('#checkout');
}