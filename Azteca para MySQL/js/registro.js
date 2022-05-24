function registro() {
	usuario = document.getElementById('usuario');
	contrasena = document.getElementById('contrasena');
	contrasena2 = document.getElementById('contrasena2');
	nombre = document.getElementById('nombre');
	apellido = document.getElementById('apellido');
	apellido2 = document.getElementById('apellido2');
	dni = document.getElementById('dni');
	email = document.getElementById('email');
	telefono = document.getElementById('telefono');
	// Selecciona las etiquetas y las OCULTA. Cuando algo no esté bien saldrá la etiqueta de error (display: inline)
	sp_usuario = document.getElementById('error_'+usuario.id);
	sp_usuario.setAttribute('style','display: none');
	sp_contrasena = document.getElementById('error_'+contrasena.id);
	sp_contrasena.setAttribute('style','display: none');
	sp_contrasena2 = document.getElementById('error_'+contrasena2.id);
	sp_contrasena2.setAttribute('style','display: none');
	sp_nombre = document.getElementById('error_'+nombre.id);
	sp_nombre.setAttribute('style','display: none');
	sp_apellido = document.getElementById('error_'+apellido.id);
	sp_apellido.setAttribute('style','display: none');
	sp_apellido2 = document.getElementById('error_'+apellido2.id);
	sp_apellido2.setAttribute('style','display: none');
	sp_dni = document.getElementById('error_'+dni.id);
	sp_dni.setAttribute('style','display: none');
	sp_email = document.getElementById('error_'+email.id);
	sp_email.setAttribute('style','display: none');
	sp_telefono = document.getElementById('error_'+telefono.id);
	sp_telefono.setAttribute('style','display: none');
	// Creo la variable booleano "continuar" como valor verdadero. Si algo está mal el valor del booleano será falso y mostrará la etiqueta de error
	continuar = true
	if(/^[a-z\d_]{4,15}$/i.test(usuario.value)) {
	} else {
		sp_usuario.innerHTML="Usuario incorrecto (min:4 max:12)";
		sp_usuario.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/.test(contrasena.value)) {
	} else {
		sp_contrasena.innerHTML="La contrasena no cumple con los requisitos<br />Minimo 8 caracteres<br />Maximo 15 caracteres<br />Al menos una letra mayúscula<br />Al menos una letra minucula<br />Al menos un dígito<br />Al menos 1 caracter especial";
		sp_contrasena.setAttribute('style','display: inline');
		continuar = false;
	}
	if(contrasena.value == contrasena2.value) {
	} else {
		sp_contrasena2.innerHTML="Las contrasenas no coinciden";
		sp_contrasena2.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/.test(nombre.value)) {
	} else {
		sp_nombre.innerHTML="Nombre en mayuscula";
		sp_nombre.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/.test(apellido.value)) {
	} else {
		sp_apellido.innerHTML="Primer Apellido en mayuscula";
		sp_apellido.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/.test(apellido2.value)) {
	} else {
		sp_apellido2.innerHTML="Segundo Apellido en mayuscula";
		sp_apellido2.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([0-9]{8}[A-Z])+$/.test(dni.value)) {
	} else {
		sp_dni.innerHTML="DNI incorrecto";
		sp_dni.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test(email.value)){
	} else {
		sp_email.innerHTML="Correo electrónico incorrecto";
		sp_email.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/.test(telefono.value)){
	} else {
		sp_telefono.innerHTML="Telefono incorrecto";
		sp_telefono.setAttribute('style','display: inline');
		continuar = false;
	}
// Llamo a continuar y si continuar = verdadero los datos son correctos y si continuar = falso no se enviará y mostrará el Error
return continuar;
}
