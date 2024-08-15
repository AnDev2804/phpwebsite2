const formulario1 = document.getElementById('formulario1');
const input = document.querySelectorAll('#formulario1 input');
var respuesta1 = document.getElementById('respuesta1');
function reinicio()
{
    location.href=location.href;
}
const expresiones = {
    codigo: /^\d+$/,
    nombre: /^[A-Za-z0-9áéíóúÁÉÍÓÚ,.\n\s]+$/u
}
const campos =
{
    codigo:false,
    nombre: false
}
const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "codigo":
            validarInput(expresiones.codigo,e.target,'codigo');
        break;
        case "nombre":
            validarInput(expresiones.nombre,e.target,'nombre');
        break;
    }
}
const validarInput = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campos[campo] = true;
    }
    else
    {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove("bg-success");
            campos[campo] = false;
    }
}
input.forEach(
    (input)=>
    {
        input.addEventListener('keyup',validarFormulario);
        input.addEventListener('blur',validarFormulario);
    })
formulario1.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.codigo&&campos.nombre)
    {
        var datos = new FormData(formulario1);
        fetch('regtrat2.php',
        {
            method:'POST',
            body: datos
        })
        .then(res => res.json())
        .then(data =>
            {
                if(data!='error')
                {
                    respuesta1.innerHTML=`
                        <div class="alert alert-success rounded-4 fs-6 fw-bold text-center w-50" role="alert">
                            Registro de Tratamiento exitoso.
                        </div>`
                    
                }
            })
            formulario1.reset();
    }
    else
    {
        
        respuesta1.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 text-center fw-bold w-25" role="alert">
            Por favor, rellene todos los campos.
        </div>`
        setTimeout(()=>
                    {
                        respuesta1.innerHTML=``
                    }, 4000);
    }
})