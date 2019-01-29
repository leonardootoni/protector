/**
 * General methods to create a hash and assigned it into the form.
 * File used in the authentication and user registration pages
 *
 * Author: Leonardo Otoni de Assis
 *
 * Dependency: sha1.min.js
 */
document.getElementById("submitBtn").addEventListener("click", e => {
  beforeSubmitForm();
});

const beforeSubmitForm = () => {
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirmPassword");

  document.getElementById("hash").value = generateSHA1Hash(
    email.value + password.value
  );

  password.value = "";
  if (confirmPassword) {
    confirmPassword.value = "";
  }
};

//Generates an authentication hash based on the token providaded
const generateSHA1Hash = token => {
  //generate the SHA1 Hash
  sha1(token);
  const hash = sha1.create();
  hash.update(token);
  return hash.hex();
};
