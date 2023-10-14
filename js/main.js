const inputs = document.querySelectorAll(".formInput");

inputs.forEach( (ipt) => {
	// Agrega clases a los inputs activos
	ipt.addEventListener("focus", () => {
		ipt.parentNode.classList.add ("focus");
		ipt.parentNode.classList.add ("notEmpty");
	});
	ipt.addEventListener("blur", () => {
		//Remueve la clase focus cuando los inputs ya no estan activos
		ipt.parentNode.classList.remove ("focus");
		//Remuve la classe notEmpty si el input se encuentra vacio
		if (ipt.value == '') {
			ipt.parentNode.classList.remove ("notEmpty");
		}
	});
});