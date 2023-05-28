// Almacenar referencias a elementos DOM
const form = document.querySelector('form');
const nombreInput = document.querySelector('input[name="NOMBRE"]');
const apellidoInput = document.querySelector('input[name="APELLIDO"]');
const emailInput = document.querySelector('input[name="EMAIL"]');

// Agregar el evento submit al formulario
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto
  validateForm();
});

// Función de validación del formulario
function validateForm() {
  const nombre = nombreInput.value.trim();
  const apellido = apellidoInput.value.trim();
  const email = emailInput.value.trim();

  if (nombre === '' || apellido === '' || email === '') {
    alert('Por favor, completa todos los campos.'); // Mostrar mensaje de error si algún campo está vacío
  } else {
    alert('El formulario ha sido enviado con éxito.'); 
    form.reset();
  }
}