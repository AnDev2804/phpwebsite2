const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const selects = document.querySelectorAll('#formulario select');
var respuesta = document.getElementById('respuesta');
function reinicio()
{
    location.href=location.href;
}
const expresiones = {
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    password: /^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/,
    ci: /^\d{7,8}$/,
    nomb1: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    ape1: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    fnac: /^\d{4}-\d{2}-\d{2}$/,
    nomb2: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    ape2: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    ntel: /^\d{10}$/,
    sex: /^(F|M|O)$/
}
const campos =
{
    email:false, password:false, nomb1:false,
    ape1:false, fnac:false, nomb2:false,
    ape2:false, ntel:false, sex:false
}

const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "email":
            validarInput(expresiones.email,e.target,'email');
        break;
        case "password":
            validarInput(expresiones.password,e.target,'password');
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
        case "fnac":
            validarInput(expresiones.fnac,e.target,'fnac');
        break;
        case "nomb2":
            validarInput(expresiones.nomb2,e.target,'nomb2');
        break;
        case "ape2":
            validarInput(expresiones.ape2,e.target,'ape2');
        break;
        case "ntel":
            validarInput(expresiones.ntel,e.target,'ntel');
        break;
        case "sex":
            validarSelect(expresiones.sex,e.target,'sex');
        break;
    }
}

const validarInput = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        if(`${campo}`=='password')
        {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = true;
        }
        else
        {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
            campos[campo] = true;
        }
    }
    else
    {
        if(`${campo}`=='password')
        {
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            campos[campo] = false;
        }
        else
        {
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            campos[campo] = false;
        }
    }
}

const validarSelect = (expresion,select,campo)=>
{
    if(expresion.test(select.value))
    {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        campos[campo] = true;
    }
    else
    {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        campos[campo] = false;
    }
}

inputs.forEach(
(inputs)=>
{
    inputs.addEventListener('keyup',validarFormulario);
    inputs.addEventListener('blur',validarFormulario);
})
selects.forEach(
    (selects)=>
    {
        selects.addEventListener('keyup',validarFormulario);
        selects.addEventListener('blur',validarFormulario);
    })
formulario.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.email && campos.password && campos.nomb1 && campos.ape1 && campos.fnac && campos.ntel && campos.sex)
    {
        var datos = new FormData(formulario);
        fetch('registropaciente.php',
        {
            method:'POST',
            body: datos
        })
        .then(res => res.json())
        .then(data =>
            {
                console.log(data)
                if(data!='error')
                {
                    respuesta.innerHTML=`
                        <div class="alert alert-success rounded-4 fs-6 fw-bold text-center w-50" role="alert" style="margin:0 auto;">
                            Registro Exitoso.<br>${data}
                        </div>`
                    setTimeout(()=>
                    {
                        reinicio();
                    }, 8000);
                    
                }
            })
            formulario.reset();
    }
    else
    {
        respuesta.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 fw-bold text-center w-25" role="alert" style="margin:0 auto;">
            Por favor, rellene todos los campos.
        </div>`
    }
})