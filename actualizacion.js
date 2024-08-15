const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
var respuesta = document.getElementById('respuesta');
const expresiones = {
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    ci: /^\d{7,8}$/,
    nomb1: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    ape1: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    nomb2: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    ape2: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    fnac: /^\d{4}-\d{2}-\d{2}$/,
    ntel: /^\d{10}$/,
    sex: /^(F|M|O)$/,
}
const campos =
{
    email:false, ci:false, nomb1:false,
    ape1:false, nomb2:false, fnac:false,
    ape2:false, ntel:false, sex:false
}
const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "email":
            validarInput(expresiones.email,e.target,'email');
        break;
        case "ci":
            validarInput(expresiones.ci,e.target,'ci');
        break;
        case "nomb1":
            validarInput(expresiones.nomb1,e.target,'nomb1');
        break;
        case "ape1":
            validarInput(expresiones.ape1,e.target,'ape1');
        break;
        case "nomb2":
            validarInput(expresiones.nomb2,e.target,'nomb2');
        break;
        case "ape2":
            validarInput(expresiones.ape2,e.target,'ape2');
        break;
        case "fnac":
            validarInput(expresiones.fnac,e.target,'fnac');
        break;
        case "ntel":
            validarInput(expresiones.ntel,e.target,'ntel');
        break;
        case "sex":
            validarInput(expresiones.sex,e.target,'sex');
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
inputs.forEach(
    (input)=>
    {
        input.addEventListener('keyup',validarFormulario);
        input.addEventListener('blur',validarFormulario);
    })
formulario.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.email&&campos.ci&&campos.nomb1&&campos.ape1&&campos.nomb2&&campos.ape2&&campos.ntel&campos.fnac&&campos.sex)
    {
        
        var datos = new FormData(formulario);
        fetch('actualizacion.php',
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
                            Datos actualizados. ${data}
                        </div>`
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