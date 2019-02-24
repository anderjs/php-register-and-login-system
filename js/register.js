class SignUp {
  constructor() {
    this.form = document.getElementById('form-sign-up');
    this.sign = document.getElementById('input-sign-up');
    this.username = document.getElementById('username');
    this.email = document.getElementById('email');
    this.password = document.getElementById('password');
    this.alert = document.getElementById('alert');
  }

  toggleAlert = () => {
    return this.alert.style.display === 'none' ?
      this.alert.style.display = 'block' : this.alert.style.display = 'none';
  }

  eventHandling = () => {
    this.sign.addEventListener('click', (event) => {
      let error = false;
      try {
        this.validateForm();
      } catch (e) {
        this.toggleAlert();
        this.alert.innerText = e.message;
        setTimeout(() => {
          this.toggleAlert();
          this.alert.innerText = '';
        }, 3000);
        error = true;
      }

      if (!error) {
        this.form.setAttribute('action', 'sign-up.php');
        this.form.submit();
      }
    });
  }


  validateForm = () => {
    const { value: username } = this.username;
    const { value: password } = this.password;
    const { value: email } = this.email;
    const validations = [
      { eval: username.length >= 3 && username.length <= 255, error: new Error('El username debe contener al menos 3 caracteres') },
      { eval: !username.includes(' '), error: new Error('El username no debe contener espacios') },
      { eval: !email.includes(' '), error: new Error('El email no debe contener espacios') },
      { eval: /\S+@\S+\.\S+/.test(email), error: new Error('El email debe ser valido') },
      { eval: !password.includes(' '), error: new Error('La contrase;a no puede contener espacios') },
      { eval: password.length >= 8 && password.length <= 30, erorr: new Error('La contras;ea debe contener al menos 8 caracteres') }
    ];
    validations.forEach(validation => {
      if (!validation.eval) {
        throw validation.error;
      }
    });
  }
}

const { addEventListener } = window;

addEventListener('load', () => {
  const form = new SignUp();
  //form.sign.setAttribute('disabled', "true");
  form.eventHandling();
});