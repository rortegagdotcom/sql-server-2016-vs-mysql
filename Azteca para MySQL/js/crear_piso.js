function crear_piso() {
	descripcion = document.getElementById('descripcion');
	metros = document.getElementById('metros');
	direccion = document.getElementById('direccion');
	planta = document.getElementById('planta');
	puerta = document.getElementById('puerta');
	// Selecciona las etiquetas y las OCULTA. Cuando algo no esté bien saldrá la etiqueta de error (display: inline)
	sp_descripcion = document.getElementById('error_'+descripcion.id);
	sp_descripcion.setAttribute('style','display: none');
	sp_metros = document.getElementById('error_'+metros.id);
	sp_metros.setAttribute('style','display: none');
	sp_direccion = document.getElementById('error_'+direccion.id);
	sp_direccion.setAttribute('style','display: none');
	sp_planta = document.getElementById('error_'+planta.id);
	sp_planta.setAttribute('style','display: none');
	sp_puerta = document.getElementById('error_'+puerta.id);
	sp_puerta.setAttribute('style','display: none');
	// Creo la variable booleano "continuar" como valor verdadero. Si algo está mal el valor del booleano será falso y mostrará la etiqueta de error
	continuar = true
	if(/^[a-zA-Z\s]*$/.test(descripcion.value)) {
	} else {
		sp_descripcion.innerHTML="Escribe alguna descripcion del piso";
		sp_descripcion.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([\d]{2,3})$/.test(metros.value)) {
	} else {
		sp_metros.innerHTML="Solamente números";
		sp_metros.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]+[\d]*)+$/.test(direccion.value)){
	}
	else{
		sp_direccion.innerHTML="Direccion incorrecto";
		sp_direccion.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([\d]{1})$/.test(planta.value)) {
	} else {
		sp_planta.innerHTML="Solamente un número";
		sp_planta.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([A-Z]{1})$/.test(puerta.value)) {
	} else {
		sp_puerta.innerHTML="Solamente una letra en mayúcula";
		sp_puerta.setAttribute('style','display: inline');
		continuar = false;
	}
// Llamo a continuar y si continuar = verdadero los datos son correctos y se enviará el formulario y si continuar = falso no se enviará y mostrará el error
return continuar;
}