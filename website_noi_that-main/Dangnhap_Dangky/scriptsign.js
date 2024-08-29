// Kéo ra kéo vào đăng ký, đăng nhập
const logredBox = document.querySelector('.logreg-box');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

registerLink.addEventListener('click', () => {
    logredBox.classList.add('active');
});

loginLink.addEventListener('click', () => {
    logredBox.classList.remove('active');
});

// Hiện thông báo khi đăng ký thành công
function validateForm() 
{
    var name = document.forms["myForm"]["name"].value;
    var email = document.forms["myForm"]["email"].value;
    var password = document.forms["myForm"]["pass"].value;
    var passwordretype = document.forms["myForm"]["passretype"].value;
    
    if (name == "" || email == "" || password == "" || passwordretype == "") 
    {
      return false;
    }
    alert("Đăng ký thành công!");
    return true;
}
