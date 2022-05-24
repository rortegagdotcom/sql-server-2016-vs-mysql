function cambiar() {
	contrasena = document.getElementById('contrasena');
	contrasena2 = document.getElementById('contrasena2');
	// Selecciona las etiquetas y las OCULTA. Cuando algo no esté bien saldrá la etiqueta de error (display: inline)
	sp_contrasena = document.getElementById('error_'+contrasena.id);
	sp_contrasena.setAttribute('style','display: none');
	sp_contrasena2= document.getElementById('error_'+contrasena2.id);
	sp_contrasena2.setAttribute('style','display: none');
	// Creo la variable booleano "continuar" como valor verdadero. Si algo está mal el valor del booleano será falso y mostrará la etiqueta de error
	continuar = true
	if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/.test(contrasena.value)) {
	} else {
		sp_contrasena.innerHTML="La contrasena no cumple con los requisitos<br />Minimo 8 caracteres<br />Maximo 15 caracteres<br />Al menos una letra mayúscula<br />Al menos una letra minucula<br />Al menos un dígito<br />Al menos 1 caracter especial";
		sp_contrasena.setAttribute('style','display: inline');
		continuar = false;
	}
	if (contrasena.value == contrasena2.value) {
	} else {
		sp_contrasena2.innerHTML="Las contraseñas no son iguales";
		sp_contrasena2.setAttribute('style','display: inline');
		continuar = false;
	}
// Llamo a continuar y si continuar = verdadero los datos son correctos y si continuar = falso no se enviará y mostrará el Error
return continuar;
}