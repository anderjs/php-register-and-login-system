class Login {
  constructor() {
    this.email = document.getElementById('email');
    this.password = document.getElementById('password');
    this.form = document.getElementById('form-sign-in');
    this.toggle = document.getElementById('togglePassword');
    this.sign = document.getElementById('input-sign-in');
    this.alert = document.getElementById('alert');
    this.alert.style.display = 'none';
  }

  eventHandlers = () => {
    this.toggle.addEventListener('click', () => {
      this.togglePassword();
    });

    this.sign.addEventListener('click', () => {
      let error = false;
      try {
        this.validateForm();
      } catch (e) {
        error = true;
        this.toggleAlert();
        this.alert.innerText = e.message;
        setTimeout(() => {
          this.toggleAlert();
        }, 3000);
      }

      if (!error) {
        this.form.setAttribute('action', 'sign-in.php');
        this.form.submit();
      }
    });
  }

  toggleAlert = () => {
    return this.alert.style.display === 'none' ? this.alert.style.display = 'block' : this.alert.style.display = 'none';
  }

  togglePassword = () => {
    return this.password.type === 'password' ?
      this.password.setAttribute('type', 'text') : this.password.setAttribute('type', 'password');
  }

  validateForm = () => {
    const { value: email } = this.email;
    const { value: password } = this.password;
    const validations = [
      { eval: !email.includes(' '), error: new Error('El email no debe contener espacios') },
      { eval: /\S+@\S+\.\S+/.test(email), error: new Error('El email debe ser valido') },
      { eval: password.length >= 8, error: new Error('Debe ingresar la contrase;a') }
    ];
    validations.forEach((validation) => {
      if (!validation.eval) {
        throw validation.error
      }
    });
  }
}


const { addEventListener } = window;

addEventListener(('load'), () => {
  const loginForm = new Login();
  loginForm.eventHandlers();
  console.log(loginForm.password.type);
});