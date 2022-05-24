function iniciar_sesion() {
	usuario = document.getElementById('usuario');
	contrasena = document.getElementById('contrasena');
	// Selecciona las etiquetas y las OCULTA. Cuando algo no esté bien saldrá la etiqueta de error (display: inline)
	sp_usuario = document.getElementById('error_'+usuario.id);
	sp_usuario.setAttribute('style','display: none');
	sp_contrasena = document.getElementById('error_'+contrasena.id);
	sp_contrasena.setAttribute('style','display: none');
	// Creo la variable booleano "continuar" como valor verdadero. Si algo está mal el valor del booleano será falso y mostrará la etiqueta de error
	continuar = true
	if (usuario.value == 0) {
		sp_usuario.innerHTML="Introduzca el usuario";
		sp_usuario.setAttribute('style','display: inline');
		continuar = false;
	}
	if (contrasena.value == 0) {
		sp_contrasena.innerHTML="Introduzca la contraseña";
		sp_contrasena.setAttribute('style','display: inline');
		continuar = false;
	}
// Llamo a continuar y si continuar = verdadero los datos son correctos y si continuar = falso no se enviará y mostrará el Error
return continuar;
}
