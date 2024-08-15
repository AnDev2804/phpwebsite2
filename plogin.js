const formulariocita = document.getElementById('formulariocita');
const input = document.querySelectorAll('#formulariocita input');
const select = document.querySelectorAll('#formulariocita select');
var respuesta = document.getElementById('respuesta');
const expresiones = {
    fcita: /^\d{4}-\d{2}-\d{2}$/,
    espec: /^(1|2)$/
}
const campos =
{
    fcita:false,
    espec:false
}
const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "fcita":
            validarInput(expresiones.fcita,e.target,'fcita');
        break;
        case "espec":
            validarSelect(expresiones.espec,e.target,'espec');
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
select.forEach(
    (select)=>
    {
        select.addEventListener('keyup',validarFormulario);
        select.addEventListener('blur',validarFormulario);
    })
formulariocita.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.fcita && campos.espec)
    {
        var datos = new FormData(formulariocita);
        fetch('cita.php',
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
                        <div class="alert alert-success rounded-4 fs-6 fw-bold text-center w-75" role="alert">
                            Cita registrada para el: ${data}
                        </div>`
                    setTimeout(()=>
                    {
                        respuesta.innerHTML=``
                    }, 4000);
                    
                }
            })
    }
    else
    {
        
        respuesta.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 text-center fw-bold w-50" role="alert">
            Por favor, rellene los campos.
        </div>`
        setTimeout(()=>
                    {
                        respuesta.innerHTML=``
                    }, 4000);
    }
})