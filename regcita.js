const formulario = document.getElementById('formulario');
const input = document.querySelectorAll('#formulario input');
const texto = document.querySelectorAll('#formulario textarea');
const select = document.querySelectorAll('#formulario select');
var respuesta = document.getElementById('respuesta');
function reinicio()
{
    location.href=location.href;
}
const expresiones = {
    observ: /^[A-Za-z0-9áéíóúÁÉÍÓÚ,.\n\s]+$/u,
    diag: /^[A-Za-z0-9áéíóúÁÉÍÓÚ,.\n\s]+$/u,
    trat: /^(1|2|3|4|5|6)$/,
    ncita:/^(0|1)$/,
    costo:/^-?\d*\.?\d+$/
}
const campos =
{
    observ:false,
    diag: false,
    trat: false,
    ncita:false,
    costo:false
}
const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "observ":
            validarTexto(expresiones.observ,e.target,'observ');
        break;
        case "diag":
            validarTexto(expresiones.diag,e.target,'diag');
        break;
        case "trat":
            validarSelect(expresiones.trat,e.target,'trat');
        break;
        case "ncita":
            validarSelect(expresiones.ncita,e.target,'ncita');
        break;
        case "costo":
            validarInput(expresiones.costo,e.target,'costo');
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
const validarTexto = (expresion,texto,campo) =>
{
    if(expresion.test(texto.value))
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
const validarSelect = (expresion,select,campo) =>
{
    if(expresion.test(select.value))
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
texto.forEach(
    (texto)=>
    {
        texto.addEventListener('keyup',validarFormulario);
        texto.addEventListener('blur',validarFormulario);
    })
select.forEach(
    (select)=>
    {
        select.addEventListener('keyup',validarFormulario);
        select.addEventListener('blur',validarFormulario);
    })
formulario.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.observ&&campos.diag&&campos.trat&&campos.ncita&&campos.costo)
    {
        var datos = new FormData(formulario);
        fetch('regcita.php',
        {
            method:'POST',
            body: datos
        })
        .then(res => res.json())
        .then(data =>
            {
                if(data!='error')
                {
                    respuesta.innerHTML=`
                        <div class="alert alert-success rounded-4 fs-6 fw-bold text-center w-50" role="alert">
                            Registro de Cita Exitoso. Por favor vuelva y actualice para ver las nuevas citas.
                        </div>`
                    
                }
            })
            formulario.reset();
    }
    else
    {
        
        respuesta.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 text-center fw-bold w-25" role="alert">
            Por favor, rellene todos los campos.
        </div>`
        setTimeout(()=>
                    {
                        respuesta.innerHTML=``
                    }, 4000);
    }
})