const formulario = document.getElementById('formulario2');
const texto = document.querySelectorAll('#formulario2 textarea');
var respuesta2 = document.getElementById('respuesta2');
const expresiones = {
    desc: /^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ*-?¿"'¡!=()&%$#|°,.\n\s]+$/u
}
const campos =
{
    desc:false
}
const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "desc":
            validarTexto(expresiones.desc,e.target,'desc');
        break;
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
texto.forEach(
    (texto)=>
    {
        texto.addEventListener('keyup',validarFormulario);
        texto.addEventListener('blur',validarFormulario);
    })
formulario.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.desc)
    {
        var datos = new FormData(formulario);
        fetch('registroemergencia.php',
        {
            method:'POST',
            body: datos
        })
        .then(res => res.json())
        .then(data =>
            {
                if(data!='error')
                {
                    respuesta2.innerHTML=`
                        <div class="alert alert-success rounded-4 fs-6 fw-bold text-center w-50" role="alert">
                            Registro de Emergencia exitoso.
                        </div>`
                        setTimeout(()=>
                        {
                            respuesta2.innerHTML=``
                            formulario.reset();
                        }, 4000);
                }
            })
            
    }
    else
    {
        
        respuesta2.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 text-center fw-bold w-50" role="alert">
            Por favor, de una descripción válida.
        </div>`
        setTimeout(()=>
                    {
                        respuesta2.innerHTML=``
                    }, 4000);
    }
})